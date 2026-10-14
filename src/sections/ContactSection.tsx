import { useState } from 'react';
import { useScrollReveal } from '@/hooks/useScrollReveal';
import SectionHeader from '@/components/SectionHeader';
import GoldButton from '@/components/GoldButton';
import WhatsAppButton from '@/components/WhatsAppButton';
import { Phone, Mail, MapPin, Clock, CheckCircle } from 'lucide-react';

interface FormData {
  name: string;
  email: string;
  phone: string;
  tourType: string;
  travelDates: string;
  groupSize: string;
  message: string;
}

const initialFormData: FormData = {
  name: '',
  email: '',
  phone: '',
  tourType: '',
  travelDates: '',
  groupSize: '',
  message: '',
};

const tourOptions = [
  'Select a tour type',
  'Family Tour',
  'Couple Tour',
  'Adventure Tour',
  'Photography Tour',
  'Custom Tour',
  'Car Rental',
];

export default function ContactSection() {
  const [formData, setFormData] = useState<FormData>(initialFormData);
  const [errors, setErrors] = useState<Partial<Record<keyof FormData, string>>>({});
  const [submitted, setSubmitted] = useState(false);

  const headerRef = useScrollReveal<HTMLDivElement>({ pattern: 'fade-up' });
  const formRef = useScrollReveal<HTMLDivElement>({ pattern: 'fade-up', delay: 0.1 });
  const infoRef = useScrollReveal<HTMLDivElement>({ pattern: 'fade-up', delay: 0.2 });

  const handleChange = (
    e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement | HTMLSelectElement>
  ) => {
    const { name, value } = e.target;
    setFormData((prev) => ({ ...prev, [name]: value }));
    if (errors[name as keyof FormData]) {
      setErrors((prev) => ({ ...prev, [name]: '' }));
    }
  };

  const validate = (): boolean => {
    const newErrors: Partial<Record<keyof FormData, string>> = {};
    if (!formData.name.trim()) newErrors.name = 'Please enter your name';
    if (!formData.email.trim()) newErrors.email = 'Please enter your email';
    else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(formData.email))
      newErrors.email = 'Please enter a valid email';
    if (!formData.phone.trim()) newErrors.phone = 'Please enter your phone number';
    if (!formData.tourType || formData.tourType === 'Select a tour type')
      newErrors.tourType = 'Please select a tour type';
    setErrors(newErrors);
    return Object.keys(newErrors).length === 0;
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (validate()) {
      const message = [
        'New Inquiry from Website',
        `Name: ${formData.name}`,
        `Email: ${formData.email}`,
        `Phone: ${formData.phone}`,
        `Interested In: ${formData.tourType}`,
        formData.travelDates && `Travel Dates: ${formData.travelDates}`,
        formData.groupSize && `Group Size: ${formData.groupSize}`,
        formData.message && `Message: ${formData.message}`,
      ]
        .filter(Boolean)
        .join('\n');

      window.open(
        `https://wa.me/923468486217?text=${encodeURIComponent(message)}`,
        '_blank',
        'noopener,noreferrer'
      );

      setSubmitted(true);
    }
  };

  const inputClass =
    'w-full px-4 py-3.5 border border-black/10 rounded-[10px] bg-white font-body text-base text-mountain placeholder:text-stone-color/50 focus:border-emerald-green focus:outline-none focus:ring-[3px] focus:ring-emerald-green/10 transition-all';

  const labelClass = 'font-body font-medium text-sm text-mountain mb-2 block';

  return (
    <section id="contact" className="section-padding bg-white">
      <div className="container-content">
        <div ref={headerRef}>
          <SectionHeader
            overline="GET IN TOUCH"
            heading="Start Your Pakistan Adventure"
            subheading="Tell us about your dream trip and we'll craft the perfect experience for you. No obligation, just a friendly conversation."
            overlineColor="text-warm-gold"
          />
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
          {/* Form Column */}
          <div ref={formRef}>
            <div className="bg-mist rounded-2xl p-3 md:p-12">
              {!submitted ? (
                <form onSubmit={handleSubmit} className="space-y-5">
                  <div>
                    <label className={labelClass}>Your Name</label>
                    <input
                      type="text"
                      name="name"
                      value={formData.name}
                      onChange={handleChange}
                      placeholder="Enter your full name"
                      className={inputClass}
                    />
                    {errors.name && (
                      <p className="text-red-500 text-xs mt-1 font-body">{errors.name}</p>
                    )}
                  </div>

                  <div>
                    <label className={labelClass}>Email Address</label>
                    <input
                      type="email"
                      name="email"
                      value={formData.email}
                      onChange={handleChange}
                      placeholder="your@email.com"
                      className={inputClass}
                    />
                    {errors.email && (
                      <p className="text-red-500 text-xs mt-1 font-body">{errors.email}</p>
                    )}
                  </div>

                  <div>
                    <label className={labelClass}>Phone / WhatsApp</label>
                    <input
                      type="tel"
                      name="phone"
                      value={formData.phone}
                      onChange={handleChange}
                      placeholder="+92 300 1234567"
                      className={inputClass}
                    />
                    {errors.phone && (
                      <p className="text-red-500 text-xs mt-1 font-body">{errors.phone}</p>
                    )}
                  </div>

                  <div>
                    <label className={labelClass}>Interested In</label>
                    <select
                      name="tourType"
                      value={formData.tourType}
                      onChange={handleChange}
                      className={inputClass}
                    >
                      {tourOptions.map((opt) => (
                        <option key={opt} value={opt === 'Select a tour type' ? '' : opt}>
                          {opt}
                        </option>
                      ))}
                    </select>
                    {errors.tourType && (
                      <p className="text-red-500 text-xs mt-1 font-body">{errors.tourType}</p>
                    )}
                  </div>

                  <div className="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                      <label className={labelClass}>Preferred Travel Dates</label>
                      <input
                        type="text"
                        name="travelDates"
                        value={formData.travelDates}
                        onChange={handleChange}
                        placeholder="e.g., July 15-22, 2025"
                        className={inputClass}
                      />
                    </div>
                    <div>
                      <label className={labelClass}>Number of Travelers</label>
                      <input
                        type="number"
                        name="groupSize"
                        value={formData.groupSize}
                        onChange={handleChange}
                        placeholder="e.g., 4"
                        className={inputClass}
                      />
                    </div>
                  </div>

                  <div>
                    <label className={labelClass}>Tell Us About Your Trip</label>
                    <textarea
                      name="message"
                      value={formData.message}
                      onChange={handleChange}
                      rows={5}
                      placeholder="Share your interests, must-see places, special requirements..."
                      className={inputClass}
                    />
                  </div>

                  <GoldButton type="submit" fullWidth>
                    Send Inquiry
                  </GoldButton>
                </form>
              ) : (
                <div className="text-center py-8">
                  <CheckCircle size={48} className="text-emerald-green mx-auto mb-4" />
                  <h3 className="font-display font-medium text-2xl text-mountain mb-2">
                    Thank You!
                  </h3>
                  <p className="font-body text-base text-stone-color mb-6">
                    We've received your inquiry and will get back to you within 24 hours.
                  </p>
                  <WhatsAppButton variant="small" className="mx-auto">
                    Chat on WhatsApp
                  </WhatsAppButton>
                </div>
              )}
            </div>
          </div>

          {/* Info Column */}
          <div ref={infoRef} className="space-y-8">
            {/* WhatsApp Block */}
            <div className="bg-[#25D366]/[0.08] border border-[#25D366]/20 rounded-2xl p-8">
              <div className="flex items-center justify-center w-12 h-12 rounded-full bg-[#25D366] mb-4">
              <svg
                viewBox="0 0 16 16"
                className="w-[25px] h-[25px] fill-white"
              >
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                </svg>
              </div>
              <h4 className="font-body font-semibold text-lg text-mountain mb-1">
                Chat on WhatsApp
              </h4>
              <p className="font-body text-base text-stone-color mb-4">+923468486217</p>
              <WhatsAppButton variant="filled" href="https://wa.me/923468486217" >
                Chat Now
              </WhatsAppButton>
            </div>

            {/* Phone */}
            <div className="flex items-start gap-4">
              <Phone size={24} className="text-emerald-green flex-shrink-0 mt-0.5" />
              <div>
                <h4 className="font-body font-semibold text-base text-mountain">Call Us</h4>
                <a
                  href="tel:+923468486217"
                  className="font-body text-[0.9375rem] text-stone-color hover:text-emerald-green transition-colors"
                >
                  +923468486217
                </a>
              </div>
            </div>

            {/* Email */}
            <div className="flex items-start gap-4">
              <Mail size={24} className="text-emerald-green flex-shrink-0 mt-0.5" />
              <div>
                <h4 className="font-body font-semibold text-base text-mountain">Email Us</h4>
                <a
                  href="mailto:hunza4seasontour@gmail.com"
                  className="font-body text-[0.9375rem] text-stone-color hover:text-emerald-green transition-colors"
                >
                  hunza4seasontours@gmail.com
                </a>
              </div>
            </div>

            {/* Address */}
            <div className="flex items-start gap-4">
              <MapPin size={24} className="text-emerald-green flex-shrink-0 mt-0.5" />
              <div>
                <h4 className="font-body font-semibold text-base text-mountain">Find Us</h4>
                <p className="font-body text-[0.9375rem] text-stone-color">
                  NasirAbad Hunza, Hunza Valley, Gilgit-Baltistan, Pakistan
                </p>
              </div>
            </div>

            {/* Response Time */}
            <div className="flex items-start gap-4">
              <Clock size={24} className="text-emerald-green flex-shrink-0 mt-0.5" />
              <div>
                <h4 className="font-body font-semibold text-base text-mountain">Response Time</h4>
                <p className="font-body text-[0.9375rem] text-stone-color">
                  We typically respond within 2-4 hours during business hours.
                </p>
              </div>
            </div>
          </div>
        </div>

        {/* Google Maps */}
        <div className="mt-16 rounded-2xl overflow-hidden">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16263.24538307594!2d74.6486111!3d36.3166667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38e8a0b6c0e5c6b1%3A0x3e5c0c0c0c0c0c0c!2sKarimabad%2C%20Hunza%2C%20Gilgit-Baltistan%2C%20Pakistan!5e0!3m2!1sen!2s!4v1700000000000!5m2!1sen!2s"
            width="100%"
            height="400"
            style={{ border: 0 }}
            allowFullScreen
            loading="lazy"
            referrerPolicy="no-referrer-when-downgrade"
            title="Hunza Valley Location"
            className="rounded-2xl"
          />
        </div>
      </div>
    </section>
  );
}

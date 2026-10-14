import { useScrollReveal } from '@/hooks/useScrollReveal';
import SectionHeader from '@/components/SectionHeader';
import GoldButton from '@/components/GoldButton';
import { Users, Heart, Mountain, Camera, Settings, Check, Star } from 'lucide-react';
import baltitFort from '../lib/images/baltit forth.jpg';
import suspensionBridge from '../lib/images/suspension bridge.png';
import rakaposhiPeak from '../lib/images/rakaposhi.jpg';
import satrangi from '../lib/images/satrangi.png';

const packages = [
  {
    icon: Users,
    name: 'Family Tour',
    price: 'From PKR 25,000',
    image: baltitFort,
    description:
      'A memorable journey designed for families with children of all ages. Safe, comfortable, and filled with wonder.',
    features: ['Kid-friendly activities', 'Comfortable family transport', 'Family-sized accommodations', 'Flexible pacing'],
  },
  {
    icon: Heart,
    name: 'Couple Tour',
    price: 'From PKR 30,000',
    image: suspensionBridge,
    description:
      'Romantic escapes for couples seeking privacy and breathtaking scenery. Perfect for honeymoons and anniversaries.',
    features: ['Private vehicle', 'Romantic viewpoints', 'Cozy accommodations', 'Sunset experiences'],
  },
  {
    icon: Mountain,
    name: 'Adventure Tour',
    price: 'From PKR 35,000',
    image: rakaposhiPeak,
    popular: true,
    description:
      'For thrill-seekers ready to trek, explore glaciers, and push their limits across the Karakoram, Himalaya, and Hindukush.',
    features: ['Trekking & hiking routes', 'Glacier exploration', 'Camping options', 'Expert guidance'],
  },
  {
    icon: Camera,
    name: 'Photography Tour',
    price: 'From PKR 40,000',
    image: satrangi,
    description:
      'Chase the perfect light across Pakistan\'s most photogenic locations. For amateur and professional photographers.',
    features: ['Golden hour locations', 'Hidden viewpoints', 'Seasonal timing', 'Patient pacing'],
  },
];

export default function PackagesSection() {
  const headerRef = useScrollReveal<HTMLDivElement>({ pattern: 'fade-up' });
  const gridRef = useScrollReveal<HTMLDivElement>({
    pattern: 'stagger',
    childSelector: '.package-card',
    stagger: 0.12,
  });

  const handleInquire = (pkg: (typeof packages)[number]) => {
    const message = [
      'Tour Package Inquiry',
      `Package: ${pkg.name}`,
      `Price: ${pkg.price}`,
      `Includes: ${pkg.features.join(', ')}`,
    ].join('\n');

    window.open(
      `https://wa.me/923468486217?text=${encodeURIComponent(message)}`,
      '_blank',
      'noopener,noreferrer'
    );
  };

  return (
    <section id="packages" className="section-padding bg-deep-forest">
      <div className="container-content">
        <div ref={headerRef}>
          <SectionHeader
            overline="TOUR PACKAGES"
            heading="Curated Experiences for Every Traveler"
            subheading="Choose your perfect journey or contact us for a fully customized adventure."
            overlineColor="text-warm-gold"
            headingColor="text-white"
            subheadingColor="text-white/70"
          />
        </div>

        <div
          ref={gridRef}
          className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8"
        >
          {packages.map((pkg) => (
            <div
              key={pkg.name}
              className="package-card group bg-white/[0.06] border border-white/10 rounded-2xl overflow-hidden backdrop-blur-sm transition-all duration-300 hover:bg-white/10 hover:border-white/20 hover:-translate-y-1.5"
            >
              {/* Image */}
              <div className="relative aspect-[4/3] overflow-hidden">
                <img
                  src={pkg.image}
                  alt={pkg.name}
                  loading="lazy"
                  className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-black/0" />
                {pkg.popular && (
                  <span className="absolute top-4 right-4 inline-flex items-center gap-1 bg-warm-gold text-white font-body font-medium text-xs px-3 py-1.5 rounded-full">
                    <Star size={12} className="fill-white" />
                    Most Popular
                  </span>
                )}
                <div className="absolute top-4 left-4 w-11 h-11 rounded-full bg-white/15 backdrop-blur-sm flex items-center justify-center">
                  <pkg.icon size={20} className="text-white" />
                </div>
                <div className="absolute bottom-4 left-4 right-4">
                  <h3 className="font-display font-medium text-xl text-white drop-shadow-sm">
                    {pkg.name}
                  </h3>
                  <p className="font-body font-medium text-warm-gold mt-0.5">{pkg.price}</p>
                </div>
              </div>

              {/* Content */}
              <div className="p-3 md:p-6">
                <p className="font-body font-light text-[0.9375rem] text-white/65 leading-relaxed">
                  {pkg.description}
                </p>
                <ul className="mt-5 space-y-2.5">
                  {pkg.features.map((feature) => (
                    <li key={feature} className="flex items-center gap-2.5">
                      <Check size={16} className="text-emerald-green flex-shrink-0" />
                      <span className="font-body text-sm text-white/80">{feature}</span>
                    </li>
                  ))}
                </ul>
                <button
                  type="button"
                  onClick={() => handleInquire(pkg)}
                  className="block mt-7 w-full text-center font-body font-medium text-sm text-white border border-white/40 rounded-full py-3 transition-all duration-300 hover:bg-warm-gold hover:border-warm-gold"
                >
                  Inquire Now
                </button>
              </div>
            </div>
          ))}
        </div>

        {/* Custom Tour CTA */}
        <div className="mt-8 md:mt-10 bg-gradient-to-r from-warm-gold/15 to-white/[0.03] border border-warm-gold/25 rounded-2xl p-3 md:p-10 flex flex-col md:flex-row items-center gap-6 md:gap-8">
          <div className="w-16 h-16 rounded-full bg-warm-gold/20 flex items-center justify-center flex-shrink-0">
            <Settings size={30} className="text-warm-gold" />
          </div>
          <div className="flex-1 text-center md:text-left">
            <h3 className="font-display font-medium text-xl md:text-2xl text-white">
              Don't See What You're Looking For?
            </h3>
            <p className="font-body font-light text-[0.9375rem] text-white/65 mt-2 leading-relaxed max-w-xl">
              Tell us your vision and we'll craft a fully personalized Pakistan itinerary, any
              duration, any group size, any budget.
            </p>
          </div>
          <GoldButton href="/#contact" className="flex-shrink-0">
            Get Custom Quote
          </GoldButton>
        </div>

        <p className="font-body font-light text-sm text-white/50 text-center mt-8">
          All prices are per person and vary based on group size, duration, and season. Contact us
          for a detailed quote.
        </p>
      </div>
    </section>
  );
}

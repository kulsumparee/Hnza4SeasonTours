import { useScrollReveal } from '@/hooks/useScrollReveal';
import SectionHeader from '@/components/SectionHeader';
import { Compass, UserCheck, Shield, Camera, Heart, Calendar } from 'lucide-react';

const benefits = [
  {
    icon: Compass,
    title: 'Customized Itineraries',
    description:
      'Every tour is tailored to your interests, pace, and travel style. No cookie-cutter packages.',
  },
  {
    icon: UserCheck,
    title: 'Personal Local Guide',
    description:
      'Your tour is led by a Pakistani local with over 10 years of guiding experience across the country.',
  },
  {
    icon: Shield,
    title: 'Safe & Comfortable',
    description:
      'All transport, accommodations, and permits handled. Travel with complete peace of mind.',
  },
  {
    icon: Camera,
    title: 'Photography Spots',
    description:
      'Access the best viewpoints and hidden locations for stunning photos you\'ll treasure forever.',
  },
  {
    icon: Heart,
    title: 'Authentic Hospitality',
    description:
      'Experience genuine Pakistani warmth — local meals, cultural encounters, and heartfelt connections.',
  },
  {
    icon: Calendar,
    title: 'Year-Round Tours',
    description:
      'Pakistan is beautiful in every season. We operate spring, summer, autumn, and winter tours nationwide.',
  },
];

export default function WhyUsSection() {
  const headerRef = useScrollReveal<HTMLDivElement>({ pattern: 'fade-up' });
  const gridRef = useScrollReveal<HTMLDivElement>({
    pattern: 'stagger',
    childSelector: '.benefit-card',
    stagger: 0.12,
  });

  return (
    <section className="section-padding bg-white">
      <div className="container-content">
        <div ref={headerRef}>
          <SectionHeader
            overline="WHY CHOOSE US"
            heading="The Hunza 4 Season Difference"
            subheading="Every detail is thoughtfully crafted to give you an unforgettable experience."
            overlineColor="text-warm-gold"
          />
        </div>

        <div
          ref={gridRef}
          className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8"
        >
          {benefits.map((benefit) => (
            <div
              key={benefit.title}
              className="benefit-card bg-mist rounded-2xl p-8 md:p-10 text-center shadow-card transition-all duration-300 hover:-translate-y-1 hover:shadow-card-hover"
            >
              <div className="w-16 h-16 rounded-full bg-emerald-green/10 flex items-center justify-center mx-auto">
                <benefit.icon size={28} className="text-emerald-green" />
              </div>
              <h3 className="font-display font-medium text-xl md:text-2xl text-mountain mt-6">
                {benefit.title}
              </h3>
              <p className="font-body text-[0.9375rem] text-stone-color mt-3 leading-relaxed">
                {benefit.description}
              </p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

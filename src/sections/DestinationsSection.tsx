import { Link } from 'react-router';
import { ArrowRight } from 'lucide-react';
import { useScrollReveal } from '@/hooks/useScrollReveal';
import SectionHeader from '@/components/SectionHeader';
import { regions } from '@/lib/regionsData';

export default function DestinationsSection() {
  const headerRef = useScrollReveal<HTMLDivElement>({ pattern: 'fade-up' });
  const gridRef = useScrollReveal<HTMLDivElement>({
    pattern: 'stagger',
    childSelector: '.region-card',
    stagger: 0.1,
  });

  return (
    <section id="destinations" className="section-padding bg-ice">
      <div className="container-content">
        <div ref={headerRef}>
          <SectionHeader
            overline="PLACES TO VISIT"
            heading="Explore Pakistan, Region by Region"
            subheading="From the peaks of the Karakoram to the historic streets of Lahore, pick a region to discover its places."
            overlineColor="text-emerald-green"
          />
        </div>

        <div
          ref={gridRef}
          className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-4"
        >
          {regions.map((region) => (
            <Link
              key={region.slug}
              to={`/destinations/${region.slug}`}
              className="region-card group relative block aspect-[4/5] rounded-2xl overflow-hidden shadow-card hover:shadow-card-hover transition-shadow duration-300"
            >
              {/* Image */}
              <img
                src={region.heroImage}
                alt={region.name}
                className="absolute inset-0 w-full h-full object-cover transition-transform duration-600 group-hover:scale-[1.08]"
                loading="lazy"
              />
              {/* Gradient Overlay */}
              <div
                className="absolute inset-0"
                style={{
                  background:
                    'linear-gradient(180deg, rgba(0,0,0,0.05) 0%, rgba(0,0,0,0.35) 55%, rgba(0,0,0,0.85) 100%)',
                }}
              />
              {/* Content */}
              <div className="absolute bottom-0 left-0 right-0 p-6 md:p-7">
                <p className="font-body font-medium text-xs uppercase tracking-[0.12em] text-warm-gold mb-1">
                  {region.overline}
                </p>
                <h3 className="font-display font-medium text-2xl md:text-[1.75rem] text-white">
                  {region.name}
                </h3>
                <p className="font-body font-light text-sm text-white/80 mt-1 mb-5">
                  {region.tagline}
                </p>
                <span className="inline-flex items-center gap-2 font-body font-medium text-sm text-white border border-white/40 rounded-full py-2.5 px-5 transition-all duration-300 group-hover:bg-warm-gold group-hover:border-warm-gold group-hover:text-mountain">
                  Discover More
                  <ArrowRight size={16} className="transition-transform duration-300 group-hover:translate-x-1" />
                </span>
              </div>
            </Link>
          ))}
        </div>
      </div>
    </section>
  );
}

import { Link, useParams } from 'react-router';
import { ArrowLeft } from 'lucide-react';
import { useScrollReveal } from '@/hooks/useScrollReveal';
import GoldButton from '@/components/GoldButton';
import { getRegionBySlug, slugify } from '@/lib/regionsData';

export default function RegionPage() {
  const { slug } = useParams<{ slug: string }>();
  const region = getRegionBySlug(slug);

  const gridRef = useScrollReveal<HTMLDivElement>({
    pattern: 'stagger',
    childSelector: '.place-card',
    stagger: 0.08,
  });

  if (!region) {
    return (
      <section className="section-padding text-center min-h-[60vh] flex flex-col items-center justify-center gap-6">
        <h1 className="font-display text-3xl text-mountain">Region not found</h1>
        <Link to="/" className="font-body text-emerald-green hover:underline">
          &larr; Back to Home
        </Link>
      </section>
    );
  }

  return (
    <>
      {/* Hero */}
      <section className="relative min-h-[55vh] md:min-h-[65vh] flex items-end overflow-hidden">
        <img
          src={region.heroImage}
          alt={region.name}
          className="absolute inset-0 w-full h-full object-cover"
        />
        <div
          className="absolute inset-0"
          style={{
            background:
              'linear-gradient(180deg, rgba(0,0,0,0.25) 0%, rgba(0,0,0,0.45) 60%, rgba(0,0,0,0.85) 100%)',
          }}
        />
        <div className="relative z-10 container-content pb-12 pt-32">
          <Link
            to="/#destinations"
            className="inline-flex items-center gap-2 font-body text-sm text-white/80 hover:text-warm-gold transition-colors mb-6"
          >
            <ArrowLeft size={16} />
            Back to Destinations
          </Link>
          <p className="font-body font-medium text-xs md:text-sm uppercase tracking-[0.12em] text-warm-gold mb-3">
            {region.overline}
          </p>
          <h1 className="font-display font-medium text-white leading-[1.05] tracking-[-0.02em] text-4xl md:text-6xl">
            {region.name}
          </h1>
          <p className="font-body font-light text-white/85 text-lg mt-4 max-w-[560px]">
            {region.tagline}
          </p>
        </div>
      </section>

      {/* Description + Places */}
      <section className="section-padding bg-white">
        <div className="container-content ">
          <div className=' flex flex-col justify-center items-center'>
            <h2 className="font-display font-medium text-2xl md:text-4xl text-mountain mb-8">
              Places to Visit in <span className='  reveal-item w-12 h-0.5 border-warm-gold mb-6'>{region.name}</span>
            </h2>

            <p className="font-body text-base md:text-lg text-stone-color leading-relaxed max-w-[760px] mb-14">
              {region.description}
            </p>
          </div>



          <div
            ref={gridRef}
            className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"
          >
            {region.places.map((place) => (
              <div
                key={place.name}
                className="place-card group relative aspect-[3/4] rounded-2xl overflow-hidden shadow-card hover:shadow-card-hover transition-shadow duration-300"
              >
                <img
                  src={place.image}
                  alt={place.name}
                  className="absolute inset-0 w-full h-full object-cover transition-transform duration-600 group-hover:scale-[1.08]"
                  loading="lazy"
                />
                <div
                  className="absolute inset-0"
                  style={{
                    background:
                      'linear-gradient(180deg, transparent 40%, rgba(0,0,0,0.75) 100%)',
                  }}
                />
                <div className="absolute bottom-0 left-0 right-0 p-6">
                  <h3 className="font-display font-medium text-xl text-white">
                    {place.name}
                  </h3>
                  <p className="font-body font-light text-sm text-white/80 mt-1 mb-3">
                    {place.subtitle}
                  </p>
                  <Link
                    to={`/destinations/${region.slug}/${slugify(place.name)}`}
                    className="inline-block font-body font-medium text-xs text-white border border-white/40 rounded-full py-2 px-4 transition-all duration-300 hover:bg-warm-gold hover:border-warm-gold hover:text-mountain"
                  >
                    More Details
                  </Link>
                </div>
              </div>
            ))}
          </div>

          <div className="text-center mt-16">
            <p className="font-body text-base text-stone-color mb-6">
              Ready to explore {region.name} with a local guide?
            </p>
            <GoldButton href="/#contact">Plan Your Trip</GoldButton>
          </div>
        </div>
      </section>
    </>
  );
}

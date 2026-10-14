import { Link, useParams } from 'react-router';
import { ArrowLeft } from 'lucide-react';
import GoldButton from '@/components/GoldButton';
import { getPlaceBySlug } from '@/lib/regionsData';

export default function PlaceDetailPage() {
  const { slug, placeSlug } = useParams<{ slug: string; placeSlug: string }>();
  const result = getPlaceBySlug(slug, placeSlug);

  if (!result) {
    return (
      <section className="section-padding text-center min-h-[60vh] flex flex-col items-center justify-center gap-6">
        <h1 className="font-display text-3xl text-mountain">Place not found</h1>
        <Link to="/" className="font-body text-emerald-green hover:underline">
          &larr; Back to Home
        </Link>
      </section>
    );
  }

  const { region, place } = result;

  return (
    <>
      {/* Hero */}
      <section className="relative min-h-[50vh] md:min-h-[60vh] flex items-end overflow-hidden">
        <img
          src={place.image}
          alt={place.name}
          className="absolute inset-0 w-full h-full object-cover "
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
            to={`/destinations/${region.slug}`}
            className="inline-flex items-center gap-2 font-body text-sm text-white/80 hover:text-warm-gold transition-colors mb-6"
          >
            <ArrowLeft size={16} />
            Back to {region.name}
          </Link>
          <p className="font-body font-medium text-xs md:text-sm uppercase tracking-[0.12em] text-warm-gold mb-3">
            {region.overline}
          </p>
          <h1 className="font-display font-medium text-white leading-[1.05] tracking-[-0.02em] text-4xl md:text-6xl">
            {place.name}
          </h1>
          <p className="font-body font-light text-white/85 text-lg mt-4 max-w-[560px]">
            {place.subtitle}
          </p>
        </div>
      </section>

      {/* Description + Gallery */}
      <section className="section-padding bg-white">
        <div className="container-content max-w-[900px]">
          <p className="font-body text-base md:text-lg text-stone-color leading-relaxed mb-12">
            {place.description ||
              `${place.name} is one of the must-visit places in ${region.name}, known for ${place.subtitle.toLowerCase()}. Ask us about including it in your custom itinerary.`}
          </p>

          {place.gallery && place.gallery.length > 0 && (
            <>
              <h2 className="font-display font-medium text-xl md:text-2xl text-mountain mb-6">
                More Photos
              </h2>
              <div className="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-16">
                {place.gallery.map((src, i) => (
                  <div
                    key={i}
                    className="aspect-square rounded-xl overflow-hidden shadow-card"
                  >
                    <img
                      src={src}
                      alt={`${place.name} ${i + 2}`}
                      className="w-full h-full object-cover"
                      loading="lazy"
                    />
                  </div>
                ))}
              </div>
            </>
          )}

          <div className="text-center border-t border-stone-color/10 pt-12">
            <p className="font-body text-base text-stone-color mb-6">
              Want to include {place.name} in your itinerary?
            </p>
            <GoldButton href="/#contact">Plan Your Trip</GoldButton>
          </div>
        </div>
      </section>
    </>
  );
}

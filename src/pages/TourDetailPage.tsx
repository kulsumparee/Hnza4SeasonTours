import { Link, useParams } from 'react-router';
import { ArrowLeft, Calendar, MapPin } from 'lucide-react';
import GoldButton from '@/components/GoldButton';
import { getTourBySlug } from '@/lib/toursData';

export default function TourDetailPage() {
  const { slug } = useParams<{ slug: string }>();
  const tour = getTourBySlug(slug);

  if (!tour) {
    return (
      <section className="section-padding text-center min-h-[60vh] flex flex-col items-center justify-center gap-6">
        <h1 className="font-display text-3xl text-mountain">Tour not found</h1>
        <Link to="/#tours" className="font-body text-emerald-green hover:underline">
          &larr; Back to Tours
        </Link>
      </section>
    );
  }

  const handleInquire = () => {
    const message = ['Tour Inquiry', `Tour: ${tour.name}`, `Duration: ${tour.duration}`].join('\n');
    window.open(
      `https://wa.me/923468486217?text=${encodeURIComponent(message)}`,
      '_blank',
      'noopener,noreferrer'
    );
  };

  return (
    <>
      {/* Hero */}
      <section className="relative min-h-[50vh] md:min-h-[60vh] flex items-end overflow-hidden">
        <img
          src={tour.heroImage}
          alt={tour.name}
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
            to="/#tours"
            className="inline-flex items-center gap-2 font-body text-sm text-white/80 hover:text-warm-gold transition-colors mb-6"
          >
            <ArrowLeft size={16} />
            Back to Tours
          </Link>
          <p className="font-body font-medium text-xs md:text-sm uppercase tracking-[0.12em] text-warm-gold mb-3">
            {tour.overline}
          </p>
          <h1 className="font-display font-medium text-white leading-[1.05] tracking-[-0.02em] text-4xl md:text-6xl">
            {tour.name}
          </h1>
          <p className="font-body font-light text-white/85 text-lg mt-4 max-w-[620px]">
            {tour.tagline}
          </p>
          <div className="flex items-center gap-2 mt-5 text-white/85">
            <Calendar size={16} className="text-warm-gold" />
            <span className="font-body text-sm">{tour.duration}</span>
          </div>
        </div>
      </section>

      {/* Overview */}
      <section className="section-padding bg-white">
        <div className="container-content max-w-[900px]">
          <p className="font-body text-base md:text-lg text-stone-color leading-relaxed mb-10">
            {tour.description}
          </p>

          <div className="flex flex-wrap gap-3 mb-16">
            {tour.highlights.map((h) => (
              <span
                key={h}
                className="inline-flex items-center gap-2 bg-emerald-green/10 text-emerald-green font-body text-sm px-4 py-2 rounded-full"
              >
                <MapPin size={14} />
                {h}
              </span>
            ))}
          </div>

          {/* Itinerary */}
          <h2 className="font-display font-medium text-2xl md:text-3xl text-mountain mb-8">
            Day-by-Day Itinerary
          </h2>

          <div className="space-y-0">
            {tour.itinerary.map((item, i) => (
              <div key={i} className="relative pl-10 pb-10 last:pb-0">
                {i !== tour.itinerary.length - 1 && (
                  <div className="absolute left-[11px] top-8 bottom-0 w-px bg-stone-color/15" />
                )}
                <div className="absolute left-0 top-1 w-6 h-6 rounded-full bg-warm-gold/15 border-2 border-warm-gold flex items-center justify-center">
                  <div className="w-2 h-2 rounded-full bg-warm-gold" />
                </div>
                <p className="font-body font-medium text-xs uppercase tracking-[0.1em] text-warm-gold mb-1.5">
                  {item.day}
                </p>
                <h3 className="font-display font-medium text-lg md:text-xl text-mountain mb-2">
                  {item.title}
                </h3>
                <p className="font-body text-[0.9375rem] text-stone-color leading-relaxed">
                  {item.details}
                </p>
              </div>
            ))}
          </div>

          <div className="text-center border-t border-stone-color/10 pt-12 mt-8">
            <p className="font-body text-base text-stone-color mb-6">
              Ready to book the {tour.name}?
            </p>
            <div className="flex flex-wrap items-center justify-center gap-4">
              <GoldButton onClick={handleInquire}>Inquire on WhatsApp</GoldButton>
              <Link
                to="/#contact"
                className="inline-flex items-center justify-center font-body font-medium text-[0.9375rem] text-mountain border-2 border-mountain/20 rounded-full px-9 py-3.5 transition-all duration-300 hover:border-warm-gold hover:text-warm-gold"
              >
                Get a Custom Quote
              </Link>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}

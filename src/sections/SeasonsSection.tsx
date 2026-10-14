import { useScrollReveal } from '@/hooks/useScrollReveal';
import SectionHeader from '@/components/SectionHeader';
import summer from "../lib/images/Sumer.jpg"
import winter from "../lib/images/winters.jpeg"
import autumn from "../lib/images/Autumn.jpeg"
import spring from "../lib/images/blossome.jpeg"

const seasons = [
  {
    label: 'SPRING',
    title: 'Spring Across Pakistan',
    description:
      'March to May. From apricot and cherry blossoms in Hunza and Chitral to the tulip gardens of Islamabad, the whole country bursts into color against snow-capped peaks.',
    bestFor: 'Blossoms & Mild Weather',
    image: spring,
  },
  {
    label: 'SUMMER',
    title: 'Summer Across Pakistan',
    description:
      'June to August. Lush green northern valleys, crystal-clear lakes perfect for boating, and full access to high mountain passes. The ideal time for adventure and family trips.',
    bestFor: 'Adventure & Family Tours',
    image: summer ,
  },
  {
    label: 'AUTUMN',
    title: 'Autumn Across Pakistan',
    description:
      'September to November. Hunza and Swat transform into golden paradises as poplar and fruit trees turn amber, while historical cities enjoy the clearest skies for sightseeing.',
    bestFor: 'Photography & Scenic Views',
    image: autumn,
  },
  {
    label: 'WINTER',
    title: 'Winter Across Pakistan',
    description:
      'December to February. Snow-covered northern valleys and cozy hill stations up north, alongside mild, pleasant weather for exploring Lahore, Multan, and the historical south.',
    bestFor: 'Peace & Snow Landscapes',
    image: winter,
  },
];

export default function SeasonsSection() {
  const headerRef = useScrollReveal<HTMLDivElement>({ pattern: 'fade-up' });
  const gridRef = useScrollReveal<HTMLDivElement>({
    pattern: 'stagger',
    childSelector: '.season-card',
    stagger: 0.15,
  });

  return (
    <section id="seasons" className="section-padding bg-golden-glow">
      <div className="container-content">
        <div ref={headerRef}>
          <SectionHeader
            overline="YEAR-ROUND BEAUTY"
            heading="Pakistan in Every Season"
            subheading="Each season paints Pakistan with its own magical colors. Discover which one calls to you."
            overlineColor="text-warm-gold"
          />
        </div>

        <div
          ref={gridRef}
          className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"
        >
          {seasons.map((season) => (
            <div
              key={season.label}
              className="season-card bg-white rounded-2xl overflow-hidden shadow-card transition-all duration-300 hover:-translate-y-1 hover:shadow-card-hover group"
            >
              {/* Image */}
              <div className="aspect-[4/3] overflow-hidden">
                <img
                  src={season.image}
                  alt={season.title}
                  className="w-full h-full object-cover transition-transform duration-600 group-hover:scale-[1.06]"
                />
              </div>
              {/* Content */}
              <div className="p-3">
                <p className="font-body font-medium text-xs uppercase tracking-[0.1em] text-warm-gold">
                  {season.label}
                </p>
                <h3 className="font-display font-medium text-xl md:text-2xl text-mountain mt-2">
                  {season.title}
                </h3>
                <p className="font-body text-[0.9375rem] text-stone-color mt-3 leading-relaxed">
                  {season.description}
                </p>
                <span className="inline-block mt-4 bg-emerald-green/10 text-emerald-green font-body font-medium text-xs px-4 py-1.5 rounded-full">
                  {season.bestFor}
                </span>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

import { useState } from 'react';
import { useScrollReveal } from '@/hooks/useScrollReveal';
import SectionHeader from '@/components/SectionHeader';
import karimabadVillage from '../lib/images/gallery/gallery2.jpeg';
import rakaposhiBloom from '../lib/images/gallery/gallery44.jpeg';
import passuConesHighway from '../lib/images/gallery/gallery13.jpeg';
import suspensionBridge from '../lib/images/gallery/gallery16.jpeg';
import hunzaElder from '../lib/images/gallery/gallery33.jpeg';
import glacierCamp from '../lib/images/gallery/galler3.jpeg';
import khunjerabPass from '../lib/images/gallery/gallery22.jpeg';
import trekkingPassu from '../lib/images/gallery/gallery5.jpeg';
import traditionalHome from '../lib/images/gallery/gallery17.jpeg';
import traditionalDress from '../lib/images/gallery/gallery9.jpeg';
import culturalFestival from '../lib/images/gallery/gallery66.jpeg';
import snowfallPass from '../lib/images/gallery/gallery18.jpeg';
import karakoramDrive from '../lib/images/gallery/gallery12.jpeg';
import riverRocks from '../lib/images/gallery/gallery19.jpeg';

const galleryImages = [
  { src: karimabadVillage, label: 'Karimabad Village Beneath the Karakoram Peaks', span: 'col-span-2 row-span-2' },
  { src: rakaposhiBloom, label: 'Rakaposhi Peak in Spring Bloom', span: 'col-span-1 row-span-1' },
  { src: passuConesHighway, label: 'Passu Cones Along the Karakoram Highway', span: 'col-span-1 row-span-1' },
  { src: suspensionBridge, label: 'Suspension Bridge Over the Hunza River', span: 'col-span-1 row-span-1' },
  { src: hunzaElder, label: 'Meeting a Hunza Elder', span: 'col-span-1 row-span-1' },
  { src: glacierCamp, label: 'Camping on the Glacier', span: 'col-span-1 row-span-1' },
  { src: khunjerabPass, label: 'Khunjerab Pass, Pak-China Border', span: 'col-span-2 row-span-1' },
  { src: trekkingPassu, label: 'Trekking to Passu Cones', span: 'col-span-1 row-span-1' },
  { src: traditionalHome, label: 'Exploring a Traditional Hunza Home', span: 'col-span-1 row-span-1' },
  { src: traditionalDress, label: 'Girls in Traditional Hunza Dress', span: 'col-span-2 row-span-1' },
  { src: culturalFestival, label: 'Cultural Festival Attire', span: 'col-span-1 row-span-1' },
  { src: snowfallPass, label: 'Snowfall on the Mountain Pass', span: 'col-span-1 row-span-1' },
  { src: karakoramDrive, label: 'Driving the Karakoram Highway', span: 'col-span-1 row-span-1' },
  { src: riverRocks, label: 'River Rocks in Gojal Valley', span: 'col-span-1 row-span-1' },
];

const INITIAL_VISIBLE_COUNT = 8; // fills the first 3 rows of the 4-column grid

export default function GallerySection() {
  const [showAll, setShowAll] = useState(false);
  const headerRef = useScrollReveal<HTMLDivElement>({ pattern: 'fade-up' });
  const gridRef = useScrollReveal<HTMLDivElement>({
    pattern: 'stagger',
    childSelector: '.gallery-item',
    stagger: 0.08,
  });

  const visibleImages = showAll ? galleryImages : galleryImages.slice(0, INITIAL_VISIBLE_COUNT);

  return (
    <section id="gallery" className="section-padding bg-white">
      <div className="container-content">
        <div ref={headerRef}>
          <SectionHeader
            overline="VISUAL JOURNEY"
            heading="Moments from Pakistan"
            overlineColor="text-emerald-green"
          />
        </div>

        <div
          ref={gridRef}
          className="grid grid-cols-2 md:grid-cols-4 gap-4 auto-rows-[200px]"
        >
          {visibleImages.map((img, index) => (
            <div
              key={index}
              className={`gallery-item group relative overflow-hidden rounded-xl ${img.span}`}
            >
              <img
                src={img.src}
                alt={img.label}
                className="absolute inset-0 w-full h-full object-cover transition-transform duration-600 group-hover:scale-[1.06]"
              />
              {/* Hover Overlay */}
              <div className="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-end">
                <span className="font-body font-medium text-sm text-white p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  {img.label}
                </span>
              </div>
            </div>
          ))}
        </div>

        {!showAll && galleryImages.length > INITIAL_VISIBLE_COUNT && (
          <div className="mt-10 text-center">
            <button
              type="button"
              onClick={() => setShowAll(true)}
              className="inline-flex items-center gap-2 font-body font-medium text-sm text-white bg-emerald-green rounded-full py-3 px-9 transition-all duration-300 hover:bg-warm-gold"
            >
              See More
            </button>
          </div>
        )}
      </div>
    </section>
  );
}

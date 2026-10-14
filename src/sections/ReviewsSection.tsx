import { useEffect, useState } from 'react';
import { useScrollReveal } from '@/hooks/useScrollReveal';
import SectionHeader from '@/components/SectionHeader';
import { Star } from 'lucide-react';
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselPrevious,
  CarouselNext,
  type CarouselApi,
} from '@/components/ui/carousel';

const reviews = [
  {
    stars: 5,
    review:
      'An absolutely magical experience! Our guide knew every hidden corner of Hunza and made our family trip unforgettable. Highly recommended!',
    name: 'Sarah & Ahmed Khan',
    detail: 'Family Tour · Summer 2024',
    avatar: 'https://media.istockphoto.com/id/2148093594/photo/beautiful-young-girl-in-a-hat-stands-against-the-backdrop-of-the-kilimanjaro-volcano-and.jpg?s=612x612&w=0&k=20&c=yNt4wjt9CBgZXK2_eC7WOK6MLnPesJNkIiUyJNRaGuw=',
  },
  {
    stars: 5,
    review:
      "We chose the photography tour and it exceeded every expectation. The autumn colors were beyond words. We came home with over 2,000 incredible photos.",
    name: 'James & Emily Chen',
    detail: 'Photography Tour · Autumn 2024',
    avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
  },
  {
    stars: 5,
    review:
      "The most well-organized tour we've ever experienced. Every detail was handled — transport, hotels, permits, meals. The hospitality touched our hearts deeply.",
    name: 'The Rahman Family',
    detail: 'Custom Tour · Spring 2024',
    avatar: 'https://img.magnific.com/free-photo/cheerful-indian-businessman-smiling-closeup-portrait-jobs-career-campaign_53876-129416.jpg?semt=ais_hybrid&w=740&q=80',
  },
  {
    stars: 5,
    review:
      "Our driver was punctual, friendly, and clearly loved sharing the culture and history of the country. The Khunjerab Pass crossing was a once-in-a-lifetime moment.",
    name: 'Hana & Daniyal Iqbal',
    detail: 'Honeymoon Tour · Winter 2024',
    avatar: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFLJRK5_czH7ZoaD2TEN9ursY_N9CnNGj-c7InAt2f9A&s=10',
  },
  {
    stars: 5,
    review:
      'Trekking to Deosai Plains with this team felt completely safe and well-paced. Worth every single rupee.',
    name: 'Markus Weber',
    detail: 'Trekking Tour · Summer 2024',
    avatar: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxdmpo8zF7VsbuLwCqCqyFa3jL8okzwXoT2O2KSrFpIg&s=10',
  },
];

export default function ReviewsSection() {
  const headerRef = useScrollReveal<HTMLDivElement>({ pattern: 'fade-up' });
  const carouselRef = useScrollReveal<HTMLDivElement>({ pattern: 'fade-up', delay: 0.1 });
  const [api, setApi] = useState<CarouselApi>();
  const [selectedIndex, setSelectedIndex] = useState(0);

  useEffect(() => {
    if (!api) return;
    const onSelect = () => setSelectedIndex(api.selectedScrollSnap());
    onSelect();
    api.on('select', onSelect);
    api.on('reInit', onSelect);
    return () => {
      api.off('select', onSelect);
      api.off('reInit', onSelect);
    };
  }, [api]);

  return (
    <section
      id="reviews"
      className="section-padding bg-mountain relative overflow-hidden"
    >
      {/* Decorative glow */}
      <div className="pointer-events-none absolute -top-32 left-1/2 -translate-x-1/2 w-[600px] h-[600px] rounded-full bg-warm-gold/10 blur-3xl" />

      <div className="container-content relative">
        <div ref={headerRef}>
          <SectionHeader
            overline="TESTIMONIALS"
            heading="What Our Guests Say"
            overlineColor="text-warm-gold"
            headingColor="text-white"
          />
        </div>

        <div ref={carouselRef} className="mt-12">
          <Carousel
            opts={{ loop: true, align: 'center' }}
            setApi={setApi}
            className="w-full"
          >
            <CarouselContent className="-ml-4 md:-ml-6 py-10">
              {reviews.map((review, index) => {
                const isActive = index === selectedIndex;
                return (
                  <CarouselItem
                    key={index}
                    className="pl-4 md:pl-6 basis-[88%] sm:basis-[70%] md:basis-[52%] lg:basis-[40%]"
                  >
                    <div
                      className={`review-card relative mx-auto max-w-md bg-white rounded-3xl pt-12 pb-8 px-6 md:px-8 shadow-2xl transition-all duration-500 ease-out ${
                        isActive
                          ? 'opacity-100 scale-100 blur-none'
                          : 'opacity-40 scale-90 blur-[1px]'
                      }`}
                    >
                      {/* Avatar */}
                      <img
                        src={review.avatar}
                        alt={review.name}
                        loading="lazy"
                        className="absolute -top-8 left-1/2 -translate-x-1/2 w-16 h-16 rounded-full object-cover ring-4 ring-white shadow-lg"
                      />

                      {/* Stars */}
                      <div className="flex justify-center gap-1 mt-2">
                        {Array.from({ length: review.stars }).map((_, i) => (
                          <Star
                            key={i}
                            size={14}
                            className="text-warm-gold fill-warm-gold"
                          />
                        ))}
                      </div>

                      {/* Review Text */}
                      <p className="font-body text-[0.9375rem] text-mountain text-center leading-relaxed italic mt-4">
                        "{review.review}"
                      </p>

                      {/* Reviewer Info */}
                      <p className="mt-6 font-body font-semibold text-center text-mountain">
                        {review.name}
                      </p>
                      <p className="font-body text-sm text-center text-emerald-green font-medium mt-0.5">
                        {review.detail}
                      </p>
                    </div>
                  </CarouselItem>
                );
              })}
            </CarouselContent>

            <div className="flex justify-center gap-4 mt-4">
              <CarouselPrevious className="static translate-y-0 bg-white/10 border-white/20 text-white hover:bg-warm-gold hover:text-mountain hover:border-warm-gold" />
              <CarouselNext className="static translate-y-0 bg-white/10 border-white/20 text-white hover:bg-warm-gold hover:text-mountain hover:border-warm-gold" />
            </div>
          </Carousel>
        </div>
      </div>
    </section>
  );
}

import { useEffect, useRef } from 'react';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { Shield, Heart, Map, Users } from 'lucide-react';
import GoldButton from '@/components/GoldButton';
import rakaposhi from '../lib/images/client1.png';
import aboutimg from '../lib/images/about11.jpg';
import Counter from '@/components/ui/counter';

gsap.registerPlugin(ScrollTrigger);

const stats = [
  { icon: Shield, number: 25, suffix: "+", label: "Years Experience" },
  { icon: Users, number: 2000, suffix: "+", label: "Happy Travelers" },
  { icon: Map, number: 500, suffix: "+", label: "Destinations" },
  { icon: Heart, number: 4, suffix: "", label: "Seasons of Tours" },
];

export default function AboutSection() {
  const sectionRef = useRef<HTMLElement>(null);
  const imgLeftRef = useRef<HTMLDivElement>(null);
  const imgRightRef = useRef<HTMLDivElement>(null);
  const textRef = useRef<HTMLDivElement>(null);
  const statsRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const ctx = gsap.context(() => {
      gsap.fromTo(imgLeftRef.current, { opacity: 0, y: 40 }, {
        opacity: 1, y: 0, duration: 0.9, ease: 'power2.out',
        scrollTrigger: { trigger: sectionRef.current, start: 'top 80%', toggleActions: 'play none none none' },
      });

      gsap.fromTo(imgRightRef.current, { opacity: 0, y: 60 }, {
        opacity: 1, y: 0, duration: 0.9, delay: 0.15, ease: 'power2.out',
        scrollTrigger: { trigger: sectionRef.current, start: 'top 80%', toggleActions: 'play none none none' },
      });

      if (textRef.current) {
        gsap.fromTo(
          textRef.current.querySelectorAll('.reveal-item'),
          { opacity: 0, y: 30 },
          {
            opacity: 1, y: 0, duration: 0.75, stagger: 0.1, ease: 'power2.out',
            scrollTrigger: { trigger: textRef.current, start: 'top 85%', toggleActions: 'play none none none' },
          }
        );
      }

      if (statsRef.current) {
        gsap.fromTo(
          statsRef.current.querySelectorAll('.stat-item'),
          { opacity: 0, y: 20 },
          {
            opacity: 1, y: 0, duration: 0.6, stagger: 0.1, ease: 'power2.out',
            scrollTrigger: { trigger: statsRef.current, start: 'top 90%', toggleActions: 'play none none none' },
          }
        );
      }
    }, sectionRef);

    return () => ctx.revert();
  }, []);

  return (
    <section ref={sectionRef} id="about" className="section-padding bg-white">
      <div className="container-content">

        {/* Top: text + images side by side */}
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

          {/* Images */}
          <div className="order-2 lg:order-1 flex gap-4 items-end">
            <div
              ref={imgLeftRef}
              className="w-[58%] aspect-[3/4] rounded-2xl overflow-hidden opacity-0"
            >
              <img
                src={aboutimg}
                alt="Badshahi Mosque, Lahore"
                className="w-full h-full object-cover"
              />
            </div>
            <div
              ref={imgRightRef}
              className="w-[38%] aspect-[4/5] rounded-2xl overflow-hidden mb-8 opacity-0"
            >
              <img
                src={rakaposhi}
                alt="Rakaposhi peak"
                className="w-full h-full object-cover"
              />
            </div>
          </div>

          {/* Text */}
          <div ref={textRef} className="order-1 lg:order-2 text-center lg:text-left">
            <p className="reveal-item font-body font-medium text-sm uppercase tracking-[0.12em] text-emerald-green mb-4">
              Your Local Guide
            </p>

            <h2 className="reveal-item font-display font-medium text-3xl md:text-4xl lg:text-5xl leading-tight text-mountain mb-6">
              I'm <span className='text-warm-gold'>Ibrahim Aliyar</span> <br /> Your Expert Local Guide
            </h2>

            <div className="reveal-item w-12 h-0.5 bg-warm-gold mb-6" />

            <p className="reveal-item font-body text-base text-stone-color leading-relaxed mb-4">
              Born and raised in the mountains of Hunza, I've spent over a decade sharing the
              hidden wonders of Pakistan with travelers from around the world from the
              Karakoram's icy peaks to the Mughal monuments of Lahore and the ancient ruins of
              the Indus Valley. What started as a passion for my homeland became a mission to
              show visitors the Pakistan that only locals know.
            </p>

            <p className="reveal-item font-body text-base text-stone-color leading-relaxed mb-10">
              I handle all logistics transport, permits, accommodations so you can simply
              immerse yourself in the beauty and history of the country. Safety, comfort, and
              authentic connections are at the heart of every tour.
            </p>

            <div className="reveal-item">
              <GoldButton href="#contact">Plan Your Journey</GoldButton>
            </div>
          </div>
        </div>

        {/* Stats row */}
        <div
          ref={statsRef}
          className="grid grid-cols-4 gap-8 mt-9 md:mt-20 pt-12 border-t border-stone-color/10"
        >
          {stats.map((stat) => (
            <div key={stat.label} className="stat-item opacity-0 flex flex-col items-center text-center gap-3">
              <div className="md:w-12 md:h-12 w-8 h-8 rounded-full bg-emerald-green/8 flex items-center justify-center">
                <stat.icon size={22} className="text-emerald-green" />
              </div>
              <p className="font-display font-semibold text-2xl md:text-4xl text-mountain">
                <Counter end={stat.number} suffix={stat.suffix} />
              </p>
              <p className="font-body text-[12px] md:text-sm text-stone-color">{stat.label}</p>
            </div>
          ))}
        </div>

      </div>
    </section>
  );
}

import { useEffect, useRef } from 'react';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import SectionHeader from '@/components/SectionHeader';

gsap.registerPlugin(ScrollTrigger);

const steps = [
  {
    number: '1',
    title: 'Contact Us',
    description: 'Reach out via WhatsApp, phone, or email. Share your travel dates, group size, and interests.',
  },
  {
    number: '2',
    title: 'We Customize',
    description: 'We design a personalized itinerary just for you, with recommendations based on the season.',
  },
  {
    number: '3',
    title: 'You Travel',
    description: 'Arrive in Pakistan and leave everything to us — transport, stays, permits, and local experiences.',
  },
  {
    number: '4',
    title: 'Enjoy & Remember',
    description: 'Immerse yourself in the beauty and history of Pakistan. Return home with memories that last a lifetime.',
  },
];

export default function HowItWorksSection() {
  const sectionRef = useRef<HTMLElement>(null);
  const lineRef = useRef<HTMLDivElement>(null);
  const stepsRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const ctx = gsap.context(() => {
      // Connector line animation
      gsap.fromTo(
        lineRef.current,
        { scaleX: 0 },
        {
          scaleX: 1,
          duration: 1,
          ease: 'power2.out',
          transformOrigin: 'left center',
          scrollTrigger: {
            trigger: sectionRef.current,
            start: 'top 85%',
            toggleActions: 'play none none none',
          },
        }
      );

      // Steps stagger
      if (stepsRef.current) {
        const stepItems = stepsRef.current.querySelectorAll('.step-item');
        gsap.fromTo(
          stepItems,
          { opacity: 0, y: 40 },
          {
            opacity: 1,
            y: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: 'power2.out',
            scrollTrigger: {
              trigger: sectionRef.current,
              start: 'top 85%',
              toggleActions: 'play none none none',
            },
          }
        );
      }
    }, sectionRef);

    return () => ctx.revert();
  }, []);

  return (
    <section ref={sectionRef} className="section-padding bg-white">
      <div className="container-content">
        <SectionHeader
          overline="SIMPLE PROCESS"
          heading="How to Start Your Journey"
          overlineColor="text-emerald-green"
        />

        <div ref={stepsRef} className="relative">
          {/* Connector Line (desktop only) */}
          <div
            ref={lineRef}
            className="hidden lg:block absolute top-10 left-[12.5%] right-[12.5%] h-0.5 bg-emerald-green/20 -z-0"
          />

          {/* Steps */}
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-6 relative z-10">
            {steps.map((step) => (
              <div key={step.number} className="step-item text-center">
                {/* Step Circle */}
                <div className="w-20 h-20 rounded-full bg-emerald-green flex items-center justify-center mx-auto transition-colors duration-300 hover:bg-warm-gold">
                  <span className="font-body font-semibold text-2xl text-white">
                    {step.number}
                  </span>
                </div>
                {/* Title */}
                <h3 className="font-display font-medium text-lg md:text-xl text-mountain mt-6">
                  {step.title}
                </h3>
                {/* Description */}
                <p className="font-body text-[0.9375rem] text-stone-color mt-3 max-w-[220px] mx-auto leading-relaxed">
                  {step.description}
                </p>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}

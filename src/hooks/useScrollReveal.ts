import { useEffect, useRef } from 'react';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

type RevealPattern = 'fade-up' | 'fade-in' | 'stagger' | 'clip-reveal';

interface ScrollRevealOptions {
  pattern?: RevealPattern;
  stagger?: number;
  duration?: number;
  delay?: number;
  y?: number;
  childSelector?: string;
}

export function useScrollReveal<T extends HTMLElement>(options: ScrollRevealOptions = {}) {
  const ref = useRef<T>(null);

  const {
    pattern = 'fade-up',
    stagger = 0.12,
    duration = 0.8,
    delay = 0,
    y = 40,
    childSelector,
  } = options;

  useEffect(() => {
    const element = ref.current;
    if (!element) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) {
      gsap.set(element, { opacity: 1, y: 0 });
      return;
    }

    const targets = childSelector ? element.querySelectorAll(childSelector) : element;

    let tween: gsap.core.Tween | gsap.core.Timeline;

    switch (pattern) {
      case 'fade-up':
        gsap.set(targets, { opacity: 0, y });
        tween = gsap.to(targets, {
          opacity: 1,
          y: 0,
          duration,
          delay,
          stagger: childSelector ? stagger : 0,
          ease: 'power2.out',
          scrollTrigger: {
            trigger: element,
            start: 'top 85%',
            toggleActions: 'play none none none',
          },
        });
        break;

      case 'fade-in':
        gsap.set(targets, { opacity: 0 });
        tween = gsap.to(targets, {
          opacity: 1,
          duration,
          delay,
          ease: 'power2.out',
          scrollTrigger: {
            trigger: element,
            start: 'top 85%',
            toggleActions: 'play none none none',
          },
        });
        break;

      case 'stagger':
        gsap.set(targets, { opacity: 0, y });
        tween = gsap.to(targets, {
          opacity: 1,
          y: 0,
          duration,
          delay,
          stagger,
          ease: 'power2.out',
          scrollTrigger: {
            trigger: element,
            start: 'top 85%',
            toggleActions: 'play none none none',
          },
        });
        break;

      case 'clip-reveal':
        gsap.set(targets, { clipPath: 'inset(0 100% 0 0)' });
        tween = gsap.to(targets, {
          clipPath: 'inset(0 0% 0 0)',
          duration,
          delay,
          ease: 'power2.out',
          scrollTrigger: {
            trigger: element,
            start: 'top 85%',
            toggleActions: 'play none none none',
          },
        });
        break;
    }

    return () => {
      if (tween) tween.kill();
      ScrollTrigger.getAll().forEach(st => {
        if (st.trigger === element) st.kill();
      });
    };
  }, [pattern, stagger, duration, delay, y, childSelector]);

  return ref;
}

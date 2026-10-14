/**
 * Hunza 4 Season Tours - front-end behaviour.
 *
 * Vanilla replacement for the React hooks/effects of the original app:
 * Lenis smooth scrolling, GSAP ScrollTrigger reveals, hero intro + parallax,
 * sticky nav + mobile menu, counters, gallery "See More", FAQ accordion,
 * Embla reviews carousel, WhatsApp search widget and contact form.
 *
 * Globals provided by the enqueued vendor scripts: gsap, ScrollTrigger,
 * Lenis, EmblaCarousel. Contact details come from the H4S object printed by
 * wp_localize_script().
 */
(function () {
  'use strict';

  var settings = window.H4S || {};
  var WHATSAPP = settings.whatsapp || '923468486217';
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var hasGsap = typeof window.gsap !== 'undefined';
  var lenis = null;

  if (hasGsap && typeof window.ScrollTrigger !== 'undefined') {
    gsap.registerPlugin(ScrollTrigger);
  }

  function $(selector, root) {
    return (root || document).querySelector(selector);
  }

  function $$(selector, root) {
    return Array.prototype.slice.call((root || document).querySelectorAll(selector));
  }

  function openWhatsApp(lines) {
    var message = lines.filter(Boolean).join('\n');
    window.open(
      'https://wa.me/' + WHATSAPP + '?text=' + encodeURIComponent(message),
      '_blank',
      'noopener,noreferrer'
    );
  }

  /* ------------------------------------------------------------------ */
  /* Smooth scrolling (Layout.tsx)                                       */
  /* ------------------------------------------------------------------ */

  function initLenis() {
    if (reduceMotion || typeof window.Lenis === 'undefined' || !hasGsap) {
      return;
    }

    lenis = new Lenis({
      duration: 1.2,
      easing: function (t) {
        return Math.min(1, 1.001 - Math.pow(2, -10 * t));
      },
    });

    lenis.on('scroll', ScrollTrigger.update);

    gsap.ticker.add(function (time) {
      lenis.raf(time * 1000);
    });
    gsap.ticker.lagSmoothing(0);
  }

  function scrollToElement(el, immediate) {
    if (!el) return;
    if (lenis) {
      lenis.scrollTo(el, { immediate: !!immediate });
    } else {
      el.scrollIntoView({ behavior: immediate || reduceMotion ? 'auto' : 'smooth' });
    }
  }

  function initAnchorLinks() {
    // Same-page hash links scroll smoothly instead of jumping.
    document.addEventListener('click', function (event) {
      var link = event.target.closest('a[href*="#"]');
      if (!link) return;

      var url;
      try {
        url = new URL(link.getAttribute('href'), window.location.href);
      } catch (e) {
        return;
      }

      if (url.origin !== window.location.origin || url.pathname !== window.location.pathname || !url.hash) {
        return;
      }

      var target = document.getElementById(decodeURIComponent(url.hash.slice(1)));
      if (!target) return;

      event.preventDefault();
      closeMobileMenu();
      scrollToElement(target);
      if (window.history && window.history.pushState) {
        window.history.pushState(null, '', url.hash);
      }
    });

    // Landing on /#section from another page.
    if (window.location.hash) {
      var target = document.getElementById(decodeURIComponent(window.location.hash.slice(1)));
      if (target) {
        window.requestAnimationFrame(function () {
          scrollToElement(target);
        });
      }
    }
  }

  /* ------------------------------------------------------------------ */
  /* Navigation (Navigation.tsx)                                         */
  /* ------------------------------------------------------------------ */

  var nav = $('[data-nav]');
  var mobileMenu = $('[data-mobile-menu]');
  var navToggle = $('[data-nav-toggle]');
  var mobileOpen = false;

  function setMobileMenu(open) {
    mobileOpen = open;
    if (!mobileMenu) return;

    mobileMenu.classList.toggle('translate-x-0', open);
    mobileMenu.classList.toggle('translate-x-full', !open);
    document.body.style.overflow = open ? 'hidden' : '';

    if (navToggle) {
      navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      var icons = navToggle.querySelectorAll('svg');
      if (icons.length === 2) {
        icons[0].classList.toggle('hidden', open);
        icons[1].classList.toggle('hidden', !open);
      }
    }
  }

  function closeMobileMenu() {
    if (mobileOpen) setMobileMenu(false);
  }

  function initNavigation() {
    if (!nav) return;

    var scrolledClasses = ['bg-white/95', 'backdrop-blur-md', 'shadow-[0_1px_10px_rgba(0,0,0,0.06)]'];

    function onScroll() {
      var scrolled = window.scrollY > 100;
      scrolledClasses.forEach(function (cls) {
        nav.classList.toggle(cls, scrolled);
      });
      nav.classList.toggle('bg-transparent', !scrolled);
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    if (navToggle) {
      navToggle.addEventListener('click', function () {
        setMobileMenu(!mobileOpen);
      });
    }

    if (mobileMenu) {
      $$('a', mobileMenu).forEach(function (link) {
        link.addEventListener('click', closeMobileMenu);
      });
    }

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape') closeMobileMenu();
    });
  }

  /* ------------------------------------------------------------------ */
  /* Floating WhatsApp button (FloatingWhatsApp.tsx)                     */
  /* ------------------------------------------------------------------ */

  function initFloatingWhatsApp() {
    var button = $('[data-floating-whatsapp]');
    if (!button || reduceMotion || !hasGsap) return;

    gsap.fromTo(
      button,
      { y: 100, opacity: 0 },
      { y: 0, opacity: 1, duration: 0.6, delay: 2, ease: 'power2.out' }
    );
  }

  /* ------------------------------------------------------------------ */
  /* Scroll reveals (useScrollReveal.ts)                                 */
  /* ------------------------------------------------------------------ */

  function initScrollReveal() {
    var elements = $$('[data-reveal]');
    if (!elements.length) return;

    if (reduceMotion || !hasGsap) {
      elements.forEach(function (el) {
        el.style.opacity = '1';
      });
      return;
    }

    elements.forEach(function (element) {
      var pattern = element.getAttribute('data-reveal') || 'fade-up';
      var childSelector = element.getAttribute('data-reveal-children');
      var stagger = parseFloat(element.getAttribute('data-reveal-stagger') || '0.12');
      var duration = parseFloat(element.getAttribute('data-reveal-duration') || '0.8');
      var delay = parseFloat(element.getAttribute('data-reveal-delay') || '0');
      var y = parseFloat(element.getAttribute('data-reveal-y') || '40');

      var targets = childSelector ? element.querySelectorAll(childSelector) : element;
      if (childSelector && !targets.length) return;

      var trigger = {
        trigger: element,
        start: 'top 85%',
        toggleActions: 'play none none none',
      };

      switch (pattern) {
        case 'fade-in':
          gsap.set(targets, { opacity: 0 });
          gsap.to(targets, { opacity: 1, duration: duration, delay: delay, ease: 'power2.out', scrollTrigger: trigger });
          break;
        case 'stagger':
          gsap.set(targets, { opacity: 0, y: y });
          gsap.to(targets, { opacity: 1, y: 0, duration: duration, delay: delay, stagger: stagger, ease: 'power2.out', scrollTrigger: trigger });
          break;
        case 'clip-reveal':
          gsap.set(targets, { clipPath: 'inset(0 100% 0 0)' });
          gsap.to(targets, { clipPath: 'inset(0 0% 0 0)', duration: duration, delay: delay, ease: 'power2.out', scrollTrigger: trigger });
          break;
        case 'fade-up':
        default:
          gsap.set(targets, { opacity: 0, y: y });
          gsap.to(targets, {
            opacity: 1,
            y: 0,
            duration: duration,
            delay: delay,
            stagger: childSelector ? stagger : 0,
            ease: 'power2.out',
            scrollTrigger: trigger,
          });
      }
    });
  }

  /* ------------------------------------------------------------------ */
  /* Hero (HeroSection.tsx)                                              */
  /* ------------------------------------------------------------------ */

  function initHero() {
    var section = $('[data-hero]');
    if (!section) return;

    var bg = $('[data-hero-bg]', section);
    var overline = $('[data-hero-overline]', section);
    var sub = $('[data-hero-sub]', section);
    var cta = $('[data-hero-cta]', section);
    var scrollIndicator = $('[data-hero-scroll]', section);
    var fadeTargets = [overline, sub, scrollIndicator].concat(cta ? $$(':scope > *', cta) : []).filter(Boolean);

    if (scrollIndicator) {
      scrollIndicator.addEventListener('click', function () {
        scrollToElement(section.nextElementSibling);
      });
    }

    // Rotate backgrounds every 5 seconds.
    if (bg) {
      var backgrounds = [];
      try {
        backgrounds = JSON.parse(bg.getAttribute('data-backgrounds') || '[]');
      } catch (e) {
        backgrounds = [];
      }

      if (backgrounds.length > 1) {
        backgrounds.forEach(function (src) {
          var img = new Image();
          img.src = src;
        });

        var current = 0;
        window.setInterval(function () {
          current = (current + 1) % backgrounds.length;
          bg.style.backgroundImage = 'url("' + backgrounds[current] + '")';
        }, 5000);
      }
    }

    if (reduceMotion || !hasGsap) {
      fadeTargets.forEach(function (el) {
        el.style.opacity = '1';
      });
      return;
    }

    var tl = gsap.timeline();

    if (bg) {
      tl.fromTo(bg, { opacity: 0, scale: 1.05 }, { opacity: 1, scale: 1, duration: 1.5, ease: 'power2.out' });
    }
    if (overline) {
      tl.fromTo(overline, { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.6, ease: 'power2.out' }, '-=0.8');
    }
    if (sub) {
      tl.fromTo(sub, { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.6, ease: 'power2.out' }, '-=0.4');
    }
    if (cta && cta.children.length) {
      tl.fromTo(cta.children, { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.6, stagger: 0.1, ease: 'power2.out' }, '-=0.3');
    }
    if (scrollIndicator) {
      tl.fromTo(scrollIndicator, { opacity: 0 }, { opacity: 1, duration: 0.5, ease: 'power2.out' }, '-=0.1');
    }

    // Parallax on the background.
    if (bg) {
      ScrollTrigger.create({
        trigger: section,
        start: 'top top',
        end: 'bottom top',
        scrub: true,
        onUpdate: function (self) {
          gsap.set(bg, { y: self.progress * 150 });
        },
      });
    }
  }

  /* ------------------------------------------------------------------ */
  /* About section reveals (AboutSection.tsx)                            */
  /* ------------------------------------------------------------------ */

  function initAbout() {
    var section = $('[data-about]');
    if (!section) return;

    var imgLeft = $('[data-about-img-left]', section);
    var imgRight = $('[data-about-img-right]', section);
    var text = $('[data-about-text]', section);
    var stats = $('[data-about-stats]', section);

    if (reduceMotion || !hasGsap) {
      [imgLeft, imgRight].concat($$('.stat-item', section)).forEach(function (el) {
        if (el) el.style.opacity = '1';
      });
      return;
    }

    var sectionTrigger = { trigger: section, start: 'top 80%', toggleActions: 'play none none none' };

    if (imgLeft) {
      gsap.fromTo(imgLeft, { opacity: 0, y: 40 }, { opacity: 1, y: 0, duration: 0.9, ease: 'power2.out', scrollTrigger: sectionTrigger });
    }
    if (imgRight) {
      gsap.fromTo(imgRight, { opacity: 0, y: 60 }, { opacity: 1, y: 0, duration: 0.9, delay: 0.15, ease: 'power2.out', scrollTrigger: sectionTrigger });
    }
    if (text) {
      gsap.fromTo(
        text.querySelectorAll('.reveal-item'),
        { opacity: 0, y: 30 },
        { opacity: 1, y: 0, duration: 0.75, stagger: 0.1, ease: 'power2.out', scrollTrigger: { trigger: text, start: 'top 85%', toggleActions: 'play none none none' } }
      );
    }
    if (stats) {
      gsap.fromTo(
        stats.querySelectorAll('.stat-item'),
        { opacity: 0, y: 20 },
        { opacity: 1, y: 0, duration: 0.6, stagger: 0.1, ease: 'power2.out', scrollTrigger: { trigger: stats, start: 'top 90%', toggleActions: 'play none none none' } }
      );
    }
  }

  /* ------------------------------------------------------------------ */
  /* Counters (ui/counter.tsx)                                           */
  /* ------------------------------------------------------------------ */

  function initCounters() {
    var counters = $$('[data-counter]');
    if (!counters.length) return;

    function run(el) {
      var end = parseInt(el.getAttribute('data-counter-end') || '0', 10);
      var suffix = el.getAttribute('data-counter-suffix') || '';
      var duration = parseInt(el.getAttribute('data-counter-duration') || '2000', 10);

      if (reduceMotion || !('requestAnimationFrame' in window)) {
        el.textContent = end + suffix;
        return;
      }

      var current = 0;
      var increment = end / (duration / 16);
      var timer = window.setInterval(function () {
        current += increment;
        if (current >= end) {
          el.textContent = end + suffix;
          window.clearInterval(timer);
        } else {
          el.textContent = Math.floor(current) + suffix;
        }
      }, 16);
    }

    if (!('IntersectionObserver' in window)) {
      counters.forEach(run);
      return;
    }

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            run(entry.target);
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.5 }
    );

    counters.forEach(function (el) {
      observer.observe(el);
    });
  }

  /* ------------------------------------------------------------------ */
  /* Gallery "See More" (GallerySection.tsx)                             */
  /* ------------------------------------------------------------------ */

  function initGallery() {
    var button = $('[data-gallery-more]');
    var wrap = $('[data-gallery-more-wrap]');
    if (!button) return;

    button.addEventListener('click', function () {
      var hidden = $$('[data-gallery-hidden]');
      hidden.forEach(function (item) {
        item.classList.remove('hidden');
        item.removeAttribute('data-gallery-hidden');
      });

      if (hasGsap && !reduceMotion && hidden.length) {
        gsap.fromTo(hidden, { opacity: 0, y: 40 }, { opacity: 1, y: 0, duration: 0.6, stagger: 0.08, ease: 'power2.out' });
      }

      if (wrap) wrap.remove();
      if (hasGsap && typeof ScrollTrigger !== 'undefined') ScrollTrigger.refresh();
    });
  }

  /* ------------------------------------------------------------------ */
  /* FAQ accordion (FAQSection.tsx)                                      */
  /* ------------------------------------------------------------------ */

  function initFaq() {
    var root = $('[data-faq]');
    if (!root) return;

    var items = $$('.faq-item', root);

    function setOpen(item, open) {
      var toggle = $('[data-faq-toggle]', item);
      var answer = $('[data-faq-answer]', item);
      var icon = toggle ? $('svg', toggle) : null;
      if (!toggle || !answer) return;

      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      answer.style.maxHeight = open ? Math.max(answer.scrollHeight, 300) + 'px' : '0px';
      if (icon) icon.classList.toggle('rotate-180', open);
      item.setAttribute('data-open', open ? 'true' : 'false');
    }

    items.forEach(function (item) {
      var toggle = $('[data-faq-toggle]', item);
      if (!toggle) return;

      toggle.addEventListener('click', function () {
        var isOpen = item.getAttribute('data-open') === 'true';
        items.forEach(function (other) {
          setOpen(other, false);
        });
        if (!isOpen) setOpen(item, true);
      });
    });
  }

  /* ------------------------------------------------------------------ */
  /* Reviews carousel (ReviewsSection.tsx + ui/carousel.tsx)             */
  /* ------------------------------------------------------------------ */

  function initReviewsCarousel() {
    var root = $('[data-reviews-carousel]');
    if (!root || typeof window.EmblaCarousel === 'undefined') return;

    var viewport = $('[data-carousel-viewport]', root);
    var prev = $('[data-carousel-prev]', root);
    var next = $('[data-carousel-next]', root);
    var cards = $$('[data-review-card]', root);
    if (!viewport) return;

    var embla = EmblaCarousel(viewport, { loop: true, align: 'center' });

    var activeClasses = ['opacity-100', 'scale-100', 'blur-none'];
    var inactiveClasses = ['opacity-40', 'scale-90', 'blur-[1px]'];

    function onSelect() {
      var selected = embla.selectedScrollSnap();
      cards.forEach(function (card, index) {
        var active = index === selected;
        activeClasses.forEach(function (cls) {
          card.classList.toggle(cls, active);
        });
        inactiveClasses.forEach(function (cls) {
          card.classList.toggle(cls, !active);
        });
      });
      if (prev) prev.disabled = !embla.canScrollPrev();
      if (next) next.disabled = !embla.canScrollNext();
    }

    if (prev) prev.addEventListener('click', embla.scrollPrev);
    if (next) next.addEventListener('click', embla.scrollNext);

    root.addEventListener('keydown', function (event) {
      if (event.key === 'ArrowLeft') {
        event.preventDefault();
        embla.scrollPrev();
      } else if (event.key === 'ArrowRight') {
        event.preventDefault();
        embla.scrollNext();
      }
    });

    embla.on('select', onSelect);
    embla.on('reInit', onSelect);
    onSelect();
  }

  /* ------------------------------------------------------------------ */
  /* Search widget (SearchWidget.tsx)                                    */
  /* ------------------------------------------------------------------ */

  function initSearchWidget() {
    var form = $('[data-search-widget]');
    if (!form) return;

    var checkin = $('[data-date="checkin"]', form);
    var checkout = $('[data-date="checkout"]', form);

    function openPicker(input) {
      if (!input) return;
      if (typeof input.showPicker === 'function') {
        try {
          input.showPicker();
          return;
        } catch (e) {
          /* showPicker needs a user gesture; fall back to focus. */
        }
      }
      input.focus();
    }

    $$('[data-open-picker]', form).forEach(function (button) {
      button.addEventListener('click', function () {
        openPicker($('[data-date="' + button.getAttribute('data-open-picker') + '"]', form));
      });
    });

    [checkin, checkout].forEach(function (input) {
      if (!input) return;
      input.addEventListener('click', function () {
        openPicker(input);
      });
    });

    if (checkin && checkout) {
      checkin.addEventListener('change', function () {
        if (checkin.value) {
          checkout.min = checkin.value;
          if (checkout.value && checkout.value < checkin.value) checkout.value = '';
        } else {
          checkout.removeAttribute('min');
        }
      });
    }

    form.addEventListener('submit', function (event) {
      event.preventDefault();
      var data = new FormData(form);
      var from = (data.get('from') || '').toString().trim();
      var to = (data.get('to') || '').toString().trim();
      var guests = (data.get('guests') || '').toString().trim();
      var inDate = (data.get('checkin') || '').toString();
      var outDate = (data.get('checkout') || '').toString();

      openWhatsApp([
        'Tour Search from Website',
        'From: ' + (from || '-'),
        'To: ' + (to || '-'),
        inDate && 'Check-in: ' + inDate,
        outDate && 'Check-out: ' + outDate,
        'Guests: ' + (guests || '-'),
      ]);
    });
  }

  /* ------------------------------------------------------------------ */
  /* Contact form (ContactSection.tsx)                                   */
  /* ------------------------------------------------------------------ */

  function initContactForm() {
    var form = $('[data-contact-form]');
    if (!form) return;

    var success = $('[data-contact-success]');
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    function fieldValue(name) {
      var field = form.elements[name];
      return field ? String(field.value || '').trim() : '';
    }

    function setError(name, message) {
      var el = $('[data-error-for="' + name + '"]', form);
      if (!el) return;
      el.textContent = message || '';
      el.classList.toggle('hidden', !message);
    }

    function validate() {
      var valid = true;

      $$('[data-required]', form).forEach(function (field) {
        var name = field.getAttribute('name');
        var value = String(field.value || '').trim();
        var message = '';

        if (!value) {
          message = field.getAttribute('data-error-message') || '';
        } else if (field.type === 'email' && !emailPattern.test(value)) {
          message = field.getAttribute('data-invalid-message') || field.getAttribute('data-error-message') || '';
        }

        setError(name, message);
        if (message) valid = false;
      });

      return valid;
    }

    $$('[data-required]', form).forEach(function (field) {
      field.addEventListener('input', function () {
        setError(field.getAttribute('name'), '');
      });
      field.addEventListener('change', function () {
        setError(field.getAttribute('name'), '');
      });
    });

    form.addEventListener('submit', function (event) {
      event.preventDefault();
      if (!validate()) return;

      var travelDates = fieldValue('travelDates');
      var groupSize = fieldValue('groupSize');
      var message = fieldValue('message');

      openWhatsApp([
        'New Inquiry from Website',
        'Name: ' + fieldValue('name'),
        'Email: ' + fieldValue('email'),
        'Phone: ' + fieldValue('phone'),
        'Interested In: ' + fieldValue('tourType'),
        travelDates && 'Travel Dates: ' + travelDates,
        groupSize && 'Group Size: ' + groupSize,
        message && 'Message: ' + message,
      ]);

      form.classList.add('hidden');
      if (success) success.classList.remove('hidden');
    });
  }

  /* ------------------------------------------------------------------ */

  function init() {
    initLenis();
    initNavigation();
    initAnchorLinks();
    initFloatingWhatsApp();
    initScrollReveal();
    initHero();
    initAbout();
    initCounters();
    initGallery();
    initFaq();
    initReviewsCarousel();
    initSearchWidget();
    initContactForm();

    if (hasGsap && typeof ScrollTrigger !== 'undefined') {
      window.addEventListener('load', function () {
        ScrollTrigger.refresh();
      });
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();

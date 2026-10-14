import { useState } from 'react';
import { useScrollReveal } from '@/hooks/useScrollReveal';
import SectionHeader from '@/components/SectionHeader';
import { ChevronDown } from 'lucide-react';

const faqs = [
  {
    question: 'How do I book a tour with Hunza 4 Season Tours?',
    answer:
      'Simply contact us via WhatsApp at +92 347 9022013, call us directly, or fill out the inquiry form below. We\'ll discuss your preferences and create a custom itinerary for you.',
  },
  {
    question: 'What is the best time to visit Pakistan?',
    answer:
      'Pakistan is beautiful year-round! Spring (Mar-May) offers cherry blossoms in the north, summer (Jun-Aug) has lush greenery and lake activities, autumn (Sep-Nov) brings golden colors, and winter (Dec-Feb) is ideal for exploring the historical south. Summer is the most popular season for the northern areas.',
  },
  {
    question: 'How much does a typical tour cost?',
    answer:
      'Our tours start from PKR 25,000 per person for family tours. Prices vary based on group size, duration, accommodation type, destinations, and season. Contact us for a detailed, no-obligation quote.',
  },
  {
    question: 'Is Pakistan safe for tourists?',
    answer:
      'Yes, the regions we operate in — from the northern valleys to the major historical cities — are welcoming and well-travelled by tourists. The local community is incredibly hospitable. We ensure all safety measures are in place for transport, accommodations, and activities.',
  },
  {
    question: 'Do you provide transport and accommodation?',
    answer:
      'Absolutely. We arrange comfortable private transport (Prado, Coaster, or car based on group size) and quality hotel accommodations throughout your trip.',
  },
  {
    question: 'Can I customize my tour itinerary?',
    answer:
      'Yes! All our tours are fully customizable. Whether you want to focus on photography, trekking, cultural experiences, or a relaxed family trip — we design it around your interests.',
  },
  {
    question: 'Do you offer tours for international tourists?',
    answer:
      'Yes, we warmly welcome international guests. We can assist with travel planning from Islamabad, including flights to Gilgit if needed. English-speaking guides are available.',
  },
];

export default function FAQSection() {
  const [openIndex, setOpenIndex] = useState<number | null>(null);
  const headerRef = useScrollReveal<HTMLDivElement>({ pattern: 'fade-up' });
  const listRef = useScrollReveal<HTMLDivElement>({
    pattern: 'stagger',
    childSelector: '.faq-item',
    stagger: 0.08,
  });

  const toggleFaq = (index: number) => {
    setOpenIndex(openIndex === index ? null : index);
  };

  return (
    <section id="faq" className="section-padding bg-ice">
      <div className="max-w-[800px] mx-auto px-4 sm:px-6">
        <div ref={headerRef}>
          <SectionHeader
            overline="COMMON QUESTIONS"
            heading="Frequently Asked Questions"
            overlineColor="text-emerald-green"
          />
        </div>

        <div ref={listRef} className="space-y-3">
          {faqs.map((faq, index) => (
            <div
              key={index}
              className="faq-item bg-white rounded-xl shadow-card overflow-hidden"
            >
              <button
                onClick={() => toggleFaq(index)}
                className="w-full flex items-center justify-between px-3 md:px-7 py-5 text-left hover:bg-emerald-green/[0.03] transition-colors"
              >
                <span className="font-body font-medium text-base text-mountain pr-4">
                  {faq.question}
                </span>
                <ChevronDown
                  size={20}
                  className={`text-stone-color flex-shrink-0 transition-transform duration-300 ${
                    openIndex === index ? 'rotate-180' : ''
                  }`}
                />
              </button>
              <div
                className="overflow-hidden transition-[max-height] duration-400 ease-in-out"
                style={{
                  maxHeight: openIndex === index ? '300px' : '0px',
                }}
              >
                <p className="font-body text-[0.9375rem] text-stone-color leading-relaxed px-6 md:px-7 pb-5">
                  {faq.answer}
                </p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

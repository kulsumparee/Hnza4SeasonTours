import HeroSection from '@/sections/HeroSection';
import SearchWidget from '@/components/SearchWidget';
import AboutSection from '@/sections/AboutSection';
import DestinationsSection from '@/sections/DestinationsSection';
// import PackagesSection from '@/sections/PackagesSection';
import ToursSection from '@/sections/ToursSection';
import CarRentSection from '@/sections/CarRentSection';
import GallerySection from '@/sections/GallerySection';
import ReviewsSection from '@/sections/ReviewsSection';
// import HowItWorksSection from '@/sections/HowItWorksSection';
import FAQSection from '@/sections/FAQSection';
import ContactSection from '@/sections/ContactSection';
import WhyUsSection from '@/sections/WhyUsSection';
import SeasonsSection from '@/sections/SeasonsSection';

export default function Home() {
  return (
    <>
      <HeroSection />
      <SearchWidget />
      <DestinationsSection />
      <AboutSection />
      {/* <PackagesSection /> */}
      <ToursSection />
      <CarRentSection />
      <SeasonsSection/>
      {/* <WhyUsSection /> */}
      <GallerySection />
      <ReviewsSection />
      {/* <HowItWorksSection /> */}
      <FAQSection />
      <ContactSection />
    </>
  );
}

import { useState, useEffect } from 'react';
import { Link } from 'react-router';
import { Menu, X } from 'lucide-react';
import GoldButton from './GoldButton';
import logo from '../lib/images/logo1.png';

const navLinks = [
  { label: 'Destinations', href: '/#destinations' },
  { label: 'AboutUs', href: '/#about' },
  { label: 'Itineraries', href: '/#tours' },
  { label: 'Car Rent', href: '/#car-rent' },
  { label: 'Gallery', href: '/#gallery' },
  { label: 'Reviews', href: '/#reviews' },
];

export default function Navigation() {
  const [scrolled, setScrolled] = useState(false);
  const [mobileOpen, setMobileOpen] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      setScrolled(window.scrollY > 100);
    };
    window.addEventListener('scroll', handleScroll, { passive: true });
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  useEffect(() => {
    if (mobileOpen) {
      document.body.style.overflow = 'hidden';
    } else {
      document.body.style.overflow = '';
    }
    return () => {
      document.body.style.overflow = '';
    };
  }, [mobileOpen]);

  const handleLinkClick = () => {
    setMobileOpen(false);
  };

  return (
    <>
      <nav
        className={`fixed top-0 left-0 right-0 z-[1000] bg-white h-16 md:h-20 transition-all duration-400 ${
          scrolled
            ? 'bg-white/95 backdrop-blur-md shadow-[0_1px_10px_rgba(0,0,0,0.06)]'
            : 'bg-transparent'
        }`}
      >
        <div className="max-w-content mx-auto h-full flex items-center justify-between px-4 sm:px-6 lg:px-8">
          {/* Logo */}
          <Link to="/" className="flex items-center">
            <img src={logo} alt="Hunza 4 Season Tours" className="h-12 md:h-14 w-auto" />
          </Link>

          {/* Desktop Links */}
          <div className="hidden lg:flex items-center gap-8">
            {navLinks.map((link) => (
              <Link
                key={link.label}
                to={link.href}
                className="font-display text-mountain transition-colors duration-300 hover:text-warm-gold"
              >
                {link.label}
              </Link>
            ))}
          </div>

          {/* Desktop CTA */}
          <div className="hidden lg:block">
            <GoldButton href="/#contact" className="text-sm py-2.5 px-6">
              Book Your Tour
            </GoldButton>
          </div>

          {/* Mobile Hamburger */}
          <button
            onClick={() => setMobileOpen(!mobileOpen)}
            className="lg:hidden p-2 text-mountain transition-colors hover:text-warm-gold"
            aria-label="Toggle menu"
          >
            {mobileOpen ? <X size={24} /> : <Menu size={24} />}
          </button>
        </div>
      </nav>

      {/* Mobile Menu Overlay */}
      <div
        className={`fixed inset-0 z-[999] bg-white transition-transform duration-400 lg:hidden ${
          mobileOpen ? 'translate-x-0' : 'translate-x-full'
        }`}
      >
        <div className="flex flex-col items-center justify-center pt-10 h-full gap-5">
          {navLinks.map((link) => (
            <Link
              key={link.label}
              to={link.href}
              onClick={handleLinkClick}
              className="font-display text-2xl text-mountain hover:text-warm-gold transition-colors"
            >
              {link.label}
            </Link>
          ))}
          <GoldButton href="/#contact" onClick={handleLinkClick} className="mt-4">
            Book Your Tour
          </GoldButton>
        </div>
      </div>
    </>
  );
}

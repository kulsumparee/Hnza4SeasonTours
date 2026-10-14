import { Link } from 'react-router';
import logo from '../lib/images/logo.png'
import SocialLinks from './ui/socialLinks';
const quickLinks = [
  { label: 'Destinations', href: '/#destinations' },
  { label: 'Tour Packages', href: '/#packages' },
  { label: 'Gallery', href: '/#gallery' },
  { label: 'Reviews', href: '/#reviews' },
  { label: 'FAQ', href: '/#faq' },
  { label: 'Contact', href: '/#contact' },
];

export default function Footer() {
  return (
    <footer className="bg-mountain text-white">
      <div className="max-w-content mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-10">
        <div className="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-8">
          {/* Brand Column */}
          <div>
            <img src={logo} alt="Hunza 4 Season Tours" className="h-16 w-auto mb-4 rounded-full" />
            <p className="font-body font-light text-base text-stone-300 mb-6">
              Discover Pakistan in Every Season
            </p>
            <SocialLinks/>
          </div>

          {/* Quick Links Column */}
          <div>
            <h4 className="font-display text-lg mb-6">Explore</h4>
            <ul className="space-y-3">
              {quickLinks.map((link) => (
                <li key={link.label}>
                  <Link
                    to={link.href}
                    className="font-body text-sm text-stone-300 hover:text-white transition-colors duration-300"
                  >
                    {link.label}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          {/* Contact Info Column */}
          <div>
            <h4 className="font-display text-lg mb-6">Contact Us</h4>
            <ul className="space-y-3 font-body text-sm text-stone-300">
              <li>
                <span className="text-white">Phone:</span>{' '}
                <a href="tel:+923479022013" className="hover:text-white transition-colors">
                  +92 347 9022013
                </a>
              </li>
              <li>
                <span className="text-white">WhatsApp:</span>{' '}
                <a
                  href="https://wa.me/923468486217"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="hover:text-white transition-colors"
                >
                  +92 346 8486217
                </a>
              </li>
              <li>
                <span className="text-white">Email:</span>{' '}
                <a
                  href="mailto:hunza4seasontour@gmail.com"
                  className="hover:text-white transition-colors"
                >
                  hunza4seasontour@gmail.com
                </a>
              </li>
              <li>
                <span className="text-white">Address:</span>
                <br />
                Nasirabad Hunza, Hunza Valley, Gilgit-Baltistan, Pakistan
              </li>
            </ul>
          </div>
        </div>

        {/* Social Icons */}
       

        {/* Bottom Bar */}
        <div className="border-t border-white/10 pt-8 mt-8 flex flex-col sm:flex-row justify-between items-center gap-4">
          <p className="font-body text-xs text-stone-color">
            &copy; 2025 Hunza 4 Season Tours. All rights reserved.
          </p>
          <p className="font-body text-xs text-stone-color">
            Designed with love for the love of Pakistan
          </p>
        </div>
      </div>
    </footer>
  );
}

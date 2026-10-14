import { useRef, useState } from 'react';
import { MapPin, Calendar, Users, Search } from 'lucide-react';

const places = [
  'Islamabad, Pakistan',
  'Lahore, Pakistan',
  'Karachi, Pakistan',
  'Hunza Valley',
  'Skardu',
  'Gilgit',
  'Swat Valley',
  'Naran Kaghan',
  'Chitral',
  'Fairy Meadows',
  'Murree',
];

export default function SearchWidget() {
  const [from, setFrom] = useState('');
  const [to, setTo] = useState('');
  const [checkIn, setCheckIn] = useState('');
  const [checkOut, setCheckOut] = useState('');
  const [guests, setGuests] = useState('');
  const checkInRef = useRef<HTMLInputElement>(null);
  const checkOutRef = useRef<HTMLInputElement>(null);

  const openPicker = (ref: React.RefObject<HTMLInputElement | null>) => {
    const el = ref.current;
    if (!el) return;
    if (typeof el.showPicker === 'function') {
      el.showPicker();
    } else {
      el.focus();
    }
  };

  const handleSearch = () => {
    const message = [
      'Tour Search from Website',
      `From: ${from || '-'}`,
      `To: ${to || '-'}`,
      checkIn && `Check-in: ${checkIn}`,
      checkOut && `Check-out: ${checkOut}`,
      `Guests: ${guests || '-'}`,
    ]
      .filter(Boolean)
      .join('\n');

    window.open(
      `https://wa.me/923468486217?text=${encodeURIComponent(message)}`,
      '_blank',
      'noopener,noreferrer'
    );
  };

  return (
    <div className="relative z-20 -mt-8 md:-mt-10 px-4 sm:px-6">
      <div className="max-w-5xl mx-auto bg-white rounded-2xl md:rounded-full shadow-2xl p-3 md:p-2 flex flex-col md:flex-row items-stretch md:items-center gap-2 md:gap-0">
        <div className="flex-1 flex items-center gap-1.5 px-4 py- md:py-2 md:border-r border-black/10">
          <MapPin size={16} className="text-warm-gold flex-shrink-0" />
          <input
            list="search-widget-places"
            value={from}
            onChange={(e) => setFrom(e.target.value)}
            placeholder="From"
            className="w-full font-body text-sm text-mountain bg-transparent outline-none placeholder:text-stone-color"
          />
        </div>

        <div className="flex-1 flex items-center gap-1.5 px-4 py-1 md:py-2 md:border-r border-black/10">
          <MapPin size={16} className="text-warm-gold flex-shrink-0" />
          <input
            list="search-widget-places"
            value={to}
            onChange={(e) => setTo(e.target.value)}
            placeholder="To"
            className="w-full font-body text-sm text-mountain bg-transparent outline-none placeholder:text-stone-color"
          />
        </div>

        <datalist id="search-widget-places">
          {places.map((place) => (
            <option key={place} value={place} />
          ))}
        </datalist>

        <div className="flex-1 flex items-center gap-1.5 px-4 py-1 md:py-2 md:border-r border-black/10">
          <button
            type="button"
            aria-label="Open check-in calendar"
            onClick={() => openPicker(checkInRef)}
            className="flex-shrink-0"
          >
            <Calendar size={16} className="text-warm-gold" />
          </button>
          <input
            ref={checkInRef}
            type="date"
            aria-label="Check-in date"
            value={checkIn}
            onClick={() => openPicker(checkInRef)}
            onChange={(e) => setCheckIn(e.target.value)}
            className="font-body text-sm text-mountain bg-transparent outline-none min-w-0 flex-1"
          />
          <span className="text-stone-color/40">-</span>
          <input
            ref={checkOutRef}
            type="date"
            aria-label="Check-out date"
            value={checkOut}
            min={checkIn || undefined}
            onClick={() => openPicker(checkOutRef)}
            onChange={(e) => setCheckOut(e.target.value)}
            className="font-body text-sm text-mountain bg-transparent outline-none min-w-0 flex-1"
          />
        </div>

        <div className="flex-1 flex items-center gap-1.5 px-4 py-1 md:py-2">
          <Users size={16} className="text-warm-gold flex-shrink-0" />
          <select
            aria-label="Guests"
            value={guests}
            onChange={(e) => setGuests(e.target.value)}
            className="w-full font-body text-sm bg-transparent outline-none appearance-none text-mountain"
          >
            <option value="" disabled hidden className="text-stone-color">
              Guests
            </option>
            <option>1 Guest</option>
            <option>2 Guests</option>
            <option>3-5 Guests</option>
            <option>6+ Guests</option>
          </select>
        </div>

        <button
          type="button"
          onClick={handleSearch}
          aria-label="Search tours on WhatsApp"
          className="flex-shrink-0 flex items-center justify-center gap-2 bg-warm-gold hover:brightness-110 transition-all rounded-xl md:rounded-full w-full md:w-14 h-12 md:h-14"
        >
          <Search size={20} className="text-white" />
          <span className="font-body font-medium text-sm text-white md:hidden">Search</span>
        </button>
      </div>
    </div>
  );
}

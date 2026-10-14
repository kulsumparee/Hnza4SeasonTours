import { useScrollReveal } from '@/hooks/useScrollReveal';
import SectionHeader from '@/components/SectionHeader';
import WhatsAppButton from '@/components/WhatsAppButton';
import { Car, Mountain, Users, Bus, Check, ShieldCheck, MapPinned, Clock3 } from 'lucide-react';

const vehicles = [
  {
    icon: Car,
    name: 'Car',
    price: 'From PKR 8,000/day',
    capacity: '4 Passengers',
    cartype: 'Luxury',
    image:
      'https://northbackend.northonwheels.com/storage/uploads/image_6166.jpg',
    description:
      'Comfortable, air-conditioned sedans perfect for city travel and short valley trips within Hunza.',
    features: ['Experienced driver included', 'Air conditioning', 'Fuel efficient', 'Best for paved roads'],
  },
  {
    icon: Mountain,
    name: 'Jeep',
    price: 'From PKR 15,000/day',
    capacity: '4-6 Passengers',
    cartype: 'Adventure',
    image:
      'https://static.pakwheels.com/2018/02/jeeps.jpg',
    description:
      "Rugged 4x4 vehicles built for Hunza's mountain roads, off-road tracks, and high-altitude passes.",
    features: [
      'Experienced mountain driver',
      'Ideal for Khunjerab, Naltar & Passu',
      'Off-road capability',
      '4-wheel drive',
    ],
  },
  {
    icon: Users,
    name: 'Hiace Van',
    price: 'From PKR 20,000/day',
    capacity: '6-10 Passengers',
    cartype: 'Luxury',
    image:
      'https://rawalpindirenta.car.blog/wp-content/uploads/2023/09/img-20230315-wa00184349268153053958908.jpg?w=1024',
    description:
      'Spacious vans perfect for families and small groups traveling together across the north.',
    features: ['Extra luggage space', 'Comfortable seating', 'AC & heater', 'Driver included'],
  },
  {
    icon: Bus,
    name: 'Coaster Bus',
    price: 'Custom Quote',
    capacity: '20+ Passengers',
    cartype: 'Luxury',
    image:
      'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRK1S200gmhhFwmdy4jCjp_MY_KkLsc3lh8n3vxVtQFDvnhHvPVH7AqVsI&s=10',
    description:
      'Large group transport for tour groups, weddings, and corporate trips across Pakistan.',
    features: ['Group travel specialist', 'Professional driver', 'Long-distance ready', 'Custom itineraries'],
  },
];

const trustPoints = [
  { icon: ShieldCheck, label: 'Verified & Insured Vehicles' },
  { icon: MapPinned, label: 'Local Routes, Expert Drivers' },
  { icon: Clock3, label: '24/7 Booking Support' },
];

export default function CarRentSection() {
  const headerRef = useScrollReveal<HTMLDivElement>({ pattern: 'fade-up' });
  const gridRef = useScrollReveal<HTMLDivElement>({
    pattern: 'stagger',
    childSelector: '.vehicle-card',
    stagger: 0.12,
  });

  const handleReserve = (vehicle: (typeof vehicles)[number]) => {
    const message = [
      'Car Rental Reservation',
      `Vehicle: ${vehicle.name}`,
      `Price: ${vehicle.price}`,
      `Capacity: ${vehicle.capacity}`,
      `CarType: ${vehicle.cartype}`,
      `Includes: ${vehicle.features.join(', ')}`,
    ].join('\n');

    window.open(
      `https://wa.me/923468486217?text=${encodeURIComponent(message)}`,
      '_blank',
      'noopener,noreferrer'
    );
  };

  return (
    <section id="car-rent" className="section-padding bg-mist">
      <div className="container-content">
        <div ref={headerRef}>
          <SectionHeader
            overline="CAR RENTAL"
            heading="Rent a Car for Your Journey"
            subheading="Well maintained vehicles with experienced drivers, ready to take you across Hunza and beyond from city sedans to rugged 4x4 jeeps."
            overlineColor="text-warm-gold"
          />
        </div>

        {/* Trust Badges */}
        <div className="flex flex-wrap items-center justify-center gap-4 sm:gap-8 mb-12">
          {trustPoints.map((point) => (
            <div key={point.label} className="flex items-center gap-2.5">
              <point.icon size={20} className="text-emerald-green flex-shrink-0" />
              <span className="font-body font-medium text-sm text-mountain">{point.label}</span>
            </div>
          ))}
        </div>

        <div
          ref={gridRef}
          className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-5"
        >
          {vehicles.map((vehicle) => (
            <div
              key={vehicle.name}
              className="vehicle-card group bg-white rounded-2xl overflow-hidden shadow-card transition-all duration-300 hover:-translate-y-1.5 hover:shadow-card-hover"
            >
              {/* Image */}
              <div className="relative aspect-[4/3] overflow-hidden bg-mountain">
                <img
                  src={vehicle.image}
                  alt={vehicle.name}
                  loading="lazy"
                  className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent" />
                <span className="absolute top-4 left-4 inline-flex items-center gap-1.5 bg-white/90 backdrop-blur-sm font-body font-medium text-xs text-mountain px-3 py-1.5 rounded-full">
                  <vehicle.icon size={14} className="text-emerald-green" />
                  {vehicle.capacity}
                </span>
                <span className='absolute top-4 right-2 inline-flex items-center gap-1.5 bg-white/90 backdrop-blur-sm font-body font-medium text-xs text-mountain px-3 py-1.5 rounded-full'>
                  {vehicle.cartype}
                </span>
                <h3 className="absolute bottom-4 left-2 font-display font-medium text-xl text-white drop-shadow-sm">
                  {vehicle.name}
                </h3>
              </div>

              {/* Content */}
              <div className="p-3 md:p-4">
                <p className="font-body font-semibold text-lg text-warm-gold">{vehicle.price}</p>
                <p className="font-body font-light text-[0.9375rem] text-stone-color mt-3 leading-relaxed">
                  {vehicle.description}
                </p>
                <ul className="mt-5 space-y-2.5">
                  {vehicle.features.map((feature) => (
                    <li key={feature} className="flex items-center gap-2.5">
                      <Check size={16} className="text-emerald-green flex-shrink-0" />
                      <span className="font-body text-sm text-stone-color">{feature}</span>
                    </li>
                  ))}
                </ul>
                <button
                  type="button"
                  onClick={() => handleReserve(vehicle)}
                  className="block mt-7 w-full text-center font-body font-medium text-sm text-mountain border border-black/10 rounded-full py-3 transition-all duration-300 hover:bg-warm-gold hover:text-white hover:border-warm-gold"
                >
                  Reserve This Vehicle
                </button>
              </div>
            </div>
          ))}
        </div>

        <div className="mt-12 flex flex-col items-center gap-4 text-center">
          <p className="font-body font-light text-sm text-stone-color max-w-xl">
            All rentals include a professional driver familiar with local routes. Rates vary by
            season, duration, and distance reach out for an exact quote.
          </p>
          <WhatsAppButton variant="filled">Ask About Car Rental</WhatsAppButton>
        </div>
      </div>
    </section>
  );
}

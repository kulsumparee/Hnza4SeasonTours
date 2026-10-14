<?php
/**
 * Fixed multi-day tour itineraries (ported from src/lib/toursData.ts).
 *
 * Each tour: slug, name, duration, overline, tagline, description, hero_image,
 * card_image, highlights[], itinerary[] of { day, title, details }.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * All tours.
 *
 * @return array<int,array<string,mixed>>
 */
function h4s_get_tours() {
	static $tours = null;

	if ( null !== $tours ) {
		return $tours;
	}

	$tours = array(
		array(
			'slug'        => '10-days-tour',
			'name'        => '10 Days Tour',
			'duration'    => '10 Days / 9 Nights',
			'overline'    => 'SKARDU · HUNZA · CHITRAL',
			'tagline'     => 'Lakes, forts, and glaciers across Baltistan and the Karakoram',
			'description' => 'A fast-paced journey through the turquoise lakes and ancient forts of Skardu, the legendary valleys of Hunza, and onward through Ghizer and Chitral. Ideal for travelers who want to experience the best of Gilgit-Baltistan and Khyber Pakhtunkhwa in a single trip.',
			'hero_image'  => h4s_img( 'satrangi.png' ),
			'card_image'  => h4s_img( 'satrangi.png' ),
			'highlights'  => array(
				'Kachura & Sadpara Lakes',
				'Shigar & Baltit Forts',
				'Khaplu Valley',
				'Hunza & Passu Cones',
				'Chitral & Kalash Valley',
			),
			'itinerary'   => array(
				array(
					'day'     => 'Day 1',
					'title'   => 'Skardu Airport to Kachura Lake',
					'details' => 'Arrival at Skardu Airport and transfer to Kachura Lake (Upper and Lower Kachura).',
				),
				array(
					'day'     => 'Day 2',
					'title'   => 'Sadpara Lake & Shigar Fort',
					'details' => 'Visit Sadpara Lake, Shigar Fort, Sarfaranga Cold Desert, and Kadpana Cold Desert. Afternoon back to hotel.',
				),
				array(
					'day'     => 'Day 3',
					'title'   => 'Khaplu, District Ghanche',
					'details' => 'Sightseeing in Khaplu — Haldi Cones, Mashabrum View, and a village tour in Machulo.',
				),
				array(
					'day'     => 'Day 4',
					'title'   => 'Back to Skardu',
					'details' => 'Return to Skardu. Overnight stay.',
				),
				array(
					'day'     => 'Day 5',
					'title'   => 'Skardu to Hunza',
					'details' => 'Travel from Skardu to Hunza and explore Central Hunza in Karimabad.',
				),
				array(
					'day'     => 'Day 6',
					'title'   => 'Hunza Sightseeing',
					'details' => 'Baltit Fort, Hopper Glacier, Karimabad Bazar, Eagle Nest View Point, Passu Cones, Suspension Bridge, and Passu Glacier. Afternoon back to hotel.',
				),
				array(
					'day'     => 'Days 7–10',
					'title'   => 'Ghizer, Chitral & Kalash Valley',
					'details' => 'Itinerary details for these days are being finalized with the client and will be updated shortly — expect travel through Ghizer Valley and Shandur Pass toward Chitral and Kalash Valley before the tour concludes.',
				),
			),
		),
		array(
			'slug'        => '16-days-tour',
			'name'        => '16 Days Tour',
			'duration'    => '16 Days / 15 Nights',
			'overline'    => 'GILGIT-BALTISTAN GRAND CIRCUIT',
			'tagline'     => 'An in-depth exploration of the Karakoram and beyond',
			'description' => 'A more immersive 16-day circuit through the northern areas, giving extra time to rest, explore, and soak in the mountain scenery at a relaxed pace. This comprehensive journey covers Skardu\'s pristine lakes and ancient forts, Khaplu\'s hidden valleys, Hunza\'s legendary vistas, and Gilgit\'s strategic mountain crossings.',
			'hero_image'  => h4s_img( 'rakaposhi.png' ),
			'card_image'  => h4s_img( 'rakaposhi.png' ),
			'highlights'  => array(
				'Skardu Lakes & Forts',
				'Khaplu Valley',
				'Hunza & Karakoram Highway',
				'Gupis & Ghizer',
				'Gilgit Highlights',
			),
			'itinerary'   => array(
				array(
					'day'     => 'Day 1',
					'title'   => 'Skardu Airport to Kachura Lake',
					'details' => 'Arrival at Skardu Airport and transfer to Kachura Lake (Upper and Lower Kachura). Evening at leisure.',
				),
				array(
					'day'     => 'Day 2',
					'title'   => 'Sadpara Lake & Shigar Fort',
					'details' => 'Visit Sadpara Lake, Shigar Fort, Sarfaranga Cold Desert, and Kadpana Cold Desert. Afternoon back to hotel.',
				),
				array(
					'day'     => 'Day 3',
					'title'   => 'Kharpocho Fort & Local Sightseeing',
					'details' => 'Explore Kharpocho Fort and other local attractions around Skardu. Evening at leisure.',
				),
				array(
					'day'     => 'Day 4',
					'title'   => 'Skardu to Khaplu',
					'details' => 'Drive to Khaplu Valley. Visit Haldi Cones, Mashabrum View, and explore the village of Machulo.',
				),
				array(
					'day'     => 'Day 5',
					'title'   => 'Khaplu Valley Exploration',
					'details' => 'Full day in Khaplu — visit Khaplu Palace, local monasteries, and enjoy the serene valley landscape. Rest and acclimatization.',
				),
				array(
					'day'     => 'Day 6',
					'title'   => 'Khaplu to Hunza',
					'details' => 'Early morning drive from Khaplu to Hunza via the scenic Indus Valley route. Arrive in Karimabad.',
				),
				array(
					'day'     => 'Day 7',
					'title'   => 'Hunza — Baltit Fort & Eagle Nest',
					'details' => 'Visit Baltit Fort, Hopper Glacier, Karimabad Bazar, and Eagle Nest View Point. Sunset views from the mountains.',
				),
				array(
					'day'     => 'Day 8',
					'title'   => 'Hunza — Passu & Glacier',
					'details' => 'Explore Passu Cones, Passu Suspension Bridge, and Passu Glacier. Visit Sust and enjoy views of the Karakoram landscape.',
				),
				array(
					'day'     => 'Day 9',
					'title'   => 'Rest Day in Hunza',
					'details' => 'Leisure day in Hunza — optional activities include local village walks, photography, or relaxation at the guest house.',
				),
				array(
					'day'     => 'Day 10',
					'title'   => 'Hunza to Gupis via Gilgit',
					'details' => 'Drive from Hunza to Gilgit city. Visit Kargah Buddha and the old British bridge. Continue to Gupis Valley. Overnight stay.',
				),
				array(
					'day'     => 'Day 11',
					'title'   => 'Gupis to Shandur Pass',
					'details' => 'Early departure to Shandur Pass (4,150m) — the world\'s highest polo ground. Experience the high-altitude landscape and return to Gupis.',
				),
				array(
					'day'     => 'Day 12',
					'title'   => 'Gupis to Gilgit',
					'details' => 'Return to Gilgit city. Evening city tour and exploration of local bazars.',
				),
				array(
					'day'     => 'Day 13',
					'title'   => 'Gilgit — Surrounding Mountains',
					'details' => 'Day trip to viewpoints around Gilgit. Visit Altit Fort or explore nearby villages. Enjoy panoramic mountain views.',
				),
				array(
					'day'     => 'Day 14',
					'title'   => 'Gilgit to Skardu',
					'details' => 'Return journey from Gilgit to Skardu via the scenic Indus Valley route. Overnight stay and final evening in Skardu.',
				),
				array(
					'day'     => 'Day 15',
					'title'   => 'Skardu Leisure & Departure Prep',
					'details' => 'Final day in Skardu — optional shopping, local market exploration, or last-minute sightseeing. Pack and prepare for departure.',
				),
				array(
					'day'     => 'Day 16',
					'title'   => 'Skardu Airport Departure',
					'details' => 'Transfer to Skardu Airport for your onward journey.',
				),
			),
		),
		array(
			'slug'        => '23-days-tour',
			'name'        => '23 Days Tour',
			'duration'    => '23 Days / 22 Nights',
			'overline'    => 'KARAKORAM · HIMALAYAS · HINDUKUSH',
			'tagline'     => 'The complete grand journey across Pakistan\'s three mountain ranges',
			'description' => 'Our signature grand itinerary — a complete 23-day journey from Islamabad through Peshawar, Swat, Chitral, Kalash Valley, Gilgit, Hunza, all the way to the Khunjerab Pass on the China border, then south through Skardu and Khaplu. The ultimate way to experience the Karakoram, Himalayas, and Hindukush in one trip.',
			'hero_image'  => h4s_img( 'baltit-fort.jpg' ),
			'card_image'  => h4s_img( 'baltit-fort.jpg' ),
			'highlights'  => array(
				'Peshawar & Swat Valley',
				'Chitral & Kalash Valley',
				'Shandur Pass & Gilgit',
				'Hunza & Khunjerab Pass',
				'Skardu & Khaplu',
			),
			'itinerary'   => array(
				array(
					'day'     => 'Day 1',
					'title'   => 'Arrival in Islamabad',
					'details' => 'Airport to Islamabad.',
				),
				array(
					'day'     => 'Day 2',
					'title'   => 'Peshawar City Tour',
					'details' => 'Afternoon city tour in Peshawar covering historical buildings, Kasakhani Bazar, Balesar Fort, and Peshawar Museum.',
				),
				array(
					'day'     => 'Day 3',
					'title'   => 'Swat Valley',
					'details' => 'On the way, see Buddhist civilization sites and the Takht-i-Bahi area. Afternoon in Swat Bazar.',
				),
				array(
					'day'     => 'Day 4',
					'title'   => 'Malam Jabba',
					'details' => 'Morning trip to Malam Jabba mountains, lunch there, back to Swat in the afternoon — see Swat Bazar and Swat Museum.',
				),
				array(
					'day'     => 'Day 5',
					'title'   => 'Onward to Chitral',
					'details' => 'After breakfast, drive to Chitral Valley. Lunch in Upper Dir, cross the Lowari Tunnel to main Chitral. Dinner in Chitral city.',
				),
				array(
					'day'     => 'Days 6–7',
					'title'   => 'Kalash Valley',
					'details' => 'Morning departure to Kalash Valley to see the civilization linked to Alexander the Great. Two days spent in Kalash Valley.',
				),
				array(
					'day'     => 'Day 8',
					'title'   => 'Back to Chitral',
					'details' => 'Return to Chitral — see Chitral city, the old mosque, and Chitral Fort.',
				),
				array(
					'day'     => 'Day 9',
					'title'   => 'Chitral to Gupis via Shandur Pass',
					'details' => 'Start the tour toward Gilgit Valley, crossing Shandur Pass — the highest polo ground in the world (4,150m). Lunch on the way, then continue to Gupis Valley. Dinner at the Gupis guest house.',
				),
				array(
					'day'     => 'Day 10',
					'title'   => 'Gupis to Gilgit City',
					'details' => 'After breakfast, continue the tour from Gupis to Gilgit city.',
				),
				array(
					'day'     => 'Day 11',
					'title'   => 'Gilgit Sightseeing',
					'details' => 'Kargah Buddha, the old British bridge, and the surrounding mountains.',
				),
				array(
					'day'     => 'Days 12–14',
					'title'   => 'Hunza',
					'details' => 'Morning drive to Hunza via the Karakoram Highway. Two days of rest in Hunza, taking in the local sights, sunset views, and the mountains around Hunza.',
				),
				array(
					'day'     => 'Day 15',
					'title'   => 'Khunjerab Pass (China Border)',
					'details' => 'After breakfast, continue to Khunjerab Pass at the China border. Return in the afternoon and spend the night in Upper Hunza.',
				),
				array(
					'day'     => 'Days 16–19',
					'title'   => 'Skardu',
					'details' => 'Drive to Skardu city following the Indus road. Three days in Skardu covering Kachura Lake (Upper and Lower), Sadpara Lake, Shigar Fort, Sarfaranga Cold Desert, Kadpana Cold Desert, and Kharpocho Fort.',
				),
				array(
					'day'     => 'Day 20',
					'title'   => 'Khaplu, Ghanche',
					'details' => 'Overnight in Khaplu, Ghanche — enjoy the beautiful views of the valley.',
				),
				array(
					'day'     => 'Days 21–23',
					'title'   => 'Return Journey',
					'details' => 'Final days of the tour, returning via Skardu to Islamabad for departure. Full details being finalized.',
				),
			),
		),
	);

	/**
	 * Filter the tours list, e.g. from a child theme or plugin.
	 *
	 * @param array $tours Tours.
	 */
	return apply_filters( 'h4s_tours', $tours );
}

/**
 * Find a tour by slug.
 *
 * @param string $slug Tour slug.
 * @return array|null
 */
function h4s_get_tour_by_slug( $slug ) {
	foreach ( h4s_get_tours() as $tour ) {
		if ( $tour['slug'] === $slug ) {
			return $tour;
		}
	}
	return null;
}

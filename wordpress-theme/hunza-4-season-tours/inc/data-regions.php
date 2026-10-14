<?php
/**
 * Destination regions and their places (ported from src/lib/regionsData.ts).
 *
 * Each region: slug, name, tagline, overline, description, hero_image, places[].
 * Each place:  name, subtitle, image, description (optional), gallery[] (optional).
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * All regions.
 *
 * @return array<int,array<string,mixed>>
 */
function h4s_get_regions() {
	static $regions = null;

	if ( null !== $regions ) {
		return $regions;
	}

	$regions = array(
		array(
			'slug'        => 'gilgit-baltistan',
			'name'        => 'Gilgit-Baltistan',
			'tagline'     => 'Land of towering peaks & ancient forts',
			'overline'    => 'THE KARAKORAM',
			'description' => 'Home to Hunza, Nagar, and some of the world\'s highest peaks. Turquoise lakes, centuries-old forts, and the legendary Karakoram Highway make this Pakistan\'s most iconic mountain region.',
			'hero_image'  => 'https://upload.wikimedia.org/wikipedia/commons/d/dc/Hunza_Valley_HDR.jpg',
			'places'      => array(
				array(
					'name'        => 'Attabad Lake',
					'subtitle'    => 'Crystal turquoise waters',
					'image'       => h4s_img( 'attabad-lake.jpg' ),
					'description' => 'Attabad Lake, also known as Hunza Lake, was formed in January 2010 when a major landslide dammed the Hunza River in Attabad village. Its brilliant turquoise waters now offer boating, jet-skiing, fishing, and even winter sports, attracting visitors year-round.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/5/52/Attabad.jpg/1280px-Attabad.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Best_Life_in_the_World_expedition_crossing_Lake_Attabad.jpg/1280px-Best_Life_in_the_World_expedition_crossing_Lake_Attabad.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Attabad_Lake_In_autumn.png/1280px-Attabad_Lake_In_autumn.png',
					),
				),
				array(
					'name'        => 'Rakaposhi View',
					'subtitle'    => 'Majestic ice valley',
					'image'       => h4s_img( 'rakaposhi.png' ),
					'description' => 'Rakaposhi, also known as Dumani, is a mountain of the Karakoram range sitting between the Nagar and Bagrote valleys. Remarkably broad at nearly 20 kilometres east to west, it is the only peak on Earth that descends uninterrupted for almost 6,000 metres from summit to base.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/9/93/Rakaposhi_%26_Autumn.jpg/1280px-Rakaposhi_%26_Autumn.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Rakaposhi_-_View_from_across_the_valley.jpg/1280px-Rakaposhi_-_View_from_across_the_valley.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/Panoramio-134035584.jpg/1280px-Panoramio-134035584.jpg',
					),
				),
				array(
					'name'        => 'Suspension Bridge',
					'subtitle'    => 'Panoramic viewpoint',
					'image'       => h4s_img( 'suspension-bridge.png' ),
					'description' => 'One of Hunza\'s scenic pedestrian suspension bridges spanning the Hunza River, offering panoramic views of the surrounding peaks and valley — a favorite stop for photographers and thrill-seekers passing through the region.',
					'gallery'     => array(
						'https://s2.wklcdn.com/image_169/5075682/152049156/97018970Master.jpg',
						'https://discoveringpakistan.com/wp-content/uploads/2025/11/675px-Hussaini_Suspension_Bridge.jpg',
						'https://gulmitcontinentalhotel.com/wp-content/uploads/2023/06/bridge-1.jpg',
					),
				),
				array(
					'name'        => 'Passu Cones',
					'subtitle'    => 'Iconic jagged peaks',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e5/Pasu_cones.jpg/1280px-Pasu_cones.jpg',
					'description' => 'Passu is a small village in the Gojal valley of Upper Hunza, along the Karakoram Highway. It\'s famed for views of the jagged 6,106m Passu Cones (Tupopdan), the 7,478m Passu Sar, and the nearby Passu and Batura glaciers.',
					'gallery'     => array(
						'https://d34vm3j4h7f97z.cloudfront.net/optimized/4X/3/d/f/3dff4731ed23087e521331edf7558085f9878cb3_2_690x456.jpeg',
						'https://www.laurewanders.com/wp-content/uploads/2024/06/Backpacking-Pakistan-00001-1024x768.jpg',
						'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/33/4c/3b/19/passu-cones-a-perfect.jpg?w=1200&h=1200&s=1',
					),
				),
				array(
					'name'        => 'Khunjerab Pass',
					'subtitle'    => 'Pakistan-China border, 4,733m',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/China_Border%2C_Pakistan.jpg/1280px-China_Border%2C_Pakistan.jpg',
					'description' => 'Khunjerab Pass is a high-altitude mountain pass on the Karakoram Highway, lying at 4,693m above sea level on Pakistan\'s border with Xinjiang, China. The surrounding Khunjerab National Park is also one of the best places in the world to spot the elusive snow leopard.',
					'gallery'     => array(
						'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/28/b2/21/a8/khunjerab-is-a-mountain.jpg?w=900&h=500&s=1',
						'https://i.dawn.com/large/2023/05/02075320c12b333.jpg',
						'https://i.dawn.com/primary/2024/12/675a41801dd48.jpg',
					),
				),
				array(
					'name'        => 'Baltit Fort',
					'subtitle'    => '700 years of history',
					'image'       => h4s_img( 'baltit-fort.jpg' ),
					'description' => 'Baltit Fort is a palatial fort overlooking Karimabad in Hunza Valley, and has been on UNESCO\'s World Heritage Tentative List since 2004. Once home to the Mirs (rulers) of Hunza, it now houses a museum showcasing the region\'s royal history.',
					'gallery'     => array(
						'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/21/61/a5/cb/caption.jpg?w=1200&h=1200&s=1',
						'https://wikimedia-commons.fra1.cdn.digitaloceanspaces.com/SD/Baltit_Fort_D_01-03_(53).jpg',
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkq8Zg4UscGRmmrmKHa4Zt6Sqywurc4Rni_UfddIW-EuLoHUhWs6Hik5iy&s=10',
					),
				),
				array(
					'name'        => 'Altit Fort',
					'subtitle'    => 'Ancient royal stronghold',
					'image'       => h4s_img( 'altit.webp' ),
					'description' => 'Altit Fort was originally home to the hereditary rulers of Hunza before they moved to Baltit Fort three centuries later. At around 1,100 years old, its Shikari Tower is the oldest monument in Gilgit-Baltistan, and the fort won UNESCO\'s Asia-Pacific Heritage Award for Cultural Heritage Conservation in 2011.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Altit_fort-gb.jpg/1280px-Altit_fort-gb.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/Altit_Fort_from_Hunza_Top.jpg/1280px-Altit_Fort_from_Hunza_Top.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Altit_Fort%2C_Hunza%2C_Gilgit_Baltistan%2C_Pakistan.jpg/1280px-Altit_Fort%2C_Hunza%2C_Gilgit_Baltistan%2C_Pakistan.jpg',
					),
				),
				array(
					'name'        => 'Luxus Hunza',
					'subtitle'    => 'Heart of Hunza',
					'image'       => h4s_img( 'luxus.png' ),
					'description' => 'A boutique hillside resort in the heart of Hunza Valley, offering modern comfort with sweeping views of the surrounding peaks — a popular base for exploring Karimabad and its historic forts.',
					'gallery'     => array(
						'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2c/0c/96/43/caption.jpg?w=900&h=500&s=1',
						'https://porterpakistan.com/uploads/2022/07/Luxus-Hunza-2.jpg',
						'https://content.skyscnr.com/available/2373875583/2373875583_WxH.jpg',
					),
				),
				array(
					'name'        => 'Bagrot Valley',
					'subtitle'    => 'Glaciers, orchards & remote villages',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/6/67/Bagrote_Valley_Suspension_Bridge_Hopay.JPG',
					'description' => 'Bagrot Valley is a remote Karakoram valley where the Bagrot River flows south from its glaciers, feeding the villages of Jalalabad and Oshikhandass before joining the Gilgit River — a quiet, less-touristed alternative to Hunza with dramatic glacier views.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Bagrote_Valley_5.JPG/1280px-Bagrote_Valley_5.JPG',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Gargo_medow_.jpg/1280px-Gargo_medow_.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/Upper_bagrote_gilgit_.jpg/1280px-Upper_bagrote_gilgit_.jpg',
					),
				),
				array(
					'name'        => 'Naltar Valley',
					'subtitle'    => 'Pine forests & colorful alpine lakes',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/c/c1/Naltar_lake_in_Autumn%2C_Gilgit.JPG',
					'description' => 'Naltar Valley lies about 34km from Gilgit city, a forested valley distinguished by three alpine lakes — Satrangi (Strangi), Blue, and Bodlok Lake — set against a dramatic mountainous backdrop. It is also home to Pakistan\'s only ski resort.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Grazing_yalks_in_Naltar_Valley.jpg/1280px-Grazing_yalks_in_Naltar_Valley.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/En_Route_Naltar._A_tight_bridge.jpg/1280px-En_Route_Naltar._A_tight_bridge.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Naltar_Slopy_Lands.jpg/1280px-Naltar_Slopy_Lands.jpg',
					),
				),
				array(
					'name'        => 'Satrangi Lake',
					'subtitle'    => 'One of the vivid Naltar lakes',
					'image'       => h4s_img( 'satrangi.png' ),
					'description' => 'Satrangi Lake ("seven-colored lake") is one of four major alpine lakes in the Naltar Valley, known locally as the Naltar or Bashkiri Lakes, sitting at altitudes of roughly 3,050–3,150m. The lakes are best visited between May and October, before heavy snowfall cuts off vehicle access.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Natlar_Lake_or_Bashkiri_Lake-1.jpg/1280px-Natlar_Lake_or_Bashkiri_Lake-1.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Naltar_Blue_lake_Gilgit.JPG/1280px-Naltar_Blue_lake_Gilgit.JPG',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/Blue_Lake_2%2C_Naltar%2C_Gilgit_Baltistan.jpg/1280px-Blue_Lake_2%2C_Naltar%2C_Gilgit_Baltistan.jpg',
					),
				),
				array(
					'name'        => 'Firoza Lake',
					'subtitle'    => 'Turquoise lake in the Naltar range',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Natlar_Lake_or_Bashkiri_Lake-1.jpg/1280px-Natlar_Lake_or_Bashkiri_Lake-1.jpg',
					'description' => 'Firoza ("turquoise") Lake is another of the vividly colored Naltar Lakes, prized for its intense blue-green hue against pine forest and snow-capped peaks — best reached with a 4x4 and a local guide.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Naltar_Blue_lake_Gilgit.JPG/1280px-Naltar_Blue_lake_Gilgit.JPG',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/Blue_Lake_2%2C_Naltar%2C_Gilgit_Baltistan.jpg/1280px-Blue_Lake_2%2C_Naltar%2C_Gilgit_Baltistan.jpg',
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQk6apQqnwDVqVN6PkXCFMXDvujFyV5FU1J_oMRqYvXjaffPpUHWjDF80k&s=10',
					),
				),
				array(
					'name'        => 'Chinese Cemetery',
					'subtitle'    => 'Memorial for Karakoram Highway workers, Danyor',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/b/bd/Chinese_Grave_Yard.jpg',
					'description' => 'The Gilgit Chinese Memorial Cemetery in Danyor, established in the early 1970s, is the final resting place of Chinese workers and engineers who died building the Karakoram Highway through the 1960s and 70s. Tombstones bear inscriptions in Chinese characters, standing as a quiet monument to the friendship behind the road.',
					'gallery'     => array(
						'https://northbackend.northonwheels.com/storage/uploads/chinese-graveyard-danyor-gilgit-4.jpg',
						'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgOKCBEusK3855jlf_gnVX9QMcRTLtwuQOp0fyZVRCQ_FHNe6OC_iKqEGYHzMfFPEV1pTUx-DvUdQbHaFUPey-edoDRzQCFH5cTNW7fZV7t_s66cvK-JMQxLO8eMrPNTKo9q9xeHUMCi8c/s1600/Chinese+Graveyards+Danyore+Gilgit+,+GB,+pakistan.jpg',
						'https://northbackend.northonwheels.com/storage/uploads/chinese-graveyard-danyor-gilgit-5.jpg',
					),
				),
				array(
					'name'        => 'Kargah Buddha',
					'subtitle'    => '7th-century rock-carved Buddha',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/7/77/Kargah_Buddha_Gilgit_Baltistan.jpg',
					'description' => 'Carved into a cliff face about 10km outside Gilgit, the Kargah Buddha is a standing Buddha relief roughly 50 feet tall, dating to around the 7th century — a striking reminder of the Buddhist heritage that once flourished across this region.',
					'gallery'     => array(
						'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/30/ce/94/a9/caption.jpg?w=1100&h=1100&s=1',
						'https://www.youlinmagazine.com/articles/2349-5.jpg',
						'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/22/06/6f/12/pod-skarpa-na-ktorej.jpg?w=1200&h=1200&s=1',
					),
				),
			),
		),
		array(
			'slug'        => 'skardu',
			'name'        => 'Skardu',
			'tagline'     => 'Gateway to the Land of Giants',
			'overline'    => 'BALTISTAN',
			'description' => 'Skardu is the launchpad for some of the world\'s most dramatic high-altitude landscapes — vast alpine plains, glacial lakes, and centuries-old royal palaces set against the world\'s highest mountains.',
			'hero_image'  => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Deosai_pic_hd.jpg/1280px-Deosai_pic_hd.jpg',
			'places'      => array(
				array(
					'name'        => 'Deosai Plains',
					'subtitle'    => 'The Land of Giants',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Deosai_pic_hd.jpg/1280px-Deosai_pic_hd.jpg',
					'description' => 'Deosai National Park is a vast, high-elevation alpine plain between Skardu and Astore, lying east of Nanga Parbat close to the central Karakoram Range. It\'s on Pakistan\'s tentative UNESCO World Heritage list and is home to the Himalayan brown bear.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Sheoser_lake_deosai_national_park.jpg/1280px-Sheoser_lake_deosai_national_park.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b3/Deosai_-_Bara_Pani.jpg/1280px-Deosai_-_Bara_Pani.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/d/de/Deosai_Plains_-_Bara_Pani.jpg/1280px-Deosai_Plains_-_Bara_Pani.jpg',
					),
				),
				array(
					'name'        => 'Shangrila / Lower Kachura Lake',
					'subtitle'    => 'The Heaven on Earth',
					'image'       => 'https://northbackend.northonwheels.com/storage/uploads/image_6175.jpg',
					'description' => 'Lower Kachura Lake, popularly known as Shangrila Lake, sits at 2,500m near Skardu and has hosted a resort on its banks since 1983. Its still turquoise waters mirrored against the Karakoram hills make it one of northern Pakistan\'s most photographed spots.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Shangrilla_Resorts-_Skardu.jpg/1280px-Shangrilla_Resorts-_Skardu.jpg',
						'https://northbackend.northonwheels.com/storage/uploads/image_6178.jpg',
						'https://northbackend.northonwheels.com/storage/uploads/image_6177.jpg',
					),
				),
				array(
					'name'        => 'Satpara Lake',
					'subtitle'    => 'Alpine lake fed by glaciers',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Storm%2C_Satpara_Lake.jpg/1280px-Storm%2C_Satpara_Lake.jpg',
					'description' => 'Satpara Lake sits at 2,600m near Skardu, fed by glacial melt from the surrounding mountains and draining via the Satpara Stream into the Indus River. It supplies water to Skardu Valley and holds introduced brown and rainbow trout, popular with anglers.',
					'gallery'     => array(
						'https://i.pinimg.com/736x/af/26/3d/af263de15941c45cb4d7395c758242b0.jpg',
						'https://i.pinimg.com/736x/87/92/2d/87922d25b8327012281cf61ecc91be0b.jpg',
						'https://i.pinimg.com/564x/f7/cb/f3/f7cbf3f82a343b0e1ab8973ddf9bec40.jpg',
					),
				),
				array(
					'name'        => 'Khaplu Forth',
					'subtitle'    => 'Royal heritage of Baltistan',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/View_of_main_entrance_of_Khaplu_Palace.jpg/1280px-View_of_main_entrance_of_Khaplu_Palace.jpg',
					'description' => 'Khaplu, 103km east of Skardu, was historically the second-largest kingdom in Baltistan under the Yabgo dynasty, guarding the trade route to Ladakh along the Shyok River. Its restored royal palace is now a heritage hotel run by the Aga Khan Trust for Culture.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/b/b4/View_of_main_entrance_of_Khaplu_Palace.jpg',
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpeEeTbMs-I2eo84ntnW-E8lwGaZka5YDf4bsaBDQiEKqZCtlwXsFYYtE8&s=10',
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSM1XopGIby5JvE1TjX5ocy_HanVLuAzlc8_pSv2rf0hEOlOhTA6wkjNR8y&s=10',
					),
				),
				array(
					'name'        => 'Shigar Fort',
					'subtitle'    => 'Restored 17th-century fort',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/Shigar_Fort_by_ZILL_NIAZI_22.jpg/1280px-Shigar_Fort_by_ZILL_NIAZI_22.jpg',
					'description' => 'Shigar Fort, also called Fong Khar, is a restored royal palace in Shigar town, about 30km from Skardu on the route toward the Baltoro Glacier and K2 — the world\'s second-highest mountain. It now operates as a heritage guesthouse.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3d/Shigar_Fort_at_Night.jpg/1280px-Shigar_Fort_at_Night.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Shigar_Fort%2C_Shigar_Valley%2C_Bara_Dari.JPG/1280px-Shigar_Fort%2C_Shigar_Valley%2C_Bara_Dari.JPG',
						'https://static.the.akdn/53832/1641715114-shigar_fort-56759_0.jpg',
					),
				),
				array(
					'name'        => 'Manthoka Waterfall',
					'subtitle'    => 'Spectacular waterfall in Kharmang Valley',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/f/f2/Manthokha_Waterfalls.JPG',
					'description' => 'Manthoka Waterfall is one of the most beautiful natural attractions in Gilgit-Baltistan, located in the scenic Kharmang Valley, about 80 km from Skardu. Cascading from a height of approximately 180 feet (55 meters), the waterfall is surrounded by lush green meadows, towering mountains, and crystal-clear streams. Visitors can enjoy breathtaking views, fresh trout fish at nearby restaurants, photography, and peaceful walks, making it a must-visit destination for nature lovers and travelers exploring the Skardu region.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/d/d7/Manthokha-waterfall-kharmang-skardu.jpg',
						'https://i.pinimg.com/736x/1b/a9/42/1ba942c4c2c1e7a5ec47b3008c5013e1.jpg',
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGn1VE9iJEEan1j55gYLbWy427apgOoMOnXahMsSlNaC5bhDk59CGMCr5a&s=10',
					),
				),
				array(
					'name'        => 'Blind Lake',
					'subtitle'    => 'Hidden turquoise lake in Shigar Valley',
					'image'       => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=1200&auto=format&fit=crop&q=80',
					'description' => 'Blind Lake, locally known as Jarba Zhou Lake, is a stunning alpine lake located in Shigar Valley, about 30 km from Skardu, Gilgit-Baltistan. Famous for its crystal-clear turquoise water and peaceful surroundings, the lake is surrounded by sandy shores, green fields, and majestic mountains. It is an ideal destination for boating, camping, photography, bird watching, and relaxing in nature. The calm atmosphere and breathtaking scenery make Blind Lake one of the hidden gems of the Skardu region.',
					'gallery'     => array(
						'https://i.pinimg.com/1200x/37/fd/77/37fd77fa6d8db8d75daa8d71cae3916e.jpg',
						'https://i.pinimg.com/1200x/da/7e/bf/da7ebf36991bae35a5a0edc525ca6f43.jpg',
						'https://i.pinimg.com/736x/3a/b3/6a/3ab36a1408a51e47faafbcac0f76e51a.jpg',
					),
				),
				array(
					'name'        => 'Basho Valley',
					'subtitle'    => 'A serene valley of forests, rivers, and waterfalls',
					'image'       => 'https://i.pinimg.com/1200x/b3/bd/e3/b3bde3b5b4b720809c6ee969fea69786.jpg',
					'description' => 'Basho Valley is a breathtaking destination located about 45 km from Skardu in Gilgit-Baltistan. Known for its lush green meadows, dense pine forests, crystal-clear streams, majestic mountains, and beautiful waterfalls, the valley offers a peaceful escape into nature. Visitors can enjoy hiking, camping, trout fishing, photography, and exploring traditional Balti villages. With its unspoiled beauty and tranquil atmosphere, Basho Valley is one of the most scenic hidden gems in the Skardu region.',
					'gallery'     => array(
						'https://i.pinimg.com/736x/9d/49/73/9d497314aa5cf3a194a0c6c4ab395ae2.jpg',
						'https://i.pinimg.com/736x/9f/a1/91/9fa1915e08772e0bedd7f4c690b656b6.jpg',
						'https://i.pinimg.com/736x/1f/a4/ff/1fa4ff0c2db1773930e985d3b2e980ed.jpg',
					),
				),
			),
		),
		array(
			'slug'        => 'lahore',
			'name'        => 'Lahore',
			'tagline'     => 'Pakistan\'s cultural and historical heart',
			'overline'    => 'PUNJAB',
			'description' => 'The Mughal capital for centuries, Lahore is a living museum of grand mosques, forts, and gardens — layered with the food, art, and energy of Pakistan\'s cultural capital.',
			'hero_image'  => 'https://upload.wikimedia.org/wikipedia/commons/c/c8/Badshahi_Mosque_front_picture.jpg',
			'places'      => array(
				array(
					'name'        => 'Badshahi Mosque',
					'subtitle'    => 'Mughal-era grandeur',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/c/c8/Badshahi_Mosque_front_picture.jpg',
					'description' => 'The Badshahi Mosque is a Mughal-era imperial mosque built between 1671 and 1673 by Emperor Aurangzeb, standing opposite Lahore Fort in the old Walled City. It is widely considered one of Pakistan\'s most iconic landmarks.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Evening_sun_on_Badshahi.jpg/1280px-Evening_sun_on_Badshahi.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Royal_mosque_Lahore.jpg/1280px-Royal_mosque_Lahore.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Badshahi_Mosque%2C_Lahore_VI.jpg/1280px-Badshahi_Mosque%2C_Lahore_VI.jpg',
					),
				),
				array(
					'name'        => 'Lahore Fort',
					'subtitle'    => 'UNESCO World Heritage citadel',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/4/4f/Lahore_Fort_view_from_Baradari.jpg',
					'description' => 'The Lahore Fort is a citadel at the northern end of the Walled City, spread across more than 20 hectares and containing 21 notable monuments, some dating to Emperor Akbar\'s reign. It was almost entirely rebuilt in the 17th century, at the height of Mughal splendor.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d2/Hazuri_Bagh_Pavillion_and_Lahore_Fort_in_1863.jpg/500px-Hazuri_Bagh_Pavillion_and_Lahore_Fort_in_1863.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Elephant-shaped_column_brackets_at_Lahore_Fort.jpg/1280px-Elephant-shaped_column_brackets_at_Lahore_Fort.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/A_picture_of_Gate_back_in_2000AD_by_Usman_Ghani.jpg/1280px-A_picture_of_Gate_back_in_2000AD_by_Usman_Ghani.jpg',
					),
				),
				array(
					'name'        => 'Shalimar Gardens',
					'subtitle'    => 'Mughal terraced gardens',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Reflection_of_Farah_Baksh_Terrace_%28Upper_Terrace%29_main_building.jpg/1280px-Reflection_of_Farah_Baksh_Terrace_%28Upper_Terrace%29_main_building.jpg',
					'description' => 'The Shalamar (Shalimar) Gardens are a terraced Mughal garden complex dating from the empire\'s artistic zenith, now one of Pakistan\'s most popular tourist destinations and a UNESCO World Heritage Site alongside Lahore Fort.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Chatting_at_Shalimar_Gardens.jpg/1280px-Chatting_at_Shalimar_Gardens.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Faiz_Baksh_%28Bestower_of_Goodness%29_terrace_view_from_Farah_Baksh_%28Bestower_of_Pleasure%29_terrace.jpg/1280px-Faiz_Baksh_%28Bestower_of_Goodness%29_terrace_view_from_Farah_Baksh_%28Bestower_of_Pleasure%29_terrace.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Shalamar_Garden_July_14_2005-Sideview_of_marble_enclosure_on_the_second_level.jpg/1280px-Shalamar_Garden_July_14_2005-Sideview_of_marble_enclosure_on_the_second_level.jpg',
					),
				),
				array(
					'name'        => 'Wazir Khan Mosque',
					'subtitle'    => 'Intricate tile-work mosque',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Wazir_Khan_Mosque_by_Moiz.jpg/1280px-Wazir_Khan_Mosque_by_Moiz.jpg',
					'description' => 'The Wazir Khan Mosque, built between 1634 and 1641, was commissioned by Punjab governor Wazir Khan during the reign of Shah Jahan. It is renowned for having the most elaborate frescoed and tiled surfaces of any Mughal-era mosque in South Asia.',
					'gallery'     => array(
						'https://i.pinimg.com/1200x/4f/ea/54/4fea545e1396b5767700ae14b9a34c41.jpg',
						'https://i.pinimg.com/1200x/2b/a8/0e/2ba80ee74d01effe3dc97c4e01882976.jpg',
						'https://i.pinimg.com/1200x/99/53/c6/9953c69007c89aa7e2bc5d4c1f62afb7.jpg',
					),
				),
				array(
					'name'        => 'Minar-e-Pakistan',
					'subtitle'    => 'Monument of the Pakistan Resolution',
					'image'       => 'https://i.pinimg.com/1200x/6f/85/b7/6f85b7e0c43282f026fa4b9f46fc838d.jpg',
					'description' => 'Minar-e-Pakistan is a national monument in Lahore\'s Iqbal Park, built to mark the site where the 1940 Lahore Resolution was passed — the declaration calling for a separate Muslim homeland that laid the foundation for Pakistan. The 60-metre tower blends Mughal, Islamic, and modern architectural styles.',
					'gallery'     => array(
						'https://i.pinimg.com/736x/70/74/fe/7074fe102f16d82e651f254791d523fc.jpg',
						'https://i.pinimg.com/1200x/28/11/1f/28111f886427716c1431c1287e2e0732.jpg',
						'https://i.pinimg.com/736x/78/0b/13/780b134a416d205bd868052c0fc54254.jpg',
					),
				),
				array(
					'name'        => 'Shalimar Gardens',
					'subtitle'    => 'UNESCO World Heritage Mughal Gardens',
					'image'       => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=1200&auto=format&fit=crop&q=80',
					'description' => 'Shalimar Gardens is one of Lahore\'s most iconic historical landmarks and a UNESCO World Heritage Site. Built in 1641 during the reign of Mughal Emperor Shah Jahan, the gardens feature three beautifully terraced levels, elegant marble pavilions, flowing fountains, and lush green landscapes. The gardens are a masterpiece of Mughal architecture and offer visitors a peaceful retreat while showcasing the rich cultural heritage of Pakistan.',
					'gallery'     => array(
						'https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=1200&auto=format&fit=crop&q=80',
						'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=1200&auto=format&fit=crop&q=80',
						'https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=1200&auto=format&fit=crop&q=80',
					),
				),
			),
		),
		array(
			'slug'        => 'karachi',
			'name'        => 'Karachi',
			'tagline'     => 'Pakistan\'s coastal metropolis',
			'overline'    => 'SINDH',
			'description' => 'A sprawling port city on the Arabian Sea, Karachi blends colonial-era architecture, bustling bazaars, and seaside promenades with the fast pace of Pakistan\'s largest city.',
			'hero_image'  => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/47/PK_Karachi_asv2020-02_img52_Mazar-e-Quaid.jpg/1280px-PK_Karachi_asv2020-02_img52_Mazar-e-Quaid.jpg',
			'places'      => array(
				array(
					'name'        => 'Mazar-e-Quaid',
					'subtitle'    => 'Founder\'s mausoleum',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/47/PK_Karachi_asv2020-02_img52_Mazar-e-Quaid.jpg/1280px-PK_Karachi_asv2020-02_img52_Mazar-e-Quaid.jpg',
					'description' => 'Mazar-e-Quaid is the final resting place of Muhammad Ali Jinnah, the founder of Pakistan. Completed in 1971 in a modernist style, it\'s an iconic symbol of Karachi and one of the city\'s most visited sites. The complex also holds the tombs of his sister Fatima Jinnah and two former prime ministers.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Jinnah1945a.jpg/500px-Jinnah1945a.jpg',
					),
				),
				array(
					'name'        => 'Clifton Beach',
					'subtitle'    => 'Arabian Sea coastline',
					'image'       => 'https://i.pinimg.com/1200x/13/98/30/1398308d3e16f4a8f277af17714e5fd5.jpg',
					'description' => 'Clifton is Karachi\'s upscale, historic seaside district, home to some of the city\'s most expensive real estate, foreign consulates, and high-end commercial centres, alongside the long sandy sweep of Clifton Beach along the Arabian Sea.',
					'gallery'     => array(
						'https://i.pinimg.com/736x/48/d1/17/48d117065b4b5379de3244d163dac844.jpg',
						'https://i.pinimg.com/1200x/81/37/fc/8137fc5b242d731bdaf99c0bfc3299f9.jpg',
						'https://i.pinimg.com/1200x/51/a6/e2/51a6e25d7c971796a187f2a3476f71b6.jpg',
					),
				),
				array(
					'name'        => 'Frere Hall',
					'subtitle'    => 'Colonial-era landmark',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/PK_Karachi_asv2020-02_img62_Frere_Hall.jpg/1280px-PK_Karachi_asv2020-02_img62_Frere_Hall.jpg',
					'description' => 'Frere Hall dates to Karachi\'s early British colonial era, completed in 1865. Originally built to serve as the city\'s town hall, it now houses an exhibition space and a public library set in leafy gardens in the heart of the city.',
					'gallery'     => array(
						'https://i.pinimg.com/736x/3e/08/e2/3e08e2a88a8c47be4a5a6d8938eed049.jpg',
						'https://i.pinimg.com/736x/f6/31/0d/f6310d48de470cba1cdeb9f1dc130f8d.jpg',
						'https://i.pinimg.com/736x/3b/90/b8/3b90b81800a0d150e1042a3a121f78db.jpg',
					),
				),
				array(
					'name'        => 'Empress Market',
					'subtitle'    => 'Historic Victorian bazaar',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/PK_Karachi_asv2020-02_img36_Empress_Market.jpg/1280px-PK_Karachi_asv2020-02_img36_Empress_Market.jpg',
					'description' => 'Empress Market in Karachi\'s Saddar Town dates to the British Raj era and remains one of the city\'s busiest shopping destinations, selling everything from spices, fruit, and meat to textiles, stationery, and pets.',
					'gallery'     => array(
						'https://i.pinimg.com/1200x/d4/41/6a/d4416a4d7493322cd2291af32ef06d71.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/PK_Karachi_asv2020-02_img37_Empress_Market.jpg/1280px-PK_Karachi_asv2020-02_img37_Empress_Market.jpg',
						'https://i.pinimg.com/736x/01/bd/51/01bd51188fc3c6d7b138135bff657fc5.jpg',
					),
				),
				array(
					'name'        => 'Mohatta Palace',
					'subtitle'    => 'Museum in a Rajasthani-style mansion',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Mohatta_Palace_Karachi_New_Construction.jpg/1280px-Mohatta_Palace_Karachi_New_Construction.jpg',
					'description' => 'Mohatta Palace was built in 1927 as the summer home of businessman Shivratan Mohatta, using pink Jodhpur stone in the tradition of Rajasthani palaces combined with local yellow Gizri stone. It now operates as a museum in the affluent Clifton neighborhood.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Mohotta_Palace_Karachi.jpg/1280px-Mohotta_Palace_Karachi.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/Mohatta_Palace_Karachi_2.jpg/1280px-Mohatta_Palace_Karachi_2.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/Mohatta_Palace_Khi.jpg/500px-Mohatta_Palace_Khi.jpg',
					),
				),
				array(
					'name'        => 'Port Grand',
					'subtitle'    => 'Karachi’s Premier Waterfront Destination',
					'image'       => 'https://i.pinimg.com/736x/ca/a5/2d/caa52d3f7dd46fa06c3ee2161e5f9883.jpg',
					'description' => 'Port Grand is a vibrant waterfront entertainment destination offering fine dining, cafés, shopping, cultural events, and live performances. Visitors can enjoy scenic harbor views while experiencing Karachi\'s lively atmosphere, making it one of the city\'s top leisure spots.',
					'gallery'     => array(
						'https://i.pinimg.com/1200x/b8/47/2d/b8472d2c8cacc4b70fb7e1e6a887b00b.jpg',
						'https://i.pinimg.com/736x/de/11/69/de116984e6ca2288982026c2f7c9fa3b.jpg',
						'https://i.pinimg.com/736x/cc/83/d7/cc83d79e2259df213b94750618cbf6e1.jpg',
					),
				),
				array(
					'name'        => 'Manora Island',
					'subtitle'    => 'Peaceful Island on the Arabian Sea',
					'image'       => 'https://i.pinimg.com/736x/28/ce/d4/28ced4292de847290c645342ff7f0457.jpg',
					'description' => 'Manora Island is a beautiful coastal destination located just off Karachi\'s harbor. It is known for its sandy beaches, historic lighthouse, centuries-old Hindu temple, and peaceful atmosphere. Visitors can reach the island by boat and enjoy picnics, beach walks, and scenic sea views.',
					'gallery'     => array(
						'https://i.pinimg.com/1200x/e9/4d/10/e94d1007b0787369b7d981e99fe854f8.jpg',
						'https://i.pinimg.com/1200x/e3/99/d1/e399d145a4ca2bc29b2605c806298e7a.jpg',
						'https://i.pinimg.com/1200x/5d/cb/59/5dcb59a8072d59b30eb8eebb7d5ee649.jpg',
					),
				),
			),
		),
		array(
			'slug'        => 'islamabad',
			'name'        => 'Islamabad',
			'tagline'     => 'Pakistan\'s green capital',
			'overline'    => 'FEDERAL CAPITAL',
			'description' => 'A planned modern capital set at the foot of the Margalla Hills, Islamabad pairs iconic architecture with lush parks, hiking trails, and sweeping viewpoints.',
			'hero_image'  => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Ali_Mujtaba_WLM2017_FAISAL_MOSQUE_019.jpg/1280px-Ali_Mujtaba_WLM2017_FAISAL_MOSQUE_019.jpg',
			'places'      => array(
				array(
					'name'        => 'Faisal Mosque',
					'subtitle'    => 'Iconic modern landmark',
					'image'       => 'https://i.pinimg.com/1200x/f9/68/0e/f9680eab25547de3597ad176786c5e44.jpg',
					'description' => 'The Faisal Mosque is Pakistan\'s national mosque, sited on the foothills of the Margalla Hills and named after King Faisal of Saudi Arabia, who funded its construction. Designed by Turkish architect Vedat Dalokay in a contemporary eight-sided form inspired by a Bedouin tent, it\'s the sixth-largest mosque in the world.',
					'gallery'     => array(
						'https://i.pinimg.com/736x/62/89/71/6289716d4e5f75e86751ba45e11fe4b5.jpg',
						'https://i.pinimg.com/1200x/9e/50/6f/9e506f9cabf4f87bfddab0a65d3bfe77.jpg',
						'https://i.pinimg.com/736x/b5/74/ab/b574ab2af8df1ad3ebcd7ae601ee9f20.jpg',
					),
				),
				array(
					'name'        => 'Pakistan Monument',
					'subtitle'    => 'National unity monument',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Blue_Hour_at_Pakistan_Monument.jpg/1280px-Blue_Hour_at_Pakistan_Monument.jpg',
					'description' => 'The Pakistan Monument sits on the Shakarparian Hills, built to symbolize the unity of the Pakistani people and dedicated to those who sacrificed for the country. Its four petal-shaped walls represent the four provinces, joined by three smaller petals for the territories.',
					'gallery'     => array(
						'https://i.pinimg.com/1200x/5f/cc/a2/5fcca20081679d260a2f769b1b26d406.jpg',
						'https://i.pinimg.com/736x/1e/58/fa/1e58fa46c7e902af0b3f9b11ce8b13bf.jpg',
						'https://i.pinimg.com/736x/36/6c/1f/366c1f8aaa9a5b819b956aab196ba554.jpg',
					),
				),
				array(
					'name'        => 'Rawal Lake',
					'subtitle'    => 'Beautiful Lake for Recreation',
					'image'       => 'https://i.pinimg.com/736x/1e/62/f5/1e62f5f13313c53a81a2e49ef4973b67.jpg',
					'description' => 'Rawal Lake is a beautiful artificial reservoir surrounded by lush green parks and picnic spots. Visitors can enjoy boating, fishing, birdwatching, family picnics, and relaxing views of the water and surrounding hills.',
					'gallery'     => array(
						'https://i.pinimg.com/736x/cc/5d/6f/cc5d6f0ea16c28c65849f99766a80215.jpg',
						'https://i.pinimg.com/736x/c4/a4/d5/c4a4d5f0584cbbf8a1664675c077fec4.jpg',
						'https://i.pinimg.com/736x/02/86/ad/0286ade013af99af66dcec61d12f242b.jpg',
					),
				),
				array(
					'name'        => 'Margalla Hills',
					'subtitle'    => 'Hiking trails & viewpoints',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/e/ec/Margalla_Hills_Islamabad.jpg',
					'description' => 'The Margalla Hills form the northern edge of Islamabad, part of the Himalayan foothills and a subtropical moist broadleaf forest ecoregion within Margalla Hills National Park. A network of numbered hiking trails makes them one of the capital\'s most popular outdoor escapes.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/Margalla_Hills_National_Park.jpg/1280px-Margalla_Hills_National_Park.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/A_Greeny_hiking_way_in_in_Margalla_Hills.jpg/500px-A_Greeny_hiking_way_in_in_Margalla_Hills.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Classic_tree.JPG/250px-Classic_tree.JPG',
					),
				),
				array(
					'name'        => 'Daman-e-Koh',
					'subtitle'    => 'Panoramic city viewpoint',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/e/e5/The_Margalla_Hills%2C_Islamabad%2C_Pakistan_from_Daman-e-Koh_park.jpg',
					'description' => 'Daman-e-Koh ("skirt of the hill" in Persian) is a hilltop garden and viewpoint in the middle of the Margalla Hills, about 500 feet above Islamabad. It\'s a favorite spot for both residents and tourists to take in sweeping views of the capital.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/Splendid_view_of_Islamabad_from_Daman-e-Koh.jpg/1280px-Splendid_view_of_Islamabad_from_Daman-e-Koh.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/4/44/Daman-E-Koh.jpg?utm_source=commons.wikimedia.org&utm_campaign=index&utm_content=original',
						'https://visitsilkroad.org/wp-content/uploads/2021/04/Daman-E-Koh-View-Point-featured_image.jpg',
					),
				),
				array(
					'name'        => 'Taxila',
					'subtitle'    => 'UNESCO Buddhist ruins, 3,000+ years old',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Dharmarajika_stupa%2CTaxila.jpg/1280px-Dharmarajika_stupa%2CTaxila.jpg',
					'description' => 'Taxila, historically known as Takshashila, is a UNESCO World Heritage Site about 25km northwest of Islamabad. Founded around 1000 BCE, it was once a major center of Buddhist and Gandharan learning, and today its excavated stupas, monasteries, and museum draw visitors from around the world.',
					'gallery'     => array(
						'https://greenpaktourism.com/_next/image?url=%2Fimages%2Fjournal%2Fsculpture-making-taxila.jpeg&w=3840&q=75',
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEhGh8d1zAgnAvaUSGOK9oo6TGgKKkv24q4b25efph9w&s=10',
						'https://seepakistantours.com/wp-content/uploads/2022/12/Taxila-Khanpur-1-day-tour.jpg',
					),
				),
			),
		),
		array(
			'slug'        => 'peshawar',
			'name'        => 'Peshawar',
			'tagline'     => 'Ancient crossroads of the Silk Road',
			'overline'    => 'KHYBER PAKHTUNKHWA',
			'description' => 'One of South Asia\'s oldest living cities, Peshawar sits at the gateway to the Khyber Pass. Its old bazaars, Mughal mosques, and nearby Gandhara ruins hold over 2,000 years of Buddhist and Islamic history.',
			'hero_image'  => 'https://upload.wikimedia.org/wikipedia/commons/4/44/Bala_Hisar_Fort.jpg',
			'places'      => array(
				array(
					'name'        => 'Bala Hisar Fort',
					'subtitle'    => 'Centuries-old fort overlooking the city',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/4/44/Bala_Hisar_Fort.jpg',
					'description' => 'Bala Hisar Fort sits on a raised mound overlooking Peshawar, with a history stretching back over two millennia. The current structure was largely rebuilt by the Sikh Empire in the 1830s and later used by the British; today it remains a military installation, visible across the city skyline.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1d/Balahisar-peshawar.jpg/1280px-Balahisar-peshawar.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/4/44/Bala_Hisar_Fort.jpg?utm_source=en.wikipedia.org&utm_campaign=index&utm_content=original',
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMMHX29IETpsbX_PxhFEExw9HoT8vEuP59eiUqhBu536ajXPlrM2JfgTo&s=10',
					),
				),
				array(
					'name'        => 'Qissa Khwani Bazaar',
					'subtitle'    => 'The historic "Storytellers\' Market"',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/8/81/Oldpeshawarcity.jpg',
					'description' => 'Qissa Khwani Bazaar, the "Storytellers\' Market," has been the commercial and social heart of old Peshawar for centuries — historically a resting point for Silk Road caravans, where merchants and travelers swapped tales over tea.',
					'gallery'     => array(
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5BQn4cBfRylmXfp81Z_46x0D4l0-W-Eeyt2Z4uhqUdg&s=10',
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6RA0Adpa3HyjHhFVBb6koiOJr82FfHdty4sp4vt3ycA&s=10',
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQo2Hgd0l7E-QbjXHaDsPPszKLzoxC9OXb-hCi442cq3A&s=10',
					),
				),
				array(
					'name'        => 'Mahabat Khan Mosque',
					'subtitle'    => '17th-century Mughal mosque',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/8/89/MKmosque.jpg',
					'description' => 'Built in 1630 and named after Mughal governor Mahabat Khan, this mosque\'s white marble façade is considered one of Peshawar\'s most iconic sights, set within the narrow lanes of the old walled city.',
					'gallery'     => array(
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqHu6EUmeJtdcWBEF7R_IEls0wDKVPisWCzJiVeRDvNw&s=10',
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ94d0qyiDKshSNt0wyc4_Lg6UbTx8SInsi1DOWmpNpuQ&s=10',
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCPDl9DjIPNsLqJj32a14HYmADTiGhcgrWKM1bRaQEVA&s=10',
					),
				),
				array(
					'name'        => 'Peshawar Museum',
					'subtitle'    => 'One of the world\'s finest Gandhara Buddhist art collections',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/e/ea/Peshawar_Museum.JPG',
					'description' => 'The Peshawar Museum houses one of the world\'s most significant collections of Gandhara Buddhist art — stone sculptures and reliefs recovered from sites across the ancient Gandhara region, offering a window into a civilization that once bridged South and Central Asia.',
					'gallery'     => array(
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSegJv95rdSTZ0WzNy3H7ru-0k6_Hs8Z3NbyjQtsrzBng&s=10',
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbzjl_fbYW46iPs6-yjsYEdoR9l3rnUq42ZYTUtiROLQ&s=10',
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfLFDSoMGQHT2IVka_gzGDz4f_tctJxCCWWNGMXE8BIg&s=10',
					),
				),
				array(
					'name'        => 'Takht-i-Bahi',
					'subtitle'    => 'UNESCO-listed Buddhist monastery ruins',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Takht-e-bahi.jpg/1280px-Takht-e-bahi.jpg',
					'description' => 'Takht-i-Bahi is an Indo-Parthian archaeological site near Mardan, containing the ruins of an ancient Buddhist monastery considered among the most important surviving relics of Buddhism from the Gandhara civilization. It has been a UNESCO World Heritage Site since 1980.',
					'gallery'     => array(
						'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0c/ce/c6/96/view-of-takht-i-bhai.jpg?w=1200&h=1200&s=1',
						'https://thumb.wikimedia.org/wikipedia/commons/thumb/2/21/Takht-i-Bahi_Buddhist_Monastery.jpg/250px-Takht-i-Bahi_Buddhist_Monastery.jpg?utm_source=en.wikipedia.org&utm_campaign=parser&utm_content=thumbnail',
						'https://www.opendharma.com/content/images/size/w1200/2018/11/TakhtTHREE-1.jpg',
					),
				),
			),
		),
		array(
			'slug'        => 'sindh-heritage',
			'name'        => 'Mohenjo-daro & Sindh Heritage',
			'tagline'     => '4,500 years of the Indus Valley Civilization',
			'overline'    => 'SINDH',
			'description' => 'Sindh is home to some of the oldest urban civilizations on Earth. From the 4,500-year-old ruins of Mohenjo-daro to the vast Mughal-era necropolis of Makli, this is Pakistan\'s deepest layer of history.',
			'hero_image'  => 'https://upload.wikimedia.org/wikipedia/commons/0/03/Mohenjodaro_-_view_of_the_stupa_mound.JPG',
			'places'      => array(
				array(
					'name'        => 'Mohenjo-daro',
					'subtitle'    => 'UNESCO World Heritage Indus Valley city, c. 2500 BCE',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/0/03/Mohenjodaro_-_view_of_the_stupa_mound.JPG',
					'description' => 'Mohenjo-daro, in Sindh\'s Larkana District, was one of the largest settlements of the ancient Indus Valley Civilisation and one of the world\'s earliest major cities — contemporaneous with ancient Egypt and Mesopotamia. Its excavated streets, wells, and Great Bath reveal a remarkably advanced urban society dating back to around 2500 BCE.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Archaeological_Ruins_at_Moenjodaro-108221.jpg/1280px-Archaeological_Ruins_at_Moenjodaro-108221.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/e/e0/Mohenjo-daro_museum_relics7.JPG?utm_source=commons.wikimedia.org&utm_campaign=index&utm_content=original',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/9/93/Moen_Jo_Daro_%28The_Mond_of_the_Deads%29.jpg/1280px-Moen_Jo_Daro_%28The_Mond_of_the_Deads%29.jpg',
					),
				),
				array(
					'name'        => 'Makli Necropolis',
					'subtitle'    => 'One of the largest funerary sites in the world',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Nizam_al-Din_Tomb%2C_Makli_Hill%2C_Sindh..jpg/1280px-Nizam_al-Din_Tomb%2C_Makli_Hill%2C_Sindh..jpg',
					'description' => 'Makli Necropolis, spread over 10 square kilometres near Thatta, is one of the largest funerary sites in the world, holding an estimated 500,000 to a million tombs built over roughly 400 years. Inscribed as a UNESCO World Heritage Site in 1981, it houses monuments to royalty, Sufi saints, and scholars.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/View_of_Makli_by_Usman_Ghani_%28cropped%29.jpg/1280px-View_of_Makli_by_Usman_Ghani_%28cropped%29.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Makli_Thatta_Sindh_Pakistan_06112010047.jpg/1280px-Makli_Thatta_Sindh_Pakistan_06112010047.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Makli_Tombs1.jpg/1280px-Makli_Tombs1.jpg',
					),
				),
				array(
					'name'        => 'Shah Jahan Mosque, Thatta',
					'subtitle'    => 'Mughal mosque famed for its acoustics & tile-work',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/e/e7/Shah_jahan_mosque_-Thatta_1_%28asad_aman%29.jpg',
					'description' => 'The Shah Jahan Mosque, also called the Jamia Masjid of Thatta, was built in the 17th century and is considered to have South Asia\'s most elaborate display of Mughal-era tile-work, along with distinctive geometric brickwork and remarkable acoustic design.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Shah_Jehan_Mosque%2C_Thatta%2C_Sindh..jpg/1280px-Shah_Jehan_Mosque%2C_Thatta%2C_Sindh..jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Shah_jahan_mosque_-Thatta_3_%28asad_aman%29.jpg/500px-Shah_jahan_mosque_-Thatta_3_%28asad_aman%29.jpg',
						'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/Shah_Jahan_Mosque_Aerial_View.jpg/1280px-Shah_Jahan_Mosque_Aerial_View.jpg',
					),
				),
			),
		),
		array(
			'slug'        => 'kashmir',
			'name'        => 'Kashmir',
			'tagline'     => 'Valleys, alpine lakes & pine forests',
			'overline'    => 'AZAD KASHMIR',
			'description' => 'Azad Kashmir is a land of deep green valleys, glacial lakes, and pine-covered mountains — often called one of the most beautiful and underrated corners of Pakistan.',
			'hero_image'  => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Neelum_Valley%2C_Azad_Jammu_%26_Kashmir%2C_Pakistan.jpg/1280px-Neelum_Valley%2C_Azad_Jammu_%26_Kashmir%2C_Pakistan.jpg',
			'places'      => array(
				array(
					'name'        => 'Neelum Valley',
					'subtitle'    => 'Rivers, pines & mountain villages',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Neelum_Valley%2C_Azad_Jammu_%26_Kashmir%2C_Pakistan.jpg/1280px-Neelum_Valley%2C_Azad_Jammu_%26_Kashmir%2C_Pakistan.jpg',
					'description' => 'Neelum Valley is the largest and northernmost district of Azad Kashmir, following the Neelum (Kishanganga) River through pine forests and mountain villages. It was among the areas hardest hit by the 2005 Kashmir earthquake and has since rebuilt into one of the region\'s premier scenic destinations.',
					'gallery'     => array(
						'https://thumbs.dreamstime.com/b/neelum-valley-kashmir-pakistan-experience-natural-wonder-stunning-photo-showcasing-pristine-beauty-region-274581041.jpg',
						'https://res.cloudinary.com/dyiffrkzh/image/upload/c_fill,f_auto,fl_progressive.strip_profile,g_center,h_400,q_auto,w_700/v1718952554/banbanjara/j4gff29jmaljv4bntd3z.jpg',
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRv8Uug-62Ze_gJV65SpdciKGuUB6ctHAwdIRl_lF1NBQ&s=10',
					),
				),
				array(
					'name'        => 'Ratti Gali Lake',
					'subtitle'    => 'High-altitude alpine lake',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Ratti_Gali_Lake_.jpg/1280px-Ratti_Gali_Lake_.jpg',
					'description' => 'Ratti Gali Lake is a glacial alpine lake in Neelum Valley sitting at 3,683m, fed by meltwater from the surrounding peaks. Reachable by a scenic jeep track and short hike, its brilliant blue water ringed by snow is one of Azad Kashmir\'s signature sights.',
					'gallery'     => array(
						'https://i.dawn.com/primary/2015/07/55af7281317b5.jpg',
						'https://pakistantourntravel.com/wp-content/uploads/2018/07/Ratti-Gali-Lake-Trek.jpg.webp',
						'https://inp.net.pk/images/20240531140230_customMedium_1300x450_45.webp',
					),
				),
				array(
					'name'        => 'Toli Pir',
					'subtitle'    => 'Meadows & mountain views',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/b/ba/Toli_Pir%2C_Azad_Kashmir_8.jpg',
					'description' => 'Toli Pir is a hilltop meadow area near Rawalakot in Azad Kashmir\'s Poonch District, at roughly 9,000ft elevation. On a clear day, views stretch to Abbaspur, Bagh, and the Poonch River, making it a favorite summer escape drawing thousands of visitors each year.',
					'gallery'     => array(
						'https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Tolipir.jpg/1280px-Tolipir.jpg',
						'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1c/57/63/c6/hiking-about-3-hrs-toward.jpg?w=1200&h=1200&s=1',
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjgUReaADKO7iQCw1Bu_FyZ7xcVqvgB6FYwJi4atY_EcdNcocOg4ZQ0SFN&s=10',
					),
				),
				array(
					'name'        => 'Muzaffarabad',
					'subtitle'    => 'Capital of Azad Kashmir',
					'image'       => 'https://upload.wikimedia.org/wikipedia/commons/c/c2/Pakistan_is_full_of_breathtaking_views_-_Muzafarabad.JPG',
					'description' => 'Muzaffarabad is the capital city of Azad Kashmir, set at the dramatic confluence of the Neelum and Jhelum rivers. It serves as the main gateway for travelers heading into the Neelum Valley and the surrounding mountains.',
					'gallery'     => array(
						'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFBgFUkBzaN0gNiyt3GzlCO-hmSwfyOAsmEfPVQcjlAn1ien7klv79r_wu&s=10',
						'https://upload.wikimedia.org/wikipedia/commons/c/c2/Pakistan_is_full_of_breathtaking_views_-_Muzafarabad.JPG?utm_source=en.wikipedia.org&utm_campaign=index&utm_content=original',
						'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1c/b0/50/93/caption.jpg?w=500&h=500&s=1',
					),
				),
			),
		),
	);

	/**
	 * Filter the regions list, e.g. from a child theme or plugin.
	 *
	 * @param array $regions Regions.
	 */
	return apply_filters( 'h4s_regions', $regions );
}

/**
 * Find a region by slug.
 *
 * @param string $slug Region slug.
 * @return array|null
 */
function h4s_get_region_by_slug( $slug ) {
	foreach ( h4s_get_regions() as $region ) {
		if ( $region['slug'] === $slug ) {
			return $region;
		}
	}
	return null;
}

/**
 * Find a place within a region.
 *
 * @param string $region_slug Region slug.
 * @param string $place_slug  Slugified place name.
 * @return array{region:array,place:array}|null
 */
function h4s_get_place_by_slug( $region_slug, $place_slug ) {
	$region = h4s_get_region_by_slug( $region_slug );
	if ( ! $region ) {
		return null;
	}
	foreach ( $region['places'] as $place ) {
		if ( h4s_slugify( $place['name'] ) === $place_slug ) {
			return array(
				'region' => $region,
				'place'  => $place,
			);
		}
	}
	return null;
}

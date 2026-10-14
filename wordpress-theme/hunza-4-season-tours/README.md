# Hunza 4 Season Tours — WordPress Theme

A PHP WordPress port of the Hunza 4 Season Tours React site. Same layout, copy, destinations, itineraries, car rental, gallery, reviews, FAQ and WhatsApp contact flow.

## Install

1. Download `hunza-4-season-tours.zip`.
2. In WordPress go to **Appearance → Themes → Add New → Upload Theme**.
3. Upload the zip, then **Activate**.
4. Go to **Settings → Permalinks** and click **Save Changes** (needed so `/destinations/...` and `/tours/...` URLs work).

You can also unzip the folder into `wp-content/themes/hunza-4-season-tours/` and activate it from the Themes screen.

## After activate

- **Appearance → Customize → Contact Details** — phone, WhatsApp, email, address, social links and the Google Maps embed.
- **Appearance → Customize → Site Identity** — optional custom logo (falls back to the bundled Hunza logo).
- **Appearance → Menus** — optional. If no menu is assigned, the original Destinations / About / Itineraries / Car Rent / Gallery / Reviews links are used.

Set the site homepage to a static page under **Settings → Reading** if you want WordPress pages in the mix; `front-page.php` always renders the marketing homepage when the front page is shown.

## Pages (no posts needed)

These URLs are registered by the theme:

| URL | Content |
| --- | --- |
| `/` | Home (hero, search, destinations, about, tours, car rental, seasons, gallery, reviews, FAQ, contact) |
| `/destinations/{region}/` | Region (8 regions, 53 places) |
| `/destinations/{region}/{place}/` | Place detail + gallery |
| `/tours/{slug}/` | Signature itinerary (10 / 16 / 23 days) |

Search, contact and vehicle-reserve buttons open WhatsApp with a pre-filled message, same as the original site.

## Rebuild CSS (optional)

The compiled stylesheet is already in `assets/css/main.css`. To change classes:

```bash
cd wp-content/themes/hunza-4-season-tours
npm install
npm run build
```

`npm run watch` rebuilds on save.

## Requirements

WordPress 6.0+, PHP 7.4+.

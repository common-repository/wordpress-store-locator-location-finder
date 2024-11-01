=== Google Maps Store Locator for WordPress ===
Contributors: moaluko
Donate link: http://www.viadat.com/donate
Tags: store locator, store locater, google maps, dealer locator, dealer locater, zip code search, shop locator, shop finder, zipcode, location finder, places, stores, maps, mapping, mapper, coordinates, latitude, longitude, geo, geocoding, shops, ecommerce, e-commerce, business locations
Requires at least: 2.5
Tested up to: 2.9.1
Stable tag: 1.2.37

A store locator plugin for developers who create sites in Wordpress & web site owners who want to quickly show important locations.

== Description ==

Google Maps Store Locator For WordPress focuses on providing mapping for:
* Web designers & developers who create sites in Wordpress
* Web site owners & businesses needing to show important stores or any other type of location. 

Also referred to as a dealer locator (locater), shop finder, and zip code or zipcode search.
Its strength is in its flexibility to allow you to easily manage a few or a thousand or more locations through the admin interface.

= Cool Built-in Functionality & Features =
* Mapping is available in numerous countries, and will continue to be added as Google adds new countries to their Google Maps API.  See the documentation for the latest.
* Supports international languages and character sets. 
* Allows you to use unique map icons or your own custom map icons --- great for branding your map
* Gives your map the desired look by using our Map Designer&trade; interface in the admin section
* Pick other cool Google Maps options, such as an inset box, zoom level, map types (street, satellite, hybrid, physical), and more
* Uses miles (American system) or kilometers (Metric system)
* Has good loading speed since Javascript & CSS only load on pages that display the map (or might need access to the JS/CSS)

= Upgrades =
* If you need power features, [supercharge your store locator with addons & themes. Upgrade now!](http://www.viadat.com/products-page)

= Important Links =
[Store Locator & Translations](http://www.viadat.com/store-locator) | [Blog - New Features & Updates](http://www.viadat.com/category/store-locator) | [Documentation](http://docs.viadat.com)

= Special Thanks to Translators! (You can always email new translations to info{at}viadat{dot}com) =
* Simon S. -- German (Deutsche), Italian (Italiano), Czech (Ceština), French (Français)
* Gwyn F. -- Spanish (Español)
(If you provide your web address, we'll link back to you)

== Installation ==

= MAIN PLUGIN =

1. Upload the `store-locator` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Sign up for a Google Maps API Key for your domain at http://code.google.com/apis/maps/signup.html
4. Add your locations through the 'Add Locations' page in the Store Locator admin panel
5. Place the code '[STORE-LOCATOR]' (case-sensitive) in the body of a page or a post to display your store locator

= ADD-ONS =

1. Unzip & Upload the entire add-on folder to the `/wp-content/uploads/sl-uploads/addons` directory (note the new location for addons as of v1.2.37).
2. Activate the add-on by updating the Activation Key that you receive after purchase at the bottom of the "News & Upgrades" Page.

= THEMES =

1. Unzip & Upload the entire theme folder to the `wp-content/uploads/sl-uploads/themes` directory (note the new location for themes as of v1.2.37).
2. Select theme from the theme dropdown menu under the "Design" section on the "Map Designer"&trade; Page.

= ICONS =

1. There are some default icons in the `/wp-content/plugins/store-locator/icons` directory. 
2. Add your own custom icons in to `wp-content/uploads/sl-uploads/custom-icons` (note the new location for custom icons as of v1.2.37).

== Changelog ==

= 1.2.37 =
* Updated default database, server, & connection character set and collation.  Should complete international language support.
* A few XHTML Transitional 1.0 validation fixes
* Different url encoding for map directions
* Directory structure update: Upgrades (addons, themes), icons, languages, images, custom css moved to `wp-content/uploads/sl-uploads` directory (moved automatically).  
* WordPress default one-click updater is now active again.  (Custom quick updater introduced in version 1.2.21 is no longer needed)
* Moved inline styles to stylesheet classes for search result text and columns, and for text in info bubble on map.  Fully customizable from 'store-locator.css' now.
* =NOTE:= As a result of the updated directory structure, you no longer need to worry about losing any of your customizations (CSS, addons, themes, icons, images, languages)! Place any customizations that you make into the corresponding folder in the `wp-content/uploads/sl-uploads` directory and they will be safe during upgrades to newer, better versions (For example: if place 'store-locator.css' in the `wp-content/uploads/sl-uploads/custom-css` folder, the plugin will use those styles instead of the styles of any 'store-locator.css' in the main `store-locator` directory.  So, when an update is performed --- you don't lose your style customizations!)

= 1.2.36 =
* Added option to select character encoding set on 'Localization & Google API Key' page. Should help with supporting characters in many different languages.

= 1.2.35.1 =
* Removed non-working Google Map Country Domains (Hungary, Kenya, Malaysia, South Africa, Thailand -- seems they have map domains, but can't be embedded on websites yet)

= 1.2.35 =
* Improved restricted loading of JS, CSS to pages & posts on which store locator shortcode has been placed (and the archive pages only if shortcode is placed into any posts, and the home and search pages)
* Added input field on 'Map Designer' page for editing message to website visitors shown below map
* Modified custom upgrade link on plugins page to be one-click, similar to other plugins
* Few other admin styling changes for buttons
* Fixed bug causing search results to not show all locations for a given radius when distance unit is set to 'km'
* Improved geocoding on locations for each Google Map Country Domain. Added param that should make geocoding more accurate depending on which country you've selected

= 1.2.34 =
* Fixed 50+ XHTML validation issues (HTML generated by plugin should now validate as XHTML 1.0 Transitional)
* Updated 'Localization & Google API Key' page layout
* Added new Google Maps country domains
* Multiple minor interface improvements across admin pages

= 1.2.33.1 =
* Small XHTML validation fix
* Removed restriction of loading javascript & CSS to only pages with store locator shortcode for time-being

= 1.2.33 =
* Fixed gray / blank map issue due to CSS from certain themes affecting map tile images
* Cleaned up header javascript, CSS appearance
* Fixed 'store-locator-js.php' issue causing gray / blank map for some users due to their servers
* Restricted loading of javascript, CSS to only pages on which store locator shortcode has been placed

= 1.2.32 =
* Fixed directions link by better handling of '#' (and other symbols) in addresses

= 1.2.31 =
* Fixed small bug with display of URL on "View Locations" page for each location
* Beautified the update form for individual locations on the "View Locations" page

= 1.2.30 =
* Improved handling of URLs for each location. Now, URL will still show up even if you omit the "http://" at the beginning
* Beautified the default input form on the "Add Locations" page

= 1.2.29 =
* Fix for some maps having issues showing results in certain browsers

= 1.2.28.4 =
* Minor fix to prevent duplicate of the same city from showing up in the city dropdown options

= 1.2.28.3 =
* Fixes the "The Google Maps API rejected your request ..." error on the "Add Locations" page.  Good catch by forum user 'Israel' of http://earthsoutlet.com .

= 1.2.28.2 =
* Incorporated fix for "Warning: Cannot modify header information – headers already sent ..." error occuring for those that have updated to WordPress Version 2.8.1.  Fix provided by forum user 'mikeycnp' here: http://rosile.com/2009/07/wp-store-locator-fix/ --- thank you mikeyncp.  Users, please make sure to leave thank you comment on http://rosile.com .

= 1.2.28.1 =
* Fixed "You do not have sufficient permissions to access this page." issue occuring for those that have updated to WordPress Version 2.8.1
* Added this Changelog

== Frequently Asked Questions ==

Make sure to check http://docs.viadat.com for the most updated information

= Do I need a Google Account to use this store locator? =

Yes, you will need a Google account in order to retrieve an API for your maps to work properly

1. To sign up for a Google Account, visit: https://www.google.com/accounts/
2. To sign up for a Google Maps API Key, visit: http://code.google.com/apis/maps/signup.html

= How Do I use a Translation? =

1. Place .po & .mo translation files into the `/wp-content/plugins/store-locator/languages` folder, and then change the `WPLANG` constant to the corresponding language abbreviation in the `wp-config.php` file in the root wordpress directory
2. Example: to use French, make sure `lol-fr_FR.po` & `lol-fr_FR.mo` are in the `languages` folder, then make sure to update the code in `wp-config.php` to read `define('WPLANG', 'fr_FR')`, and Voila, Il sera en francais (It will be in French).

= Which countries is this compatible with? =

This plugin is compatible with all countries that have Google Map domains. This includes:

* Austria (updated as of v1.2.28)
* Australia
* Belgium
* Brazil
* Canada
* Switzerland
* Czech Republic
* Germany
* Denmark
* Spain
* Finland
* France
* Italy
* Japan (updated as of v1.2.28)
* Netherlands
* Norway
* New Zealand
* Poland
* Russia
* Sweden
* Taiwan (updated as of v1.2.28)
* United Kingdom
* United States

Added (as of v1.2.28):

* China
* India
* Hong Kong
* Liechtenstein
* South Korea

Removed (inactive domain or domain can't be used to embed a map on a website yet):

* Bosnia and Herzegovina (as of v1.2.28)
* Hungary (as of v1.2.35.1)
* Kenya (as of v1.2.35.1)
* Malaysia (as of v1.2.35.1)
* South Africa (as of v1.2.35.1)
* Thailand (as of v1.2.35.1)

Added (as of v1.2.34):

* Argentina
* Chile
* Mexico
* Portugal
* Singapore
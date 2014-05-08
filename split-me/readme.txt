Theme Name: Split Me
Theme URI: http://manoz.github.io/split-me/
Version: 2.4.6
Requires at least: WP 3.6
Tested up to: WP 3.9

Author: Kevin Legrand
Author URI: http://k-legrand.fr/
Github URI: https://github.com/Manoz/split-me
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl.html
-------------------------------------------------------
Split Me WordPress Theme, Copyright 2014 k-legrand.fr
Split Me is distributed under the terms of the GNU GPL
-------------------------------------------------------

========= Credits =========

Split Me uses:
* Open Sans font (available through Google web Fonts: http://www.google.com/webfonts/specimen/Open+Sans), licensed under Apache License Version 2 (http://www.apache.org/licenses/LICENSE-2.0.html)
* A Fontello custom pack for the icon font with only "Font Awesome" (http://fontello.com), licensed under SIL OFL 1.1 (http://scripts.sil.org/OFL)
* Modernizr (http://modernizr.com/) script licensed under MIT license (www.modernizr.com/license/)
* Image /images/default-header.jpg (http://pixabay.com/fr/pin-for%C3%AAt-coussin-clairi%C3%A8re-misty-273826/) is released into the public domain.
* Image /images/default-header-2.jpg (http://pixabay.com/fr/le-chat-sweet-kitty-les-animaux-323262/) is released into the public domain.

========= Installation =========

You can install the theme through the WordPress installer under "Themes" > "Install themes" by searching for it.
Alternatively you can download the file, unzip it and move the unzipped contents to the "wp-content/themes" folder
of your WordPress installation. You will then be able to activate the theme.

========= Updates =========

Be careful to save your /inc/custom.php file before updating the theme.
I removed the Theme Option page. You can now choose your layout and your own colors in 'Appearance' > 'Customize' in your back office.
If you go in the WordPress Customizer, you will maybe see some PHP Errors. It's a bug with WordPress 3.9 and default header images. There is no impact in your website. The error will disapear in the next WordPress Update: https://core.trac.wordpress.org/ticket/27850

========= Instructions =========

Split Me has no extra options because it does not seem necessary.
The only options are those available in the WordPress Customizer:
* Custom layout (left or top header)
* Custom header (the badass left picture)
* Custom background (colors and images)
* Custom colors (post titles, icons, menu, site title, etc...)

Also, the theme has no sidebar and the thumbnails are not displayed in a <img> tag. That's why "Theme Check" will not find the_post_thumbnail() because it's not needed. Read below for the thumbnails.

If you set a thumbnail on your post, it will be displayed in the large box on the left. You need to choose a thumbnail size, minimum 800x800 pixels.
If you do not set a thumbnail, the image that you have set in "custom-header" will be displayed.

========= Support =========

For questions, comments or bug reports, please go to WordPress forums (http://wordpress.org/support/theme/split-me) or contact me on Twitter @Manoz or also on Github.

== Changelog ==

= 2.4.6 - 02.05.2014 =
* Add sanitization callback for radio button
* Add a new default header image
* Change theme screenshot
* My friends are getting married today. Happy life for them <3

= 2.4.4 - 01.05.2014 =
* Remove theme option page
* Add custom settings in the WP Customizer
* Changed the default title and menu colors
* Removed crappy gradients
* This theme can generate candies. Yummy!

= 2.4.3 - 29.04.2014 =
* Background Image if IE < IE 10
* Fix theme update error
* CSS and JS minify
* This theme is now able to receive kittens coming from the moon

= 2.4 - 15.04.2014 =
* Tested up to WP 3.9
* Added color schemes in Theme Options
* This theme does not make your heart bleed

= 2.3 - 10.04.2014 =
* Add a better post format for audio and video posts
* Add Theme Options (Theme Layout)

= 1.0.8 - 31.03.2014 =
* Better display on mobile
* Add an icon on homepage if the post has comments
* This theme is now able to send kittens on the moon

= 1.0.7 - 12.03.2014 =
* Remove old junk css vendor prefixes
* Fix an issue with PHP 5.4 and earlier
* Definitely fix for the custom header

= 1.0.6 - 11.03.2014 =
* Lot of css fix
* Minified /css/a-normalize.css
* Fix default and french translation
* Fix the custom_header in search results page.

= 1.0.5 - 06.03.2014 =
* Removed 'accessibility-ready' tag since this theme is not accessibility-ready yet :( I'll work on it in the next update.
* Add an "Updates" section in readme.txt

= 1.0.4 - 02.03.2014 =
* Remove /inc/clean.php
* Update /images/default-header.jpg
* Update screenshot.png
* Change /css/main.css version

= 1.0.3 - 25.02.2014 =
* Remove /inc/clean.php
* Remove 'nice search' tweak from /inc/tweaks.php
* Add Icon Font License in readme.txt
* Add defaut header images credits

= 1.0.2 - 21.02.2014 =
* Add /lang and French translation

= 1.0.1 - 21.02.2014 =
* Fix get_header(); and get_footer();
* Fix wp_title()
* Remove favicon (temporary)
* Fix home_url();
* Remove all remove_action() calls
* Fix protocol for google webfont
* Fix wp_enqueue_script( 'jquery' );
* Fix all add_theme_support. They're now in the after_setup_theme action.
* Fix prefix for all functions
* Fix credits links
* Add new theme URI
* Add copyrights for kitten images

= 1.0.0 - 20.02.2014 =
* Initial release \o/




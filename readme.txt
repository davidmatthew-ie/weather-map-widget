=== Weather Map Widget ===
Contributors: davidmatthew
Tags: weather, map, forecast, windy.com, wind, rain, clouds, sun, temperature, widget, shortcode, responsive, translation-ready
Requires at least: 5.0
Tested up to: 5.2.2
Requires PHP: 7.0
Stable tag: 1.0.0
License: GPL-3
License URI: https://www.gnu.org/licenses/gpl-3.0.txt

Easily embed the windy.com widget as a native WordPress widget or shortcode.

== Description ==
This plugin allows you to easily embed the [windy.com](https://www.windy.com) widget on your website, in the form of a native WordPress widget (accessible from Appearance > Widgets) or as a simple shortcode.

= Features =
* Set the overlay to either wind, temperature, rain, clouds or radar/lightning.
* Use either Celsius or Fahrenheit as the temperature scale.
* Set the width and height using responsive (%) and/or fixed (px) values.
* Manually define longitude and latitude for precise location coordinates.
* Choose from 8 levels of zoom (min. 3, max. 11).

= Shortcodes =
The shortcode takes seven attributes. You can simply use `[weather-map]` and it will work, but you will most likely want to customise the remaining attributes yourself. An example of a fully filled-out shortcode would be `[weather-map width="100%" height="350px" lat="53.199" lon="-7.603" zoom="4" layer="temp" scale="C"]`. 

The attributes can be set as follows:
* `width` accepts any valid CSS property for width.
* `height` accepts any valid CSS property for height.
* `lat` must contain a string of digits to three decimal places, in the range of -90 to +90 (e.g. "53.199"). 
* `lon` must also contain a string of digits to three decimal places, in the range of -180 to +180 (e.g. "-120.894"). 
* `zoom` must contain a number between 3 and 11 (inclusive).
* `layer` accepts the following values: clouds, radar, rain, temp and wind.
* `scale` accepts either "C" or "F", defining Celsius and Fahrenheit respectively.

Note that in the case of an invalid value, a default value will be used instead.

== Installation ==
1. No special set-up required - just click install and activate, and you're good to go!
2. If you manually download the plugin, just unzip to the WordPress plugins folder and the plugin will be automatically detected. It can then be activated as normal.

== Frequently Asked Questions ==
Why not just embed the iframe directly from [windy.com](https://www.windy.com) instead of using this plugin?

If you'd prefer to do this, that's great - no problem! However, this plugin was created to make the iframe that [windy.com](https://www.windy.com) kindly provide even more useful. To that end, it offers the following advantages:

* While an iframe can be inserted directly into a page or post, you can't insert an iframe directly into the WordPress widgets area (which is how most themes allow you to set the content for site sidebars and footers etc). This plugin allows you to do precisely that.
* You can change the default overlay from wind to either temperature, rain, clouds or radar/lightning.
* Width and height can be set to responsive (percentage-based) as well as fixed (pixel-based) values.
* And even in the case of an iframe inserted into a page or post, the generated code can often confuse people who don't have any technical/programming experience. The shortcode provided by this plugin simplifies this considerably, making it readable and easy to customise by anyone, technical and non-technical alike.

== Screenshots ==
1. The Weather Map Widget placed in a sidebar, zoomed in over Ireland (where I'm from!). We talk a lot about the weather here. :)
2. The corresponding view from the admin area (Appearance > Widgets).

== Changelog ==
= 1.0.0 =
* Initial release.
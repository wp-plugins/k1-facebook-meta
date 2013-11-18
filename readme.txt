=== Klan1 WP Facebook Meta ===
Contributors: k1-j0hnd03
Donate link: http://klan1.com/
Tags: facebook open graph, facebook meta, open graph meta, meta, facebook, open graph, google, google plus, google+, klan1
Requires at least: 2.7
Tested up to: 3.7.1
Stable tag: init
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Basic zero-config Facebook Open Graph meta generator.

== Description ==

This plugin generate the basic Facebook metas and do not have any configuration to do it. Those are valid for Google Plus too (I think!).

For the `og:image` this plugin will take automatically the featured image or the first image attachment avaliable to crop it to 116x116. The others tag are described bellow: 

`<meta property="og:title" content="{POST TITLE @ BLOG TITLE}"/> 
<meta property="og:type" content="article"/> 
<meta property="og:image" content="{TIMTHUMB FEATURED IMAGE URL}"/> 
<meta property="og:url" content="{PAGE OR POST URL}"/> 
<meta property="og:site_name" content="{BLOG NAME}"/>`

IMPORTANT: This plugin depends on our plugin called "Klan1 Common WP Functions".

== Installation ==

1. Install the "Klan1 Common WP Functions" plugin. Search for it on `Plugins -> Ad new` WP control panel section or from http://wordpress.org/plugins/klan1-functions/.
2. Upload `k1-facebook-meta` directory to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. All ready, this one works immediately on pages and post.

== Frequently Asked Questions ==

= Have some configuration file? =

No, this one works immediately on pages and post.

== Screenshots ==
not needed.

== Changelog ==
= 0.3 =
First upload to WP repository.
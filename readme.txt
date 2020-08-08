=== oEmbed for Facebook and Instagram ===
Contributors: ayeshrajans
Donate link:
Tags: embed, facebook, instagram, oembed
Requires at least: 4.0
Tested up to: 4.8
Stable tag: 1.0
Requires PHP: 7.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds support for embedding Facebook and Instagram posts in the block editor.

== Description ==

This plugin implements the new Facebook and Instagram oEmbed APIs.

Prior to WordPress 5.5.1, WordPress had support to embed Instagram and Facebook photos, videos, notes, quizes, etc in posts created with the block editor. However, Facebook removes this legacy API in October 2020, and this plugin implements the new APIs to bring back support for Facebook and Instagram content embedding.

Note that you will need to register a Facebook developer and create an app to get API credentials that this plugin uses.

Detailed setup instructions are available in https://php.watch/articles/wordpress-facebook-instagram-oembed

== Frequently Asked Questions ==

= WordPress already supports this feature in core =

Yes, but only in versions prior to 5.5.1, and it uses a legacy API that will stops on October 24, 2020.

= This version requires PHP 7.3 =

Yes, and that is intentional. You really should be using a modern PHP version.

= Can you add support for service X? =

Probably not. This plugin is intended to bring back functionality the WordPress core eventually drops.

= How do I set the API ID and secret? =

Go to Settings -> Writing, and you will see a section to enter Facebook App ID and Secret.


== Changelog ==


=== oEmbed Plus ===
Contributors: ayeshrajans
Tags: embed, facebook, instagram, oembed
Requires at least: 5.4
Tested up to: 5.5
Stable tag: 1.2
Requires PHP: 7.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds support for embedding Facebook and Instagram posts in the block editor.

== Description ==

This plugin implements the new Facebook and Instagram oEmbed APIs, restoring the Facebook and Instagram embeds in block editor.

Prior to WordPress 5.5.1, WordPress had support to embed Instagram and Facebook photos, videos, notes, quizes, etc in posts created with the block editor. However, Facebook removes this legacy API in October 2020, and this plugin implements the new APIs to bring back support for Facebook and Instagram content embedding.

Note that you will need to register a Facebook developer and create an app to get API credentials that this plugin uses.

Detailed setup instructions are available in [oEmbed Plus guide at PHP.Watch](https://php.watch/articles/wordpress-facebook-instagram-oembed)

== Frequently Asked Questions ==

= WordPress already supports this feature in core =

Yes, but only in versions prior to 5.5.1, and it uses a legacy API that will stops on October 24, 2020.
See [#50861](https://core.trac.wordpress.org/ticket/50861) for more information.

= This version requires PHP 7.3 =

Yes, and that is intentional. You really should be using a modern PHP version.

= Can you add support for service X? =

Probably not. This plugin is intended to bring back functionality the WordPress core eventually drops.

= How do I set the API ID and secret? =

Go to Settings -> Writing, and you will see a section to enter Facebook App ID and Secret.

Alternately, you can set the Facebook App ID and secret in the `wp-config.php` file. If they are set in the `wp-config.php` file, the settings form in Settings -> Writing section will be disabled.
To enter the Facebook App ID and secret, update the `wp-config.php` file in root of your WordPress installation, and append the following lines:

`
define('OEMBED_PLUS_FACEBOOK_APP_ID', '<App ID Here>');
define('OEMBED_PLUS_FACEBOOK_SECRET', '<Secret Here>');
`


== Screenshots ==

1. Plugin configuration (Admin → Settings → Writing)
2. Registering a new Facebook App
3. Example embedded content

== Changelog ==

**1.0**

 - Initial release.

**1.1**

 - Fixes a bug in Instagram oEmbed URL endpoint check.
 - Minor improvements in the Facebook App ID field validations.

**1.2**

 - Add `https://www.facebook.com/watch/?v=<ID>` URL pattern to supported video URL patterns.
 - Allow setting Facebook App ID and secret with a [constant in `wp-config.php` file](https://php.watch/articles/wordpress-facebook-instagram-oembed#wp-config).

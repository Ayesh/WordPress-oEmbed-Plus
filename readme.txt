=== oEmbed Plus ===
Contributors: ayeshrajans
Tags: embed, facebook, instagram, oembed
Requires at least: 4.9
Tested up to: 5.6
Stable tag: 1.6
Requires PHP: 7.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds support for embedding Facebook and Instagram posts in Block Editor (Gutenberg) and Classic Editor.

== Description ==

Adds support for embedding Facebook and Instagram posts in Block Editor (Gutenberg) and Classic Editor. This feature was removed in WordPress core due to deprecation of legacy APIs WordPress core used.

Prior to WordPress 5.5.1, WordPress had support to embed Instagram and Facebook photos, videos, notes, quizes, etc in posts created with Block Editor and Classic Editor. However, Facebook removed this legacy API in October 2020, and this plugin implements the new APIs to bring back support for Facebook and Instagram content embedding.

Note that you will need to register a Facebook developer account and create an app to get API credentials that this plugin uses. There is no coding necessary, but an API key needs to be created and set for the plugin.

Detailed setup instructions are available in [oEmbed Plus guide at PHP.Watch](https://php.watch/articles/wordpress-facebook-instagram-oembed)

== Frequently Asked Questions ==

= WordPress already supports this feature in core =

Yes, but only in versions prior to 5.5.1, and it used a legacy API that stopped working after October 24, 2020.
See [#50861](https://core.trac.wordpress.org/ticket/50861) for more information.

= This version requires PHP 7.1 =

Yes, this plugin requires PHP 7.1 or later. That is by design.

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

= Optionally hide the admin UI=

It is possible to completely hide the administration form added by this plugin in Admin → Settings → Writing page. This can be helpful if you set the configuration values in the `wp-config.php` file, and keep the administration UI minimal.

To hide the administration form, update the `wp-config.php` file with an extra line:

`
define('OEMBED_PLUS_HIDE_ADMIN_UI', true);
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

**1.4**

 - Add an option to completely hide the admin UI by setting `OEMBED_PLUS_HIDE_ADMIN_UI` PHP constant in `wp-config.php` file.
 - Code styling clean-up.
 - The minimum required PHP version is changed to 7.1 from PHP 7.3. It's strongly suggested to use more recent and supported PHP versions nonetheless.

**1.5**

 - Updates to the readme file to make it more clear that this plugin supports both Classic Editor and Block Editor.
 
**1.6**

 - Updated the plugin minimum WordPress core requirement to 4.9, along with relevant compatibility changes. The plugin works on all WordPress versions from 4.9 through 5.6 and up.

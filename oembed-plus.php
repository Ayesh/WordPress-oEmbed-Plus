<?php
/**
 * Plugin Name:  oEmbed Plus
 * Plugin URI:   https://php.watch/articles/wordpress-facebook-instagram-oembed
 * Version:      1.5
 * Description:  Adds support for embedding Facebook and Instagram posts in Block Editor and Classic Editor.
 * Licence:      GPLv2 or later
 * Author:       Ayesh Karunaratne
 * Author URI:   https://ayesh.me/open-source
 * Requires PHP: 7.1
 */

use Ayesh\OembedPlus\Embed;
use Ayesh\OembedPlus\Settings;

add_filter('oembed_providers', static function (array $providers): array {
	require_once __DIR__ . '/src/Embed.php';
	return Embed::registerProviders($providers);
});

add_filter('oembed_fetch_url', static function ($provider_url): string {
	if (strpos($provider_url, 'https://graph.facebook.com/v8.0/') !== 0) {
		return $provider_url;
	}

	require_once __DIR__ . '/src/Embed.php';

	if (defined('OEMBED_PLUS_FACEBOOK_APP_ID') && defined('OEMBED_PLUS_FACEBOOK_SECRET')) {
		$embed = new Embed(OEMBED_PLUS_FACEBOOK_APP_ID, OEMBED_PLUS_FACEBOOK_SECRET);
	} elseif (
		($app_id = get_option('oembed_facebook_app_id', null))
		&& ($app_secret = get_option('oembed_facebook_app_secret', null))) {
		$embed = new Embed($app_id, $app_secret);
	} else {
		return $provider_url;
	}

	return $embed->processProviderUrls($provider_url);
});

add_action('admin_init', static function (): void {
	if (defined('OEMBED_PLUS_HIDE_ADMIN_UI') && !empty(OEMBED_PLUS_HIDE_ADMIN_UI)) {
		return;
	}
	require_once __DIR__ . '/src/Settings.php';
	Settings::runHook();
});

<?php
/**
 * Plugin Name:  oEmbed Plus
 * Plugin URI:   https://php.watch/articles/wordpress-facebook-instagram-oembed
 * Version:      1.0
 * Description:  Adds support for embedding Facebook and Instagram posts in the block editor.
 * Licence:      GPLv2 or later
 * Author:       Ayesh Karunaratne
 * Author URI:   https://ayesh.me/open-source
 * Requires PHP: 7.3
 */

use Ayesh\OembedPlus\Embed;
use Ayesh\OembedPlus\Settings;

add_filter('oembed_providers', static function(array $providers): array{
	require_once __DIR__ . '/src/Embed.php';
	return Embed::registerProviders($providers);
});

add_filter('oembed_fetch_url', static function($provider_url): string{
	if (
	    strpos($provider_url, 'https://graph.facebook.com/v8.0/oembed_') === false
        || strpos($provider_url, 'https://graph.facebook.com/v8.0/instagram_oembed') !== false
    ) {
		return $provider_url;
	}

	require_once __DIR__ . '/src/Embed.php';
	$embed = new Embed(get_option('oembed_facebook_app_id', null), get_option('oembed_facebook_app_secret', null));
	return $embed->processProviderUrls($provider_url);
});

add_action('admin_init', static function(): void {
	require_once __DIR__ . '/src/Settings.php';
	Settings::runHook();
});

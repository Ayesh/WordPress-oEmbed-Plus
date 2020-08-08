<?php
/**
 * Plugin Name: oEmbed for Facebook and Instagram
 * Version:     1.0
 * Description: Adds support for embedding Facebook and Instagram posts in the block editor.
 * Licence:     GPLv2 or later
 * Author:      Ayesh Karunaratne
 * Author URI:  https://ayesh.me/open-source
 */

add_filter('oembed_providers', static function(array $providers): array{
	return $providers + [
			'#https?://www\.facebook\.com/.*/posts/.*#i'        => [ 'https://graph.facebook.com/v8.0/oembed_post', true ],
			'#https?://www\.facebook\.com/.*/activity/.*#i'     => [ 'https://graph.facebook.com/v8.0/oembed_post', true ],
			'#https?://www\.facebook\.com/.*/photos/.*#i'       => [ 'https://graph.facebook.com/v8.0/oembed_post', true ],
			'#https?://www\.facebook\.com/photo(s/|\.php).*#i'  => [ 'https://graph.facebook.com/v8.0/oembed_post', true ],
			'#https?://www\.facebook\.com/permalink\.php.*#i'   => [ 'https://graph.facebook.com/v8.0/oembed_post', true ],
			'#https?://www\.facebook\.com/media/.*#i'           => [ 'https://graph.facebook.com/v8.0/oembed_post', true ],
			'#https?://www\.facebook\.com/questions/.*#i'       => [ 'https://graph.facebook.com/v8.0/oembed_post', true ],
			'#https?://www\.facebook\.com/notes/.*#i'           => [ 'https://graph.facebook.com/v8.0/oembed_post', true ],
			'#https?://www\.facebook\.com/.*/videos/.*#i'       => [ 'https://graph.facebook.com/v8.0/oembed_video', true ],
			'#https?://www\.facebook\.com/video\.php.*#i'       => [ 'https://graph.facebook.com/v8.0/oembed_video', true ],

			'#https?://(www\.)?instagr(\.am|am\.com)/(p|tv)/.*#i' => [ 'https://graph.facebook.com/v8.0/instagram_oembed', true ],
		];
});

add_filter('oembed_fetch_url', static function($provider_url): string{
	if (strpos($provider_url, 'https://graph.facebook.com/v8.0/oembed_') === 0) {
		$provider_url = add_query_arg(['access_token' => oembed_facebook_instagram_get_access_token()], $provider_url);
	}

	return $provider_url;
});

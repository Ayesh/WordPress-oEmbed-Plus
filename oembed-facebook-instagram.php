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
			'#https?://www\.facebook\.com/.*/posts/.*#i'        => [ 'facebook_oembed.post', true ],
			'#https?://www\.facebook\.com/.*/activity/.*#i'     => [ 'facebook_oembed.post', true ],
			'#https?://www\.facebook\.com/.*/photos/.*#i'       => [ 'facebook_oembed.post', true ],
			'#https?://www\.facebook\.com/photo(s/|\.php).*#i'  => [ 'facebook_oembed.post', true ],
			'#https?://www\.facebook\.com/permalink\.php.*#i'   => [ 'facebook_oembed.post', true ],
			'#https?://www\.facebook\.com/media/.*#i'           => [ 'facebook_oembed.post', true ],
			'#https?://www\.facebook\.com/questions/.*#i'       => [ 'facebook_oembed.post', true ],
			'#https?://www\.facebook\.com/notes/.*#i'           => [ 'facebook_oembed.post', true ],
			'#https?://www\.facebook\.com/.*/videos/.*#i'       => [ 'facebook_oembed.video', true ],
			'#https?://www\.facebook\.com/video\.php.*#i'       => [ 'facebook_oembed.video', true ],

			'#https?://(www\.)?instagr(\.am|am\.com)/(p|tv)/.*#i' => array( 'instagram_oembed.post', true ),
		];
});

add_filter('oembed_fetch_url', static function($provider_url): string{
	switch ($provider_url) {
		// todo: Attach app access token:
		case 'facebook_oembed.post':
			return 'https://graph.facebook.com/v8.0/oembed_post';
		case 'facebook_oembed.video':
			return 'https://graph.facebook.com/v8.0/oembed_videos';
		case 'instagram_oembed.post':
			return 'https://graph.facebook.com/v8.0/instagram_oembed';

		default:
			return $provider_url;
	}
});

<?php

namespace Ayesh\OembedPlus;

class Embed {
	private static $providerPatterns = [
		'#https?://www\.facebook\.com/.*/posts/.*#i' => ['https://graph.facebook.com/v8.0/oembed_post', true],
		'#https?://www\.facebook\.com/.*/activity/.*#i' => ['https://graph.facebook.com/v8.0/oembed_post', true],
		'#https?://www\.facebook\.com/.*/photos/.*#i' => ['https://graph.facebook.com/v8.0/oembed_post', true],
		'#https?://www\.facebook\.com/photo(s/|\.php).*#i' => ['https://graph.facebook.com/v8.0/oembed_post', true],
		'#https?://www\.facebook\.com/permalink\.php.*#i' => ['https://graph.facebook.com/v8.0/oembed_post', true],
		'#https?://www\.facebook\.com/media/.*#i' => ['https://graph.facebook.com/v8.0/oembed_post', true],
		'#https?://www\.facebook\.com/questions/.*#i' => ['https://graph.facebook.com/v8.0/oembed_post', true],
		'#https?://www\.facebook\.com/notes/.*#i' => ['https://graph.facebook.com/v8.0/oembed_post', true],
		'#https?://www\.facebook\.com/.*/videos/.*#i' => ['https://graph.facebook.com/v8.0/oembed_video', true],
		'#https?://www\.facebook\.com/video\.php.*#i' => ['https://graph.facebook.com/v8.0/oembed_video', true],
		'#https?://www\.facebook\.com/watch/?\?v=\d+#i' => ['https://graph.facebook.com/v8.0/oembed_video', true],

		'#https?://(www\.)?instagr(\.am|am\.com)/(p|tv)/.*#i' => ['https://graph.facebook.com/v8.0/instagram_oembed', true],
	];

	private $app_id;
	private $app_secret;
	private $valid_credentials = false;

	public function __construct(?string $app_id = null, ?string $app_secret = null) {
		$this->app_id = $app_id;
		$this->app_secret = $app_secret;
		if (!empty($app_id) && !empty($app_secret)) {
			$this->valid_credentials = true;
		}
	}

	public static function registerProviders(array $existing_providers = []): array {
		return array_merge($existing_providers, static::$providerPatterns);
	}

	public function processProviderUrls(string $provider_url): string {
		if (!$this->valid_credentials) {
			return $provider_url;
		}

		return $provider_url . '&access_token=' . urlencode($this->app_id . '|' . $this->app_secret);
	}
}

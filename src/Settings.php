<?php

namespace Ayesh\OembedPlus;

class Settings {
    private $wpConfigSettings;

    public function __construct() {
        $this->wpConfigSettings = defined('OEMBED_PLUS_FACEBOOK_APP_ID') && defined('OEMBED_PLUS_FACEBOOK_SECRET');
    }

	public static function runHook(): void {
		$instance = new static();
		$instance->addSection();
		$instance->registerSettings();
		$instance->addSettingsFields();
	}

	public function addSection(): void {
		add_settings_section(
			'oembed_facebook_api_keys',
			'Facebook and Instagram Embed Settings',
			[$this, 'sectionCallback'],
			'writing'
		);
	}

	public function addSettingsFields(): void {
		add_settings_field(
			'oembed_facebook_app_id',
			'App ID',
			[$this, 'fieldAppIdCallback'],
			'writing',
			'oembed_facebook_api_keys'
		);
		add_settings_field(
			'oembed_facebook_app_secret',
			'App Secret',
			[$this, 'fieldAppSecretCallback'],
			'writing',
			'oembed_facebook_api_keys'
		);
	}

	public function registerSettings(): void {
		register_setting( 'writing', 'oembed_facebook_app_id', [
			'type' => 'integer',
			'description' => 'The App ID for the Facebook App',
			'sanitize_callback' => static function(?string $string): ?string {
				return (int) $string;
			}
		]);

		register_setting( 'writing', 'oembed_facebook_app_secret', [
			'type' => 'string',
			'description' => 'The App secret for the Facebook App',
			'sanitize_callback' => static function(?string $string): ?string {
				return strtolower(preg_replace("/[^A-z0-9]+/", '', $string));
			}
		]);
	}

	public function sectionCallback(): void {
		echo '<p>Facebook developer app credentials are required to embed Facebook and Instagram content in the block editor.';
		echo 'You need to <a href="https://developers.facebook.com/apps/" target="_blank" rel="noopener noreferrer">register a Facebook app</a>, enable <a href="https://developers.facebook.com/docs/plugins/oembed#oembed-product">oEmbed</a>, and add its App ID and secret in the fields below.</p>';
		echo '<p>A detailed guide is available at <a target="_blank" rel="noopener noreferrer" href="https://php.watch/articles/wordpress-facebook-instagram-oembed">oEmbed Plus guide at PHP.Watch</a>.</p>';

        if ($this->wpConfigSettings) {
            echo '<p><strong>Configuration options are currently <a target="_blank" rel="noopener noreferrer" href="https://php.watch/articles/wordpress-facebook-instagram-oembed#wp-config">set with PHP constants</a>. This settings form is disabled.</strong>';
        }
	}

	public function fieldAppIdCallback(): void {
        if ($this->wpConfigSettings) {
            echo '<em> - Set in configuration file - </em>';
            return;
        }
		echo '<input name="oembed_facebook_app_id" title="Facebook App ID" min="10000000000" max="9999999999999999" title="Numeric App ID" inputmode="numeric" id="oembed_facebook_app_id" type="number" value="'.esc_attr(get_option('oembed_facebook_app_id')).'" />';
	}

	public function fieldAppSecretCallback(): void {
        if ($this->wpConfigSettings) {
            echo '<em> - Set in configuration file - </em>';
            return;
        }
		echo '<input name="oembed_facebook_app_secret" pattern="[A-z0-9]{32}" title="32 characters of a-z and 0-9 app secret" autocomplete="off" id="oembed_facebook_app_secret" type="text" value="'.esc_attr(get_option('oembed_facebook_app_secret')).'" />';
	}

	public static function deleteSettings(): void {
		$options = [
			'oembed_facebook_app_id',
			'oembed_facebook_app_secret',
		];

		foreach ($options as $option) {
			delete_option($option);
			delete_site_option($option);
		}
	}
}

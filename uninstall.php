<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
	die;
}

$options = [
	'oembed_facebook_app_id',
	'oembed_facebook_app_secret',
];

foreach ($options as $option) {
	delete_option($option);
	delete_site_option($option);
}


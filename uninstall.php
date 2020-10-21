<?php

use Ayesh\OembedPlus\Settings;

if (!defined('WP_UNINSTALL_PLUGIN')) {
	die;
}

require_once __DIR__ . '/src/Settings.php';
Settings::deleteSettings();


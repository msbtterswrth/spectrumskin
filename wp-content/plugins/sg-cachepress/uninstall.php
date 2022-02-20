<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once dirname( __FILE__ ) . '/vendor/siteground/siteground-data/src/Settings.php';

use SiteGround_Data\Settings;

$settings = new Settings();

$settings->stop_collecting_data();

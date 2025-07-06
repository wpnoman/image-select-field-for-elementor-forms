<?php

/**
 * Plugin name: Image Select Field for Elementor Forms
 * Description: Image Select Field for Elementor Forms is a powerful addon that extends the native Elementor Form widget by adding a custom image selection field. Let your users select options visually through images—perfect for forms that require choices like product styles, services, packages, or preferences.
 * Version:     1.0.2
 * Author:      WP Noman
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 5.9
 * Requires PHP: 7.4
 * Text Domain: image-select-field-for-elementor-forms
 * Requires Plugins:  elementor
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/*** Defined constant for later use */
define('ISFEFORMS_FILE', __FILE__);
define('ISFEFORMS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ISFEFORMS_PLUGIN_PATH', plugin_dir_path(__FILE__));

/**
 * Load file fiels
 */
require ISFEFORMS_PLUGIN_PATH . 'includes/class-image-select-field-for-elementor-forms.php';
require ISFEFORMS_PLUGIN_PATH . 'includes/class-isfeforms-widgets-control.php';


if (! function_exists('ISFEFORMS_Image_Options_Fields_Elementor')) {
    function isfeforms_init()
    {
        return ISFEFORMS_Image_Options_Fields_Elementor::getInstance();
    }
    isfeforms_init();
}

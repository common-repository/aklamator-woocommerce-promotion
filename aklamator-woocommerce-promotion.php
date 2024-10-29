<?php
/*
Plugin Name: Aklamator Woocommerce Promotion
Plugin URI: https://www.aklamator.com/wordpress
Description: Aklamator Woocommerce Promotion service enables you to sell PR announcements, cross promote web sites using RSS feed and provide new services to your clients in digital advertising.
Version: 2.1.1
Author: Aklamator
Author URI: https://www.aklamator.com/
License: GPL2

Copyright 2017 Aklamator.com (email : info@aklamator.com)

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

*/


if(!defined('AKLAWOO_PR_PLUGIN_NAME')){
    define('AKLAWOO_PR_PLUGIN_NAME', plugin_basename(__FILE__));
}

if (!defined('AKLAWOO_PR_PLUGIN_DIR')) {
    define('AKLAWOO_PR_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

if (!defined('AKLAWOO_PR_PLUGIN_URL')) {
    define('AKLAWOO_PR_PLUGIN_URL', plugin_dir_url(__FILE__));
}

require_once AKLAWOO_PR_PLUGIN_DIR . "includes/class-aklamatorWoo-pr.php";


/*
 * Activation Hook
 */
register_activation_hook( __FILE__, array('aklamatorWooPrWidget','set_up_options'));
/*
 * Uninstall Hook
 */
register_uninstall_hook(__FILE__, array('aklamatorWooPrWidget','aklamator_uninstall'));


//Widget Section
require_once AKLAWOO_PR_PLUGIN_DIR . "includes/class-aklamatorWoo-widget-pr.php";

// Start plugin
AklamatorWooPrWidget::init();
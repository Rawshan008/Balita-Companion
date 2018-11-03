<?php 
/*
Plugin Name: Balita Companion
Plugin URI:   #
Description:  It is balita Companion plugin, please install to full fill 100% of this theme.
Version:      1.0
Author:       Rawshan
Author URI:   #
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  balitac
Domain Path:  /languages
*/
require_once plugin_dir_path(__FILE__)."/widgets/class.popularpost.php";
require_once plugin_dir_path(__FILE__)."/widgets/class.biodata.php";
require_once plugin_dir_path(__FILE__)."/widgets/class.footersocial.php";
require_once plugin_dir_path(__FILE__)."/widgets/class.latestpost.php";
require_once plugin_dir_path(__FILE__)."/widgets/class.headersocial.php";
function myplugin_load_textdomain() {
    load_plugin_textdomain( 'balitac', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}
add_action( 'init', 'myplugin_load_textdomain' );

function balitac_widgets(){
    register_widget('PopularPost');
    register_widget('Biodata');
    register_widget('SocialFooter');
    register_widget('LatestPost');
    register_widget('HeaderlFooter');
}
add_action('widgets_init','balitac_widgets');

function balitac_admin_enqueue_scripts($screen){
	if($screen=="widgets.php") {
		wp_enqueue_media();
		wp_enqueue_script("balitac_media", plugin_dir_url(__FILE__)."js/media-gallery.js", array("jquery"), "1.0", 1);
	}
}
add_action("admin_enqueue_scripts","balitac_admin_enqueue_scripts");
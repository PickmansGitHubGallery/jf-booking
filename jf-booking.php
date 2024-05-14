<?php 

/**
 * Plugin Name: JF Booking
 * Description: Et enkelt bookingsystem.
 * Version: 1.0
 * Author: Jakob Foersom
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

 if(!defined('ABSPATH')) {
    die('Du kan ikke tilgå denne fil direkte!');  
 }

 if(! class_exists('JF_Booking')) {
    class JF_Booking {
      function __construct() {
          $this->define_constants(); // Jeg kalder metoden define_constants() fra constructoren, så jeg kan bruge konstanterne i hele pluginet.

          require_once JF_BOOKING_PATH . 'post-types/class.jf-booking-cpt.php'; // Jeg inkluderer min klasse, så jeg kan bruge den.
          $jf_booking_cpt = new JF_Booking_Post_Type(); // Jeg opretter et objekt af min klasse, så jeg kan bruge dens metoder.
  
      }

      public function define_constants() {
        define( 'JF_BOOKING_PATH', plugin_dir_path(__FILE__)); // // C:\xampp\htdocs\wordpress\wp-content\plugins\jf-booking\
        define( 'JF_BOOKING_URL', plugin_dir_url(__FILE__)); //   // http://localhost/wordpress/wp-content/plugins/jf-booking/
        define( 'JF_BOOKING_VERSION', '1.0.0' );
      }

      public static function activate() {
        update_option('rewrite_rules', '');
      }
      public static function deactivate() {
        flush_rewrite_rules(); // Jeg tømmer mine rewrite rules, når pluginnet deaktiveres.
        unregister_post_type('jf-booking'); // Jeg fjerner posttypen, når pluginnet deaktiveres.
      }
      public static function uninstall() {
        // Afinstalleringskode
    }
  }
}
  if(class_exists('JF_Booking')) {
    register_activation_hook(__FILE__, ['JF_Booking', 'activate']);
    register_deactivation_hook(__FILE__, ['JF_Booking', 'deactivate']);
    register_uninstall_hook(__FILE__, ['JF_Booking', 'uninstall']);
    $jf_booking = new JF_Booking();
  }
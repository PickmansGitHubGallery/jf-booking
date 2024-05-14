<?php

if(!class_exists('JF_Booking_Post_Type')){
  class JF_Booking_Post_Type{
      function __construct(){
        add_action('init', [$this, 'create_post_type']);
        add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
        add_action('save_post', [$this, 'save_booking'],10, 6 );

      }

      public function create_post_type(){
        register_post_type(
          'jf-booking',
          [
            'label' => 'Booking',
            'description' => 'Beskrivelse af booking',
            'labels' => [
              'name' => 'Booking',
              'singular_name' => 'Booking',
              'menu_name' => 'Booking',
              'name_admin_bar' => 'Booking',
              'add_new' => 'Tilføj ny',
              'add_new_item' => 'Tilføj ny booking',
              'new_item' => 'Ny booking',
              'edit_item' => 'Rediger booking',
              'view_item' => 'Se booking',
              'all_items' => 'Alle bookinger',
              'search_items' => 'Søg bookinger',
            ],
            'public' => true,
            'has_archive' => true,
            'supports' => ['title', 'editor','author','custom-fields','excerpt','comments',],
            'menu_icon' => 'dashicons-calendar-alt',
            'rewrite' => ['slug' => 'booking'],
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'show_in_rest' => true,
            
          ]
        );
    }

    public function add_meta_boxes(){
      add_meta_box(
        'jf_booking_meta_box',
        'Booking information',
        [$this, 'add_inner_meta_boxes'],
        'jf-booking',
        'normal',
        'high'
      );
    }

    public function add_inner_meta_boxes($post){
        require_once JF_BOOKING_PATH . 'views/jf-booking_metabox.php';

    }
    
    public function save_booking($post_id){
      //Guard clause start
      if(isset ($_POST['jf-booking_nonce'])){
        if(!wp_verify_nonce($_POST['jf-booking_nonce'], 'jf-booking_nonce')){
          return;
        }
      }
      
      if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return;
      }

      if(isset( $_POST['post-type']) && $_POST['post-type'] == 'jf-booking'){
          if(!current_user_can('edit_page', $post_id)){
            return;
          }elseif(!current_user_can('edit_post', $post_id)){
            return;
      }
      //Guard clause end
        if( isset ( $_POST['action'] ) && $_POST['action'] == 'editpost' ){ 
            $old_dato = get_post_meta($post_id, 'jf-booking_dato', true);
            $new_dato = $_POST['jf-booking_dato'];
            $old_tid = get_post_meta($post_id, 'jf-booking_tid', true);
            $new_tid = $_POST['jf-booking_tid'];
            $old_navn = get_post_meta($post_id, 'jf-booking_navn', true);
            $new_navn = $_POST['jf-booking_navn'];
            $old_email = get_post_meta($post_id, 'jf-booking_email', true);
            $new_email = $_POST['jf-booking_email'];
            $old_telefon = get_post_meta($post_id, 'jf-booking_telefon', true);
            $new_telefon = $_POST['jf-booking_telefon'];
            $old_behandling = get_post_meta($post_id, 'jf-booking_behandling', true);
            $new_behandling = $_POST['jf-booking_behandling'];

            update_post_meta( $post_id, 'jf-booking_dato', sanitize_text_field($new_dato), $old_dato );
            update_post_meta( $post_id, 'jf-booking_tid', sanitize_text_field($new_tid), $old_tid );
            update_post_meta( $post_id, 'jf-booking_navn', sanitize_text_field($new_navn), $old_navn );
            update_post_meta( $post_id, 'jf-booking_email', sanitize_email($new_email), $old_email );
            update_post_meta( $post_id, 'jf-booking_telefon', absint($new_telefon), $old_telefon );
            update_post_meta( $post_id, 'jf-booking_behandling', sanitize_text_field($new_behandling), $old_behandling );
        }
    }
    }
        
  }
}

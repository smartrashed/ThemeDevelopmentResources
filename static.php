<?php 
/*
 * @package burder
 * @author CodexCoder
 */

/**
 * Enqueue scripts and styles.
 */


function burder_scripts() {

    wp_enqueue_style('burder-stylesheet', get_stylesheet_uri());
    wp_enqueue_style('flexslider', BURDER_ASSETS . '/css/lightcase.css');
    wp_enqueue_style('swiper', BURDER_ASSETS . '/css/swiper.min.css');
    wp_enqueue_style('font-awesome', BURDER_ASSETS . '/css/font-awesome.min.css');
    wp_enqueue_style('bootstrapp', BURDER_ASSETS . '/css/bootstrap.min.css');
    wp_enqueue_style('lightcase', BURDER_ASSETS . '/css/animate.min.css');
    wp_enqueue_style('reset-css', BURDER_ASSETS . '/css/reset_css.css');
    wp_enqueue_style('burder-style', BURDER_ASSETS . '/css/style.css');
    wp_enqueue_style('burder-responsive', BURDER_ASSETS . '/css/responsive.css');  
         

    wp_enqueue_script('bootstrap', BURDER_ASSETS . '/js/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('swiper', BURDER_ASSETS . '/js/swiper.jquery.min.js', array('jquery'), false, true);
    wp_enqueue_script('isotope-pkdg', BURDER_ASSETS . '/js/isotope.pkgd.min.js', array('jquery'), false, true);
    wp_enqueue_script('isotope-masonary', BURDER_ASSETS . '/js/isotope.masonry.js', array('jquery'), false, true);
    wp_enqueue_script('lightcase', BURDER_ASSETS . '/js/lightcase.js', array('jquery'), false, true);
    wp_enqueue_script('nstSlider', BURDER_ASSETS . '/js/jquery.nstSlider.min.js', array('jquery'), false, true);
    wp_enqueue_script('easing', BURDER_ASSETS . '/js/easing.min.js', array('jquery'), false, true);
    wp_enqueue_script('waypoints', BURDER_ASSETS . '/js/jquery.waypoints.js', array('jquery'), false, true);
    wp_enqueue_script('counterup', BURDER_ASSETS . '/js/jquery.counterup.min.js', array('jquery'), '1.0.0', false, true);

    
    wp_enqueue_script('custom', BURDER_ASSETS . '/js/custom.js', array('jquery'), '1.0.0', true);

    // ajax load more post
        global $wp_query;
        $max_num_pages = $wp_query->max_num_pages;
        $post_per_page = get_option('posts_per_page');
        wp_enqueue_script( 'burder-post-load',  get_template_directory_uri() . '/assets/js/post-load.js', array( 'jquery' ), '1.0', true );
        wp_localize_script( 'burder-post-load', 'postload', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),    
            'post_per_page' => $post_per_page,
            'max_num_pages' => $max_num_pages,
            'end_message' => esc_html__('Sorry, No more post to load', 'burder'),
        ));
  
}

add_action( 'wp_enqueue_scripts', 'burder_scripts', 90);

//Google Map
if (defined('FW')):
    if( ! function_exists( 'burder_gmap_init' ) ) :
         function burder_gmap_init() {
            $gmap_api = fw_get_db_settings_option('gmapapi');
            wp_enqueue_script('gmap', BURDER_ASSETS . '/js/g-map.js', array('jquery'), false, true);
            wp_enqueue_script( 'gmaps-api', 'http://maps.googleapis.com/maps/api/js?key='.$gmap_api, null, null, true );
        }
    endif;

    if (function_exists('fw_get_db_settings_option')):
        $gmap_api = fw_get_db_settings_option('gmapapi');
        if(!empty($gmap_api)) :
           add_action( 'wp_enqueue_scripts', 'burder_gmap_init', 90 );
        endif;
    endif;

    add_action( 'wp_enqueue_scripts', 'burder_gmap_init', 90 );


endif;


/* Thinking for custom fonts -- Starts --*/


<?php

/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$understrap_includes = array(
    '/theme-settings.php',                  // Initialize theme default settings.
    '/setup.php',                           // Theme setup and custom theme supports.
    '/widgets.php',                         // Register widget area.
    '/enqueue.php',                         // Enqueue scripts and styles.
    '/template-tags.php',                   // Custom template tags for this theme.
    '/pagination.php',                      // Custom pagination for this theme.
    '/hooks.php',                           // Custom hooks.
    '/extras.php',                          // Custom functions that act independently of the theme templates.
    '/customizer.php',                      // Customizer additions.
    '/custom-comments.php',                 // Custom Comments file.
    '/jetpack.php',                         // Load Jetpack compatibility file.
    '/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
    '/woocommerce.php',                     // Load WooCommerce functions.
    '/editor.php',                          // Load Editor functions.
    '/deprecated.php',                      // Load deprecated functions.
);

foreach ($understrap_includes as $file) {
    $filepath = locate_template('inc' . $file);
    if (!$filepath) {
        trigger_error(sprintf('Error locating /inc%s for inclusion', $file), E_USER_ERROR);
    }
    require_once $filepath;
}



//стили


add_action('wp_enqueue_scripts', 'my_stylesheet');

function my_stylesheet()
{
    wp_enqueue_style('my-style', get_stylesheet_directory_uri() . '/assets/css/main.css', false, '1.0', 'all');
    wp_enqueue_style('my-style2', get_stylesheet_directory_uri() . '/assets/css/old.css', false, '1.0', 'all');
    wp_enqueue_style('my-style3', get_stylesheet_directory_uri() . '/assets/css/settings.css', false, '1.0', 'all');
    wp_enqueue_style('my-style4', get_stylesheet_directory_uri() . '/assets/css/bootstrap-reboot.css', false, '1.0', 'all');
    wp_enqueue_style('my-style5', get_stylesheet_directory_uri() . '/assets/css/add_new.css', false, '1.0', 'all');
}



add_action('wp_enqueue_scripts', 'my_scripts_method');
function my_scripts_method()
{
    $script_url = plugins_url('/assets/js/ajax-login-script.js', __FILE__);
    wp_enqueue_script('custom-script', $script_url, array('jquery'));
}






//регистрируем меню

register_nav_menus(array(
    'primary' => esc_html__('Primary', 'wp-bootstrap-starter'),
    'foo-menu' => esc_html__('foo-menu'),
    'footwo' => esc_html__('footwo'),
    'head_cat' => esc_html__('head_cat'),

));



//параметры меню
add_filter('wp_nav_menu_args', 'filter_wp_menu_args');
function filter_wp_menu_args($args)
{
    if ($args['theme_location'] === 'foo-menu') {
        $args['container'] = false;
        $args['items_wrap'] = '<ul class="%2$s"></li>%3$s</ul>';
        $args['menu_class'] = 'navbar-nav list-unstyled';
    }


    if ($args['theme_location'] === 'footwo') {
        $args['container'] = false;
        $args['items_wrap'] = '<ul class="%2$s"></li>%3$s</ul>';
        $args['menu_class'] = 'navbar-nav list-unstyled';
    }





    return $args;
}




// Изменяем атрибут id у тега li
add_filter('nav_menu_item_id', 'filter_menu_item_css_id', 10, 4);
function filter_menu_item_css_id($menu_id, $item, $args, $depth)
{
    return $args->theme_location === 'foo-menu' ? '' : $menu_id;
}

/*// Изменяем атрибут class у тега li
add_filter('nav_menu_css_class', 'filter_nav_menu_css_classes', 10, 4);
function filter_nav_menu_css_classes($classes, $item, $args, $depth)
{
    if ($args->theme_location === 'foo-menu') {
        $classes = [
            'menu-node',
            'menu-node--main_lvl_' . ($depth + 1)
        ];
        if ($item->current) {
            $classes[] = 'menu-node--active';
        }
    }
    return $classes;
}*/

/*// Изменяет класс у вложенного ul
add_filter('nav_menu_submenu_css_class', 'filter_nav_menu_submenu_css_class', 10, 3);
function filter_nav_menu_submenu_css_class($classes, $args, $depth)
{
    if ($args->theme_location === 'foo-menu') {
        $classes = [
            'menu',
            'menu--dropdown',
            'menu--vertical'
        ];
    }
    return $classes;
}*/




// Добавляем классы ссылкам
add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4);
function filter_nav_menu_link_attributes($atts, $item, $args, $depth)
{



    if ($args->theme_location === 'foo-menu') {
        $atts['class'] = 'nav-link';
    }



    if ($args->theme_location === 'footwo') {
        $atts['class'] = 'nav-link';
        if ($item->current) {
            $atts['class'] .= ' menu-link--active';
        }
    }







    return $atts;
}



//удаляем хлебные крошки и выподающий список из archive-product

remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

//переносим табы в право
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60);



remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

//add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60 );

//// Add our custom function
//function my_function_before_single_product() {
//
//    $option_value = fw_get_db_settings_option('number-sale');
//
//    echo esc_html($option_value);
//}
//
//// Add the action
//add_action( 'woocommerce_single_product_summary', 'my_function_before_single_product', 11 );
//





//ссылка вместо кнопки

add_filter('woocommerce_loop_add_to_cart_link', 'replacing_add_to_cart_button', 10, 2);
function replacing_add_to_cart_button($button, $product)
{
    $button_text = __("View product", "woocommerce");
    $button = '<span><a class="price-home" href="' . $product->get_permalink() . '">' . $button_text . '</a></span>';

    return $button;
}



//заменил вывод категории (убрал скобки)

add_action('widgets_init', 'override_woocommerce_widgets_two', 15);

function override_woocommerce_widgets_two()
{
    // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)

    if (class_exists('WC_Widget_Price_Filter')) {

        unregister_widget('WC_Widget_Price_Filter');

        include_once('inc/class-wc-widget-price-filter.php');

        register_widget('Custom_WC_Widget_Price_Filter');
    }
}






//заменил вывод категории (убрал скобки)

add_action('widgets_init', 'err_override_woocommerce_widgets', 15);

function err_override_woocommerce_widgets()
{
    // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)

    if (class_exists('WC_Widget_Layered_Nav')) {

        unregister_widget('WC_Widget_Layered_Nav');

        include_once('inc/custom-wc-widget-layered-nav.php');

        register_widget('Custom_WC_Widget_Layered_Nav');
    }
}








///*
// * show product weights
// */
//add_action( 'woocommerce_after_shop_loop_item', 'rs_show_weights', 9 );
//function rs_show_weights()
//{
//    global $product;
//
//    $pergram = $product->get_attribute( 'Размер' );
//
//
//
//    if ( $pergram )
//    {
//        echo '<div style="display: flex; flex-direction: column;" class="product-meta"><span class="product-meta-label">Размеры: </span></div><p style="    display: flex;
//    flex-direction: column;">' . $pergram . '</p>';
//    }
//}
//
//
//


// -------------
// 1. Show Buttons

add_action('woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_plus');

function bbloomer_display_quantity_plus()
{
    echo '<button type="button" class="btn btn-outline-primary plus" >+</button>';
}

add_action('woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_minus');

function bbloomer_display_quantity_minus()
{
    echo '<button type="button" class="btn btn-outline-primary minus" >-</button>';
}

// Note: to place minus @ left and plus @ right replace above add_actions with:
// add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_minus' );
// add_action( 'woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_plus' );

// -------------
// 2. Trigger jQuery script

add_action('wp_footer', 'bbloomer_add_cart_quantity_plus_minus');

function bbloomer_add_cart_quantity_plus_minus()
{
    // Only run this on the single product page
    if (!is_product()) return;
?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {

            $('form.cart').on('click', 'button.plus, button.minus', function() {

                // Get current quantity values
                var qty = $(this).closest('form.cart').find('.qty');
                var val = parseFloat(qty.val());
                var max = parseFloat(qty.attr('max'));
                var min = parseFloat(qty.attr('min'));
                var step = parseFloat(qty.attr('step'));

                // Change the value if plus or minus
                if ($(this).is('.plus')) {
                    if (max && (max <= val)) {
                        qty.val(max);
                    } else {
                        qty.val(val + step);
                    }
                } else {
                    if (min && (min >= val)) {
                        qty.val(min);
                    } else if (val > 1) {
                        qty.val(val - step);
                    }
                }

            });

        });
    </script>
<?php
}




add_filter('woocommerce_product_tabs', 'special_nav_class', 10, 2);

function special_nav_class($tabs)
{
    if (in_array('current-menu-item', $tabs)) {
        $tabs[] = 'active ';
    }
    return $tabs;
}




// Filter except length to 35 words.
// tn custom excerpt length
function tn_custom_excerpt_length($length)
{
    return 15;
}
add_filter('excerpt_length', 'tn_custom_excerpt_length', 999);






function ajax_login_init()
{

    wp_register_script('ajax-login-script', get_template_directory_uri() . '/assets/js/ajax-login-script.js', array('jquery'));
    wp_enqueue_script('ajax-login-script');

    wp_localize_script('ajax-login-script', 'ajax_login_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action('wp_ajax_nopriv_ajaxlogin', 'ajax_login');
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}


function ajax_login()
{

    // First check the nonce, if it fails the function will break
    check_ajax_referer('ajax-login-nonce', 'security');

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon($info, false);
    if (is_wp_error($user_signon)) {
        echo json_encode(array('loggedin' => false, 'message' => __('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin' => true, 'message' => __('Login successful, redirecting...')));
    }

    die();
}



add_action('woocommerce_shop_loop_item_title', 'bbloomer_display_yith_wishlist_loop', 97);



function bbloomer_display_yith_wishlist_loop()
{

    $wshortcode = do_shortcode("[ti_wishlists_addtowishlist]");

    echo '<div class="wshortcode">' . $wshortcode . '</div>';
}



add_action('woocommerce_loop_add', 'add_class_button', 15);

function add_class_button()
{
    echo '<div class="lola">';
}

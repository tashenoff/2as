<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php do_action('wp_body_open'); ?>
    <div class="site" id="page">

        <!-- ******************* The Navbar Area ******************* -->
        <div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

            <a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e('Skip to content', 'understrap'); ?></a>


            <div class="container">
                <div class="row">


                    <div class="d-flex w-100 mb-3">


                        <div class="p-2 logo">
                            <img style="width: 50px;" src="http://2ashop.kz//images/logo.svg" alt="" srcset="">
                        </div>
                        <div class="p-2 flex-grow-1 align-self-center">
                            <h5 style="margin-top: 3px;">2ashop.kz</h5><span class="d-lg-block d-none">По всем вопросам: 8888888</span>
                        </div>

                        <div class="go_home d-flex align-self-center">
                            <div class="p-2 likes"><a href="<?php echo esc_url(home_url('/wishlist')); ?>"><img class="mr-md-2 mr-2" style="width: 18px;" src="http://2ashop.kz//images/heart.svg">Избранное</a></div>
                            <div class="p-2 d-none">


                                <?php if (is_user_logged_in()) { ?>


                                    <?php global $current_user;
                                    wp_get_current_user(); ?>
                                    <?php
                                    printf(
                                        /* translators: 1: user display name 2: logout url */
                                        __('Привет %1$s'),
                                        '<strong>' . esc_html($current_user->display_name) . '</strong>',
                                        esc_url(wc_logout_url())
                                    );
                                    ?>

                                    <a href='<?php echo esc_url(home_url('/my-account')); ?>'>
                                        Мой аккаунт
                                    </a>

                                    <a href="<?php echo wp_logout_url(home_url()); ?>">выйти</a>



                                <?php } else { ?>

                                    <a class="lrm-login lrm-hide-if-logged-in" href="#login">
                                        войти
                                    </a>
                                    <!-- <a class="lrm-hide-if-logged-in" href="#">111</a> -->



                                <?php } ?>

                            </div>


                        </div>
                    </div>


                </div>
            </div>
            <div class="container">

                <div class="row">
                    <div class="col-lg-12"><?php echo do_shortcode('[wcas-search-form]'); ?></div>


                </div>

            </div>


            <div class="container-fluid mt-5">



                <!-- ******************* The banner category Area ******************* -->

                <?php if (!is_product() && !is_front_page() && !is_singular() && !is_shop()) : ?>

                    <section class="px-md-5 heros-2">


                        <div class="heros" style="background:
                             /* top, transparent red, faked with gradient */
                             linear-gradient(
                             rgba(0, 0, 0, 0.25),
                             rgba(0, 0, 0, 0.5)
                             ),
                             /* bottom, image */
                             url(<?php if (is_product_category()) {
                                        global $wp_query;

                                        $cat = $wp_query->get_queried_object();

                                        $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);

                                        $image = wp_get_attachment_url($thumbnail_id);

                                        echo "'{$image}'";
                                    }
                                    ?>);">




                            <div class="container">
                                <div class="row h-100 align-items-center">

                                    <div class="jumbotron bg-transparent text-white my-auto">
                                        <h4 class="ignorshik text-uppercase"><?php woocommerce_page_title(); ?></h4>


                                        <div class="lead text-white w-80">
                                            <?php
                                            the_archive_description('<div class="taxonomy-description">', '</div>');
                                            ?>
                                        </div>



                                    </div>
                                </div>

                            </div>
                        </div>

            </div>


            </section>

        <?php endif; ?>


        </div>

    </div>

    <?php if (!is_product() && !is_front_page() && !is_singular() && !is_shop()) : ?>

        <div class="container pt-lg-5 pb-lg-3">

            <div class="row">

                <div class="col-md-6"> <?php woocommerce_breadcrumb(); ?></div>
                <div class="col-md-3"><?php woocommerce_result_count(); ?></div>
                <div class="col-md-3"><?php woocommerce_catalog_ordering(); ?></div>




            </div>

        </div>



    <?php endif; ?>
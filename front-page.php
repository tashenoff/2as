<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

    <div class="wrapper" id="page-wrapper">

        <!-- Button trigger modal -->



        <div class="container-fluid px-md-5">
            <?php echo do_shortcode('[metaslider id="388"]'); ?>
            </div>



        <div class="<?php echo esc_attr( $container ); ?> pt-5" id="content" tabindex="-1">

            <div class="row">



                <main class="site-main" id="main">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( '../loop-templates/content', 'page' ); ?>


                    <?php endwhile; // end of the loop. ?>



                    <div class="row">
	<div class="col-sm-4">
    <div class="container__cat ">



    <div class="parent__cat">



        <a href="test" target="_blank" class="a__container">

           <div class="child__cat">  <span class="child_child">Мужское</span></div>

            <img class="parent_cat_img" src="images/home_cat2-4-1.png" alt="">


        </a>






    </div>








    </div>



</div>
<div class="col-sm-4">
    <div class="container__cat ">



    <div class="parent__cat">



        <a href="test" target="_blank" class="a__container">

           <div class="child__cat">  <span class="child_child">Женское</span></div>

           <img class="parent_cat_img" src="images/home_cat2-6.png" alt="">


        </a>






    </div>








    </div>



</div>
<div class="col-sm-4">
    <div class="container__cat ">



    <div class="parent__cat">



        <a href="test" target="_blank" class="a__container">

           <div class="child__cat">  <span class="child_child">Акссесуары</span></div>

           <img class="parent_cat_img" src="images/home_cat2-5.png" alt="">


        </a>






    </div>








    </div>



</div>
<div class="col-sm-12 p_half">
    </div>
<div class="col-sm-12 w-100">
    <div class="fw-heading pt-md-3 fw-heading-h1 ">
		<h1 class="bottom-border">Подпишитесь на нас в Instagram</h1>			<div class="fw-special-subtitle pt-md-2">фото отчеты наших покупателей</div>
	</div>
</div>
<div class="col-sm-4 mb-lg-3 col-6 img-fix">
    <img src="/images/69832371_155125655587645_2935203690960773491_n.jpg" ></div>
<div class="col-sm-4 mb-lg-3 col-6">
<img src="/images/70020432_441699703136593_1447669022560680297_n.jpg" ></div>
<div class="col-sm-4 mb-lg-3 col-6">
<img src="/images/70120047_401039477474774_2495156342200354028_n.jpg" ></div>
<div class="col-sm-4 mb-lg-3 col-6">
<img src="/images/Rectangle-105-364x364.png" ></div>
<div class="col-sm-4 mb-lg-3 col-6 d-none d-sm-block">
<img src="/images/70723461_155029495594068_3872758913129475751_n.jpg" ></div>
<div class="col-sm-4 col-6 d-none d-sm-block">
<img src="/images/70996803_436689306954584_2581364379230363217_n.jpg" ></div>
</div>



                    <div class="row">
<div class="container">

                        <h1 class="bottom-border">Обзоры</h1>
</div>

                    </div>
                    <div class="row">

                        <?php


                        $args = array( 'numberposts' => 999 , 'category' => 1, 'orderby' => 'date');
                        $myposts = get_posts( $args );


                        foreach( $myposts as $post ){ setup_postdata($post);

                            ?>
                            <div class="col-lg-4 p-2">


                                <div class="parent__post">

                                    <div class="pb-3">

                                    <div class="over">

                                        <a href="<?php the_permalink(); ?>">
                                            <div style="background-image:  url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>'" class="miniature"></div>

                                        </a>

                                    </div></div>

                                    <div class="block_text">

                                        <div class="post-txt ">
                                            <span class="heading_post"><?php the_title(); ?></span>

                                            <?php echo '<p class="d-none d-lg-block pt-3">' . get_the_excerpt() . '</p>' ?>


                                        </div>

                                    </div>
                                </div>

                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                        ?>






                </main><!-- #main -->


            </div><!-- .row -->

        </div><!-- #content -->

    </div><!-- #page-wrapper -->

<?php get_footer();

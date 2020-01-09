<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper  bg-primary" id="wrapper-footer">




    <div class="container">

             <div class="row">

            <div class="col-md-3">
               <h6 class="text-white text-uppercase">Информация о магазине</h6>

              <nav class="navbar_footer pt-md-4  navbar-dark">



                    <?php wp_nav_menu( [
                        'theme_location' => 'foo-menu'

                    ] ); ?>


                </nav>

            </div>



            <div class="col-md-3">
                <h6 class="text-white text-uppercase">Юридическая информация</h6>

                <nav class="navbar_footer pt-md-4  navbar-dark">



                    <?php wp_nav_menu( [
                        'theme_location' => 'footwo'

                    ] ); ?>


                </nav>

            </div>


            <div class="col-md-5 offset-md-1">

                <!--					--><?php //get_template_part( 'footer-widget' ); ?>



                <h6 class="text-white text-uppercase ">

                    Получите наши специальные предложения </h6>





                <p class="pt-md-4  text-muted">

                Вы можете отписаться в любой момент. Для этого воспользуйтесь нашими контактными данными в юридическом уведомленииe

                </p>


                <form class="input-group   has-search py-md-3">

                    <input type="text" class="form-control" placeholder="Ваш email">
                    <div class="  pl-lg-3 input-group-btn">
                        <button class="btn btn-outline-light px-4" type="submit">Подписаться</button>
                    </div>
                </form>





            </div>


        </div>

    </div>



    <div class="container pt-3 pb-3">



        <hr class="my-4 border-dark">


        <div class="d-flex justify-content-center align-items-center justify-content-md-between flex-column flex-md-row mx-0 mt-3">
            <div class="d-flex">


                <a href="#">
                    <svg class="mr-lg-2 icon-bottom icon" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="20" cy="20" r="16" stroke="white" stroke-width="2"/>
                        <path class="Symbol" d="M17.825 14.895V17.19H16.145V19.995H17.825V28.3333H21.2784V19.995H23.595C23.595 19.995 23.8134 18.65 23.9184 17.1783H21.2917V15.2616C21.2917 14.9733 21.6684 14.5883 22.0417 14.5883H23.9217V11.6666H21.3634C17.74 11.6666 17.825 14.475 17.825 14.895Z" fill="white"/>
                    </svg>


                </a>



                <a href="#">
                    <svg class="mr-lg-2 icon-bottom icon" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="20" cy="20" r="16" stroke="white" stroke-width="2"/>
                        <path class="Symbol" d="M20.6202 12.5927C16.0498 12.5927 13.7461 15.8704 13.7461 18.6001C13.7461 20.2575 14.372 21.726 15.7146 22.2741C15.935 22.3649 16.1331 22.2778 16.1979 22.0352L16.3924 21.2612C16.4572 21.0223 16.4313 20.9371 16.2554 20.726C15.8683 20.2704 15.6183 19.6778 15.6183 18.839C15.6183 16.4093 17.4368 14.2334 20.3554 14.2334C22.9405 14.2334 24.3572 15.813 24.3572 17.9186C24.3572 20.6927 23.1313 23.0334 21.3091 23.0334C20.3035 23.0334 19.5498 22.2019 19.7905 21.1797C20.0794 19.9612 20.6405 18.6464 20.6405 17.7667C20.6405 16.9778 20.2165 16.3241 19.3442 16.3241C18.3146 16.3241 17.4887 17.3871 17.4887 18.813C17.4887 19.7204 17.7961 20.3352 17.7961 20.3352L16.5572 25.576C16.1905 27.1315 16.5035 29.039 16.5294 29.2315C16.5442 29.3464 16.6905 29.3741 16.7572 29.2871C16.8535 29.163 18.0776 27.6482 18.4942 26.139C18.6128 25.713 19.172 23.4964 19.172 23.4964C19.5054 24.1334 20.4813 24.6927 21.5202 24.6927C24.6128 24.6927 26.7109 21.876 26.7109 18.1001C26.7091 15.2519 24.2924 12.5927 20.6202 12.5927Z" fill="white"/>
                    </svg>


                </a>


                <a href="#">
                    <svg class="mr-lg-2 icon-bottom icon" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="20" cy="20" r="16" stroke="white" stroke-width="2"/>
                        <path class="Symbol" d="M17.825 14.895V17.19H16.145V19.995H17.825V28.3333H21.2784V19.995H23.595C23.595 19.995 23.8134 18.65 23.9184 17.1783H21.2917V15.2616C21.2917 14.9733 21.6684 14.5883 22.0417 14.5883H23.9217V11.6666H21.3634C17.74 11.6666 17.825 14.475 17.825 14.895Z" fill="white"/>
                    </svg>


                </a>





            </div>
            <div class="d-flex mt-3 mt-md-0">
                <p class="mb-0 small text-muted">
                    Все права защищены &copy; 2ashop.kz

                </p>
            </div>
        </div>

    </div>


    <!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>





</body>

</html>





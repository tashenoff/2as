<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( empty( $atts['image'] ) ) {
	$image = fw_get_framework_directory_uri('/static/img/no-image.png');
} else {
	$image = $atts['image']['url'];
}




?>
<div class="container__cat ">



    <div class="parent__cat">



        <a href="<?php echo esc_attr($atts['link_cat']); ?>"  target="<?php echo esc_attr($atts['link_target']); ?>" class="a__container"  >

           <div class="child__cat">  <span class="child_child"><?php echo $atts['name']; ?></span></div>

            <img class="parent_cat_img" src="<?php echo esc_attr($image); ?>" alt="">


        </a>






    </div>








    </div>




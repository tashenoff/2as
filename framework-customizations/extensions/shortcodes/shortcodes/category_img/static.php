<?php if (!defined('FW')) die('Forbidden');

$shortcodes_extension = fw_ext('shortcodes');
wp_enqueue_style(
	'category_img',
	$shortcodes_extension->locate_URI('/shortcodes/category_img/static/css/styles.css')
);

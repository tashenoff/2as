<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'is_fullwidth' => array(
		'label'        => __('Full Width'),
		'type'         => 'switch',
	),
	'background_color' => array(
		'label' => __('Background Color'),
		'desc'  => __('Please select the background color'),
		'type'  => 'color-picker',
	),
	'background_image' => array(
		'label'   => __('Background Image'),
		'desc'    => __('Please select the background image'),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'video' => array(
		'label' => __('Background Video'),
		'desc'  => __('Insert Video URL to embed this video'),
		'type'  => 'text',
	),


    'custom_class' => array(
    'label' => __('custom_class'),
    'desc'  => __('Insert custom class'),
    'type'  => 'text',
),

    'custom_id' => array(
        'label' => __('custom_id'),
        'desc'  => __('Insert custom id'),
        'type'  => 'text',
    )


);

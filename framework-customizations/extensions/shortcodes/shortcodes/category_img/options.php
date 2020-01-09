<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image' => array(
		'label' => __( 'Выбрать картинку', 'fw' ),
		'desc'  => __( 'Выбрать изображение', 'fw' ),
		'type'  => 'upload'
	),
	'name'  => array(
		'label' => __( 'Название категории', 'fw' ),
		'desc'  => __( 'Name of the person', 'fw' ),
		'type'  => 'text',
		'value' => ''
	),

    'image-link-group' => array(
        'type'    => 'group',
        'options' => array(
            'link_cat'   => array(
                'type'  => 'text',
                'label' => __( 'Ссылка на категорию', 'fw' ),
                'desc'  => __( 'Куда будет переходить пользователь', 'fw' )
            ),
            'link_target' => array(
                'type'         => 'switch',
                'label'        => __( 'Open Link in New Window', 'fw' ),
                'desc'         => __( 'Select here if you want to open the linked page in a new window', 'fw' ),
                'right-choice' => array(
                    'value' => '_blank',
                    'label' => __( 'Yes', 'fw' ),
                ),
                'left-choice'  => array(
                    'value' => '_self',
                    'label' => __( 'No', 'fw' ),
                ),
            ),
        )
    )


);

<?php
//not used yet - moved them to a per gallery option
return array(
	'type'    => 'postbox',
	'label'   => 'Widgets',
	'class' => 'half-box left',
	'options' => array(
		'enable_rest_widgets_export' => array(
			'label'      => __( 'Export widgets', 'pixcustomify_txtd' ),
			'default'    => false,
			'type'       => 'switch',
			'show_group' => 'post_rest_widgets_group'
		),
		'post_rest_widgets_group'         => array(
			'type'    => 'group',
			'options' => array(
				'select_widgets_to_export' => array(
					'label'       => __( 'Widgets', 'pixfields_txtd' ),
					'type'        => 'widgets_checkbox',
					'description' => 'Which options be available on rest'
				),
			)
		),
	)
); # config
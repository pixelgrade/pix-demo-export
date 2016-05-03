<?php

return array(
	'type' => 'postbox',
	'label' => __('Replacers Images with', 'pix-demo-export'),
	'class' => 'half-box',
	'options' => array(
		'demo_xml_replacers' => array (
			'label' => __('Replacing images', 'pix-demo-export'),
			'default' => array(),
			'type' => 'gallery',
			'display_option' => ''
		),
	)
);
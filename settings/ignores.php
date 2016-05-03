<?php

return array(
	'type' => 'postbox',
	'label' => __('Ignores Images from replacing', 'pix-demo-export'),
	'class' => 'half-box',
	'options' => array(
		'demo_xml_ignores' => array (
			'label' => __('Replacing images', 'pix-demo-export'),
			'default' => array(),
			'type' => 'gallery',
			'display_option' => ''
		),
	)
);
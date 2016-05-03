<?php

return array(
	'type' => 'postbox',
	'label' => __('Replace Featured Images with', 'pix-demo-export'),
	'class' => 'half-box',
	'options' => array(
		'demo_xml_featured_images' => array (
			'label' => __('Replacing Feature images', 'pix-demo-export'),
			'default' => array(),
			'type' => 'gallery',
			'display_option' => ''
		),
	)
);
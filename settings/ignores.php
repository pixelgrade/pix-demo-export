<?php

return array(
	'type' => 'postbox',
	'label' => __('Ignores Images from replacing', 'demo_xml_txtd'),
	'class' => 'half-box',
	'options' => array(
		'demo_xml_ignores' => array (
			'label' => __('Replacing images', 'demo_xml_txtd'),
			'default' => array(),
			'type' => 'gallery',
			'display_option' => ''
		),
	)
);
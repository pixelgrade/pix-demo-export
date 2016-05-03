<?php

return array(
	'type' => 'postbox',
	'label' => __('Meta Keys replaced by id', 'pix-demo-export'),
	'class' => 'half-box',
	'options' => array(
		'demo_xml_meta_keys_replaced_by_id' => array (
			'label' => __('Which meta keys should be replaced', 'pix-demo-export'),
			'default' => array(),
			'type' => 'meta_keys_select',
			'display_option' => ''
		),
	)
);
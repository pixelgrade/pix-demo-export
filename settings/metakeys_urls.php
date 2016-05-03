<?php

return array(
	'type' => 'postbox',
	'label' => __('Metakeys replaced by url Settings', 'pix-demo-export'),
	'options' => array(
		'demo_xml_meta_keys_replaced_by_url' => array (
			'label' => __('Metakeys to replace', 'pix-demo-export'),
			'default' => array(),
			'type' => 'meta_keys_select',
			'display_option' => ''
		),
	)
);
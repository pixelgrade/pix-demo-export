<?php


return array
(
	'type' => 'postbox',
	'label' => __('Proof Galleries Settings', 'pix-demo-export'),

	// Custom field settings
	// ---------------------

	'options' => array
	(
		'enable_demo_xml_gallery' => array
		(
			'label' => __('Enable DemoXml Galleries', 'pix-demo-export'),
			'default' => true,
			'type' => 'switch',
			'show_group' => 'enable_demo_xml_gallery_group',
			'display_option' => ''
		), /* ALL THESE PREFIXED WITH PORTFOLIO SHOULD BE KIDS!! **/

		'enable_demo_xml_gallery_group' => array
		(
			'type' => 'group',
			'options' => array
			(
				'demo_xml_single_item_label' => array
				(
					'label' => __('Single Item Label', 'pix-demo-export'),
					'desc' => __('Here you can change the singular label.The default is "Proof Gallery"', 'pix-demo-export'),
					'default' => __('Proof Gallery', 'pix-demo-export'),
					'type' => 'text',
				),
				'demo_xml_multiple_items_label' => array
				(
					'label' => __('Multiple Items Label (plural)', 'pix-demo-export'),
					'desc' => __('Here you can change the plural label.The default is "Proof Galleries"', 'pix-demo-export'),
					'default' => __('Proof Galleries', 'pix-demo-export'),
					'type' => 'text',
				),
				'demo_xml_change_single_item_slug' => array
				(
					'label' => __('Change Gallery Slug', 'pix-demo-export'),
					'desc' => __('Do you want to rewrite the single gallery item slug?', 'pix-demo-export'),
					'default' => false,
					'type' => 'switch',
					'show_group' => 'demo_xml_change_single_item_slug_group',
				),
				'demo_xml_change_single_item_slug_group' => array
				(
					'type' => 'group',
					'options' => array
					(
						'demo_xml_gallery_new_single_item_slug' => array
						(
							'label' => __('New Single Item Slug', 'pix-demo-export'),
							'desc' => __('Change the single gallery slug as you need it.', 'pix-demo-export'),
							'default' => 'demo_xml_gallery',
							'type' => 'text',
						),
					),
				),
//				'demo_xml_change_archive_slug' => array
//				(
//					'label' => __('Change Archive Slug', 'pix-demo-export'),
//					'desc' => __('Do you want to rewrite the proof gallery archive slug? This will only be used if you don\'t have a page with the Portfolio template.', 'pix-demo-export'),
//					'default' => false,
//					'type' => 'switch',
//					'show_group' => 'demo_xml_change_archive_slug_group',
//				),
//				'demo_xml_change_archive_slug_group' => array
//				(
//					'type' => 'group',
//					'options' => array
//					(
//						'demo_xml_new_archive_slug' => array
//						(
//							'label' => __('New Category Slug', 'pix-demo-export'),
//							'desc' => __('Change the demo_xml category slug as you need it.', 'pix-demo-export'),
//							'default' => 'demo_xml',
//							'type' => 'text',
//						),
//					),
//				),
			),
		),
	)
); # config
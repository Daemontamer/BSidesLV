<?php

//TO REFACTOR
if( !function_exists('ventcamp_event_admin_schedule_init') ) {
    function ventcamp_event_admin_schedule_init() {  
	$parent = acf_add_options_page(array(
		'page_title' 	=> __( 'Event options', 'ventcamp' ),
		'menu_title'	=> __( 'Event schedule', 'ventcamp' ),
		'menu_slug' 	=> 'vncp-event-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'position'		=> '45.5'
	)); 
};

if( !function_exists('ventcamp_event_schedule_init') ) {
    function ventcamp_event_schedule_init() {  

	$schedules = array('main' => 'Main schedule', 'custom_1' => 'Extra schedule 1','custom_2' => 'Extra schedule 2','custom_3' => 'Extra schedule 3','custom_4' => 'Extra schedule 4','custom_5' => 'Extra schedule 5');

	/* Event ACF */	 
		if (isset($_GET['schedule'])){
			$scheduleKey = $_GET['schedule'];
		} else {
			$scheduleKey= '';
		}

		foreach($schedules as $key => $val){

			if ($key == 'main'){$key = '';} else {$key = '_'.$key;};

			$scheduleType = get_field('vncp_event_type'.$key, 'option');

			if ($scheduleType == 'one_day_no_threads'){

				acf_add_local_field_group(array (
				'key' => 'group_event_options'.$key,
				//'key' => 'group_event_options'.$key,
				'title' => __( 'Extra schedule 1', 'ventcamp' ),
				'fields' => array (
					array (
						'key' => 'field_event_type'.$key,
						'label' => __( 'Event type', 'ventcamp' ),
						'name' => 'vncp_event_type'.$key,
						'type' => 'radio',
						'instructions' => __( 'Choose your event type', 'ventcamp' ),
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => 'schedule_options '.$key,
							'id' => '',
						),
						'choices' => array (
							'one_day_no_threads' => __( 'Single day schedule', 'ventcamp' ),
							// 'one_day_with_threads' => 'One day with threads',
							'multi_day_no_threads' => __( 'Multi days schedule', 'ventcamp' ),
							'multi_day_with_threads' => __( 'Multi days & venues schedule', 'ventcamp' ),
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => '',
						'layout' => 'vertical',
					),

					//Single day schedule field group
					array (
					  'key' => 'field_single_day'.$key,
					  'label' => __( 'Single day schedule', 'ventcamp' ),
					  'name' => 'vncp_one_day_schedule'.$key,
					  'type' => 'repeater',
					  'instructions' => '',
					  'required' => 0,
					  'conditional_logic' => array (
					    array (
					      array (
					        'field' => 'field_event_type'.$key,
					        'operator' => '==',
					        'value' => 'one_day_no_threads',
					      ),
					    ),
					  ),
					  'wrapper' => array (
					    'width' => '',
					    'class' => 'acf-single-repeater' . ' schedule_options '.$key,
					    'id' => '',
					  ),
					  'collapsed' => 'field_5654af8c48901'.$key,
					  'min' => '',
					  'max' => '1',
					  'layout' => 'block',
					  'button_label' => __( 'Add a day', 'ventcamp' ),
					  'sub_fields' => array (
					    array (
					      'key' => 'field_single_day_date'.$key,
					      'label' => __( 'Date', 'ventcamp' ),
					      'name' => 'date',
					      'type' => 'text',
					      'instructions' => '',
					      'required' => 0,
					      'conditional_logic' => 0,
					      'wrapper' => array (
					        'width' => '',
					        'class' => 'schedule_options '.$key,
					        'id' => '',
					      ),
					      'default_value' => '',
					      'placeholder' => '',
					      'prepend' => '',
					      'append' => '',
					      'maxlength' => '',
					      'readonly' => 0,
					      'disabled' => 0,
					    ),
					    array (
					      'key' => 'field_single_day_lectures'.$key,
					      'label' => __( 'Thread schedule', 'ventcamp' ),
					      'name' => 'lectures',
					      'type' => 'repeater',
					      'instructions' => '',
					      'required' => 0,
					      'conditional_logic' => 0,
					      'wrapper' => array (
					        'width' => '',
					        'class' => 'schedule_options '.$key,
					        'id' => '',
					      ),
					      'collapsed' => 'field_single_day_lecture_title'.$key,
					      'min' => '',
					      'max' => '',
					      'layout' => 'block',
					      'button_label' => __( 'Add', 'ventcamp' ),
					      'sub_fields' => array (
					        array (
					          'key' => 'field_single_day_lecture_title'.$key,
					          'label' => __( 'Title', 'ventcamp' ),
					          'name' => 'title',
					          'type' => 'text',
					          'instructions' => __( 'Lecture title', 'ventcamp' ),
					          'required' => 0,
					          'conditional_logic' => 0,
					          'wrapper' => array (
					            'width' => '',
					            'class' => 'schedule_options '.$key,
					            'id' => '',
					          ),
					          'default_value' => '',
					          'placeholder' => '',
					          'prepend' => '',
					          'append' => '',
					          'maxlength' => '',
					          'readonly' => 0,
					          'disabled' => 0,
					        ),
					        array (
					          'key' => 'field_single_day_lecture_location'.$key,
					          'label' => __( 'Location', 'ventcamp'.$key ),
					          'name' => 'location',
					          'type' => 'text',
					          'instructions' => '',
					          'required' => 0,
					          'conditional_logic' => 0,
					          'wrapper' => array (
					            'width' => '',
					            'class' => 'schedule_options '.$key,
					            'id' => '',
					          ),
					          'default_value' => '',
					          'placeholder' => '',
					          'prepend' => '',
					          'append' => '',
					          'maxlength' => '',
					          'readonly' => 0,
					          'disabled' => 0,
					        ),
					        array (
					          'key' => 'field_single_day_lecture_time'.$key,
					          'label' => __( 'Time', 'ventcamp' ),
					          'name' => 'time',
					          'type' => 'text',
					          'instructions' => '',
					          'required' => 0,
					          'conditional_logic' => 0,
					          'wrapper' => array (
					            'width' => '',
					            'class' => 'schedule_options '.$key,
					            'id' => '',
					          ),
					          'default_value' => '',
					          'placeholder' => '',
					          'prepend' => '',
					          'append' => '',
					          'maxlength' => '',
					          'readonly' => 0,
					          'disabled' => 0,
					        ),
					        array (
					          'key' => 'field_single_day_lecture_description'.$key,
					          'label' => __( 'Description', 'ventcamp' ),
					          'name' => 'description',
					          'type' => 'wysiwyg',
					          'instructions' => '',
					          'required' => 0,
					          'conditional_logic' => 0,
					          'wrapper' => array (
					            'width' => '',
					            'class' => 'schedule_options '.$key,
					            'id' => '',
					          ),
					          'default_value' => '',
					          'placeholder' => '',
					          'maxlength' => '',
					          'rows' => 12,
					          'new_lines' => '',
					          'readonly' => 0,
					          'disabled' => 0,
					        ),
					        array (
					          'key' => 'field_single_day_lecture_info'.$key,
					          'label' => __( 'Extra Info', 'ventcamp' ),
					          'name' => 'extra_info',
					          'type' => 'text',
					          'instructions' => '',
					          'required' => 0,
					          'conditional_logic' => 0,
					          'wrapper' => array (
					            'width' => '',
					            'class' => 'schedule_options '.$key,
					            'id' => '',
					          ),
					          'default_value' => '',
					          'placeholder' => '',
					          'prepend' => '',
					          'append' => '',
					          'maxlength' => '',
					          'readonly' => 0,
					          'disabled' => 0,
					        ),
					      ),
					    ),
					  ),
					),
),
				'location' => array (
					array (
						array (
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'vncp-event-options',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'seamless',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));

				} elseif ($scheduleType == 'multi_day_with_threads'){
				acf_add_local_field_group(array (
				'key' => 'group_event_options'.$key,
				//'key' => 'group_event_options'.$key,
				'title' => __( 'Exra schedule 1', 'ventcamp' ),
				'fields' => array (
					array (
						'key' => 'field_event_type'.$key,
						'label' => __( 'Event type', 'ventcamp' ),
						'name' => 'vncp_event_type'.$key,
						'type' => 'radio',
						'instructions' => __( 'Choose your event type', 'ventcamp' ),
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => 'schedule_options '.$key,
							'id' => '',
						),
						'choices' => array (
							'one_day_no_threads' => __( 'Single day schedule', 'ventcamp' ),
							// 'one_day_with_threads' => 'One day with threads',
							'multi_day_no_threads' => __( 'Multi days schedule', 'ventcamp' ),
							'multi_day_with_threads' => __( 'Multi days & venues schedule', 'ventcamp' ),
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => '',
						'layout' => 'vertical',
					),
					//Multi days - multi threads event schedule
					array (
						'key' => 'field_5654b04de8a66'.$key,
						'label' => __( 'Multi days & venues schedule', 'ventcamp' ),
						'name' => 'vncp_md_w_thrds'.$key,
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_event_type'.$key,
									'operator' => '==',
									'value' => 'multi_day_with_threads',
								),
							),
						),
						'wrapper' => array (
							'width' => '',
							'class' => 'schedule_options '.$key,
							'id' => '',
						),
						'collapsed' => 'field_5654b04ee8a67'.$key,
						'min' => '',
						'max' => '',
						'layout' => 'block',
						'button_label' => __( 'Add a day', 'ventcamp' ),
						'sub_fields' => array (
							array (
								'key' => 'field_5654b04ee8a67'.$key,
								'label' => __( 'Title', 'ventcamp' ),
								'name' => 'title',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => 'schedule_options '.$key,
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
								'readonly' => 0,
								'disabled' => 0,
							),
							array (
								'key' => 'field_5654b04ee8a68'.$key,
								'label' => __( 'Date', 'ventcamp' ),
								'name' => 'date',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => 'schedule_options '.$key,
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
								'readonly' => 0,
								'disabled' => 0,
							),
							array (
								'key' => 'field_5654b06ae8a6f'.$key,
								'label' => __( 'Threads', 'ventcamp' ),
								'name' => 'threads',
								'type' => 'repeater',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => 'schedule_options '.$key,
									'id' => '',
								),
								'collapsed' => 'field_5654b08ae8a70'.$key,
								'min' => '',
								'max' => '',
								'layout' => 'block',
								'button_label' => __( 'Add thread', 'ventcamp' ),
								'sub_fields' => array (
									array (
										'key' => 'field_5654b08ae8a70'.$key,
										'label' => __( 'Thread title', 'ventcamp' ),
										'name' => 'title',
										'type' => 'text',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array (
											'width' => '',
											'class' => 'schedule_options '.$key,
											'id' => '',
										),
										'default_value' => '',
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'maxlength' => '',
										'readonly' => 0,
										'disabled' => 0,
									),
									array (
										'key' => 'field_5654b09ce8a71'.$key,
										'label' => __( 'Thread Schedule', 'ventcamp' ),
										'name' => 'lectures',
										'type' => 'repeater',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array (
											'width' => '',
											'class' => 'schedule_options '.$key,
											'id' => '',
										),
										'collapsed' => 'field_5654b09ce8a72'.$key,
										'min' => '',
										'max' => '',
										'layout' => 'block',
										'button_label' => __( 'Add', 'ventcamp' ),
										'sub_fields' => array (
											array (
												'key' => 'field_5654b09ce8a72'.$key,
												'label' => __( 'Title', 'ventcamp' ),
												'name' => 'title',
												'type' => 'text',
												'instructions' => __( 'Lecture title', 'ventcamp' ),
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array (
													'width' => '',
													'class' => 'schedule_options '.$key,
													'id' => '',
												),
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'maxlength' => '',
												'readonly' => 0,
												'disabled' => 0,
											),
											array (
												'key' => 'field_5654b09ce8a73'.$key,
												'label' => __( 'Time', 'ventcamp' ),
												'name' => 'time',
												'type' => 'text',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array (
													'width' => '',
													'class' => 'schedule_options '.$key,
													'id' => '',
												),
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'maxlength' => '',
												'readonly' => 0,
												'disabled' => 0,
											),
											array (
												'key' => 'field_5654b09ce8a74'.$key,
												'label' => __( 'Description', 'ventcamp' ),
												'name' => 'description',
												'type' => 'wysiwyg',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array (
													'width' => '',
													'class' => 'schedule_options '.$key,
													'id' => '',
												),
												'default_value' => '',
												'placeholder' => '',
												'maxlength' => '',
												'rows' => 12,
												'new_lines' => '',
												'readonly' => 0,
												'disabled' => 0,
											),
											array (
												'key' => 'field_5654b09ce8a75'.$key,
												'label' => __( 'Lecturer', 'ventcamp' ),
												'name' => 'lecturer',
												'type' => 'text',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array (
													'width' => '',
													'class' => 'schedule_options '.$key,
													'id' => '',
												),
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'maxlength' => '',
												'readonly' => 0,
												'disabled' => 0,
											),
											array (
												'key' => 'field_5654b09ce8a76'.$key,
												'label' => __( 'Icon', 'ventcamp' ),
												'name' => 'icon',
												'type' => 'image',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array (
													'width' => '',
													'class' => 'schedule_options '.$key,
													'id' => '',
												),
												'return_format' => 'array',
												'preview_size' => '70x70',
												'library' => 'all',
												'min_width' => '',
												'min_height' => '',
												'min_size' => '',
												'max_width' => '',
												'max_height' => '',
												'max_size' => '',
												'mime_types' => '',
											),
										),
									),
								),
							),
						),
					),
),
				'location' => array (
					array (
						array (
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'vncp-event-options',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'seamless',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));
					
				} elseif ($scheduleType == 'multi_day_no_threads'){
					acf_add_local_field_group(array (
				'key' => 'group_event_options'.$key,
				//'key' => 'group_event_options'.$key,
				'title' => __( 'Exra schedule 1', 'ventcamp' ),
				'fields' => array (
					array (
						'key' => 'field_event_type'.$key,
						'label' => __( 'Event type', 'ventcamp' ),
						'name' => 'vncp_event_type'.$key,
						'type' => 'radio',
						'instructions' => __( 'Choose your event type', 'ventcamp' ),
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => 'schedule_options '.$key,
							'id' => '',
						),
						'choices' => array (
							'one_day_no_threads' => __( 'Single day schedule', 'ventcamp' ),
							// 'one_day_with_threads' => 'One day with threads',
							'multi_day_no_threads' => __( 'Multi days schedule', 'ventcamp' ),
							'multi_day_with_threads' => __( 'Multi days & venues schedule', 'ventcamp' ),
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => '',
						'layout' => 'vertical',
					),
					// Multi days event schedule
					array (
						'key' => 'field_5654af68487b7'.$key,
						'label' => __( 'Multi days schedule', 'ventcamp' ),
						'name' => 'vncp_md_wo_thrds'.$key,
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_event_type'.$key,
									'operator' => '==',
									'value' => 'multi_day_no_threads',
								),
							),
						),
						'wrapper' => array (
							'width' => '',
							'class' => 'schedule_options '.$key,
							'id' => '',
						),
						'collapsed' => 'field_5654af8c487b8'.$key,
						'min' => '',
						'max' => '',
						'layout' => 'block',
						'button_label' => __( 'Add a day', 'ventcamp' ),
						'sub_fields' => array (
							array (
								'key' => 'field_5654af8c487b8'.$key,
								'label' => __( 'Title', 'ventcamp' ),
								'name' => 'title',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => 'schedule_options '.$key,
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
								'readonly' => 0,
								'disabled' => 0,
							),
							array (
								'key' => 'field_5654af9a487b9'.$key,
								'label' => __( 'Date', 'ventcamp' ),
								'name' => 'date',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => 'schedule_options '.$key,
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
								'readonly' => 0,
								'disabled' => 0,
							),
							array (
								'key' => 'field_5654afb0487ba'.$key,
								'label' => __( 'Thread schedule', 'ventcamp' ),
								'name' => 'lectures',
								'type' => 'repeater',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => 'schedule_options '.$key,
									'id' => '',
								),
								'collapsed' => 'field_5654afb0487bb'.$key,
								'min' => '',
								'max' => '',
								'layout' => 'block',
								'button_label' => __( 'Add', 'ventcamp' ),
								'sub_fields' => array (
									array (
										'key' => 'field_5654afb0487bb'.$key,
										'label' => __( 'Title', 'ventcamp' ),
										'name' => 'title',
										'type' => 'text',
										'instructions' => __( 'Lecture title', 'ventcamp' ),
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array (
											'width' => '',
											'class' => 'schedule_options '.$key,
											'id' => '',
										),
										'default_value' => '',
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'maxlength' => '',
										'readonly' => 0,
										'disabled' => 0,
									),
									array (
										'key' => 'field_5654afb0487bc'.$key,
										'label' => __( 'Time', 'ventcamp' ),
										'name' => 'time',
										'type' => 'text',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array (
											'width' => '',
											'class' => 'schedule_options '.$key,
											'id' => '',
										),
										'default_value' => '',
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'maxlength' => '',
										'readonly' => 0,
										'disabled' => 0,
									),
									array (
										'key' => 'field_5654afb1487bd'.$key,
										'label' => __( 'Description', 'ventcamp' ),
										'name' => 'description',
										'type' => 'wysiwyg',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array (
											'width' => '',
											'class' => 'schedule_options '.$key,
											'id' => '',
										),
										'default_value' => '',
										'placeholder' => '',
										'maxlength' => '',
										'rows' => 12,
										'new_lines' => '',
										'readonly' => 0,
										'disabled' => 0,
									),
									array (
										'key' => 'field_5654afb1487be'.$key,
										'label' => __( 'Lecturer', 'ventcamp' ),
										'name' => 'lecturer',
										'type' => 'text',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array (
											'width' => '',
											'class' => 'schedule_options '.$key,
											'id' => '',
										),
										'default_value' => '',
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'maxlength' => '',
										'readonly' => 0,
										'disabled' => 0,
									),
									array (
										'key' => 'field_5654afb1487bf'.$key,
										'label' => __( 'Icon', 'ventcamp' ),
										'name' => 'icon',
										'type' => 'image',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array (
											'width' => '',
											'class' => 'schedule_options '.$key,
											'id' => '',
										),
										'return_format' => 'array',
										'preview_size' => '70x70',
										'library' => 'all',
										'min_width' => '',
										'min_height' => '',
										'min_size' => '',
										'max_width' => '',
										'max_height' => '',
										'max_size' => '',
										'mime_types' => '',
									),
								),
							),
						),
					),

				),
				'location' => array (
					array (
						array (
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'vncp-event-options',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'seamless',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));
		}
	}
	}
}
}

if( !function_exists('ventcamp_admin_add_acf_tabs') ){
	function ventcamp_admin_add_acf_tabs(){
		if(isset($_GET['page']) && $_GET['page'] == 'vncp-event-options'){
			if (isset($_GET['schedule'])){
				$scheduleKey = $_GET['schedule'];
			} else {
				$scheduleKey= '';
			}


			$custom_code = "<style>.schedule_options { display:none; } </style>";

			if( $scheduleKey == 'main' || $scheduleKey == ''){
			$custom_code .= '<style>.schedule_options:not(._custom_1):not(._custom_2):not(._custom_3):not(._custom_4):not(._custom_5) { display:block !important; } </style>';} 

			$custom_code .= '<style>.schedule_options._'.$scheduleKey .' { display:block !important; } </style>';

			$custom_code .= "<script>jQuery(document).ready(function() {jQuery('#acf_tabs').prependTo('.acf-settings-wrap');});</script>";
			
			$schedules = array('main' => 'Main schedule', 'custom_1' => 'Extra schedule 1','custom_2' => 'Extra schedule 2','custom_3' => 'Extra schedule 3','custom_4' => 'Extra schedule 4','custom_5' => 'Extra schedule 5');
		    $custom_code .=   '<div id="acf_tabs" class="wrap">';
		    $custom_code .= '<h2 class="nav-tab-wrapper">';

		  	foreach($schedules as $key => $val){
		  			if ($scheduleKey != $key && $scheduleKey != ''){$style = 'style="color:#9b9797;"';} else {$style = 'style="color:#000;"';};
		           $custom_code .= '<a ' . $style . ' href="?page=vncp-event-options&schedule=' . $key . '" class="nav-tab nav-tab-active">'. $val .'</a>';
		    };
		        $custom_code .="</h2></div>";
		    
		    echo $custom_code;
		}
	} 
} 

if( function_exists('acf_add_local_field_group') ){
	add_action( 'init', 'ventcamp_event_schedule_init');
	add_action( 'admin_menu', 'ventcamp_event_admin_schedule_init');
	add_action( 'admin_footer', 'ventcamp_admin_add_acf_tabs');
}
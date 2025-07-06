<?php

/**
 * Elementor Form widget modification
 *
 * The init class that runs the Advanced Addons plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 * @since 1.0.0
 */

class ISFEFORMS_widgets_control
{


    /**
     * Registers custom controls for the Elementor widget.
     *
     * This method adds a new section and controls to the Elementor widget panel
     * for configuring an image select field. It includes a switcher to enable
     * the feature, and a repeater control to allow users to add multiple image
     * select fields with custom IDs and image galleries.
     *
     * @param \Elementor\Widget_Base $element The Elementor widget instance.
     * @param array                  $args    Additional arguments passed to the method.
     *
     * @return void
     */
    public function isfeforms_register_controls($element)
    {

        $element->start_controls_section(
            'isfeforms_image_select_field_section',
            [
                'label' => __('Image Select Field', 'image-select-field-for-elementor-forms'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $element->add_control(
            'isfeforms_img_select_control',
            [
                'label' => __('Enable', 'image-select-field-for-elementor-forms'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => '',
                'description' => __('This feature only works on the frontend.', 'image-select-field-for-elementor-forms'),
                'label_on' => 'Yes',
                'label_off' => 'No',
                'return_value' => 'yes',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'isfeforms_image_select_id',
            [
                'label' => __('Image Select Field Custom ID', 'image-select-field-for-elementor-forms'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'isfeforms_image_gallery',
            [
                'label' => __('Add Images', 'image-select-field-for-elementor-forms'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [],
            ]
        );

        $element->add_control(
            'isfeforms_image_field_list',
            array(
                'type'    => Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
            )
        );

        $element->add_control(
            'isfeforms_img_icon_adjustment_slider',
            [
                'label' => __('Icon Adjustment ( Image Selector )', 'image-select-field-for-elementor-forms'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .isfef-image-select input:checked+label:before' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $element->add_control(
            'isfeforms_img_icon_size',
            [
                'label' => __('Icon Size ( Image Selector )', 'image-select-field-for-elementor-forms'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .isfef-image-select input:checked+label:before' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $element->add_control(
            'modernize_radio_checkbox',
            [
                'label' => esc_html__('Modernize Your Radio/Checkbox', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'textdomain'),
                'label_off' => esc_html__('No', 'textdomain'),
            ]
        );

        $element->add_control(
            'isfeforms_icon_adjustment_slider',
            [
                'label' => __('Icon Adjustment ( Radio/Checkbox Selector )', 'image-select-field-for-elementor-forms'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}.isfef-modernize-radio-checkbox .elementor-field-type-checkbox:not(.isfef-image-select) input[type="checkbox"]:checked+label:before, {{WRAPPER}}.isfef-modernize-radio-checkbox .elementor-field-type-radio:not(.isfef-image-select) input[type="radio"]:checked+label:before' => 'top: {{SIZE}}%;',
                ],
            ]
        );

        $element->add_control(
            'isfeforms_rc_icon_size',
            [
                'label' => __('Icon Size ( Radio/Checkbox Selector )', 'image-select-field-for-elementor-forms'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}.isfef-modernize-radio-checkbox .elementor-field-type-checkbox:not(.isfef-image-select) input[type="checkbox"]:checked+label:before, {{WRAPPER}}.isfef-modernize-radio-checkbox .elementor-field-type-radio:not(.isfef-image-select) input[type="radio"]:checked+label:before' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // color
        $element->add_control(
            'isfeforms_icon_color',
            [
                'label' => __('Theme Color', 'image-select-field-for-elementor-forms'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => '--isfef_theme_color: {{VALUE}};',
                ],
            ]
        );

        // add padding
        $element->add_control(
            'isfeforms_img_padding',
            [
                'label' => __('Image Padding', 'image-select-field-for-elementor-forms'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .isfef-image-select label img' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $element->end_controls_section();
    }

    /**
     * Handles the rendering process before an Elementor element is displayed.
     *
     * This method checks if the element has specific settings related to the 
     * "Image Options Field for Elementor Forms" plugin. If the required settings 
     * are present, it enqueues necessary styles and scripts and adds custom 
     * attributes to the element's wrapper for further processing.
     *
     * @param \Elementor\Element_Base $element The Elementor element instance being rendered.
     *
     * @return void
     *
     * @uses \Elementor\Element_Base::get_settings() To retrieve the element's settings.
     * @uses \Elementor\Element_Base::add_render_attribute() To add custom attributes to the element's wrapper.
     * @uses wp_enqueue_style() To enqueue the plugin's stylesheet.
     * @uses wp_enqueue_script() To enqueue the plugin's JavaScript file.
     */

    public function before_render_element($element)
    {
        $settings = $element->get_settings();
        if (!empty($settings['isfeforms_img_select_control'])) {
            if (array_key_exists('isfeforms_image_field_list', $settings)) {
                $rep_data = $settings['isfeforms_image_field_list'];
                if (!empty($rep_data[0]['isfeforms_image_select_id']) && !empty($rep_data[0]['isfeforms_image_gallery'])) {
                    wp_enqueue_style('isfef-style');
                    wp_enqueue_script('isfef-scripts');
                    $element->add_render_attribute('_wrapper', [
                        'data-isfef-images' => esc_attr(json_encode($rep_data)),
                        'data-isfef-modernize' => !empty($settings['modernize_radio_checkbox']) && $settings['modernize_radio_checkbox'] === 'yes' ? 'true' : 'false',
                    ]);
                }
            }
        }
    }
}

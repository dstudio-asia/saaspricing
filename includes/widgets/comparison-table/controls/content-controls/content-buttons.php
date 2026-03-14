<?php

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait Saasp_Comparison_Content_Buttons_Controls {

    protected function register_content_buttons_controls() {

            $this->start_controls_section(
                'saasp_comparison_cta_section_starts',
                [
                    'label' => esc_html__( 'Buttons', 'saaspricing' ),
                    'tab' =>   Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_primary_cta_heading',
                [
                    'label' => esc_html__( 'Button One', 'saaspricing' ),
                    'type' =>  Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_popover_1',
                [
                    'label' => esc_html__( 'Primary', 'saaspricing' ),
                    'type' =>  Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->start_popover();

            $this->add_control(
                'saasp_comparison_primary_cta_switch_1',
                [
                    'label' => esc_html__( 'Primary', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_position_1',
                [
                    'label' => esc_html__( 'Position', 'saaspricing' ),
                    'type' =>  Controls_Manager::CHOOSE,
                    'options' => [
                        'top' => [
                            'title' => esc_html__( 'Top', 'saaspricing' ),
                            'icon' => 'eicon-v-align-top',
                        ],
                        'bottom' => [
                            'title' => esc_html__( 'Bottom', 'saaspricing' ),
                            'icon' => 'eicon-v-align-bottom',
                        ],
                    ],
                    'default' => 'bottom',
                    'toggle' => true,
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_1' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_text_1',
                [
                    'label' => esc_html__( 'Text', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( 'Get Started', 'saaspricing' ),
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_1' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_url_1',
                [
                    'label' => esc_html__( 'Link', 'saaspricing' ),
                    'type' =>  Controls_Manager::URL,
                    'placeholder' => esc_html__( 'https://your-link.com', 'saaspricing' ),
                    'dynamic' => [
                        'active' => true,
                    ],
                    'options' => [ 'url', 'is_external', 'nofollow', 'custom_attributes' ],
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                        'custom_attributes' => '',
                    ],
                    'label_block' => true,
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_1' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_size_1',
                [
                    'label' => esc_html__( 'Size', 'saaspricing' ),
                    'type' =>  Controls_Manager::SELECT,
                    'default' => 'small',
                    'options' => [
                        'extra-small' => esc_html__( 'Extra Small', 'saaspricing' ),
                        'small'  => esc_html__( 'Small', 'saaspricing' ),
                        'medium' => esc_html__( 'Medium', 'saaspricing' ),
                        'large' => esc_html__( 'Large', 'saaspricing' ),
                        'extra-large' => esc_html__( 'Extra Large', 'saaspricing' ),
                    ],
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_1' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_icon_1',
                [
                    'label' => esc_html__( 'Icon', 'saaspricing' ),
                    'type' =>  Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas fa-arrow-right',
                        'library' => 'fa-solid',
                    ],
                    'skin' => 'inline',
                    'exclude_inline_options' => [ 'svg' ],
                    'recommended' => [
                        'fa-solid' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                        'fa-regular' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                    ],
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_1' => 'yes',
                    ]
                ]
            );
            
            $this->add_responsive_control(
                'saasp_comparison_primary_cta_icon_spacing_1',
                [
                    'label' => esc_html__( 'Icon Spacing', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 50,
                            'step' => 1,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 8,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-spacing-1' => 'padding-left: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_1' => 'yes',
                    ]
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_secondary_cta_popover_1',
                [
                    'label' => esc_html__( 'Secondary', 'saaspricing' ),
                    'type' =>  Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->start_popover();

            $this->add_control(
                'saasp_comparison_secondary_cta_switch_1',
                [
                    'label' => esc_html__( 'Secondary', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_position_1',
                [
                    'label' => esc_html__( 'Position', 'saaspricing' ),
                    'type' =>  Controls_Manager::CHOOSE,
                    'options' => [
                        'top' => [
                            'title' => esc_html__( 'Top', 'saaspricing' ),
                            'icon' => 'eicon-v-align-top',
                        ],
                        'bottom' => [
                            'title' => esc_html__( 'Bottom', 'saaspricing' ),
                            'icon' => 'eicon-v-align-bottom',
                        ],
                    ],
                    'default' => 'bottom',
                    'toggle' => true,
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_1' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_text_1',
                [
                    'label' => esc_html__( 'Text', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( 'Learn More', 'saaspricing' ),
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_1' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_url_1',
                [
                    'label' => esc_html__( 'Link', 'saaspricing' ),
                    'type' =>  Controls_Manager::URL,
                    'placeholder' => esc_html__( 'https://your-link.com', 'saaspricing' ),
                    'dynamic' => [
                        'active' => true,
                    ],
                    'options' => [ 'url', 'is_external', 'nofollow', 'custom_attributes' ],
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                        'custom_attributes' => '',
                    ],
                    'label_block' => true,
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_1' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_size_1',
                [
                    'label' => esc_html__( 'Size', 'saaspricing' ),
                    'type' =>  Controls_Manager::SELECT,
                    'default' => 'small',
                    'options' => [
                        'extra-small' => esc_html__( 'Extra Small', 'saaspricing' ),
                        'small'  => esc_html__( 'Small', 'saaspricing' ),
                        'medium' => esc_html__( 'Medium', 'saaspricing' ),
                        'large' => esc_html__( 'Large', 'saaspricing' ),
                        'extra-large' => esc_html__( 'Extra Large', 'saaspricing' ),
                    ],
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_1' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_icon_1',
                [
                    'label' => esc_html__( 'Icon', 'saaspricing' ),
                    'type' =>  Controls_Manager::ICONS,
                    'skin' => 'inline',
                    'exclude_inline_options' => [ 'svg' ],
                    'recommended' => [
                        'fa-solid' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                        'fa-regular' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                    ],
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_1' => 'yes',
                    ]
                ]
            );
            
            $this->add_responsive_control(
                'saasp_comparison_secondary_cta_icon_spacing_1',
                [
                    'label' => esc_html__( 'Icon Spacing', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => [ 'px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 5,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-spacing-1' => 'padding-left: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_1' => 'yes',
                    ]
                ]
            );

            $this->end_popover();
             
            $this->add_control(
                'saasp_comparison_cta_column_one_background',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-footer-cta:nth-child(2)' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'saasp_primary_cta_2',
                [
                    'label' => esc_html__( 'Button Two', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' =>[
                        'saasp_comparison_select_columns' => ['2','3'],
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_popover_2',
                [
                    'label' => esc_html__( 'Primary', 'saaspricing' ),
                    'type' =>  Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' =>[
                        'saasp_comparison_select_columns' => ['2','3'],
                    ]
                ]
            );

            $this->start_popover();

            $this->add_control(
                'saasp_comparison_primary_cta_switch_2',
                [
                    'label' => esc_html__( 'Primary', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_position_2',
                [
                    'label' => esc_html__( 'Position', 'saaspricing' ),
                    'type' =>  Controls_Manager::CHOOSE,
                    'options' => [
                        'top' => [
                            'title' => esc_html__( 'Top', 'saaspricing' ),
                            'icon' => 'eicon-v-align-top',
                        ],
                        'bottom' => [
                            'title' => esc_html__( 'Bottom', 'saaspricing' ),
                            'icon' => 'eicon-v-align-bottom',
                        ],
                    ],
                    'default' => 'bottom',
                    'toggle' => true,
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_2' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_text_2',
                [
                    'label' => esc_html__( 'Text', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( 'Get Started', 'saaspricing' ),
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_2' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_url_2',
                [
                    'label' => esc_html__( 'Link', 'saaspricing' ),
                    'type' =>  Controls_Manager::URL,
                    'placeholder' => esc_html__( 'https://your-link.com', 'saaspricing' ),
                    'dynamic' => [
                        'active' => true,
                    ],
                    'options' => [ 'url', 'is_external', 'nofollow', 'custom_attributes' ],
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                        'custom_attributes' => '',
                    ],
                    'label_block' => true,
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_2' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_size_2',
                [
                    'label' => esc_html__( 'Size', 'saaspricing' ),
                    'type' =>  Controls_Manager::SELECT,
                    'default' => 'small',
                    'options' => [
                        'extra-small' => esc_html__( 'Extra Small', 'saaspricing' ),
                        'small'  => esc_html__( 'Small', 'saaspricing' ),
                        'medium' => esc_html__( 'Medium', 'saaspricing' ),
                        'large' => esc_html__( 'Large', 'saaspricing' ),
                        'extra-large' => esc_html__( 'Extra Large', 'saaspricing' ),
                    ],
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_2' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_icon_2',
                [
                    'label' => esc_html__( 'Icon', 'saaspricing' ),
                    'type' =>  Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas  fa-arrow-right',
                        'library' => 'fa-solid',
                    ],
                    'skin' => 'inline',
                    'exclude_inline_options' => [ 'svg' ],
                    'recommended' => [
                        'fa-solid' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                        'fa-regular' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                    ],
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_2' => 'yes',
                    ]
                ]
            );
            
            $this->add_responsive_control(
                'saasp_comparison_primary_cta_icon_spacing_2',
                [
                    'label' => esc_html__( 'Icon Spacing', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => [ 'px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 5,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 8,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-spacing-2' => 'padding-left: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_2' => 'yes',
                    ]
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_secondary_cta_popover_2',
                [
                    'label' => esc_html__( 'Secondary', 'saaspricing' ),
                    'type' =>  Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' =>[
                        'saasp_comparison_select_columns' => ['2','3'],
                    ]
                ]
            );

            $this->start_popover();

            $this->add_control(
                'saasp_comparison_secondary_cta_switch_2',
                [
                    'label' => esc_html__( 'Secondary', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_position_2',
                [
                    'label' => esc_html__( 'Position', 'saaspricing' ),
                    'type' =>  Controls_Manager::CHOOSE,
                    'options' => [
                        'top' => [
                            'title' => esc_html__( 'Top', 'saaspricing' ),
                            'icon' => 'eicon-v-align-top',
                        ],
                        'bottom' => [
                            'title' => esc_html__( 'Bottom', 'saaspricing' ),
                            'icon' => 'eicon-v-align-bottom',
                        ],
                    ],
                    'default' => 'bottom',
                    'toggle' => true,
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_2' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_text_2',
                [
                    'label' => esc_html__( 'Text', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( 'Learn More', 'saaspricing' ),
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_2' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_url_2',
                [
                    'label' => esc_html__( 'Link', 'saaspricing' ),
                    'type' =>  Controls_Manager::URL,
                    'placeholder' => esc_html__( 'https://your-link.com', 'saaspricing' ),
                    'dynamic' => [
                        'active' => true,
                    ],
                    'options' => [ 'url', 'is_external', 'nofollow', 'custom_attributes' ],
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                        'custom_attributes' => '',
                    ],
                    'label_block' => true,
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_2' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_size_2',
                [
                    'label' => esc_html__( 'Size', 'saaspricing' ),
                    'type' =>  Controls_Manager::SELECT,
                    'default' => 'small',
                    'options' => [
                        'extra-small' => esc_html__( 'Extra Small', 'saaspricing' ),
                        'small'  => esc_html__( 'Small', 'saaspricing' ),
                        'medium' => esc_html__( 'Medium', 'saaspricing' ),
                        'large' => esc_html__( 'Large', 'saaspricing' ),
                        'extra-large' => esc_html__( 'Extra Large', 'saaspricing' ),
                    ],
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_2' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_icon_2',
                [
                    'label' => esc_html__( 'Icon', 'saaspricing' ),
                    'type' =>  Controls_Manager::ICONS,
                    'skin' => 'inline',
                    'exclude_inline_options' => [ 'svg' ],
                    'recommended' => [
                        'fa-solid' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                        'fa-regular' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                    ],
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_2' => 'yes',
                    ]
                ]
            );
            
            $this->add_responsive_control(
                'saasp_comparison_secondary_cta_icon_spacing_2',
                [
                    'label' => esc_html__( 'Icon Spacing', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => [ 'px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 5,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-spacing-2' => 'padding-left: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_2' => 'yes',
                    ]
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_cta_column_two_background',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-footer-cta:nth-child(3)' => 'background-color: {{VALUE}}',
                    ],
                    'condition' =>[
                        'saasp_comparison_select_columns' => ['2','3'],
                    ]
                ]
            );

            $this->add_control(
                'saasp_primary_cta',
                [
                    'label' => esc_html__( 'Button Three', 'saaspricing' ),
                    'type' =>  Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' =>[
                        'saasp_comparison_select_columns' => '3',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_popover_3',
                [
                    'label' => esc_html__( 'Primary', 'saaspricing' ),
                    'type' =>  Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' =>[
                        'saasp_comparison_select_columns' => '3',
                    ]
                ]
            );

            $this->start_popover();

            $this->add_control(
                'saasp_comparison_primary_cta_switch_3',
                [
                    'label' => esc_html__( 'Primary', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_position_3',
                [
                    'label' => esc_html__( 'Position', 'saaspricing' ),
                    'type' =>  Controls_Manager::CHOOSE,
                    'options' => [
                        'top' => [
                            'title' => esc_html__( 'Top', 'saaspricing' ),
                            'icon' => 'eicon-v-align-top',
                        ],
                        'bottom' => [
                            'title' => esc_html__( 'Bottom', 'saaspricing' ),
                            'icon' => 'eicon-v-align-bottom',
                        ],
                    ],
                    'default' => 'bottom',
                    'toggle' => true,
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_3' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_text_3',
                [
                    'label' => esc_html__( 'Text', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( 'Get Started', 'saaspricing' ),
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_3' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_url_3',
                [
                    'label' => esc_html__( 'Link', 'saaspricing' ),
                    'type' =>  Controls_Manager::URL,
                    'placeholder' => esc_html__( 'https://your-link.com', 'saaspricing' ),
                    'dynamic' => [
                        'active' => true,
                    ],
                    'options' => [ 'url', 'is_external', 'nofollow', 'custom_attributes' ],
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                        'custom_attributes' => '',
                    ],
                    'label_block' => true,
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_3' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_size_3',
                [
                    'label' => esc_html__( 'Size', 'saaspricing' ),
                    'type' =>  Controls_Manager::SELECT,
                    'default' => 'small',
                    'options' => [
                        'extra-small' => esc_html__( 'Extra Small', 'saaspricing' ),
                        'small'  => esc_html__( 'Small', 'saaspricing' ),
                        'medium' => esc_html__( 'Medium', 'saaspricing' ),
                        'large' => esc_html__( 'Large', 'saaspricing' ),
                        'extra-large' => esc_html__( 'Extra Large', 'saaspricing' ),
                    ],
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_3' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_icon_3',
                [
                    'label' => esc_html__( 'Icon', 'saaspricing' ),
                    'type' =>  Controls_Manager::ICONS,
                    'skin' => 'inline',
                    'exclude_inline_options' => [ 'svg' ],
                    'default' => [
                        'value' => 'fas  fa-arrow-right',
                        'library' => 'fa-solid',
                    ],
                    'recommended' => [
                        'fa-solid' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                        'fa-regular' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                    ],
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_3' => 'yes',
                    ]
                ]
            );
            
            $this->add_responsive_control(
                'saasp_comparison_primary_cta_icon_spacing_3',
                [
                    'label' => esc_html__( 'Icon Spacing', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => [ 'px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 5,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 8,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-spacing-3' => 'padding-left: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' =>[
                        'saasp_comparison_primary_cta_switch_3' => 'yes',
                    ]
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_secondary_cta_popover_3',
                [
                    'label' => esc_html__( 'Secondary', 'saaspricing' ),
                    'type' =>  Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' =>[
                        'saasp_comparison_select_columns' => '3',
                    ]
                ]
            );

            $this->start_popover();

            $this->add_control(
                'saasp_comparison_secondary_cta_switch_3',
                [
                    'label' => esc_html__( 'Secondary', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_position_3',
                [
                    'label' => esc_html__( 'Position', 'saaspricing' ),
                    'type' =>  Controls_Manager::CHOOSE,
                    'options' => [
                        'top' => [
                            'title' => esc_html__( 'Top', 'saaspricing' ),
                            'icon' => 'eicon-v-align-top',
                        ],
                        'bottom' => [
                            'title' => esc_html__( 'Bottom', 'saaspricing' ),
                            'icon' => 'eicon-v-align-bottom',
                        ],
                    ],
                    'default' => 'bottom',
                    'toggle' => true,
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_3' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_text_3',
                [
                    'label' => esc_html__( 'Text', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( 'Learn More', 'saaspricing' ),
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_3' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_url_3',
                [
                    'label' => esc_html__( 'Link', 'saaspricing' ),
                    'type' =>  Controls_Manager::URL,
                    'placeholder' => esc_html__( 'https://your-link.com', 'saaspricing' ),
                    'dynamic' => [
                        'active' => true,
                    ],
                    'options' => [ 'url', 'is_external', 'nofollow', 'custom_attributes' ],
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                        'custom_attributes' => '',
                    ],
                    'label_block' => true,
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_3' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_size_3',
                [
                    'label' => esc_html__( 'Size', 'saaspricing' ),
                    'type' =>  Controls_Manager::SELECT,
                    'default' => 'small',
                    'options' => [
                        'extra-small' => esc_html__( 'Extra Small', 'saaspricing' ),
                        'small'  => esc_html__( 'Small', 'saaspricing' ),
                        'medium' => esc_html__( 'Medium', 'saaspricing' ),
                        'large' => esc_html__( 'Large', 'saaspricing' ),
                        'extra-large' => esc_html__( 'Extra Large', 'saaspricing' ),
                    ],
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_3' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_icon_3',
                [
                    'label' => esc_html__( 'Icon', 'saaspricing' ),
                    'type' =>  Controls_Manager::ICONS,
                    'skin' => 'inline',
                    'exclude_inline_options' => [ 'svg' ],
                    'recommended' => [
                        'fa-solid' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                        'fa-regular' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                    ],
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_3' => 'yes',
                    ]
                ]
            );
            
            $this->add_responsive_control(
                'saasp_comparison_secondary_cta_icon_spacing_3',
                [
                    'label' => esc_html__( 'Icon Spacing', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => [ 'px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 5,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-spacing-3' => 'padding-left: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' =>[
                        'saasp_comparison_secondary_cta_switch_3' => 'yes',
                    ]
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_cta_column_three_background',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-footer-cta:nth-child(4)' => 'background-color: {{VALUE}}',
                    ],
                    'condition' =>[
                        'saasp_comparison_select_columns' => '3',
                    ]
                ]
            );

            $this->add_control(
                'saasp_comparison_cta_alignment',
                [
                    'label' => esc_html__( 'Button Alignment', 'saaspricing' ),
                    'type' => Controls_Manager::CHOOSE,
                    'separator' => 'before',
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'saaspricing' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'saaspricing' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'saaspricing' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                        'justify' => [
                            'title' => esc_html__( 'Justify', 'saaspricing' ),
                            'icon' => 'eicon-text-align-justify',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => true,
                ]
            );

            $this->end_controls_section();
    }
}

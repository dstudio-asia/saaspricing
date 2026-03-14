<?php

if (! defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;

trait Saasp_Horizontal_Content_Buttons_Controls
{
    protected function register_content_buttons_controls()
    {
    $this->start_controls_section(
        'saasp_horizontal_buttons',
        [
            'label' => esc_html__( 'Buttons', 'saaspricing' ),
            'tab' =>  Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'saasp_horizontal_primary_cta_switch',
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
        'saasp_horizontal_primary_cta_text',
        [
            'label' => esc_html__( 'Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Get Started', 'saaspricing' ),
            'condition' =>[
                'saasp_horizontal_primary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_horizontal_primary_cta_url',
        [
            'label' => esc_html__( 'Link', 'saaspricing' ),
            'type' =>  Controls_Manager::URL,
            'placeholder' => esc_html__( 'https://your-link.com', 'saaspricing' ),
            'options' => [ 'url', 'is_external', 'nofollow', 'custom_attributes' ],
            'default' => [
                'url' => '',
                'is_external' => true,
                'nofollow' => true,
                'custom_attributes' => '',
            ],
            'label_block' => true,
            'condition' =>[
                'saasp_horizontal_primary_cta_switch' => 'yes',
            ],
            'dynamic' => [
                'active' => true
            ]
        ]
    );

    $this->add_control(
        'saasp_horizontal_primary_cta_size',
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
                'saasp_horizontal_primary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_horizontal_primary_cta_icon',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
            'type' =>  Controls_Manager::ICONS,
            'skin' => 'inline',
            'default' => [
                'value' => 'fas fa-arrow-right',
                'library' => 'fa-solid',
            ],
            'exclude_inline_options' => [ 'svg' ],
            'condition' =>[
                'saasp_horizontal_primary_cta_switch' => 'yes',
            ]
        ]
    );
    
    $this->add_responsive_control(
        'saasp_horizontal_primary_cta_icon_spacing',
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
                '{{WRAPPER}} .saaspricing-primary-spacing' => 'padding-left: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_horizontal_primary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_horizontal_secondary_cta_switch',
        [
            'label' => esc_html__( 'Secondary', 'saaspricing' ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'saaspricing' ),
            'label_off' => esc_html__( 'Hide', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'no',
            'separator'=>'before',
        ]
    );

    $this->add_control(
        'saasp_horizontal_secondary_cta_text',
        [
            'label' => esc_html__( 'Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Learn More', 'saaspricing' ),
            'condition' =>[
                'saasp_horizontal_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_horizontal_secondary_cta_url',
        [
            'label' => esc_html__( 'Link', 'saaspricing' ),
            'type' =>  Controls_Manager::URL,
            'placeholder' => esc_html__( 'https://your-link.com', 'saaspricing' ),
            'options' => [ 'url', 'is_external', 'nofollow', 'custom_attributes' ],
            'default' => [
                'url' => '',
                'is_external' => true,
                'nofollow' => true,
                'custom_attributes' => '',
            ],
            'label_block' => true,
            'dynamic' => [
                'active' => true
            ],
            'condition' =>[
                'saasp_horizontal_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_horizontal_secondary_cta_size',
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
                'saasp_horizontal_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_horizontal_secondary_cta_icon',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
            'type' =>  Controls_Manager::ICONS,
            'skin' => 'inline',
            'exclude_inline_options' => [ 'svg' ],
            'condition' =>[
                'saasp_horizontal_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    
    $this->add_responsive_control(
        'saasp_horizontal_secondary_cta_icon_spacing',
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
                '{{WRAPPER}} .saaspricing-secondary-spacing' => 'padding-left: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_horizontal_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->end_controls_section();
    }
}
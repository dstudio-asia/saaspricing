<?php

if (! defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

trait Saasp_Vertical_Style_Features_Controls
{
    protected function register_style_features_controls()
    {
    $this->start_controls_section(
        'saasp_vertical_features_section',
        [
            'label' => esc_html__( 'Features', 'saaspricing' ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_features_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-feature' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_features_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-feature' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_features_gap',
        [
            'label' => esc_html__( 'Gap', 'saaspricing' ),
            'type' =>  Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ]
            ],
            'default' => [
                'unit' => 'px',
                'size' => 20,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-padding:not(:last-child)' => 'padding-bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_features_title_heading',
        [
            'label' => esc_html__( 'Title', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_features_title_typography',
            'selector' => '{{WRAPPER}} .saaspricing-features-title',
        ]
    );

    $this->add_control(
        'saasp_vertical_features_title_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-features-title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_feature_title_distance',
        [
            'label' => esc_html__( 'Distance', 'saaspricing' ),
            'type' =>  Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 16,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-feature .saaspricing-features-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_features_icon_section',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ), 
            'type' =>  Controls_Manager::HEADING,
            'separator' =>'before',
        ]
    );
    
    $this->add_responsive_control(
        'saaspricing_vertical_features_icon_size',
        [
            'label' => esc_html__( 'Size', 'saaspricing' ),
            'type' =>  Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ]
            ],
            'default' => [
                'unit' => 'px',
                'size' => 14,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-pricing-card ol i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .saaspricing-vertical-pricing-card ol svg' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'saaspricing_vertical_features_icon_spacing',
        [
            'label' => esc_html__( 'Icon Spacing', 'saaspricing' ),
            'type' =>  Controls_Manager::SLIDER,
            'size_units' => [ 'px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ]
            ],
            'default' => [
                'unit' => 'px',
                'size' => 5,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-pricing-card ol i' => 'margin-right: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .saaspricing-vertical-pricing-card ol svg' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_features_text_heading',
        [
            'label' => esc_html__( 'Text', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_features_text_typography',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-pricing-card ol small',
        ]
    );

    $this->add_control(
        'saasp_vertical_features_text_color',
        [
            'label' => esc_html__( 'Text Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-pricing-card ol small' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_section();
    }
}
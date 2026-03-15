<?php

if (! defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

trait Saasp_Vertical_Style_Header_Controls
{
    protected function register_style_header_controls()
    {
    $this->start_controls_section(
        'saasp_vertical_header_style_tab',
        [
            'label' => esc_html__( 'Header', 'saaspricing' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_header_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'separator'=>'before',
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-header' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_header_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_header_icon',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_header_icon_size',
        [
            'label' => esc_html__( 'Icon Size', 'saaspricing' ),
            'type' =>  Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 50,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-icon' => 'font-size:{{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_header_icon_color',
        [
            'label' => esc_html__( 'Icon Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-icon i' => 'color: {{VALUE}}; border-color: {{VALUE}};',
                '{{WRAPPER}} .saaspricing-vertical-icon svg' => 'fill: {{VALUE}}; border-color: {{VALUE}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_header_icon_spacing',
        [
            'label' => esc_html__( 'Icon Spacing', 'saaspricing' ),
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
                'size' => 0,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-icon i' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .saaspricing-vertical-icon svg' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_header_title_style_heading',
        [
            'label' => esc_html__( 'Title', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_header_title_typography',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-title',
        ]
    );

    $this->add_control(
        'saasp_vertical_header_title_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_header_title_distance',
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
                'size' => 10,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-pricing-card .saaspricing-vertical-title' => 'padding-bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_header_description_heading',
        [
            'label' => esc_html__( 'Description', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_header_description_typography',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-description',
        ]
    );

    $this->add_control(
        'saasp_vertical_header_description_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-description' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_section();
    }
}
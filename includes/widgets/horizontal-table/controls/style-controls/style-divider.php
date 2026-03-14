<?php

if (! defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;

trait Saasp_Horizontal_Style_Divider_Controls
{
    protected function register_style_divider_controls()
    {
    $this->start_controls_section(
        'saasp_horizontal_style_divider',
        [
            'label' => esc_html__( 'Divider', 'saaspricing' ),
            'tab' =>  Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_horizontal_header_divider_weight',
        [
            'label' => esc_html__( 'Weight', 'saaspricing' ),
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
                'size' => 1,
            ],
            'selectors' => [
                '{{WRAPPER}} .saasp-horizontal-divider hr' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_header_divider_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saasp-horizontal-divider hr' => 'border-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_header_divider_border_style',
        [
            'label' => esc_html__( 'Style', 'saaspricing' ),
            'type' =>  Controls_Manager::SELECT,
            'default' => 'solid',
            'options' => [
                'solid'  => esc_html__( 'Solid', 'saaspricing' ),
                'dashed' => esc_html__( 'Dashed', 'saaspricing' ),
                'dotted' => esc_html__( 'Dotted', 'saaspricing' ),
                'double' => esc_html__( 'Double', 'saaspricing' ),
                'groove' => esc_html__( 'Groove', 'saaspricing' ),
            ],
            'selectors' => [
                '{{WRAPPER}} .saasp-horizontal-divider hr' => 'border-style: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_header_divider_width',
        [
            'label' => esc_html__( 'Width', 'saaspricing' ),
            'type' =>  Controls_Manager::SLIDER,
            'size_units' => ['%'],
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => '%',
                'size' => 90,
            ],
            'selectors' => [
                '{{WRAPPER}} .saasp-horizontal-divider hr' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_header_divider_alignment',
        [
            'label' => esc_html__( 'Alignment', 'saaspricing' ),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                '0 0 0 0' => [
                    'title' => esc_html__( 'Left', 'saaspricing' ),
                    'icon' => 'eicon-text-align-left',
                ],
                '0 auto 0 auto' => [
                    'title' => esc_html__( 'Center', 'saaspricing' ),
                    'icon' => 'eicon-text-align-center',
                ],
                '0 0 0 auto' => [
                    'title' => esc_html__( 'Right', 'saaspricing' ),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'default' => '0 auto 0 auto',
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} .saasp-horizontal-divider hr' => 'margin: {{VALUE}};',
            ],
        ]
    );


    $this->end_controls_section();
    }
}
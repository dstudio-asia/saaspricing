<?php

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait Saasp_Comparison_Style_Tooltip_Controls {

    protected function register_style_tooltip_controls() {

            $this->start_controls_section(
                'saasp_comparison_style_tooltip_section',
                [
                    'label' => esc_html__( 'Tooltip', 'saaspricing' ),
                    'tab' =>Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_features_tooltip_icon_size',
                [
                    'label' => esc_html__( 'Size', 'saaspricing' ),
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
                        'size' => 14,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-feature-main i' => 'font-size: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}}',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_feature_tooltip_icon_color',
                [
                    'label' => esc_html__( 'Color', 'saaspricing' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-feature-main i' => 'color: {{VALUE}} ',
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_features_tooltip_icon_distance',
                [
                    'label' => esc_html__( 'Distance', 'saaspricing' ),
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
                        '{{WRAPPER}} .saaspricing-feature-list span.saaspricing-feature-title' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();
    }
}

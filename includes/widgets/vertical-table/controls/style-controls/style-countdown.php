<?php

if (! defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

trait Saasp_Vertical_Style_Countdown_Controls
{
    protected function register_style_countdown_controls()
    {
    $this->start_controls_section(
        'saasp_vertical_countdown_style_tab',
        [
            'label' => esc_html__( 'Countdown', 'saaspricing' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_countdown_text_typography',
            'selector' => '{{WRAPPER}} .saaspricing-countdown',
        ]
    );

    $this->add_control(
        'saasp_vertical_countdown_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-countdown' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_countdown_div_background',
        [
            'label' => esc_html__( 'Background', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-countdown' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_countdown_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-countdown' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_countdown_margin',
        [
            'label' => esc_html__( 'Margin', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-countdown' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_countdown_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-countdown' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_vertical_countdown_border',
            'selector' => '{{WRAPPER}} .saaspricing-countdown',
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_countdown_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-countdown' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_vertical_countdown_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-countdown',
        ]
    );

    $this->end_controls_section();
    }
}
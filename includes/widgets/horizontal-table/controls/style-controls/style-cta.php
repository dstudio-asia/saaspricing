<?php

if (! defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

trait Saasp_Horizontal_Style_Cta_Controls
{
    protected function register_style_cta_controls()
    {
    $this->start_controls_section(
        'saasp_horizontal_cta_style_section',
        [
            'label' => esc_html__( 'CTA', 'saaspricing' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_horizontal_cta_background',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-sidebar' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_horizontal_cta_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-sidebar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_slogan_title_heading',
        [
            'label' => esc_html__( 'Slogan', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_horizontal_slogan_title_typography',
            'selector' => '{{WRAPPER}} .saaspricing-horizontal-slogan-title',
        ]
    );

    $this->add_control(
        'saasp_horizontal_slogan_title_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-slogan-title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_section();
    }
}
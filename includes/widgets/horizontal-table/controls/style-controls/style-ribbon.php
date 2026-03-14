<?php

if (! defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

trait Saasp_Horizontal_Style_Ribbon_Controls
{
    protected function register_style_ribbon_controls()
    {
    $this->start_controls_section(
        'saasp_horizontal_ribbon_style_section',
        [
            'label' => esc_html__( 'Ribbon', 'saaspricing' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_horizontal_ribbon_typography',
            'selector' => '{{WRAPPER}} .saaspricing-horizontal-ribbon',
        ]
    );

    $this->add_control(
        'saasp_horizontal_ribbon_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-ribbon' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_ribbon_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-ribbon' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_horizontal_ribbon_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-ribbon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_horizontal_ribbon_border',
            'selector' => '{{WRAPPER}} .saaspricing-horizontal-ribbon',
        ]
    );

    $this->add_responsive_control(
        'saasp_horizontal_ribbon_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-ribbon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_horizontal_ribbon_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-horizontal-ribbon',
        ]
    );

    $this->end_controls_section();
    }
}
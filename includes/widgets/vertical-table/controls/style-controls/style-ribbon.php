<?php

if (! defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

trait Saasp_Vertical_Style_Ribbon_Controls
{
    protected function register_style_ribbon_controls()
    {
    $this->start_controls_section(
        'saasp_vertical_ribbon_style_tab',
        [
            'label' => esc_html__( 'Ribbon', 'saaspricing' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_ribbon_title_heading',
        [
            'label' => esc_html__( 'Title', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_ribbon_title_typography',
            'selector' => '{{WRAPPER}} .saaspricing-ribbon-title small',
        ]
    );

    $this->add_control(
        'saasp_vertical_ribbon_title_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-ribbon-title small' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_ribbon_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-ribbon' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_vertical_ribbon_border',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-ribbon',
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_ribbon_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-ribbon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_vertical_ribbon_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-ribbon',
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_ribbon_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-ribbon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();
    }
}
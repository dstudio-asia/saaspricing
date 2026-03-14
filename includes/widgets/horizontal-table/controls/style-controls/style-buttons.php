<?php

if (! defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

trait Saasp_Horizontal_Style_Buttons_Controls
{
    protected function register_style_buttons_controls()
    {
    $this->start_controls_section(
        'saasp_horizontal_cta_tab_style',
        [
            'label' => esc_html__( 'Buttons', 'saaspricing' ),
            'tab' =>  Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_horizontal_primary_cta_section',
        [
            'label' => esc_html__( 'Primary Button', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
       [
           'name' => 'saasp_horizontal_primary_cta_typography',
           'selector' => '{{WRAPPER}} .saaspricing-horizontal-primary',
       ]
    );

    $this->start_controls_tabs(
        'saasp_horizontal_primary_cta_hover_normal_text_color'
    );

    $this->start_controls_tab(
        'saasp_horizontal_primary_cta_normal_text',
        [
            'label' => esc_html__( 'Normal', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_horizontal_primary_cta_normal_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-primary' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_primary_cta_normal_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-primary' => 'color: {{VALUE}}',
                '{{WRAPPER}} .saaspricing-horizontal-primary span svg' => 'fill: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_horizontal_primary_cta_border',
            'selector' => '{{WRAPPER}} .saaspricing-horizontal-primary',
        ]
    );

    $this->add_responsive_control(
        'saasp_horizontal_primary_cta_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-primary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
         Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_horizontal_primary_cta_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-horizontal-primary',
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'saasp_horizontal_primary_cta_hover_text',
        [
            'label' => esc_html__( 'Hover', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_horizontal_primary_cta_hover_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-primary:hover' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_primary_cta_hover_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-primary:hover' => 'color: {{VALUE}}',
                '{{WRAPPER}} .saaspricing-horizontal-primary:hover span svg' => 'fill: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_horizontal_primary_cta_border_hover',
            'selector' => '{{WRAPPER}} .saaspricing-horizontal-primary:hover',
        ]
    );

    $this->add_responsive_control(
        'saasp_horizontal_primary_cta_border_radius_hover',
        [
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-primary:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
         Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_horizontal_primary_cta_box_shadow_hover',
            'selector' => '{{WRAPPER}} .saaspricing-horizontal-primary:hover',
        ]
    );


    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->add_responsive_control(
        'saasp_horizontal_primary_cta_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'separator' => 'before',
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-primary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_horizontal_primary_cta_margin',
        [
            'label' => esc_html__( 'Margin', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-primary' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_secondary_cta_section',
        [
            'label' => esc_html__( 'Secondary Button', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
       [
           'name' => 'saasp_horizontal_secondary_cta_typography',
           'selector' => '{{WRAPPER}} .saaspricing-horizontal-secondary',
       ],
    );

    $this->start_controls_tabs(
        'saasp_horizontal_secondary_cta_hover_normal_text_color'
    );

    $this->start_controls_tab(
        'saasp_horizontal_secondary_cta_normal_text',
        [
            'label' => esc_html__( 'Normal', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_horizontal_secondary_cta_normal_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-secondary' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_secondary_cta_normal_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-secondary' => 'color: {{VALUE}}',
                '{{WRAPPER}} .saaspricing-horizontal-secondary span svg' => 'fill: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_horizontal_secondary_cta_border',
            'selector' => '{{WRAPPER}} .saaspricing-horizontal-secondary',
        ]
    );

    $this->add_responsive_control(
        'saasp_horizontal_secondary_cta_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-secondary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
         Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_horizontal_secondary_cta_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-horizontal-secondary',
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'saasp_horizontal_secondary_cta_hover_text',
        [
            'label' => esc_html__( 'Hover', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_horizontal_secondary_cta_hover_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-secondary:hover' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_secondary_cta_hover_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-secondary:hover' => 'color: {{VALUE}}',
                '{{WRAPPER}} .saaspricing-horizontal-secondary:hover span svg' => 'fill: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_horizontal_secondary_cta_border_hover',
            'selector' => '{{WRAPPER}} .saaspricing-horizontal-secondary:hover',
        ]
    );

    $this->add_responsive_control(
        'saasp_horizontal_secondary_cta_border_radius_hover',
        [
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-secondary:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
         Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_horizontal_secondary_cta_box_shadow_hover',
            'selector' => '{{WRAPPER}} .saaspricing-horizontal-secondary:hover',
        ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->add_responsive_control(
        'saasp_horizontal_secondary_cta_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'separator' => 'before',
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-secondary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_horizontal_secondary_cta_margin',
        [
            'label' => esc_html__( 'Margin', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricng-horizontal-secondary-main' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();
    }
}
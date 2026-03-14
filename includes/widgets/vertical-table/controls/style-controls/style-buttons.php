<?php

if (! defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

trait Saasp_Vertical_Style_Buttons_Controls
{
    protected function register_style_buttons_controls()
    {
    $this->start_controls_section(
        'saasp_vertical_cta_section',
        [
            'label' => esc_html__( 'Buttons', 'saaspricing' ),
            'tab' =>   Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_cta_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'separator'=>'before',
            'selectors' => [
                '{{WRAPPER}} .saaspricing-card-footer' => 'background-color: {{VALUE}}',
                '{{WRAPPER}} .saaspricing-cta-card' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_cta_global_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-card-footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .saaspricing-cta-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_cta_global_margin',
        [
            'label' => esc_html__( 'Margin', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-card-footer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .saaspricing-cta-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_section',
        [
            'label' => esc_html__( 'Primary Button', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
       [
           'name' => 'saasp_vertical_primary_cta_typography',
           'selector' => '{{WRAPPER}} .saaspricing-vertical-primary',
       ]
    );

    $this->start_controls_tabs(
        'saasp_vertical_primary_cta_hover_normal_text_color'
    );

    $this->start_controls_tab(
        'saasp_vertical_primary_cta_normal_text',
        [
            'label' => esc_html__( 'Normal', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_normal_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-primary' => 'color: {{VALUE}}',
                '{{WRAPPER}} .saaspricing-vertical-primary span svg' => 'fill: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_normal_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-primary' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_vertical_primary_cta_border',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-primary',
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'saasp_vertical_primary_cta_hover_text',
        [
            'label' => esc_html__( 'Hover', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_hover_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-primary:hover' => 'color: {{VALUE}}',
                '{{WRAPPER}} .saaspricing-vertical-primary:hover span svg' => 'fill: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_hover_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-primary:hover' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_vertical_primary_cta_hover_border',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-primary:hover',
        ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->add_responsive_control(
        'saasp_vertical_primary_cta_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'separator' => 'before',
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-primary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
         Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_vertical_primary_cta_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-primary',
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_primary_cta_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-primary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_primary_cta_margin',
        [
            'label' => esc_html__( 'Margin', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-primary' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_section',
        [
            'label' => esc_html__( 'Secondary Button', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
       [
           'name' => 'saasp_vertical_secondary_cta_typography',
           'selector' => '{{WRAPPER}} .saaspricing-vertical-secondary',
       ]
   );

    $this->start_controls_tabs(
        'saasp_vertical_secondary_cta_hover_normal_text_color'
    );

    $this->start_controls_tab(
        'saasp_vertical_secondary_cta_normal_text',
        [
            'label' => esc_html__( 'Normal', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_normal_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-secondary' => 'color: {{VALUE}}',
                '{{WRAPPER}} .saaspricing-vertical-secondary span svg' => 'fill: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_normal_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-secondary' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_vertical_secondary_cta_border',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-secondary',
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'saasp_vertical_secondary_cta_hover_text',
        [
            'label' => esc_html__( 'Hover', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_hover_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-secondary:hover' => 'color: {{VALUE}}',
                '{{WRAPPER}} .saaspricing-vertical-secondary:hover span svg' => 'fill: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_hover_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-secondary:hover' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_vertical_secondary_cta_hover_border',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-secondary:hover',
        ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->add_responsive_control(
        'saasp_vertical_secondary_cta_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-secondary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'before'
        ]
    );

    $this->add_group_control(
         Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_vertical_secondary_cta_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-secondary',
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_secondary_cta_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'default' => [
                'top' => 0,
                'right' => 0,
                'bottom' => 0,
                'left' => 0,
                'unit' => 'px',
                'isLinked' => false,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-secondary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_secondary_cta_margin',
        [
            'label' => esc_html__( 'Margin', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricng-secondary-main' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();
    }
}
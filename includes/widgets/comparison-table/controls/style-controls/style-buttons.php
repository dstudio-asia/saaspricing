<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait Saasp_Comparison_Style_Buttons_Controls {

    protected function register_style_buttons_controls() {

            $this->start_controls_section(
                'saasp_comparison_cta_section',
                [
                    'label' => esc_html__( 'Buttons', 'saaspricing' ),
                    'tab' =>   Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_cta_global_padding',
                [
                    'label' => esc_html__( 'Padding', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'separator' => 'after',
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-cta-main td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_section',
                [
                    'label' => esc_html__( 'Primary Buttons', 'saaspricing' ),
                    'type' =>  Controls_Manager::HEADING,
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
               [
                   'name' => 'saasp_comparison_primary_cta_typography',
                   'selector' => '{{WRAPPER}} .saaspricing-primary-btn',
               ]
           );

            $this->add_responsive_control(
                'saasp_comparison_primary_cta_padding',
                [
                    'label' => esc_html__( 'Padding', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_primary_cta_margin',
                [
                    'label' => esc_html__( 'Margin', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_primary_cta',
                [
                    'label' => esc_html__( 'Button One', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->start_controls_tabs(
                'saasp_comparison_primary_cta_noraml_normal_background_color_1'
            );

            $this->start_controls_tab(
                'saasp_comparison_primary_cta_normal_background_1',
                [
                    'label' => esc_html__( 'Normal', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_normal_background_color_1',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-1' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_normal_text_color_1',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-1' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .saaspricing-primary-spacing-1 svg' => 'fill: {{VALUE}}',
                    ],
                    'separator' => 'after',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_primary_cta_1_border',
                    'selector' => '{{WRAPPER}} .saaspricing-primary-1',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_primary_cta_border_1_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                 Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_primary_cta_1_box_shadow',
                    'selector' => '{{WRAPPER}} .saaspricing-primary-1',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'saasp_comparison_primary_cta_hover_background_1',
                [
                    'label' => esc_html__( 'Hover', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_hover_text_color_1',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-1:hover' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .saaspricing-primary-spacing-1:hover svg' => 'fill: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_hover_background_color_1',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'separator' => 'after',
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-1:hover' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_primary_cta_1_2_border_hover',
                    'selector' => '{{WRAPPER}} .saaspricing-primary-1:hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_primary_cta_1_border_radius_hover',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-1:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                 Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_primary_cta_1_box_shadow_hover',
                    'selector' => '{{WRAPPER}} .saaspricing-primary-1:hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_control(
                'saasp_comparison_column_two_primary_cta',
                [
                    'label' => esc_html__( 'Button Two', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->start_controls_tabs(
                'saasp_comparison_primary_cta_hover_normal_background_color_2'
            );

            $this->start_controls_tab(
                'saasp_comparison_primary_cta_normal_background_2',
                [
                    'label' => esc_html__( 'Normal', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_normal_text_color_2',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-2' => 'color: {{VALUE}}',
                        '{{WRAPPER}} span.saaspricing-primary-spacing-2 svg' => 'fill: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_normal_background_color_2',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'separator' => 'after',
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-2' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_primary_cta_2_border',
                    'selector' => '{{WRAPPER}} .saaspricing-primary-2',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_primary_cta_2_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                 Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_primary_cta_2_box_shadow',
                    'selector' => '{{WRAPPER}} .saaspricing-primary-2',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'saasp_comparison_primary_cta_hover_background_2',
                [
                    'label' => esc_html__( 'Hover', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_hover_text_color_2',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-2:hover' => 'color: {{VALUE}}',
                        '{{WRAPPER}} span.saaspricing-primary-spacing-2:hover svg' => 'fill: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_hover_background_color_2',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'separator' => 'after',
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-2:hover' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_primary_cta_2_border_hover',
                    'selector' => '{{WRAPPER}} .saaspricing-primary-2:hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_primary_cta_2_border_radius_hover',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-2:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                 Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_primary_cta_2_box_shadow_hover',
                    'selector' => '{{WRAPPER}} .saaspricing-primary-2:hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_control(
                'saasp_comparison_column_three_primary_cta',
                [
                    'label' => esc_html__( 'Button Three', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->start_controls_tabs(
                'saasp_comparison_primary_cta_hover_normal_background_color_3'
            );

            $this->start_controls_tab(
                'saasp_comparison_primary_cta_normal_background_3',
                [
                    'label' => esc_html__( 'Normal', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_normal_text_color_3',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-3' => 'color: {{VALUE}}',
                        '{{WRAPPER}} span.saaspricing-primary-spacing-3 svg' => 'fill: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_normal_background_color_3',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'separator' => 'after',
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-3' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_primary_cta_3_border',
                    'selector' => '{{WRAPPER}} .saaspricing-primary-3',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_primary_cta_3_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_group_control(
                 Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_primary_cta_3_box_shadow',
                    'selector' => '{{WRAPPER}} .saaspricing-primary-3',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'saasp_comparison_primary_cta_hover_background_3',
                [
                    'label' => esc_html__( 'Hover', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_hover_text_color_3',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-3:hover' => 'color: {{VALUE}}',
                        '{{WRAPPER}} span.saaspricing-primary-spacing-3:hover svg' => 'fill: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_primary_cta_hover_background_color_3',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'separator' => 'after',
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-3:hover' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_primary_cta_3_border_hover',
                    'selector' => '{{WRAPPER}} .saaspricing-primary-3:hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_primary_cta_3_border_radius_hover',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-primary-3:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_group_control(
                 Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_primary_cta_3_box_shadow_hover',
                    'selector' => '{{WRAPPER}} .saaspricing-primary-3:hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_control(
                'saasp_comparison_secondary_cta_section',
                [
                    'label' => esc_html__( 'Secondary Buttons', 'saaspricing' ),
                    'type' =>  Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
               [
                   'name' => 'saasp_comparison_secondary_cta_typography',
                   'selector' => '{{WRAPPER}} .saaspricing-secondary-btn',
               ]
           );

            $this->add_responsive_control(
                'saasp_comparison_secondary_cta_padding',
                [
                    'label' => esc_html__( 'Padding', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_secondary_cta_margin',
                [
                    'label' => esc_html__( 'Margin', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_secondary_cta',
                [
                    'label' => esc_html__( 'Button One', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->start_controls_tabs(
                'saasp_comparison_secondary_cta_noraml_normal_background_color_1'
            );

            $this->start_controls_tab(
                'saasp_comparison_secondary_cta_normal_background_1',
                [
                    'label' => esc_html__( 'Normal', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_normal_text_color_1',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-1' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .saaspricing-secondary-spacing-1 svg' => 'fill: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_normal_background_color_1',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'separator' => 'after',
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-1' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_secondary_cta_1_border',
                    'selector' => '{{WRAPPER}} .saaspricing-secondary-1',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_secondary_cta_1_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                 Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_secondary_cta_1_box_shadow',
                    'selector' => '{{WRAPPER}} .saaspricing-secondary-1',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'saasp_comparison_secondary_cta_hover_background_1',
                [
                    'label' => esc_html__( 'Hover', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_hover_text_color_1',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-1:hover' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .saaspricing-secondary-spacing-1:hover svg' => 'fill: {{VALUE}}',
                    ],
                    'separator' => 'after',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_hover_background_color_1',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-1:hover' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_secondary_cta_1_hover_border',
                    'selector' => '{{WRAPPER}} .saaspricing-secondary-1:hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_secondary_cta_1_hover_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-1:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                 Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_secondary_cta_1_hover_box_shadow',
                    'selector' => '{{WRAPPER}} .saaspricing-secondary-1:hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_control(
                'saasp_comparison_column_two_secondary_cta',
                [
                    'label' => esc_html__( 'Button Two', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->start_controls_tabs(
                'saasp_comparison_secondary_cta_hover_normal_background_color_2'
            );

            $this->start_controls_tab(
                'saasp_comparison_secondary_cta_normal_background_2',
                [
                    'label' => esc_html__( 'Normal', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_normal_text_color_2',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-2' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .saaspricing-secondary-spacing-2 svg' => 'fill: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_normal_background_color_2',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'separator' => 'after',
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-2' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_secondary_cta_2_border',
                    'selector' => '{{WRAPPER}} .saaspricing-secondary-2',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_secondary_cta_2_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                 Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_secondary_cta_2_box_shadow',
                    'selector' => '{{WRAPPER}} .saaspricing-secondary-2',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'saasp_comparison_secondary_cta_hover_background_2',
                [
                    'label' => esc_html__( 'Hover', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_hover_text_color_2',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-2:hover' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .saaspricing-secondary-spacing-2:hover svg' => 'fill: {{VALUE}}',
                    ],
                    'separator' => 'after',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_hover_background_color_2',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-2:hover' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_secondary_cta_2_hover_border',
                    'selector' => '{{WRAPPER}} .saaspricing-secondary-2:hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_secondary_cta_2_hover_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-2:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                 Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_secondary_cta_2_hover_box_shadow',
                    'selector' => '{{WRAPPER}} .saaspricing-secondary-2:hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_control(
                'saasp_comparison_column_three_secondary_cta',
                [
                    'label' => esc_html__( 'Button Three', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->start_controls_tabs(
                'saasp_comparison_secondary_cta_hover_normal_background_color_3'
            );

            $this->start_controls_tab(
                'saasp_comparison_secondary_cta_normal_background_3',
                [
                    'label' => esc_html__( 'Normal', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_normal_text_color_3',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-3' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .saaspricing-secondary-spacing-3 svg' => 'fill: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_normal_background_color_3',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'separator' => 'after',
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-3' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_secondary_cta_3_border',
                    'selector' => '{{WRAPPER}} .saaspricing-secondary-3',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_secondary_cta_3_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_group_control(
                 Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_secondary_cta_3_box_shadow',
                    'selector' => '{{WRAPPER}} .saaspricing-secondary-3',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'saasp_comparison_secondary_cta_hover_background_3',
                [
                    'label' => esc_html__( 'Hover', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_3_hover_background_color_3',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-3:hover' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_secondary_cta_3_hover_text_color_3',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'separator' => 'after',
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-3:hover' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .saaspricing-secondary-spacing-3:hover svg' => 'fill: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_secondary_cta_3_hover_border',
                    'selector' => '{{WRAPPER}} .saaspricing-secondary-3:hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_secondary_cta_hover_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-secondary-3:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_group_control(
                 Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_secondary_cta_hover_box_shadow',
                    'selector' => '{{WRAPPER}} .saaspricing-secondary-3:hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->end_controls_section();
    }
}

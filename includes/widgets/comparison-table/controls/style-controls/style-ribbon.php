<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait Saasp_Comparison_Style_Ribbon_Controls {

    protected function register_style_ribbon_controls() {

            $this->start_controls_section(
                'saasp_comparison_style_header_ribbon_section',
                [
                    'label' => esc_html__( 'Ribbon', 'saaspricing' ),
                    'tab' =>Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'saasp_comparison_header_ribbon_countdown_distance_between',
                [
                    'label' => esc_html__( 'Distance Between', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-ribbon-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_header_ribbon_padding',
                [
                    'label' => esc_html__( 'Padding', 'saaspricing' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-common-ribbon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_ribbon_title_heading',
                [
                    'label' => esc_html__( 'Title', 'saaspricing' ),
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before'
                ]
            );

            $this->add_group_control(
                 Group_Control_Typography::get_type(),
                [
                    'name' => 'saasp_comparison_header_ribbon_title_typography',
                    'selector' => '{{WRAPPER}} .saaspricing-ribbon-title',
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_header_ribbon_title_padding',
                [
                    'label' => esc_html__( 'Padding', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-ribbon-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_ribbon_countdown_heading',
                [
                    'label' => esc_html__( 'Countdown', 'saaspricing' ),
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before'
                ]
            );

            $this->add_group_control(
                 Group_Control_Typography::get_type(),
                [
                    'name' => 'saasp_comparison_header_ribbon_countdown_typography',
                    'selector' => '{{WRAPPER}} .saaspricing-countdown',
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_header_ribbon_countdown_padding',
                [
                    'label' => esc_html__( 'Padding', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'separator' => 'after',
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-show-expire-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_ribbon_colors',
                [
                    'label' => esc_html__( 'Column One', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->start_controls_tabs(
                'saasp_comparison_ribbon_column_one_ribbon'
            );

            $this->start_controls_tab(
                'saasp_comparison_ribbon_column_one_ribbon_normal',
                [
                    'label' => esc_html__( 'Normal', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_ribbon_color',
                [
                    'label' => esc_html__( 'Title Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(2) .saaspricing-ribbon-title' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_countdown_color',
                [
                    'label' => esc_html__( 'Countdown Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(2) .saaspricing-show-expire-date' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_ribbon_background',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(2)' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_header_ribbon_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(2)' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_header_ribbon_box_shadow',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(2)',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'saasp_comparison_ribbon_column_one_ribbon_hover',
                [
                    'label' => esc_html__( 'Hover', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_ribbon_hover_color',
                [
                    'label' => esc_html__( 'Title Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(2):hover .saaspricing-ribbon-title' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_countdown_hover_color',
                [
                    'label' => esc_html__( 'Countdown Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(2):hover .saaspricing-show-expire-date' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_ribbon_hover_background',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(2):hover' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_header_ribbon_one_hover_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(2):hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_header_ribbon_one_hover_box_shadow',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(2):hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );
            
            $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_control(
                'saasp_comparison_column_two_ribbon_colors',
                [
                    'label' => esc_html__( 'Column Two', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->start_controls_tabs(
                'saasp_comparison_ribbon_column_two_ribbon'
            );

            $this->start_controls_tab(
                'saasp_comparison_ribbon_column_two_ribbon_normal',
                [
                    'label' => esc_html__( 'Normal', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_ribbon_color',
                [
                    'label' => esc_html__( 'Title Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(3) .saaspricing-ribbon-title' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_countdown_color',
                [
                    'label' => esc_html__( 'Countdown Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(3) .saaspricing-show-expire-date' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_ribbon_background',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(3)' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_header_ribbon_two_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(3)' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_header_ribbon_two_box_shadow',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(3)',
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'saasp_comparison_ribbon_column_two_ribbon_hover',
                [
                    'label' => esc_html__( 'Hover', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_ribbon_hover_color',
                [
                    'label' => esc_html__( 'Title Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(3):hover .saaspricing-ribbon-title' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_countdown_hover_color',
                [
                    'label' => esc_html__( 'Countdown Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(3):hover .saaspricing-show-expire-date' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_ribbon_hover_background',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(3):hover' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_header_ribbon_two_hover_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}}  .saaspricing-main .saaspricing-common-ribbon:nth-child(3):hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_header_ribbon_two_hover_box_shadow',
                    'selector' => '{{WRAPPER}}  .saaspricing-main .saaspricing-common-ribbon:nth-child(3):hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );
            
            $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_control(
                'saasp_comparison_column_three_ribbon_colors',
                [
                    'label' => esc_html__( 'Column Three', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->start_controls_tabs(
                'saasp_comparison_ribbon_column_three_ribbon'
            );

            $this->start_controls_tab(
                'saasp_comparison_ribbon_column_three_ribbon_normal',
                [
                    'label' => esc_html__( 'Normal', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_ribbon_color',
                [
                    'label' => esc_html__( 'Title Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(4) .saaspricing-ribbon-title' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_countdown_color',
                [
                    'label' => esc_html__( 'Countdown Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(4) .saaspricing-show-expire-date' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_ribbon_background',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(4)' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_header_ribbon_three_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(4)' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_header_ribbon_three_box_shadow',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(4)',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'saasp_comparison_ribbon_column_three_ribbon_hover',
                [
                    'label' => esc_html__( 'Hover', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_ribbon_hover_color',
                [
                    'label' => esc_html__( 'Title Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(4):hover .saaspricing-ribbon-title' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_countdown_hover_color',
                [
                    'label' => esc_html__( 'Countdown Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(4):hover .saaspricing-show-expire-date' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_ribbon_hover_background',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(4):hover' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_header_ribbon_three_hover_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}}  .saaspricing-main .saaspricing-common-ribbon:nth-child(4):hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_header_ribbon_three_hover_box_shadow',
                    'selector' => '{{WRAPPER}}  .saaspricing-main .saaspricing-common-ribbon:nth-child(4):hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );
            
            $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->end_controls_section();
    }
}

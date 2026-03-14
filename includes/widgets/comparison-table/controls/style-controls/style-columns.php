<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait Saasp_Comparison_Style_Columns_Controls {

    protected function register_style_columns_controls() {

            $this->start_controls_section(
                'saasp_comparison_style_header_heading_section',
                [
                    'label' => esc_html__( 'Columns', 'saaspricing' ),
                    'tab' =>Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_heading_table_data_padding',
                [
                    'label' => esc_html__( 'Padding', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-price-table-head td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_style_tab_heading_title',
                [
                    'label' => esc_html__( 'Head Title', 'saaspricing' ),
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before'
                ]
            );

            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'saasp_comparison_heading_title_typography',
                    'selector' => '{{WRAPPER}} .saaspricing-price-table-head td .saaspricing-heading-title',
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_heading_title_distance',
                [
                    'label' => esc_html__( 'Distance', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => [ 'px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-price-table-head td .saaspricing-heading-title' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_style_tab_heading_description',
                [
                    'label' => esc_html__( 'Head Description', 'saaspricing' ),
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before'
                ]
            );
            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'saasp_comparison_heading_description_typography',
                    'selector' => '{{WRAPPER}} .saaspricing-price-table-head td small',
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_head_colors',
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
                'saasp_comparison_column_one_head_one'
            );

            $this->start_controls_tab(
                'saasp_comparison_column_one_head_normal',
                [
                    'label' => esc_html__( 'Normal', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_head_title_color',
                [
                    'label' => esc_html__( 'Head Title Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2) .saaspricing-heading-title' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_head_description_color',
                [
                    'label' => esc_html__( 'Head Description Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2) small' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_head_background',
                [
                    'label' => esc_html__( 'Head Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2)' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_column_one_head_border',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2)',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_column_one_head_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2)' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_column_one_head_boxshadow',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2)',
                ]
            );


            $this->end_controls_tab();

            $this->start_controls_tab(
                'saasp_comparison_column_one_head_hover',
                [
                    'label' => esc_html__( 'Hover', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_head_hover_title_color',
                [
                    'label' => esc_html__( 'Head Title Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2):hover .saaspricing-heading-title' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_head_hover_description_color',
                [
                    'label' => esc_html__( 'Head Description Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2):hover small' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_head_hover_background',
                [
                    'label' => esc_html__( 'Head Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2):hover' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_column_one_head_hover_border',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2):hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_column_one_head_hover_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2):hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_column_one_head_hover_boxshadow',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2):hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );
            
            $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_control(
                'saasp_comparison_column_two_head_colors',
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
                'saasp_comparison_column_two_head_one'
            );

            $this->start_controls_tab(
                'saasp_comparison_column_two_head_normal',
                [
                    'label' => esc_html__( 'Normal', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_head_title_color',
                [
                    'label' => esc_html__( 'Head Title Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(3) .saaspricing-heading-title' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_head_description_color',
                [
                    'label' => esc_html__( 'Head Description Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(3) small' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_head_background',
                [
                    'label' => esc_html__( 'Head Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(3)' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_column_two_head_border',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(3)',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_column_two_head_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(3)' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_column_two_head_boxshadow',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2)',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );


            $this->end_controls_tab();

            $this->start_controls_tab(
                'saasp_comparison_column_two_head_hover',
                [
                    'label' => esc_html__( 'Hover', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_head_hover_title_color',
                [
                    'label' => esc_html__( 'Head Title Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(3):hover .saaspricing-heading-title' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_head_hover_description_color',
                [
                    'label' => esc_html__( 'Head Description Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(3):hover small' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_head_hover_background',
                [
                    'label' => esc_html__( 'Head Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(3):hover' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_column_two_head_hover_border',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(3):hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_column_two_head_hover_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(3):hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_column_two_head_hover_boxshadow',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(3):hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );
            
            $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_control(
                'saasp_comparison_column_three_head_colors',
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
                'saasp_comparison_column_three_head_one'
            );

            $this->start_controls_tab(
                'saasp_comparison_column_three_head_normal',
                [
                    'label' => esc_html__( 'Normal', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_head_title_color',
                [
                    'label' => esc_html__( 'Head Title Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(4) .saaspricing-heading-title' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_head_description_color',
                [
                    'label' => esc_html__( 'Head Description Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(4) small' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_head_background',
                [
                    'label' => esc_html__( 'Head Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(4)' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_column_three_head_border',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(4)',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_column_three_head_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(4)' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_column_three_head_boxshadow',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(4)',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'saasp_comparison_column_three_head_hover',
                [
                    'label' => esc_html__( 'Hover', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_head_hover_title_color',
                [
                    'label' => esc_html__( 'Head Title Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(4):hover .saaspricing-heading-title' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_head_hover_description_color',
                [
                    'label' => esc_html__( 'Head Description Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(4):hover small' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_head_hover_background',
                [
                    'label' => esc_html__( 'Head Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(4):hover' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'saasp_comparison_column_three_head_hover_border',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(4):hover',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_column_three_head_hover_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(4):hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['3'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'saasp_comparison_column_three_head_hover_boxshadow',
                    'selector' => '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(4):hover',
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

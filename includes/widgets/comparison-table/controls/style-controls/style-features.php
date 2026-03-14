<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait Saasp_Comparison_Style_Features_Controls {

    protected function register_style_features_controls() {

            $this->start_controls_section(
                'saasp_comparison_features_style_tab',
                [
                    'label' => esc_html__( 'Features', 'saaspricing' ),
                    'tab' =>Controls_Manager::TAB_STYLE,
                ]
            );

            $this->start_controls_tabs( 'saasp_comparison_cell_normal_hover_background' );
        	
            $this->start_controls_tab(
        		'saasp_comparison_cell_normal_background',
        		[
        			'label' => esc_html__( 'Normal', 'saaspricing'),
        		]
        	);

            $this->add_control(
                'saasp_comparison_cell_odd_background_color',
                [
                    'label' => esc_html__( 'Odd Background', 'saaspricing' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table .saaspricing-feature-list:nth-child(odd)' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_cell_even_background_color',
                [
                    'label' => esc_html__( 'Even Background', 'saaspricing' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table .saaspricing-feature-list:nth-child(even)' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
        		'saasp_comparison_cell_hover_background',
        		[
        			'label' => esc_html__( 'Hover', 'saaspricing'),
        		]
        	);

            $this->add_control(
                'saasp_comparison_cell_odd_hover_background_color',
                [
                    'label' => esc_html__( 'Odd Background', 'saaspricing' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table .saaspricing-feature-list:nth-child(odd):hover' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_cell_even_hover_background_color',
                [
                    'label' => esc_html__( 'Even Background', 'saaspricing' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table .saaspricing-feature-list:nth-child(even):hover' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_control(
                'saasp_comparison_feature_title_section',
                [
                    'label' => esc_html__( 'Feature Title', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before'
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
               [
                   'name' => 'saasp_comparison_feature_title_typography',
                   'selector' => '{{WRAPPER}} .saaspricing-feature-title',
               ]
            );

            $this->add_control(
                'saasp_comparison_feature_title_color',
                [
                    'label' => esc_html__( 'Title Color', 'saaspricing' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-feature-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_feature_title_background_color',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-feature-main' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_features_icon_section',
                [
                    'label' => esc_html__( 'Icon', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            
            $this->add_responsive_control(
                'saasp_comparison_features_icon_size',
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
                        '{{WRAPPER}} .saaspricing-cell-icon i' => 'font-size: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .saaspricing-cell-icon svg' => 'font-size: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_features_icon_distance',
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
                        '{{WRAPPER}} .saaspricing-table .saaspricing-cell-icon i' => 'margin-right: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .saaspricing-table .saaspricing-cell-icon svg' => 'margin-right: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_feature_cell',
                [
                    'label' => esc_html__( 'Feature Text', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before'
                ]
            );

            $this->add_group_control(
                 Group_Control_Typography::get_type(),
                [
                    'name' => 'saasp_comparison_feature_cell_typography',
                    'selector' => '{{WRAPPER}} .saaspricing-cell .saaspricing-cell-text',
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_feature_cell_padding',
                [
                    'label' => esc_html__( 'Padding', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-feature-list td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_feature_column_one_cell',
                [
                    'label' => esc_html__( 'Column One', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );
            
            $this->add_control(
                'saasp_comparison_column_one_cell_color',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table tr td:nth-child(2) .saaspricing-cell-text' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_features_column_one_icon_color',
                [
                    'label' => esc_html__( 'Icon Color', 'saaspricing' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table tr td:nth-child(2) .saaspricing-cell-icon i' => 'color: {{VALUE}} ',
                        '{{WRAPPER}} .saaspricing-table tr td:nth-child(2) .saaspricing-cell-icon svg' => 'fill: {{VALUE}} ',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_feature_column_two_cell',
                [
                    'label' => esc_html__( 'Column Two', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );
            
            $this->add_control(
                'saasp_comparison_column_two_cell_color',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table tr td:nth-child(3) .saaspricing-cell-text' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_features_column_two_icon_color',
                [
                    'label' => esc_html__( 'Icon Color', 'saaspricing' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table tr td:nth-child(3) .saaspricing-cell-icon i' => 'color: {{VALUE}} ',
                        '{{WRAPPER}} .saaspricing-table tr td:nth-child(3) .saaspricing-cell-icon svg' => 'fill: {{VALUE}} ',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_feature_column_three_cell',
                [
                    'label' => esc_html__( 'Column Three', 'saaspricing' ), 
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );
            
            $this->add_control(
                'saasp_comparison_column_three_cell_color',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .saaspricing-table tr td:nth-child(4) .saaspricing-cell-text' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_features_column_three_icon_color',
                [
                    'label' => esc_html__( 'Icon Color', 'saaspricing' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table tr td:nth-child(4) .saaspricing-cell-icon i' => 'color: {{VALUE}} ',
                        '{{WRAPPER}} .saaspricing-table tr td:nth-child(4) .saaspricing-cell-icon svg' => 'fill: {{VALUE}} ',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->end_controls_section();
    }
}

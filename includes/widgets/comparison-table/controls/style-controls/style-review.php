<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait Saasp_Comparison_Style_Review_Controls {

    protected function register_style_review_controls() {

            $this->start_controls_section(
                'saasp_comparison_style_header_review_section',
                [
                    'label' => esc_html__( 'Review', 'saaspricing' ),
                    'tab' =>Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'saaspricing_review_text_typography',
                    'selector' => '{{WRAPPER}} .saaspricing-review-text',
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_header_review_spacing',
                [
                    'label' => esc_html__( 'Spacing', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 20,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-ratings span:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_review_padding',
                [
                    'label' => esc_html__( 'Padding', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-star-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_reveiw_color',
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
                'saasp_comparison_column_one_review_color',
                [
                    'label' => esc_html__( 'Review Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(2) .saaspricing-icons i::after' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(2) .saaspricing-icons-half i::after' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_unmark_color',
                [
                    'label' => esc_html__( 'Unmark Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(2) .saaspricing-icons-none i' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(2) .saaspricing-icons-half i' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_review_text_color',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(2) .saaspricing-review-text' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_reveiw_color',
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
                'saasp_comparison_column_two_review_color',
                [
                    'label' => esc_html__( 'Review Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(3) .saaspricing-icons i::after' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(3) .saaspricing-icons-half i::after' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_unmark_color',
                [
                    'label' => esc_html__( 'Unmark Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(3) .saaspricing-icons-none i' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(3) .saaspricing-icons-half i' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_review_text_color',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(3) .saaspricing-review-text' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_reveiw_color',
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
                'saasp_comparison_column_three_review_color',
                [
                    'label' => esc_html__( 'Review Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(4) .saaspricing-icons i::after' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(4) .saaspricing-icons-half i::after' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_unmark_color',
                [
                    'label' => esc_html__( 'Unmark Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(4) .saaspricing-icons-none i' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(4) .saaspricing-icons-half i' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_review_text_color',
                [
                    'label' => esc_html__( 'Text Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(4) .saaspricing-review-text' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->end_controls_section();
    }
}

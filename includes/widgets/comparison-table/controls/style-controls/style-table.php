<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait Saasp_Comparison_Style_Table_Controls {

    protected function register_style_table_controls() {

            $this->start_controls_section(
                'saasp_comparison_table_section',
                [
                    'label' => esc_html__( 'Table', 'saaspricing' ),
                    'tab' =>Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'saasp_comparison_table_background_color',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .saaspricing-table-background' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_table_padding',
                [
                    'label' => esc_html__( 'Padding', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table-title-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_table_title',
                [
                    'label' => esc_html__( 'Table Title', 'saaspricing' ),
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before'
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'saasp_comparison_table_title_typography',
                    'selector' => '{{WRAPPER}} .saaspricing-table-title-description .saaspricing-table-title',
                ]
            );
            
            $this->add_control(
                'saasp_comparison_table_title_color',
                [
                    'label' => esc_html__( 'Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table-title-description .saaspricing-table-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_table_title_distance',
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
                        'size' => 10,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-table-title' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_table_description',
                [
                    'label' => esc_html__( 'Table Description', 'saaspricing' ),
                    'type' =>  Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'saasp_comparison_table_description_typography',
                    'selector' => '{{WRAPPER}} .saaspricing-table-title-description .saaspricing-table-description',
                ]
            );
            
            $this->add_control(
                'saasp_comparison_table_description_color',
                [
                    'label' => esc_html__( 'Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table-title-description .saaspricing-table-description' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_table_description_distance',
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
                        '{{WRAPPER}} .saaspricing-table-description' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_table_border',
                [
                    'label' => esc_html__( 'Table Border', 'saaspricing' ),
                    'type' =>  Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'saasp_comparison_table_border_column_weight',
                [
                    'label' => esc_html__( 'Feature Inner Row Width', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 10,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' =>0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-feature-main' => 'border: {{SIZE}}{{UNIT}} solid;',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_table_column_border_weight',
                [
                    'label' => esc_html__( 'Row Width', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 10,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' =>0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-cell' => 'border-bottom: {{SIZE}}{{UNIT}} solid; border-top: {{SIZE}}{{UNIT}} solid;',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_table_row_border_weight',
                [
                    'label' => esc_html__( 'Column Width', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 10,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' =>0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} td.saaspricing-ribbon-wrapper.saaspricing-common-ribbon.saaspricing-comparison-header-alignment' => 'border-top: {{SIZE}}{{UNIT}} solid; border-left: {{SIZE}}{{UNIT}} solid; border-right: {{SIZE}}{{UNIT}} solid;',
                        '{{WRAPPER}} td.saaspricing-price.saaspricing-original-price.saaspricing-comparison-header-alignment' => 'border-top: {{SIZE}}{{UNIT}} solid; border-bottom: {{SIZE}}{{UNIT}} solid;',
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table .saaspricing-footer-cta' => 'border-top: {{SIZE}}{{UNIT}} solid;',
                        '{{WRAPPER}} td.saaspricing-price.saaspricing-original-price.saaspricing-comparison-header-alignment' => 'border-left: {{SIZE}}{{UNIT}} solid; border-right: {{SIZE}}{{UNIT}} solid;',
                        '{{WRAPPER}} td.saaspricing-table-head.saaspricing-comparison-header-alignment' => 'border-left: {{SIZE}}{{UNIT}} solid; border-right: {{SIZE}}{{UNIT}} solid; border-top: {{SIZE}}{{UNIT}} solid; border-bottom: {{SIZE}}{{UNIT}} solid;',
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table .saaspricing-footer-cta' => 'border-left: {{SIZE}}{{UNIT}} solid; border-right: {{SIZE}}{{UNIT}} solid; border-bottom: {{SIZE}}{{UNIT}} solid;',
                        '{{WRAPPER}} td.saaspricing-ribbon-wrapper.saaspricing-common-ribbon.saaspricing-comparison-header-alignment' => 'border-left: {{SIZE}}{{UNIT}} solid; border-right: {{SIZE}}{{UNIT}} solid; border-top: {{SIZE}}{{UNIT}} solid;',
                        '{{WRAPPER}} .saaspricing-table .saaspricing-cell' => 'border-left: {{SIZE}}{{UNIT}} solid; border-right: {{SIZE}}{{UNIT}} solid;',
                        '{{WRAPPER}} .saaspricing-table tr td:first-child' => 'border-left: {{SIZE}}{{UNIT}} solid; border-right: {{SIZE}}{{UNIT}} solid;',
                        '{{WRAPPER}} tr.saaspricing-price-table-head.saaspricing-table-background td.saaspricing-blank:first-child' => 'border-top: {{SIZE}}{{UNIT}} solid;',
                        '{{WRAPPER}} td.saaspricing-ribbon-wrapper.saaspricing-common-ribbon.saaspricing-comparison-header-alignment' => 'border-top: {{SIZE}}{{UNIT}} solid; border-left: {{SIZE}}{{UNIT}} solid; border-right: {{SIZE}}{{UNIT}} solid;',
                        '{{WRAPPER}} .saaspricing-cta-main td.saaspricing-blank' => 'border-bottom: {{SIZE}}{{UNIT}} solid;',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_table_golbal_border_color',
                [
                    'label' => esc_html__( 'Border Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .saaspricing-table td.saaspricing-price.saaspricing-original-price.saaspricing-comparison-header-alignment' => 'border-color:{{VALUE}} !important;',
                        '{{WRAPPER}}  .saaspricing-table td.saaspricing-table-head.saaspricing-comparison-header-alignment' => 'border-color: {{VALUE}} !important',
                        '{{WRAPPER}}  .saaspricing-main .saaspricing-table .saaspricing-footer-cta' => 'border-color: {{VALUE}} !important',
                        '{{WRAPPER}}  .saaspricing-table .saaspricing-cell' => 'border-color: {{VALUE}} !important',
                        '{{WRAPPER}}  .saaspricing-table tr td:first-child' => 'border-color: {{VALUE}} !important',
                        '{{WRAPPER}}  .saaspricing-table tr.saaspricing-price-table-head.saaspricing-table-background td.saaspricing-blank:first-child' => 'border-color: {{VALUE}} !important',
                        '{{WRAPPER}}  .saaspricing-table .saaspricing-cta-main td.saaspricing-blank' => 'border-color: {{VALUE}} !important',
                        '{{WRAPPER}}  .saaspricing-table .saaspricing-table .saaspricing-feature-main' => 'border-color: {{VALUE}} !important',
                        '{{WRAPPER}}  .saaspricing-table td.saaspricing-ribbon-wrapper.saaspricing-common-ribbon.saaspricing-comparison-header-alignment' => 'border-color: {{VALUE}} !important',

                    ],
                ]
            );

            $this->end_controls_section();
    }
}

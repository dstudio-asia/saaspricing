<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait Saasp_Comparison_Style_Pricing_Controls {

    protected function register_style_pricing_controls() {

            $this->start_controls_section(
                'saasp_comparison_style_header_pricing_section',
                [
                    'label' => esc_html__( 'Pricing', 'saaspricing' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                 [
                     'name' => 'saasp_comparison_pricing_text_typography',
                     'selector' => '{{WRAPPER}} .saaspricing-price-typography',
                     'separator'=>'after'
                 ]
             );

            $this->add_responsive_control(
                'saasp_comparison_original_price_padding',
                [
                    'label' => esc_html__( 'Padding', 'saaspricing' ),
                    'type' =>  Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_pricing',
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
                'saasp_comparison_column_one_pricing_color',
                [
                    'label' => esc_html__( 'Price Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(2) .saaspricing-price-text' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_original_price_color',
                [
                    'label' => esc_html__( 'Original Price Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(2) .saaspricing-original-slashed-price' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_sale_1' => 'yes',
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_period_color',
                [
                    'label' => esc_html__( 'Period Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(2) .saaspricing-period' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_one_pricing_background',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(2)' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['1','2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_pricing',
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
                'saasp_comparison_column_two_pricing_color',
                [
                    'label' => esc_html__( 'Price Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(3) .saaspricing-price-text' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_original_price_color',
                [
                    'label' => esc_html__( 'Original Price Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(3) .saaspricing-original-slashed-price' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_sale_2' => 'yes',
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_period_color',
                [
                    'label' => esc_html__( 'Period Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(3) .saaspricing-period' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_two_pricing_background',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(3)' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_pricing',
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
                'saasp_comparison_column_three_pricing_color',
                [
                    'label' => esc_html__( 'Price Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(4) .saaspricing-price-text' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_original_price_color',
                [
                    'label' => esc_html__( 'Original Price Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(4) .saaspricing-original-slashed-price' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_sale_1' => 'yes',
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_period_color',
                [
                    'label' => esc_html__( 'Period Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(4) .saaspricing-period' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_column_three_pricing_background',
                [
                    'label' => esc_html__( 'Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-main .saaspricing-table .saaspricing-original-price:nth-child(4)' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_pricing_currency_symbol',
                [
                    'label' => esc_html__( 'Currency Symbol', 'saaspricing' ),
                    'type' => Controls_Manager::HEADING,
                    'separator'=>'before'
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_header_pricing_symbol_size',
                [
                    'label' => esc_html__( 'Size', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 42,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-price-symbol' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_pricing_symbol_position',
                [
                    'label' => esc_html__( 'Position', 'saaspricing' ),
                    'type' =>  Controls_Manager::CHOOSE,
                    'options' => [
                        'before' => [
                            'title' => esc_html__( 'Before', 'saaspricing' ),
                            'icon' => 'eicon-h-align-left',
                        ],
                        'after' => [
                            'title' => esc_html__( 'After', 'saaspricing' ),
                            'icon' => 'eicon-h-align-right',
                        ],
                    ],
                    'default' => 'before',
                    'toggle' => true,
                ]
            );

            $this->add_control(
                'saasp_comparison_header_pricing_symbol_vertical_position',
                [
                    'label' => esc_html__( 'Verticle Position', 'saaspricing' ),
                    'type' =>  Controls_Manager::CHOOSE,
                    'options' => [
                        'self-start' => [
                            'title' => esc_html__( 'Top', 'saaspricing' ),
                            'icon' => 'eicon-v-align-top',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Middle', 'saaspricing' ),
                            'icon' => 'eicon-v-align-middle',
                        ],
                        'self-end' => [
                            'title' => esc_html__( 'Bottom', 'saaspricing' ),
                            'icon' => 'eicon-v-align-bottom',
                        ],
                    ],
                    'default' => 'top',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-price-symbol' => 'align-self: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_pricing_fractional_part',
                [
                    'label' => esc_html__( 'Decimal Part', 'saaspricing' ),
                    'type' => Controls_Manager::HEADING,
                    'separator'=>'before'
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_header_fractional_part_size',
                [
                    'label' => esc_html__( 'Size', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 16,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-fraction-price' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_fractional_part_vertical_position',
                [
                    'label' => esc_html__( 'Verticle Position', 'saaspricing' ),
                    'type' =>  Controls_Manager::CHOOSE,
                    'options' => [
                        'self-start' => [
                            'title' => esc_html__( 'Top', 'saaspricing' ),
                            'icon' => 'eicon-v-align-top',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Middle', 'saaspricing' ),
                            'icon' => 'eicon-v-align-middle',
                        ],
                        'self-end' => [
                            'title' => esc_html__( 'Bottom', 'saaspricing' ),
                            'icon' => 'eicon-v-align-bottom',
                        ],
                    ],
                    'default' => 'top',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-fraction-price' => 'align-self: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_original_price_style',
                [
                    'label' => esc_html__( 'Original Price', 'saaspricing' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'saasp_comparison_original_price_typography',
                    'selector' => '{{WRAPPER}} .saaspricing-original-slashed-price',
                ]
            );

            $this->add_control(
                'saasp_comparison_original_price_vertical_position',
                [
                    'label' => esc_html__( 'Vertical Position', 'saaspricing'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'self-start' => [
                            'title' => esc_html__( 'Top', 'saaspricing' ),
                            'icon' => 'eicon-v-align-top',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Middle', 'saaspricing' ),
                            'icon' => 'eicon-v-align-middle',
                        ],
                        'self-end' => [
                            'title' => esc_html__( 'Bottom', 'saaspricing' ),
                            'icon' => 'eicon-v-align-bottom',
                        ],
                    ],
                    'default' => 'bottom',
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-original-slashed-price' => 'align-self: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_pricing_period_style',
                [
                    'label' => esc_html__( 'Period', 'saaspricing' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'saasp_comparison_header_period_typography',
                    'selector' => '{{WRAPPER}} .saaspricing-period',
                ]
            );

            $this->add_control(
                'saasp_comparison_header_period_position',
                [
                    'label' => esc_html__( 'Position', 'saaspricing' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => false,
                    'options' => [
                        'below' => esc_html__( 'Below', 'saaspricing' ),
                        'beside' => esc_html__( 'Beside', 'saaspricing' ),
                    ],
                    'default' => 'beside',
                ]
            );

            $this->end_controls_section();
    }
}

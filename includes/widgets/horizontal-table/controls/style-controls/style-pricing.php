<?php

if (! defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

trait Saasp_Horizontal_Style_Pricing_Controls
{
    protected function register_style_pricing_controls()
    {
    $this->start_controls_section(
        'saasp_horizontal_pricing_style_tab',
        [
            'label' => esc_html__( 'Pricing', 'saaspricing' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
         [
             'name' => 'saasp_horizontal_pricing_text_typography',
             'selector' => '{{WRAPPER}} .saaspricing-horizontal-price-text',
         ]
     );
 
     $this->add_control(
         'saasp_horizontal_price_text_color',
         [
             'label' => esc_html__( 'Color', 'saaspricing' ),
             'type' => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}} .saaspricing-horizontal-price-text' => 'color: {{VALUE}}',
                 '{{WRAPPER}} .saaspricing-fraction-price' => 'color: {{VALUE}}',
             ],
         ]
     );

    $this->add_control(
        'saasp_horizontal_pricing_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saasprcing-horizontal-pricing' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_horizontal_pricing_padding',
        [
            'label' => esc_html__( 'Paddding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saasprcing-horizontal-pricing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_horizontal_pricing_margin',
        [
            'label' => esc_html__( 'Margin', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saasprcing-horizontal-pricing' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_horizontal_pricing_border_control',
            'selector' => '{{WRAPPER}} .saasprcing-horizontal-pricing',
        ]
    );

    $this->add_responsive_control(
        'saasp_horizontal_pricing_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saasprcing-horizontal-pricing' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Box_Shadow::get_type(),
       [
           'name' => 'saasp_horizontal_pricing_section_box_shadow',
           'selector' => '{{WRAPPER}} .saasprcing-horizontal-pricing',
       ]
    );

    $this->add_control(
        'saasp_horizontal_pricing_currency_symbol',
        [
            'label' => esc_html__( 'Currency Symbol', 'saaspricing' ),
            'type' => Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_responsive_control(
        'saasp_horizontal_pricing_symbol_size',
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
                '{{WRAPPER}} .saaspricing-horizontal-symbol' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_pricing_symbol_position',
        [
            'label' => esc_html__( 'Postion', 'saaspricing' ),
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
        'saasp_horizontal_header_pricing_symbol_vertical_position',
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
                '{{WRAPPER}} .saaspricing-horizontal-symbol' => 'align-self: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_header_pricing_fractional_part',
        [
            'label' => esc_html__( 'Decimal Part', 'saaspricing' ),
            'type' => Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_responsive_control(
        'saasp_horizontal_header_fractional_part_size',
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
        'saasp_horizontal_header_fractional_part_vertical_position',
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
        'saasp_horizontal_original_price_style',
        [
            'label' => esc_html__( 'Original Price', 'saaspricing' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_horizontal_original_price_typography',
            'selector' => '{{WRAPPER}} .saaspricing-horizontal-original',
        ]
    );

    $this->add_control(
        'saasp_horizontal_original_price_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-original' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_original_price_vertical_position',
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
                '{{WRAPPER}} .saaspricing-horizontal-original' => 'align-self: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_header_pricing_period_style',
        [
            'label' => esc_html__( 'Period', 'saaspricing' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_horizontal_header_period_typography',
            'selector' => '{{WRAPPER}} .saaspricing-horizontal-period',
        ]
    );

    $this->add_control(
        'saasp_horizontal_header_period_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-horizontal-period' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_horizontal_period_position',
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
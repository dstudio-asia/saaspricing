<?php

use Elementor\Controls_Manager;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait Saasp_Comparison_Content_Columns_Controls {

    protected function register_content_columns_controls() {

            $this->start_controls_section(
                'saasp_comparison_columns_section',
                [
                    'label' => esc_html__( 'Columns', 'saaspricing' ),
                    'tab' => Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'saasp_comparison_select_columns',
                [
                    'label' => esc_html__( 'Select Column', 'saaspricing' ),
                    'type' =>  Controls_Manager::SELECT,
                    'default' => '3',
                    'separator' => 'before',
                    'options' => [
                        '1' => esc_html__( '1', 'saaspricing' ),
                        '2'  => esc_html__( '2', 'saaspricing' ),
                        '3' => esc_html__( '3', 'saaspricing' ),
                    ]
                ]
            );

             $this->add_control(
                'saasp_comparison_column_html_title_tag',
                [
                    'label' => esc_html__( 'Column Title Tag', 'saaspricing' ),
                    'type' =>  Controls_Manager::SELECT,
                    'default' => 'h2',
                    'options' => [
                        'h2' => esc_html__( 'H2', 'saaspricing' ),
                        'h3' => esc_html__( 'H3', 'saaspricing' ),
                        'h4'  => esc_html__( 'H4', 'saaspricing' ),
                        'h5' => esc_html__( 'H5', 'saaspricing' ),
                        'h6' => esc_html__( 'H6', 'saaspricing' ),
                        'span' => esc_html__( 'Span', 'saaspricing' ),
                        'p' => esc_html__( 'P', 'saaspricing' ),
                    ],
                ]
            );

            $this->add_control(
                'sassp_comparison_column_one_combined_alignment',
                [
                    'label' => esc_html__( 'Alignment', 'saaspricing' ),
                    'type' =>  Controls_Manager::CHOOSE,
                    'options' => [
                        'start' => [
                            'title' => esc_html__( 'Left', 'saaspricing' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'saaspricing' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'end' => [
                            'title' => esc_html__( 'Right', 'saaspricing' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'default' => 'center', 
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-comparison-header-alignment' => 'text-align: {{VALUE}}; justify-content: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_content_title_and_description_one',
                [
                    'label' => esc_html__( 'Column One', 'saaspricing' ),
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=>'before',
                ]
            );

            $this->add_control(
                'saasp_comparison_header_title_text_1',
                [
                    'label' => esc_html__( 'Title', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( 'First Head', 'saaspricing' ),
                    'label_block' => false,
                ]
            );

            $this->add_control(
                'saasp_comparison_header_title_description_1',
                [
                    'label' => esc_html__( 'Description', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( 'Enter your description', 'saaspricing' ),
                    'label_block' => false,
                ]
            );

            $this->add_control(
                'saasp_comparison_ribbon_popover_1',
                [
                    'type' => Controls_Manager::POPOVER_TOGGLE,
                    'label' => esc_html__( 'Ribbon', 'saaspricing' ),
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                ]
            ); 

            $this->start_popover();

            $this->add_control(
                'saasp_comparison_show_ribbon_1',
                [
                    'label' => esc_html__( 'Ribbon', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'saasp_comparison_ribbon_title_1',
                [
                    'label' => esc_html__( 'Title', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( 'Most Popular', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_show_ribbon_1' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_show_countdown_1',
                [
                    'label' => esc_html__( 'Countdown', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'saasp_comparison_show_ribbon_1'=>'yes'
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_expire_date_1',
                [
                    'label' => esc_html__( 'Expire Date', 'saaspricing' ),
                    'type' =>  Controls_Manager::DATE_TIME,
                    'label_block' => false,
                    'default'=> gmdate( 'Y-m-d H:i', strtotime("+1 month") ),
                    'condition' => [
                        'saasp_comparison_show_countdown_1' => 'yes',
                        'saasp_comparison_show_ribbon_1' => 'yes',
                    ],
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_image_popover_1',
                [
                    'type' => Controls_Manager::POPOVER_TOGGLE,
                    'label' => esc_html__( 'Image', 'saaspricing' ),
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                ]
            );    

            $this->start_popover();

            $this->add_control(
                'saasp_comparison_choose_media_1',
                [
                    'label' => esc_html__( 'Choose Image', 'saaspricing' ),
                    'type' =>  Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_image_width_media_1',
                [
                    'label' => esc_html__( 'Image Width', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => [ '%'],
                    'range' => [
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-header-image-1' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_media_light_box_1',
                [
                    'label' => esc_html__( 'Light Box', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_image_gap_1',
                [
                    'label' => esc_html__( 'Gap', 'saaspricing' ),
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
                        'size' => 20,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-header-image-1' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_pricing_popover_1',
                [
                    'type' => Controls_Manager::POPOVER_TOGGLE,
                    'label' => esc_html__( 'Pricing', 'saaspricing' ),
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                ]
            );

            $this->start_popover();

            $this->add_control(
                'saasp_comparison_currency_symbol_1',
                [
                    'label' => esc_html__( 'Currency Symbol', 'saaspricing'  ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '' => esc_html__( 'None', 'saaspricing'  ),
                        'dollar' => '&#36; ' . esc_html__( 'Dollar', 'saaspricing'  ),
                        'euro' => '&#128; ' . esc_html__( 'Euro', 'saaspricing'  ),
                        'baht' => '&#3647; ' . esc_html__( 'Baht', 'saaspricing'  ),
                        'franc' => '&#8355; ' . esc_html__( 'Franc', 'saaspricing'  ),
                        'guilder' => '&fnof; ' . esc_html__( 'Guilder', 'saaspricing'  ),
                        'krona' => 'kr ' . esc_html__( 'Krona', 'saaspricing'  ),
                        'lira' => '&#8356; ' . esc_html__( 'Lira', 'saaspricing'  ),
                        'peseta' => '&#8359;' . esc_html__( 'Peseta', 'saaspricing'  ),
                        'peso' => '&#8369; ' . esc_html__( 'Peso', 'saaspricing'  ),
                        'pound' => '&#163; ' . esc_html__( 'Pound Sterling', 'saaspricing'  ),
                        'real' => 'R$ ' . esc_html__( 'Real', 'saaspricing'  ),
                        'ruble' => '&#8381; ' . esc_html__( 'Ruble', 'saaspricing'  ),
                        'rupee' => '&#8360; ' . esc_html__( 'Rupee', 'saaspricing'  ),
                        'indian_rupee' => '&#8377; ' . esc_html__( 'Rupee (Indian)', 'saaspricing'  ),
                        'shekel' => '&#8362; ' . esc_html__( 'Shekel', 'saaspricing'  ),
                        'yen' => '&#165; ' . esc_html__( 'Yen/Yuan', 'saaspricing'  ),
                        'won' => '&#8361; ' . esc_html__( 'Won', 'saaspricing'  ),
                        'custom' => esc_html__( 'Custom', 'saaspricing'  ),
                    ],
                    'default' => 'dollar',
                ]
            );

            $this->add_control(
                'saasp_comparison_currency_symbol_custom_1',
                [
                    'label' => esc_html__( 'Custom Symbol', 'saaspricing'  ),
                    'type' => Controls_Manager::TEXT,
                    'condition' => [
                        'saasp_comparison_currency_symbol_1' => 'custom',
                    ],
                ]
            );

            $this->add_control(
                'sassp_comparison_price_1',
                [
                    'label' => esc_html__( 'Price', 'saaspricing' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '39.99',
                ]
            );

            $this->add_control(
                'saasp_comparison_currency_format_1',
                [
                    'label' => esc_html__( 'Currency Format', 'saaspricing' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => ',',
                    'options' => [
                        ',' => '1.234,56 (Default)',
                        '' => '1,234.56',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_sale_1',
                [
                    'label' => esc_html__( 'Sale', 'saaspricing' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'On', 'saaspricing' ),
                    'label_off' => esc_html__( 'Off', 'saaspricing' ),
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'saasp_comparison_original_price_1',
                [
                    'label' => esc_html__( 'Original Price', 'saaspricing' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => '59',
                    'condition' => [
                        'saasp_comparison_sale_1' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_period_1',
                [
                    'label' => esc_html__( 'Period', 'saaspricing' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__( '/mo', 'saaspricing' ),
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_review_popover_1',
                [
                    'label' => esc_html__( 'Review', 'saaspricing' ),
                    'type' =>  Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                ]
            );

            $this->start_popover();

             $this->add_control(
                'saasp_comparison_show_rating_1',
                [
                    'label' => esc_html__( 'Show Rating', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'saasp_comparison_rating_num_1',
                [
                    'label' => esc_html__( 'Rating', 'saaspricing' ),
                    'type' =>  Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' =>  5,
                    'step' => .5,
                    'default' => 5,
                    'condition' => [
                        'saasp_comparison_show_rating_1' => 'yes',
                    ],
                ]
            );
            
            $this->add_control(
                'saasp_comparison_rating_counter_1',
                [
                    'label' => esc_html__( 'Rating Counter', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( '3k', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_show_rating_1' => 'yes',
                    ],
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_column_one_background_color',
                [
                    'label' => esc_html__( 'Column Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table tr td:nth-child(2)' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_content_title_and_description_two',
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
                'saasp_comparison_header_title_text_2',
                [
                    'label' => esc_html__( 'Title', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( 'Second Head', 'saaspricing' ),
                    'label_block' => false,
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_title_description_2',
                [
                    'label' => esc_html__( 'Description', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( 'Enter your description', 'saaspricing' ),
                    'label_block' => false,
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_ribbon_popover_2',
                [
                    'label' => esc_html__( 'Ribbon', 'saaspricing' ),
                    'type' =>  Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->start_popover();

            $this->add_control(
                'saasp_comparison_show_ribbon_2',
                [
                    'label' => esc_html__( 'Ribbon', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'saasp_comparison_ribbon_title_2',
                [
                    'label' => esc_html__( 'Title', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( 'Most Popular', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_show_ribbon_2' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_show_countdown_2',
                [
                    'label' => esc_html__( 'Countdown', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'saasp_comparison_show_ribbon_2' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_expire_date_2',
                [
                    'label' => esc_html__( 'Expire Date', 'saaspricing' ),
                    'type' =>  Controls_Manager::DATE_TIME,
                    'label_block' => false,
                    'default'=> gmdate( 'Y-m-d H:i', strtotime("+1 month") ),
                    'condition' => [
                        'saasp_comparison_show_countdown_2' => 'yes',
                        'saasp_comparison_show_ribbon_2' => 'yes',
                    ],
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_image_popover_2',
                [
                    'label' => esc_html__( 'Image', 'saaspricing' ),
                    'type' =>  Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->start_popover();

            $this->add_control(
                'saasp_comparison_choose_media_2',
                [
                    'label' => esc_html__( 'Choose Image', 'saaspricing' ),
                    'type' =>  Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_image_width_media_2',
                [
                    'label' => esc_html__( 'Image Width', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => [ '%'],
                    'range' => [
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-header-image-2' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_media_light_box_2',
                [
                    'label' => esc_html__( 'Light Box', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_image_gap_2',
                [
                    'label' => esc_html__( 'Gap', 'saaspricing' ),
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
                        'size' => 20,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-header-image-2' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_pricing_popover_2',
                [
                    'label' => esc_html__( 'Price', 'saaspricing' ),
                    'type' =>  Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->start_popover();

            $this->add_control(
                'saasp_comparison_currency_symbol_2',
                [
                    'label' => esc_html__( 'Currency Symbol', 'saaspricing'  ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '' => esc_html__( 'None', 'saaspricing'  ),
                        'dollar' => '&#36; ' . esc_html__( 'Dollar', 'saaspricing'  ),
                        'euro' => '&#128; ' . esc_html__( 'Euro', 'saaspricing'  ),
                        'baht' => '&#3647; ' . esc_html__( 'Baht', 'saaspricing'  ),
                        'franc' => '&#8355; ' . esc_html__( 'Franc', 'saaspricing'  ),
                        'guilder' => '&fnof; ' . esc_html__( 'Guilder', 'saaspricing'  ),
                        'krona' => 'kr ' . esc_html__( 'Krona', 'saaspricing'  ),
                        'lira' => '&#8356; ' . esc_html__( 'Lira', 'saaspricing'  ),
                        'peseta' => '&#8359;' . esc_html__( 'Peseta', 'saaspricing'  ),
                        'peso' => '&#8369; ' . esc_html__( 'Peso', 'saaspricing'  ),
                        'pound' => '&#163; ' . esc_html__( 'Pound Sterling', 'saaspricing'  ),
                        'real' => 'R$ ' . esc_html__( 'Real', 'saaspricing'  ),
                        'ruble' => '&#8381; ' . esc_html__( 'Ruble', 'saaspricing'  ),
                        'rupee' => '&#8360; ' . esc_html__( 'Rupee', 'saaspricing'  ),
                        'indian_rupee' => '&#8377; ' . esc_html__( 'Rupee (Indian)', 'saaspricing'  ),
                        'shekel' => '&#8362; ' . esc_html__( 'Shekel', 'saaspricing'  ),
                        'yen' => '&#165; ' . esc_html__( 'Yen/Yuan', 'saaspricing'  ),
                        'won' => '&#8361; ' . esc_html__( 'Won', 'saaspricing'  ),
                        'custom' => esc_html__( 'Custom', 'saaspricing'  ),
                    ],
                    'default' => 'dollar',
                ]
            );

            $this->add_control(
                'saasp_comparison_currency_symbol_custom_2',
                [
                    'label' => esc_html__( 'Custom Symbol', 'saaspricing'  ),
                    'type' => Controls_Manager::TEXT,
                    'condition' => [
                        'saasp_comparison_currency_symbol_2' => 'custom',
                    ],
                ]
            );

            $this->add_control(
                'sassp_comparison_price_2',
                [
                    'label' => esc_html__( 'Pricing', 'saaspricing' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '39.99',
                ]
            );

            $this->add_control(
                'saasp_comparison_currency_format_2',
                [
                    'label' => esc_html__( 'Currency Format', 'saaspricing' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => ',',
                    'options' => [
                        ',' => '1.234,56 (Default)',
                        '' => '1,234.56',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_sale_2',
                [
                    'label' => esc_html__( 'Sale', 'saaspricing' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'On', 'saaspricing' ),
                    'label_off' => esc_html__( 'Off', 'saaspricing' ),
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'saasp_comparison_original_price_2',
                [
                    'label' => esc_html__( 'Original Price', 'saaspricing' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => '59',
                    'condition' => [
                        'saasp_comparison_sale_2' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_period_2',
                [
                    'label' => esc_html__( 'Period', 'saaspricing' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__( '/mo', 'saaspricing' ),
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_review_popover_2',
                [
                    'label' => esc_html__( 'Review', 'saaspricing' ),
                    'type' =>  Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->start_popover();

             $this->add_control(
                'saasp_comparison_show_rating_2',
                [
                    'label' => esc_html__( 'Show Rating', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'saasp_comparison_rating_num_2',
                [
                    'label' => esc_html__( 'Rating', 'saaspricing' ),
                    'type' =>  Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' =>  5,
                    'step' => .5,
                    'default' => 5,
                    'condition' => [
                        'saasp_comparison_show_rating_2' => 'yes',
                    ],
                ]
            );
            
            $this->add_control(
                'saasp_comparison_rating_counter_2',
                [
                    'label' => esc_html__( 'Rating Counter', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( '3k', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_show_rating_2' => 'yes',
                    ],
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_column_two_background_color',
                [
                    'label' => esc_html__( 'Column Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table tr td:nth-child(3)' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => ['2','3'],
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_content_title_and_description_three',
                [
                    'label' => esc_html__( 'Column Three', 'saaspricing' ),
                    'type' =>  Controls_Manager::HEADING,
                    'separator'=> 'before',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_title_text_3',
                [
                    'label' => esc_html__( 'Title', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( 'Third Head', 'saaspricing' ),
                    'label_block' => false,
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_header_title_description_3',
                [
                    'label' => esc_html__( 'Description', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( 'Enter your description', 'saaspricing' ),
                    'label_block' => false,
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_ribbon_popover_3',
                [
                    'label' => esc_html__( 'Ribbon', 'saaspricing' ),
                    'type' =>  Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->start_popover();

            $this->add_control(
                'saasp_comparison_show_ribbon_3',
                [
                    'label' => esc_html__( 'Ribbon', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'saasp_comparison_ribbon_title_3',
                [
                    'label' => esc_html__( 'Title', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( 'Most Popular', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_show_ribbon_3' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_show_countdown_3',
                [
                    'label' => esc_html__( 'Countdown', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes', 
                    'default' => 'yes',
                    'condition' => [
                        'saasp_comparison_show_ribbon_3'=>'yes',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_expire_date_3',
                [
                    'label' => esc_html__( 'Expire Date', 'saaspricing' ),
                    'type' =>  Controls_Manager::DATE_TIME,
                    'label_block' => false,
                    'default'=> gmdate( 'Y-m-d H:i', strtotime("+1 month") ),
                    'condition' => [
                        'saasp_comparison_show_countdown_3' => 'yes',
                        'saasp_comparison_show_ribbon_3' => 'yes',
                    ],
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_image_popover_3',
                [
                    'label' => esc_html__( 'Image', 'saaspricing' ),
                    'type' =>  Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->start_popover();

            $this->add_control(
                'saasp_comparison_choose_media_3',
                [
                    'label' => esc_html__( 'Choose Image', 'saaspricing' ),
                    'type' =>  Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_image_width_media_3',
                [
                    'label' => esc_html__( 'Image Width', 'saaspricing' ),
                    'type' =>  Controls_Manager::SLIDER,
                    'size_units' => [ '%'],
                    'range' => [
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-header-image-3' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_media_light_box_3',
                [
                    'label' => esc_html__( 'Light Box', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_responsive_control(
                'saasp_comparison_image_gap_3',
                [
                    'label' => esc_html__( 'Gap', 'saaspricing' ),
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
                        'size' => 20,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table .saaspricing-header-image-3' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_pricing_popover_3',
                [
                    'label' => esc_html__( 'Pricing', 'saaspricing' ),
                    'type' =>  Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->start_popover();

            $this->add_control(
                'saasp_comparison_currency_symbol_3',
                [
                    'label' => esc_html__( 'Currency Symbol', 'saaspricing'  ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '' => esc_html__( 'None', 'saaspricing'  ),
                        'dollar' => '&#36; ' . esc_html__( 'Dollar', 'saaspricing'  ),
                        'euro' => '&#128; ' . esc_html__( 'Euro', 'saaspricing'  ),
                        'baht' => '&#3647; ' . esc_html__( 'Baht', 'saaspricing'  ),
                        'franc' => '&#8355; ' . esc_html__( 'Franc', 'saaspricing'  ),
                        'guilder' => '&fnof; ' . esc_html__( 'Guilder', 'saaspricing'  ),
                        'krona' => 'kr ' . esc_html__( 'Krona', 'saaspricing'  ),
                        'lira' => '&#8356; ' . esc_html__( 'Lira', 'saaspricing'  ),
                        'peseta' => '&#8359;' . esc_html__( 'Peseta', 'saaspricing'  ),
                        'peso' => '&#8369; ' . esc_html__( 'Peso', 'saaspricing'  ),
                        'pound' => '&#163; ' . esc_html__( 'Pound Sterling', 'saaspricing'  ),
                        'real' => 'R$ ' . esc_html__( 'Real', 'saaspricing'  ),
                        'ruble' => '&#8381; ' . esc_html__( 'Ruble', 'saaspricing'  ),
                        'rupee' => '&#8360; ' . esc_html__( 'Rupee', 'saaspricing'  ),
                        'indian_rupee' => '&#8377; ' . esc_html__( 'Rupee (Indian)', 'saaspricing'  ),
                        'shekel' => '&#8362; ' . esc_html__( 'Shekel', 'saaspricing'  ),
                        'yen' => '&#165; ' . esc_html__( 'Yen/Yuan', 'saaspricing'  ),
                        'won' => '&#8361; ' . esc_html__( 'Won', 'saaspricing'  ),
                        'custom' => esc_html__( 'Custom', 'saaspricing'  ),
                    ],
                    'default' => 'dollar',
                ]
            );

            $this->add_control(
                'saasp_comparison_currency_symbol_custom_3',
                [
                    'label' => esc_html__( 'Custom Symbol', 'saaspricing'  ),
                    'type' => Controls_Manager::TEXT,
                    'condition' => [
                        'saasp_comparison_currency_symbol_3' => 'custom',
                    ],
                ]
            );

            $this->add_control(
                'sassp_comparison_price_3',
                [
                    'label' => esc_html__( 'Price', 'saaspricing' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '39.99',
                ]
            );

            $this->add_control(
                'saasp_comparison_currency_format_3',
                [
                    'label' => esc_html__( 'Currency Format', 'saaspricing' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => ',',
                    'options' => [
                        ',' => '1.234,56 (Default)',
                        '' => '1,234.56',
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_sale_3',
                [
                    'label' => esc_html__( 'Sale', 'saaspricing' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'On', 'saaspricing' ),
                    'label_off' => esc_html__( 'Off', 'saaspricing' ),
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'saasp_comparison_original_price_3',
                [
                    'label' => esc_html__( 'Original Price', 'saaspricing' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => '59',
                    'condition' => [
                        'saasp_comparison_sale_3' => 'yes',
                       
                    ],
                ]
            );

            $this->add_control(
                'saasp_comparison_period_3',
                [
                    'label' => esc_html__( 'Period', 'saaspricing' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__( '/mo', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_review_popover_3',
                [
                    'label' => esc_html__( 'Review', 'saaspricing' ),
                    'type' =>  Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'Default', 'saaspricing' ),
                    'label_on' => esc_html__( 'Custom', 'saaspricing' ),
                    'return_value' => 'yes',
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->start_popover();

             $this->add_control(
                'saasp_comparison_show_rating_3',
                [
                    'label' => esc_html__( 'Show Rating', 'saaspricing' ),
                    'type' =>  Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'saaspricing' ),
                    'label_off' => esc_html__( 'Hide', 'saaspricing' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'saasp_comparison_rating_num_3',
                [
                    'label' => esc_html__( 'Rating', 'saaspricing' ),
                    'type' =>  Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' =>  5,
                    'step' => .5,
                    'default' => 5,
                    'condition' => [
                        'saasp_comparison_show_rating_3' => 'yes',
                    ],
                ]
            );
            
            $this->add_control(
                'saasp_comparison_rating_counter_3',
                [
                    'label' => esc_html__( 'Rating Counter', 'saaspricing' ),
                    'type' =>  Controls_Manager::TEXT,
                    'default' => esc_html__( '3k', 'saaspricing' ),
                    'condition' => [
                        'saasp_comparison_show_rating_3' => 'yes',
                    ],
                ]
            );

            $this->end_popover();

            $this->add_control(
                'saasp_comparison_column_three_background_color',
                [
                    'label' => esc_html__( 'Column Background Color', 'saaspricing' ),
                    'type' =>  Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table tr td:nth-child(4)' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'saasp_comparison_select_columns' => '3',
                    ],
                ]
            );

            $this->end_controls_section();
    }
}

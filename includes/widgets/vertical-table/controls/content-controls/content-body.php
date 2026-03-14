<?php

if (! defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;

trait Saasp_Vertical_Content_Body_Controls
{
    protected function register_content_body_controls()
    {
    $this->start_controls_section(
        'saasp_vertical_content_body',
        [
            'label' => esc_html__( 'Body', 'saaspricing' ),
            'tab' =>  Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
    'saasp_vertical_body_pricing_heading',
        [
            'label' => esc_html__( 'Pricing', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
        ]
    );

    $this->add_control(
        'saasp_vertical_currency_symbol',
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
        'saasp_vertical_currency_symbol_custom',
        [
            'label' => esc_html__( 'Custom Symbol', 'saaspricing'  ),
            'type' => Controls_Manager::TEXT,
            'condition' => [
                'saasp_vertical_currency_symbol' => 'custom',
            ],
        ]
    );

    $this->add_control(
        'sassp_vertical_price',
        [
            'label' => esc_html__( 'Price', 'saaspricing' ),
            'type' => Controls_Manager::TEXT,
            'default' => '39.99',
        ]
    );

    $this->add_control(
        'saasp_vertical_currency_format',
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
        'saasp_vertical_sale',
        [
            'label' => esc_html__( 'Sale', 'saaspricing' ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'On', 'saaspricing' ),
            'label_off' => esc_html__( 'Off', 'saaspricing' ),
            'default' => 'no',
        ]
    );

    $this->add_control(
        'saasp_vertical_original_price',
        [
            'label' => esc_html__( 'Original Price', 'saaspricing' ),
            'type' => Controls_Manager::NUMBER,
            'default' => '59',
            'condition' => [
                'saasp_vertical_sale' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_period',
        [
            'label' => esc_html__( 'Period', 'saaspricing' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( '/mo', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_vertical_show_countdown',
        [
            'label' => esc_html__( 'Countdown', 'saaspricing' ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'saaspricing' ),
            'label_off' => esc_html__( 'Hide', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'no',
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_expire_date',
        [
            'label' => esc_html__( 'Expire Date', 'saaspricing' ),
            'type' =>  Controls_Manager::DATE_TIME,
            'label_block' => false,
            'default'=> gmdate( 'Y-m-d H:i', strtotime("+1 month") ),
            'condition' => [
                'saasp_vertical_show_countdown' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_show_rating',
        [
            'label' => esc_html__( 'Show Rating', 'saaspricing' ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'saaspricing' ),
            'label_off' => esc_html__( 'Hide', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'off',
            'separator' =>'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_rating_num',
        [
            'label' => esc_html__( 'Rating', 'saaspricing' ),
            'type' =>  Controls_Manager::NUMBER,
            'min' => 0,
            'max' =>  5,
            'step' => .5,
            'default' => 5,
            'condition' => [
                'saasp_vertical_show_rating' => 'yes',
            ],
        ]
    );
    
    $this->add_control(
        'saasp_vertical_rating_counter',
        [
            'label' => esc_html__( 'Rating Counter', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '3k', 'saaspricing' ),
            'condition' => [
                'saasp_vertical_show_rating' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_body_alignment',
        [
            'label' => esc_html__( 'Body Alignment', 'saaspricing' ),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => esc_html__( 'Left', 'saaspricing' ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => esc_html__( 'Center', 'saaspricing' ),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => esc_html__( 'Right', 'saaspricing' ),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'default' => 'center',
            'separator' => 'before',
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-body-alignment' => 'text-align: {{VALUE}}; justify-content: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();
    }
}
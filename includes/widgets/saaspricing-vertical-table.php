<?php
 // Elementor Classes

 use Elementor\Controls_Manager;
 use Elementor\Group_Control_Typography;
 use Elementor\Group_Control_Box_Shadow;
 use \Elementor\Group_Control_Border;
 use \Elementor\Icons_Manager;
 use \Elementor\Widget_Base;
 use \Elementor\Repeater;
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Saasp_Vertical
 */

class Saasp_Vertical extends Widget_Base {

public function get_name() {
    return 'saasp-vertical';
}

public function get_title() {
    return esc_html__( 'Vertical Pricing Table', 'saaspricing' );
}

public function get_icon() {
    return 'eicon-price-table';
}

public function get_categories() {
    return ['saas_pricing_category'];
}

public function get_keywords() {
    return [ 'pricing', 'tables' , 'saaspricing', 'verticle'];
}

public function saasp_allowed_tags(){
    
    $saasp_allowed_html_tags = array(
		'a' => array(
			'class' => array(),
			'href'  => array(),
			'rel'   => array(),
			'title' => array(),
		),
		'abbr' => array(
			'title' => array(),
		),
		'b' => array(),
		'blockquote' => array(
			'cite'  => array(),
		),
		'cite' => array(
			'title' => array(),
		),
		'code' => array(),
		'del' => array(
			'datetime' => array(),
			'title' => array(),
		),
		'dd' => array(),
		'div' => array(
			'class' => array(),
			'title' => array(),
			'style' => array(),
		),
		'dl' => array(),
		'dt' => array(),
		'em' => array(),
		'h1' => array(),
		'h2' => array(),
		'h3' => array(),
		'h4' => array(),
		'h5' => array(),
		'h6' => array(),
		'i' => array(),
		'img' => array(
			'alt'    => array(),
			'class'  => array(),
			'height' => array(),
			'src'    => array(),
			'width'  => array(),
		),
		'li' => array(
			'class' => array(),
		),
		'ol' => array(
			'class' => array(),
		),
		'p' => array(
			'class' => array(),
		),
		'q' => array(
			'cite' => array(),
			'title' => array(),
		),
		'span' => array(
			'class' => array(),
			'title' => array(),
			'style' => array(),
		),
		'strike' => array(),
		'strong' => array(),
		'ul' => array(
			'class' => array(),
		),
	);
	
	return $saasp_allowed_html_tags;
}

protected function register_controls() {
 
    $this->start_controls_section(
        'saasp_vertical_content_header',
        [
            'label' => esc_html__( 'Header', 'saaspricing' ),
            'tab' =>  Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'saasp_vertical_icon',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
            'type' =>  Controls_Manager::ICONS,
        ]
    );

    $this->add_control(
        'saasp_vertical_header_title',
        [
            'label' => esc_html__( 'Title', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter Your Title', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_vertical_header_description',
        [
            'label' => esc_html__( 'Description', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter Your Description', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_vertical_header_title_tag',
        [
            'label' => esc_html__( 'Title HTML Tag', 'saaspricing' ),
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
        'saasp_vertical_show_ribbon',
        [
            'label' => esc_html__( 'Ribbon', 'saaspricing' ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'saaspricing' ),
            'label_off' => esc_html__( 'Hide', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->add_control(
        'saasp_vertical_ribbon_title',
        [
            'label' => esc_html__( 'Title', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Popular', 'saaspricing' ),
            'condition' => [
                'saasp_vertical_show_ribbon' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'sassp_vertical_ribbon_alignment',
        [
            'label' => esc_html__( 'Header Alignment', 'saaspricing' ),
            'type' =>  Controls_Manager::CHOOSE,
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
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-header-alignment' => 'text-align: {{VALUE}};',
            ],
        ]
    );
    
    $this->end_controls_section();

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
                'dollar' => '&#36; ' . esc_html__( 'Dollar', 'Currency', 'saaspricing'  ),
                'euro' => '&#128; ' . esc_html__( 'Euro', 'Currency', 'saaspricing'  ),
                'baht' => '&#3647; ' . esc_html__( 'Baht', 'Currency', 'saaspricing'  ),
                'franc' => '&#8355; ' . esc_html__( 'Franc', 'Currency', 'saaspricing'  ),
                'guilder' => '&fnof; ' . esc_html__( 'Guilder', 'Currency', 'saaspricing'  ),
                'krona' => 'kr' . esc_html__( 'Krona', 'Currency', 'saaspricing'  ),
                'lira' => '&#8356; ' . esc_html__( 'Lira', 'Currency', 'saaspricing'  ),
                'peseta' => '&#8359;' . esc_html__( 'Peseta', 'Currency', 'saaspricing'  ),
                'peso' => '&#8369; ' . esc_html__( 'Peso', 'Currency', 'saaspricing'  ),
                'pound' => '&#163; ' . esc_html__( 'Pound Sterling', 'Currency', 'saaspricing'  ),
                'real' => 'R$ ' . esc_html__( 'Real', 'Currency', 'saaspricing'  ),
                'ruble' => '&#8381; ' . esc_html__( 'Ruble', 'Currency', 'saaspricing'  ),
                'rupee' => '&#8360; ' . esc_html__( 'Rupee', 'Currency', 'saaspricing'  ),
                'indian_rupee' => '&#8377; ' . esc_html__( 'Rupee (Indian)', 'Currency', 'saaspricing'  ),
                'shekel' => '&#8362; ' . esc_html__( 'Shekel', 'Currency', 'saaspricing'  ),
                'yen' => '&#165; ' . esc_html__( 'Yen/Yuan', 'Currency', 'saaspricing'  ),
                'won' => '&#8361; ' . esc_html__( 'Won', 'Currency', 'saaspricing'  ),
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
                '' => '1,234.56 (Default)',
                ',' => '1.234,56',
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
            'default'=> esc_html__('2023-01-01 12:00', 'saaspricing'),
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

    $this->start_controls_section(
        'saasp_vertical_content_features',
        [
            'label' => esc_html__( 'Features', 'saaspricing' ),
            'tab' =>  Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'saasp_vertical_features_title',
        [
            'label' => esc_html__( 'Feature Title', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter Title', 'saaspricing' ),
        ]
    );

    $saasp_vertical_features = new Repeater();

        $saasp_vertical_features->add_control(
            'saasp_vertical_features_icon',
            [
                'label' => esc_html__( 'Icon', 'saaspricing' ),
                'type' =>  Controls_Manager::ICONS,
                'skin' => 'inline',
                'default' => [
                    'value' => 'fas fa-check',
                    'library' => 'fa-solid',
                ],
                'exclude_inline_options' => [ 'svg' ],
            ]
        );

		$saasp_vertical_features->add_control(
			'saasp_vertical_features_text',
			[
				'label' => esc_html__( 'Text', 'saaspricing' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'Feature Text' , 'saaspricing' ),
				'label_block' => true,
			]
        );

        $saasp_vertical_features->add_control(
            'saasp_vertical_features_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'saaspricing' ),
                'type' =>  Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} svg' => 'color: {{VALUE}}',
                ],
            ]
        );

		$this->add_control(
			'saasp_vertical_features',
			[
				'label' => esc_html__( 'Features', 'saaspricing' ),
				'type' =>  Controls_Manager::REPEATER,
				'fields' => $saasp_vertical_features->get_controls(),
				'default' => [
					[
						'saasp_vertical_features_text' => esc_html__( 'Feature 1', 'saaspricing' ),
					],
					[
						'saasp_vertical_features_text' => esc_html__( 'Feature 2', 'saaspricing' ),
					],
					[
						'saasp_vertical_features_text' => esc_html__( 'Feature 3', 'saaspricing' ),
					],
					[
						'saasp_vertical_features_text' => esc_html__( 'Feature 4', 'saaspricing' ),
					],
					[
						'saasp_vertical_features_text' => esc_html__( 'Feature 5', 'saaspricing' ),
					],
				],
				'title_field' => '{{{ saasp_vertical_features_text }}}',
			]
		);

        $this->add_control(
			'saasp_vertical_features_alignment',
			[
				'label' => esc_html__( 'Alignment', 'saaspricing' ),
				'type' =>  Controls_Manager::CHOOSE,
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
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .saaspricing-vertical-feature' => 'text-align: {{VALUE}};',
				],
			]
		);

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_vertical_content_cta',
        [
            'label' => esc_html__( 'CTA', 'saaspricing' ),
            'tab' =>  Controls_Manager::TAB_CONTENT,
        ]
    );
    
    $this->add_control(
        'saasp_vertical_primary_cta_switch',
        [
            'label' => esc_html__( 'Primary', 'saaspricing' ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'saaspricing' ),
            'label_off' => esc_html__( 'Hide', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_position',
        [
            'label' => esc_html__( 'Position', 'saaspricing' ),
            'type' =>  Controls_Manager::CHOOSE,
            'options' => [
                'top' => [
                    'title' => esc_html__( 'Top', 'saaspricing' ),
                    'icon' => 'eicon-v-align-top',
                ],
                'bottom' => [
                    'title' => esc_html__( 'Bottom', 'saaspricing' ),
                    'icon' => 'eicon-v-align-bottom',
                ],
            ],
            'default' => 'bottom',
            'toggle' => true,
            'condition' =>[
                'saasp_vertical_primary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_text',
        [
            'label' => esc_html__( 'Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Buy Starter', 'saaspricing' ),
            'condition' =>[
                'saasp_vertical_primary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_url',
        [
            'label' => esc_html__( 'Link', 'saaspricing' ),
            'type' =>  Controls_Manager::URL,
            'placeholder' => esc_html__( 'https://your-link.com', 'saaspricing' ),
            'options' => [ 'url', 'is_external', 'nofollow', 'custom_attributes' ],
            'default' => [
                'url' => '',
                'is_external' => true,
                'nofollow' => true,
                'custom_attributes' => '',
            ],
            'label_block' => true,
            'condition' =>[
                'saasp_vertical_primary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_size',
        [
            'label' => esc_html__( 'Size', 'saaspricing' ),
            'type' =>  Controls_Manager::SELECT,
            'default' => 'small',
            'options' => [
                'extra-small' => esc_html__( 'Extra Small', 'saaspricing' ),
                'small'  => esc_html__( 'Small', 'saaspricing' ),
                'medium' => esc_html__( 'Medium', 'saaspricing' ),
                'large' => esc_html__( 'Large', 'saaspricing' ),
                'extra-large' => esc_html__( 'Extra Large', 'saaspricing' ),
            ],
            'condition' =>[
                'saasp_vertical_primary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_icon',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
            'type' =>  Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-arrow-right',
                'library' => 'fa-solid',
            ],
            'recommended' => [
                'fa-solid' => [
                    'circle',
                    'dot-circle',
                    'square-full',
                ],
                'fa-regular' => [
                    'circle',
                    'dot-circle',
                    'square-full',
                ],
            ],
            'condition' =>[
                'saasp_vertical_primary_cta_switch' => 'yes',
            ]
        ]
    );
    
    $this->add_responsive_control(
        'saasp_vertical_primary_cta_icon_spacing',
        [
            'label' => esc_html__( 'Icon Spacing', 'saaspricing' ),
            'type' =>  Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 50,
                    'step' => 1,
                ]
            ],
            'default' => [
                'unit' => 'px',
                'size' => 8,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-spacing' => 'padding-left: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_vertical_primary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_switch',
        [
            'label' => esc_html__( 'Secondary', 'saaspricing' ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'saaspricing' ),
            'label_off' => esc_html__( 'Hide', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'no',
            'separator'=>'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_position',
        [
            'label' => esc_html__( 'Position', 'saaspricing' ),
            'type' =>  Controls_Manager::CHOOSE,
            'options' => [
                'top' => [
                    'title' => esc_html__( 'Top', 'saaspricing' ),
                    'icon' => 'eicon-v-align-top',
                ],
                'bottom' => [
                    'title' => esc_html__( 'Bottom', 'saaspricing' ),
                    'icon' => 'eicon-v-align-bottom',
                ],
            ],
            'default' => 'bottom',
            'toggle' => true,
            'condition' =>[
                'saasp_vertical_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_text',
        [
            'label' => esc_html__( 'Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Learn More', 'saaspricing' ),
            'condition' =>[
                'saasp_vertical_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_url',
        [
            'label' => esc_html__( 'Link', 'saaspricing' ),
            'type' =>  Controls_Manager::URL,
            'placeholder' => esc_html__( 'https://your-link.com', 'saaspricing' ),
            'options' => [ 'url', 'is_external', 'nofollow', 'custom_attributes' ],
            'default' => [
                'url' => '',
                'is_external' => true,
                'nofollow' => true,
                'custom_attributes' => '',
            ],
            'label_block' => true,
            'condition' =>[
                'saasp_vertical_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_size',
        [
            'label' => esc_html__( 'Size', 'saaspricing' ),
            'type' =>  Controls_Manager::SELECT,
            'default' => 'small',
            'options' => [
                'extra-small' => esc_html__( 'Extra Small', 'saaspricing' ),
                'small'  => esc_html__( 'Small', 'saaspricing' ),
                'medium' => esc_html__( 'Medium', 'saaspricing' ),
                'large' => esc_html__( 'Large', 'saaspricing' ),
                'extra-large' => esc_html__( 'Extra Large', 'saaspricing' ),
            ],
            'condition' =>[
                'saasp_vertical_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_icon',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
            'type' =>  Controls_Manager::ICONS,
            'condition' =>[
                'saasp_vertical_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    
    $this->add_responsive_control(
        'saasp_vertical_secondary_cta_icon_spacing',
        [
            'label' => esc_html__( 'Icon Spacing', 'saaspricing' ),
            'type' =>  Controls_Manager::SLIDER,
            'size_units' => [ 'px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 5,
                ]
            ],
            'default' => [
                'unit' => 'px',
                'size' => 10,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-spacing' => 'padding-left: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_vertical_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_cta_alignment',
        [
            'label' => esc_html__( 'CTA Alignment', 'saaspricing' ),
            'type' =>  Controls_Manager::CHOOSE,
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
            'toggle' => true,
            'separator' => 'before',
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-cta-alignment' => 'text-align: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_vertical_header_style_tab',
        [
            'label' => esc_html__( 'Header', 'saaspricing' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_header_icon',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
        ]
    );

    $this->add_control(
        'saasp_vertical_header_icon_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-icon svg' => 'fill: {{VALUE}}; color: {{VALUE}}; border-color: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_header_icon_size',
        [
            'label' => esc_html__( 'Icon Size', 'saaspricing' ),
            'type' =>  Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 50,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-icon' => 'font-size:{{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_header_icon_spacing',
        [
            'label' => esc_html__( 'Icon Spacing', 'saaspricing' ),
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
                'size' => 0,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-icon svg' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_header_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'separator'=>'before',
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-header' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_header_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_header_title_style_heading',
        [
            'label' => esc_html__( 'Title', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_vertical_header_title_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-title' => 'color: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_header_title_typography',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-title',
        ]
    );

    $this->add_control(
        'saasp_vertical_header_description_heading',
        [
            'label' => esc_html__( 'Description', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_vertical_header_des_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-description' => 'color: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_header_des_typography',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-description',
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_vertical_ribbon_style_tab',
        [
            'label' => esc_html__( 'Ribbon', 'saaspricing' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_ribbon_title_heading',
        [
            'label' => esc_html__( 'Title', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
        ]
    );

    $this->add_control(
        'saasp_vertical_ribbon_title_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-ribbon-title small' => 'color: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_ribbon_title_typography',
            'selector' => '{{WRAPPER}} .saaspricing-ribbon-title small',
        ]
    );

    $this->add_control(
        'saasp_vertical_ribbon_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-ribbon' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_vertical_ribbon_border',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-ribbon',
        ]
    );

    $this->add_control(
        'saasp_vertical_ribbon_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-ribbon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_vertical_ribbon_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-ribbon',
        ]
    );

    $this->add_control(
        'saasp_vertical_ribbon_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-ribbon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_vertical_pricing_style_tab',
        [
            'label' => esc_html__( 'Pricing', 'saaspricing' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_pricing_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saasprcing-vertical-pricing' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_pricing_padding',
        [
            'label' => esc_html__( 'Paddding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saasprcing-vertical-pricing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
         Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_vertical_pricing_section_box_shadow',
            'selector' => '{{WRAPPER}} .saasprcing-vertical-pricing',
        ]
    );

    $this->add_control(
        'saasp_vertical_price_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-price-text' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
       Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_pricing_text_typography',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-typography',
        ]
    );

    $this->add_control(
        'saasp_vertical_pricing_currency_symbol',
        [
            'label' => esc_html__( 'Currency Symbol', 'saaspricing' ),
            'type' => Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_pricing_symbol_size',
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
                '{{WRAPPER}} .saaspricing-vertical-symbol' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_pricing_symbol_position',
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
        'saasp_vertical_header_pricing_symbol_vertical_position',
        [
            'label' => esc_html__( 'Vertical Position', 'saaspricing' ),
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
                '{{WRAPPER}} .saaspricing-vertical-symbol' => 'align-self: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_header_pricing_fractional_part',
        [
            'label' => esc_html__( 'Fractional Part', 'saaspricing' ),
            'type' => Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_header_fractional_part_size',
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
        'saasp_vertical_header_fractional_part_vertical_position',
        [
            'label' => esc_html__( 'Vertical Position', 'saaspricing' ),
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
        'saasp_vertical_original_price_style',
        [
            'label' => esc_html__( 'Original Price', 'saaspricing' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_original_price_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-original' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_original_price_typography',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-original',
        ]
    );

    $this->add_control(
        'saasp_vertical_original_price_vertical_position',
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
                '{{WRAPPER}} .saaspricing-vertical-original' => 'align-self: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_header_pricing_period_style',
        [
            'label' => esc_html__( 'Period', 'saaspricing' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_header_period_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-period' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_header_period_typography',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-period',
        ]
    );

    $this->add_control(
        'saasp_vertical_period_position',
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

    $this->start_controls_section(
        'saasp_vertical_countdown_style_tab',
        [
            'label' => esc_html__( 'Countdown', 'saaspricing' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_countdown_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-countdown' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_countdown_text_typography',
            'selector' => '{{WRAPPER}} .saaspricing-countdown',
        ]
    );

    $this->add_control(
        'saasp_vertical_countdown_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-countdown' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_countdown_margin',
        [
            'label' => esc_html__( 'Margin', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-countdown' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_countdown_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-countdown' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_vertical_countdown_border',
            'selector' => '{{WRAPPER}} .saaspricing-countdown',
        ]
    );

    $this->add_control(
        'saasp_vertical_countdown_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-countdown' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_vertical_countdown_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-countdown',
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_vertical_review_section',
        [
            'label' => esc_html__( 'Review', 'saaspricing' ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_review_satar_heading',
        [
            'label' => esc_html__( 'Stars', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_review_spacing',
        [
            'label' => esc_html__( 'Spacing', 'saaspricing' ),
            'type' =>  Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
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
    
    $this->add_control(
        'saasp_vertical_review_star_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-yellow' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_review_unmark_star_color',
        [
            'label' => esc_html__( 'Unmark Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-unmark' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_review_text_heading',
        [
            'label' => esc_html__( 'Text', 'saaspricing' ), 
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_review_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-review-text' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_review_text_typography',
            'selector' => '{{WRAPPER}} .saaspricing-review-text',
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_vertical_features_section',
        [
            'label' => esc_html__( 'Features', 'saaspricing' ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_features_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-feature' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_features_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-feature' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_features_title_heading',
        [
            'label' => esc_html__( 'Title', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_features_title_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-features-title' => 'color: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_features_title_typography',
            'selector' => '{{WRAPPER}} .saaspricing-features-title',
        ]
    );

    $this->add_control(
        'saasp_vertical_features_icon_section',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ), 
            'type' =>  Controls_Manager::HEADING,
            'separator' =>'before',
        ]
    );
    
    $this->add_responsive_control(
        'saaspricing_vertical_features_icon_size',
        [
            'label' => esc_html__( 'Size', 'saaspricing' ),
            'type' =>  Controls_Manager::SLIDER,
            'size_units' => ['px'],
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
                '{{WRAPPER}} .vertical-pricing-card ol svg ' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'saaspricing_vertical_features_icon_spacing',
        [
            'label' => esc_html__( 'Icon Spacing', 'saaspricing' ),
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
                '{{WRAPPER}} .vertical-pricing-card ol svg ' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_features_text_heading',
        [
            'label' => esc_html__( 'Text', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_features_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .vertical-pricing-card ol small' => 'color: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_features_text_typography',
            'selector' => '{{WRAPPER}} .vertical-pricing-card ol small',
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_vertical_cta_section',
        [
            'label' => esc_html__( 'CTA', 'saaspricing' ),
            'tab' =>   Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_section',
        [
            'label' => esc_html__( 'Primary CTA', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->start_controls_tabs(
        'saasp_vertical_primary_cta_hover_normal_text_color'
    );

    $this->start_controls_tab(
        'saasp_vertical_primary_cta_normal_text',
        [
            'label' => esc_html__( 'Normal', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_normal_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-primary' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'saasp_vertical_primary_cta_hover_text',
        [
            'label' => esc_html__( 'Hover', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_hover_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-primary:hover' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->add_group_control(
         Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_primary_cta_typography',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-primary',
        ]
    );

    $this->start_controls_tabs(
        'saasp_vertical_primary_cta_hover_normal_background_color'
    );

    $this->start_controls_tab(
        'saasp_vertical_primary_cta_normal_background',
        [
            'label' => esc_html__( 'Normal', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_normal_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-primary' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'saasp_vertical_primary_cta_hover_background',
        [
            'label' => esc_html__( 'Hover', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_hover_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-primary:hover' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_vertical_primary_cta_border',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-primary',
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-primary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
         Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_vertical_primary_cta_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-primary',
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-primary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_margin',
        [
            'label' => esc_html__( 'Margin', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-primary' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_section',
        [
            'label' => esc_html__( 'Secondary CTA', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->start_controls_tabs(
        'saasp_vertical_secondary_cta_hover_normal_text_color'
    );

    $this->start_controls_tab(
        'saasp_vertical_secondary_cta_normal_text',
        [
            'label' => esc_html__( 'Normal', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_normal_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-secondary' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'saasp_vertical_secondary_cta_hover_text',
        [
            'label' => esc_html__( 'Hover', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_hover_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-secondary:hover' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->add_group_control(
         Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_vertical_secondary_cta_typography',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-secondary',
        ]
    );

    $this->start_controls_tabs(
        'saasp_vertical_secondary_cta_hover_normal_background_color'
    );

    $this->start_controls_tab(
        'saasp_vertical_secondary_cta_normal_background',
        [
            'label' => esc_html__( 'Normal', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_normal_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-secondary' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'saasp_vertical_secondary_cta_hover_background',
        [
            'label' => esc_html__( 'Hover', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_hover_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-secondary:hover' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_vertical_secondary_cta_border',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-secondary',
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-secondary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
         Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_vertical_secondary_cta_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-vertical-secondary',
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-secondary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_margin',
        [
            'label' => esc_html__( 'Margin', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricng-secondary-main' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_cta_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'separator'=>'before',
            'selectors' => [
                '{{WRAPPER}} .saaspricing-card-footer' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_cta_global_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-card-footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_cta_global_margin',
        [
            'label' => esc_html__( 'Margin', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-card-footer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();
}

private function get_currency_symbol( $saasp_symbol_name ) {
    $saasp_symbols = [
        'dollar' => '&#36;',
        'euro' => '&#128;',
        'franc' => '&#8355;',
        'pound' => '&#163;',
        'ruble' => '&#8381;',
        'shekel' => '&#8362;',
        'baht' => '&#3647;',
        'yen' => '&#165;',
        'won' => '&#8361;',
        'guilder' => '&fnof;',
        'peso' => '&#8369;',
        'peseta' => '&#8359;',
        'lira' => '&#8356;',
        'rupee' => '&#8360;',
        'indian_rupee' => '&#8377;',
        'real' => 'R$',
        'krona' => 'kr',
    ];
    return isset( $saasp_symbols[ $saasp_symbol_name ] ) ? $saasp_symbols[ $saasp_symbol_name ] : '';
}

protected function render() {

$settings = $this->get_settings_for_display();

?>
<div class="saaspricing-cards-all">
    <div class="row">   
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="saaspricing-card vertical-pricing-card">
                <?php
                if( 'yes' === $settings['saasp_vertical_show_ribbon'] ){
                ?>
                    <div class="saaspricing-card-header saaspricing-vertical-ribbon">
                        <p class="saaspricing-ribbon-title mb-0 saaspricing-vertical-header-alignment"> 
                            <small>
                                <?php echo esc_html($settings['saasp_vertical_ribbon_title']); ?>
                            </small>
                        </p>
                    </div>
                <?php
                }
                ?>
                <div class="saaspricing-card-body position-relative">
                    <div class="saaspricing-vertical-header saaspricing-vertical-header-alignment 
                    <?php if( 'yes' !== $settings['saasp_vertical_show_ribbon'] ){ echo esc_attr('saaspricing-p-vertical-header');} ?>">
                        <?php
                        if( '' !== $settings['saasp_vertical_icon']['value'] ){
                        ?>
                            <div class="saaspricing-vertical-icon elementor-icon saaspricing-vertical-header-alignment">
                                <?php Icons_Manager::render_icon( $settings['saasp_vertical_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if( '' !== $settings['saasp_vertical_header_title'] ){
                            printf('<%1$s class="card-title saaspricing-vertical-title saaspricing-vertical-header-alignment">%2$s</%1$s>', esc_html($settings['saasp_vertical_header_title_tag']), esc_html($settings['saasp_vertical_header_title']));
                        }
                        ?>
                        <p class="saaspricing-vertical-description saaspricing-vertical-header-alignment">
                            <?php echo esc_html($settings['saasp_vertical_header_description']); ?>
                        </p>
                    </div>

                    <div class="saasprcing-vertical-pricing saaspricing-vertical-body-alignment">
                        <?php
                        if( 'none' !== $settings['saasp_vertical_currency_symbol'] && 'yes' === $settings['saasp_vertical_sale'] ){
                        ?>
                            <del class="saaspricing-vertical-original"> 
                                <span>
                                    <?php
                                    if( 'custom' !== $settings['saasp_vertical_currency_symbol'] ){
                                        echo esc_html($this->get_currency_symbol($settings['saasp_vertical_currency_symbol']));
                                    }else{
                                        echo esc_html($settings['saasp_vertical_currency_symbol_custom']);
                                    }
                                    ?>
                                    <?php
                                    if( '' !== $settings['saasp_vertical_original_price'] ){
                                    ?>
                                        <span class="fw-bold">
                                            <?php echo esc_html($settings['saasp_vertical_original_price']); ?>
                                        </span>
                                    <?php
                                    }
                                    ?> 
                                </span>
                            </del>
                        <?php
                        }
                        ?>

                        <?php
                        if( 'before' === $settings['saasp_vertical_pricing_symbol_position'] ){
                        ?>
                            <span class="saaspricing-vertical-symbol saaspricing-vertical-price-text">
                                <?php
                                if( 'custom' !== $settings['saasp_vertical_currency_symbol'] ){
                                    echo esc_html($this->get_currency_symbol($settings['saasp_vertical_currency_symbol']));
                                }else{
                                    echo esc_html($settings['saasp_vertical_currency_symbol_custom']);
                                }
                                ?>
                            </span>
                        <?php
                        }
                        ?>
                        <?php
                        if( '' === $settings['saasp_vertical_currency_format'] ){ 
                        ?>
                            <span class="saaspricing-vertical-price saaspricing-vertical-typography saaspricing-vertical-price-text">
                                <?php echo esc_html(explode(".", $settings['sassp_vertical_price'])[0]); ?>
                            </span>
                            <?php
                            if( '' !== explode(".", $settings['sassp_vertical_price'])[1] ){
                            ?>
                                <span class="saaspricing-fraction-price saaspricing-vertical-price-text">
                                    <?php echo esc_html(explode(".", $settings['sassp_vertical_price'])[1]); ?>
                                </span>
                        <?php
                            }
                        }else{
                        ?>
                            <span class="saaspricing-vertical-price saaspricing-vertical-typography saaspricing-vertical-price-text">
                                <?php echo esc_html($settings['sassp_vertical_price']); ?>
                            </span>
                        <?php
                        }
                        ?>
                        <?php
                        if( 'after' === $settings['saasp_vertical_pricing_symbol_position'] ){
                        ?>
                            <span class="saaspricing-vertical-symbol saaspricing-vertical-price-text">
                                <?php
                                if( 'custom' !== $settings['saasp_vertical_currency_symbol'] ){
                                    echo esc_html($this->get_currency_symbol($settings['saasp_vertical_currency_symbol']));
                                }else{
                                    echo esc_html($settings['saasp_vertical_currency_symbol_custom']);
                                }
                                ?>
                            </span>
                        <?php
                        }
                        ?>
                        <?php
                        if( '' !== $settings['saasp_vertical_period'] ){
                        ?>
                            <span class="saaspricing-vertical-period saaspricing-vertical-body-alignment
                                <?php if( 'below' === $settings['saasp_vertical_period_position'] ){ echo esc_attr('w-100 mt-1'); } ?>">
                                <?php echo esc_html($settings['saasp_vertical_period']);?>
                            </span>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    if( 'yes' === $settings['saasp_vertical_show_countdown'] &&  '' !== $settings['saasp_vertical_show_countdown'] ){
                    ?>
                        <div class="saaspricing-vertical-countdown saaspricing-vertical-body-alignment">
                            <span class="saaspricing-countdown"
                            data-countdown-index="0"
                            data-expire-date="<?php echo esc_attr($settings['saasp_vertical_expire_date']); ?>">
                            </span>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if( 'yes' === $settings['saasp_vertical_show_rating'] && '' !== $settings['saasp_vertical_rating_num'] ){
                    ?>
                        <div class="saaspricing-ratings saaspricing-vertical-ratings saaspricing-vertical-body-alignment">
                            <div class="saaspricing-star-icon fs-6"> 
                                <?php                                    
                                $saasp_rating = $settings['saasp_vertical_rating_num'];
                                $saasp_full_stars = floor( $saasp_rating);
                                $saasp_half_star = $saasp_rating - $saasp_full_stars;

                                for ($k = 0; $k <  $saasp_full_stars; $k++) {
                                ?>
                                    <span>
                                        <i class="fas fa-star-half saaspricing-star-left saaspricing-yellow"></i>
                                        <i class="fas fa-star-half saaspricing-star-right saaspricing-yellow"></i>
                                    </span>
                                <?php
                                }
                                if ($saasp_half_star >= 0.5) {
                                ?>
                                    <span>
                                        <i class="fas fa-star-half saaspricing-star-left saaspricing-yellow"></i>
                                        <i class="fas fa-star-half saaspricing-star-right saaspricing-unmark"></i>
                                    </span>
                                <?php
                                }
                                ?>
                                <?php
                                for($j=0; $j < 5 - ceil($settings['saasp_vertical_rating_num']); $j++){
                                ?>
                                    <span>
                                        <i class="fas fa-star-half saaspricing-star-left saaspricing-unmark"></i>
                                        <i class="fas fa-star-half saaspricing-star-right saaspricing-unmark"></i>
                                    </span>
                                <?php
                                }
                                ?>
                                <?php
                                if( '' !== $settings['saasp_vertical_rating_counter'] ){
                                ?>
                                    <small class="saaspricing-review-text"> 
                                        <?php echo esc_html__('(','saaspricing') . esc_html($settings['saasp_vertical_rating_counter']) . esc_html__(')','saaspricing'); ?> 
                                    </small>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if( 'top' === $settings['saasp_vertical_primary_cta_position'] || 'top' === $settings['saasp_vertical_secondary_cta_position'] ){
                    ?>
                        <div class="saaspricing-cta-card saaspricing-vertical-cta-alignment">
                        <?php
                        if( 'yes' === $settings['saasp_vertical_primary_cta_switch'] && '' !== $settings['saasp_vertical_primary_cta_text'] 
                        && 'top' === $settings['saasp_vertical_primary_cta_position'] ){
                            if ( ! empty( $settings['saasp_vertical_primary_cta_url']['url'] ) ) {
                                $this->add_link_attributes( 'saasp_vertical_primary_cta_url', $settings['saasp_vertical_primary_cta_url'] );
                            }
                        ?>
                            <a class="btn saaspricing-vertical-primary <?php
                            if( 'extra-small' === $settings['saasp_vertical_primary_cta_size'] ){
                            echo esc_attr('saaspricing-xsm-btn');
                            }elseif( 'small' === $settings['saasp_vertical_primary_cta_size'] ){
                            echo esc_attr('saaspricing-sm-btn');
                            }
                            elseif( 'medium' === $settings['saasp_vertical_primary_cta_size'] ){
                            echo esc_attr('saaspricing-m-btn');
                            }
                            elseif( 'large' === $settings['saasp_vertical_primary_cta_size'] ){
                            echo esc_attr('saaspricing-l-btn');
                            }
                            elseif( 'extra-large' === $settings['saasp_vertical_primary_cta_size'] ){
                            echo esc_attr('saaspricing-xl-btn');
                            }
                            ?>" 
                            <?php
                            echo wp_kses($this->get_render_attribute_string( 'saasp_vertical_primary_cta_url'), $this->saasp_allowed_tags()); 
                            ?>>
                                <?php echo esc_html($settings['saasp_vertical_primary_cta_text']); ?> 
                                <span class="saaspricing-primary-spacing"> 
                                    <?php Icons_Manager::render_icon( $settings['saasp_vertical_primary_cta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                </span>
                            </a>
                        <?php
                        }
                        ?>
                        <?php
                        if( 'yes' === $settings['saasp_vertical_secondary_cta_switch'] && '' !== $settings['saasp_vertical_secondary_cta_text'] &&
                        'top' === $settings['saasp_vertical_secondary_cta_position'] ){
                            if ( ! empty( $settings['saasp_vertical_secondary_cta_url']['url'] ) ) {
                                $this->add_link_attributes( 'saasp_vertical_secondary_cta_url', $settings['saasp_vertical_secondary_cta_url'] );
                            }
                        ?>
                            <div class="saaspricng-secondary-main">
                                <a class="btn saaspricing-vertical-secondary <?php
                                if( 'extra-small' === $settings['saasp_vertical_secondary_cta_size'] ){
                                echo esc_attr('saaspricing-xsm-btn');
                                }elseif( 'small' === $settings['saasp_vertical_secondary_cta_size'] ){
                                echo esc_attr('saaspricing-sm-btn');
                                }
                                elseif( 'medium' === $settings['saasp_vertical_secondary_cta_size'] ){
                                echo esc_attr('saaspricing-m-btn');
                                }
                                elseif( 'large' === $settings['saasp_vertical_secondary_cta_size'] ){
                                echo esc_attr('saaspricing-l-btn');
                                }
                                elseif( 'extra-large' === $settings['saasp_vertical_secondary_cta_size'] ){
                                echo esc_attr('saaspricing-xl-btn');
                                }
                                ?>" 
                                <?php
                                echo wp_kses($this->get_render_attribute_string( 'saasp_vertical_secondary_cta_url'), $this->saasp_allowed_tags()); 
                                ?>>
                                    <?php echo esc_html($settings['saasp_vertical_secondary_cta_text']); ?>
                                    <span class="saaspricing-secondary-spacing"> 
                                        <?php Icons_Manager::render_icon( $settings['saasp_vertical_secondary_cta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </span>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                        </div>
                <?php
                }
                ?>
                    <div class="saaspricing-vertical-feature">
                        <?php
                        if( '' !== $settings['saasp_vertical_features_title'] ){
                        ?>
                            <p class="saaspricing-features-title">
                                <?php echo esc_html($settings['saasp_vertical_features_title']); ?>
                            </p>
                        <?php
                        }
                        ?>
                        <ol class="list-unstyled mb-0">
                            <?php
                            if($settings['saasp_vertical_features']){
                             foreach($settings['saasp_vertical_features'] as $saasp_vertical_features){
                            ?>
                                <li class="saaspricing-vertical-margin elementor-repeater-item-<?php echo esc_attr($saasp_vertical_features['_id']); ?>">
                                    <?php Icons_Manager::render_icon( $saasp_vertical_features['saasp_vertical_features_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    <small>
                                        <?php echo esc_html($saasp_vertical_features['saasp_vertical_features_text']); ?>
                                    </small>
                                </li>
                            <?php
                             }
                            }
                            ?>
                        </ol>
                    </div>
                </div>
                <?php
                if( 'top' !== $settings['saasp_vertical_primary_cta_position'] && 'bottom' === $settings['saasp_vertical_primary_cta_position']
                || 'top' !== $settings['saasp_vertical_secondary_cta_position'] && 'bottom' === $settings['saasp_vertical_secondary_cta_position'] ){
                ?>
                    <div class="saaspricing-card-footer saaspricing-vertical-cta-alignment">
                        <?php
                        if( '' !== $settings['saasp_vertical_primary_cta_text'] 
                        && 'bottom' === $settings['saasp_vertical_primary_cta_position'] || empty($settings['saasp_vertical_primary_cta_position']) ){
                            if ( ! empty( $settings['saasp_vertical_primary_cta_url']['url'] ) ) {
                            $this->add_link_attributes( 'saasp_vertical_primary_cta_url', $settings['saasp_vertical_primary_cta_url'] );
                            }
                            if( 'yes' === $settings['saasp_vertical_primary_cta_switch'] ){
                        ?>
                                <a class="btn saaspricing-vertical-primary <?php
                                if( 'extra-small' === $settings['saasp_vertical_primary_cta_size'] ){
                                echo esc_attr('saaspricing-xsm-btn');
                                }elseif( 'small' === $settings['saasp_vertical_primary_cta_size'] ){
                                echo esc_attr('saaspricing-sm-btn');
                                }
                                elseif( 'medium' === $settings['saasp_vertical_primary_cta_size'] ){
                                echo esc_attr('saaspricing-m-btn');
                                }
                                elseif( 'large' === $settings['saasp_vertical_primary_cta_size'] ){
                                echo esc_attr('saaspricing-l-btn');
                                }
                                elseif( 'extra-large' === $settings['saasp_vertical_primary_cta_size'] ){
                                echo esc_attr('saaspricing-xl-btn');
                                }
                                ?>" 
                                <?php 
                                echo wp_kses($this->get_render_attribute_string( 'saasp_vertical_primary_cta_url'), $this->saasp_allowed_tags()); 
                                ?>>
                                    <?php echo esc_html($settings['saasp_vertical_primary_cta_text']); ?> 
                                    <span class="saaspricing-primary-spacing"> 
                                        <?php Icons_Manager::render_icon( $settings['saasp_vertical_primary_cta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </span>
                                </a>
                        <?php
                            }
                        }
                        ?>
                        <?php
                        if( '' !== $settings['saasp_vertical_secondary_cta_text']
                        && 'bottom' === $settings['saasp_vertical_secondary_cta_position'] || empty($settings['saasp_vertical_secondary_cta_position']) ){
                            if ( ! empty( $settings['saasp_vertical_secondary_cta_url']['url'] ) ) {
                                $this->add_link_attributes( 'saasp_vertical_secondary_cta_url', $settings['saasp_vertical_secondary_cta_url'] );
                            }
                            if( 'yes' === $settings['saasp_vertical_secondary_cta_switch'] ){
                        ?>
                                <div class="saaspricng-secondary-main">
                                    <a class="btn saaspricing-vertical-secondary <?php
                                    if( 'extra-small' === $settings['saasp_vertical_secondary_cta_size'] ){
                                    echo esc_attr('saaspricing-xsm-btn');
                                    }elseif( 'small' === $settings['saasp_vertical_secondary_cta_size'] ){
                                    echo esc_attr('saaspricing-sm-btn');
                                    }
                                    elseif( 'medium' === $settings['saasp_vertical_secondary_cta_size'] ){
                                    echo esc_attr('saaspricing-m-btn');
                                    }
                                    elseif( 'large' === $settings['saasp_vertical_secondary_cta_size'] ){
                                    echo esc_attr('saaspricing-l-btn');
                                    }
                                    elseif( 'extra-large' === $settings['saasp_vertical_secondary_cta_size'] ){
                                    echo esc_attr('saaspricing-xl-btn');
                                    }
                                    ?>" 
                                    <?php 
                                    echo wp_kses($this->get_render_attribute_string( 'saasp_vertical_secondary_cta_url'), $this->saasp_allowed_tags()); 
                                    ?>>
                                        <?php echo esc_html($settings['saasp_vertical_secondary_cta_text']); ?>
                                        <span class="saaspricing-secondary-spacing"> 
                                            <?php Icons_Manager::render_icon( $settings['saasp_vertical_secondary_cta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        </span>
                                    </a>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
 }
}
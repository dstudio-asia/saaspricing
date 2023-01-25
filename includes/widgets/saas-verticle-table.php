<?php
/**
 * Class: SaasVerticleTable
 * Name: Saas Verticle Table
 * Slug: saas-pricing
 */

 // Elementor Classes

 use Elementor\Controls_Manager;
 use Elementor\Group_Control_Typography;
 use Elementor\Group_Control_Box_Shadow;
 use \Elementor\Group_Control_Border;
 use \Elementor\Utils;
 use \Elementor\Icons_Manager;
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class SaasVerticleTable
 */

class SaasVerticleTable extends \Elementor\Widget_Base {

public function get_name() {
    return 'saasVerticle';
}

public function get_title() {
    return esc_html__( 'Verticle Pricing Table', SAAS_PRICINNG_TXT_DOMAIN );
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
            'label' => esc_html__( 'Header', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>  Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'saasp_vertical_icon',
        [
            'label' => esc_html__( 'Icon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-circle',
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
        ]
    );

    $this->add_control(
        'saasp_vetical_header_title',
        [
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Saaspricing', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->add_control(
        'saasp_vertical_header_description',
        [
            'label' => esc_html__( 'Description', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter Your Description', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->add_control(
        'saasp_vetical_header_title_tag',
        [
            'label' => esc_html__( 'Title HTML Tag', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SELECT,
            'default' => 'h2',
            'options' => [
                'h2' => esc_html__( 'H2', SAAS_PRICINNG_TXT_DOMAIN ),
                'h3' => esc_html__( 'H3', SAAS_PRICINNG_TXT_DOMAIN ),
                'h4'  => esc_html__( 'H4', SAAS_PRICINNG_TXT_DOMAIN ),
                'h5' => esc_html__( 'H5', SAAS_PRICINNG_TXT_DOMAIN ),
                'h6' => esc_html__( 'H6', SAAS_PRICINNG_TXT_DOMAIN ),
                'span' => esc_html__( 'Span', SAAS_PRICINNG_TXT_DOMAIN ),
                'p' => esc_html__( 'P', SAAS_PRICINNG_TXT_DOMAIN ),
            ],
        ]
    );
    
    $this->add_control(
        'saasp_vertical_show_ribbon',
        [
            'label' => esc_html__( 'Ribbon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->add_control(
        'saasp_vertical_ribbon_title',
        [
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Popular', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_vertical_show_ribbon' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'sassp_vertical_ribbon_alignment',
        [
            'label' => esc_html__( 'Header Alignment', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => esc_html__( 'Left', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => esc_html__( 'Center', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => esc_html__( 'Right', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'default' => 'center', 
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-ribbon-title' => 'text-align: {{VALUE}};',
                '{{WRAPPER}} .saaspricing-vertical-title' => 'text-align: {{VALUE}};',
                '{{WRAPPER}} .saaspricing-vertical-description' => 'text-align: {{VALUE}};',
                '{{WRAPPER}} .saaspricing-vertical-header' => 'text-align: {{VALUE}};',
                '{{WRAPPER}} .saaspricing-vertical-icon' => 'text-align: {{VALUE}};',
            ],
        ]
    );
    
    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_vertical_content_body',
        [
            'label' => esc_html__( 'Body', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>  Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
    'saasp_vetical_body_pricing_heading',
        [
            'label' => esc_html__( 'Pricing', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
        ]
    );

    $this->add_control(
        'saasp_vertical_currency_symbol',
        [
            'label' => esc_html__( 'Currency Symbol', SAAS_PRICINNG_TXT_DOMAIN  ),
            'type' => Controls_Manager::SELECT,
            'options' => [
                '' => esc_html__( 'None', SAAS_PRICINNG_TXT_DOMAIN  ),
                'dollar' => '&#36; ' . esc_html__( 'Dollar', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'euro' => '&#128; ' . esc_html__( 'Euro', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'baht' => '&#3647; ' . esc_html__( 'Baht', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'franc' => '&#8355; ' . esc_html__( 'Franc', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'guilder' => '&fnof; ' . esc_html__( 'Guilder', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'krona' => 'kr' . esc_html__( 'Krona', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'lira' => '&#8356; ' . esc_html__( 'Lira', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'peseta' => '&#8359;' . esc_html__( 'Peseta', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'peso' => '&#8369; ' . esc_html__( 'Peso', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'pound' => '&#163; ' . esc_html__( 'Pound Sterling', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'real' => 'R$ ' . esc_html__( 'Real', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'ruble' => '&#8381; ' . esc_html__( 'Ruble', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'rupee' => '&#8360; ' . esc_html__( 'Rupee', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'indian_rupee' => '&#8377; ' . esc_html__( 'Rupee (Indian)', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'shekel' => '&#8362; ' . esc_html__( 'Shekel', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'yen' => '&#165; ' . esc_html__( 'Yen/Yuan', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'won' => '&#8361; ' . esc_html__( 'Won', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'custom' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN  ),
            ],
            'default' => 'dollar',
        ]
    );

    $this->add_control(
        'saasp_vertical_currency_symbol_custom',
        [
            'label' => esc_html__( 'Custom Symbol', SAAS_PRICINNG_TXT_DOMAIN  ),
            'type' => Controls_Manager::TEXT,
            'condition' => [
                'saasp_vertical_currency_symbol' => 'custom',
            ],
        ]
    );

    $this->add_control(
        'sassp_vertical_price',
        [
            'label' => esc_html__( 'Price', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::TEXT,
            'default' => '39.99',
        ]
    );

    $this->add_control(
        'saasp_vertical_currency_format',
        [
            'label' => esc_html__( 'Currency Format', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Sale', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'On', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Off', SAAS_PRICINNG_TXT_DOMAIN ),
            'default' => 'yes',
        ]
    );

    $this->add_control(
        'saasp_vertical_original_price',
        [
            'label' => esc_html__( 'Original Price', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Period', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( '/mo', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->add_control(
        'saasp_vertical_show_countdown',
        [
            'label' => esc_html__( 'Countdown', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_expire_date',
        [
            'label' => esc_html__( 'Expire Date', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DATE_TIME,
            'label_block' => false,
            'default'=> esc_html__('2023-12-31 12:00', SAAS_PRICINNG_TXT_DOMAIN),
            'condition' => [
                'saasp_vertical_show_countdown' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_show_rating',
        [
            'label' => esc_html__( 'Show Rating', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
            'separator' =>'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_rating_num',
        [
            'label' => esc_html__( 'Rating', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Rating Counter', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '3k', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_vertical_show_rating' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_body_alignment',
        [
            'label' => esc_html__( 'Body Alignment', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => esc_html__( 'Left', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => esc_html__( 'Center', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => esc_html__( 'Right', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'default' => 'center',
            'separator' => 'before',
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-countdown' => 'text-align: {{VALUE}};',
                '{{WRAPPER}} .saaspricing-vertical-ratings' => 'text-align: {{VALUE}};',
                '{{WRAPPER}}  span.saaspricing-vertical-period.w-100.mt-1' => 'text-align: {{VALUE}};',
                '{{WRAPPER}} .saasprcing-vertical-pricing' => 'justify-content: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_vertical_content_features',
        [
            'label' => esc_html__( 'Features', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>  Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'saasp_vetical_features_title',
        [
            'label' => esc_html__( 'Feature Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter Title', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $saasp_vertical_features = new \Elementor\Repeater();

        $saasp_vertical_features->add_control(
            'saasp_vertical_features_icon',
            [
                'label' => esc_html__( 'Icon', SAAS_PRICINNG_TXT_DOMAIN ),
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
				'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'Feature Text' , SAAS_PRICINNG_TXT_DOMAIN ),
				'label_block' => true,
			]
        );

        $saasp_vertical_features->add_control(
            'saasp_vertical_features_icon_color',
            [
                'label' => esc_html__( 'Icon Color', SAAS_PRICINNG_TXT_DOMAIN ),
                'type' =>  Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} svg' => 'color: {{VALUE}}',
                ],
            ]
        );

		$this->add_control(
			'saasp_vertical_features',
			[
				'label' => esc_html__( 'Features', SAAS_PRICINNG_TXT_DOMAIN ),
				'type' =>  Controls_Manager::REPEATER,
				'fields' => $saasp_vertical_features->get_controls(),
				'default' => [
					[
						'saasp_vertical_features_text' => esc_html__( 'Feature One', SAAS_PRICINNG_TXT_DOMAIN ),
					],
					[
						'saasp_vertical_features_text' => esc_html__( 'Feature Two', SAAS_PRICINNG_TXT_DOMAIN ),
					],
					[
						'saasp_vertical_features_text' => esc_html__( 'Feature Three', SAAS_PRICINNG_TXT_DOMAIN ),
					],
				],
				'title_field' => '{{{ saasp_vertical_features_text }}}',
			]
		);

        $this->add_control(
			'saasp_vertical_features_alignment',
			[
				'label' => esc_html__( 'Alignment', SAAS_PRICINNG_TXT_DOMAIN ),
				'type' =>  Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', SAAS_PRICINNG_TXT_DOMAIN ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', SAAS_PRICINNG_TXT_DOMAIN ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'CTA', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>  Controls_Manager::TAB_CONTENT,
        ]
    );
    
    $this->add_control(
        'saasp_vertical_primary_cta_switch',
        [
            'label' => esc_html__( 'Primary', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_position',
        [
            'label' => esc_html__( 'Position', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::CHOOSE,
            'options' => [
                'top' => [
                    'title' => esc_html__( 'Top', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-v-align-top',
                ],
                'bottom' => [
                    'title' => esc_html__( 'Bottom', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Buy Starter', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_vertical_primary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_url',
        [
            'label' => esc_html__( 'Link', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::URL,
            'placeholder' => esc_html__( 'https://your-link.com', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Size', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SELECT,
            'default' => 'small',
            'options' => [
                'extra-small' => esc_html__( 'Extra Small', SAAS_PRICINNG_TXT_DOMAIN ),
                'small'  => esc_html__( 'Small', SAAS_PRICINNG_TXT_DOMAIN ),
                'medium' => esc_html__( 'Medium', SAAS_PRICINNG_TXT_DOMAIN ),
                'large' => esc_html__( 'Large', SAAS_PRICINNG_TXT_DOMAIN ),
                'extra-large' => esc_html__( 'Extra Large', SAAS_PRICINNG_TXT_DOMAIN ),
            ],
            'condition' =>[
                'saasp_vertical_primary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_icon',
        [
            'label' => esc_html__( 'Icon', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Icon Spacing', SAAS_PRICINNG_TXT_DOMAIN ),
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
                'size' => 10,
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
        'saasp_vertical_primary_cta_id',
        [
            'label' => esc_html__( 'Button ID', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_vertical_primary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_switch',
        [
            'label' => esc_html__( 'Secondary', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'no',
            'separator'=>'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_position',
        [
            'label' => esc_html__( 'Position', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::CHOOSE,
            'options' => [
                'top' => [
                    'title' => esc_html__( 'Top', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-v-align-top',
                ],
                'bottom' => [
                    'title' => esc_html__( 'Bottom', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Learn More...', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_vertical_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_url',
        [
            'label' => esc_html__( 'Link', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::URL,
            'placeholder' => esc_html__( 'https://your-link.com', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Size', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SELECT,
            'default' => 'small',
            'options' => [
                'extra-small' => esc_html__( 'Extra Small', SAAS_PRICINNG_TXT_DOMAIN ),
                'small'  => esc_html__( 'Small', SAAS_PRICINNG_TXT_DOMAIN ),
                'medium' => esc_html__( 'Medium', SAAS_PRICINNG_TXT_DOMAIN ),
                'large' => esc_html__( 'Large', SAAS_PRICINNG_TXT_DOMAIN ),
                'extra-large' => esc_html__( 'Extra Large', SAAS_PRICINNG_TXT_DOMAIN ),
            ],
            'condition' =>[
                'saasp_vertical_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_icon',
        [
            'label' => esc_html__( 'Icon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::ICONS,
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
                'saasp_vertical_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    
    $this->add_responsive_control(
        'saasp_vertical_secondary_cta_icon_spacing',
        [
            'label' => esc_html__( 'Icon Spacing', SAAS_PRICINNG_TXT_DOMAIN ),
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
        'saasp_vertical_secondary_cta_id',
        [
            'label' => esc_html__( 'Button ID', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_vertical_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_vertical_cta_alignment',
        [
            'label' => esc_html__( 'CTA Alignment', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => esc_html__( 'Left', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => esc_html__( 'Center', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => esc_html__( 'Right', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'default' => 'center',
            'toggle' => true,
            'separator' => 'before',
            'selectors' => [
                '{{WRAPPER}} .card-footer' => 'text-align: {{VALUE}};',
                '{{WRAPPER}} .saaspricing-cta-card' => 'text-align: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_vertical_header_style_tab',
        [
            'label' => esc_html__( 'Header', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_header_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-header' => 'background-color: {{VALUE}}',
                '{{WRAPPER}} .saaspricing-vertical-icon' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_header_padding',
        [
            'label' => esc_html__( 'Padding', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_header_icon',
        [
            'label' => esc_html__( 'Icon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_vertical_header_icon_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-icon svg' => 'fill: {{VALUE}}',
                '{{WRAPPER}} .saaspricing-vertical-icon i' => 'color: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_control(
        'saasp_vertical_header_icon_size',
        [
            'label' => esc_html__( 'Icon Size', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 50,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .saaspricing-vertical-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_header_title',
        [
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_vertical_header_title_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Description', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_vertical_header_des_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Ribbon', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_ribbon_title_heading',
        [
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
        ]
    );

    $this->add_control(
        'saasp_vertical_ribbon_title_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Border Radius', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Padding', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Pricing', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_pricing_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saasprcing-vertical-pricing' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_pricing_padding',
        [
            'label' => esc_html__( 'Paddding', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-price' => 'color: {{VALUE}}',
                '{{WRAPPER}} .saaspricing-vertical-symbol' => 'color: {{VALUE}}',
                '{{WRAPPER}} .saaspricing-fraction-price' => 'color: {{VALUE}}',
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
            'label' => esc_html__( 'Currency Symbol', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_pricing_symbol_size',
        [
            'label' => esc_html__( 'Size', SAAS_PRICINNG_TXT_DOMAIN ),
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
                '{{WRAPPER}} .saaspricing-vertical-symbol' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_pricing_symbol_position',
        [
            'label' => esc_html__( 'Postion', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::CHOOSE,
            'options' => [
                'before' => [
                    'title' => esc_html__( 'Before', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-h-align-left',
                ],
                'after' => [
                    'title' => esc_html__( 'After', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Verticle Position', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::CHOOSE,
            'options' => [
                'self-start' => [
                    'title' => esc_html__( 'Top', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-v-align-top',
                ],
                'center' => [
                    'title' => esc_html__( 'Middle', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-v-align-middle',
                ],
                'self-end' => [
                    'title' => esc_html__( 'Bottom', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Fractional Part', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_header_fractional_part_size',
        [
            'label' => esc_html__( 'Size', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Verticle Position', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::CHOOSE,
            'options' => [
                'self-start' => [
                    'title' => esc_html__( 'Top', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-v-align-top',
                ],
                'center' => [
                    'title' => esc_html__( 'Middle', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-v-align-middle',
                ],
                'self-end' => [
                    'title' => esc_html__( 'Bottom', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Original Price', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_original_price_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Vertical Position', SAAS_PRICINNG_TXT_DOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'self-start' => [
                    'title' => esc_html__( 'Top', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-v-align-top',
                ],
                'center' => [
                    'title' => esc_html__( 'Middle', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-v-align-middle',
                ],
                'self-end' => [
                    'title' => esc_html__( 'Bottom', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Period', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_header_period_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Position', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::SELECT,
            'label_block' => false,
            'options' => [
                'below' => esc_html__( 'Below', SAAS_PRICINNG_TXT_DOMAIN ),
                'beside' => esc_html__( 'Beside', SAAS_PRICINNG_TXT_DOMAIN ),
            ],
            'default' => 'beside',
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_vertical_countdown_style_tab',
        [
            'label' => esc_html__( 'Countdown', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_countdown_text_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Padding', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-countdown' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_ribbon_margin',
        [
            'label' => esc_html__( 'Margin', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Border Radius', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Review', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_review_satar_heading',
        [
            'label' => esc_html__( 'Stars', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_responsive_control(
        'saasp_vertical_review_spacing',
        [
            'label' => esc_html__( 'Spacing', SAAS_PRICINNG_TXT_DOMAIN ),
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
                '{{WRAPPER}} .ratings span:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    
    $this->add_control(
        'saasp_vertical_review_star_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-yellow' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_review_unmark_star_color',
        [
            'label' => esc_html__( 'Unmark Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-unmark' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_review_text_heading',
        [
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ), 
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_review_text_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Features', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_features_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-vertical-feature' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_features_padding',
        [
            'label' => esc_html__( 'Padding', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_features_title_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Icon', SAAS_PRICINNG_TXT_DOMAIN ), 
            'type' =>  Controls_Manager::HEADING,
            'separator' =>'before',
        ]
    );
    
    $this->add_responsive_control(
        'saaspricing_vertical_features_icon_size',
        [
            'label' => esc_html__( 'Size', SAAS_PRICINNG_TXT_DOMAIN ),
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
                '{{WRAPPER}} .vertical-pricing-card ol i ' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .vertical-pricing-card ol svg ' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'saaspricing_vertical_features_icon_spacing',
        [
            'label' => esc_html__( 'Icon Spacing', SAAS_PRICINNG_TXT_DOMAIN ),
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
                'size' => 0,
            ],
            'selectors' => [
                '{{WRAPPER}} .vertical-pricing-card ol svg ' => 'margin-right: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .vertical-pricing-card ol i ' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_features_text_heading',
        [
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_vertical_features_text_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'CTA', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>   Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_section',
        [
            'label' => esc_html__( 'Primary CTA', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Normal', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_normal_text_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Hover', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_hover_text_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Normal', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_normal_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Hover', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->add_control(
        'saasp_vertical_primary_cta_hover_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Border Radius', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Padding', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Margin', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Secondary CTA', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Normal', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_normal_text_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Hover', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_hover_text_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Normal', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_normal_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Hover', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->add_control(
        'saasp_vertical_secondary_cta_hover_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Border Radius', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Padding', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Margin', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'separator'=>'before',
            'selectors' => [
                '{{WRAPPER}} .card-footer' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_vertical_cta_global_padding',
        [
            'label' => esc_html__( 'Padding', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .card-footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
  <!-- basic pricing card start   -->
<div class="pricing-cards-all">
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12 mt-auto">
        <div class="saaspricing-card vertical-pricing-card">
            <?php
            if('yes' === $settings['saasp_vertical_show_ribbon']){
            ?>
            <div class="saaspricing-card-header saaspricing-vertical-ribbon">
                <p class="saaspricing-ribbon-title text-light fs-6 mb-0"> 
                    <small>
                    <?php echo esc_html($settings['saasp_vertical_ribbon_title']); ?>
                    </small>
                </p>
            </div>
            <?php
            }
            ?>
            <div class="card-body position-relative">

                <div class="saaspricing-vertical-header">
                <?php
                if('' !== $settings['saasp_vertical_icon']['value']){
                ?>
                <div class="saaspricing-vertical-icon pt-1 pb-1">
                <?php Icons_Manager::render_icon( $settings['saasp_vertical_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </div>
                <?php
                }
                ?>
                <?php
                if('' !== $settings['saasp_vetical_header_title']){
                 printf('<%1$s class="card-title saaspricing-vertical-title">%2$s</%1$s>', esc_html($settings['saasp_vetical_header_title_tag']) ,esc_html($settings['saasp_vetical_header_title']));
                }
                ?>
                <p class="saaspricing-vertical-description">
                 <?php echo esc_html($settings['saasp_vertical_header_description']); ?>
                </p>
                </div>

                <!-- pricing  -->

                <div class="saasprcing-vertical-pricing">
                    <?php
                    if('none' !== $settings['saasp_vertical_currency_symbol'] && 'yes' === $settings['saasp_vertical_sale']){
                    ?>
                    <del class="saaspricing-vertical-original"> 
                    <span>
                    <?php
                    if('custom' !== $settings['saasp_vertical_currency_symbol']){
                        echo esc_html($this->get_currency_symbol($settings['saasp_vertical_currency_symbol']));
                    }else{
                        echo esc_html($settings['saasp_vertical_currency_symbol_custom']);
                    }
                    ?>
                    <?php
                    if('' !== $settings['saasp_vertical_original_price']){
                    ?>
                    <span class="fw-bold"><?php echo esc_html($settings['saasp_vertical_original_price']); ?></span>
                    <?php
                    }
                    ?> 
                    </span>
                    </del>
                    <?php
                    }
                    ?>

                    <?php
                    if('before'=== $settings['saasp_vertical_pricing_symbol_position']){
                    ?>
                    <span class="saaspricing-vertical-symbol">
                    <?php
                    if('custom' !== $settings['saasp_vertical_currency_symbol']){
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
                    if('' === $settings['saasp_vertical_currency_format'] ){ 
                    ?>
                    <span class="saaspricing-vertical-price saaspricing-vertical-typography">
                    <?php echo esc_html(explode(".", $settings['sassp_vertical_price'])[0]); ?>
                    </span>
                    <?php
                    if('' !== explode(".", $settings['sassp_vertical_price'])[1]){
                    ?>
                    <span class="saaspricing-fraction-price"><?php echo esc_html(explode(".", $settings['sassp_vertical_price'])[1]); ?></span>
                    <?php
                    }
                    }else{
                    ?>
                    <span class="saaspricing-vertical-price saaspricing-vertical-typography"><?php echo esc_html($settings['sassp_vertical_price']); ?></span>
                    <?php
                    }
                    ?>
                    <?php
                    if('after' === $settings['saasp_vertical_pricing_symbol_position']){
                    ?>
                    <span class="saaspricing-vertical-symbol">
                    <?php
                    if('custom' !== $settings['saasp_vertical_currency_symbol']){
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
                    if('' !== $settings['saasp_vertical_period']){
                    ?>
                    <span class="saaspricing-vertical-period <?php if( 'below' === $settings['saasp_vertical_period_position']){echo esc_attr('w-100 mt-1');} ?>">
                    <?php echo esc_html($settings['saasp_vertical_period']);?>
                    </span>
                    <?php
                    }
                    ?>
                </div>
                <!-- countdown -->
                <?php
                if('yes' === $settings['saasp_vertical_show_countdown'] &&  "" !== $settings['saasp_vertical_show_countdown']){
                ?>
                <div class="saaspricing-vertical-countdown">
                    <span class="saaspricing-countdown"
                     data-countdown-index="0"
                     data-expire-date="<?php echo esc_attr($settings['saasp_vertical_expire_date']); ?>"
                     id="countdown">
                    </span>
                </div>
                <?php
                }
                ?>

                <!-- ratings and reviews -->

                <?php
                if('yes' === $settings['saasp_vertical_show_rating'] && '' !== $settings['saasp_vertical_rating_num'] ){
                ?>
                <div class="ratings saaspricing-vertical-ratings">
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
                        if(''!==$settings['saasp_vertical_rating_counter']){
                        ?>
                        <small class="saaspricing-review-text"> 
                        (<?php echo esc_html($settings['saasp_vertical_rating_counter']); ?>) 
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
                <div class="saaspricing-cta-card">
                <?php
                if( 'yes' === $settings['saasp_vertical_primary_cta_switch'] && '' !== $settings['saasp_vertical_primary_cta_text'] 
                && 'top' === $settings['saasp_vertical_primary_cta_position']){
                    if ( ! empty( $settings['saasp_vertical_primary_cta_url']['url'] ) ) {
                        $this->add_link_attributes( 'saasp_vertical_primary_cta_url', $settings['saasp_vertical_primary_cta_url'] );
                    }
                ?>
                <a class="btn saaspricing-vertical-primary btn-dark <?php
                if('extra-small' === $settings['saasp_vertical_primary_cta_size']){
                echo esc_attr('saaspricing-xsm-btn');
                }elseif('small' === $settings['saasp_vertical_primary_cta_size']){
                echo esc_attr('saaspricing-sm-btn');
                }
                elseif('medium' === $settings['saasp_vertical_primary_cta_size']){
                echo esc_attr('saaspricing-m-btn');
                }
                elseif('large' === $settings['saasp_vertical_primary_cta_size']){
                echo esc_attr('saaspricing-l-btn');
                }
                elseif('extra-large' === $settings['saasp_vertical_primary_cta_size']){
                echo esc_attr('saaspricing-xl-btn');
                }
                ?>" 
                <?php echo $this->get_render_attribute_string( 'saasp_vertical_primary_cta_url'); ?>
                <?php
                if('' !== $settings['saasp_vertical_primary_cta_id']){
                ?>
                id="<?php echo esc_attr($settings['saasp_vertical_primary_cta_id']); ?>"
                <?php
                }
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
                    'top' === $settings['saasp_vertical_secondary_cta_position']){
                    if ( ! empty( $settings['saasp_vertical_secondary_cta_url']['url'] ) ) {
                        $this->add_link_attributes( 'saasp_vertical_secondary_cta_url', $settings['saasp_vertical_secondary_cta_url'] );
                    }
                ?>
                <div class="saaspricng-secondary-main">
                    <a class="saaspricing-vertical-secondary <?php
                    if('extra-small' === $settings['saasp_vertical_secondary_cta_size']){
                    echo esc_attr('saaspricing-xsm-btn');
                    }elseif('small' === $settings['saasp_vertical_secondary_cta_size']){
                    echo esc_attr('saaspricing-sm-btn');
                    }
                    elseif('medium' === $settings['saasp_vertical_secondary_cta_size']){
                    echo esc_attr('saaspricing-m-btn');
                    }
                    elseif('large' === $settings['saasp_vertical_secondary_cta_size']){
                    echo esc_attr('saaspricing-l-btn');
                    }
                    elseif('extra-large' === $settings['saasp_vertical_secondary_cta_size']){
                    echo esc_attr('saaspricing-xl-btn');
                    }
                    ?>" 
                    <?php echo $this->get_render_attribute_string( 'saasp_vertical_secondary_cta_url'); ?>
                    <?php
                    if('' !== $settings['saasp_vertical_secondary_cta_id']){
                    ?>
                    id="<?php echo esc_attr($settings['saasp_vertical_secondary_cta_id']); ?>"
                    <?php
                    }
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

                <!-- feature list -->
                <div class="saaspricing-vertical-feature">
                    <?php
                    if('' !== $settings['saasp_vetical_features_title']){
                    ?>
                    <p class="saaspricing-features-title"><?php echo esc_html($settings['saasp_vetical_features_title']); ?></p>
                    <?php
                    }
                    ?>
                    <ol class="list-unstyled mb-0">
                        <?php
                        if($settings['saasp_vertical_features']){
                        foreach($settings['saasp_vertical_features'] as $saasp_vetical_features){
                        ?>
                        <li class="saaspricing-vertical-margin elementor-repeater-item-<?php echo esc_attr($saasp_vetical_features['_id']); ?>">
                        <?php Icons_Manager::render_icon( $saasp_vetical_features['saasp_vertical_features_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        <small class=""><?php echo esc_html($saasp_vetical_features['saasp_vertical_features_text']); ?></small>
                        </li>
                        <?php
                        }
                        }
                        ?>
                    </ol>
                </div>
            </div>
            <!-- card body end -->

            <!-- cta start  -->   
            <?php
            if( 'bottom' === $settings['saasp_vertical_primary_cta_position'] || 'bottom' === $settings['saasp_vertical_secondary_cta_position'] ){
            ?>
            <div class="card-footer">
                <?php
                if( 'yes' === $settings['saasp_vertical_primary_cta_switch'] && '' !== $settings['saasp_vertical_primary_cta_text'] 
                    && 'bottom' === $settings['saasp_vertical_primary_cta_position']){
                    if ( ! empty( $settings['saasp_vertical_primary_cta_url']['url'] ) ) {
                        $this->add_link_attributes( 'saasp_vertical_primary_cta_url', $settings['saasp_vertical_primary_cta_url'] );
                    }
                ?>
                <a class="btn saaspricing-vertical-primary btn-dark <?php
                if('extra-small' === $settings['saasp_vertical_primary_cta_size']){
                echo esc_attr('saaspricing-xsm-btn');
                }elseif('small' === $settings['saasp_vertical_primary_cta_size']){
                echo esc_attr('saaspricing-sm-btn');
                }
                elseif('medium' === $settings['saasp_vertical_primary_cta_size']){
                echo esc_attr('saaspricing-m-btn');
                }
                elseif('large' === $settings['saasp_vertical_primary_cta_size']){
                echo esc_attr('saaspricing-l-btn');
                }
                elseif('extra-large' === $settings['saasp_vertical_primary_cta_size']){
                echo esc_attr('saaspricing-xl-btn');
                }
                ?>" 
                <?php echo $this->get_render_attribute_string( 'saasp_vertical_primary_cta_url'); ?>
                <?php
                if('' !== $settings['saasp_vertical_primary_cta_id']){
                ?>
                id="<?php echo esc_attr($settings['saasp_vertical_primary_cta_id']); ?>"
                <?php
                }
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
                if( 'yes' === $settings['saasp_vertical_secondary_cta_switch'] && '' !== $settings['saasp_vertical_secondary_cta_text']
                    && 'bottom' === $settings['saasp_vertical_secondary_cta_position']){
                    if ( ! empty( $settings['saasp_vertical_secondary_cta_url']['url'] ) ) {
                        $this->add_link_attributes( 'saasp_vertical_secondary_cta_url', $settings['saasp_vertical_secondary_cta_url'] );
                    }
                ?>
                <div class="saaspricng-secondary-main">
                    <a class="saaspricing-vertical-secondary <?php
                    if('extra-small' === $settings['saasp_vertical_secondary_cta_size']){
                    echo esc_attr('saaspricing-xsm-btn');
                    }elseif('small' === $settings['saasp_vertical_secondary_cta_size']){
                    echo esc_attr('saaspricing-sm-btn');
                    }
                    elseif('medium' === $settings['saasp_vertical_secondary_cta_size']){
                    echo esc_attr('saaspricing-m-btn');
                    }
                    elseif('large' === $settings['saasp_vertical_secondary_cta_size']){
                    echo esc_attr('saaspricing-l-btn');
                    }
                    elseif('extra-large' === $settings['saasp_vertical_secondary_cta_size']){
                    echo esc_attr('saaspricing-xl-btn');
                    }
                    ?>" 
                    <?php echo $this->get_render_attribute_string( 'saasp_vertical_secondary_cta_url'); ?>
                    <?php
                    if('' !== $settings['saasp_vertical_secondary_cta_id']){
                    ?>
                    id="<?php echo esc_attr($settings['saasp_vertical_secondary_cta_id']); ?>"
                    <?php
                    }
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
            <!-- cta end  -->
        </div>
    </div>
</div>
</div>
<!-- basic pricing card start -->
<?php
 }
}
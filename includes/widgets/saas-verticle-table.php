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
                '{{WRAPPER}} .saaspricing-header-title' => 'text-align: {{VALUE}};',
                '{{WRAPPER}} .saaspricing-header-description' => 'text-align: {{VALUE}};',
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
                'krona' => 'kr ' . esc_html__( 'Krona', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'lira' => '&#8356; ' . esc_html__( 'Lira', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
                'peseta' => '&#8359 ' . esc_html__( 'Peseta', 'Currency', SAAS_PRICINNG_TXT_DOMAIN  ),
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
            'default' => '',
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
                '{{WRAPPER}} .saasprcing-pricing' => 'text-align: {{VALUE}};',
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
					'{{WRAPPER}} .saaspricing-feature-list' => 'text-align: {{VALUE}};',
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
            'default' => esc_html__( 'btn-id-1', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'default' => esc_html__( 'btn-secondary-1', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_vertical_secondary_cta_switch' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'text_align',
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
        'peseta' => '&#8359',
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
  <div class="pricing-cards-all my-5">

<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12 mt-auto">
        <div class="card vertical-pricing-card">
            <?php
            if('yes' === $settings['saasp_vertical_show_ribbon']){
            ?>
            <div class="card-header bg-success">
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
                <?php
                if('' !== $settings['saasp_vetical_header_title']){
                 printf('<%1$s class="card-title text-dark my-4 saaspricing-header-title">%2$s</%1$s>', esc_html($settings['saasp_vetical_header_title_tag']) ,esc_html($settings['saasp_vetical_header_title']));
                }
                ?>
                <p class="text-muted mb-2 saaspricing-header-description">
                 <?php echo esc_html($settings['saasp_vertical_header_description']); ?>
                </p>

                <!-- pricing  -->
                <div class="saasprcing-pricing">
                   
                    <?php
                    if('none' !== $settings['saasp_vertical_currency_symbol'] && 'yes' === $settings['saasp_vertical_sale']){
                    ?>
                    <del class="fs-4"> 
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

                    <span class="saaspricing-heading fw-bold saaspricing-vertical-pricing">
                        <span>
                        <?php
                        if('custom' !== $settings['saasp_vertical_currency_symbol']){
                            echo esc_html($this->get_currency_symbol($settings['saasp_vertical_currency_symbol']));
                        }else{
                            echo esc_html($settings['saasp_vertical_currency_symbol_custom']);
                        }
                        ?>
                        </span>
                        <?php
                        if('' === $settings['saasp_vertical_currency_format'] ){ 
                        ?>
                        <span><?php echo esc_html(explode(".", $settings['sassp_vertical_price'])[0]); ?></span>
                        <?php
                        if('' !== explode(".", $settings['sassp_vertical_price'])[1]){
                        ?>
                        <span class="saaspricing-fraction-price"><?php echo esc_html(explode(".", $settings['sassp_vertical_price'])[1]); ?></span>
                        <?php
                        }
                        }else{
                        ?>
                        <span><?php echo esc_html($settings['sassp_vertical_price']); ?></span>
                        <?php
                        }
                        ?>
                        <?php
                        if('' !== $settings['saasp_vertical_period']){
                        ?>
                        <small class="text-muted saaspricing-align-super fs-5">
                        <?php echo esc_html($settings['saasp_vertical_period']);?>
                        </small>
                        <?php
                        }
                        ?>
                    </span>
                    <span class="h1 saaspricing-heading fw-bold d-none">
                    $12
                    <small class="text-muted  saaspricing-align-super fs-5">
                    /mo
                    </small>
                    </span>
                </div>

                <!-- countdown -->
                <?php
                if('yes' === $settings['saasp_vertical_show_countdown'] &&  "" !== $settings['saasp_vertical_show_countdown']){
                ?>
                <div class="saaspricing-vertical-countdown my-3 mb-4  fw-bold">
                    <span class="saaspricing-countdown text-danger border rounded-3 px-2 py-1 border-danger"
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

                <!-- feature list -->
                <div class="saaspricing-feature-list py-4 px-2 my-3 saaspricing-bg-warm">
                    <?php
                    if('' !== $settings['saasp_vetical_features_title']){
                    ?>
                    <p class="fw-bold"><?php echo esc_html($settings['saasp_vetical_features_title']); ?></p>
                    <?php
                    }
                    ?>
                    <ol class="list-unstyled mb-0">
                        <?php
                        if($settings['saasp_vertical_features']){
                        foreach($settings['saasp_vertical_features'] as $saasp_vetical_features){
                        ?>
                        <li class="mb-3">
                        <?php Icons_Manager::render_icon( $saasp_vetical_features['saasp_vertical_features_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        <small><?php echo esc_html($saasp_vetical_features['saasp_vertical_features_text']); ?></small>
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
            <div class="card-footer">
                <?php
                if( 'yes' === $settings['saasp_vertical_primary_cta_switch'] && '' !== $settings['saasp_vertical_primary_cta_text']){
                    if ( ! empty( $settings['saasp_vertical_primary_cta_url']['url'] ) ) {
                        $this->add_link_attributes( 'saasp_vertical_primary_cta_url', $settings['saasp_vertical_primary_cta_url'] );
                    }
                ?>
                <a class="btn saaspricing-btn-1 btn-dark mb-3 mt-3 <?php
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
                id="<?php echo esc_attr($settings['saasp_vertical_primary_cta_id']); ?>">
                <?php echo esc_html($settings['saasp_vertical_primary_cta_text']); ?> 
                <span class="saaspricing-primary-spacing"> 
                <?php Icons_Manager::render_icon( $settings['saasp_vertical_primary_cta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </span>
                </a>
                <?php
                }
                ?>
                <?php
                if( 'yes' === $settings['saasp_vertical_secondary_cta_switch'] && '' !== $settings['saasp_vertical_secondary_cta_text']){
                    if ( ! empty( $settings['saasp_vertical_secondary_cta_url']['url'] ) ) {
                        $this->add_link_attributes( 'saasp_vertical_secondary_cta_url', $settings['saasp_vertical_secondary_cta_url'] );
                    }
                ?>
                <div class="mb-3">
                    <a class="d-block <?php
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
                    id="<?php echo esc_attr($settings['saasp_vertical_secondary_cta_id']); ?>">
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
            <!-- cta end  -->
        </div>
    </div>
</div>

</div>
</div>
<!-- basic pricing card start -->
<?php
 }
}
<?php
/**
 * Class: SaasComparisonTable
 * Name: Saas Comparison Table
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
 * Class SaasComparisonTable
 */

class SaasComparisonTable extends \Elementor\Widget_Base {

public function get_name() {
    return 'saasComparison';
}

public function get_title() {
    return esc_html__( 'Comparison Pricing Table', SAAS_PRICINNG_TXT_DOMAIN );
}

public function get_icon() {
    return 'eicon-table';
}

public function get_categories() {
    return ['saas_pricing_category'];
}

public function get_keywords() {
    return [ 'pricing', 'tables' , 'saaspricing', 'comparison'];
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
        'saasp_comparison_content_section',
        [
            'label' => esc_html__( 'Header', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'saasp_comparison_header_table_title',
        [
            'label' => esc_html__( 'Table Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Saaspricing', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->add_control(
        'saasp_comparison_header_table_description',
        [
            'label' => esc_html__( 'Table Description', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter Your Description', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->add_control(
        'saasp_comparison_header_table_title_tag',
        [
            'label' => esc_html__( 'Table Title HTML Tag', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SELECT,
            'default' => 'span',
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
        'saasp_comparison_select_columns',
        [
            'label' => esc_html__( 'Select Column', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
                '1' => esc_html__( '1', SAAS_PRICINNG_TXT_DOMAIN ),
                '2'  => esc_html__( '2', SAAS_PRICINNG_TXT_DOMAIN ),
                '3' => esc_html__( '3', SAAS_PRICINNG_TXT_DOMAIN ),
            ]
        ]
    );

     $this->add_control(
        'saasp_comparison_column_html_title_tag',
        [
            'label' => esc_html__( 'Column Title HTML Tag', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SELECT,
            'default' => 'p',
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
        'sassp_comparison_column_one_combined_alignment',
        [
            'label' => esc_html__( 'Alignment', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::CHOOSE,
            'options' => [
                'start' => [
                    'title' => esc_html__( 'Left', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => esc_html__( 'Center', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-text-align-center',
                ],
                'end' => [
                    'title' => esc_html__( 'Right', SAAS_PRICINNG_TXT_DOMAIN ),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'default' => 'center', 
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} td .saaspricing-common-ribbon' => 'align-items: {{VALUE}};',
                '{{WRAPPER}} .saaspricing-table tr.price-table-head td.saaspricing-table-head' => 'text-align: {{VALUE}};',
                '{{WRAPPER}} td.price.saaspricing-original-price' => 'text-align: {{VALUE}};',
                '{{WRAPPER}} .saasspricing-pricing-block' => 'justify-content: {{VALUE}};',
                '{{WRAPPER}} .saaspricing-table-title-des' => 'text-align: {{VALUE}};',
            ],
        ]
    );

    // --- Heading Content

    $this->add_control(
        'saasp_comparison_header_content_title_and_des_one',
        [
            'label' => esc_html__( 'Column One', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before',
        ]
    );

    $this->add_control(
        'saasp_comparison_header_title_text_1',
        [
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'First Head', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_block' => false,
        ]
    );

    $this->add_control(
        'saasp_comparison_header_title_des_1',
        [
            'label' => esc_html__( 'Description', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter your description', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_block' => false,
        ]
    );

    $this->add_control(
        'saasp_comparison_ribbon_popover_1',
        [
            'type' => Controls_Manager::POPOVER_TOGGLE,
            'label' => esc_html__( 'Ribbon', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
        ]
    ); 

    $this->start_popover();

    $this->add_control(
        'saasp_comparison_show_ribbon_1',
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
        'saasp_comparison_ribbon_title_1',
        [
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Most Popular', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_comparison_show_ribbon_1' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_show_countdown_1',
        [
            'label' => esc_html__( 'Countdown', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Expire Date', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DATE_TIME,
            'label_block' => false,
            'default'=> esc_html__('2023-12-31 12:00', SAAS_PRICINNG_TXT_DOMAIN),
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
            'label' => esc_html__( 'Image', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
        ]
    );    

    $this->start_popover();

    $this->add_control(
        'saasp_comparison_choose_media_1',
        [
            'label' => esc_html__( 'Choose Image', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_comparison_image_width_media_1',
        [
            'label' => esc_html__( 'Image Width', SAAS_PRICINNG_TXT_DOMAIN ),
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
                '{{WRAPPER}} .saaspricing-table img.saaspricing-header-image-1' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_media_light_box_1',
        [
            'label' => esc_html__( 'Light Box', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_comparison_pricing_popover_1',
        [
            'type' => Controls_Manager::POPOVER_TOGGLE,
            'label' => esc_html__( 'Pricing', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
        ]
    );

    $this->start_popover();

    $this->add_control(
        'saasp_comparison_currency_symbol_1',
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
        'saasp_comparison_currency_symbol_custom_1',
        [
            'label' => esc_html__( 'Custom Symbol', SAAS_PRICINNG_TXT_DOMAIN  ),
            'type' => Controls_Manager::TEXT,
            'condition' => [
                'saasp_comparison_currency_symbol_1' => 'custom',
            ],
        ]
    );

    $this->add_control(
        'sassp_comparison_price_1',
        [
            'label' => esc_html__( 'Price', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::TEXT,
            'default' => '39.99',
        ]
    );

    $this->add_control(
        'saasp_comparison_currency_format_1',
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
        'saasp_comparison_sale_1',
        [
            'label' => esc_html__( 'Sale', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'On', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Off', SAAS_PRICINNG_TXT_DOMAIN ),
            'default' => '',
        ]
    );

    $this->add_control(
        'saasp_comparison_original_price_1',
        [
            'label' => esc_html__( 'Original Price', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Period', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Monthly', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_comparison_review_popover_1',
        [
            'label' => esc_html__( 'Review', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
        ]
    );

    $this->start_popover();

     $this->add_control(
        'saasp_comparison_show_rating_1',
        [
            'label' => esc_html__( 'Show Rating', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->add_control(
        'saasp_comparison_rating_num_1',
        [
            'label' => esc_html__( 'Rating', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Rating Counter', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '3k', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_comparison_show_rating_1' => 'yes',
            ],
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_header_content_title_and_des_two',
        [
            'label' => esc_html__( 'Column Two', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Second Head', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_block' => false,
            'condition' => [
                'saasp_comparison_select_columns' => ['2','3'],
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_header_title_des_2',
        [
            'label' => esc_html__( 'Description', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter your description', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_block' => false,
            'condition' => [
                'saasp_comparison_select_columns' => ['2','3'],
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_ribbon_popover_2',
        [
            'label' => esc_html__( 'Ribbon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Ribbon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->add_control(
        'saasp_comparison_ribbon_title_2',
        [
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Most Popular', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_comparison_show_ribbon_2' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_show_countdown_2',
        [
            'label' => esc_html__( 'Countdown', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
            'condition' => [
                'saasp_comparison_show_ribbon_2' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_expire_date_2',
        [
            'label' => esc_html__( 'Expire Date', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DATE_TIME,
            'label_block' => false,
            'default'=> esc_html__('2023-12-31 12:00', SAAS_PRICINNG_TXT_DOMAIN),
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
            'label' => esc_html__( 'Image', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Choose Image', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_comparison_image_width_media_2',
        [
            'label' => esc_html__( 'Image Width', SAAS_PRICINNG_TXT_DOMAIN ),
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
                '{{WRAPPER}} .saaspricing-table img.saaspricing-header-image-2' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_media_light_box_2',
        [
            'label' => esc_html__( 'Light Box', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_comparison_pricing_popover_2',
        [
            'label' => esc_html__( 'Price', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
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
        'saasp_comparison_currency_symbol_custom_2',
        [
            'label' => esc_html__( 'Custom Symbol', SAAS_PRICINNG_TXT_DOMAIN  ),
            'type' => Controls_Manager::TEXT,
            'condition' => [
                'saasp_comparison_currency_symbol_2' => 'custom',
            ],
        ]
    );

    $this->add_control(
        'sassp_comparison_price_2',
        [
            'label' => esc_html__( 'Pricing', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::TEXT,
            'default' => '39.99',
        ]
    );

    $this->add_control(
        'saasp_comparison_currency_format_2',
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
        'saasp_comparison_sale_2',
        [
            'label' => esc_html__( 'Sale', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'On', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Off', SAAS_PRICINNG_TXT_DOMAIN ),
            'default' => '',
        ]
    );

    $this->add_control(
        'saasp_comparison_original_price_2',
        [
            'label' => esc_html__( 'Original Price', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Period', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Monthly', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_comparison_review_popover_2',
        [
            'label' => esc_html__( 'Review', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Show Rating', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->add_control(
        'saasp_comparison_rating_num_2',
        [
            'label' => esc_html__( 'Rating', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Rating Counter', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '3k', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_comparison_show_rating_2' => 'yes',
            ],
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_comparison_header_content_title_and_des_three',
        [
            'label' => esc_html__( 'Column Three', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Third Head', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_block' => false,
            'condition' => [
                'saasp_comparison_select_columns' => '3',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_header_title_des_3',
        [
            'label' => esc_html__( 'Description', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter your description', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_block' => false,
            'condition' => [
                'saasp_comparison_select_columns' => '3',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_ribbon_popover_3',
        [
            'label' => esc_html__( 'Ribbon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Ribbon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->add_control(
        'saasp_comparison_ribbon_title_3',
        [
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Most Popular', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_comparison_show_ribbon_3' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_show_countdown_3',
        [
            'label' => esc_html__( 'Countdown', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Expire Date', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DATE_TIME,
            'label_block' => false,
            'default'=> esc_html__('2023-12-31 12:00', SAAS_PRICINNG_TXT_DOMAIN),
            'condition' => [
                'saasp_comparison_show_countdown_3' => 'yes',
                'saasp_comparison_show_ribbon_2' => 'yes',
            ],
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_comparison_image_popover_3',
        [
            'label' => esc_html__( 'Image', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Choose Image', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_comparison_image_width_media_3',
        [
            'label' => esc_html__( 'Image Width', SAAS_PRICINNG_TXT_DOMAIN ),
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
                '{{WRAPPER}} .saaspricing-table img.saaspricing-header-image-3' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_media_light_box_3',
        [
            'label' => esc_html__( 'Light Box', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_comparison_pricing_popover_3',
        [
            'label' => esc_html__( 'Pricing', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
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
        'saasp_comparison_currency_symbol_custom_3',
        [
            'label' => esc_html__( 'Custom Symbol', SAAS_PRICINNG_TXT_DOMAIN  ),
            'type' => Controls_Manager::TEXT,
            'condition' => [
                'saasp_comparison_currency_symbol_3' => 'custom',
            ],
        ]
    );

    $this->add_control(
        'sassp_comparison_price_3',
        [
            'label' => esc_html__( 'Price', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::TEXT,
            'default' => '39.99',
        ]
    );

    $this->add_control(
        'saasp_comparison_currency_format_3',
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
        'saasp_comparison_sale_3',
        [
            'label' => esc_html__( 'Sale', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'On', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Off', SAAS_PRICINNG_TXT_DOMAIN ),
            'default' => '',
        ]
    );

    $this->add_control(
        'saasp_comparison_original_price_3',
        [
            'label' => esc_html__( 'Original Price', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Period', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Monthly', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_comparison_select_columns' => '3',
            ],
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_comparison_review_popover_3',
        [
            'label' => esc_html__( 'Review', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Show Rating', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->add_control(
        'saasp_comparison_rating_num_3',
        [
            'label' => esc_html__( 'Rating', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'label' => esc_html__( 'Rating Counter', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '3k', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_comparison_show_rating_3' => 'yes',
            ],
        ]
    );

    $this->end_popover();

    $this->end_controls_section();
    
    $this->start_controls_section(
        'saasp_comparison_table_section',
        [
            'label' => esc_html__( 'Table', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_comparison_table_title',
        [
            'label' => esc_html__( 'Table Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );
    
    $this->add_control(
        'saasp_comparison_table_title_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table-title-des .saaspricing-table-title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparison_table_title_typography',
            'selector' => '{{WRAPPER}} .saaspricing-table-title-des .saaspricing-table-title',
        ]
    );

    $this->add_control(
        'saasp_comparison_table_des',
        [
            'label' => esc_html__( 'Table Description', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
        ]
    );
    
    $this->add_control(
        'saasp_comparison_table_des_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table-title-des .saaspricing-table-description' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparison_table_des_typography',
            'selector' => '{{WRAPPER}} .saaspricing-table-title-des .saaspricing-table-description',
        ]
    );

    $this->add_responsive_control(
        'saasp_comparsion_table_padding',
        [
            'label' => esc_html__( 'Padding', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table-title-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparsion_table_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .saaspricing-table-title-des' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
       [
           'name' => 'saasp_comparison_table_border',
           'selector' => '{{WRAPPER}} .saaspricing-table td',
       ]
   );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_comparison_style_header_heading_section',
        [
            'label' => esc_html__( 'Heading', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );


    $this->add_control(
        'saasp_comparsion_heading_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table tr.price-table-head' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_comparsion_heading_table_data_padding',
        [
            'label' => esc_html__( 'Padding', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .price-table-head td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparsion_header_style_tab_heading_title',
        [
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_comparsion_heading_title_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .price-table-head td .saaspricing-heading-title' => 'color: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparsion_heading_title_typography',
            'selector' => '{{WRAPPER}} .price-table-head td .saaspricing-heading-title',
        ]
    );

    $this->add_control(
        'saasp_comparsion_header_style_tab_heading_des',
        [
            'label' => esc_html__( 'Description', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_comparsion_heading_des_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .price-table-head td small' => 'color: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparsion_heading_des_typography',
            'selector' => '{{WRAPPER}} .price-table-head td small',
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_comparison_style_header_ribbon_section',
        [
            'label' => esc_html__( 'Ribbon', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_comparsion_header_ribbon_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-common-ribbon' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_comparsion_header_ribbon_border',
            'selector' => '{{WRAPPER}} .saaspricing-common-ribbon',
        ]
    );

    $this->add_responsive_control(
        'saasp_comparsion_header_ribbon_border_radius',
        [
            'label' => esc_html__( 'Border Radius', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-common-ribbon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_comparsion_header_ribbon_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-common-ribbon',
        ]
    );

    $this->add_responsive_control(
        'saasp_comparsion_ribbon_min_height',
        [
            'label' => esc_html__( 'Height', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SLIDER,
            'size_units' => [ 'px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 50,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table td div.saaspricing-common-ribbon' => 'min-height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparsion_header_ribbon_title_heading',
        [
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_comparsion_header_ribbon_title_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-ribbon-title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
         Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparsion_header_ribbon_title_typography',
            'selector' => '{{WRAPPER}} .saaspricing-ribbon-title',
        ]
    );

    $this->add_responsive_control(
        'saasp_comparsion_header_ribbon_title_padding',
        [
            'label' => esc_html__( 'Padding', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-ribbon-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparsion_header_ribbon_countdown_heading',
        [
            'label' => esc_html__( 'Countdown', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_comparsion_header_ribbon_countdown_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-countdown' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
         Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparsion_header_ribbon_countdown_typography',
            'selector' => '{{WRAPPER}} .saaspricing-countdown',
        ]
    );

    $this->add_responsive_control(
        'saasp_comparsion_header_ribbon_countdown_padding',
        [
            'label' => esc_html__( 'Padding', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .show-expire-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_comparison_style_header_pricing_section',
        [
            'label' => esc_html__( 'Pricing', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_comparsion_pricing_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} td.price.saaspricing-original-price' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'saasp_comparison_original_price_padding',
        [
            'label' => esc_html__( 'Paddding', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} td.price.saaspricing-original-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
         Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_comparsion_pricing_section_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-sticky',
        ]
    );

    $this->add_control(
        'saasp_comparsion_pricing_text_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-price-text' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
       Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparsion_pricing_text_typography',
            'selector' => '{{WRAPPER}} .saaspricing-price-typography',
        ]
    );

    $this->add_control(
        'saasp_comparsion_header_pricing_currency_symbol',
        [
            'label' => esc_html__( 'Currency Symbol', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_responsive_control(
        'saasp_comparsion_header_pricing_symbol_size',
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
                '{{WRAPPER}} .saaspricing-price-symbol' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_header_pricing_symbol_position',
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
        'saasp_comparsion_header_pricing_symbol_vertical_position',
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
                '{{WRAPPER}} .saaspricing-price-symbol' => 'align-self: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparsion_header_pricing_fractional_part',
        [
            'label' => esc_html__( 'Fractional Part', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_responsive_control(
        'saasp_comparsion_header_fractional_part_size',
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
        'saasp_comparsion_header_fractional_part_vertical_position',
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
        'saasp_comparsion_header_original_price_style',
        [
            'label' => esc_html__( 'Original Price', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_comparison_original_price_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-original-slashed-price' => 'color: {{VALUE}}',
                '{{WRAPPER}} .saaspricing-original-slashed-price span' => 'color: {{VALUE}}',
            ],
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
                '{{WRAPPER}} .saaspricing-original-slashed-price' => 'align-self: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparsion_header_pricing_period_style',
        [
            'label' => esc_html__( 'Period', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_comparsion_header_period_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-period' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparsion_header_period_typography',
            'selector' => '{{WRAPPER}} .saaspricing-period',
        ]
    );

    $this->add_control(
        'saasp_comparsion_header_period_position',
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
        'saasp_comparison_style_features__section',
        [
            'label' => esc_html__( 'Features', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>Controls_Manager::TAB_CONTENT,
        ]
    );

    // ---- Feature One ----

    $saasp_comparison_feature_one = new \Elementor\Repeater();

    $saasp_comparison_feature_one->add_control(
        'saasp_comparison_show_features_tooltip',
        [
            'label' => esc_html__( 'Tooltip', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $saasp_comparison_feature_one->add_control(
        'saasp_comparison_features_tooltip_description',
        [
            'label' => esc_html__( 'Description', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora.', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_comparison_show_features_tooltip'=>'yes',
            ]
        ]
    );

    $saasp_comparison_feature_one->add_control(
        'saasp_comparison_feature_title',
        [
            'label' => esc_html__( 'Feature Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Feature', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $saasp_comparison_feature_one->add_control(
        'sassp_comparison_feature_one_text_col_1',
        [
            'label' => esc_html__( 'Cell One', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $saasp_comparison_feature_one->start_popover();

    $saasp_comparison_feature_one->add_control(
        'saasp_comparison_feature_text',
        [
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '1', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $saasp_comparison_feature_one->add_control(
        'saasp_comparison_feature_icon',
        [
            'label' => esc_html__( 'Icon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::ICONS,
            'label_block' => true,
            'skin' => 'inline',
            'default' => [
                'value' => 'fas fa-check',
                'library' => 'fa-solid',
            ],
            'exclude_inline_options' => [ 'svg' ],
        ]
    );

    $saasp_comparison_feature_one->start_popover();

    $this->add_control(
        'saasp_comparison_table_feature_list_1',
        [
            'label' => esc_html__( 'Features List', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::REPEATER,
            'fields' =>  $saasp_comparison_feature_one->get_controls(),
            'default' => [
                [
                    'saasp_comparison_show_features_tooltip' => 'yes',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Item content. Click the edit button to change this text.', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 1', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text' => esc_html__( '1', SAAS_PRICINNG_TXT_DOMAIN ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'yes',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Item content. Click the edit button to change this text.', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 2', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text' => esc_html__( '2', SAAS_PRICINNG_TXT_DOMAIN ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'yes',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Item content. Click the edit button to change this text.', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 3', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text' => esc_html__( '3', SAAS_PRICINNG_TXT_DOMAIN ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'yes',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Item content. Click the edit button to change this text.', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 4', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text' => esc_html__( '4', SAAS_PRICINNG_TXT_DOMAIN ),
                ]
            ],
            'title_field' => '{{{ saasp_comparison_feature_title }}}',
            'condition' => [
                'saasp_comparison_select_columns' => '1',
            ],
        ]
    );

    $saasp_comparison_feature_two = new \Elementor\Repeater();

    $saasp_comparison_feature_two->add_control(
        'saasp_comparison_show_features_tooltip',
        [
            'label' => esc_html__( 'Tooltip', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $saasp_comparison_feature_two->add_control(
        'saasp_comparison_features_tooltip_description',
        [
            'label' => esc_html__( 'Description', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora.', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_comparison_show_features_tooltip'=>'yes',
            ]
        ]
    );

    $saasp_comparison_feature_two->add_control(
        'saasp_comparison_feature_title',
        [
            'label' => esc_html__( 'Feature Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Feature', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $saasp_comparison_feature_two->add_control(
        'sassp_comparison_feature_two_text_col_1',
        [
            'label' => esc_html__( 'Cell One', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $saasp_comparison_feature_two->start_popover();

    $saasp_comparison_feature_two->add_control(
        'saasp_comparison_feature_text_1',
        [
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '1', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $saasp_comparison_feature_two->add_control(
        'saasp_comparison_feature_icon_1',
        [
            'label' => esc_html__( 'Icon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::ICONS,
            'label_block' => true,
            'skin' => 'inline',
            'default' => [
                'value' => 'fas fa-check',
                'library' => 'fa-solid',
            ],
            'exclude_inline_options' => [ 'svg' ],
        ]
    );

    $saasp_comparison_feature_two->end_popover();


    $saasp_comparison_feature_two->add_control(
        'sassp_comparison_feature_two_text_col_2',
        [
            'label' => esc_html__( 'Cell Two', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $saasp_comparison_feature_two->start_popover();
    
    $saasp_comparison_feature_two->add_control(
        'saasp_comparison_feature_text_2',
        [
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '1', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $saasp_comparison_feature_two->add_control(
        'saasp_comparison_feature_icon_2',
        [
            'label' => esc_html__( 'Icon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::ICONS,
            'label_block' => true,
            'skin' => 'inline',
            'default' => [
                'value' => 'fas fa-check',
                'library' => 'fa-solid',
            ],
            'exclude_inline_options' => [ 'svg' ],
        ]
    );

    $saasp_comparison_feature_two->end_popover();


    $this->add_control(
        'saasp_comparison_table_feature_list_2',
        [
            'label' => esc_html__( 'Features List', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::REPEATER,
            'fields' =>  $saasp_comparison_feature_two->get_controls(),
            'default' => [
                [
                    'saasp_comparison_show_features_tooltip' => 'yes',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Item content. Click the edit button to change this text.', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 1', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_1' => esc_html__( '1', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_2' => esc_html__( '2', SAAS_PRICINNG_TXT_DOMAIN ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'yes',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Item content. Click the edit button to change this text.', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 2', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_1' => esc_html__( '1', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_2' => esc_html__( '2', SAAS_PRICINNG_TXT_DOMAIN ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'yes',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Item content. Click the edit button to change this text.', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 3', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_1' => esc_html__( '1', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_2' => esc_html__( '2', SAAS_PRICINNG_TXT_DOMAIN ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'yes',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Item content. Click the edit button to change this text.', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 4', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_1' => esc_html__( '1', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_2' => esc_html__( '2', SAAS_PRICINNG_TXT_DOMAIN ),
                ]
            ],
            'title_field' => '{{{ saasp_comparison_feature_title }}}',
            'condition' => [
                'saasp_comparison_select_columns' => '2',
            ],
        ]
    );

    $saasp_comparison_feature_3 = new \Elementor\Repeater();

    $saasp_comparison_feature_3->add_control(
        'saasp_comparison_show_features_tooltip',
        [
            'label' => esc_html__( 'Tooltip', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $saasp_comparison_feature_3->add_control(
        'saasp_comparison_features_tooltip_description',
        [
            'label' => esc_html__( 'Description', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora.', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_comparison_show_features_tooltip'=>'yes',
            ]
        ]
    );

    $saasp_comparison_feature_3->add_control(
        'saasp_comparison_feature_title',
        [
            'label' => esc_html__( 'Feature Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Feature', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $saasp_comparison_feature_3->add_control(
        'sassp_comparison_feature_three_text_col_1',
        [
            'label' => esc_html__( 'Cell One', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $saasp_comparison_feature_3->start_popover();

    $saasp_comparison_feature_3->add_control(
        'saasp_comparison_feature_text_1',
        [
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '1', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $saasp_comparison_feature_3->add_control(
        'saasp_comparison_feature_icon_1',
        [
            'label' => esc_html__( 'Icon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::ICONS,
            'label_block' => true,
            'skin' => 'inline',
            'default' => [
                'value' => 'fas fa-check',
                'library' => 'fa-solid',
            ],
            'exclude_inline_options' => [ 'svg' ],
        ]
    );

    $saasp_comparison_feature_3->end_popover();

    $saasp_comparison_feature_3->add_control(
        'sassp_comparison_feature_three_text_col_2',
        [
            'label' => esc_html__( 'Cell Two', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $saasp_comparison_feature_3->start_popover();

    $saasp_comparison_feature_3->add_control(
        'saasp_comparison_feature_text_2',
        [
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '2', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $saasp_comparison_feature_3->add_control(
        'saasp_comparison_feature_icon_2',
        [
            'label' => esc_html__( 'Icon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::ICONS,
            'label_block' => true,
            'skin' => 'inline',
            'default' => [
                'value' => 'fas fa-check',
                'library' => 'fa-solid',
            ],
            'exclude_inline_options' => [ 'svg' ],
        ]
    );

    $saasp_comparison_feature_3->end_popover();

    $saasp_comparison_feature_3->add_control(
        'sassp_comparison_feature_three_text_col_3',
        [
            'label' => esc_html__( 'Cell Three', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $saasp_comparison_feature_3->start_popover();

    $saasp_comparison_feature_3->add_control(
        'saasp_comparison_feature_text_3',
        [
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '3', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $saasp_comparison_feature_3->add_control(
        'saasp_comparison_feature_icon_3',
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

    $saasp_comparison_feature_3->end_popover();

    $this->add_control(
        'saasp_comparison_table_feature_list_3',
        [
            'label' => esc_html__( 'Features List', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::REPEATER,
            'fields' =>  $saasp_comparison_feature_3->get_controls(),
            'default' => [
                [
                    'saasp_comparison_show_features_tooltip' => 'yes',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Item content. Click the edit button to change this text.', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 1', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_1' => esc_html__( '1', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_2' => esc_html__( '2', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_3' => esc_html__( '3', SAAS_PRICINNG_TXT_DOMAIN ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'yes',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Item content. Click the edit button to change this text.', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 2', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_1' => esc_html__( '1', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_2' => esc_html__( '2', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_3' => esc_html__( '3', SAAS_PRICINNG_TXT_DOMAIN ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'yes',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Item content. Click the edit button to change this text.', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 3', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_1' => esc_html__( '1', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_2' => esc_html__( '2', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_3' => esc_html__( '3', SAAS_PRICINNG_TXT_DOMAIN ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'yes',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Item content. Click the edit button to change this text.', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 4', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_1' => esc_html__( '1', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_2' => esc_html__( '2', SAAS_PRICINNG_TXT_DOMAIN ),
                    'saasp_comparison_feature_text_3' => esc_html__( '3', SAAS_PRICINNG_TXT_DOMAIN ),
                ]
            ],
            'title_field' => '{{{ saasp_comparison_feature_title }}}',
            'condition' => [
                'saasp_comparison_select_columns' => '3',
            ],

        ]
    );

    $this->add_control(
        'saaspricing_comparison_features_title_alignment',
        [
            'label' => esc_html__( 'Feature Alignment', SAAS_PRICINNG_TXT_DOMAIN ),
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
            'default' => 'left',
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} td.saaspricing-feature-main' => 'text-align: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'saaspricing_comparison_features_cell_alignment',
        [
            'label' => esc_html__( 'Cell Alignment', SAAS_PRICINNG_TXT_DOMAIN ),
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
                '{{WRAPPER}} td.saaspricing-cell' => 'text-align: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_cta_section_starts',
        [
            'label' => esc_html__( 'CTA', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>   Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'saasp_column_one_primary_cta',
        [
            'label' => esc_html__( 'Column One', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_primary_cta_popover_1',
        [
            'label' => esc_html__( 'Primary', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->start_popover();

    $this->add_control(
        'saasp_primary_cta_switch_1',
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
        'saasp_primary_cta_text_1',
        [
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Get Started', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_primary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_primary_cta_url_1',
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
                'saasp_primary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_primary_cta_size_1',
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
                'saasp_primary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_primary_cta_icon_1',
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
                'saasp_primary_cta_switch_1' => 'yes',
            ]
        ]
    );
    
    $this->add_responsive_control(
        'saasp_primary_cta_icon_spacing_1',
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
                '{{WRAPPER}} .saaspricing-icon-spacing-1' => 'padding-left: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_primary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_primary_cta_id_1',
        [
            'label' => esc_html__( 'Button ID', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'btn-id-1', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_primary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->end_popover();


    // Column 1 Secondary

    $this->add_control(
        'saasp_secondary_cta_popover_1',
        [
            'label' => esc_html__( 'Secondary', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->start_popover();

    $this->add_control(
        'saasp_secondary_cta_switch_1',
        [
            'label' => esc_html__( 'Secondary', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );

    $this->add_control(
        'saasp_secondary_cta_text_1',
        [
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Learn More...', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_secondary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_secondary_cta_url_1',
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
                'saasp_secondary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_secondary_cta_size_1',
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
                'saasp_secondary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_secondary_cta_icon_1',
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
                'saasp_secondary_cta_switch_1' => 'yes',
            ]
        ]
    );
    
    $this->add_responsive_control(
        'saasp_secondary_cta_icon_spacing_1',
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
                '{{WRAPPER}} .your-class' => 'width: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_secondary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_secondary_cta_id_1',
        [
            'label' => esc_html__( 'Button ID', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'btn-secondary-1', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_secondary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->end_popover();
 

    $this->add_control(
        'saasp_primary_cta_2',
        [
            'label' => esc_html__( 'Column Two', SAAS_PRICINNG_TXT_DOMAIN ), 
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' =>[
                'saasp_comparison_select_columns' => ['2','3'],
            ]
        ]
    );

    $this->add_control(
        'saasp_primary_cta_popover_2',
        [
            'label' => esc_html__( 'Primary', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
            'condition' =>[
                'saasp_comparison_select_columns' => ['2','3'],
            ]
        ]
    );

    $this->start_popover();

    $this->add_control(
        'saasp_primary_cta_switch_2',
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
        'saasp_primary_cta_text_2',
        [
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Get Started', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_primary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_primary_cta_url_2',
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
                'saasp_primary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_primary_cta_size_2',
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
                'saasp_primary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_primary_cta_icon_2',
        [
            'label' => esc_html__( 'Icon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas  fa-arrow-right',
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
                'saasp_primary_cta_switch_2' => 'yes',
            ]
        ]
    );
    
    $this->add_responsive_control(
        'saasp_primary_cta_icon_spacing_2',
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
                '{{WRAPPER}} .saaspricing-icon-spacing-2' => 'padding-left: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_primary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_primary_cta_id_2',
        [
            'label' => esc_html__( 'Button ID', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'btn-id-2', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_primary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_secondary_cta_popover_2',
        [
            'label' => esc_html__( 'Secondary', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
            'condition' =>[
                'saasp_comparison_select_columns' => ['2','3'],
            ]
        ]
    );

    $this->start_popover();

    $this->add_control(
        'saasp_secondary_cta_switch_2',
        [
            'label' => esc_html__( 'Secondary', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );

    $this->add_control(
        'saasp_secondary_cta_text_2',
        [
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Learn More...', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_secondary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_secondary_cta_url_2',
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
                'saasp_secondary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_secondary_cta_size_2',
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
                'saasp_secondary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_secondary_cta_icon_2',
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
                'saasp_secondary_cta_switch_2' => 'yes',
            ]
        ]
    );
    
    $this->add_responsive_control(
        'saasp_secondary_cta_icon_spacing_2',
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
                '{{WRAPPER}} .your-class' => 'width: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_secondary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_secondary_cta_id_2',
        [
            'label' => esc_html__( 'Button ID', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'btn-secondary-2', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_secondary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_primary_cta',
        [
            'label' => esc_html__( 'Column Three', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' =>[
                'saasp_comparison_select_columns' => '3',
            ]
        ]
    );

    $this->add_control(
        'saasp_primary_cta_popover_3',
        [
            'label' => esc_html__( 'Primary', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
            'condition' =>[
                'saasp_comparison_select_columns' => '3',
            ]
        ]
    );

    $this->start_popover();

    $this->add_control(
        'saasp_primary_cta_switch_3',
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
        'saasp_primary_cta_text_3',
        [
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Get Started', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_primary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_primary_cta_url_3',
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
                'saasp_primary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_primary_cta_size_3',
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
                'saasp_primary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_primary_cta_icon_3',
        [
            'label' => esc_html__( 'Icon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas  fa-arrow-right',
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
                'saasp_primary_cta_switch_3' => 'yes',
            ]
        ]
    );
    
    $this->add_responsive_control(
        'saasp_primary_cta_icon_spacing_3',
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
                '{{WRAPPER}} .saaspricing-icon-spacing-3' => 'padding-left: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_primary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_primary_cta_id_3',
        [
            'label' => esc_html__( 'Button ID', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'btn-id-3', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_primary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_secondary_cta_popover_3',
        [
            'label' => esc_html__( 'Secondary', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'yes',
            'condition' =>[
                'saasp_comparison_select_columns' => '3',
            ]
        ]
    );

    $this->start_popover();

    $this->add_control(
        'saasp_secondary_cta_switch_3',
        [
            'label' => esc_html__( 'Secondary', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Hide', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );

    $this->add_control(
        'saasp_secondary_cta_text_3',
        [
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Learn More...', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_secondary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_secondary_cta_url_3',
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
                'saasp_secondary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_secondary_cta_size_3',
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
                'saasp_secondary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_secondary_cta_icon_3',
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
                'saasp_secondary_cta_switch_3' => 'yes',
            ]
        ]
    );
    
    $this->add_responsive_control(
        'saasp_secondary_cta_icon_spacing_3',
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
                '{{WRAPPER}} .your-class' => 'width: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_secondary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_secondary_cta_id_3',
        [
            'label' => esc_html__( 'Button ID', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'btn-secondary-3', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' =>[
                'saasp_secondary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->end_popover();

    $this->add_control(
        'text_align',
        [
            'label' => esc_html__( 'CTA Alignment', 'textdomain' ),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => esc_html__( 'Left', 'textdomain' ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => esc_html__( 'Center', 'textdomain' ),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => esc_html__( 'Right', 'textdomain' ),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'default' => 'center',
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-cta-main' => 'text-align: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_comparison_style_header_review_section',
        [
            'label' => esc_html__( 'Review', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_comparison_style_header_review_satar_heading',
        [
            'label' => esc_html__( 'Stars', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_responsive_control(
        'saasp_comparison_header_review_spacing',
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
        'saasp_comparison_header_review_star_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-yellow' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_header_review_unmark_star_color',
        [
            'label' => esc_html__( 'Unmark Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-unmark' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_style_header_review_text_heading',
        [
            'label' => esc_html__( 'Text', SAAS_PRICINNG_TXT_DOMAIN ), 
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_comparison_header_review_text_color',
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
            'name' => 'saaspricing_review_text_typography',
            'selector' => '{{WRAPPER}} .saaspricing-review-text',
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_comparison_features_style_tab',
        [
            'label' => esc_html__( 'Features', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_comparison_features_icon_section',
        [
            'label' => esc_html__( 'Icon', SAAS_PRICINNG_TXT_DOMAIN ), 
            'type' =>  Controls_Manager::HEADING,
        ]
    );

    $this->add_control(
        'saasp_comparison_features_icon_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-feature-list td.saaspricing-cell i' => 'color: {{VALUE}}',
                '{{WRAPPER}} .saaspricing-feature-list td.saaspricing-cell svg' => 'color: {{VALUE}} ',
            ],
        ]
    );
    
    $this->add_responsive_control(
        'saaspricing_comparison_features_icon_size',
        [
            'label' => esc_html__( 'Size', SAAS_PRICINNG_TXT_DOMAIN ),
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
                '{{WRAPPER}} .saaspricing-feature-list td.saaspricing-cell span.saaspricing-cell-icon' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_feature_title_section',
        [
            'label' => esc_html__( 'Feature Title', SAAS_PRICINNG_TXT_DOMAIN ), 
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_comparison_feature_title_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-feature-title' => 'color: {{VALUE}}',
            ],
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
        'saasp_comparison_feature_title_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-feature-main' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_feature_cell',
        [
            'label' => esc_html__( 'Cell', SAAS_PRICINNG_TXT_DOMAIN ), 
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_comparison_cell_color',
        [
            'label' => esc_html__( 'Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-cell span.saaspricing-cell-text' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
         Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparison_feature_cell_typography',
            'selector' => '{{WRAPPER}} .saaspricing-cell span.saaspricing-cell-text',
        ]
    );

    $this->add_responsive_control(
        'saasp_feature_cell_padding',
        [
            'label' => esc_html__( 'Padding', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} tr.saaspricing-feature-list td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    
    $this->start_controls_tabs( 'saasp_cell_normal_hover_background' );
	
    $this->start_controls_tab(
		'saasp_cell_normal_background_color',
		[
			'label' => esc_html__( 'Normal', SAAS_PRICINNG_TXT_DOMAIN),

		]
	);

    $this->add_control(
        'saasp_comparison_cell_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} tr.saaspricing-feature-list' => 'background: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
		'saasp_cell_hover_background_color',
		[
			'label' => esc_html__( 'Hover', SAAS_PRICINNG_TXT_DOMAIN),

		]
	);

    $this->add_control(
        'saasp_comparison_cell_hover_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} tr.saaspricing-feature-list:hover' => 'background: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_comparison_cta_section',
        [
            'label' => esc_html__( 'CTA', 'textdomain' ),
            'tab' =>   Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_section',
        [
            'label' => esc_html__( 'Primary CTA', 'textdomain' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->start_controls_tabs(
        'saasp_comparison_primary_cta_hover_normal_text_color'
    );

    $this->start_controls_tab(
        'saasp_comparison_primary_cta_normal_text',
        [
            'label' => esc_html__( 'Normal', 'textdomain' ),
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_normal_text_color',
        [
            'label' => esc_html__( 'Color', 'textdomain' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-btn' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'saasp_comparison_primary_cta_hover_text',
        [
            'label' => esc_html__( 'Hover', 'textdomain' ),
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_hover_text_color',
        [
            'label' => esc_html__( 'Color', 'textdomain' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-btn:hover' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->add_group_control(
         Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparison_primary_cta_typography',
            'selector' => '{{WRAPPER}} .saaspricing-primary-btn',
        ]
    );

    $this->start_controls_tabs(
        'saasp_comparison_primary_cta_hover_normal_background_color'
    );

    $this->start_controls_tab(
        'saasp_comparison_primary_cta_normal_background',
        [
            'label' => esc_html__( 'Normal', 'textdomain' ),
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_normal_background_color',
        [
            'label' => esc_html__( 'Background Color', 'textdomain' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-btn' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'saasp_comparison_primary_cta_hover_background',
        [
            'label' => esc_html__( 'Hover', 'textdomain' ),
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_hover_background_color',
        [
            'label' => esc_html__( 'Background Color', 'textdomain' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-btn:hover' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_comparison_primary_cta_border',
            'selector' => '{{WRAPPER}} .saaspricing-primary-btn',
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'textdomain' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
         Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_comparison_primary_cta_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-primary-btn',
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_padding',
        [
            'label' => esc_html__( 'Padding', 'textdomain' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_section',
        [
            'label' => esc_html__( 'Secondary CTA', 'textdomain' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->start_controls_tabs(
        'saasp_comparison_secondary_cta_hover_normal_text_color'
    );

    $this->start_controls_tab(
        'saasp_comparison_secondary_cta_normal_text',
        [
            'label' => esc_html__( 'Normal', 'textdomain' ),
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_normal_text_color',
        [
            'label' => esc_html__( 'Color', 'textdomain' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-btn' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'saasp_comparison_secondary_cta_hover_text',
        [
            'label' => esc_html__( 'Hover', 'textdomain' ),
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_hover_text_color',
        [
            'label' => esc_html__( 'Color', 'textdomain' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-btn:hover' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->add_group_control(
         Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparison_secondary_cta_typography',
            'selector' => '{{WRAPPER}} .saaspricing-secondary-btn',
        ]
    );

    $this->start_controls_tabs(
        'saasp_comparison_secondary_cta_hover_normal_background_color'
    );

    $this->start_controls_tab(
        'saasp_comparison_secondary_cta_normal_background',
        [
            'label' => esc_html__( 'Normal', 'textdomain' ),
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_normal_background_color',
        [
            'label' => esc_html__( 'Background Color', 'textdomain' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-btn' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'saasp_comparison_secondary_cta_hover_background',
        [
            'label' => esc_html__( 'Hover', 'textdomain' ),
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_hover_background_color',
        [
            'label' => esc_html__( 'Background Color', 'textdomain' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-btn:hover' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'saasp_comparison_secondary_cta_border',
            'selector' => '{{WRAPPER}} .saaspricing-secondary-btn',
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'textdomain' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
         Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_comparison_secondary_cta_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-secondary-btn',
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_padding',
        [
            'label' => esc_html__( 'Padding', 'textdomain' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_cata_background_color',
        [
            'label' => esc_html__( 'Background Color', 'textdomain' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} td.footer-cta' => 'background-color: {{VALUE}}',
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
  <!-- pricing comparison table start  -->
  <div class="saaspricing-main table-responsive-lg position-relative">
            <table class="saaspricing-table" role="presentation">
                <!-- table header start  -->
                <thead class="tableHeader"  id="tableHeader">

                    <!-- highlights the most popular plan -->
                    <?php
                    if( 'yes' === $settings['saasp_comparison_show_ribbon_1']  ||  'yes' === $settings['saasp_comparison_show_countdown_1']  ||  'yes' === $settings['saasp_comparison_show_ribbon_2'] || 'yes' === $settings['saasp_comparison_show_countdown_2'] ||  'yes' === $settings['saasp_comparison_show_ribbon_3'] ||  'yes' === $settings['saasp_comparison_show_countdown_3'] ){
                    ?>
                    <tr class="saaspricing-ribbon-table-row">
                    <td></td>
                     <?php
                      $saasp_expdate_one = $settings['saasp_comparison_expire_date_1'];
                      $saasp_expdate_two = $settings['saasp_comparison_expire_date_2'];
                      $saasp_expdate_three =  $settings['saasp_comparison_expire_date_3'];
                      for($i = 1, $j = 0; $i <= $settings['saasp_comparison_select_columns'], $j < $settings['saasp_comparison_select_columns']; $i++, $j++){
                     ?>
                      <td class="ribbon-wrapper" data-exp-date-one="<?php echo esc_attr($saasp_expdate_one); ?>" data-exp-date-two="<?php echo esc_attr($saasp_expdate_two); ?>" data-exp-date-three="<?php echo esc_attr($saasp_expdate_three); ?>">
                        <?php
                        if( 'yes' === $settings['saasp_comparison_show_ribbon_'.$i] ||  'yes' === $settings['saasp_comparison_show_countdown_'.$i] ){
                        ?>
                        <div class="saaspricing-common-ribbon">
                            <div class="saaspricing-ribbon-title">
                            <?php
                            if($settings['saasp_comparison_ribbon_title_'.$i]){
                            echo esc_html($settings['saasp_comparison_ribbon_title_'.$i]);
                            }
                            ?>
                            </div>
                           
                            <div class="saaspricing-countdown fs-sm" style="margin-bottom: 0;"> 
                            <?php
                            if($settings['saasp_comparison_show_countdown_'.$i] &&  "" !== $settings['saasp_comparison_show_countdown_'.$i]){
                            ?>
                            <div class="show-expire-date" data-countdown-index="<?php echo esc_attr($j); ?>" data-expire-date-<?php echo esc_attr($i); ?>="<?php echo esc_attr($settings['saasp_comparison_expire_date_'.$i]); ?>"></div>
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                       </td>
                       <?php
                        }
                       ?>
                    </tr>
                    <?php
                    }
                    ?>
                    <!-- package title start -->

                   
                    <!-- == Table Heading == -->

                    <?php
                     if( '1' === $settings['saasp_comparison_select_columns'] ){
                      if('' !== $settings['saasp_comparison_header_title_text_1'] || '' !== $settings['saasp_comparison_header_title_des_1']){
                    ?>
                    <tr class="price-table-head">
                        <td></td>
                            <td class="saaspricing-table-head">
                            <?php esc_html(printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', $settings['saasp_comparison_column_html_title_tag'], $settings['saasp_comparison_header_title_text_1']));?>
                            <small class="fs-sm"><?php echo esc_html($settings['saasp_comparison_header_title_des_'.$i]); ?></small>
                            </td>
                    </tr>
                    <?php
                      }
                     }elseif('2' === $settings['saasp_comparison_select_columns']){
                      if('' !== $settings['saasp_comparison_header_title_text_1'] || '' !== $settings['saasp_comparison_header_title_des_1'] 
                      || '' !== $settings['saasp_comparison_header_title_text_2'] || '' !== $settings['saasp_comparison_header_title_des_2']){
                    ?>
                     <tr class="price-table-head">
                        <td></td>
                        <td class="saaspricing-table-head">
                            <?php esc_html(printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', $settings['saasp_comparison_column_html_title_tag'], $settings['saasp_comparison_header_title_text_1']));?>
                            <small class="fs-sm"><?php echo esc_html($settings['saasp_comparison_header_title_des_1']); ?></small>
                        </td>
                        <td class="saaspricing-table-head">
                            <?php esc_html(printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', $settings['saasp_comparison_column_html_title_tag'], $settings['saasp_comparison_header_title_text_2']));?>
                            <small class="fs-sm"><?php echo esc_html($settings['saasp_comparison_header_title_des_2']); ?></small>
                        </td>
                    </tr>
                    <?php
                      }
                      }elseif('3' === $settings['saasp_comparison_select_columns']){
                        if('' !== $settings['saasp_comparison_header_title_text_1'] || 
                        '' !== $settings['saasp_comparison_header_title_des_1'] || '' !== $settings['saasp_comparison_header_title_text_2'] || 
                        '' !== $settings['saasp_comparison_header_title_des_2'] || '' !== $settings['saasp_comparison_header_title_text_3'] ||
                         '' !== $settings['saasp_comparison_header_title_des_3']){
                    ?>
                    <tr class="price-table-head">
                        <td></td>
                        <td class="saaspricing-table-head">
                            <?php esc_html(printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', $settings['saasp_comparison_column_html_title_tag'], $settings['saasp_comparison_header_title_text_1']));?>
                            <small class="fs-sm"><?php echo esc_html($settings['saasp_comparison_header_title_des_1']); ?></small>
                        </td>
                        <td class="saaspricing-table-head">
                            <?php esc_html(printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', $settings['saasp_comparison_column_html_title_tag'], $settings['saasp_comparison_header_title_text_2']));?>
                            <small class="fs-sm"><?php echo esc_html($settings['saasp_comparison_header_title_des_2']); ?></small>
                        </td>
                        <td class="saaspricing-table-head">
                            <?php esc_html(printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', $settings['saasp_comparison_column_html_title_tag'], $settings['saasp_comparison_header_title_text_3']));?>
                            <small class="fs-sm"><?php echo esc_html($settings['saasp_comparison_header_title_des_3']); ?></small>
                        </td>
                    </tr>
                    <?php
                    }
                    }
                    ?>

                    <tr>
                        <td class="saaspricing-table-title-des"> 
                        <?php
                        if( '' !== $settings['saasp_comparison_header_table_title']){
                        ?>
                        <?php
                         esc_html(printf('<%1$s class="d-block mb-3 saaspricing-table-title" role="heading"> %2$s </%1$s>', $settings['saasp_comparison_header_table_title_tag'], $settings['saasp_comparison_header_table_title']))
                        ?>
                        <?php
                        }
                        ?>
                        <?php
                        if('' !== $settings['saasp_comparison_header_table_description'] ){
                        ?>
                        <span class="d-block fs-sm w-sm-100 saaspricing-table-description">
                        <?php echo esc_html($settings['saasp_comparison_header_table_description']); ?>
                        </span>
                        <?php
                        }
                        ?>
                        </td>

                        <?php
                        for($i = 1; $i <= $settings['saasp_comparison_select_columns'] ; $i++){
                        ?>
                        <td class="price saaspricing-original-price">

                            <a  class="<?php if('yes' === $settings['saasp_comparison_media_light_box_'.$i]){ echo esc_attr('image-popup-vertical-fit'); }?>" href="<?php echo esc_url($settings['saasp_comparison_choose_media_'.$i]['url']); ?>">
                                <img src="<?php echo esc_url($settings['saasp_comparison_choose_media_'.$i]['url']); ?>" class="<?php echo esc_attr('saaspricing-header-image-'.$i) ?>" >
                            </a>
                    
                            <div class="saasspricing-pricing-block" >
                            <?php
                             if('yes' === $settings['saasp_comparison_sale_'.$i]){
                            ?>
                            <s class="saaspricing-original-slashed-price me-2">
                            <?php
                            if('none' !== $settings['saasp_comparison_currency_symbol_'.$i] && 'yes' === $settings['saasp_comparison_sale_'.$i]){
                            ?>
                            <span>
                            <?php
                            if('custom' !== $settings['saasp_comparison_currency_symbol_'.$i]){
                                echo esc_html($this->get_currency_symbol($settings['saasp_comparison_currency_symbol_'.$i]));
                            }else{
                                echo esc_html($settings['saasp_comparison_currency_symbol_custom_'.$i]);
                            }
                            ?>
                            </span>
                            <?php
                            }
                            ?>
                            <?php
                            if('' !== $settings['saasp_comparison_original_price_'.$i]){
                            ?>
                            <span><?php echo esc_html($settings['saasp_comparison_original_price_'.$i]); ?></span>
                            <?php
                            }
                            ?>
                            </s>
                            <?php
                             }
                            ?>

                            <?php
                            if('none' !== $settings['saasp_comparison_currency_symbol_'.$i] && 'before' === $settings['saasp_comparison_header_pricing_symbol_position']){
                            ?>
                            <span class="saaspricing-price-text saaspricing-price-symbol">
                            <?php
                            if('custom' !== $settings['saasp_comparison_currency_symbol_'.$i]){
                                echo esc_html($this->get_currency_symbol($settings['saasp_comparison_currency_symbol_'.$i]));
                            }else{
                                echo esc_html($settings['saasp_comparison_currency_symbol_custom_'.$i]);
                            }
                            ?>
                            </span>
                            <?php
                            }
                            ?>
                            <?php
                            if('' === $settings['saasp_comparison_currency_format_'.$i] ){ 
                            ?>
                            <span class="saaspricing-price-text saaspricing-price-typography"><?php echo esc_html(explode(".", $settings['sassp_comparison_price_'.$i])[0]); ?></span>
                            <?php
                            if('' !== explode(".", $settings['sassp_comparison_price_'.$i])[1]){
                            ?>
                            <span class="saaspricing-price-text saaspricing-fraction-price"><?php echo esc_html(explode(".", $settings['sassp_comparison_price_'.$i])[1]); ?></span>
                            <?php
                            }
                            ?>
                            <?php
                            }else{
                            ?>
                            <span class="saaspricing-price-text saaspricing-price-typography"><?php echo esc_html($settings['sassp_comparison_price_'.$i]); ?></span>
                            <?php
                            }
                            ?>
                            <?php
                            if('none' !== $settings['saasp_comparison_currency_symbol_'.$i] && 'after' === $settings['saasp_comparison_header_pricing_symbol_position']){
                            ?>
                            <span class="saaspricing-price-text saaspricing-price-symbol">
                            <?php
                            if('custom' !== $settings['saasp_comparison_currency_symbol_'.$i]){
                                echo esc_html($this->get_currency_symbol($settings['saasp_comparison_currency_symbol_'.$i]));
                            }else{
                                echo esc_html($settings['saasp_comparison_currency_symbol_custom_'.$i]);
                            }
                            ?>
                            </span>
                            <?php
                            }
                            ?>
                            <?php
                            if('' !== $settings['saasp_comparison_period_'.$i])
                            ?>
                            <span class="saaspricing-period <?php if( 'below' === $settings['saasp_header_period_position']){echo esc_attr('w-100 mt-1');} ?>">
                             <?php
                             echo esc_html($settings['saasp_comparison_period_'.$i]);
                             ?>
                            </span>
                            <?php
                            ?>
                            </div>
                            <?php
                            if('yes' === $settings['saasp_comparison_show_rating_'.$i]){
                            ?>
                            <div class="ratings">
                                <div class="saaspricing-star-icon fs-6"> 
                                 <?php                                    
                                    $saasp_rating = $settings['saasp_comparison_rating_num_'.$i];
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
                                     for($j=0; $j < 5 - ceil($settings['saasp_comparison_rating_num_'.$i]); $j++){
                                    ?>
                                    <span>
                                        <i class="fas fa-star-half saaspricing-star-left saaspricing-unmark"></i>
                                        <i class="fas fa-star-half saaspricing-star-right saaspricing-unmark"></i>
                                    </span>
                                    <?php
                                     }
                                    ?>
                                    <?php
                                    if(''!==$settings['saasp_comparison_rating_counter_'.$i]){
                                    ?>
                                    <small class="saaspricing-review-text"> 
                                    (<?php echo esc_html($settings['saasp_comparison_rating_counter_'.$i]); ?>) 
                                    </small>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </td>
                        <?php
                        }
                        ?> 
                    </tr>

                </thead>
                <!-- table header end  -->

                <!-- table body start  -->
                <tbody>

                    <!-- features section start -->

                    <?php
                    if('1' === $settings['saasp_comparison_select_columns'] && $settings['saasp_comparison_table_feature_list_1']){
                    foreach($settings['saasp_comparison_table_feature_list_1'] as $saasp_features_one){
                    ?>
                    <tr class="saaspricing-feature-list">
                        <td class="saaspricing-feature-main">
                         <?php
                         if( 'yes' === $saasp_features_one['saasp_comparison_show_features_tooltip']){
                         ?>
                         <span data-bs-toggle="tooltip" data-bs-placement="top"
                         title="<?php echo esc_attr($saasp_features_one['saasp_comparison_features_tooltip_description']); ?>"
                         class="price-table-help">
                         <i class="far fa-fw fa-question-circle"></i>
                         </span> 
                         <?php
                         }
                         ?>
                         <span class="saaspricing-feature-title"><?php echo esc_html($saasp_features_one['saasp_comparison_feature_title']); ?></span> 
                        </td>
                        <td class="saaspricing-cell">
                         <span class="saaspricing-cell-icon"><?php Icons_Manager::render_icon( $saasp_features_one['saasp_comparison_feature_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                         <span class="saaspricing-cell-text"><?php echo esc_html($saasp_features_one['saasp_comparison_feature_text']); ?></span>
                       </td>
                    </tr>
                    <?php
                     }
                    }elseif('2' === $settings['saasp_comparison_select_columns'] && $settings['saasp_comparison_table_feature_list_2']){
                     foreach($settings['saasp_comparison_table_feature_list_2'] as $saasp_features_two){
                    ?>
                       <tr class="saaspricing-feature-list">
                        <td class="saaspricing-feature-main">
                         <?php
                         if( 'yes' === $saasp_features_two['saasp_comparison_show_features_tooltip']){
                         ?>
                         <span data-bs-toggle="tooltip" data-bs-placement="top"
                         title="<?php echo esc_attr($saasp_features_two['saasp_comparison_features_tooltip_description']); ?>"
                         class="price-table-help">
                         <i class="far fa-fw fa-question-circle"></i>
                         </span> 
                         <?php
                         }
                         ?>
                         <span class="saaspricing-feature-title"><?php echo esc_html($saasp_features_two['saasp_comparison_feature_title']); ?></span> 
                        </td>
                        <td class="saaspricing-cell">
                         <span class="saaspricing-cell-icon"> <?php Icons_Manager::render_icon( $saasp_features_two['saasp_comparison_feature_icon_1'], [ 'aria-hidden' => 'true' ] ); ?></span>
                         <span class="saaspricing-cell-text"><?php echo esc_html($saasp_features_two['saasp_comparison_feature_text_1']); ?></span>
                        </td>
                        <td class="saaspricing-cell">
                         <span class="saaspricing-cell-icon"> <?php Icons_Manager::render_icon( $saasp_features_two['saasp_comparison_feature_icon_2'], [ 'aria-hidden' => 'true' ] ); ?></span>
                         <span class="saaspricing-cell-text"><?php echo esc_html($saasp_features_two['saasp_comparison_feature_text_2']); ?></span>
                       </td>
                    </tr>
                    <?php
                     }
                    }elseif('3' === $settings['saasp_comparison_select_columns'] && $settings['saasp_comparison_table_feature_list_3']){
                     foreach($settings['saasp_comparison_table_feature_list_3'] as $saasp_features_three){
                    ?>
                     <tr class="saaspricing-feature-list">
                        <td class="saaspricing-feature-main">
                         <?php
                         if( 'yes' === $saasp_features_three['saasp_comparison_show_features_tooltip']){
                         ?>
                         <span data-bs-toggle="tooltip" data-bs-placement="top"
                         title="<?php echo esc_attr($saasp_features_three['saasp_comparison_features_tooltip_description']); ?>"
                         class="price-table-help">
                         <i class="far fa-fw fa-question-circle"></i>
                         </span> 
                         <?php
                         }
                         ?>
                         <span class="saaspricing-feature-title"><?php echo esc_html($saasp_features_three['saasp_comparison_feature_title']); ?></span> 
                        </td>
                        <td class="saaspricing-cell">
                         <span class="saaspricing-cell-icon"><?php Icons_Manager::render_icon( $saasp_features_three['saasp_comparison_feature_icon_1'], [ 'aria-hidden' => 'true' ] ); ?></span>
                         <span class="saaspricing-cell-text"><?php echo esc_html($saasp_features_three['saasp_comparison_feature_text_1']); ?></span>
                        </td>
                        <td class="saaspricing-cell">
                         <span class="saaspricing-cell-icon"><?php Icons_Manager::render_icon( $saasp_features_three['saasp_comparison_feature_icon_2'], [ 'aria-hidden' => 'true' ] ); ?></span>
                         <span class="saaspricing-cell-text"><?php echo esc_html($saasp_features_three['saasp_comparison_feature_text_2']); ?></span>
                        </td>
                         <td class="saaspricing-cell">
                         <span class="saaspricing-cell-icon"><?php Icons_Manager::render_icon( $saasp_features_three['saasp_comparison_feature_icon_3'], [ 'aria-hidden' => 'true' ] ); ?></span>
                         <span class="saaspricing-cell-text"><?php echo esc_html($saasp_features_three['saasp_comparison_feature_text_3']); ?></span>
                        </td>
                    </tr>
                    <?php
                     }
                    }
                    ?>
                    

                    <!-- features section end -->

                </tbody>
                <!-- table body end  -->

                <!-- table footer start  -->
                <tfoot>
                    <!-- cta start  -->
                    <tr class="saaspricing-cta-main">
                        <td></td>
                        <?php
                        for($i= 1; $i <= $settings['saasp_comparison_select_columns']; $i++){
                        if ( ! empty( $settings['saasp_primary_cta_url_'.$i]['url'] ) ) {
                            $this->add_link_attributes( 'saasp_primary_cta_url_'.$i, $settings['saasp_primary_cta_url_'.$i] );
                        }elseif( ! empty( $settings['saasp_secondary_cta_url_'.$i]['url'] ) ){
                            $this->add_link_attributes( 'saasp_secondary_cta_url_'.$i, $settings['saasp_secondary_cta_url_'.$i] );
                        }
                        ?>
                        <td class="footer-cta">

                            <!-- Primary Button -->
                            <?php
                             if( 'yes' === $settings['saasp_primary_cta_switch_'.$i] && '' !== $settings['saasp_primary_cta_text_'.$i]){
                            ?>
                            <a class="btn btn-info saaspricing-primary-btn <?php
                             if('extra-small' === $settings['saasp_primary_cta_size_'.$i]){
                                echo esc_attr('saaspricing-xsm-btn');
                             }elseif('small' === $settings['saasp_primary_cta_size_'.$i]){
                                echo esc_attr('saaspricing-sm-btn');
                             }
                             elseif('medium' === $settings['saasp_primary_cta_size_'.$i]){
                                echo esc_attr('saaspricing-m-btn');
                             }
                             elseif('large' ===$settings['saasp_primary_cta_size_'.$i]){
                                echo esc_attr('saaspricing-l-btn');
                             }
                             elseif('extra-large' ===$settings['saasp_primary_cta_size_'.$i]){
                                echo esc_attr('saaspricing-xl-btn');
                             }
                            ?>" 
                            role="button" <?php echo $this->get_render_attribute_string( 'saasp_primary_cta_url_'.$i ); ?>
                            <?php
                            if('' !== $settings['saasp_primary_cta_id_'.$i]){
                            ?>
                            id="<?php echo esc_attr($settings['saasp_primary_cta_id_'.$i]); ?>"
                            <?php
                            }
                            ?>
                            >
                            <p class="saaspricing-btn-wraper">
                             <?php echo esc_html($settings['saasp_primary_cta_text_'.$i]); ?>
                             <span class="saaspricing-icon-spacing-<?php echo esc_attr($i); ?>">
                             <?php Icons_Manager::render_icon( $settings['saasp_primary_cta_icon_'.$i], [ 'aria-hidden' => 'true' ] ); ?>
                             </span>
                            </p>
                            </a>
                            <?php
                             }
                            ?>
                            <br/>
                            <!-- Secondary Button -->
                            <?php
                             if( 'yes' === $settings['saasp_secondary_cta_switch_'.$i] && '' !== $settings['saasp_secondary_cta_text_'.$i]){
                            ?>
                            <a class="btn btn-link mt-3 saaspricing-secondary-btn <?php
                             if('extra-small' === $settings['saasp_secondary_cta_size_'.$i]){
                                echo esc_attr('saaspricing-xsm-btn');
                             }elseif('small' === $settings['saasp_secondary_cta_size_'.$i]){
                                echo esc_attr('saaspricing-sm-btn');
                             }
                             elseif('medium' === $settings['saasp_secondary_cta_size_'.$i]){
                                echo esc_attr('saaspricing-m-btn');
                             }
                             elseif('large' === $settings['saasp_secondary_cta_size_'.$i]){
                                echo esc_attr('saaspricing-l-btn');
                             }
                             elseif('extra-large' === $settings['saasp_secondary_cta_size_'.$i]){
                                echo esc_attr('saaspricing-xl-btn');
                             }
                            ?>" 
                            role="button" <?php echo $this->get_render_attribute_string( 'saasp_secondary_cta_url_'.$i ); ?>
                            <?php
                            if('' !== $settings['saasp_secondary_cta_id_'.$i]){
                            ?>
                            id="<?php echo esc_attr($settings['saasp_secondary_cta_id_'.$i]); ?>"
                            <?php
                            }
                            ?>
                            > 
                             <?php echo esc_html($settings['saasp_secondary_cta_text_'.$i]); ?>
                             <span class="saaspricing-icon-spacing-<?php echo esc_attr($i); ?>">
                             <?php Icons_Manager::render_icon( $settings['saasp_secondary_cta_icon_'.$i], [ 'aria-hidden' => 'true' ] ); ?>
                             </span> 
                            </a>
                            <?php
                             }
                            ?>
                         </td>
                        <?php
                        }
                        ?>
                    </tr>
                </tfoot>
            </table>
        </div>
<?php
 }
}
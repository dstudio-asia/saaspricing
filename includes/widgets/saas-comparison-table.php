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
 use Elementor\Group_Control_Image_Size;
 use \Elementor\Group_Control_Css_Filter;
 use \Elementor\Group_Control_Border;
 use \Elementor\Utils;
 
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
        'saasp_select_columns',
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
        'saasp_column_html_title_tag',
        [
            'label' => esc_html__( 'Title HTML Tag', SAAS_PRICINNG_TXT_DOMAIN ),
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
        'sassp_column_one_combined_alignment',
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
                '{{WRAPPER}} .saaspricing-table tr.price-table-head td.saasp-table-head' => 'text-align: {{VALUE}};',
                '{{WRAPPER}} td.price.saaspricing-original-price' => 'text-align: {{VALUE}};',
                '{{WRAPPER}} .saasspricing-pricing-block' => 'justify-content: {{VALUE}};',
            ],
        ]
    );

    // --- Heading Content

    $this->add_control(
        'saasp_header_content_title_and_des_one',
        [
            'label' => esc_html__( 'Column One', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before',
        ]
    );

    $this->add_control(
        'saasp_header_title_text_1',
        [
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'First Head', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_block' => false,
        ]
    );

    $this->add_control(
        'saasp_header_title_des_1',
        [
            'label' => esc_html__( 'Description', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter your description', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_block' => false,
        ]
    );

    $this->add_control(
        'saasp_ribbon_popover_1',
        [
            'type' => Controls_Manager::POPOVER_TOGGLE,
            'label' => esc_html__( 'Ribbon', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
        ]
    ); 

    $this->start_popover('saasp_ribbon_popover_1');

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
        'saasp_ribbon_title_1',
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
                'saasp_comparison_show_ribbon_1'=>'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_expire_date_1',
        [
            'label' => esc_html__( 'Expire Date', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DATE_TIME,
            'label_block' => false,
            'condition' => [
                'saasp_comparison_show_countdown_1' => 'yes',
                'saasp_comparison_show_ribbon_1' => 'yes',
            ],
        ]
    );

    $this->end_popover('saasp_ribbon_popover_1');

    $this->add_control(
        'saasp_image_popover_1',
        [
            'type' => Controls_Manager::POPOVER_TOGGLE,
            'label' => esc_html__( 'Image', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
        ]
    );    

    $this->start_popover('saasp_image_popover_1');

    $this->add_control(
        'saasp_comparison_choose_media_1',
        [
            'label' => esc_html__( 'Choose Image', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'media_types'=>['image','svg'],
        ]
    );

    $this->add_control(
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

    $this->end_popover('saasp_image_popover_1');

    $this->add_control(
        'saasp_pricing_popover_1',
        [
            'type' => Controls_Manager::POPOVER_TOGGLE,
            'label' => esc_html__( 'Pricing', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
        ]
    );

    $this->start_popover('saasp_pricing_popover_1');

    $this->add_control(
        'saasp_currency_symbol_1',
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
        'saasp_currency_symbol_custom_1',
        [
            'label' => esc_html__( 'Custom Symbol', SAAS_PRICINNG_TXT_DOMAIN  ),
            'type' => Controls_Manager::TEXT,
            'condition' => [
                'saasp_currency_symbol_1' => 'custom',
            ],
        ]
    );

    $this->add_control(
        'sassp_price_1',
        [
            'label' => esc_html__( 'Price', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::TEXT,
            'default' => '39.99',
        ]
    );

    $this->add_control(
        'saasp_currency_format_1',
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
        'saasp_sale_1',
        [
            'label' => esc_html__( 'Sale', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'On', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Off', SAAS_PRICINNG_TXT_DOMAIN ),
            'default' => '',
        ]
    );

    $this->add_control(
        'saasp_original_price_1',
        [
            'label' => esc_html__( 'Original Price', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::NUMBER,
            'default' => '59',
            'condition' => [
                'saasp_sale_1' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_period_1',
        [
            'label' => esc_html__( 'Period', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Monthly', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->end_popover('saasp_pricing_popover');

    $this->add_control(
        'saasp_review_popover_1',
        [
            'label' => esc_html__( 'Review', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
        ]
    );

    $this->start_popover('saasp_review_popover_1');

     $this->add_control(
        'saasp_show_rating_1',
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
        'saasp_rating_num_1',
        [
            'label' => esc_html__( 'Rating', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::NUMBER,
            'min' => 0,
            'max' =>  5,
            'step' => .5,
            'default' => 5,
            'condition' => [
                'saasp_show_rating_1' => 'yes',
            ],
        ]
    );
    
    $this->add_control(
        'saasp_rating_counter_1',
        [
            'label' => esc_html__( 'Rating Counter', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '3k', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_show_rating_1' => 'yes',
            ],
        ]
    );

    $this->end_popover('saasp_review_popover_1');

    $this->add_control(
        'saasp_header_content_title_and_des_two',
        [
            'label' => esc_html__( 'Column Two', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before',
            'condition' => [
                'saasp_select_columns' => ['2','3'],
            ],
        ]
    );

    $this->add_control(
        'saasp_header_title_text_2',
        [
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Second Head', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_block' => false,
            'condition' => [
                'saasp_select_columns' => ['2','3'],
            ],
        ]
    );

    $this->add_control(
        'saasp_header_title_des_2',
        [
            'label' => esc_html__( 'Description', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter your description', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_block' => false,
            'condition' => [
                'saasp_select_columns' => ['2','3'],
            ],
        ]
    );

    $this->add_control(
        'saasp_ribbon_popover_2',
        [
            'label' => esc_html__( 'Ribbon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'condition' => [
                'saasp_select_columns' => ['2','3'],
            ],
        ]
    );

    $this->start_popover('saasp_ribbon_popover_2');

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
        'saasp_ribbon_title_2',
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
            'condition' => [
                'saasp_comparison_show_countdown_2' => 'yes',
                'saasp_comparison_show_ribbon_2' => 'yes',
            ],
        ]
    );

    $this->end_popover('saasp_ribbon_popover_2');

    $this->add_control(
        'saasp_image_popover_2',
        [
            'label' => esc_html__( 'Image', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'condition' => [
                'saasp_select_columns' => ['2','3'],
            ],
        ]
    );

    $this->start_popover('saasp_image_popover_2');

    $this->add_control(
        'saasp_comparison_choose_media_2',
        [
            'label' => esc_html__( 'Choose Image', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'media_types'=>['image','svg'],
        ]
    );

    $this->add_control(
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

    $this->end_popover('saasp_image_popover_2');

    $this->add_control(
        'saasp_pricing_popover_2',
        [
            'label' => esc_html__( 'Price', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'condition' => [
                'saasp_select_columns' => ['2','3'],
            ],
        ]
    );

    $this->start_popover('saasp_pricing_popover_2');

    $this->add_control(
        'saasp_currency_symbol_2',
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
        'saasp_currency_symbol_custom_2',
        [
            'label' => esc_html__( 'Custom Symbol', SAAS_PRICINNG_TXT_DOMAIN  ),
            'type' => Controls_Manager::TEXT,
            'condition' => [
                'saasp_currency_symbol_2' => 'custom',
            ],
        ]
    );

    $this->add_control(
        'sassp_price_2',
        [
            'label' => esc_html__( 'Pricing', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::TEXT,
            'default' => '39.99',
        ]
    );

    $this->add_control(
        'saasp_currency_format_2',
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
        'saasp_sale_2',
        [
            'label' => esc_html__( 'Sale', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'On', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Off', SAAS_PRICINNG_TXT_DOMAIN ),
            'default' => '',
        ]
    );

    $this->add_control(
        'saasp_original_price_2',
        [
            'label' => esc_html__( 'Original Price', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::NUMBER,
            'default' => '59',
            'condition' => [
                'saasp_sale_2' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_period_2',
        [
            'label' => esc_html__( 'Period', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Monthly', SAAS_PRICINNG_TXT_DOMAIN ),
        ]
    );

    $this->end_popover('saasp_pricing_popover_2');

    $this->add_control(
        'saasp_review_popover_2',
        [
            'label' => esc_html__( 'Review', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'condition' => [
                'saasp_select_columns' => ['2','3'],
            ],
        ]
    );

    $this->start_popover('saasp_review_popover_2');

     $this->add_control(
        'saasp_show_rating_2',
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
        'saasp_rating_num_2',
        [
            'label' => esc_html__( 'Rating', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::NUMBER,
            'min' => 0,
            'max' =>  5,
            'step' => .5,
            'default' => 5,
            'condition' => [
                'saasp_show_rating_2' => 'yes',
            ],
        ]
    );
    
    $this->add_control(
        'saasp_rating_counter_2',
        [
            'label' => esc_html__( 'Rating Counter', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '3k', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_show_rating_2' => 'yes',
            ],
        ]
    );

    $this->end_popover('saasp_review_popover_2');

    $this->add_control(
        'saasp_header_content_title_and_des_three',
        [
            'label' => esc_html__( 'Column Three', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=> 'before',
            'condition' => [
                'saasp_select_columns' => '3',
            ],
        ]
    );

    $this->add_control(
        'saasp_header_title_text_3',
        [
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Third Head', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_block' => false,
            'condition' => [
                'saasp_select_columns' => '3',
            ],
        ]
    );

    $this->add_control(
        'saasp_header_title_des_3',
        [
            'label' => esc_html__( 'Description', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter your description', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_block' => false,
            'condition' => [
                'saasp_select_columns' => '3',
            ],
        ]
    );

    $this->add_control(
        'saasp_ribbon_popover_3',
        [
            'label' => esc_html__( 'Ribbon', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'condition' => [
                'saasp_select_columns' => '3',
            ],
        ]
    );

    $this->start_popover('saasp_ribbon_popover_3');

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
        'saasp_ribbon_title_3',
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
            'condition' => [
                'saasp_comparison_show_countdown_3' => 'yes',
                'saasp_comparison_show_ribbon_2' => 'yes',
            ],
        ]
    );

    $this->end_popover('saasp_ribbon_popover_3');

    $this->add_control(
        'saasp_image_popover_3',
        [
            'label' => esc_html__( 'Image', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'condition' => [
                'saasp_select_columns' => '3',
            ],
        ]
    );

    $this->start_popover('saasp_image_popover_3');

    $this->add_control(
        'saasp_comparison_choose_media_3',
        [
            'label' => esc_html__( 'Choose Image', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'media_types'=>['image','svg'],
        ]
    );

    $this->add_control(
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

    $this->end_popover('saasp_image_popover_3');

    $this->add_control(
        'saasp_pricing_popover_3',
        [
            'label' => esc_html__( 'Pricing', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'condition' => [
                'saasp_select_columns' => '3',
            ],
        ]
    );

    $this->start_popover('saasp_pricing_popover_3');

    $this->add_control(
        'saasp_currency_symbol_3',
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
        'saasp_currency_symbol_custom_3',
        [
            'label' => esc_html__( 'Custom Symbol', SAAS_PRICINNG_TXT_DOMAIN  ),
            'type' => Controls_Manager::TEXT,
            'condition' => [
                'saasp_currency_symbol_3' => 'custom',
            ],
        ]
    );

    $this->add_control(
        'sassp_price_3',
        [
            'label' => esc_html__( 'Price', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::TEXT,
            'default' => '39.99',
        ]
    );

    $this->add_control(
        'saasp_currency_format_3',
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
        'saasp_sale_3',
        [
            'label' => esc_html__( 'Sale', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'On', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_off' => esc_html__( 'Off', SAAS_PRICINNG_TXT_DOMAIN ),
            'default' => '',
        ]
    );

    $this->add_control(
        'saasp_original_price_3',
        [
            'label' => esc_html__( 'Original Price', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::NUMBER,
            'default' => '59',
            'condition' => [
                'saasp_sale_3' => 'yes',
               
            ],
        ]
    );

    $this->add_control(
        'saasp_period_3',
        [
            'label' => esc_html__( 'Period', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Monthly', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_select_columns' => '3',
            ],
        ]
    );

    $this->end_popover('saasp_pricing_popover_3');

    $this->add_control(
        'saasp_review_popover_3',
        [
            'label' => esc_html__( 'Review', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', SAAS_PRICINNG_TXT_DOMAIN ),
            'label_on' => esc_html__( 'Custom', SAAS_PRICINNG_TXT_DOMAIN ),
            'return_value' => 'yes',
            'condition' => [
                'saasp_select_columns' => '3',
            ],
        ]
    );

    $this->start_popover('saasp_review_popover_3');

     $this->add_control(
        'saasp_show_rating_3',
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
        'saasp_rating_num_3',
        [
            'label' => esc_html__( 'Rating', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::NUMBER,
            'min' => 0,
            'max' =>  5,
            'step' => .5,
            'default' => 5,
            'condition' => [
                'saasp_show_rating_3' => 'yes',
            ],
        ]
    );
    
    $this->add_control(
        'saasp_rating_counter_3',
        [
            'label' => esc_html__( 'Rating Counter', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '3k', SAAS_PRICINNG_TXT_DOMAIN ),
            'condition' => [
                'saasp_show_rating_3' => 'yes',
            ],
        ]
    );

    $this->end_popover('saasp_review_popover_3');

    $this->end_controls_section();
    

    // ------ Heading Style Content

    $this->start_controls_section(
        'saasp_comparison_style_header_heading_section',
        [
            'label' => esc_html__( 'Heading', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );


    $this->add_control(
        'saasp_heading_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table tr.price-table-head' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_heading_table_data_padding',
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
        'saasp_header_style_tab_heading_title',
        [
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_heading_title_color',
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
            'name' => 'saasp_heading_title_typography',
            'selector' => '{{WRAPPER}} .price-table-head td .saaspricing-heading-title',
        ]
    );

    $this->add_control(
        'saasp_header_style_tab_heading_des',
        [
            'label' => esc_html__( 'Description', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_heading_des_color',
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
            'name' => 'saasp_heading_des_typography',
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
        'saasp_header_ribbon_background_color',
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
            'name' => 'saasp_header_ribbon_border',
            'selector' => '{{WRAPPER}} .saaspricing-common-ribbon',
        ]
    );

    $this->add_control(
        'saasp_header_ribbon_border_radius',
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
            'name' => 'saasp_header_ribbon_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-common-ribbon',
        ]
    );

    $this->add_control(
        'saasp_header_ribbon_padding',
        [
            'label' => esc_html__( 'Padding', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-common-ribbon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_header_ribbon_title_heading',
        [
            'label' => esc_html__( 'Title', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_header_ribbon_title_color',
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
            'name' => 'saasp_header_ribbon_title_typography',
            'selector' => '{{WRAPPER}} .saaspricing-ribbon-title',
        ]
    );

    $this->add_control(
        'saasp_header_ribbon_title_padding',
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
        'saasp_header_ribbon_countdown_heading',
        [
            'label' => esc_html__( 'Countdown', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_header_ribbon_countdown_color',
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
            'name' => 'saasp_header_ribbon_countdown_typography',
            'selector' => '{{WRAPPER}} .saaspricing-countdown',
        ]
    );

    $this->add_control(
        'saasp_header_ribbon_countdown_padding',
        [
            'label' => esc_html__( 'Padding', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-countdown' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        'saasp_pricing_background_color',
        [
            'label' => esc_html__( 'Background Color', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} td.price.saaspricing-original-price' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'margin',
        [
            'label' => esc_html__( 'Paddding', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} td.price.saaspricing-original-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_pricing_text_color',
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
            'name' => 'saasp_pricing_text_typography',
            'selector' => '{{WRAPPER}} .saaspricing-price-typography',
        ]
    );

    $this->add_control(
        'saasp_header_pricing_currency_symbol',
        [
            'label' => esc_html__( 'Currency Symbol', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_header_pricing_symbol_size',
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
        'saasp_header_pricing_symbol_position',
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
        'saasp_header_pricing_symbol_vertical_position',
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
        'saasp_header_pricing_fractional_part',
        [
            'label' => esc_html__( 'Fractional Part', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_header_fractional_part_size',
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
        'saasp_header_fractional_part_vertical_position',
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
        'saasp_header_original_price_style',
        [
            'label' => esc_html__( 'Original Price', SAAS_PRICINNG_TXT_DOMAIN ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_original_price_color',
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
            'name' => 'saasp_original_price_typography',
            'selector' => '{{WRAPPER}} .saaspricing-original-slashed-price',
        ]
    );

    $this->add_control(
        'saasp_original_price_vertical_position',
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
			'saasp_header_pricing_period_style',
			[
				'label' => esc_html__( 'Period', SAAS_PRICINNG_TXT_DOMAIN ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'saasp_header_period_color',
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
				'name' => 'saasp_header_period_typography',
				'selector' => '{{WRAPPER}} .saaspricing-period',
			]
		);

		$this->add_control(
			'saasp_header_period_position',
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
        'saasp_comparison_style_header_review_section',
        [
            'label' => esc_html__( 'Review', SAAS_PRICINNG_TXT_DOMAIN ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_comparison_style_header_review_satar_heading',
        [
            'label' => esc_html__( 'Stars', 'textdomain' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_responsive_control(
        'saasp_comparison_header_review_spacing',
        [
            'label' => esc_html__( 'Spacing', 'textdomain' ),
            'type' =>  Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 49,
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
            'label' => esc_html__( 'Color', 'textdomain' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-yellow' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_style_header_review_text_heading',
        [
            'label' => esc_html__( 'Text', 'textdomain' ), 
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_comparison_header_review_text_color',
        [
            'label' => esc_html__( 'Color', 'textdomain' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-review-text' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'content_typography',
            'selector' => '{{WRAPPER}} .saaspricing-review-text',
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
  <div class="saaspricing-main table-responsive-xl position-relative">
            <table class="saaspricing-table" role="presentation">
                <!-- table header start  -->
                <thead class="tableHeader" id="tableHeader">

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
                      for($i = 1, $j = 0; $i <= $settings['saasp_select_columns'], $j < $settings['saasp_select_columns']; $i++, $j++){
                     ?>
                      <td class="ribbon-wrapper" data-exp-date-one="<?php echo esc_attr($saasp_expdate_one); ?>" data-exp-date-two="<?php echo esc_attr($saasp_expdate_two); ?>" data-exp-date-three="<?php echo esc_attr($saasp_expdate_three); ?>">
                        <?php
                        if( 'yes' === $settings['saasp_comparison_show_ribbon_'.$i] ||  'yes' === $settings['saasp_comparison_show_countdown_'.$i] ){
                        ?>
                        <div class="saaspricing-common-ribbon">
                            <div class="saaspricing-ribbon-title">
                            <?php
                            if($settings['saasp_ribbon_title_'.$i]){
                            echo esc_html($settings['saasp_ribbon_title_'.$i]);
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

                    <tr class="price-table-head">
                        <td></td>
                        <?php
                        for ( $i = 1; $i <= $settings['saasp_select_columns'] ; $i++ ) {
                           ?>
                            <td class="saasp-table-head">
                            <?php esc_html(printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', $settings['saasp_column_html_title_tag'], $settings['saasp_header_title_text_'.$i]));?>
                            <small class="fs-sm"><?php echo esc_html($settings['saasp_header_title_des_'.$i]); ?></small>
                            </td>
                           <?php
                        }
                        ?>
                    </tr>

                    <!-- package header (icon, pricing, reviews, countdown timer) start -->
                    <tr>
                        <td> <span class="d-block fs-3 mb-3" role="heading">SaasPricing Comparison</span>
                            <span class="d-block fs-sm w-75 w-sm-100">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Veritatis, impedit.</span>
                        </td>

                        <?php
                        for($i = 1; $i <= $settings['saasp_select_columns'] ; $i++){
                        ?>
                        <td class="price saaspricing-original-price">

                            <a  class="<?php if('yes' === $settings['saasp_comparison_media_light_box_'.$i]){ echo esc_attr('image-popup-vertical-fit'); }?>" href="<?php echo esc_url($settings['saasp_comparison_choose_media_'.$i]['url']); ?>">
                                <img src="<?php echo esc_url($settings['saasp_comparison_choose_media_'.$i]['url']); ?>" class="<?php echo esc_attr('saaspricing-header-image-'.$i) ?>" >
                            </a>
                    
                            <div class="saasspricing-pricing-block" > 
                            <s class="saaspricing-original-slashed-price me-2">
                            <?php
                            if('none' !== $settings['saasp_currency_symbol_'.$i] && 'yes' === $settings['saasp_sale_'.$i]){
                            ?>
                            <span>
                            <?php
                            if('custom' !== $settings['saasp_currency_symbol_'.$i]){
                                echo esc_html($this->get_currency_symbol($settings['saasp_currency_symbol_'.$i]));
                            }else{
                                echo esc_html($settings['saasp_currency_symbol_custom_'.$i]);
                            }
                            ?>
                            </span>
                            <?php
                            }
                            ?>
                            <?php
                            if('yes' === $settings['saasp_sale_'.$i]){
                            ?>
                            <span><?php echo esc_html($settings['saasp_original_price_'.$i]); ?></span>
                            <?php
                            }
                            ?>
                            </s>

                            <?php
                            if('none' !== $settings['saasp_currency_symbol_'.$i] && 'before' === $settings['saasp_header_pricing_symbol_position']){
                            ?>
                            <span class="saaspricing-price-text saaspricing-price-symbol">
                            <?php
                            if('custom' !== $settings['saasp_currency_symbol_'.$i]){
                                echo esc_html($this->get_currency_symbol($settings['saasp_currency_symbol_'.$i]));
                            }else{
                                echo esc_html($settings['saasp_currency_symbol_custom_'.$i]);
                            }
                            ?>
                            </span>
                            <?php
                            }
                            ?>
                            <?php
                            if('' === $settings['saasp_currency_format_'.$i] ){ 
                            ?>
                            <span class="saaspricing-price-text saaspricing-price-typography"><?php echo esc_html(explode(".", $settings['sassp_price_'.$i])[0]); ?></span>
                            <?php
                            if('' !== explode(".", $settings['sassp_price_'.$i])[1]){
                            ?>
                            <span class="saaspricing-price-text saaspricing-fraction-price"><?php echo esc_html(explode(".", $settings['sassp_price_'.$i])[1]); ?></span>
                            <?php
                            }
                            ?>
                            <?php
                            }else{
                            ?>
                            <span class="saaspricing-price-text saaspricing-price-typography"><?php echo esc_html($settings['sassp_price_'.$i]); ?></span>
                            <?php
                            }
                            ?>
                            <?php
                            if('none' !== $settings['saasp_currency_symbol_'.$i] && 'after' === $settings['saasp_header_pricing_symbol_position']){
                            ?>
                            <span class="saaspricing-price-text saaspricing-price-symbol">
                            <?php
                            if('custom' !== $settings['saasp_currency_symbol_'.$i]){
                                echo esc_html($this->get_currency_symbol($settings['saasp_currency_symbol_'.$i]));
                            }else{
                                echo esc_html($settings['saasp_currency_symbol_custom_'.$i]);
                            }
                            ?>
                            </span>
                            <?php
                            }
                            ?>
                            <?php
                            if('' !== $settings['saasp_period_'.$i])
                            ?>
                            <span class="saaspricing-period <?php if( 'below' === $settings['saasp_header_period_position']){echo esc_attr('w-100 mt-1');} ?>">
                             <?php
                             echo esc_html($settings['saasp_period_'.$i]);
                             ?>
                            </span>
                            <?php
                            ?>
                            </div>
                            <?php
                            if('yes' === $settings['saasp_show_rating_'.$i]){
                            ?>
                            <div class="ratings">
                                <div class="saaspricing-star-icon fs-6"> 
                                 <?php                                    
                                    $saasp_rating = $settings['saasp_rating_num_'.$i];
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
                                        <i class="fas fa-star-half saaspricing-star-right"></i>
                                    </span>
                                    <?php
                                     }
                                    ?>
                                    <?php
                                     for($j=0; $j < 5 - ceil($settings['saasp_rating_num_'.$i]); $j++){
                                    ?>
                                    <span>
                                        <i class="fas fa-star-half saaspricing-star-left"></i>
                                        <i class="fas fa-star-half saaspricing-star-right"></i>
                                    </span>
                                    <?php
                                     }
                                    ?>
                                    <?php
                                    if(''!==$settings['saasp_rating_counter_'.$i]){
                                    ?>
                                    <small class="saaspricing-review-text"> 
                                    (<?php echo esc_html($settings['saasp_rating_counter_'.$i]); ?>) 
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
                    <!-- package header (icon, pricing, reviews, countdown timer) end -->

                </thead>
                <!-- table header end  -->

                <!-- table body start  -->
                <tbody>

                    <!-- features section start -->

                    <!-- feature row 1  -->
                    <tr>
                        <td><span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 1</span>
                        </td>

                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                    <!-- feature row 2  -->
                    <tr>
                        <td>
                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 2</span>

                        <td>30 Days</td>
                        <td>90 Days</td>
                        <td>180 Days</td>
                    </tr>
                    <!-- feature row 3  -->
                    <tr>
                        <td>
                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 3</span>

                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <!-- feature row 4  -->
                    <tr>
                        <td>
                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 4</span>
                        </td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <!-- feature row 5  -->
                    <tr>
                        <td><span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 5</span></td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <!-- feature row 6  -->
                    <tr>
                        <td><span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 6</span></td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <!-- feature row 7  -->
                    <tr>
                        <td><span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 7</span></td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <!-- feature row 8  -->
                    <tr>
                        <td><span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 8</span></td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <!-- feature row 9  -->
                    <tr>
                        <td><span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 9</span></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>


                    <!-- features section end -->

                </tbody>
                <!-- table body end  -->

                <!-- table footer start  -->
                <tfoot>
                    <!-- cta start  -->
                    <tr>
                        <td></td>
                        <td class="footer-cta">

                            <a href="#" class="btn btn-dark text-nowrap" role="button"> Get started <span
                                    class="ms-2"><i class="fas fa-arrow-right"></i></span> </a>
                            <a class="d-block fs-sm fw-normal mt-3" href="#"> Learn More...</a>
                        </td>
                        <td class="footer-cta">

                            <a href="#" class="btn btn-dark text-nowrap" role="button"> Get started <span
                                    class="ms-2"><i class="fas fa-arrow-right"></i></span> </a>
                            <a class="d-block fs-sm fw-normal mt-3" href="#"> Free trial?</a>
                        </td>
                        <td class="footer-cta">

                            <a href="#" class="btn btn-dark text-nowrap" role="button"> Get started <span
                                    class="ms-2"><i class="fas fa-arrow-right"></i></span> </a>
                            <a class="d-block fs-sm fw-normal mt-3" href="#"> Free trial?</a>
                        </td>
                    </tr>
                    <!-- cta start  -->
                </tfoot>
                <!-- table footer end  -->

            </table>
        </div>
        <!-- pricing comparison table end  -->
<?php
 }
}
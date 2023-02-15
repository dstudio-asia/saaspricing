<?php
 // Elementor Classes

 use Elementor\Controls_Manager;
 use Elementor\Group_Control_Typography;
 use Elementor\Group_Control_Box_Shadow;
 use \Elementor\Group_Control_Border;
 use \Elementor\Utils;
 use \Elementor\Icons_Manager;
 use \Elementor\Widget_Base;
 use \Elementor\Repeater;
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Saasp_Comparison
 */

class Saasp_Comparison extends Widget_Base{

public function get_name() {
    return 'saasp-comparison';
}

public function get_title() {
    return esc_html__( 'Comparison Pricing Table', 'saaspricing' );
}

public function get_icon() {
    return 'saasp-icon eicon-table';
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
            'label' => esc_html__( 'Header', 'saaspricing' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'saasp_comparison_header_table_title',
        [
            'label' => esc_html__( 'Table Title', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter Table Title', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_comparison_header_table_description',
        [
            'label' => esc_html__( 'Table Description', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter Your Description', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_comparison_header_table_title_tag',
        [
            'label' => esc_html__( 'Table Title Tag', 'saaspricing' ),
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
        'saasp_comparison_select_columns',
        [
            'label' => esc_html__( 'Select Column', 'saaspricing' ),
            'type' =>  Controls_Manager::SELECT,
            'default' => '3',
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
            'default' => 'p',
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
        'saasp_comparison_header_content_title_and_des_one',
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
        'saasp_comparison_header_title_des_1',
        [
            'label' => esc_html__( 'Description', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter your description', 'saaspricing' ),
            'label_block' => false,
        ]
    );

    $this->add_control(
        'saasp_comparison_column_one_head_title_color',
        [
            'label' => esc_html__( 'Head Title Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2) .saaspricing-heading-title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_column_one_head_description_color',
        [
            'label' => esc_html__( 'Head Description Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2) small' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_column_one_head_background',
        [
            'label' => esc_html__( 'Head Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(2)' => 'background-color: {{VALUE}}',
            ],
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
            'default'=> esc_html__('2023-01-01 12:00', 'saaspricing'),
            'condition' => [
                'saasp_comparison_show_countdown_1' => 'yes',
                'saasp_comparison_show_ribbon_1' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_column_one_ribbon_color',
        [
            'label' => esc_html__( 'Ribbon Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(2) .saaspricing-ribbon-title' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_show_ribbon_1' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_column_one_countdown_color',
        [
            'label' => esc_html__( 'Countdown Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(2) .saaspricing-show-expire-date' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_show_countdown_1' => 'yes',
                'saasp_comparison_show_ribbon_1' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_column_one_ribbon_background',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(2)' => 'background-color: {{VALUE}}',
            ],
            'condition' => [
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
                'dollar' => '&#36; ' . esc_html__( 'Dollar', 'Currency', 'saaspricing'  ),
                'euro' => '&#128; ' . esc_html__( 'Euro', 'Currency', 'saaspricing'  ),
                'baht' => '&#3647; ' . esc_html__( 'Baht', 'Currency', 'saaspricing'  ),
                'franc' => '&#8355; ' . esc_html__( 'Franc', 'Currency', 'saaspricing'  ),
                'guilder' => '&fnof; ' . esc_html__( 'Guilder', 'Currency', 'saaspricing'  ),
                'krona' => 'kr ' . esc_html__( 'Krona', 'Currency', 'saaspricing'  ),
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
                '' => '1,234.56 (Default)',
                ',' => '1.234,56',
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

    $this->add_control(
        'saasp_comparison_column_one_pricing_color',
        [
            'label' => esc_html__( 'Price Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(2) .saaspricing-price-text' => 'color: {{VALUE}}',
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

    $this->add_control(
        'saasp_comparison_column_one_review_color',
        [
            'label' => esc_html__( 'Review Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(2) .saaspricing-yellow' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_show_rating_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_column_one_unmark_color',
        [
            'label' => esc_html__( 'Unmark Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(2) .saaspricing-unmark' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_show_rating_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_column_one_review_text_color',
        [
            'label' => esc_html__( 'Review Text Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(2) .saaspricing-review-text' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_show_rating_1' => 'yes',
            ]
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
        'saasp_comparison_header_content_title_and_des_two',
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
        'saasp_comparison_header_title_des_2',
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
        'saasp_comparison_column_two_head_title_color',
        [
            'label' => esc_html__( 'Head Title Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(3) .saaspricing-heading-title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_column_two_head_description_color',
        [
            'label' => esc_html__( 'Head Description Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(3) small' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_column_two_head_background',
        [
            'label' => esc_html__( 'Head Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-table .saaspricing-table-head:nth-child(3)' => 'background-color: {{VALUE}}',
            ],
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
            'default' => 'yes',
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
            'default'=> esc_html__('2023-01-01 12:00', 'saaspricing'),
            'condition' => [
                'saasp_comparison_show_countdown_2' => 'yes',
                'saasp_comparison_show_ribbon_2' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_column_two_ribbon_color',
        [
            'label' => esc_html__( 'Ribbon Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(3) .saaspricing-ribbon-title' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_show_ribbon_2' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_column_two_countdown_color',
        [
            'label' => esc_html__( 'Countdown Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(3) .saaspricing-show-expire-date' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_show_countdown_2' => 'yes',
                'saasp_comparison_show_ribbon_2' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_column_two_ribbon_background',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-table .saaspricing-common-ribbon:nth-child(3)' => 'background-color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_select_columns' => ['2','3'],
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
                'dollar' => '&#36; ' . esc_html__( 'Dollar', 'Currency', 'saaspricing'  ),
                'euro' => '&#128; ' . esc_html__( 'Euro', 'Currency', 'saaspricing'  ),
                'baht' => '&#3647; ' . esc_html__( 'Baht', 'Currency', 'saaspricing'  ),
                'franc' => '&#8355; ' . esc_html__( 'Franc', 'Currency', 'saaspricing'  ),
                'guilder' => '&fnof; ' . esc_html__( 'Guilder', 'Currency', 'saaspricing'  ),
                'krona' => 'kr ' . esc_html__( 'Krona', 'Currency', 'saaspricing'  ),
                'lira' => '&#8356; ' . esc_html__( 'Lira', 'Currency', 'saaspricing'  ),
                'peseta' => '&#8359 ' . esc_html__( 'Peseta', 'Currency', 'saaspricing'  ),
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
                '' => '1,234.56 (Default)',
                ',' => '1.234,56',
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

    $this->add_control(
        'saasp_comparison_column_two_pricing_color',
        [
            'label' => esc_html__( 'Price Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(3) .saaspricing-price-text' => 'color: {{VALUE}}',
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

    $this->add_control(
        'saasp_comparison_column_two_review_color',
        [
            'label' => esc_html__( 'Review Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(3) .saaspricing-yellow' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_show_rating_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_column_two_unmark_color',
        [
            'label' => esc_html__( 'Unmark Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(3) .saaspricing-unmark' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_show_rating_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_column_two_review_text_color',
        [
            'label' => esc_html__( 'Review Text Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(3) .saaspricing-review-text' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_show_rating_2' => 'yes',
            ]
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
        'saasp_comparison_header_content_title_and_des_three',
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
        'saasp_comparison_header_title_des_3',
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
        'saasp_comparison_column_three_head_title_color',
        [
            'label' => esc_html__( 'Head Title Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(4) .saaspricing-heading-title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_column_three_head_description_color',
        [
            'label' => esc_html__( 'Head Description Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(4) small' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_column_three_head_background',
        [
            'label' => esc_html__( 'Head Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-table-head:nth-child(4)' => 'background-color: {{VALUE}}',
            ],
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
            'default'=> esc_html__('2023-01-01 12:00', 'saaspricing'),
            'condition' => [
                'saasp_comparison_show_countdown_3' => 'yes',
                'saasp_comparison_show_ribbon_3' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_column_three_ribbon_color',
        [
            'label' => esc_html__( 'Ribbon Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(4) .saaspricing-ribbon-title' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_show_ribbon_3' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_column_three_countdown_color',
        [
            'label' => esc_html__( 'Countdown Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-common-ribbon:nth-child(4) .saaspricing-show-expire-date' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_show_countdown_3' => 'yes',
                'saasp_comparison_show_ribbon_3' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_column_three_ribbon_background',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-table .saaspricing-common-ribbon:nth-child(4)' => 'background-color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_select_columns' => '3',
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
                'dollar' => '&#36; ' . esc_html__( 'Dollar', 'Currency', 'saaspricing'  ),
                'euro' => '&#128; ' . esc_html__( 'Euro', 'Currency', 'saaspricing'  ),
                'baht' => '&#3647; ' . esc_html__( 'Baht', 'Currency', 'saaspricing'  ),
                'franc' => '&#8355; ' . esc_html__( 'Franc', 'Currency', 'saaspricing'  ),
                'guilder' => '&fnof; ' . esc_html__( 'Guilder', 'Currency', 'saaspricing'  ),
                'krona' => 'kr ' . esc_html__( 'Krona', 'Currency', 'saaspricing'  ),
                'lira' => '&#8356; ' . esc_html__( 'Lira', 'Currency', 'saaspricing'  ),
                'peseta' => '&#8359 ' . esc_html__( 'Peseta', 'Currency', 'saaspricing'  ),
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
                '' => '1,234.56 (Default)',
                ',' => '1.234,56',
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

    $this->add_control(
        'saasp_comparison_column_three_pricing_color',
        [
            'label' => esc_html__( 'Price Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(4) .saaspricing-price-text' => 'color: {{VALUE}}',
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

    $this->add_control(
        'saasp_comparison_column_three_review_color',
        [
            'label' => esc_html__( 'Review Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(4) .saaspricing-yellow' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_show_rating_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_column_three_unmark_color',
        [
            'label' => esc_html__( 'Unmark Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(4) .saaspricing-unmark' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_show_rating_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_column_three_review_text_color',
        [
            'label' => esc_html__( 'Review Text Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-original-price:nth-child(4) .saaspricing-review-text' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'saasp_comparison_show_rating_3' => 'yes',
            ]
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

    $this->start_controls_section(
        'saasp_comparison_style_features__section',
        [
            'label' => esc_html__( 'Features', 'saaspricing' ),
            'tab' =>Controls_Manager::TAB_CONTENT,
        ]
    );

    $saasp_comparison_feature_one = new Repeater();

    $saasp_comparison_feature_one->add_control(
        'saasp_comparison_show_features_tooltip',
        [
            'label' => esc_html__( 'Tooltip', 'saaspricing' ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'saaspricing' ),
            'label_off' => esc_html__( 'Hide', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );

    $saasp_comparison_feature_one->add_control(
        'saasp_comparison_features_tooltip_position',
        [
            'label' => esc_html__( 'Tooltip Position', 'saaspricing' ),
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

    $saasp_comparison_feature_one->add_control(
        'saasp_comparison_features_tooltip_description',
        [
            'label' => esc_html__( 'Description', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
            'condition' => [
                'saasp_comparison_show_features_tooltip'=>'yes',
            ]
        ]
    );

    $saasp_comparison_feature_one->add_control(
        'saasp_comparison_feature_title',
        [
            'label' => esc_html__( 'Feature Title', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Feature', 'saaspricing' ),
        ]
    );

    $saasp_comparison_feature_one->add_control(
        'sassp_comparison_feature_one_text_col_1',
        [
            'label' => esc_html__( 'Column One', 'saaspricing' ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'saaspricing' ),
            'label_on' => esc_html__( 'Custom', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $saasp_comparison_feature_one->start_popover();

    $saasp_comparison_feature_one->add_control(
        'saasp_comparison_feature_text',
        [
            'label' => esc_html__( ' Column One Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '1', 'saaspricing' ),
        ]
    );

    $saasp_comparison_feature_one->add_control(
        'saasp_comparison_feature_icon',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
            'type' =>  Controls_Manager::ICONS,
            'label_block' => true,
            'skin' => 'inline',
            'default' => [
                'value' => 'fas fa-check',
                'library' => 'fa-solid',
            ],
        ]
    );

    $saasp_comparison_feature_one->start_popover();

    $this->add_control(
        'saasp_comparison_table_feature_list_1',
        [
            'label' => esc_html__( 'Features List', 'saaspricing' ),
            'type' =>  Controls_Manager::REPEATER,
            'fields' =>  $saasp_comparison_feature_one->get_controls(),
            'default' => [
                [
                    'saasp_comparison_show_features_tooltip' => 'no',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 1', 'saaspricing' ),
                    'saasp_comparison_feature_text' => esc_html__( 'Feature 1', 'saaspricing' ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'no',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 2', 'saaspricing' ),
                    'saasp_comparison_feature_text' => esc_html__( 'Feature 2', 'saaspricing' ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'no',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 3', 'saaspricing' ),
                    'saasp_comparison_feature_text' => esc_html__( 'Feature 3', 'saaspricing' ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'no',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 4', 'saaspricing' ),
                    'saasp_comparison_feature_text' => esc_html__( 'Feature 4', 'saaspricing' ),
                ]
            ],
            'title_field' => '{{{ saasp_comparison_feature_title }}}',
            'condition' => [
                'saasp_comparison_select_columns' => '1',
            ],
        ]
    );

    $saasp_comparison_feature_two = new Repeater();

    $saasp_comparison_feature_two->add_control(
        'saasp_comparison_show_features_tooltip',
        [
            'label' => esc_html__( 'Tooltip', 'saaspricing' ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'saaspricing' ),
            'label_off' => esc_html__( 'Hide', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );

    $saasp_comparison_feature_two->add_control(
        'saasp_comparison_features_tooltip_position',
        [
            'label' => esc_html__( 'Tooltip Position', 'saaspricing' ),
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

    $saasp_comparison_feature_two->add_control(
        'saasp_comparison_features_tooltip_description',
        [
            'label' => esc_html__( 'Description', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
            'condition' => [
                'saasp_comparison_show_features_tooltip'=>'yes',
            ]
        ]
    );

    $saasp_comparison_feature_two->add_control(
        'saasp_comparison_feature_title',
        [
            'label' => esc_html__( 'Feature Title', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Feature', 'saaspricing' ),
        ]
    );

    $saasp_comparison_feature_two->add_control(
        'sassp_comparison_feature_two_text_col_1',
        [
            'label' => esc_html__( 'Column One', 'saaspricing' ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'saaspricing' ),
            'label_on' => esc_html__( 'Custom', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $saasp_comparison_feature_two->start_popover();

    $saasp_comparison_feature_two->add_control(
        'saasp_comparison_feature_text_1',
        [
            'label' => esc_html__( 'Column One Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '1', 'saaspricing' ),
        ]
    );

    $saasp_comparison_feature_two->add_control(
        'saasp_comparison_feature_icon_1',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
            'type' =>  Controls_Manager::ICONS,
            'label_block' => true,
            'skin' => 'inline',
            'default' => [
                'value' => 'fas fa-check',
                'library' => 'fa-solid',
            ],
        ]
    );

    $saasp_comparison_feature_two->end_popover();


    $saasp_comparison_feature_two->add_control(
        'sassp_comparison_feature_two_text_col_2',
        [
            'label' => esc_html__( 'Column Two', 'saaspricing' ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'saaspricing' ),
            'label_on' => esc_html__( 'Custom', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $saasp_comparison_feature_two->start_popover();
    
    $saasp_comparison_feature_two->add_control(
        'saasp_comparison_feature_text_2',
        [
            'label' => esc_html__( 'Column Two Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( '1', 'saaspricing' ),
        ]
    );

    $saasp_comparison_feature_two->add_control(
        'saasp_comparison_feature_icon_2',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
            'type' =>  Controls_Manager::ICONS,
            'label_block' => true,
            'skin' => 'inline',
            'default' => [
                'value' => 'fas fa-check',
                'library' => 'fa-solid',
            ],
        ]
    );

    $saasp_comparison_feature_two->end_popover();

    $this->add_control(
        'saasp_comparison_table_feature_list_2',
        [
            'label' => esc_html__( 'Features List', 'saaspricing' ),
            'type' =>  Controls_Manager::REPEATER,
            'fields' =>  $saasp_comparison_feature_two->get_controls(),
            'default' => [
                [
                    'saasp_comparison_show_features_tooltip' => 'no',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 1', 'saaspricing' ),
                    'saasp_comparison_feature_text_1' => esc_html__( 'Feature 1', 'saaspricing' ),
                    'saasp_comparison_feature_text_2' => esc_html__( 'Feature 2', 'saaspricing' ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'no',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 2', 'saaspricing' ),
                    'saasp_comparison_feature_text_1' => esc_html__( 'Feature 1', 'saaspricing' ),
                    'saasp_comparison_feature_text_2' => esc_html__( 'Feature 2', 'saaspricing' ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'no',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 3', 'saaspricing' ),
                    'saasp_comparison_feature_text_1' => esc_html__( 'Feature 1', 'saaspricing' ),
                    'saasp_comparison_feature_text_2' => esc_html__( 'Feature 2', 'saaspricing' ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'no',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 4', 'saaspricing' ),
                    'saasp_comparison_feature_text_1' => esc_html__( 'Feature 1', 'saaspricing' ),
                    'saasp_comparison_feature_text_2' => esc_html__( 'Feature 2', 'saaspricing' ),
                ]
            ],
            'title_field' => '{{{ saasp_comparison_feature_title }}}',
            'condition' => [
                'saasp_comparison_select_columns' => '2',
            ],
        ]
    );

    $saasp_comparison_feature_three = new Repeater();

    $saasp_comparison_feature_three->add_control(
        'saasp_comparison_show_features_tooltip',
        [
            'label' => esc_html__( 'Tooltip', 'saaspricing' ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'saaspricing' ),
            'label_off' => esc_html__( 'Hide', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );

    $saasp_comparison_feature_three->add_control(
        'saasp_comparison_features_tooltip_position',
        [
            'label' => esc_html__( 'Tooltip Position', 'saaspricing' ),
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

    $saasp_comparison_feature_three->add_control(
        'saasp_comparison_features_tooltip_description',
        [
            'label' => esc_html__( 'Description', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
            'condition' => [
                'saasp_comparison_show_features_tooltip'=>'yes',
            ]
        ]
    );

    $saasp_comparison_feature_three->add_control(
        'saasp_comparison_feature_title',
        [
            'label' => esc_html__( 'Feature Title', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Feature', 'saaspricing' ),
        ]
    );

    $saasp_comparison_feature_three->add_control(
        'sassp_comparison_feature_three_text_col_1',
        [
            'label' => esc_html__( 'Column One', 'saaspricing' ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'saaspricing' ),
            'label_on' => esc_html__( 'Custom', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $saasp_comparison_feature_three->start_popover();

    $saasp_comparison_feature_three->add_control(
        'saasp_comparison_feature_text_1',
        [
            'label' => esc_html__( 'Column One Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Feature 1', 'saaspricing' ),
        ]
    );

    $saasp_comparison_feature_three->add_control(
        'saasp_comparison_feature_icon_1',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
            'type' =>  Controls_Manager::ICONS,
            'label_block' => true,
            'skin' => 'inline',
            'default' => [
                'value' => 'fas fa-check',
                'library' => 'fa-solid',
            ],
        ]
    );

    $saasp_comparison_feature_three->end_popover();

    $saasp_comparison_feature_three->add_control(
        'sassp_comparison_feature_three_text_col_2',
        [
            'label' => esc_html__( 'Column Two', 'saaspricing' ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'saaspricing' ),
            'label_on' => esc_html__( 'Custom', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $saasp_comparison_feature_three->start_popover();

    $saasp_comparison_feature_three->add_control(
        'saasp_comparison_feature_text_2',
        [
            'label' => esc_html__( 'Column Two Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Feature 2', 'saaspricing' ),
        ]
    );

    $saasp_comparison_feature_three->add_control(
        'saasp_comparison_feature_icon_2',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
            'type' =>  Controls_Manager::ICONS,
            'label_block' => true,
            'skin' => 'inline',
            'default' => [
                'value' => 'fas fa-check',
                'library' => 'fa-solid',
            ],
        ]
    );

    $saasp_comparison_feature_three->end_popover();

    $saasp_comparison_feature_three->add_control(
        'sassp_comparison_feature_three_text_col_3',
        [
            'label' => esc_html__( 'Column Three', 'saaspricing' ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'saaspricing' ),
            'label_on' => esc_html__( 'Custom', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $saasp_comparison_feature_three->start_popover();

    $saasp_comparison_feature_three->add_control(
        'saasp_comparison_feature_text_3',
        [
            'label' => esc_html__( 'Column Three Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Feature 3', 'saaspricing' ),
        ]
    );

    $saasp_comparison_feature_three->add_control(
        'saasp_comparison_feature_icon_3',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
            'type' =>  Controls_Manager::ICONS,
            'skin' => 'inline',
            'default' => [
                'value' => 'fas fa-check',
                'library' => 'fa-solid',
            ],
        ]
    );

    $saasp_comparison_feature_three->end_popover();

    $this->add_control(
        'saasp_comparison_table_feature_list_3',
        [
            'label' => esc_html__( 'Features List', 'saaspricing' ),
            'type' =>  Controls_Manager::REPEATER,
            'fields' =>  $saasp_comparison_feature_three->get_controls(),
            'default' => [
                [
                    'saasp_comparison_show_features_tooltip' => 'no',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 1', 'saaspricing' ),
                    'saasp_comparison_feature_text_1' => esc_html__( 'Feature 1', 'saaspricing' ),
                    'saasp_comparison_feature_text_2' => esc_html__( 'Feature 2', 'saaspricing' ),
                    'saasp_comparison_feature_text_3' => esc_html__( 'Feature 3', 'saaspricing' ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'no',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 2', 'saaspricing' ),
                    'saasp_comparison_feature_text_1' => esc_html__( 'Feature 1', 'saaspricing' ),
                    'saasp_comparison_feature_text_2' => esc_html__( 'Feature 2', 'saaspricing' ),
                    'saasp_comparison_feature_text_3' => esc_html__( 'Feature 3', 'saaspricing' ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'no',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 3', 'saaspricing' ),
                    'saasp_comparison_feature_text_1' => esc_html__( 'Feature 1', 'saaspricing' ),
                    'saasp_comparison_feature_text_2' => esc_html__( 'Feature 2', 'saaspricing' ),
                    'saasp_comparison_feature_text_3' => esc_html__( 'Feature 3', 'saaspricing' ),
                ],
                [
                    'saasp_comparison_show_features_tooltip' => 'no',
                    'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                    'saasp_comparison_feature_title' => esc_html__( 'Feature 4', 'saaspricing' ),
                    'saasp_comparison_feature_text_1' => esc_html__( 'Feature 1', 'saaspricing' ),
                    'saasp_comparison_feature_text_2' => esc_html__( 'Feature 2', 'saaspricing' ),
                    'saasp_comparison_feature_text_3' => esc_html__( 'Feature 3', 'saaspricing' ),
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
            'label' => esc_html__( 'Feature Alignment', 'saaspricing' ),
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
            'default' => 'left',
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-feature-main' => 'text-align: {{VALUE}}; justify-content: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'saaspricing_comparison_features_cell_alignment',
        [
            'label' => esc_html__( 'Column Alignment', 'saaspricing' ),
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
                '{{WRAPPER}} .saaspricing-table .saaspricing-cell' => 'text-align: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_comparison_cta_section_starts',
        [
            'label' => esc_html__( 'CTA', 'saaspricing' ),
            'tab' =>   Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'saasp_comparison_column_one_primary_cta',
        [
            'label' => esc_html__( 'Column One', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_popover_1',
        [
            'label' => esc_html__( 'Primary', 'saaspricing' ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'saaspricing' ),
            'label_on' => esc_html__( 'Custom', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->start_popover();

    $this->add_control(
        'saasp_comparison_primary_cta_switch_1',
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
        'saasp_comparison_primary_cta_position_1',
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
                'saasp_comparison_primary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_text_1',
        [
            'label' => esc_html__( 'Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Get Started', 'saaspricing' ),
            'condition' =>[
                'saasp_comparison_primary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_url_1',
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
                'saasp_comparison_primary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_size_1',
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
                'saasp_comparison_primary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_icon_1',
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
                'saasp_comparison_primary_cta_switch_1' => 'yes',
            ]
        ]
    );
    
    $this->add_responsive_control(
        'saasp_comparison_primary_cta_icon_spacing_1',
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
                '{{WRAPPER}} .saaspricing-primary-spacing-1' => 'padding-left: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_comparison_primary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_background_color_1',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-1' => 'background-color: {{VALUE}}',
            ],
            'condition' =>[
                'saasp_comparison_primary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_hover_background_color_1',
        [
            'label' => esc_html__( 'Hover Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-1:hover' => 'background-color: {{VALUE}}',
            ],
            'condition' =>[
                'saasp_comparison_primary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_comparison_secondary_cta_popover_1',
        [
            'label' => esc_html__( 'Secondary', 'saaspricing' ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'saaspricing' ),
            'label_on' => esc_html__( 'Custom', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->start_popover();

    $this->add_control(
        'saasp_comparison_secondary_cta_switch_1',
        [
            'label' => esc_html__( 'Secondary', 'saaspricing' ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'saaspricing' ),
            'label_off' => esc_html__( 'Hide', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_position_1',
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
                'saasp_comparison_secondary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_text_1',
        [
            'label' => esc_html__( 'Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Learn More', 'saaspricing' ),
            'condition' =>[
                'saasp_comparison_secondary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_url_1',
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
                'saasp_comparison_secondary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_size_1',
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
                'saasp_comparison_secondary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_icon_1',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
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
                'saasp_comparison_secondary_cta_switch_1' => 'yes',
            ]
        ]
    );
    
    $this->add_responsive_control(
        'saasp_comparison_secondary_cta_icon_spacing_1',
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
                'size' => 16,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-spacing-1' => 'padding-left: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_comparison_secondary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_background_color_1',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-1' => 'background-color: {{VALUE}}',
            ],
            'condition' =>[
                'saasp_comparison_secondary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_hover_background_color_1',
        [
            'label' => esc_html__( 'Hover Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-1:hover' => 'background-color: {{VALUE}}',
            ],
            'condition' =>[
                'saasp_comparison_secondary_cta_switch_1' => 'yes',
            ]
        ]
    );

    $this->end_popover();
     
    $this->add_control(
        'saasp_comparison_cta_column_one_background',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-footer-cta:nth-child(2)' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_primary_cta_2',
        [
            'label' => esc_html__( 'Column Two', 'saaspricing' ), 
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' =>[
                'saasp_comparison_select_columns' => ['2','3'],
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_popover_2',
        [
            'label' => esc_html__( 'Primary', 'saaspricing' ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'saaspricing' ),
            'label_on' => esc_html__( 'Custom', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'yes',
            'condition' =>[
                'saasp_comparison_select_columns' => ['2','3'],
            ]
        ]
    );

    $this->start_popover();

    $this->add_control(
        'saasp_comparison_primary_cta_switch_2',
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
        'saasp_comparison_primary_cta_position_2',
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
                'saasp_comparison_primary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_text_2',
        [
            'label' => esc_html__( 'Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Get Started', 'saaspricing' ),
            'condition' =>[
                'saasp_comparison_primary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_url_2',
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
                'saasp_comparison_primary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_size_2',
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
                'saasp_comparison_primary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_icon_2',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
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
                'saasp_comparison_primary_cta_switch_2' => 'yes',
            ]
        ]
    );
    
    $this->add_responsive_control(
        'saasp_comparison_primary_cta_icon_spacing_2',
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
                'size' => 8,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-spacing-2' => 'padding-left: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_comparison_primary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_background_color_2',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-2' => 'background-color: {{VALUE}}',
            ],
            'condition' =>[
                'saasp_comparison_primary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_hover_background_color_2',
        [
            'label' => esc_html__( 'Hover Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-2:hover' => 'background-color: {{VALUE}}',
            ],
            'condition' =>[
                'saasp_comparison_primary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_comparison_secondary_cta_popover_2',
        [
            'label' => esc_html__( 'Secondary', 'saaspricing' ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'saaspricing' ),
            'label_on' => esc_html__( 'Custom', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'yes',
            'condition' =>[
                'saasp_comparison_select_columns' => ['2','3'],
            ]
        ]
    );

    $this->start_popover();

    $this->add_control(
        'saasp_comparison_secondary_cta_switch_2',
        [
            'label' => esc_html__( 'Secondary', 'saaspricing' ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'saaspricing' ),
            'label_off' => esc_html__( 'Hide', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_position_2',
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
                'saasp_comparison_secondary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_text_2',
        [
            'label' => esc_html__( 'Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Learn More', 'saaspricing' ),
            'condition' =>[
                'saasp_comparison_secondary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_url_2',
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
                'saasp_comparison_secondary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_size_2',
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
                'saasp_comparison_secondary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_icon_2',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
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
                'saasp_comparison_secondary_cta_switch_2' => 'yes',
            ]
        ]
    );
    
    $this->add_responsive_control(
        'saasp_comparison_secondary_cta_icon_spacing_2',
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
                'size' => 16,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-spacing-2' => 'padding-left: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_comparison_secondary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_background_color_2',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-2' => 'background-color: {{VALUE}}',
            ],
            'condition' =>[
                'saasp_comparison_secondary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_hover_background_color_2',
        [
            'label' => esc_html__( 'Hover Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-2:hover' => 'background-color: {{VALUE}}',
            ],
            'condition' =>[
                'saasp_comparison_secondary_cta_switch_2' => 'yes',
            ]
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_comparison_cta_column_two_background',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-footer-cta:nth-child(3)' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_primary_cta',
        [
            'label' => esc_html__( 'Column Three', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' =>[
                'saasp_comparison_select_columns' => '3',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_popover_3',
        [
            'label' => esc_html__( 'Primary', 'saaspricing' ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'saaspricing' ),
            'label_on' => esc_html__( 'Custom', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'yes',
            'condition' =>[
                'saasp_comparison_select_columns' => '3',
            ]
        ]
    );

    $this->start_popover();

    $this->add_control(
        'saasp_comparison_primary_cta_switch_3',
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
        'saasp_comparison_primary_cta_position_3',
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
                'saasp_comparison_primary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_text_3',
        [
            'label' => esc_html__( 'Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Get Started', 'saaspricing' ),
            'condition' =>[
                'saasp_comparison_primary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_url_3',
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
                'saasp_comparison_primary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_size_3',
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
                'saasp_comparison_primary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_icon_3',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
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
                'saasp_comparison_primary_cta_switch_3' => 'yes',
            ]
        ]
    );
    
    $this->add_responsive_control(
        'saasp_comparison_primary_cta_icon_spacing_3',
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
                'size' => 8,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-spacing-3' => 'padding-left: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_comparison_primary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_background_color_3',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-3' => 'background-color: {{VALUE}}',
            ],
            'condition' =>[
                'saasp_comparison_primary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_hover_background_color_3',
        [
            'label' => esc_html__( 'Hover Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-3:hover' => 'background-color: {{VALUE}}',
            ],
            'condition' =>[
                'saasp_comparison_primary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_comparison_secondary_cta_popover_3',
        [
            'label' => esc_html__( 'Secondary', 'saaspricing' ),
            'type' =>  Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'saaspricing' ),
            'label_on' => esc_html__( 'Custom', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'yes',
            'condition' =>[
                'saasp_comparison_select_columns' => '3',
            ]
        ]
    );

    $this->start_popover();

    $this->add_control(
        'saasp_comparison_secondary_cta_switch_3',
        [
            'label' => esc_html__( 'Secondary', 'saaspricing' ),
            'type' =>  Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'saaspricing' ),
            'label_off' => esc_html__( 'Hide', 'saaspricing' ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_position_3',
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
                'saasp_comparison_secondary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_text_3',
        [
            'label' => esc_html__( 'Text', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Learn More', 'saaspricing' ),
            'condition' =>[
                'saasp_comparison_secondary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_url_3',
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
                'saasp_comparison_secondary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_size_3',
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
                'saasp_comparison_secondary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_icon_3',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ),
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
                'saasp_comparison_secondary_cta_switch_3' => 'yes',
            ]
        ]
    );
    
    $this->add_responsive_control(
        'saasp_comparison_secondary_cta_icon_spacing_3',
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
                'size' => 16,
            ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-spacing-3' => 'padding-left: {{SIZE}}{{UNIT}};',
            ],
            'condition' =>[
                'saasp_comparison_secondary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_background_color_3',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-3' => 'background-color: {{VALUE}}',
            ],
            'condition' =>[
                'saasp_comparison_secondary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_hover_background_color_3',
        [
            'label' => esc_html__( 'Hover Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-3:hover' => 'background-color: {{VALUE}}',
            ],
            'condition' =>[
                'saasp_comparison_secondary_cta_switch_3' => 'yes',
            ]
        ]
    );

    $this->end_popover();

    $this->add_control(
        'saasp_comparison_cta_column_three_background',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' =>  Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-footer-cta:nth-child(4)' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_cta_alignment',
        [
            'label' => esc_html__( 'CTA Alignment', 'saaspricing' ),
            'type' => Controls_Manager::CHOOSE,
            'separator' => 'before',
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
                '{{WRAPPER}} .saaspricing-cta-main' => 'text-align: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();
    
    $this->start_controls_section(
        'saasp_comparison_table_section',
        [
            'label' => esc_html__( 'Table', 'saaspricing' ),
            'tab' =>Controls_Manager::TAB_STYLE,
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
    
    $this->add_control(
        'saasp_comparison_table_title_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
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
            'label' => esc_html__( 'Table Description', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
        ]
    );
    
    $this->add_control(
        'saasp_comparison_table_des_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
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
        'saasp_comparison_table_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table-title-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
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

    $this->add_control(
        'sassp_comparison_table_alignment',
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
            'default' => 'left', 
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table-title-des' => 'text-align: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_comparison_style_header_heading_section',
        [
            'label' => esc_html__( 'Heading', 'saaspricing' ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_responsive_control(
        'saasp_comparison_heading_table_data_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-price-table-head td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_header_style_tab_heading_title',
        [
            'label' => esc_html__( 'Title', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparison_heading_title_typography',
            'selector' => '{{WRAPPER}} .saaspricing-price-table-head td .saaspricing-heading-title',
        ]
    );

    $this->add_control(
        'saasp_comparison_header_style_tab_heading_des',
        [
            'label' => esc_html__( 'Description', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );
    
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparison_heading_des_typography',
            'selector' => '{{WRAPPER}} .saaspricing-price-table-head td small',
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_comparison_style_header_ribbon_section',
        [
            'label' => esc_html__( 'Ribbon', 'saaspricing' ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_responsive_control(
        'saasp_comparison_header_ribbon_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-common-ribbon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'saasp_comparison_header_ribbon_box_shadow',
            'selector' => '{{WRAPPER}} .saaspricing-table .saaspricing-common-ribbon',
        ]
    );

    $this->add_responsive_control(
        'saasp_comparison_header_ribbon_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-common-ribbon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_header_ribbon_title_heading',
        [
            'label' => esc_html__( 'Title', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_group_control(
         Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparison_header_ribbon_title_typography',
            'selector' => '{{WRAPPER}} .saaspricing-ribbon-title',
        ]
    );

    $this->add_responsive_control(
        'saasp_comparison_header_ribbon_title_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-ribbon-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_header_ribbon_countdown_heading',
        [
            'label' => esc_html__( 'Countdown', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_group_control(
         Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparison_header_ribbon_countdown_typography',
            'selector' => '{{WRAPPER}} .saaspricing-countdown',
        ]
    );

    $this->add_responsive_control(
        'saasp_comparison_header_ribbon_countdown_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-show-expire-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_comparison_style_header_pricing_section',
        [
            'label' => esc_html__( 'Pricing', 'saaspricing' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_responsive_control(
        'saasp_comparison_original_price_padding',
        [
            'label' => esc_html__( 'Paddding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-original-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
       Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparison_pricing_text_typography',
            'selector' => '{{WRAPPER}} .saaspricing-price-typography',
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
            'label' => esc_html__( 'Fractional Part', 'saaspricing' ),
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

    $this->start_controls_section(
        'saasp_comparison_style_header_review_section',
        [
            'label' => esc_html__( 'Review', 'saaspricing' ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_comparison_style_header_review_satar_heading',
        [
            'label' => esc_html__( 'Stars', 'saaspricing' ),
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_responsive_control(
        'saasp_comparison_header_review_spacing',
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
        'saasp_comparison_style_header_review_text_heading',
        [
            'label' => esc_html__( 'Text', 'saaspricing' ), 
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
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
            'label' => esc_html__( 'Features', 'saaspricing' ),
            'tab' =>Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_comparison_feature_icon_section',
        [
            'label' => esc_html__( 'Tooltip', 'saaspricing' ), 
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_comparison_feature_tooltip_icon_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-feature-main svg' => 'color: {{VALUE}} ',
            ],
        ]
    );

    $this->add_responsive_control(
        'saaspricing_comparison_features_tooltip_icon_size',
        [
            'label' => esc_html__( 'Size', 'saaspricing' ),
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
                '{{WRAPPER}} .saaspricing-feature-main svg' => 'font-size: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_feature_title_section',
        [
            'label' => esc_html__( 'Feature Title', 'saaspricing' ), 
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_control(
        'saasp_comparison_feature_title_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
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
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-feature-main' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_features_icon_section',
        [
            'label' => esc_html__( 'Icon', 'saaspricing' ), 
            'type' =>  Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    
    $this->add_responsive_control(
        'saaspricing_comparison_features_icon_size',
        [
            'label' => esc_html__( 'Size', 'saaspricing' ),
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
                '{{WRAPPER}} .saaspricing-cell-icon svg' => 'font-size: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_feature_column_one_cell',
        [
            'label' => esc_html__( 'Column One', 'saaspricing' ), 
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );
    
    $this->add_control(
        'saasp_comparison_column_one_cell_color',
        [
            'label' => esc_html__( 'Text Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table tr td:nth-child(2) .saaspricing-cell-text' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_features_column_one_icon_color',
        [
            'label' => esc_html__( 'Icon Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table tr td:nth-child(2) .saaspricing-cell-icon svg' => 'color: {{VALUE}} ',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_feature_column_two_cell',
        [
            'label' => esc_html__( 'Column Two', 'saaspricing' ), 
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );
    
    $this->add_control(
        'saasp_comparison_column_two_cell_color',
        [
            'label' => esc_html__( 'Text Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table tr td:nth-child(3) .saaspricing-cell-text' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_features_column_two_icon_color',
        [
            'label' => esc_html__( 'Icon Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table tr td:nth-child(3) .saaspricing-cell-icon svg' => 'color: {{VALUE}} ',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_feature_column_three_cell',
        [
            'label' => esc_html__( 'Column Three', 'saaspricing' ), 
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );
    
    $this->add_control(
        'saasp_comparison_column_three_cell_color',
        [
            'label' => esc_html__( 'Text Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .saaspricing-table tr td:nth-child(4) .saaspricing-cell-text' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_features_column_three_icon_color',
        [
            'label' => esc_html__( 'Icon Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table tr td:nth-child(4) .saaspricing-cell-icon svg' => 'color: {{VALUE}} ',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_feature_cell',
        [
            'label' => esc_html__( 'Column Text', 'saaspricing' ), 
            'type' =>  Controls_Manager::HEADING,
            'separator'=>'before'
        ]
    );

    $this->add_group_control(
         Group_Control_Typography::get_type(),
        [
            'name' => 'saasp_comparison_feature_cell_typography',
            'selector' => '{{WRAPPER}} .saaspricing-cell .saaspricing-cell-text',
        ]
    );

    $this->add_responsive_control(
        'saasp_feature_cell_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-feature-list td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    
    $this->start_controls_tabs( 'saasp_cell_normal_hover_background' );
	
    $this->start_controls_tab(
		'saasp_cell_normal_background_color',
		[
			'label' => esc_html__( 'Normal', 'saaspricing'),

		]
	);

    $this->add_control(
        'saasp_comparison_cell_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-table .saaspricing-feature-list' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
		'saasp_cell_hover_background_color',
		[
			'label' => esc_html__( 'Hover', 'saaspricing'),

		]
	);

    $this->add_control(
        'saasp_comparison_cell_hover_background_color',
        [
            'label' => esc_html__( 'Background Color', 'saaspricing' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .saaspricing-main .saaspricing-table .saaspricing-feature-list:hover td' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->end_controls_section();

    $this->start_controls_section(
        'saasp_comparison_cta_section',
        [
            'label' => esc_html__( 'CTA', 'saaspricing' ),
            'tab' =>   Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_section',
        [
            'label' => esc_html__( 'Primary CTA', 'saaspricing' ),
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
            'label' => esc_html__( 'Normal', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_normal_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
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
            'label' => esc_html__( 'Hover', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_hover_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
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
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
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
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_primary_cta_margin',
        [
            'label' => esc_html__( 'Margin', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-primary-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_section',
        [
            'label' => esc_html__( 'Secondary CTA', 'saaspricing' ),
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
            'label' => esc_html__( 'Normal', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_normal_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
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
            'label' => esc_html__( 'Hover', 'saaspricing' ),
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_hover_text_color',
        [
            'label' => esc_html__( 'Color', 'saaspricing' ),
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
            'label' => esc_html__( 'Border Radius', 'saaspricing' ),
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
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_secondary_cta_margin',
        [
            'label' => esc_html__( 'Margin', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .saaspricing-secondary-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'saasp_comparison_cta_global_padding',
        [
            'label' => esc_html__( 'Padding', 'saaspricing' ),
            'type' =>  Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em'],
            'separator' => 'before',
            'selectors' => [
                '{{WRAPPER}} .saaspricing-table .saaspricing-cta-main td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
  <div class="saaspricing-main table-responsive-lg position-relative">
            <table class="saaspricing-table" role="presentation">
                <thead>
                    <!-- Table ribbons -->
                    <?php
                    if( 'yes' === $settings['saasp_comparison_show_ribbon_1']  ||  'yes' === $settings['saasp_comparison_show_countdown_1']  ||
                        'yes' === $settings['saasp_comparison_show_ribbon_2'] || 'yes' === $settings['saasp_comparison_show_countdown_2'] ||  
                        'yes' === $settings['saasp_comparison_show_ribbon_3'] ||  'yes' === $settings['saasp_comparison_show_countdown_3'] ){
                    ?>
                        <tr class="saaspricing-ribbon-table-row">
                            <td class="saaspricing-blank"></td>
                            <?php
                            $saasp_expire_date_one = $settings['saasp_comparison_expire_date_1'];
                            $saasp_expire_date_two = $settings['saasp_comparison_expire_date_2'];
                            $saasp_expire_date_three =  $settings['saasp_comparison_expire_date_3'];

                            for( $i = 1, $j = 0; $i <= $settings['saasp_comparison_select_columns'], $j < $settings['saasp_comparison_select_columns']; $i++, $j++ ){
                                $saasp_visible = '';
                                if( 'yes' === $settings['saasp_comparison_show_ribbon_'.$i] ||  'yes' === $settings['saasp_comparison_show_countdown_'.$i] ){
                                    $saasp_visible;
                                }else{
                                    $saasp_visible = 'saasp-hidden';
                                }
                            ?>
                                    <td class="saaspricing-ribbon-wrapper saaspricing-common-ribbon saaspricing-comparison-header-alignment
                                        <?php echo esc_attr($saasp_visible); ?>" data-expire-date-one="<?php echo esc_attr($saasp_expire_date_one); ?>"
                                        data-expire-date-two="<?php echo esc_attr($saasp_expire_date_two); ?>" data-expire-date-three="<?php echo esc_attr($saasp_expire_date_three); ?>" >
                                        <div class="saaspricing-ribbon-title">
                                            <?php
                                            if($settings['saasp_comparison_ribbon_title_'.$i]){
                                                echo esc_html($settings['saasp_comparison_ribbon_title_'.$i]);
                                            }
                                            ?>
                                        </div>
                                        <div class="saaspricing-countdown"> 
                                            <?php
                                            if( 'yes' === $settings['saasp_comparison_show_countdown_'.$i] &&  '' !== $settings['saasp_comparison_show_countdown_'.$i] ){
                                            ?>
                                                <div class="saaspricing-show-expire-date" data-countdown-index="<?php echo esc_attr($j); ?>" 
                                                data-expire-date-<?php echo esc_attr($i); ?>="<?php echo esc_attr($settings['saasp_comparison_expire_date_'.$i]); ?>">
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                    <!-- Table head -->
                    <?php
                    if( '1' === $settings['saasp_comparison_select_columns'] ){
                        if( '' !== $settings['saasp_comparison_header_title_text_1'] || 
                        '' !== $settings['saasp_comparison_header_title_des_1'] ){
                    ?>
                            <tr class="saaspricing-price-table-head saaspricing-table-background">
                                <td class="saaspricing-blank"></td>
                                <td class="saaspricing-table-head saaspricing-comparison-header-alignment">
                                    <?php printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', $settings['saasp_comparison_column_html_title_tag'], $settings['saasp_comparison_header_title_text_1']);?>
                                    <small>
                                        <?php echo esc_html($settings['saasp_comparison_header_title_des_'.$i]); ?>
                                    </small>
                                </td>
                            </tr>
                    <?php
                        }
                    }elseif( '2' === $settings['saasp_comparison_select_columns'] ){
                        if( '' !== $settings['saasp_comparison_header_title_text_1'] || '' !== $settings['saasp_comparison_header_title_des_1'] 
                        || '' !== $settings['saasp_comparison_header_title_text_2'] || '' !== $settings['saasp_comparison_header_title_des_2'] ){
                    ?>
                            <tr class="saaspricing-price-table-head saaspricing-table-background">
                                <td class="saaspricing-blank"></td>
                                <td class="saaspricing-table-head saaspricing-comparison-header-alignment">
                                    <?php printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', $settings['saasp_comparison_column_html_title_tag'], $settings['saasp_comparison_header_title_text_1']);?>
                                    <small>
                                        <?php echo esc_html($settings['saasp_comparison_header_title_des_1']); ?>
                                    </small>
                                </td>
                                <td class="saaspricing-table-head saaspricing-comparison-header-alignment">
                                    <?php printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', $settings['saasp_comparison_column_html_title_tag'], $settings['saasp_comparison_header_title_text_2']);?>
                                    <small>
                                        <?php echo esc_html($settings['saasp_comparison_header_title_des_2']); ?>
                                    </small>
                                </td>
                            </tr>
                    <?php
                        }
                    }elseif( '3' === $settings['saasp_comparison_select_columns'] ){
                        if( '' !== $settings['saasp_comparison_header_title_text_1'] || '' !== $settings['saasp_comparison_header_title_des_1'] || 
                        '' !== $settings['saasp_comparison_header_title_text_2'] || '' !== $settings['saasp_comparison_header_title_des_2'] || 
                        '' !== $settings['saasp_comparison_header_title_text_3'] || '' !== $settings['saasp_comparison_header_title_des_3'] ){
                    ?>
                            <tr class="saaspricing-price-table-head saaspricing-table-background">
                                <td class="saaspricing-blank"></td>
                                <td class="saaspricing-table-head saaspricing-comparison-header-alignment">
                                    <?php printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', $settings['saasp_comparison_column_html_title_tag'], $settings['saasp_comparison_header_title_text_1']);?>
                                    <small>
                                        <?php echo esc_html($settings['saasp_comparison_header_title_des_1']); ?>
                                    </small>
                                </td>
                                <td class="saaspricing-table-head saaspricing-comparison-header-alignment">
                                    <?php printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', $settings['saasp_comparison_column_html_title_tag'], $settings['saasp_comparison_header_title_text_2']);?>
                                    <small>
                                        <?php echo esc_html($settings['saasp_comparison_header_title_des_2']); ?>
                                    </small>
                                </td>
                                <td class="saaspricing-table-head saaspricing-comparison-header-alignment">
                                    <?php printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', $settings['saasp_comparison_column_html_title_tag'], $settings['saasp_comparison_header_title_text_3']);?>
                                    <small>
                                        <?php echo esc_html($settings['saasp_comparison_header_title_des_3']); ?>
                                    </small>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    <!-- Table images, pricing, review  -->
                    <tr class="saaspricing-table-main saaspricing-table-background">
                        <td class="saaspricing-table-title-des"> 
                            <?php
                            if( '' !== $settings['saasp_comparison_header_table_title'] ){
                                printf('<%1$s class="d-block saaspricing-table-title" role="heading"> %2$s </%1$s>', $settings['saasp_comparison_header_table_title_tag'], $settings['saasp_comparison_header_table_title']);
                            }
                            ?>
                            <?php
                            if('' !== $settings['saasp_comparison_header_table_description'] ){
                            ?>
                                <span class="d-block saaspricing-w-sm-100 saaspricing-table-description">
                                    <?php echo esc_html($settings['saasp_comparison_header_table_description']); ?>
                                </span>
                            <?php
                            }
                            ?>
                        </td>

                        <?php
                        for( $i = 1; $i <= $settings['saasp_comparison_select_columns'] ; $i++ ){
                        ?>
                            <td class="saaspricing-price saaspricing-original-price saaspricing-comparison-header-alignment">
                                <?php
                                if( '' !== $settings['saasp_comparison_choose_media_'.$i]['url']){
                                ?>
                                    <a
                                    <?php
                                    if( 'yes' === $settings['saasp_comparison_media_light_box_'.$i] ){
                                    ?>
                                    class="saaspricing-image-popup"
                                    <?php
                                    }
                                    ?>
                                    href="<?php echo esc_url($settings['saasp_comparison_choose_media_'.$i]['url']); ?>">
                                        <img src="<?php echo esc_url($settings['saasp_comparison_choose_media_'.$i]['url']); ?>" class="<?php echo esc_attr('saaspricing-header-image-'.$i) ?>" >
                                    </a>
                                <?php
                                }
                                ?>
                                <div class="saasspricing-pricing-block saaspricing-comparison-header-alignment" >    
                                    <?php
                                    if( 'yes' === $settings['saasp_comparison_sale_'.$i] ){
                                    ?>
                                        <s class="saaspricing-original-slashed-price me-2">
                                            <?php
                                            if( 'none' !== $settings['saasp_comparison_currency_symbol_'.$i] && 'yes' === $settings['saasp_comparison_sale_'.$i] ){
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
                                                <span>
                                                    <?php echo esc_html($settings['saasp_comparison_original_price_'.$i]); ?>
                                                </span>
                                            <?php
                                            }
                                            ?>
                                        </s>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if( 'none' !== $settings['saasp_comparison_currency_symbol_'.$i] && 
                                    'before' === $settings['saasp_comparison_header_pricing_symbol_position'] ||
                                    empty($settings['saasp_comparison_header_pricing_symbol_position']) ){
                                    ?>
                                        <span class="saaspricing-price-text saaspricing-price-symbol saaspricing-price-typography">
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
                                    if( '' === $settings['saasp_comparison_currency_format_'.$i] ){ 
                                    ?>
                                        <span class="saaspricing-price-text saaspricing-price-typography">
                                            <?php echo esc_html(explode(".", $settings['sassp_comparison_price_'.$i])[0]); ?>
                                        </span>
                                        <?php
                                        if('' !== explode(".", $settings['sassp_comparison_price_'.$i])[1]){
                                        ?>
                                            <span class="saaspricing-price-text saaspricing-fraction-price saaspricing-price-typography">
                                                <?php echo esc_html(explode(".", $settings['sassp_comparison_price_'.$i])[1]); ?>
                                            </span>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    }else{
                                    ?>
                                        <span class="saaspricing-price-text saaspricing-price-typography">
                                            <?php echo esc_html($settings['sassp_comparison_price_'.$i]); ?>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if( 'none' !== $settings['saasp_comparison_currency_symbol_'.$i] && 'after' === $settings['saasp_comparison_header_pricing_symbol_position'] ){
                                    ?>
                                        <span class="saaspricing-price-text saaspricing-price-symbol saaspricing-price-typography">
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
                                    if('' !== $settings['saasp_comparison_period_'.$i]){
                                    ?>
                                        <span class="saaspricing-period ms-1 saaspricing-comparison-header-alignment
                                        <?php if( 'below' === $settings['saasp_comparison_header_period_position']){ echo esc_attr('w-100'); } ?>">
                                            <?php
                                                echo esc_html($settings['saasp_comparison_period_'.$i]);
                                            ?>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                if( 'yes' === $settings['saasp_comparison_show_rating_'.$i] && '' !== $settings['saasp_comparison_rating_num_'.$i] ){
                                ?>
                                    <div class="saaspricing-ratings">
                                        <div class="saaspricing-star-icon fs-6"> 
                                            <?php                                    
                                            $saasp_rating = $settings['saasp_comparison_rating_num_'.$i];
                                            $saasp_full_stars = floor( $saasp_rating);
                                            $saasp_half_star = $saasp_rating - $saasp_full_stars;

                                            for ( $k = 0; $k <  $saasp_full_stars; $k++ ) {
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
                                            for( $j=0; $j < 5 - ceil($settings['saasp_comparison_rating_num_'.$i]); $j++ ){
                                            ?>
                                                <span>
                                                    <i class="fas fa-star-half saaspricing-star-left saaspricing-unmark"></i>
                                                    <i class="fas fa-star-half saaspricing-star-right saaspricing-unmark"></i>
                                                </span>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if( '' !== $settings['saasp_comparison_rating_counter_'.$i] ){
                                            ?>
                                                <small class="saaspricing-review-text"> 
                                                    <?php echo esc_html__('(','saaspricing') . esc_html($settings['saasp_comparison_rating_counter_'.$i]) . esc_html__(')','saaspricing'); ?> 
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
                                if ( ! empty( $settings['saasp_comparison_primary_cta_url_'.$i]['url'] ) ) {
                                    $this->add_link_attributes( 'saasp_comparison_primary_cta_url_'.$i, $settings['saasp_comparison_primary_cta_url_'.$i] );
                                }
                                ?>
                                <?php
                                if( '' !== $settings['saasp_comparison_primary_cta_text_'.$i] && 'top' === $settings['saasp_comparison_primary_cta_position_'.$i] ){
                                    if( 'yes' === $settings['saasp_comparison_primary_cta_switch_'.$i] ){
                                ?>
                                        <a class="btn saaspricing-primary-btn saaspricing-primary-<?php echo esc_attr($i); ?> <?php
                                        if( 'extra-small' === $settings['saasp_comparison_primary_cta_size_'.$i] ){
                                            echo esc_attr('saaspricing-xsm-btn');
                                        }elseif( 'small' === $settings['saasp_comparison_primary_cta_size_'.$i] ){
                                            echo esc_attr('saaspricing-sm-btn');
                                        }
                                        elseif( 'medium' === $settings['saasp_comparison_primary_cta_size_'.$i] ){
                                            echo esc_attr('saaspricing-m-btn');
                                        }
                                        elseif( 'large' === $settings['saasp_comparison_primary_cta_size_'.$i] ){
                                            echo esc_attr('saaspricing-l-btn');
                                        }
                                        elseif( 'extra-large' === $settings['saasp_comparison_primary_cta_size_'.$i] ){
                                            echo esc_attr('saaspricing-xl-btn');
                                        }
                                        ?>" 
                                        role="button" 
                                        <?php
                                        echo wp_kses($this->get_render_attribute_string( 'saasp_comparison_primary_cta_url_'.$i ), $this->saasp_allowed_tags()); 
                                        ?>>
                                            <?php echo esc_html($settings['saasp_comparison_primary_cta_text_'.$i]); ?>
                                            <span class="saaspricing-primary-spacing-<?php echo esc_attr($i); ?>">
                                                <?php Icons_Manager::render_icon( $settings['saasp_comparison_primary_cta_icon_'.$i], [ 'aria-hidden' => 'true' ] ); ?>
                                            </span>
                                        </a>
                                <?php
                                    }
                                }
                                ?>
                                <?php
                                $saasp_margin_top = "";

                                if( 'top' === $settings['saasp_comparison_primary_cta_position_'.$i] &&  'yes' === $settings['saasp_comparison_primary_cta_switch_'.$i] ){
                                ?>
                                    <br/>
                                <?php
                                    $saasp_margin_top = "mt-3";
                                }else{
                                    $saasp_margin_top;
                                }
                                ?>
                                <?php
                                if( '' !== $settings['saasp_comparison_secondary_cta_text_'.$i] && 'top' === $settings['saasp_comparison_secondary_cta_position_'.$i] ){
                                    if( ! empty( $settings['saasp_comparison_secondary_cta_url_'.$i]['url'] ) ){
                                        $this->add_link_attributes( 'saasp_comparison_secondary_cta_url_'.$i, $settings['saasp_comparison_secondary_cta_url_'.$i] );
                                    }
                                    if( 'yes' === $settings['saasp_comparison_secondary_cta_switch_'.$i] ){
                                ?>
                                        <a class="btn btn-link saaspricing-secondary-btn saaspricing-secondary-<?php echo esc_attr($i); ?> <?php echo esc_attr($saasp_margin_top); ?> <?php
                                        if( 'extra-small' === $settings['saasp_comparison_secondary_cta_size_'.$i] ){
                                            echo esc_attr('saaspricing-xsm-btn');
                                        }elseif( 'small' === $settings['saasp_comparison_secondary_cta_size_'.$i] ){
                                            echo esc_attr('saaspricing-sm-btn');
                                        }
                                        elseif( 'medium' === $settings['saasp_comparison_secondary_cta_size_'.$i] ){
                                            echo esc_attr('saaspricing-m-btn');
                                        }
                                        elseif( 'large' === $settings['saasp_comparison_secondary_cta_size_'.$i] ){
                                            echo esc_attr('saaspricing-l-btn');
                                        }
                                        elseif( 'extra-large' === $settings['saasp_comparison_secondary_cta_size_'.$i] ){
                                            echo esc_attr('saaspricing-xl-btn');
                                        }
                                        ?>" 
                                        role="button" 
                                        <?php
                                        echo wp_kses($this->get_render_attribute_string( 'saasp_comparison_secondary_cta_url_'.$i ), $this->saasp_allowed_tags()); 
                                        ?>> 
                                            <?php echo esc_html($settings['saasp_comparison_secondary_cta_text_'.$i]); ?>
                                            <span class="saaspricing-secondary-spacing-<?php echo esc_attr($i); ?>">
                                                <?php Icons_Manager::render_icon( $settings['saasp_comparison_secondary_cta_icon_'.$i], [ 'aria-hidden' => 'true' ] ); ?>
                                            </span> 
                                        </a>
                                <?php
                                    }
                                }
                                ?>
                            </td>
                        <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody class="saaspricing-table-body saaspricing-table-background">
                     <!-- Table Features  -->
                    <?php
                    if( '1' === $settings['saasp_comparison_select_columns'] && $settings['saasp_comparison_table_feature_list_1'] ){
                        foreach( $settings['saasp_comparison_table_feature_list_1'] as $saasp_features_one ){
                    ?>
                            <tr class="saaspricing-feature-list">
                                <td class="saaspricing-feature-main d-flex align-items-center">
                                    <?php
                                    if( 'yes' === $saasp_features_one['saasp_comparison_show_features_tooltip'] && 
                                    'before' === $saasp_features_one['saasp_comparison_features_tooltip_position'] ||
                                    empty($saasp_features_one['saasp_comparison_features_tooltip_position']) ){
                                    ?>
                                        <span data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="<?php echo esc_attr($saasp_features_one['saasp_comparison_features_tooltip_description']); ?>"
                                        class="saaspricing-price-table-help">
                                            <i class="far fa-fw fa-question-circle"></i>
                                        </span> 
                                    <?php
                                    }
                                    ?>
                                    <span class="saaspricing-feature-title">
                                        <?php echo esc_html($saasp_features_one['saasp_comparison_feature_title']); ?>
                                    </span> 
                                    <?php
                                    if( 'yes' === $saasp_features_one['saasp_comparison_show_features_tooltip'] && 'after' === $saasp_features_one['saasp_comparison_features_tooltip_position'] ){
                                    ?>
                                        <span data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="<?php echo esc_attr($saasp_features_one['saasp_comparison_features_tooltip_description']); ?>"
                                        class="saaspricing-price-table-help">
                                            <i class="far fa-fw fa-question-circle"></i>
                                        </span> 
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="saaspricing-cell">
                                    <span class="saaspricing-cell-icon">
                                        <?php Icons_Manager::render_icon( $saasp_features_one['saasp_comparison_feature_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </span>
                                    <span class="saaspricing-cell-text">
                                        <?php echo esc_html($saasp_features_one['saasp_comparison_feature_text']); ?>
                                    </span>
                                </td>
                            </tr>
                    <?php
                        }
                    }elseif( '2' === $settings['saasp_comparison_select_columns'] && $settings['saasp_comparison_table_feature_list_2'] ){
                        foreach( $settings['saasp_comparison_table_feature_list_2'] as $saasp_features_two ){
                    ?>
                       <tr class="saaspricing-feature-list">
                            <td class="saaspricing-feature-main d-flex align-items-center">
                                <?php
                                if( 'yes' === $saasp_features_two['saasp_comparison_show_features_tooltip'] && 
                                'before' === $saasp_features_two['saasp_comparison_features_tooltip_position'] ||
                                empty($saasp_features_two['saasp_comparison_features_tooltip_position']) ){
                                ?>
                                    <span data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="<?php echo esc_attr($saasp_features_two['saasp_comparison_features_tooltip_description']); ?>"
                                    class="saaspricing-price-table-help">
                                        <i class="far fa-fw fa-question-circle"></i>
                                    </span> 
                                <?php
                                }
                                ?>
                                <span class="saaspricing-feature-title">
                                    <?php echo esc_html($saasp_features_two['saasp_comparison_feature_title']); ?>
                                </span> 
                                <?php
                                if( 'yes' === $saasp_features_two['saasp_comparison_show_features_tooltip'] && 'after' === $saasp_features_two['saasp_comparison_features_tooltip_position'] ){
                                ?>
                                    <span data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="<?php echo esc_attr($saasp_features_two['saasp_comparison_features_tooltip_description']); ?>"
                                    class="saaspricing-price-table-help">
                                        <i class="far fa-fw fa-question-circle"></i>
                                    </span> 
                                <?php
                                }
                                ?>
                            </td>
                            <td class="saaspricing-cell">
                                <span class="saaspricing-cell-icon">
                                    <?php Icons_Manager::render_icon( $saasp_features_two['saasp_comparison_feature_icon_1'], [ 'aria-hidden' => 'true' ] ); ?>
                                </span>
                                <span class="saaspricing-cell-text">
                                    <?php echo esc_html($saasp_features_two['saasp_comparison_feature_text_1']); ?>
                                </span>
                            </td>
                            <td class="saaspricing-cell">
                                <span class="saaspricing-cell-icon">
                                    <?php Icons_Manager::render_icon( $saasp_features_two['saasp_comparison_feature_icon_2'], [ 'aria-hidden' => 'true' ] ); ?>
                                </span>
                                <span class="saaspricing-cell-text">
                                    <?php echo esc_html($saasp_features_two['saasp_comparison_feature_text_2']); ?>
                                </span>
                            </td>
                        </tr>
                    <?php
                        }
                    }elseif( '3' === $settings['saasp_comparison_select_columns'] && $settings['saasp_comparison_table_feature_list_3'] ){
                        foreach( $settings['saasp_comparison_table_feature_list_3'] as $saasp_features_three ){
                    ?>
                            <tr class="saaspricing-feature-list">
                                <td class="saaspricing-feature-main d-flex align-items-center">
                                    <?php
                                    if( 'yes' === $saasp_features_three['saasp_comparison_show_features_tooltip'] && 
                                    'before' === $saasp_features_three['saasp_comparison_features_tooltip_position'] ||
                                    empty($saasp_features_three['saasp_comparison_features_tooltip_position']) ){
                                    ?>
                                        <span data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="<?php echo esc_attr($saasp_features_three['saasp_comparison_features_tooltip_description']); ?>"
                                        class="saaspricing-price-table-help">
                                            <i class="far fa-fw fa-question-circle"></i>
                                        </span> 
                                    <?php
                                    }
                                    ?>
                                    <span class="saaspricing-feature-title">
                                        <?php echo esc_html($saasp_features_three['saasp_comparison_feature_title']); ?>
                                    </span>
                                    <?php
                                    if( 'yes' === $saasp_features_three['saasp_comparison_show_features_tooltip'] && 'after' === $saasp_features_three['saasp_comparison_features_tooltip_position'] ){
                                    ?>
                                        <span data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="<?php echo esc_attr($saasp_features_three['saasp_comparison_features_tooltip_description']); ?>"
                                        class="saaspricing-price-table-help">
                                            <i class="far fa-fw fa-question-circle"></i>
                                        </span> 
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="saaspricing-cell">
                                    <span class="saaspricing-cell-icon" >
                                        <?php Icons_Manager::render_icon( $saasp_features_three['saasp_comparison_feature_icon_1'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </span>
                                    <span class="saaspricing-cell-text">
                                        <?php echo esc_html($saasp_features_three['saasp_comparison_feature_text_1']); ?>
                                    </span>
                                </td>
                                <td class="saaspricing-cell ">
                                    <span class="saaspricing-cell-icon">
                                        <?php Icons_Manager::render_icon( $saasp_features_three['saasp_comparison_feature_icon_2'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </span>
                                    <span class="saaspricing-cell-text">
                                        <?php echo esc_html($saasp_features_three['saasp_comparison_feature_text_2']); ?>
                                    </span>
                                </td>
                                <td class="saaspricing-cell">
                                    <span class="saaspricing-cell-icon">
                                        <?php Icons_Manager::render_icon( $saasp_features_three['saasp_comparison_feature_icon_3'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </span>
                                    <span class="saaspricing-cell-text">
                                        <?php echo esc_html($saasp_features_three['saasp_comparison_feature_text_3']); ?>
                                    </span>
                                </td>  
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
                <tfoot class="saaspricing-table-background">
                    <!-- Table CTA -->
                    <?php
                    if( 'bottom' === $settings['saasp_comparison_primary_cta_position_1']  || 'bottom' === $settings['saasp_comparison_secondary_cta_position_1'] 
                     || 'bottom' === $settings['saasp_comparison_primary_cta_position_2']  || 'bottom' === $settings['saasp_comparison_secondary_cta_position_2']
                     || 'bottom' === $settings['saasp_comparison_primary_cta_position_3']  || 'bottom' === $settings['saasp_comparison_secondary_cta_position_3']
                    ){
                    ?>
                        <tr class="saaspricing-cta-main">
                            <td class="saaspricing-blank"></td>
                            <?php
                            for( $i= 1; $i <= $settings['saasp_comparison_select_columns']; $i++ ){
                                if ( ! empty( $settings['saasp_comparison_primary_cta_url_'.$i]['url'] ) ) {
                                $this->add_link_attributes( 'saasp_comparison_primary_cta_url_'.$i, $settings['saasp_comparison_primary_cta_url_'.$i] );
                                }
                            ?>
                                <td class="saaspricing-footer-cta">
                                    <?php
                                    if( '' !== $settings['saasp_comparison_primary_cta_text_'.$i] && 'bottom' === $settings['saasp_comparison_primary_cta_position_'.$i ] ||
                                    empty($settings['saasp_comparison_primary_cta_position_'.$i ]) ){
                                        if( 'yes' === $settings['saasp_comparison_primary_cta_switch_'.$i] ){
                                    ?>
                                            <a class="btn saaspricing-primary-btn saaspricing-primary-<?php echo esc_attr($i); ?> <?php
                                            if( 'extra-small' === $settings['saasp_comparison_primary_cta_size_'.$i] ){
                                                echo esc_attr('saaspricing-xsm-btn');
                                            }elseif( 'small' === $settings['saasp_comparison_primary_cta_size_'.$i] ){
                                                echo esc_attr('saaspricing-sm-btn');
                                            }
                                            elseif( 'medium' === $settings['saasp_comparison_primary_cta_size_'.$i] ){
                                                echo esc_attr('saaspricing-m-btn');
                                            }
                                            elseif( 'large' === $settings['saasp_comparison_primary_cta_size_'.$i] ){
                                                echo esc_attr('saaspricing-l-btn');
                                            }
                                            elseif( 'extra-large' === $settings['saasp_comparison_primary_cta_size_'.$i] ){
                                                echo esc_attr('saaspricing-xl-btn');
                                            }
                                            ?>" 
                                            role="button" 
                                            <?php
                                            echo wp_kses($this->get_render_attribute_string( 'saasp_comparison_primary_cta_url_'.$i ), $this->saasp_allowed_tags()); 
                                            ?>>
                                                <?php echo esc_html($settings['saasp_comparison_primary_cta_text_'.$i]); ?>
                                                <span class="saaspricing-primary-spacing-<?php echo esc_attr($i); ?>">
                                                    <?php Icons_Manager::render_icon( $settings['saasp_comparison_primary_cta_icon_'.$i], [ 'aria-hidden' => 'true' ] ); ?>
                                                </span>
                                            </a>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <?php
                                    if( 'bottom' === $settings['saasp_comparison_primary_cta_position_'.$i] && !empty($settings['saasp_comparison_primary_cta_position_'.$i]) ){
                                    ?>
                                        <br/>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if(  '' !== $settings['saasp_comparison_secondary_cta_text_'.$i] &&  'bottom' === $settings['saasp_comparison_secondary_cta_position_'.$i] ||
                                    empty($settings['saasp_comparison_secondary_cta_position_'.$i ]) ){
                                        if( ! empty( $settings['saasp_comparison_secondary_cta_url_'.$i]['url'] ) ){
                                        $this->add_link_attributes( 'saasp_comparison_secondary_cta_url_'.$i, $settings['saasp_comparison_secondary_cta_url_'.$i] );
                                        }
                                        if( 'yes' === $settings['saasp_comparison_secondary_cta_switch_'.$i] ){
                                    ?>
                                            <a class="btn btn-link saaspricing-secondary-btn 
                                            saaspricing-secondary-<?php echo esc_attr($i); ?> <?php
                                            if( 'extra-small' === $settings['saasp_comparison_secondary_cta_size_'.$i] ){
                                                echo esc_attr('saaspricing-xsm-btn');
                                            }elseif( 'small' === $settings['saasp_comparison_secondary_cta_size_'.$i] ){
                                                echo esc_attr('saaspricing-sm-btn');
                                            }
                                            elseif( 'medium' === $settings['saasp_comparison_secondary_cta_size_'.$i] ){
                                                echo esc_attr('saaspricing-m-btn');
                                            }
                                            elseif( 'large' === $settings['saasp_comparison_secondary_cta_size_'.$i] ){
                                                echo esc_attr('saaspricing-l-btn');
                                            }
                                            elseif( 'extra-large' === $settings['saasp_comparison_secondary_cta_size_'.$i] ){
                                                echo esc_attr('saaspricing-xl-btn');
                                            }
                                            ?>" 
                                            role="button" 
                                            <?php 
                                            echo wp_kses($this->get_render_attribute_string( 'saasp_comparison_secondary_cta_url_'.$i ), $this->saasp_allowed_tags()); 
                                            ?>> 
                                                <?php echo esc_html($settings['saasp_comparison_secondary_cta_text_'.$i]); ?>
                                                <span class="saaspricing-secondary-spacing-<?php echo esc_attr($i); ?>">
                                                    <?php Icons_Manager::render_icon( $settings['saasp_comparison_secondary_cta_icon_'.$i], [ 'aria-hidden' => 'true' ] ); ?>
                                                </span> 
                                            </a>
                                    <?php
                                        }
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
                </tfoot>
            </table>
        </div>
<?php
 }
}
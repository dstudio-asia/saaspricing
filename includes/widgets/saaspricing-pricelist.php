<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
class Saaspricing_Pricelist extends Widget_Base {


	public function get_name() {
		return 'saaspricing-pricelist';
	}

	public function get_title() {
		return __( 'Pricelist', 'saaspricing-pro' );
	}

	public function get_icon() {
		return 'saasp-icon eicon-price-list';
	}

	public function get_categories() {
		return [ 'saas_pricing_category' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'saasp_pricelist_repeater_content_section',
			[
				'label' => esc_html__( 'Price List', 'saaspricing-pro' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$saasp_priclist_repeater = new Repeater();

		$saasp_priclist_repeater->add_control(
			'saasp_pricelist_list_title',
			[
				'label' => esc_html__( 'List Title', 'saaspricing-pro' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'saaspricing-pro' ),
				'placeholder' => esc_html__( 'Type your title here', 'saaspricing-pro' ),
			]
		);

		$saasp_priclist_repeater->add_control(
			'saasp_pricelist_list_description',
			[
				'label' => esc_html__( 'List Description', 'saaspricing-pro' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'default' => esc_html__( 'Default description', 'saaspricing-pro' ),
				'placeholder' => esc_html__( 'Type your description here', 'saaspricing-pro' ),
			]
		);

		$saasp_priclist_repeater->add_control(
			'saasp_pricelist_list_price',
			[
				'label' => esc_html__( 'List Price', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 100,
				'step' => 5,
				'default' => 10,
			]
		);

		$this->add_control(
			'saasp_pricelist_repeater',
			[
				'label' => esc_html__( 'Pricelist Items', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::REPEATER,
				'fields' => $saasp_priclist_repeater->get_controls(),
				'default' => [
					[
						'saasp_pricelist_list_title' => esc_html__( 'Mobile Optimized "Link-In-Bio" Store A place', 'saaspricing-pro' ),
						'saasp_pricelist_list_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'saaspricing-pro' ),
					],
					[
						'saasp_pricelist_list_title' => esc_html__( 'Calender Invites & Bookings', 'saaspricing-pro' ),
						'saasp_pricelist_list_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'saaspricing-pro' ),
					],
					[
						'saasp_pricelist_list_title' => esc_html__( 'Course Builder', 'saaspricing-pro' ),
						'saasp_pricelist_list_description' => '',
					],
					[
						'saasp_pricelist_list_title' => esc_html__( 'Audience Analytics', 'saaspricing-pro' ),
						'saasp_pricelist_list_description' => '',
					],
				],
				'title_field' => '{{{ saasp_pricelist_list_title }}}',
			]
		);

		$this->add_control(
			'saasp_pricelist_symbol_heading',
			[
				'label' => esc_html__( 'Pricing', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);
		
		$this->add_control(
			'saasp_pricelist_currency_symbol',
			[
				'label' => esc_html__( 'Currency Symbol', 'saaspricing-pro'  ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'None', 'saaspricing-pro'  ),
					'dollar' => '&#36; ' . esc_html__( 'Dollar', 'Currency', 'saaspricing-pro'  ),
					'euro' => '&#128; ' . esc_html__( 'Euro', 'Currency', 'saaspricing-pro'  ),
					'baht' => '&#3647; ' . esc_html__( 'Baht', 'Currency', 'saaspricing-pro'  ),
					'franc' => '&#8355; ' . esc_html__( 'Franc', 'Currency', 'saaspricing-pro'  ),
					'guilder' => '&fnof; ' . esc_html__( 'Guilder', 'Currency', 'saaspricing-pro'  ),
					'krona' => 'kr' . esc_html__( 'Krona', 'Currency', 'saaspricing-pro'  ),
					'lira' => '&#8356; ' . esc_html__( 'Lira', 'Currency', 'saaspricing-pro'  ),
					'peseta' => '&#8359;' . esc_html__( 'Peseta', 'Currency', 'saaspricing-pro'  ),
					'peso' => '&#8369; ' . esc_html__( 'Peso', 'Currency', 'saaspricing-pro'  ),
					'pound' => '&#163; ' . esc_html__( 'Pound Sterling', 'Currency', 'saaspricing-pro'  ),
					'real' => 'R$ ' . esc_html__( 'Real', 'Currency', 'saaspricing-pro'  ),
					'ruble' => '&#8381; ' . esc_html__( 'Ruble', 'Currency', 'saaspricing-pro'  ),
					'rupee' => '&#8360; ' . esc_html__( 'Rupee', 'Currency', 'saaspricing-pro'  ),
					'indian_rupee' => '&#8377; ' . esc_html__( 'Rupee (Indian)', 'Currency', 'saaspricing-pro'  ),
					'shekel' => '&#8362; ' . esc_html__( 'Shekel', 'Currency', 'saaspricing-pro'  ),
					'yen' => '&#165; ' . esc_html__( 'Yen/Yuan', 'Currency', 'saaspricing-pro'  ),
					'won' => '&#8361; ' . esc_html__( 'Won', 'Currency', 'saaspricing-pro'  ),
					'custom' => esc_html__( 'Custom', 'saaspricing-pro'  ),
				],
				'default' => 'dollar',
			]
		);
		
		$this->add_control(
			'saasp_pricelist_currency_symbol_custom',
			[
				'label' => esc_html__( 'Custom Symbol', 'saaspricing-pro'  ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'saasp_pricelist_currency_symbol' => 'custom',
				],
			]
		);

		$this->add_control(
			'saasp_pricelist_divider_heading',
			[
				'label' => esc_html__( 'Divider', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'saasp_pricelist_divider_switch',
			[
				'label' => esc_html__( 'Show Divider', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'saaspricing-pro' ),
				'label_off' => esc_html__( 'Hide', 'saaspricing-pro' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'saasp_pricelist_sale_section',
			[
				'label' => esc_html__( 'Sale', 'saaspricing-pro' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'saasp_pricelist_discount_heading',
			[
				'label' => esc_html__( 'Discount', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'saasp_pricelist_show_discount',
			[
				'label' => esc_html__( 'Show Discount', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'saaspricing-pro' ),
				'label_off' => esc_html__( 'Hide', 'saaspricing-pro' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'saasp_pricelist_discount_title',
			[
				'label' => esc_html__( 'Title', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'What You Had Spend Otherwise', 'saaspricing-pro' ),
				'placeholder' => esc_html__( 'Type default title here', 'saaspricing-pro' ),
				'condition' => [
					'saasp_pricelist_show_discount' => 'yes',
				],
			]
		);

		$this->add_control(
			'saasp_pricelist_discount_price',
			[
				'label' => esc_html__( 'Price', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 1000,
				'step' => 1,
				'default' => 50,
				'condition' => [
					'saasp_pricelist_show_discount' => 'yes',
				],
			]
		);

		$this->add_control(
			'saasp_pricelist_discount_period',
			[
				'label' => esc_html__( 'Period', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( '/mo', 'saaspricing-pro' ),
				'placeholder' => esc_html__( 'Type your period here', 'saaspricing-pro' ),
				'condition' => [
					'saasp_pricelist_show_discount' => 'yes',
				],
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_heading',
			[
				'label' => esc_html__( 'Sale', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_title',
			[
				'label' => esc_html__( 'Title', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'Join The Stan Fam', 'saaspricing-pro' ),
				'placeholder' => esc_html__( 'Type default title here', 'saaspricing-pro' ),
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_period',
			[
				'label' => esc_html__( 'Period', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( '/mo', 'saaspricing-pro' ),
				'placeholder' => esc_html__( 'Type your period here', 'saaspricing-pro' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'saasp_pricelist_button',
			[
				'label' => esc_html__( 'Button', 'saaspricing-pro' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'saasp_pricelist_button_switch',
			[
				'label' => esc_html__( 'Show Button', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'saaspricing-pro' ),
				'label_off' => esc_html__( 'Hide', 'saaspricing-pro' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
	
		$this->add_control(
			'saasp_pricelist_button_text',
			[
				'label' => esc_html__( 'Text', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'Get Started', 'saaspricing-pro' ),
				'condition' =>[
					'saasp_pricelist_button_switch' => 'yes',
				]
			]
		);
	
		$this->add_control(
			'saasp_pricelist_button_url',
			[
				'label' => esc_html__( 'Link', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'saaspricing-pro' ),
				'options' => [ 'url', 'is_external', 'nofollow', 'custom_attributes' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
				'condition' =>[
					'saasp_pricelist_button_switch' => 'yes',
				],
				'dynamic' => [
					'active' => true
				]
			]
		);
	
		$this->add_control(
			'saasp_pricelist_button_size',
			[
				'label' => esc_html__( 'Size', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::SELECT,
				'default' => 'small',
				'options' => [
					'extra-small' => esc_html__( 'Extra Small', 'saaspricing-pro' ),
					'small'  => esc_html__( 'Small', 'saaspricing-pro' ),
					'medium' => esc_html__( 'Medium', 'saaspricing-pro' ),
					'large' => esc_html__( 'Large', 'saaspricing-pro' ),
					'extra-large' => esc_html__( 'Extra Large', 'saaspricing-pro' ),
				],
				'condition' =>[
					'saasp_pricelist_button_switch' => 'yes',
				]
			]
		);
	
		$this->add_control(
			'saasp_pricelist_button_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::ICONS,
				'skin' => 'inline',
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'fa-solid',
				],
				'exclude_inline_options' => [ 'svg' ],
				'condition' =>[
					'saasp_pricelist_button_switch' => 'yes',
				]
			]
		);
		
		$this->add_responsive_control(
			'saasp_pricelist_button_spacing',
			[
				'label' => esc_html__( 'Icon Spacing', 'saaspricing-pro' ),
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
					'{{WRAPPER}} .saaspricing-pricelist-icon-spacing' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
				'condition' =>[
					'saasp_pricelist_button_switch' => 'yes',
				]
			]
		);

		$this->add_control(
			'saasp_pricelist_button_alignment',
			[
				'label' => esc_html__( 'CTA Alignment', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'saaspricing-pro' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'saaspricing-pro' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'saaspricing-pro' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justify', 'saaspricing-pro' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'separator' => 'before',
				'condition' =>[
					'saasp_pricelist_button_switch' => 'yes',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'saasp_pricelist_section_style',
			[
				'label' => esc_html__( 'Price List', 'saaspricing-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'saasp_pricelist_background_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-main-container' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'saasp_pricelist_list_spacing_style',
			[
				'label' => esc_html__( 'Pricelist Gap Between', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 13,
				],
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-wraper:not(:first-child)' => 'padding-top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .saasp-pricelist-wraper:not(:last-child)' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .saasp-pricelist-main-container',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'saasp_pricelist_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'saaspricing' ),
				'type' =>  Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-main-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	
		$this->add_group_control(
			 Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'saasp_pricelist_box_shadow',
				'selector' => '{{WRAPPER}} .saasp-pricelist-main-container',
			]
		);

		$this->add_responsive_control(
			'saasp_pricelist_padding',
			[
				'label' => esc_html__( 'Padding', 'saaspricing' ),
				'type' =>  Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em'],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-main-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_control(
			'saasp_pricelist_title_style_heading',
			[
				'label' => esc_html__( 'Title', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'saasp_pricelist_title_color_style',
			[
				'label' => esc_html__( 'Color', 'saaspricing-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'saasp_pricelist_title_typography',
				'selector' => '{{WRAPPER}} .saasp-pricelist-title',
			]
		);

		$this->add_responsive_control(
			'saasp_pricelist_title_spacing_style',
			[
				'label' => esc_html__( 'Spacing', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'saasp_pricelist_description_style_heading',
			[
				'label' => esc_html__( 'Description', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'saasp_pricelist_description_color_style',
			[
				'label' => esc_html__( 'Color', 'saaspricing-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'saasp_pricelist_description_typography',
				'selector' => '{{WRAPPER}} .saasp-pricelist-description',
			]
		);

		$this->add_control(
			'saasp_pricelist_price_style_heading',
			[
				'label' => esc_html__( 'Price', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'saasp_pricelist_price_color_style',
			[
				'label' => esc_html__( 'Color', 'saaspricing-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-price' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'saasp_pricelist_price_typography',
				'selector' => '{{WRAPPER}} .saasp-pricelist-price',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'saasp_pricelist_divider_section_style',
			[
				'label' => esc_html__( 'Divider', 'saaspricing-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'saasp_pricelist_divider_weight',
			[
				'label' => esc_html__( 'Weight', 'saaspricing-pro' ),
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
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} hr.saasp-list-cal-separator' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'saasp_pricelist_divider_width',
			[
				'label' => esc_html__( 'Width', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} hr.saasp-list-cal-separator' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'saasp_pricelist_divider_gap',
			[
				'label' => esc_html__( 'Gap', 'saaspricing-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 10,
					'right' => 0,
					'bottom' => 10,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-divider-parent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	
		$this->add_control(
			'saasp_pricelist_divider_color',
			[
				'label' => esc_html__( 'Color', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} hr.saasp-list-cal-separator' => 'border-color: {{VALUE}}',
				],
			]
		);
	
		$this->add_control(
			'saasp_pricelist_divider_border_style',
			[
				'label' => esc_html__( 'Style', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid'  => esc_html__( 'Solid', 'saaspricing-pro' ),
					'dashed' => esc_html__( 'Dashed', 'saaspricing-pro' ),
					'dotted' => esc_html__( 'Dotted', 'saaspricing-pro' ),
					'double' => esc_html__( 'Double', 'saaspricing-pro' ),
					'groove' => esc_html__( 'Groove', 'saaspricing-pro' ),
				],
				'selectors' => [
					'{{WRAPPER}} hr.saasp-list-cal-separator' => 'border-style: {{VALUE}};',
				],
			]
		);
	
		$this->add_control(
			'saasp_pricelist_divider_alignment',
			[
				'label' => esc_html__( 'Alignment', 'saasprcing' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'0 0 0 0' => [
						'title' => esc_html__( 'Left', 'saasprcing' ),
						'icon' => 'eicon-text-align-left',
					],
					'0 auto 0 auto' => [
						'title' => esc_html__( 'Center', 'saasprcing' ),
						'icon' => 'eicon-text-align-center',
					],
					'0 0 0 auto' => [
						'title' => esc_html__( 'Right', 'saasprcing' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '0 auto 0 auto',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} hr.saasp-list-cal-separator' => 'margin: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'saasp_pricelist_discount_section_style',
			[
				'label' => esc_html__( 'Discount', 'saaspricing-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_discount_heading_style',
			[
				'label' => esc_html__( 'Discount Title', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_discount_title_style',
			[
				'label' => esc_html__( 'Color', 'saaspricing-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-slashed-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'saasp_pricelist_sale_discount_title_typography_style',
				'selector' => '{{WRAPPER}} .saasp-pricelist-slashed-title',
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_discount_currency_heading_style',
			[
				'label' => esc_html__( 'Discount Currency', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'ssaasp_pricelist_sale_discount_currency_symbol_size',
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
					'size' => 27,
				],
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-slashed-currency' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
	
		$this->add_control(
			'saasp_pricelist_sale_discount_currency_symbol_vertical_position',
			[
				'label' => esc_html__( 'Vertical Position', 'saaspricing' ),
				'type' =>  Controls_Manager::CHOOSE,
				'options' => [
					'super' => [
						'title' => esc_html__( 'Top', 'saaspricing' ),
						'icon' => 'eicon-v-align-top',
					],
					'' => [
						'title' => esc_html__( 'Middle', 'saaspricing' ),
						'icon' => 'eicon-v-align-middle',
					],
					'sub' => [
						'title' => esc_html__( 'Bottom', 'saaspricing' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => '',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-slashed-currency' => 'vertical-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_discount_price_heading_style',
			[
				'label' => esc_html__( 'Discount Price', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_discount_price_color_style',
			[
				'label' => esc_html__( 'Color', 'saaspricing-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-slashed-currency' => 'color: {{VALUE}}',
					'{{WRAPPER}} .saasp-pricelist-slashed-num' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'saasp_pricelist_sale_discount_price_typography_style',
				'selector' => '{{WRAPPER}} .saasp-pricelist-slashed-num',
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_discount_period_heading_style',
			[
				'label' => esc_html__( 'Discount Period', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_discount_period_color_style',
			[
				'label' => esc_html__( 'Color', 'saaspricing-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-slashed-period' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'saasp_pricelist_sale_discount_period_typography_style',
				'selector' => '{{WRAPPER}} .saasp-pricelist-slashed-period',
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_period_vertical_position',
			[
				'label' => esc_html__( 'Vertical Position', 'saaspricing' ),
				'type' =>  Controls_Manager::CHOOSE,
				'options' => [
					'super' => [
						'title' => esc_html__( 'Top', 'saaspricing' ),
						'icon' => 'eicon-v-align-top',
					],
					'' => [
						'title' => esc_html__( 'Middle', 'saaspricing' ),
						'icon' => 'eicon-v-align-middle',
					],
					'sub' => [
						'title' => esc_html__( 'Bottom', 'saaspricing' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => '',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-slashed-period' => 'vertical-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_discount_period_position_style',
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
			'saasp_pricelist_sale_section_style',
			[
				'label' => esc_html__( 'Sale', 'saaspricing-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_sale_heading_style',
			[
				'label' => esc_html__( 'Sale Title', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_sale_title_style',
			[
				'label' => esc_html__( 'Color', 'saaspricing-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-cal-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'saasp_pricelist_sale_sale_title_typography_style',
				'selector' => '{{WRAPPER}} .saasp-pricelist-cal-title',
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_sale_currency_heading_style',
			[
				'label' => esc_html__( 'Sale Currency', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'ssaasp_pricelist_sale_sale_currency_symbol_size',
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
					'size' => 32,
				],
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-total-currency' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
	
		$this->add_control(
			'saasp_pricelist_sale_sale_currency_symbol_vertical_position',
			[
				'label' => esc_html__( 'Vertical Position', 'saaspricing' ),
				'type' =>  Controls_Manager::CHOOSE,
				'options' => [
					'super' => [
						'title' => esc_html__( 'Top', 'saaspricing' ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => esc_html__( 'Middle', 'saaspricing' ),
						'icon' => 'eicon-v-align-middle',
					],
					'sub' => [
						'title' => esc_html__( 'Bottom', 'saaspricing' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'top',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-total-currency' => 'vertical-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_sale_price_heading_style',
			[
				'label' => esc_html__( 'Sale Price', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_sale_price_color_style',
			[
				'label' => esc_html__( 'Color', 'saaspricing-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-total-currency' => 'color: {{VALUE}}',
					'{{WRAPPER}} .saasp-pricelist-total-num' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'saasp_pricelist_sale_sale_price_typography_style',
				'selector' => '{{WRAPPER}} .saasp-pricelist-total-num',
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_sale_period_heading_style',
			[
				'label' => esc_html__( 'Sale Period', 'saaspricing-pro' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_sale_period_color_style',
			[
				'label' => esc_html__( 'Color', 'saaspricing-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-total-period' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'saasp_pricelist_sale_sale_period_typography_style',
				'selector' => '{{WRAPPER}} .saasp-pricelist-total-period',
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_sale_period_vertical_position',
			[
				'label' => esc_html__( 'Vertical Position', 'saaspricing' ),
				'type' =>  Controls_Manager::CHOOSE,
				'options' => [
					'super' => [
						'title' => esc_html__( 'Top', 'saaspricing' ),
						'icon' => 'eicon-v-align-top',
					],
					'' => [
						'title' => esc_html__( 'Middle', 'saaspricing' ),
						'icon' => 'eicon-v-align-middle',
					],
					'sub' => [
						'title' => esc_html__( 'Bottom', 'saaspricing' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => '',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-total-period' => 'vertical-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'saasp_pricelist_sale_sale_period_position_style',
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
			'saasp_pricelist_button_section_style',
			[
				'label' => esc_html__( 'Button', 'saaspricing-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'saasp_pricelist_button_hover_normal_text_color'
		);
	
		$this->start_controls_tab(
			'saasp_pricelist_button_cta_normal_text',
			[
				'label' => esc_html__( 'Normal', 'saaspricing' ),
			]
		);
	
		$this->add_control(
			'saasp_pricelist_button_normal_text_color',
			[
				'label' => esc_html__( 'Color', 'saaspricing' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-cta a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .saasp-pricelist-cta a span svg' => 'fill: {{VALUE}}',
				],
			]
		);
	
		$this->end_controls_tab();
	
		$this->start_controls_tab(
			'saasp_pricelist_button_hover_text',
			[
				'label' => esc_html__( 'Hover', 'saaspricing' ),
			]
		);
	
		$this->add_control(
			'saasp_pricelist_button_hover_text_color',
			[
				'label' => esc_html__( 'Color', 'saaspricing' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-cta a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .saasp-pricelist-cta a:hover span svg' => 'fill: {{VALUE}}',
				],
			]
		);
	
		$this->end_controls_tab();
	
		$this->end_controls_tabs();
	
		$this->add_group_control(
			 Group_Control_Typography::get_type(),
			[
				'name' => 'saasp_pricelist_button_cta_typography',
				'selector' => '{{WRAPPER}} .saasp-pricelist-cta a',
			]
		);
	
		$this->start_controls_tabs(
			'saasp_pricelist_button_hover_normal_background_color'
		);
	
		$this->start_controls_tab(
			'saasp_pricelist_button_normal_background',
			[
				'label' => esc_html__( 'Normal', 'saaspricing' ),
			]
		);
	
		$this->add_control(
			'saasp_pricelist_button_normal_background_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspricing' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-cta a' => 'background-color: {{VALUE}}',
				],
			]
		);
	
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'saasp_pricelist_button_border',
				'selector' => '{{WRAPPER}} .saasp-pricelist-cta a',
			]
		);
	
		$this->end_controls_tab();
	
		$this->start_controls_tab(
			'saasp_pricelist_button_hover_background',
			[
				'label' => esc_html__( 'Hover', 'saaspricing' ),
			]
		);
	
		$this->add_control(
			'saasp_pricelist_button_hover_background_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspricing' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-cta a:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
	
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'saasp_pricelist_button_hover_border',
				'selector' => '{{WRAPPER}} .saasp-pricelist-cta a:hover',
			]
		);
	
		$this->end_controls_tab();
	
		$this->end_controls_tabs();
	
		$this->add_responsive_control(
			'saasp_pricelist_button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'saaspricing' ),
				'type' =>  Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-cta a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	
		$this->add_group_control(
			 Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'saasp_pricelist_button_box_shadow',
				'selector' => '{{WRAPPER}} .saasp-pricelist-cta a',
			]
		);
	
		$this->add_responsive_control(
			'saasp_pricelist_button_cta_padding',
			[
				'label' => esc_html__( 'Padding', 'saaspricing' ),
				'type' =>  Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-cta a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	
		$this->add_responsive_control(
			'saasp_pricelist_button_cta_margin',
			[
				'label' => esc_html__( 'Margin', 'saaspricing' ),
				'type' =>  Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-cta a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	

		$this->end_controls_section();
	}

	protected function saasp_button_size($settings) {
		if('justify' === $settings['saasp_pricelist_button_alignment']) {
			echo esc_attr('w-100 ');
		}        
		if( 'extra-small' === $settings['saasp_pricelist_button_size'] ) {
		echo esc_attr('saaspricing-xsm-btn');
		}elseif( 'small' === $settings['saasp_pricelist_button_size'] ) {
		echo esc_attr('saaspricing-sm-btn');
		}
		elseif( 'medium' === $settings['saasp_pricelist_button_size'] ) {
		echo esc_attr('saaspricing-m-btn');
		}
		elseif( 'large' === $settings['saasp_pricelist_button_size'] ) {
		echo esc_attr('saaspricing-l-btn');
		}
		elseif( 'extra-large' === $settings['saasp_pricelist_button_size'] ) {
		echo esc_attr('saaspricing-xl-btn');
		}
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

	protected function render(){
		$settings = $this->get_settings_for_display();
	?>
		<div class="container saasp-pricelist-main-container">
			<div class="saasp-pricelist-main">
				<!-- Pricelist Repeater Start -->
				<div class="saasp-wraped-lists">
					<?php
					if( '' !== $settings['saasp_pricelist_repeater'] ) {
						foreach($settings['saasp_pricelist_repeater'] as $pricelist) {
					?>
						<div class="row saasp-pricelist-wraper">
							<?php
							if( $pricelist['saasp_pricelist_list_title'] || $pricelist['saasp_pricelist_list_description'] || $pricelist['saasp_pricelist_list_price']) {
							?>
								<div class="col">
									<div class="saasp-pricelist-right d-flex justify-content-between saasp-pricelist-content-alignment">
										<?php
										if( '' !== $pricelist['saasp_pricelist_list_title'] || '' !== $pricelist['saasp_pricelist_list_description'] ) {
										?>
											<div class="saasp-pricelist">
												<h3 class="saasp-pricelist-title">
													<?php echo esc_html($pricelist['saasp_pricelist_list_title']); ?>
												</h3>
												<p class="saasp-pricelist-description">
													<?php echo esc_html( $pricelist['saasp_pricelist_list_description']); ?>
												</p>
											</div>
										<?php
										}
										?>
										<?php
										if( '' !== $pricelist['saasp_pricelist_list_price'] ) {
										?>
											<h3 class="saasp-pricelist-price text-end text-nowrap">
												<span class="saasp-pricelist-currency">
												<?php 
												if( 'custom' !== $settings['saasp_pricelist_currency_symbol'] ){
													echo esc_html($this->get_currency_symbol($settings['saasp_pricelist_currency_symbol']));
												}else{
													echo esc_html($settings['saasp_pricelist_currency_symbol_custom']);
												}
												?></span><span class="saasp-pricelist-list-num"><?php echo esc_html( $pricelist['saasp_pricelist_list_price']); ?></span>
											</h3>
										<?php
										}
										?>
									</div>
								</div>
							<?php
							}
							?>
						</div>
					<?php
						}
					}
					?>
					<!-- Pricelist Repeater End -->
					<?php
					if( 'yes' === $settings['saasp_pricelist_divider_switch']) {
					?>
					<div class="saasp-pricelist-divider-parent">
						<hr class="saasp-list-cal-separator">
					</div>
					<?php
					}
					?>
					<!-- Discount section -->
					<?php
					if( 'yes' === $settings['saasp_pricelist_show_discount'] ) {
					?>
						<div class="row saasp-pricelist-wraper saasp-pricelist-calculation">
							<?php
							if( '' !== $settings['saasp_pricelist_discount_title'] ) {
							?>
							<div class="col">
								<div class="saasp-pricelist-right d-flex justify-content-between saasp-pricelist-content-alignment">
									<div class="saasp-pricelist">
										<h3 class="saasp-pricelist-slashed-title"><?php echo esc_html($settings['saasp_pricelist_discount_title']); ?></h3>
									</div>
									<h3 class="saasp-pricelist-slashed-cal text-end text-nowrap">
										<span class="saasp-pricelist-currency saasp-pricelist-slashed-currency">
										<?php 
										if( 'custom' !== $settings['saasp_pricelist_currency_symbol'] ){
											echo esc_html($this->get_currency_symbol($settings['saasp_pricelist_currency_symbol']));
										}else{
											echo esc_html($settings['saasp_pricelist_currency_symbol_custom']);
										}
										?></span><?php
										if( '' !== $settings['saasp_pricelist_discount_price']) {
										?><span class="saasp-pricelist-slashed-num"><?php echo esc_html($settings['saasp_pricelist_discount_price']); ?></span><?php
										}
										if( '' !== $settings['saasp_pricelist_discount_period']) {
											if( 'below' === $settings['saasp_pricelist_sale_discount_period_position_style'] ){
												echo "</br>";
											}
										?><span class="saasp-pricelist-period saasp-pricelist-slashed-period"><?php echo esc_html($settings['saasp_pricelist_discount_period']); ?></span>
										<?php
										}
										?>
									</h3>
								</div>
							</div>
							<?php
							}
							?>
						</div>
					<?php
					}
					?>
					<!-- Sale section -->
					<div class="row saasp-pricelist-wraper saasp-pricelist-calculation">
						<?php
						if( '' !== $settings['saasp_pricelist_sale_title'] ) {
						?>
						<div class="col">
							<div class="saasp-pricelist-right d-flex justify-content-between saasp-pricelist-content-alignment">
								<div class="saasp-pricelist">
									<h2 class="saasp-pricelist-cal-title"><?php echo esc_html($settings['saasp_pricelist_sale_title']); ?></h2>
								</div>
								<h3 class="saasp-pricelist-cal-main text-end">
								<span class="saasp-pricelist-currency saasp-pricelist-total-currency">
									<?php 
									if( 'custom' !== $settings['saasp_pricelist_currency_symbol'] ){
										echo esc_html($this->get_currency_symbol($settings['saasp_pricelist_currency_symbol']));
									}else{
										echo esc_html($settings['saasp_pricelist_currency_symbol_custom']);
									}
									?></span><span class="saasp-pricelist-total-num"></span><?php
									if( '' !== $settings['saasp_pricelist_sale_period']) {
										if( 'below' === $settings['saasp_pricelist_sale_sale_period_position_style'] ){
											echo "</br>";
										}
									?><span class="saasp-pricelist-period saasp-pricelist-total-period"><?php echo esc_html($settings['saasp_pricelist_sale_period']); ?></span>
									<?php
									}
									?>
								</h3>
							</div>
						</div>
						<?php
						}
						?>
					</div>
				</div>
				<?php
				if( 'yes' === $settings['saasp_pricelist_button_switch']) {
				?>
				<div class="saasp-pricelist-cta <?php
				if('center' === $settings['saasp_pricelist_button_alignment']) {
					echo esc_attr('text-center');
				}elseif('right' === $settings['saasp_pricelist_button_alignment']) {
					echo esc_attr('text-end');
				}
				?>">
					<?php
					if ( ! empty( $settings['saasp_pricelist_button_url']['url'] ) ) {
						$this->add_link_attributes( 'saasp_pricelist_button_url', $settings['saasp_pricelist_button_url'] );
					}
					?>
						<a class="btn <?php $this->saasp_button_size($settings); ?> <?php $this->print_render_attribute_string( 'saasp_pricelist_button_url') ?>" type="submit">
							<?php echo esc_html($settings['saasp_pricelist_button_text']); ?>
							<span class="saaspricing-pricelist-icon-spacing"> 
								<?php Icons_Manager::render_icon( $settings['saasp_pricelist_button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
							</span>
						</a>
				</div>
			<?php
			}
			?>
			</div>
		</div>
	<?php
	}

	public function content_template() {
	?>
		<div class="container saasp-pricelist-main-container">
			<div class="saasp-pricelist-main">
				<div class="saasp-wraped-lists">
					<!-- Pricelist Repeater Start -->
					<#
					let symbols = {
							dollar: '&#36;',
							euro: '&#128;',
							franc: '&#8355;',
							pound: '&#163;',
							ruble: '&#8381;',
							shekel: '&#8362;',
							baht: '&#3647;',
							yen: '&#165;',
							won: '&#8361;',
							guilder: '&fnof;',
							peso: '&#8369;',
							peseta: '&#8359;',
							lira: '&#8356;',
							rupee: '&#8360;',
							indian_rupee: '&#8377;',
							real: 'R$',
							krona: 'kr'
						};
				
						let symbol = '',
							iconsHTML = {};

						if ( settings.saasp_pricelist_currency_symbol ) {
							if ( 'custom' !== settings.saasp_pricelist_currency_symbol ) {
								symbol = symbols[ settings.saasp_pricelist_currency_symbol ] || '';
							} else {
								symbol = settings.saasp_pricelist_currency_symbol_custom;
							}
						}

					if ( settings.saasp_pricelist_repeater ) {
						_.each( settings.saasp_pricelist_repeater, function( pricelist ) {
					#>
						<div class="row saasp-pricelist-wraper">
							<#
    							if ( pricelist.saasp_pricelist_list_title || pricelist.saasp_pricelist_list_description || pricelist.saasp_pricelist_list_price ) {
    						#>
								<div class="col">
									<div class="saasp-pricelist-right d-flex justify-content-between saasp-pricelist-content-alignment">
										<#
										if ( pricelist.saasp_pricelist_list_title || pricelist.saasp_pricelist_list_description ) {
										#>
											<div class="saasp-pricelist">
												<h3 class="saasp-pricelist-title">
													{{{ pricelist.saasp_pricelist_list_title }}}
												</h3>
												<p class="saasp-pricelist-description">
													{{{ pricelist.saasp_pricelist_list_description }}}
												</p>
											</div>
										<#
										}
										#>
										<#
										if ( pricelist.saasp_pricelist_list_price ) {
										#>
											<h3 class="saasp-pricelist-price text-end text-nowrap">
												<span class="saasp-pricelist-currency">{{{symbol}}}</span><span class="saasp-pricelist-list-num">{{{ pricelist.saasp_pricelist_list_price }}}</span>
											</h3>
										<#
										}
										#>
									</div>
								</div>
							<#
							}
							#>
						</div>
					<#
					});
					}
					#>
					<!-- Pricelist Repeater End -->
					<!-- Pricelist Divider Start -->
					<#
    					if ( 'yes' === settings.saasp_pricelist_divider_switch ) {
    				#>
						<div class="saasp-pricelist-divider-parent">
							<hr class="saasp-list-cal-separator">
						</div>
					<#
						}
					#>
					<!-- Pricelist Divider End -->
						<div class="row saasp-pricelist-wraper saasp-pricelist-calculation">
						<#
    						if ( 'yes' === settings.saasp_pricelist_show_discount ) {
    					#>

							<#
							if (settings.saasp_pricelist_discount_title ) {
							#>
								<div class="col">
									<div class="saasp-pricelist-right d-flex justify-content-between saasp-pricelist-content-alignment">
										<div class="saasp-pricelist">
											<h3 class="saasp-pricelist-slashed-title">{{{ settings.saasp_pricelist_discount_title }}}</h3>
										</div>
										<h3 class="saasp-pricelist-slashed-cal text-end text-nowrap">
											<span class="saasp-pricelist-currency saasp-pricelist-slashed-currency">{{{symbol}}}</span><# if (settings.saasp_pricelist_discount_price ) { #><span class="saasp-pricelist-slashed-num">{{{ settings.saasp_pricelist_discount_price }}}</span><# }if (settings.saasp_pricelist_discount_period ) { if ( 'below' === settings.saasp_pricelist_sale_discount_period_position_style ) { #></br><#}#><span class="saasp-pricelist-period saasp-pricelist-slashed-period">{{{ settings.saasp_pricelist_discount_period }}}</span>
											<#
											}
											#>
										</h3>
									</div>
								</div>
							<#
							}
							#>
							<#
							}
							#>
							<div class="row saasp-pricelist-wraper saasp-pricelist-calculation">
								<#
								if ( '' !== settings.saasp_pricelist_sale_title ) {
								#>
									<div class="col">
										<div class="saasp-pricelist-right d-flex justify-content-between saasp-pricelist-content-alignment">
											<div class="saasp-pricelist">
												<h2 class="saasp-pricelist-cal-title">{{{ settings.saasp_pricelist_sale_title }}}</h2>
											</div>
											<h3 class="saasp-pricelist-cal-main text-end">
												<span class="saasp-pricelist-currency saasp-pricelist-total-currency">{{{symbol}}}</span><span class="saasp-pricelist-total-num"></span><#if ( '' !== settings.saasp_pricelist_sale_period ) { if ( 'below' === settings.saasp_pricelist_sale_sale_period_position_style ) { #> </br> <# }#><span class="saasp-pricelist-period saasp-pricelist-total-period">{{{ settings.saasp_pricelist_sale_period }}}</span>
												<#
												}
												#>
											</h3>
										</div>
									</div>
								<#
								}
								#>
    						</div>
						</div>
				</div>
				<#
				if( 'yes' === settings.saasp_pricelist_button_switch ){
					let buttonAlignment = 'text';
					if ( 'center' === settings.saasp_pricelist_button_alignment ) {
						buttonAlignment = 'text-center';
					} else if ( 'right' === settings.saasp_pricelist_button_alignment ) {
						buttonAlignment = 'text-end';
					}

					let textJustify = '';
					if ( 'justify' === settings.saasp_pricelist_button_alignment ) {
						textJustify = 'w-100';
					}

					let ButtonSize = 'saaspricing-m-btn'
                    if('extra-small' === settings.saasp_pricelist_button_size) {
                        ButtonSize = 'saaspricing-xsm-btn'
                    } else if ( 'small' === settings.saasp_pricelist_button_size ) {
                        ButtonSize = 'saaspricing-sm-btn'
                    } else if ( 'medium' === settings.saasp_pricelist_button_size ) {
                        ButtonSize = 'saaspricing-m-btn'
                    } else if ( 'large' === settings.saasp_pricelist_button_size ) {
                        ButtonSize = 'saaspricing-l-btn'
                    } else if ( 'extra-large' === settings.saasp_pricelist_button_size ) {
                        ButtonSize = 'saaspricing-xl-btn'
                    }
				#>
					<div class="saasp-pricelist-cta {{ buttonAlignment }}">
						<a class="btn {{ ButtonSize }} {{ textJustify }}" href="{{ settings.saasp_pricelist_button_url.url }}" type="submit">
							{{{ settings.saasp_pricelist_button_text }}}
							<span class="saaspricing-pricelist-icon-spacing">
								<#
                                    let buttonIcon = elementor.helpers.renderIcon( view, settings.saasp_pricelist_button_icon, { 'aria-hidden': true }, 'i' , 'object' );
                                #>
                                {{{ buttonIcon.value }}}
							</span>
						</a>
					</div>
				<#
				}
				#>
			</div>
		</div>
	<?php
	}

}
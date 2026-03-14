<?php

if (! defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Repeater;

trait Saasp_Pricelist_Content_Pricelist_Controls
{
    protected function register_content_pricelist_controls()
    {
		$this->start_controls_section(
			'saasp_pricelist_repeater_content_section',
			[
				'label' => esc_html__( 'Price List', 'saaspricing' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$saasp_priclist_repeater = new Repeater();

		$saasp_priclist_repeater->add_control(
			'saasp_pricelist_list_title',
			[
				'label' => esc_html__( 'List Title', 'saaspricing' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'saaspricing' ),
				'placeholder' => esc_html__( 'Type your title here', 'saaspricing' ),
			]
		);

		$saasp_priclist_repeater->add_control(
			'saasp_pricelist_list_description',
			[
				'label' => esc_html__( 'List Description', 'saaspricing' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'default' => esc_html__( 'Default description', 'saaspricing' ),
				'placeholder' => esc_html__( 'Type your description here', 'saaspricing' ),
			]
		);

		$saasp_priclist_repeater->add_control(
			'saasp_pricelist_list_price',
			[
				'label' => esc_html__( 'List Price', 'saaspricing' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 99999999999999999,
				'step' => 1,
				'default' => 10,
			]
		);

		$this->add_control(
			'saasp_pricelist_repeater',
			[
				'label' => esc_html__( 'Pricelist Items', 'saaspricing' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $saasp_priclist_repeater->get_controls(),
				'default' => [
					[
						'saasp_pricelist_list_title' => esc_html__( 'Mobile Optimized "Link-In-Bio" Store A place', 'saaspricing' ),
						'saasp_pricelist_list_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'saaspricing' ),
					],
					[
						'saasp_pricelist_list_title' => esc_html__( 'Calender Invites & Bookings', 'saaspricing' ),
						'saasp_pricelist_list_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'saaspricing' ),
					],
					[
						'saasp_pricelist_list_title' => esc_html__( 'Course Builder', 'saaspricing' ),
						'saasp_pricelist_list_description' => '',
					],
					[
						'saasp_pricelist_list_title' => esc_html__( 'Audience Analytics', 'saaspricing' ),
						'saasp_pricelist_list_description' => '',
					],
				],
				'title_field' => '{{{ saasp_pricelist_list_title }}}',
			]
		);

		$this->add_control(
			'saasp_pricelist_symbol_heading',
			[
				'label' => esc_html__( 'Pricing', 'saaspricing' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);
		
		$this->add_control(
			'saasp_pricelist_currency_symbol',
			[
				'label' => esc_html__( 'Currency Symbol', 'saaspricing' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'None', 'saaspricing' ),
					'dollar' => '&#36; ' . esc_html__( 'Dollar', 'saaspricing' ),
					'euro' => '&#128; ' . esc_html__( 'Euro', 'saaspricing' ),
					'baht' => '&#3647; ' . esc_html__( 'Baht', 'saaspricing' ),
					'franc' => '&#8355; ' . esc_html__( 'Franc', 'saaspricing' ),
					'guilder' => '&fnof; ' . esc_html__( 'Guilder', 'saaspricing' ),
					'krona' => 'kr ' . esc_html__( 'Krona', 'saaspricing' ),
					'lira' => '&#8356; ' . esc_html__( 'Lira', 'saaspricing' ),
					'peseta' => '&#8359;' . esc_html__( 'Peseta', 'saaspricing' ),
					'peso' => '&#8369; ' . esc_html__( 'Peso', 'saaspricing' ),
					'pound' => '&#163; ' . esc_html__( 'Pound Sterling', 'saaspricing' ),
					'real' => 'R$ ' . esc_html__( 'Real', 'saaspricing' ),
					'ruble' => '&#8381; ' . esc_html__( 'Ruble', 'saaspricing' ),
					'rupee' => '&#8360; ' . esc_html__( 'Rupee', 'saaspricing' ),
					'indian_rupee' => '&#8377; ' . esc_html__( 'Rupee (Indian)', 'saaspricing' ),
					'shekel' => '&#8362; ' . esc_html__( 'Shekel', 'saaspricing' ),
					'yen' => '&#165; ' . esc_html__( 'Yen/Yuan', 'saaspricing' ),
					'won' => '&#8361; ' . esc_html__( 'Won', 'saaspricing' ),
					'custom' => esc_html__( 'Custom', 'saaspricing' ),
				],
				'default' => 'dollar',
			]
		);
		
		$this->add_control(
			'saasp_pricelist_currency_symbol_custom',
			[
				'label' => esc_html__( 'Custom Symbol', 'saaspricing' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'saasp_pricelist_currency_symbol' => 'custom',
				],
			]
		);

		$this->end_controls_section();
    }
}

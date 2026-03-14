<?php

if (! defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;

trait Saasp_Pricelist_Style_Pricelist_Controls
{
    protected function register_style_pricelist_controls()
    {
		$this->start_controls_section(
			'saasp_pricelist_section_style',
			[
				'label' => esc_html__( 'Price List', 'saaspricing' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'saasp_pricelist_background_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspricing' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-main-container' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'saasp_pricelist_list_spacing_style',
			[
				'label' => esc_html__( 'Pricelist Gap Between', 'saaspricing' ),
				'type' => Controls_Manager::SLIDER,
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
				'type' => Controls_Manager::DIMENSIONS,
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
				'type' => Controls_Manager::DIMENSIONS,
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
				'label' => esc_html__( 'Title', 'saaspricing' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'saasp_pricelist_title_typography',
				'selector' => '{{WRAPPER}} .saasp-pricelist-title',
			]
		);

		$this->add_control(
			'saasp_pricelist_title_color_style',
			[
				'label' => esc_html__( 'Color', 'saaspricing' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'saasp_pricelist_title_spacing_style',
			[
				'label' => esc_html__( 'Spacing', 'saaspricing' ),
				'type' => Controls_Manager::SLIDER,
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
				'label' => esc_html__( 'Description', 'saaspricing' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
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
			'saasp_pricelist_description_color_style',
			[
				'label' => esc_html__( 'Color', 'saaspricing' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'saasp_pricelist_price_style_heading',
			[
				'label' => esc_html__( 'Price', 'saaspricing' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'saasp_pricelist_price_typography',
				'selector' => '{{WRAPPER}} .saasp-pricelist-price',
			]
		);

		$this->add_control(
			'saasp_pricelist_price_color_style',
			[
				'label' => esc_html__( 'Color', 'saaspricing' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasp-pricelist-price' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
    }
}

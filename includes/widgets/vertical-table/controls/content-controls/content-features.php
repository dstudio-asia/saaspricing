<?php

if (! defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Repeater;

trait Saasp_Vertical_Content_Features_Controls
{
    protected function register_content_features_controls()
    {
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
                    '{{WRAPPER}} {{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} {{CURRENT_ITEM}} svg' => 'fill: {{VALUE}}',
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
    }
}
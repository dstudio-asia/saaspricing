<?php

if (! defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Repeater;

trait Saasp_Horizontal_Content_Features_Controls
{
    protected function register_content_features_controls()
    {
    $this->start_controls_section(
        'saasp_horizontal_features_tab',
        [
            'label' => esc_html__( 'Features', 'saaspricing' ),
            'tab' =>  Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'saasp_horizontal_features_title',
        [
            'label' => esc_html__( 'Feature Title', 'saaspricing' ),
            'type' =>  Controls_Manager::TEXT,
            'default' => esc_html__( 'Enter Feature Title', 'saaspricing' ),
        ]
    );

    $saasp_horizontal_features = new Repeater();

        $saasp_horizontal_features->add_control(
            'saasp_horizontal_features_icon',
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

		$saasp_horizontal_features->add_control(
			'saasp_horizontal_features_text',
			[
				'label' => esc_html__( 'Text', 'saaspricing' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'Feature Text' , 'saaspricing' ),
				'label_block' => true,
			]
        );

        $saasp_horizontal_features->add_control(
            'saasp_horizontal_features_icon_color',
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
			'saasp_horizontal_features',
			[
				'label' => esc_html__( 'Features', 'saaspricing' ),
				'type' =>  Controls_Manager::REPEATER,
				'fields' => $saasp_horizontal_features->get_controls(),
				'default' => [
					[
						'saasp_horizontal_features_text' => esc_html__( 'Feature 1', 'saaspricing' ),
					],
					[
						'saasp_horizontal_features_text' => esc_html__( 'Feature 2', 'saaspricing' ),
					],
					[
						'saasp_horizontal_features_text' => esc_html__( 'Feature 3', 'saaspricing' ),
					],
					[
						'saasp_horizontal_features_text' => esc_html__( 'Feature 4', 'saaspricing' ),
					],
					[
						'saasp_horizontal_features_text' => esc_html__( 'Feature 5', 'saaspricing' ),
					],
					[
						'saasp_horizontal_features_text' => esc_html__( 'Feature 6', 'saaspricing' ),
					],
					[
						'saasp_horizontal_features_text' => esc_html__( 'Feature 7', 'saaspricing' ),
					],
					[
						'saasp_horizontal_features_text' => esc_html__( 'Feature 8', 'saaspricing' ),
					]
				],
				'title_field' => '{{{ saasp_horizontal_features_text }}}',
			]
		);

        $this->add_responsive_control(
			'saasp_horizontal_features_column',
			[
				'label' => esc_html__( 'Column', 'saaspricing' ),
				'type' =>  Controls_Manager::SELECT,
				'options' => [
					'100%' => esc_html__( '1', 'saaspricing' ),
					'50%'  => esc_html__( '2', 'saaspricing' ),
					'33.3%' => esc_html__( '3', 'saaspricing' ),
					'25%' => esc_html__( '4', 'saaspricing' ),
                ],
                'default' => '25%',
                'selectors' => [
					'{{WRAPPER}} .saasp-columns' => 'width: {{VALUE}};',
				],
			]
		);

        $this->add_control(
            'sassp_horizontal_features_alignment',
            [
                'label' => esc_html__( 'Alignment', 'saaspricing' ),
                'type' =>  Controls_Manager::CHOOSE,
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
                'default' => 'left', 
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .saaspricing-horizontal-feature-list' => 'text-align: {{VALUE}};',
                ],
            ]
        );

    $this->end_controls_section();
    }
}
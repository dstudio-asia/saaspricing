<?php

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait Saasp_Comparison_Content_Table_Controls {

    protected function register_content_table_controls() {

            $this->start_controls_section(
                'saasp_comparison_content_section',
                [
                    'label' => esc_html__( 'Table', 'saaspricing' ),
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
                    'default' => 'h3',
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
                'sassp_comparison_table_alignment',
                [
                    'label' => esc_html__('Alignment', 'saaspricing'),
                    'type' =>  Controls_Manager::CHOOSE,
                    'options' => [
                        'start' => [
                            'title' => esc_html__('Left', 'saaspricing'),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__('Center', 'saaspricing'),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'end' => [
                            'title' => esc_html__('Right', 'saaspricing'),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'default' => 'left',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .saaspricing-table-title-description' => 'text-align: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();
    }
}

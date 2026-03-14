<?php

use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait Saasp_Comparison_Content_Features_Controls {

    protected function register_content_features_controls() {

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
                    'condition' => [
                        'saasp_comparison_show_features_tooltip'=>'yes',
                    ]
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
                            'saasp_comparison_feature_title' => esc_html__( 'Feature Title 1', 'saaspricing' ),
                            'saasp_comparison_feature_text' => esc_html__( 'Feature 1', 'saaspricing' ),
                        ],
                        [
                            'saasp_comparison_show_features_tooltip' => 'no',
                            'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                            'saasp_comparison_feature_title' => esc_html__( 'Feature Title 2', 'saaspricing' ),
                            'saasp_comparison_feature_text' => esc_html__( 'Feature 2', 'saaspricing' ),
                        ],
                        [
                            'saasp_comparison_show_features_tooltip' => 'no',
                            'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                            'saasp_comparison_feature_title' => esc_html__( 'Feature Title 3', 'saaspricing' ),
                            'saasp_comparison_feature_text' => esc_html__( 'Feature 3', 'saaspricing' ),
                        ],
                        [
                            'saasp_comparison_show_features_tooltip' => 'no',
                            'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                            'saasp_comparison_feature_title' => esc_html__( 'Feature Title 4', 'saaspricing' ),
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
                    'condition' => [
                        'saasp_comparison_show_features_tooltip'=>'yes',
                    ]
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
                            'saasp_comparison_feature_title' => esc_html__( 'Feature Title 1', 'saaspricing' ),
                            'saasp_comparison_feature_text_1' => esc_html__( 'Feature 1', 'saaspricing' ),
                            'saasp_comparison_feature_text_2' => esc_html__( 'Feature 2', 'saaspricing' ),
                        ],
                        [
                            'saasp_comparison_show_features_tooltip' => 'no',
                            'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                            'saasp_comparison_feature_title' => esc_html__( 'Feature Title 2', 'saaspricing' ),
                            'saasp_comparison_feature_text_1' => esc_html__( 'Feature 1', 'saaspricing' ),
                            'saasp_comparison_feature_text_2' => esc_html__( 'Feature 2', 'saaspricing' ),
                        ],
                        [
                            'saasp_comparison_show_features_tooltip' => 'no',
                            'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                            'saasp_comparison_feature_title' => esc_html__( 'Feature Title 3', 'saaspricing' ),
                            'saasp_comparison_feature_text_1' => esc_html__( 'Feature 1', 'saaspricing' ),
                            'saasp_comparison_feature_text_2' => esc_html__( 'Feature 2', 'saaspricing' ),
                        ],
                        [
                            'saasp_comparison_show_features_tooltip' => 'no',
                            'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                            'saasp_comparison_feature_title' => esc_html__( 'Feature Title 4', 'saaspricing' ),
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
                    'condition' => [
                        'saasp_comparison_show_features_tooltip'=>'yes',
                    ]
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
                            'saasp_comparison_feature_title' => esc_html__( 'Feature Title 1', 'saaspricing' ),
                            'saasp_comparison_feature_text_1' => esc_html__( 'Feature 1', 'saaspricing' ),
                            'saasp_comparison_feature_text_2' => esc_html__( 'Feature 2', 'saaspricing' ),
                            'saasp_comparison_feature_text_3' => esc_html__( 'Feature 3', 'saaspricing' ),
                        ],
                        [
                            'saasp_comparison_show_features_tooltip' => 'no',
                            'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                            'saasp_comparison_feature_title' => esc_html__( 'Feature Title 2', 'saaspricing' ),
                            'saasp_comparison_feature_text_1' => esc_html__( 'Feature 1', 'saaspricing' ),
                            'saasp_comparison_feature_text_2' => esc_html__( 'Feature 2', 'saaspricing' ),
                            'saasp_comparison_feature_text_3' => esc_html__( 'Feature 3', 'saaspricing' ),
                        ],
                        [
                            'saasp_comparison_show_features_tooltip' => 'no',
                            'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                            'saasp_comparison_feature_title' => esc_html__( 'Feature Title 3', 'saaspricing' ),
                            'saasp_comparison_feature_text_1' => esc_html__( 'Feature 1', 'saaspricing' ),
                            'saasp_comparison_feature_text_2' => esc_html__( 'Feature 2', 'saaspricing' ),
                            'saasp_comparison_feature_text_3' => esc_html__( 'Feature 3', 'saaspricing' ),
                        ],
                        [
                            'saasp_comparison_show_features_tooltip' => 'no',
                            'saasp_comparison_features_tooltip_description' => esc_html__( 'Enter your tooltip description', 'saaspricing' ),
                            'saasp_comparison_feature_title' => esc_html__( 'Feature Title 4', 'saaspricing' ),
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
                'saasp_comparison_features_title_alignment',
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
                'saasp_comparison_features_cell_alignment',
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
    }
}

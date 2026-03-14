<?php

namespace Saas_Pricing_Table;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Widgets_Manager {

	private static $instance = null;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {}

	public function register_widgets( $widgets_manager ) {
		foreach ( $this->get_widgets_config() as $config ) {
			$this->register_single_widget( $config, $widgets_manager );
		}
	}

	private function get_widgets_config() {
		return [
			[
				'class'        => '\Saaspricing_Pricelist',
				'widget_file'  => '/includes/widgets/saaspricing-pricelist.php',
				'control_dirs' => [
					'/includes/widgets/traits/pricelist/',
				],
			],
			[
				'class'        => '\Saasp_Horizontal',
				'widget_file'  => '/includes/widgets/horizontal-table/saaspricing-horizontal-table.php',
				'control_dirs' => [
					'/includes/widgets/horizontal-table/controls/content-controls/',
					'/includes/widgets/horizontal-table/controls/style-controls/',
					'/includes/widgets/horizontal-table/controls/',
				],
			],
			[
				'class'        => '\Saasp_Vertical',
				'widget_file'  => '/includes/widgets/saaspricing-vertical-table.php',
				'control_dirs' => [
					'/includes/widgets/traits/vertical/',
				],
			],
			[
				'class'        => '\Saasp_Comparison',
				'widget_file'  => '/includes/widgets/comparison-table/saaspricing-comparison-table.php',
				'control_dirs' => [
					'/includes/widgets/comparison-table/controls/content-controls/',
					'/includes/widgets/comparison-table/controls/style-controls/',
					'/includes/widgets/comparison-table/controls/',
				],
			],
		];
	}

	private function register_single_widget( $config, $widgets_manager ) {
		if ( empty( $config['class'] ) || empty( $config['widget_file'] ) ) {
			return;
		}

		$this->load_control_directories( $config['control_dirs'] ?? [] );

		$widget_path = SAASP_PRICING__DIR__ . $config['widget_file'];

		if ( ! file_exists( $widget_path ) ) {
			return;
		}

		require_once $widget_path;

		if ( class_exists( $config['class'] ) ) {
			$widgets_manager->register( new $config['class']() );
		}
	}

	private function load_control_directories( $directories ) {
		foreach ( $directories as $directory ) {
			$full_dir_path = SAASP_PRICING__DIR__ . $directory;

			if ( ! is_dir( $full_dir_path ) ) {
				continue;
			}

			$trait_files = glob( $full_dir_path . '*.php' );

			if ( false === $trait_files || empty( $trait_files ) ) {
				continue;
			}

			usort(
				$trait_files,
				static function( $left, $right ) {
					$left_is_aggregator  = preg_match( '/(?:content|style)-controls(?:-manager)?\.php$/', str_replace( '\\', '/', $left ) );
					$right_is_aggregator = preg_match( '/(?:content|style)-controls(?:-manager)?\.php$/', str_replace( '\\', '/', $right ) );

					if ( $left_is_aggregator !== $right_is_aggregator ) {
						return $left_is_aggregator ? 1 : -1;
					}

					return strcmp( $left, $right );
				}
			);

			foreach ( $trait_files as $trait_file ) {
				require_once $trait_file;
			}
		}
	}
}

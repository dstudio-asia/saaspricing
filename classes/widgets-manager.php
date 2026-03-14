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
				'class'      => '\Saaspricing_Pricelist',
				'file'       => 'saaspricing-pricelist.php',
				'trait_dirs' => [
					'/includes/widgets/traits/pricelist/',
				],
			],
			[
				'class'      => '\Saasp_Horizontal',
				'file'       => 'saaspricing-horizontal-table.php',
				'trait_dirs' => [
					'/includes/widgets/traits/horizontal/',
				],
			],
			[
				'class'      => '\Saasp_Vertical',
				'file'       => 'saaspricing-vertical-table.php',
				'trait_dirs' => [
					'/includes/widgets/traits/vertical/',
				],
			],
			[
				'class'      => '\Saasp_Comparison',
				'file'       => 'saaspricing-comparison-table.php',
				'trait_dirs' => [
					'/includes/widgets/traits/comparison-table/',
				],
			],
		];
	}

	private function register_single_widget( $config, $widgets_manager ) {
		if ( empty( $config['class'] ) || empty( $config['file'] ) ) {
			return;
		}

		$this->load_trait_directories( $config['trait_dirs'] ?? [] );

		$widget_path = SAASP_PRICING__DIR__ . '/includes/widgets/' . $config['file'];

		if ( ! file_exists( $widget_path ) ) {
			return;
		}

		require_once $widget_path;

		if ( class_exists( $config['class'] ) ) {
			$widgets_manager->register( new $config['class']() );
		}
	}

	private function load_trait_directories( $directories ) {
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
					$left_is_aggregator  = preg_match( '/(?:content|style)-controls\.php$/', str_replace( '\\', '/', $left ) );
					$right_is_aggregator = preg_match( '/(?:content|style)-controls\.php$/', str_replace( '\\', '/', $right ) );

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

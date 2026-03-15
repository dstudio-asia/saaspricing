<?php

namespace Saas_Pricing_Table;

if (! defined('ABSPATH')) {
	exit;
}

class Widgets_Manager
{

	private static $instance = null;

	private const WIDGET_DEFINITIONS = [
		[
			'key'       => 'saaspricing-pricelist',
			'directory' => 'pricelist',
			'file'      => 'saaspricing-pricelist.php',
			'class'     => '\Saaspricing_Pricelist',
		],
		[
			'key'       => 'saasp-horizontal',
			'directory' => 'horizontal-table',
			'file'      => 'saaspricing-horizontal-table.php',
			'class'     => '\Saasp_Horizontal',
		],
		[
			'key'       => 'saasp-vertical',
			'directory' => 'vertical-table',
			'file'      => 'saaspricing-vertical-table.php',
			'class'     => '\Saasp_Vertical',
		],
		[
			'key'       => 'saasp-comparison',
			'directory' => 'comparison-table',
			'file'      => 'saaspricing-comparison-table.php',
			'class'     => '\Saasp_Comparison',
		],
	];

	public static function instance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {}

	public function register_widgets($widgets_manager)
	{
		$this->load_all_traits_and_files();

		foreach ($this->get_widgets_config() as $config) {
			$this->register_single_widget($config, $widgets_manager);
		}
	}

	private function load_all_traits_and_files()
	{
		foreach ($this->get_all_control_directories() as $directory) {
			$this->load_control_directory($directory);
		}

		foreach ($this->get_widget_files() as $widget_file) {
			if (file_exists($widget_file)) {
				require_once $widget_file;
			}
		}
	}

	private function get_widgets_config()
	{
		$widgets_config = [];

		foreach (self::WIDGET_DEFINITIONS as $definition) {
			$widgets_config[ $definition['key'] ] = [
				'class' => $definition['class'],
			];
		}

		return $widgets_config;
	}

	private function get_all_control_directories()
	{
		$directories = [];

		foreach (self::WIDGET_DEFINITIONS as $definition) {
			$widget_root = SAASP_PRICING__DIR__ . '/includes/widgets/' . $definition['directory'] . '/controls/';
			$directories[] = $widget_root . 'content-controls/';
			$directories[] = $widget_root . 'style-controls/';
			$directories[] = $widget_root;
		}

		return $directories;
	}

	private function get_widget_files()
	{
		$files = [];

		foreach (self::WIDGET_DEFINITIONS as $definition) {
			$files[] = SAASP_PRICING__DIR__ . '/includes/widgets/' . $definition['directory'] . '/' . $definition['file'];
		}

		return $files;
	}

	private function register_single_widget($config, $widgets_manager)
	{
		if (empty($config['class'])) {
			return;
		}

		if (class_exists($config['class'])) {
			$widgets_manager->register(new $config['class']());
		}
	}

	private function load_control_directory($directory)
	{
		if (! is_dir($directory)) {
			return;
		}

		$trait_files = glob($directory . '*.php');

		if (false === $trait_files || empty($trait_files)) {
			return;
		}

		usort(
			$trait_files,
			static function ($left, $right) {
				$left_is_aggregator  = preg_match('/(?:content|style)-controls(?:-manager)?\.php$/', str_replace('\\', '/', $left));
				$right_is_aggregator = preg_match('/(?:content|style)-controls(?:-manager)?\.php$/', str_replace('\\', '/', $right));

				if ($left_is_aggregator !== $right_is_aggregator) {
					return $left_is_aggregator ? 1 : -1;
				}

				return strcmp($left, $right);
			}
		);

		foreach ($trait_files as $trait_file) {
			require_once $trait_file;
		}
	}
}

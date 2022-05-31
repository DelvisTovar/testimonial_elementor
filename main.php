<?php

namespace DT;

if (!defined('ABSPATH')) exit;
class E_DT
{
	public function __construct()
	{
		// add_action('init', [$this, 'check_for_install']);
		add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
		add_action( 'elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories'] );
	}
	private function include_widgets_files()
	{
		require_once(__DIR__ . '/widgets/widget-testimonial.php');
	}
	public function register_widgets()
	{
		$this->include_widgets_files();
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Testimonial());
	}
	public function check_for_install()
	{
		E_DT::show_redo_warning();
		return;
	}
	private function show_redo_warning()
	{
		if (!defined('ELEMENTOR_VERSION')) {
			$link = "https://pl.wordpress.org/plugins/elementor/";
			$plugin = "Elementor Page Builder";
			?>
			<div class="notice notice-warning is-dismissible">
				<p>Please install <a href="<?php echo $link; ?>"><?php echo $plugin; ?></a> to use REDO JSComposer
				Additional.</p>
			</div>
			<?php
		}
	}
	
	public function add_elementor_widget_categories($widgets_manager) {
		\Elementor\Plugin::$instance->elements_manager->add_category(
			'dt-widgets',
			[
				'title' => esc_html__( 'DT Widgets', 'plugin-name' ),
				'icon' => 'fa fa-plug',
			]
		);
	}
	
}
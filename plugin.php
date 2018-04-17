<?php
namespace Thenobility;

use Thenobility\Widgets\Thenobility_Heading;
use Thenobility\Widgets\Thenobility_Various_Causes;
use Thenobility\Widgets\Thenobility_Camps_Done;
use Thenobility\Widgets\Thenobility_History_Section;
use Thenobility\Widgets\Thenobility_Help_Section;
use Thenobility\Widgets\Thenobility_Volunteer_Section;
use Thenobility\Widgets\Thenobility_Donator_Section;
use Thenobility\Widgets\Thenobility_Gallery_Section;
use Thenobility\Widgets\Thenobility_Event_Section;
use Thenobility\Widgets\Thenobility_Testimonial_Section;
use Thenobility\Widgets\Thenobility_Main_slider_Section;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );

		add_action( 'elementor/frontend/after_register_scripts', function() {
			wp_register_script( 'hello-world', plugins_url( '/assets/js/hello-world.js' ), [ 'jquery' ], false, true );
		} );
	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		require __DIR__ . '/widgets/heading.php';
		require __DIR__ . '/widgets/various-causes.php';
		require __DIR__ . '/widgets/camps-done.php';
		require __DIR__ . '/widgets/history-section.php';
		require __DIR__ . '/widgets/help-section.php';
		require __DIR__ . '/widgets/volunteer-section.php';
		require __DIR__ . '/widgets/donators-section.php';
		require __DIR__ . '/widgets/gallery-section.php';
		require __DIR__ . '/widgets/event-section.php';
		require __DIR__ . '/widgets/testimonial-section.php';
		require __DIR__ . '/widgets/main-slider.php';
		
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Thenobility_Heading() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Thenobility_Various_Causes() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Thenobility_Camps_Done() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Thenobility_History_Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Thenobility_Help_Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Thenobility_Volunteer_Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Thenobility_Donator_Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Thenobility_Gallery_Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Thenobility_Event_Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Thenobility_Testimonial_Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Thenobility_Main_slider_Section() );
		
	}
}

new Plugin();

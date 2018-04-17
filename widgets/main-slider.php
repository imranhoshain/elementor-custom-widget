<?php
namespace Thenobility\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Thenobility_Main_slider_Section extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'thenobility-main-slider';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Thenobility Main Slider', 'thenobility-toolkit' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slider-push';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'thenobility' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		// Content Controls
  		$this->start_controls_section(
  			'thenobility_slider',
  			[
  				'label' => esc_html_x( 'Testimonial Section','Admin Panel','thenobility-toolkit' )
  			]
  		); 
 
        $this->add_control(
			'count',
			[
				'label' => esc_html_x("Heading Text", 'Admin Panel','thenobility-toolkit'),
				'type' => Controls_Manager::NUMBER,
				'default' => esc_html_x("2", 'Admin Panel','thenobility-toolkit'),			
			]
		);      
                
      $this->add_control(
			'category',
			[
				'label' => __( 'Select Category', 'elementor' ),
				'type' => Controls_Manager::SELECT,				
				'options' => thenobility_theme_slider_category()
			]
		); 
        
        $this->add_control(
			'loop',
			[
				'label' => __( 'Slider Loop', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'true' => 'Yes',
                    'false' => 'No'
				],
				
			]
		);
        
          $this->add_control(
			'dot',
			[
				'label' => __( 'Slider Dot', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'true' => 'Yes',
                    'false' => 'No'
				],
				
			]
		);
        
          $this->add_control(
			'nav',
			[
				'label' => __( 'Slider Nav', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'true' => 'Yes',
                    'false' => 'No'
				],
				
			]
		);
        
                
         $this->add_control(
			'autoplay',
			[
				'label' => __( 'Slider Autoplay', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'true' => 'Yes',
                    'false' => 'No'
				],
				
			]
		);
        
        
        $this->add_control(
            'autoplayTimeout',
            [
                'label' => esc_html_x("Heading Text", 'Admin Panel','thenobility-toolkit'),
                'type' => Controls_Manager::NUMBER,
                'default' => esc_html_x("5000", 'Admin Panel','thenobility-toolkit'),			
            ]
		);

       
		$this->end_controls_section();

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function render( ) {
        
		$settings = $this->get_settings();             

    echo thenobility_slider_shortcode($settings);            


	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function content_template() {
        
	}
    
}

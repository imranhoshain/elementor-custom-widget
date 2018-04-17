<?php
namespace Thenobility\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Thenobility_Event_Section extends Widget_Base {

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
		return 'thenobility-event';
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
		return __( 'Thenobility Event', 'thenobility-toolkit' );
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
		return 'fa fa-calendar';
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
  			'thenobility_event_section',
  			[
  				'label' => esc_html_x( 'Event Section','Admin Panel','thenobility-toolkit' )
  			]
  		); 
 
        $this->add_control(
			'event_section_title',
			[
				'label' => esc_html_x("Heading Text", 'Admin Panel','thenobility-toolkit'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html_x("Heading Text", 'Admin Panel','thenobility-toolkit'),			
			]
		);      
                
      $this->add_control(
			'event_location_icon',
			[
				'label' => esc_html_x("Your Location Icon", 'Admin Panel','thenobility-toolkit'),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-star',			
			]
                   
		); 
        
        
        $this->add_control(
			'event_section_location_detail',
			[
				'label' => esc_html_x("Location Detail", 'Admin Panel','thenobility-toolkit'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html_x("Savar, BD", 'Admin Panel','thenobility-toolkit'),			
			]
		); 
        
         $this->add_control(
			'event_date_icon',
			[
				'label' => esc_html_x("Select Date Icon", 'Admin Panel','thenobility-toolkit'),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-star',			
			]
                   
		); 
        
        
        $this->add_control(
			'event_date_detail',
			[
				'label' => esc_html_x("Enter Your Date", 'Admin Panel','thenobility-toolkit'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html_x("Feb 02, 2017", 'Admin Panel','thenobility-toolkit'),			
			]
		);
        
        
               
        $this->add_control(
          'event_section_description',
          [
             'label'   => __( 'Description', 'thenobility-toolkit' ),
             'type'    => Controls_Manager::WYSIWYG,
             'default' => __( 'Default description', 'thenobility-toolkit' ),
          ]
        );
        
        
        
        $this->add_control(
          'event_section_link',
          [
             'label' => __( 'Website URL', 'thenobility-toolkit' ),
             'type' => Controls_Manager::URL,
             'default' => [
                'url' => 'http://',
                'is_external' => '',
             ],
             'show_external' => true, // Show the 'open in new tab' button.
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

    echo thenobility_event_section_shortcode($settings);            


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

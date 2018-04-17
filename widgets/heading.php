<?php
namespace Thenobility\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Thenobility_Heading extends Widget_Base {

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
		return 'thenobility-heading';
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
		return __( 'Thenobility Heading', 'thenobility-toolkit' );
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
		return 'eicon-heading';
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
  			'thenobility_heading_content',
  			[
  				'label' => esc_html_x( 'Heading','Admin Panel','thenobility-toolkit' )
  			]
  		); 
 

		$this->add_control(
			'heading_text',
			[
				'label' => esc_html_x("Heading Text", 'Admin Panel','thenobility'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html_x("Heading Text", 'Admin Panel','thenobility'),			
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
        ?>        
        
        <div class='text-center'>
                
            <h2 class="savechild-heading"><?php echo $settings["heading_text"]; ?></h2>
        
        </div>
        
    <?php   

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
        ?>
        <div class="text-center">
            <h2 class="savechild-heading" data-elementor-setting-key="heading_text" data-elementor-inline-editing-toolbar="none">{{{ settings.heading_text }}}</h2>
        </div>
        <?php
	}
}

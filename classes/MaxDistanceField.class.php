<?php

class MaxDistanceField extends MantisFilter {

	/**
	 * Field name, as used in the form element and processing.
	 */
	public $field = "dist";

	/**
	 * Filter title, as displayed to the user.
	 */
	public $title = 'Distance';

	/**
	 * Filter type, as defined in core/constant_inc.php
	 */
	public $type = FILTER_TYPE_INT;

	/**
	 * Default filter value, used for non-list filter types.
	 */
	public $default = 300;

	/**
	 * Form element size, used for non-boolean filter types.
	 */
	public $size = null;

	/**
	 * Number of columns to use in the bug filter.
	 */
	public $colspan = 5;

	public function __construct() {
		$this->title = plugin_lang_get('field_dist_label', 'FilterByCoords');
		$this->default = config_get('plugin_FilterByCoords_max_distance');
	}

	/**
	 * Validate the filter input, returning true if input is
	 * valid, or returning false if invalid.  Invalid inputs will
	 * be replaced with the filter's default value.
	 * @param multi Filter field input
	 * @return boolean Input valid (true) or invalid (false)
	 */
	public function validate($p_filter_input) {
		return true;
	}

	/**
	 * Build the SQL query elements 'join', 'where', and 'params'
	 * as used by core/filter_api.php to create the filter query.
	 * @param multi Filter field input
	 * @return array Keyed-array with query elements; see developer guide
	 */
	function query($p_filter_input) {
		// This filter field does not do anything by itself but is used by the Coordinates field query function
		return array();
	}

	/**
	 * Display the current value of the filter field.
	 * @param multi Filter field input
	 * @return string Current value output
	 */
	function display($p_filter_value) {
		return $p_filter_value;
	}

	/**
	 * For list type filters, define a keyed-array of possible
	 * filter options, not including an 'any' value.
	 * @return array Filter options keyed by value=>display
	 */
	public function options() {
	}
}

<?php

class FilterBySectorsField extends MantisFilter {

	/**
	 * Field name, as used in the form element and processing.
	 */
	public $field = "sect";

	/**
	 * Filter title, as displayed to the user.
	 */
	public $title = 'Sectors';

	/**
	 * Filter type, as defined in core/constant_inc.php
	 */
	public $type = FILTER_TYPE_STRING;

	/**
	 * Default filter value, used for non-list filter types.
	 */
	public $default = null;

	/**
	 * Form element size, used for non-boolean filter types.
	 */
	public $size = null;

	/**
	 * Number of columns to use in the bug filter.
	 */
	public $colspan = 1;

	public function __construct() {
		$this->title = plugin_lang_get('field_sect_label', 'FilterByCoords');
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
		$sect_input_regexp = '([+\\-])([0-9]+)([+\\-])([0-9]+)';
		$sect_bug_regexp = '\\(sec([+\\-])([0-9]+)([+\\-])([0-9]+)\\)';
		preg_match_all("/$sect_input_regexp/", $p_filter_input, $src_matches, PREG_SET_ORDER);
		// No sectors were provided, do not filter
		if (empty($src_matches))
			return;

		$bugs = array();

		// Double escaping required: first for PHP strings, then for SQL strings
		$t_result = db_query_bound("SELECT * FROM " . db_get_table('mantis_bug_text_table') . " WHERE description REGEXP '" . db_prepare_string($sect_bug_regexp) . "'");
		$t_row_count = db_num_rows($t_result);
		for ($i = 0; $i < $t_row_count; ++$i) {
			$t_row = db_fetch_array($t_result);
			preg_match_all("/$sect_bug_regexp/", $t_row['description'], $bug_matches, PREG_SET_ORDER);
			// Check whether one of the requested sectors is mentioned.
			foreach ($bug_matches as $bug_sects) {
				foreach ($src_matches as $src_sects) {
					if (($bug_sects[1] == $src_sects[1]) &&
					    (intval($bug_sects[2]) == intval($src_sects[2])) &&
					    ($bug_sects[3] == $src_sects[3]) &&
					    (intval($bug_sects[4]) == intval($src_sects[4]))) {
						array_push($bugs, $t_row['id']);
						break 2;
					}
				}
			}
		}

		if (empty($bugs)) {
			# No bugs matched, return empty list
			return array('where' => '0');
		}

		$t_bug_table = db_get_table('mantis_bug_table');
		$t_query = array(
			'where' => "$t_bug_table.id IN (" . implode($bugs, ',') . ")",
		);

		return $t_query;
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

<?php
# MantisBT - a php based bugtracking system
# Copyright (C) 2002 - 2011  MantisBT Team - mantisbt-dev@lists.sourceforge.net
# MantisBT is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 2 of the License, or
# (at your option) any later version.
#
# MantisBT is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with MantisBT.  If not, see <http://www.gnu.org/licenses/>.

class FilterByCoordsPlugin extends MantisPlugin  {

	/**
	 *  A method that populates the plugin information and minimum requirements.
	 */
	function register( ) {
		$this->name = plugin_lang_get( 'title' );
		$this->description = plugin_lang_get( 'description' );
		$this->page = 'config';

		$this->version = '1.0.1';
		$this->requires = array(
			'MantisCore' => '1.2.0'
		);

		$this->author = 'Konstantin Vlasov';
		$this->contact = 'support@flint-inc.ru';
		$this->url = 'https://github.com/CaptainFlint/MantisFilterByCoords';
	}

	/**
	 * Default plugin configuration.
	 */
	function config() {
		return array(
			'max_distance' => 300
		);
	}


	function init() {
	}


	function hooks( ) {
		$hooks = array(
			'EVENT_FILTER_FIELDS' => 'filter_by_coords'
		);
		return $hooks;
	}


	function filter_by_coords($p_event) {
		require_once( 'classes/FilterByCoordsField.class.php' );
		require_once( 'classes/MaxDistanceField.class.php' );
		return array(
			'FilterByCoordsField', 'MaxDistanceField'
		);
	}

}

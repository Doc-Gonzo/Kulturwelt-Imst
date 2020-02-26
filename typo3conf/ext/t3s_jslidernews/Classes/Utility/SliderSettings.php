<?php
namespace T3S\T3sJslidernews\Utility;

/***************************************************************
*  Copyright notice
*
*  (c) 2014 Helmut Hackbarth <typo3@t3solution.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Get the settings
 *
 * @package TYPO3
 * @subpackage T3S\T3sjslidernews\
 */
class SliderSettings {

	/**
	 * Get the settings
	 *
   * @param array $settings
	 * @return array $settings
	*/
	public static function getSettings( $settings ) {

		unset($settings['content']);
		unset($settings['page']);
		unset($settings['news']);
		
		$allActions ='jslidernews,nivoslider,flexslider,jssorslider,customslider,textslider';

		foreach ( explode(',',$allActions) as $action ) {	
			if ( $action == $settings['action'] ) {
				$path = '\\T3S\\T3sJslidernews\\Utility\\'.ucfirst($action).'Settings';
				$settings[$action] = $path::getSettings($settings[$action]);
			} else {
				unset($settings[$action]);
			}		
		}
		
		return $settings;

	}

}

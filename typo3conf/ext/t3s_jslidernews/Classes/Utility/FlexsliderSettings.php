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
 * Get the settings for flexslider jquery plugin
 *
 * @package TYPO3
 * @subpackage T3S\T3sjslidernews\
 */
class FlexsliderSettings {

	/**
	 * Get the settings
	 *
   * @param array $settings
	 * @return array $settings
	*/
	public static function getSettings( $settings ) {

		$settings['thumbnumber'] = $settings['thumbnumber'] ? $settings['thumbnumber'] : 4;
		$settings['width'] = $settings['width'] ? $settings['width'] : 900;
		$settings['height'] = $settings['height'] ? $settings['height'] : 400;

		if ( $settings['style'] == 2 ) {
			$settings['thumbWidth'] = intval(round( ($settings['width'] - ( 4
			 * $settings['itemMargin'] - $settings['itemMargin'] )) / 4));
			$settings['thumbHeight'] = intval(round($settings['thumbWidth']
			 / ( $settings['width'] / $settings['height'] )));
		}
		if ( $settings['style'] == 3 || $settings['style'] == 4 ) {
			$settings['thumbWidth'] = intval(round( ($settings['width'] - ( $settings['thumbnumber']
			 * $settings['itemMargin'] - $settings['itemMargin'] )) / $settings['thumbnumber']));
			$settings['thumbHeight'] = intval(round($settings['thumbWidth']
			 / ( $settings['width'] / $settings['height'] )));
		}

		if ( $settings['style'] == 5 ) {
			$settings['thumbWidth'] = intval(round( ($settings['width'] - ( $settings['thumbnumber']
			 * $settings['itemMargin'] - $settings['itemMargin'] )) / $settings['thumbnumber']));
			$settings['thumbHeight'] = intval(round($settings['thumbWidth']
			 / ( $settings['width'] / $settings['height'] )));
		}

		return $settings;

	}

}

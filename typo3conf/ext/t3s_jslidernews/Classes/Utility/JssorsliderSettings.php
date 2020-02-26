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
 * Get the settings for jssorslider jquery plugin
 *
 * @package TYPO3
 * @subpackage T3S\T3sjslidernews\
 */
class JssorsliderSettings {

	/**
	 * Get the settings
	 *
   * @param array $s  settings
	 * @return array $s
	*/
	public static function getSettings( $settings ) {

		$settings['width'] = $settings['width'] ? $settings['width'] : 900;
		$settings['height'] = $settings['height'] ? $settings['height'] : 400;

		$settings['list']['left'] = $settings['width'] - $settings['list']['thumbnavigator']['width'] - 5;
		$settings['list']['thumbnavigator']['number'] = $settings['list']['thumbnavigator']['number'] ? $settings['list']['thumbnavigator']['number'] : 4;
		$settings['list']['thumbnavigator']['itemHeight'] = round(( $settings['height'] - 24 ) / $settings['list']['thumbnavigator']['number']);
		$settings['list']['image']['width'] = $settings['width'] - $settings['list']['thumbnavigator']['width'] - 10;

		$settings['content']['image']['width'] = intval(round($settings['width'] / 2));
		$settings['content']['image']['height'] = intval(round($settings['height'] -100));

		return $settings;
	}

}

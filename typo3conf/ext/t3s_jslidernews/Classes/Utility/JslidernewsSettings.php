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
 * Get the dimensions for jslidernews jquery plugin
 *
 * @package TYPO3
 * @subpackage T3S\T3sjslidernews\
 */
class JslidernewsSettings {

	/**
	 * Get the dims
	 *
   * @param array $settings  settings
	 * @return array $settings
	*/
	public static function getSettings( $settings ) {

      // size of the slider
    $settings['width'] = $settings['width'] ? $settings['width'] : 900;
    $settings['height'] = $settings['height'] ? $settings['height'] : 400;
    // size of the image (you have to modify your css if change this settings)
    $settings['imgWidth'] = $settings['imgWidth'] ? $settings['imgWidth'] : $settings['width'];
    $settings['imgHeight'] = $settings['imgHeight'] ? $settings['imgHeight'] : $settings['height'];
    // maxItemDisplay in the navigator
    $settings['maxItemDisplay'] = $settings['maxItemDisplay'] ? $settings['maxItemDisplay'] : 3;

    switch ($settings['style']) {
      case '1' :
        // size of the thumbnails
        $settings['thumbProportion'] = $settings['thumbProportion'] ? $settings['thumbProportion'] : 10;
        $settings['thumbWidth'] = intval($settings['width'] / $settings['thumbProportion']);
        $settings['thumbHeight'] = intval($settings['height'] / $settings['thumbProportion']);
        // size of the navigator
        $settings['navWidth'] = $settings['verticalNav'] ? $settings['thumbWidth'] + 10 : $settings['thumbWidth'] + 10;
        $settings['navHeight'] = $settings['verticalNav'] ? $settings['thumbHeight'] + 9 : $settings['thumbHeight']  + 6;
        // 0 makes no sense here
        $settings['navThumb'] = 1;
      break;

      case '2' :
      case '3' :
        // ( padding: 2x 15px ) + ( marginTop: 2px ) = 32
        $settings['innerNavSelectorCssFixHeight'] = $settings['innerNavSelectorCssFixHeight'] ? $settings['innerNavSelectorCssFixHeight'] : 32;
        // ( padding: 2x 3px ) + ( border: 2x 1px ) = 8
        $settings['thumbCssFixHeight'] = $settings['thumbCssFixHeight'] ? $settings['thumbCssFixHeight'] : 8;
        $totalCssFixHeight = $settings['innerNavSelectorCssFixHeight'] + $settings['thumbCssFixHeight'];
        // compute navHeight and check height
        $settings['navHeight'] = intval(($settings['height'] / $settings['maxItemDisplay']));
        $settings['height'] = $settings['navHeight'] * $settings['maxItemDisplay'];
        // compute navWidth
        $settings['navWidth'] = $settings['navWidth'] ? $settings['navWidth'] : 300;
        // show thumbnails in navigation
        $settings['navThumb'] = $settings['navThumb'] ? 1 : 0;
        // compute thumbWidth and thumbHeight
        $settings['thumbWidth'] = $settings['thumbWidth'] ? $settings['thumbWidth'] : ($settings['navHeight'] - $totalCssFixHeight);
        $settings['thumbHeight'] = $settings['thumbHeight'] ? $settings['thumbHeight'] : ($settings['navHeight'] - $totalCssFixHeight);
        // compute the innerNavSelectorHeight
        $settings['innerNavSelectorHeight'] = $settings['navHeight'] - $settings['innerNavSelectorCssFixHeight'];
        // compute the alphaHeight - marginTop 2px + 2x 2px border = 6
        $settings['alphaHeight'] = $settings['navHeight'] - 6;
      break;

      case '4' :
        // size of the navigator
        $settings['navWidth'] = $settings['navWidth'] ? $settings['navWidth'] : 25;
        $settings['navHeight'] = $settings['navHeight'] ? $settings['navHeight'] : 15;
        // 1 makes no sense here
        $settings['navThumb'] = 0;
      break;

      case '5' :
        // 1 makes no sense here
        $settings['navThumb'] = 0;
      break;
    }

		return $settings;
	}



}

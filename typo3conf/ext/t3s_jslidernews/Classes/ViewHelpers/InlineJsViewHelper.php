<?php
namespace T3S\T3sJslidernews\ViewHelpers;

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
 * ViewHelper to render inlineJS in <head> section of website
 *
 * @package TYPO3
 * @subpackage T3S\T3sjslidernews\
 */
class InlineJsViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Renders InlineJs
	 *
	 * @param integer $contentObjectUid
	 * @return void
	*/
	public function render( $contentObjectUid ) {

	    $settings = $this->templateVariableContainer->get('settings');

	    $name=' JavaScript for t3sjslidernews CE-'.$contentObjectUid.' ';
	    $queryNoConflict = $settings['jqueryNoConflict'] ? 'jQuery.noConflict()' : 'jQuery';
	    $compress = $settings['compressJS'] ? 'TRUE' : 'FALSE';

	    switch ( $this->controllerContext->getRequest()->getControllerActionName() ) {
	      case 'jslidernews':
	        // script-options
	        $options = 'sliderId:'.$contentObjectUid.',';
	        if ( $settings['jslidernews']['style'] == 1 || $settings['jslidernews']['style'] == 4 ) {
	          $options .= $settings['jslidernews']['verticalNav'] == 0 ? 'navPosition:\'horizontal\',' : '';
	        }
	        $options .= $settings['jslidernews']['direction'] ? 'direction:\'opacity\',' : '';
	        $options .= $settings['jslidernews']['event'] ? 'navigatorEvent:\'mouseover\',' : '';
	        $options .= $settings['jslidernews']['interval'] == 4000 ? '' : 'interval:'.intval($settings['jslidernews']['interval']).',';
	        $options .= $settings['jslidernews']['auto'] ? '' : 'auto:false,';
	        $options .= $settings['jslidernews']['maxItemDisplay'] == 3 ? '' : 'maxItemDisplay:'.intval($settings['jslidernews']['maxItemDisplay']).',';
	        $options .= $settings['jslidernews']['navHeight'] == 100 || $settings['jslidernews']['navHeight'] == 0 ? '' : 'navigatorHeight:'.intval($settings['jslidernews']['navHeight']).',';
	        $options .= $settings['jslidernews']['navWidth'] == 300 || $settings['jslidernews']['navWidth'] == 0 ? '' : 'navigatorWidth:'.intval($settings['jslidernews']['navWidth']).',';
	        $options .= $settings['jslidernews']['duration'] == 600 ? '' : 'duration:'.intval($settings['jslidernews']['duration']).',';
	        $options .= $settings['jslidernews']['easing'] == 'easeInOutQuad' ? '' : 'easing:\''.$settings['jslidernews']['easing'].'\',';
	        $options .= $settings['jslidernews']['pause'] == 1 && $settings['jslidernews']['auto'] ? 'pauseOnMouseOver:true,' : '';
	        $options .= $settings['jslidernews']['pause'] == 2 && $settings['jslidernews']['auto'] ? 'pauseButton:true,' : '';
	        $options .= $settings['jslidernews']['progressbar'] && $settings['jslidernews']['auto'] ? 'progressBar:true,' : '';
	        $options .= 'mainWidth:'.intval($settings['jslidernews']['width']);

	        if ( $settings['jslidernews']['style'] == 1 || $settings['jslidernews']['style'] == 5 ) {
	          $fire = 'var buttons={previous:jQuery(\'#lofslidecontent'.$contentObjectUid.' .lof-previous\'), next:jQuery(\'#lofslidecontent'
	          	.$contentObjectUid.' .lof-next\') }; jQueryobj = jQuery(\'#lofslidecontent'.$contentObjectUid.'\').lofJSidernews( {buttons:buttons,';
	        } else {
	          $fire = 'jQuery(\'#lofslidecontent'.$contentObjectUid.'\').lofJSidernews( {';
	        }
	        $inlineJS = $queryNoConflict.'(function(){'.$fire.$options.'});});';

	      break;

	      case 'flexslider':

	        // script-options
			$settings['flexslider']['thumbnumber'] = $settings['flexslider']['thumbnumber'] ? $settings['flexslider']['thumbnumber'] : 4;
			$carousel = '';

			if ($settings['flexslider']['style'] == 2) {

	        	$options  = 'controlNav:\'thumbnails\',';
			} else {

	        	$options  = $settings['flexslider']['controlNav'] ? '' : 'controlNav:false,';
			}

			if ($settings['flexslider']['style'] == 3) {

				$carousel_options = 'animation:\'slide\',';
				$carousel_options .= 'controlNav:false,';
				$carousel_options .= 'animationLoop:false,';
				$carousel_options .= 'slideshow:false,';
				$carousel_options .= 'itemWidth:'.$settings['flexslider']['thumbWidth'].',';
				$carousel_options .= 'itemMargin:'.$settings['flexslider']['itemMargin'].',';
				$carousel_options .= 'asNavFor:\'#flexslider_'.$contentObjectUid.'\'';
				$carousel = 'jQuery(\'#carousel_'.$contentObjectUid.'\').flexslider({'.$carousel_options.'});';

				$options  = 'controlNav:false,';
	        	$options .= 'slideshow:false,';
				$options .= 'animationLoop:false,';
	        	$options .= 'sync:\'#carousel_'.$contentObjectUid.'\',';
				$options .= $settings['flexslider']['animation'] == 'fade' ? '' : 'animation:\'slide\',';

			} else {

	        	$options .= $settings['flexslider']['slideshow'] ? '' : 'slideshow:false,';

				if ($settings['flexslider']['style'] == 4) {

			        $options .= 'animationLoop:false,';
					$options .= 'animation:\'slide\',';
			        $options .= 'itemWidth:'.$settings['flexslider']['thumbWidth'].',';
			        $options .= 'itemMargin:'.$settings['flexslider']['itemMargin'].',';

				} else {

					if ($settings['flexslider']['style'] == 5) {

						$settings['flexslider']['minItems'] = $settings['flexslider']['minItems'] ? $settings['flexslider']['minItems'] : 2;
						$settings['flexslider']['maxItems'] = $settings['flexslider']['maxItems'] ? $settings['flexslider']['maxItems'] : 4;

				        $options .= 'animationLoop:false,';
				        $options .= 'animation:\'slide\',';
				        $options .= 'itemWidth:'.$settings['flexslider']['thumbWidth'].',';
				        $options .= 'itemMargin:'.$settings['flexslider']['itemMargin'].',';
				        $options .= 'minItems:'.intval($settings['flexslider']['minItems']).',';
				        $options .= 'maxItems:'.intval($settings['flexslider']['maxItems']).',';

					} else {
				        $options .= $settings['flexslider']['animationLoop'] == 'true' ? '' : 'animationLoop:false,';
				        $options .= $settings['flexslider']['animation'] == 'fade' ? '' : 'animation:\'slide\',';

					}
				}
			}

			$options .= $settings['flexslider']['startAt'] == 0 				? '' : 'startAt:'.intval($settings['flexslider']['startAt']).',';
			$options .= $settings['flexslider']['slideshowSpeed'] ? 'slideshowSpeed:'.intval($settings['flexslider']['slideshowSpeed']).',' : '';
			$options .= $settings['flexslider']['animationSpeed'] ? 'animationSpeed:'.intval($settings['flexslider']['animationSpeed']).',' : '';
#			$options .= $settings['flexslider']['pauseOnAction'] == 'true' 		? '' : 'pauseOnAction:false,';
			$options .= $settings['flexslider']['pauseOnHover'] ? 'pauseOnHover:true,' : '';
			$options .= $settings['flexslider']['useCSS'] == 'true' 			? '' : 'useCSS:false,';
			$options .= $settings['flexslider']['touch'] == 'true' 				? '' : 'touch:false,';
			$options .= $settings['flexslider']['easing'] == 'swing' 			? '' : 'easing:\''.$settings['flexslider']['easing'].'\',';
			$options .= $settings['flexslider']['direction'] == 'horizontal'	? '' : 'direction:\'vertical\',';
			$options .= $settings['flexslider']['reverse'] == 'false' 			? '' : 'reverse:true,';
			$options .= $settings['flexslider']['smoothHeight'] == 'false' 		? '' : 'smoothHeight:true,';
			$options .= $settings['flexslider']['initDelay'] == 0 				? '' : 'initDelay:'.intval($settings['flexslider']['initDelay']).',';
			$options .= $settings['flexslider']['randomize'] == 'false' 		? '' : 'randomize:true,';
			$options .= $settings['flexslider']['video'] == 'false' 			? '' : 'video:true,';
			$options .= $settings['flexslider']['prevText'] == 'Previous' 		? '' : 'prevText:\''.$settings['flexslider']['prevText'].'\',';
			$options .= $settings['flexslider']['nextText'] == 'Next' 			? '' : 'nextText:\''.$settings['flexslider']['nextText'].'\',';
			$options .= $settings['flexslider']['keyboard'] == 'true' 			? '' : 'keyboard:false,';
			$options .= $settings['flexslider']['multipleKeyboard'] == 'false' 	? '' : 'multipleKeyboard:true,';
			$options .= $settings['flexslider']['mousewheel'] == 'false' 		? '' : 'mousewheel:true,';
			$options .= $settings['flexslider']['pausePlay'] == 'false' 		? '' : 'pausePlay:true,';
			$options .= $settings['flexslider']['pauseText'] == 'Pause' 		? '' : 'pauseText:\''.$settings['flexslider']['pauseText'].'\',';
			$options .= $settings['flexslider']['playText'] == 'Play' 			? '' : 'playText:\''.$settings['flexslider']['playText'].'\',';
			$options .= $settings['flexslider']['move'] == 0 					? '' : 'move:'.intval($settings['flexslider']['move']).',';
			$options .= $settings['flexslider']['directionNav'] 				? 'directionNav:true' : 'directionNav:false';

			$inlineJS = $queryNoConflict.'(function(){
			jQuery(\'#flexslider_'.$contentObjectUid.'\').flexslider({'.$options.'});
			'.$carousel.'
			});';

		break;

		case 'nivoslider':
			// script-options
			$options = $settings['nivoslider']['controlNav'] ? '' : 'controlNav:false,';
			$options .= $settings['nivoslider']['manualAdvance'] ? '' : 'manualAdvance:true,';
			$options .= $settings['nivoslider']['effect'] == 'random' ? '' : 'effect:\''.$settings['nivoslider']['effect'].'\',';
			$options .= $settings['nivoslider']['slices'] == 15 ? '' : 'slices:'.$settings['nivoslider']['slices'].',';
			$options .= $settings['nivoslider']['boxCols'] == 8 ? '' : 'boxCols:'.$settings['nivoslider']['boxCols'].',';
			$options .= $settings['nivoslider']['boxRows'] == 4 ? '' : 'boxRows:'.$settings['nivoslider']['boxRows'].',';
			$options .= $settings['nivoslider']['animSpeed'] == 500 ? '' : 'animSpeed:'.$settings['nivoslider']['animSpeed'].',';
			$options .= $settings['nivoslider']['pauseTime'] == 3000 ? '' : 'pauseTime:'.$settings['nivoslider']['pauseTime'].',';
			$options .= $settings['nivoslider']['startSlide'] == 0 ? '' : 'startSlide:'.$settings['nivoslider']['startSlide'].',';
			$options .= $settings['nivoslider']['pauseOnHover'] == 'true' ? '' : 'pauseOnHover:false,';
			$options .= $settings['nivoslider']['randomStart'] == 'false' ? '' : 'randomStart:true,';
			$options .= $settings['nivoslider']['prevText'] == 'Prev' ? '' : 'prevText:\''.$settings['nivoslider']['prevText'].'\',';
			$options .= $settings['nivoslider']['nextText'] == 'Next' ? '' : 'nextText:\''.$settings['nivoslider']['nextText'].'\',';
			$options .= $settings['nivoslider']['directionNav'] ? 'directionNav:true' : 'directionNav:false';

			$inlineJS =  $queryNoConflict.'(window).load(function(){
			jQuery(\'#slider-'.$contentObjectUid.'\').nivoSlider({'.$options.'});
			});';

		break;

		case 'jssorslider':

			$autoPlay = $settings['jssorslider']['autoPlay'] ? 1 : 0;
			$autoPlayInterval = $settings['jssorslider']['autoPlayInterval'] ? $settings['jssorslider']['autoPlayInterval'] : 4000;
			$pauseOnHover = $settings['jssorslider']['pauseOnHover'] ? 12 : 0;
			$slideDuration = $settings['jssorslider']['slideDuration'] ? $settings['jssorslider']['slideDuration'] : 500;
			$loop = $settings['jssorslider']['loop'] ? 1 : 2;



			if ( $settings['jssorslider']['style'] == 1 ) {

				$slideshowTransitions = '[
	                //Rotate Overlap
	                { $Duration: 1200, $Zoom: 11, $Rotate: -1, $Easing: { $Zoom: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Round: { $Rotate: 0.5 }, $Brother: { $Duration: 1200, $Zoom: 1, $Rotate: 1, $Easing: $JssorEasing$.$EaseSwing, $Opacity: 2, $Round: { $Rotate: 0.5 }, $Shift: 90 } },
	                //Switch
	                { $Duration: 1400, x: 0.25, $Zoom: 1.5, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Zoom: $JssorEasing$.$EaseInSine }, $Opacity: 2, $ZIndex: -10, $Brother: { $Duration: 1400, x: -0.25, $Zoom: 1.5, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Zoom: $JssorEasing$.$EaseInSine }, $Opacity: 2, $ZIndex: -10 } },
	                //Rotate Relay
	                { $Duration: 1200, $Zoom: 11, $Rotate: 1, $Easing: { $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Round: { $Rotate: 1 }, $ZIndex: -10, $Brother: { $Duration: 1200, $Zoom: 11, $Rotate: -1, $Easing: { $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Round: { $Rotate: 1 }, $ZIndex: -10, $Shift: 600 } },
	                //Doors
	                { $Duration: 1500, x: 0.5, $Cols: 2, $ChessMode: { $Column: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2, $Brother: { $Duration: 1500, $Opacity: 2 } },
	                //Rotate in+ out-
	                { $Duration: 1500, x: -0.3, y: 0.5, $Zoom: 1, $Rotate: 0.1, $During: { $Left: [0.6, 0.4], $Top: [0.6, 0.4], $Rotate: [0.6, 0.4], $Zoom: [0.6, 0.4] }, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Top: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Brother: { $Duration: 1000, $Zoom: 11, $Rotate: -0.5, $Easing: { $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Shift: 200 } },
	                //Fly Twins
	                { $Duration: 1500, x: 0.3, $During: { $Left: [0.6, 0.4] }, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true, $Brother: { $Duration: 1000, x: -0.3, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 } },
	                //Rotate in- out+
	                { $Duration: 1500, $Zoom: 11, $Rotate: 0.5, $During: { $Left: [0.4, 0.6], $Top: [0.4, 0.6], $Rotate: [0.4, 0.6], $Zoom: [0.4, 0.6] }, $Easing: { $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Brother: { $Duration: 1000, $Zoom: 1, $Rotate: -0.5, $Easing: { $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Shift: 200 } },
	                //Rotate Axis up overlap
	                { $Duration: 1200, x: 0.25, y: 0.5, $Rotate: -0.1, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Top: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Brother: { $Duration: 1200, x: -0.1, y: -0.7, $Rotate: 0.1, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Top: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2 } },
	                //Chess Replace TB
	                { $Duration: 1600, x: 1, $Rows: 2, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Brother: { $Duration: 1600, x: -1, $Rows: 2, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 } },
	                //Chess Replace LR
	                { $Duration: 1600, y: -1, $Cols: 2, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Brother: { $Duration: 1600, y: 1, $Cols: 2, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 } },
	                //Shift TB
	                { $Duration: 1200, y: 1, $Easing: { $Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Brother: { $Duration: 1200, y: -1, $Easing: { $Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 } },
	                //Shift LR
	                { $Duration: 1200, x: 1, $Easing: { $Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Brother: { $Duration: 1200, x: -1, $Easing: { $Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 } },
	                //Return TB
	                { $Duration: 1200, y: -1, $Easing: { $Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $ZIndex: -10, $Brother: { $Duration: 1200, y: -1, $Easing: { $Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $ZIndex: -10, $Shift: -100 } },
	                //Return LR
	                { $Duration: 1200, x: 1, $Delay: 40, $Cols: 6, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Easing: { $Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $ZIndex: -10, $Brother: { $Duration: 1200, x: 1, $Delay: 40, $Cols: 6, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Easing: { $Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $ZIndex: -10, $Shift: -100 } },
	                //Rotate Axis down
	                { $Duration: 1500, x: -0.1, y: -0.7, $Rotate: 0.1, $During: { $Left: [0.6, 0.4], $Top: [0.6, 0.4], $Rotate: [0.6, 0.4] }, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Top: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Brother: { $Duration: 1000, x: 0.2, y: 0.5, $Rotate: -0.1, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Top: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2 } },
	                //Extrude Replace
	                { $Duration: 1600, x: -0.2, $Delay: 40, $Cols: 12, $During: { $Left: [0.4, 0.6] }, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInOutExpo, $Opacity: $JssorEasing$.$EaseInOutQuad }, $Opacity: 2, $Outside: true, $Round: { $Top: 0.5 }, $Brother: { $Duration: 1000, x: 0.2, $Delay: 40, $Cols: 12, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 1028, $Easing: { $Left: $JssorEasing$.$EaseInOutExpo, $Opacity: $JssorEasing$.$EaseInOutQuad }, $Opacity: 2, $Round: { $Top: 0.5 } } }
	            ]';

				$captionTransitions = '[
	            //CLIP|LR
	            {$Duration: 900, $Clip: 3, $Easing: $JssorEasing$.$EaseInOutCubic },
	            //CLIP|TB
	            {$Duration: 900, $Clip: 12, $Easing: $JssorEasing$.$EaseInOutCubic },

	            //DDGDANCE|LB
	            {$Duration: 1800, x: 0.3, y: -0.3, $Zoom: 1, $Easing: { $Left: $JssorEasing$.$EaseInJump, $Top: $JssorEasing$.$EaseInJump, $Zoom: $JssorEasing$.$EaseOutQuad }, $Opacity: 2, $During: { $Left: [0, 0.8], $Top: [0, 0.8] }, $Round: { $Left: 0.8, $Top: 2.5} },
	            //DDGDANCE|RB
	            {$Duration: 1800, x: -0.3, y: -0.3, $Zoom: 1, $Easing: { $Left: $JssorEasing$.$EaseInJump, $Top: $JssorEasing$.$EaseInJump, $Zoom: $JssorEasing$.$EaseOutQuad }, $Opacity: 2, $During: { $Left: [0, 0.8], $Top: [0, 0.8] }, $Round: { $Left: 0.8, $Top: 2.5} },

	            //TORTUOUS|HL
	            {$Duration: 1500, x: 0.2, $Zoom: 1, $Easing: { $Left: $JssorEasing$.$EaseOutWave, $Zoom: $JssorEasing$.$EaseOutCubic }, $Opacity: 2, $During: { $Left: [0, 0.7] }, $Round: { $Left: 1.3} },
	            //TORTUOUS|VB
	            {$Duration: 1500, y: -0.2, $Zoom: 1, $Easing: { $Top: $JssorEasing$.$EaseOutWave, $Zoom: $JssorEasing$.$EaseOutCubic }, $Opacity: 2, $During: { $Top: [0, 0.7] }, $Round: { $Top: 1.3} },

	            //ZMF|10
	            {$Duration: 600, $Zoom: 11, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 },

	            //ZML|R
	            {$Duration: 600, x: -0.6, $Zoom: 11, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $Opacity: 2 },
	            //ZML|B
	            {$Duration: 600, y: -0.6, $Zoom: 11, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $Opacity: 2 },

	            //ZMS|B
	            {$Duration: 700, y: -0.6, $Zoom: 1, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $Opacity: 2 },

	            //ZM*JDN|LB
	            {$Duration: 1200, x: 0.8, y: -0.5, $Zoom: 11, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseOutCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $During: { $Top: [0, 0.5]} },
	            //ZM*JUP|LB
	            {$Duration: 1200, x: 0.8, y: -0.5, $Zoom: 11, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $During: { $Top: [0, 0.5]} },
	            //ZM*JUP|RB
	            {$Duration: 1200, x: -0.8, y: -0.5, $Zoom: 11, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $During: { $Top: [0, 0.5]} },

	            //ZM*WVR|LT
	            {$Duration: 1200, x: 0.5, y: 0.3, $Zoom: 11, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInWave }, $Opacity: 2, $Round: { $Rotate: 0.8} },
	            //ZM*WVR|RT
	            {$Duration: 1200, x: -0.5, y: 0.3, $Zoom: 11, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInWave }, $Opacity: 2, $Round: { $Rotate: 0.8} },
	            //ZM*WVR|TL
	            {$Duration: 1200, x: 0.3, y: 0.5, $Zoom: 11, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Round: { $Rotate: 0.8} },
	            //ZM*WVR|BL
	            {$Duration: 1200, x: 0.3, y: -0.5, $Zoom: 11, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Round: { $Rotate: 0.8} },

	            //RTT|10
	            {$Duration: 700, $Zoom: 11, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} },

	            //RTTL|R
	            {$Duration: 700, x: -0.6, $Zoom: 11, $Rotate: 1, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.8} },
	            //RTTL|B
	            {$Duration: 700, y: -0.6, $Zoom: 11, $Rotate: 1, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.8} },

	            //RTTS|R
	            {$Duration: 700, x: -0.6, $Zoom: 1, $Rotate: 1, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Zoom: $JssorEasing$.$EaseInQuad, $Rotate: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseOutQuad }, $Opacity: 2, $Round: { $Rotate: 1.2} },
	            //RTTS|B
	            {$Duration: 700, y: -0.6, $Zoom: 1, $Rotate: 1, $Easing: { $Top: $JssorEasing$.$EaseInQuad, $Zoom: $JssorEasing$.$EaseInQuad, $Rotate: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseOutQuad }, $Opacity: 2, $Round: { $Rotate: 1.2} },

	            //RTT*JDN|RT
	            {$Duration: 1000, x: -0.8, y: 0.5, $Zoom: 11, $Rotate: 0.2, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseOutCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $During: { $Top: [0, 0.5]} },
	            //RTT*JDN|LB
	            {$Duration: 1000, x: 0.8, y: -0.5, $Zoom: 11, $Rotate: 0.2, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseOutCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $During: { $Top: [0, 0.5]} },
	            //RTT*JUP|RB
	            {$Duration: 1000, x: -0.8, y: -0.5, $Zoom: 11, $Rotate: 0.2, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $During: { $Top: [0, 0.5]} },
	            {$Duration: 1000, x: -0.5, y: 0.8, $Zoom: 11, $Rotate: 1, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseLinear, $Zoom: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $During: { $Left: [0, 0.5] }, $Round: { $Rotate: 0.5 } },
	            //RTT*JUP|BR
	            {$Duration: 1000, x: -0.5, y: -0.8, $Zoom: 11, $Rotate: 0.2, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseLinear, $Zoom: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $During: { $Left: [0, 0.5]} },

	            //R|IB
	            {$Duration: 900, x: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutBack }, $Opacity: 2 },
	            //B|IB
	            {$Duration: 900, y: -0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutBack }, $Opacity: 2 },

	            ]';

				$options = '{
	                $AutoPlay: '. $autoPlay .',
	                $AutoPlaySteps: 1,
	                $AutoPlayInterval: '. $autoPlayInterval .',
	                $PauseOnHover: '. $pauseOnHover .',

	                $ArrowKeyNavigation: true,
	                $SlideDuration: '. $slideDuration .',
	                $MinDragOffsetToSlide: 20,
	                //$SlideWidth: '.$settings['jssorslider']['width'].',
	                //$SlideHeight: '.$settings['jssorslider']['height'].',
	                $SlideSpacing: 0,
	                $DisplayPieces: 1,
	                $ParkingPosition: 0,
	                $UISearchMode: 1,
	                $PlayOrientation: 1,
	                $DragOrientation: 3,

	                $SlideshowOptions: {
	                    $Class: $JssorSlideshowRunner$,
	                    $Transitions: _SlideshowTransitions,
	                    $TransitionsOrder: 1,
	                    $ShowLink: true
	                },

	                $CaptionSliderOptions: {
	                    $Class: $JssorCaptionSlider$,
	                    $CaptionTransitions: _CaptionTransitions,
	                    $PlayInMode: 1,
	                    $PlayOutMode: 3
	                },

	                $BulletNavigatorOptions: {
	                    $Class: $JssorBulletNavigator$,
	                    $ChanceToShow: 2,
	                    $AutoCenter: 0,
	                    $Steps: 1,
	                    $Lanes: 1,
	                    $SpacingX: 10,
	                    $SpacingY: 10,
	                    $Orientation: 1
	                },

	                $ArrowNavigatorOptions: {
	                    $Class: $JssorArrowNavigator$,
	                    $ChanceToShow: 2
	                }
	            }';


				$inlineJS = $queryNoConflict.'(document).ready(function ($) {
		            var _SlideshowTransitions = '.$slideshowTransitions.';
		            var _CaptionTransitions = '.$captionTransitions.';
		            var options = '.$options.';

		            var jssor_slider'.$contentObjectUid.' = new $JssorSlider$("slider'.$contentObjectUid.'_container", options);
	            function ScaleSlider() {
	                var parentWidth = jssor_slider'.$contentObjectUid.'.$Elmt.parentNode.clientWidth;
	                if (parentWidth)
	                    jssor_slider'.$contentObjectUid.'.$ScaleWidth(Math.min(parentWidth, '.$settings['jssorslider']['width'].'));
	                else
	                    window.setTimeout(ScaleSlider, 30);
	            }

	            ScaleSlider();

	            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
	                $(window).bind(\'resize\', ScaleSlider);
	            }


	            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
	            //    $(window).bind("orientationchange", ScaleSlider);
	            //}
	            //responsive code end

		        });';


			}

			if ( $settings['jssorslider']['style'] == 2 ) {

				$slideshowTransitions = '[
	            //Fade in R
	            {$Duration: 1200, x: -0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
	            //Fade out L
	            , { $Duration: 1200, x: 0.3, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
	            ]';

	            $options = '{
	                $AutoPlay: '. $autoPlay .',
	                $AutoPlaySteps: 1,
	                $AutoPlayInterval: '. $autoPlayInterval .',
	                $PauseOnHover: '. $pauseOnHover .',

	                $ArrowKeyNavigation: true,
	                $SlideDuration: '. $slideDuration .',
	                $MinDragOffsetToSlide: 20,
	                //$SlideWidth: '.$settings['jssorslider']['width'].',
	                //$SlideHeight: '.$settings['jssorslider']['height'].',
	                $SlideSpacing: 0,
	                $DisplayPieces: 1,
	                $ParkingPosition: 0,
	                $UISearchMode: 1,
	                $PlayOrientation: 1,
	                $DragOrientation: 3,

	                $SlideshowOptions: {
	                    $Class: $JssorSlideshowRunner$,
	                    $Transitions: _SlideshowTransitions,
	                    $TransitionsOrder: 1,
	                    $ShowLink: true
	                },

	                $BulletNavigatorOptions: {
	                    $Class: $JssorBulletNavigator$,
	                    $ChanceToShow: 2,
	                    $Lanes: 1,
	                    $SpacingX: 10,
	                    $SpacingY: 10
	                },

	                $ArrowNavigatorOptions: {
	                    $Class: $JssorArrowNavigator$,
	                    $ChanceToShow: 2,
	                    $AutoCenter: 2
	                },

	                $ThumbnailNavigatorOptions: {
	                    $Class: $JssorThumbnailNavigator$,
	                    $ChanceToShow: 2,
	                    $ActionMode: 0,
	                    $DisableDrag: true
	                }
	            }';


				$inlineJS = $queryNoConflict.'(document).ready(function ($) {
		            var _SlideshowTransitions = '.$slideshowTransitions.';
		            var options = '.$options.';
		            var jssor_slider'.$contentObjectUid.' = new $JssorSlider$("slider'.$contentObjectUid.'_container", options);
		            function ScaleSlider() {
		                var parentWidth = jssor_slider'.$contentObjectUid.'.$Elmt.parentNode.clientWidth;
		                if (parentWidth)
		                    jssor_slider'.$contentObjectUid.'.$ScaleWidth(Math.min(parentWidth, '.$settings['jssorslider']['width'].'));
		                else
		                    window.setTimeout(ScaleSlider, 30);
		            }

		            ScaleSlider();

		            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
		                $(window).bind(\'resize\', ScaleSlider);
		            }


		            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
		            //    $(window).bind("orientationchange", ScaleSlider);
		            //}
		            //responsive code end

		        });';

			}

			if ( $settings['jssorslider']['style'] == 3 ) {

				$options = '{
	                $AutoPlay: '. $autoPlay .',
	                $AutoPlayInterval: '. $autoPlayInterval .',
	                $PauseOnHover: '. $pauseOnHover .',

	                $ArrowKeyNavigation: true,
	                $SlideDuration: '. $slideDuration .',
	                $MinDragOffsetToSlide: 20,
	                //$SlideWidth: '.$settings['jssorslider']['width'].',
	                //$SlideHeight: '.$settings['jssorslider']['height'].',
	                $SlideSpacing: 0,
	                $DisplayPieces: 1,
	                $ParkingPosition: 0,
	                $UISearchMode: 1,
	                $PlayOrientation: 1,
	                $DragOrientation: 1,

	                $ArrowNavigatorOptions: {
	                    $Class: $JssorArrowNavigator$,
	                    $ChanceToShow: 1,
	                    $AutoCenter: 2,
	                    $Steps: 1
	                },

	                $ThumbnailNavigatorOptions: {
	                    $Class: $JssorThumbnailNavigator$,
	                    $ChanceToShow: 2,

	                    $ActionMode: 1,
	                    $AutoCenter: 0,
	                    $Lanes: 1,
	                    $SpacingX: 3,
	                    $SpacingY: 3,
	                    $DisplayPieces: 9,
	                    $ParkingPosition: 260,
	                    $Orientation: 1,
	                    $DisableDrag: false
	                }
	            }';

				$inlineJS = $queryNoConflict.'(document).ready(function ($) {
		            var options = '.$options.';
		            var jssor_slider'.$contentObjectUid.' = new $JssorSlider$("slider'.$contentObjectUid.'_container", options);
		            function ScaleSlider() {
		                var bodyWidth = document.body.clientWidth;
		                if (bodyWidth)
		                    jssor_slider'.$contentObjectUid.'.$ScaleWidth(Math.min(bodyWidth, '.$settings['jssorslider']['width'].'));
		                else
		                    window.setTimeout(ScaleSlider, 30);
		            }

		            ScaleSlider();

		            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
		                $(window).bind(\'resize\', ScaleSlider);
		            }


		            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
		            //    $(window).bind("orientationchange", ScaleSlider);
		            //}
		            //responsive code end

		        });';

			}


			if ( $settings['jssorslider']['style'] == 4 ) {

				$captionTransitions = '[];
		            _CaptionTransitions["L"] = { $Duration: 900, x: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
		            _CaptionTransitions["R"] = { $Duration: 900, x: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
		            _CaptionTransitions["T"] = { $Duration: 900, y: 0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
		            _CaptionTransitions["B"] = { $Duration: 900, y: -0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
		            _CaptionTransitions["ZMF|10"] = { $Duration: 900, $Zoom: 11, $Easing: { $Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 };
		            _CaptionTransitions["RTT|10"] = { $Duration: 900, $Zoom: 11, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} };
		            _CaptionTransitions["RTT|2"] = { $Duration: 900, $Zoom: 3, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Round: { $Rotate: 0.5} };
		            _CaptionTransitions["RTTL|BR"] = { $Duration: 900, x: -0.6, y: -0.6, $Zoom: 11, $Rotate: 1, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.8} };
		            _CaptionTransitions["CLIP|LR"] = { $Duration: 900, $Clip: 15, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };
		            _CaptionTransitions["MCLIP|L"] = { $Duration: 900, $Clip: 1, $Move: true, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic} };
		            _CaptionTransitions["MCLIP|R"] = { $Duration: 900, $Clip: 2, $Move: true, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic} }';

	            $options = '{
	            	$FillMode: 2,
	                $AutoPlay: '. $autoPlay .',
	                $AutoPlayInterval: '. $autoPlayInterval .',
	                $PauseOnHover: '. $pauseOnHover .',
	                $ArrowKeyNavigation: true,
	                $SlideEasing: $JssorEasing$.$EaseOutQuint,
	                $SlideDuration: '. $slideDuration .',
	                $MinDragOffsetToSlide: 20,
	                //$SlideWidth: '.$settings['jssorslider']['width'].',
	                //$SlideHeight: '.$settings['jssorslider']['height'].',
	                $SlideSpacing: 0,
	                $DisplayPieces: 1,
	                $ParkingPosition: 0,
	                $UISearchMode: 1,
	                $PlayOrientation: 1,
	                $DragOrientation: 1,
	                $CaptionSliderOptions: {
	                    $Class: $JssorCaptionSlider$,
	                    $CaptionTransitions: _CaptionTransitions,
	                    $PlayInMode: 1,
	                    $PlayOutMode: 3
	                },
	                $BulletNavigatorOptions: {
	                    $Class: $JssorBulletNavigator$,
	                    $ChanceToShow: 2,
	                    $AutoCenter: 1,
	                    $Steps: 1,
	                    $Lanes: 1,
	                    $SpacingX: 8,
	                    $SpacingY: 8,
	                    $Orientation: 1
	                },
	                $ArrowNavigatorOptions: {
	                    $Class: $JssorArrowNavigator$,
	                    $ChanceToShow: 1,
	                    $AutoCenter: 2,
	                    $Steps: 1
	                }
	            }';
				$inlineJS = $queryNoConflict.'(document).ready(function ($) {
		            var _CaptionTransitions = '.$captionTransitions.';
		            var options = '.$options.';
		            var jssor_slider'.$contentObjectUid.' = new $JssorSlider$("slider'.$contentObjectUid.'_container", options);
					function ScaleSlider() {
						var bodyWidth = document.body.clientWidth;
						if (bodyWidth)
						jssor_slider'.$contentObjectUid.'.$ScaleWidth(Math.min(bodyWidth, 2560));
						else
						window.setTimeout(ScaleSlider, 30);
					}
					ScaleSlider();
					if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
						$(window).bind(\'resize\', ScaleSlider);
					}
					//if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
					// $(window).bind("orientationchange", ScaleSlider);
					//}
					//responsive code end

		        });';
			}

			if ( $settings['jssorslider']['style'] == 5 ) {

				$options = '{
					$AutoPlay: '. $autoPlay .',
		            $AutoPlaySteps: 1,
		            $AutoPlayInterval: '. $autoPlayInterval .',
		            $PauseOnHover: '. $pauseOnHover .',
		            $Loop: '. $loop .',
		            $ArrowKeyNavigation: true,
		            $SlideDuration: '. $slideDuration .',
		            $MinDragOffsetToSlide: 20,
					//$SlideWidth: '.$settings['jssorslider']['width'].',
					//$SlideHeight: '.$settings['jssorslider']['height'].',
		            $SlideSpacing: 5,
		            $DisplayPieces: 1,
		            $ParkingPosition: 0,
		            $UISearchMode: 1,
		            $PlayOrientation: 1,
		            $DragOrientation: 3,
		            $ThumbnailNavigatorOptions: {
		                $Class: $JssorThumbnailNavigator$,
		                $ChanceToShow: 2,
		                $Loop: 2,
		                $AutoCenter: 3,
		                $Lanes: 1,
		                $SpacingX: 4,
		                $SpacingY: 4,
		                $DisplayPieces: '.$settings['jssorslider']['list']['thumbnavigator']['number'].',
		                $ParkingPosition: 0,
		                $Orientation: 2,
		                $DisableDrag: false
		            }
	            }';

				$inlineJS = $queryNoConflict.'(document).ready(function ($) {
		            var options = '.$options.';
		            var jssor_slider'.$contentObjectUid.' = new $JssorSlider$("slider'.$contentObjectUid.'_container", options);
		            function ScaleSlider() {
		                var parentWidth = jssor_slider'.$contentObjectUid.'.$Elmt.parentNode.clientWidth;
		                if (parentWidth) {
		                    var sliderWidth = parentWidth;

		                    //keep the slider width no more than 810
		                    sliderWidth = Math.min(sliderWidth, '.$settings['jssorslider']['width'].');

		                    jssor_slider'.$contentObjectUid.'.$ScaleWidth(sliderWidth);
		                }
		                else
		                    window.setTimeout(ScaleSlider, 30);
		            }
		            ScaleSlider();
					//if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
					// $(window).bind("orientationchange", ScaleSlider);
					//}
					//responsive code end
			    });';
			}

	      break;
	      case 'customslider':

		  	$inlineJS = $settings['customslider']['jsInline'];

	      break;



	    }

		if ( $settings['moveInlineJsFromHeaderToFooter'] ) {
			$GLOBALS['TSFE']->getPageRenderer()->addJsFooterInlineCode($name,$inlineJS,$compress);
		} else {
			$GLOBALS['TSFE']->getPageRenderer()->addJsInlineCode($name,$inlineJS,$compress);
		}

	}
}

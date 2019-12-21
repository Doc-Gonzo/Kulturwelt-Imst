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
 * ViewHelper to render inlineJS in <head> or <footer> section of website
 *
 * @package TYPO3
 * @subpackage T3S\T3sJslidernews\
 */
class InlineJsCeViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Renders InlineJs
	 *
	 * @param integer $contentObjectUid
	 * @param string $action
	 * @param array $flexform
	 * @return void
	*/
	public function render( $contentObjectUid, $action, $flexform ) {

	    $settings = $this->templateVariableContainer->get('settings');

	    $name=' JavaScript for News &amp; Content Slider CE-'.$contentObjectUid.' ';
	    $queryNoConflict = $settings['jqueryNoConflict'] ? 'jQuery.noConflict()' : 'jQuery';
	    $compress = $settings['compressJS'] ? 'TRUE' : 'FALSE';

	    switch ( $action ) {
			case 'flexslider':

	        	$options  = $flexform['controlNav'] ? '' : 'controlNav:false,';
				$options .= $flexform['slideshowSpeed'] ? 'slideshowSpeed:'.trim(intval($flexform['slideshowSpeed'])).',' : 'slideshowSpeed:7000,';
				$options .= $flexform['animationSpeed'] ? 'animationSpeed:'.trim(intval($flexform['animationSpeed'])).',' : 'animationSpeed:600,';
				$options .= $flexform['pauseOnHover'] ? 'pauseOnHover:true,' : '';
	        	$options .= $flexform['slideshow'] ? '' : 'slideshow:false,';
				$options .= $flexform['animation'] == 'fade' ? '' : 'animation:\'slide\',';
				$options .= $flexform['directionNav'] ? 'directionNav:true' : 'directionNav:false';

				$inlineJS = $queryNoConflict.'(function(){
				jQuery(\'#flexslider_'.$contentObjectUid.'\').flexslider({'.$options.'});
				});';

			break;
			case 'nivoslider':

				$flexform['slices'] = $settings['nivoslider']['slices'];
				$flexform['boxCols'] = $settings['nivoslider']['boxCols'];
				$flexform['boxRows'] = $settings['nivoslider']['boxRows'];
				$flexform['prevText'] = $settings['nivoslider']['prevText'];
				$flexform['nextText'] = $settings['nivoslider']['nextText'];
				$flexform['startSlide'] = $settings['nivoslider']['startSlide'];
				$flexform['pauseOnHover'] = $settings['nivoslider']['pauseOnHover'];
				$flexform['randomStart'] = $settings['nivoslider']['randomStart'];


				$flexform['animSpeed'] = $flexform['animSpeed'] ? $flexform['animSpeed'] : 500;
				$flexform['pauseTime'] = $flexform['pauseTime'] ? $flexform['pauseTime'] : 3000;



				$options = $flexform['controlNav'] ? '' : 'controlNav:false,';
				$options .= $flexform['manualAdvance'] ? '' : 'manualAdvance:true,';
				$options .= $flexform['effect'] == 'random' ? '' : 'effect:\''.$flexform['effect'].'\',';
				$options .= $flexform['slices'] == 15 ? '' : 'slices:'.$flexform['slices'].',';
				$options .= $flexform['boxCols'] == 8 ? '' : 'boxCols:'.$flexform['boxCols'].',';
				$options .= $flexform['boxRows'] == 4 ? '' : 'boxRows:'.$flexform['boxRows'].',';
				$options .= $flexform['animSpeed'] == 500 ? '' : 'animSpeed:'.$flexform['animSpeed'].',';
				$options .= $flexform['pauseTime'] == 3000 ? '' : 'pauseTime:'.$flexform['pauseTime'].',';
				$options .= $flexform['startSlide'] == 0 ? '' : 'startSlide:'.$flexform['startSlide'].',';
				$options .= $flexform['pauseOnHover'] == 'true' ? '' : 'pauseOnHover:false,';
				$options .= $flexform['randomStart'] == 'false' ? '' : 'randomStart:true,';
				$options .= $flexform['prevText'] == 'Prev' ? '' : 'prevText:\''.$flexform['prevText'].'\',';
				$options .= $flexform['nextText'] == 'Next' ? '' : 'nextText:\''.$flexform['nextText'].'\',';
				$options .= $flexform['directionNav'] ? 'directionNav:true' : 'directionNav:false';

				$inlineJS =  $queryNoConflict.'(window).load(function(){
				jQuery(\'#slider-'.$contentObjectUid.'\').nivoSlider({'.$options.'});
				});';

			break;
			case 'jssorslider':

				$flexform['width'] = $flexform['width'] ? $flexform['width'] : 600;

				$inlineJS = $queryNoConflict.'(function() {
				            var _CaptionTransitions = [];
				            _CaptionTransitions["CLIP|L"] = { $Duration: 600, $Clip: 1, $Easing: $JssorEasing$.$EaseInOutCubic };
				            _CaptionTransitions["RTT|10"] = { $Duration: 600, $Zoom: 11, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} };
				            _CaptionTransitions["ZMF|10"] = { $Duration: 600, $Zoom: 11, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 };
				            _CaptionTransitions["FLTTR|R"] = { $Duration: 600, x: -0.2, y: -0.1, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInWave }, $Opacity: 2, $Round: { $Top: 1.3} };

				            var options = {
				                $AutoPlay: true,
				                $DragOrientation: 3,

				                $CaptionSliderOptions: {
				                    $Class: $JssorCaptionSlider$,
				                    $CaptionTransitions: _CaptionTransitions,
				                    $PlayInMode: 1,
				                    $PlayOutMode: 3
				                }
				            };

				            var jssor_slider'.$contentObjectUid.' = new $JssorSlider$("slider'.$contentObjectUid.'_container", options);

				            function ScaleSlider() {

				                //reserve blank width for margin+padding: margin+padding-left (10) + margin+padding-right (10)
				                var paddingWidth = 20;

				                //minimum width should reserve for text
				                var minReserveWidth = 150;

				                var parentElement = jssor_slider'.$contentObjectUid.'.$Elmt.parentNode;

				                //evaluate parent container width
				                var parentWidth = parentElement.clientWidth;

				                if (parentWidth) {

				                    //exclude blank width
				                    var availableWidth = parentWidth - paddingWidth;

				                    //calculate slider width as 70% of available width
				                    var sliderWidth = availableWidth * 0.7;

				                    //slider width is maximum 600
				                    sliderWidth = Math.min(sliderWidth, '.$flexform['width'].');

				                    //slider width is minimum 200
				                    sliderWidth = Math.max(sliderWidth, 200);

				                    //evaluate free width for text, if the width is less than minReserveWidth then fill parent container
				                    if (availableWidth - sliderWidth < minReserveWidth) {

				                        //set slider width to available width
				                        sliderWidth = availableWidth;

				                        //slider width is minimum 200
				                        sliderWidth = Math.max(sliderWidth, 200);
				                    }

				                    jssor_slider'.$contentObjectUid.'.$ScaleWidth(sliderWidth);
				                }
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
				        });
				';
			break;
	    }

		if ($settings['moveInlineJsFromHeaderToFooter'] ) {
			$GLOBALS['TSFE']->getPageRenderer()->addJsFooterInlineCode($name,$inlineJS,$compress);
		} else {
			$GLOBALS['TSFE']->getPageRenderer()->addJsInlineCode($name,$inlineJS,$compress);
		}

	}
}

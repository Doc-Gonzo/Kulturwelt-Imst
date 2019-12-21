<?php

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
 * @package TYPO3
 * @subpackage T3S\T3sjslidernews\
 */
class Entry {

	function getExtensionSummary($params, &$pObj) {

	    $data = \TYPO3\CMS\Core\Utility\GeneralUtility::xml2array($params['row']['pi_flexform']);

	    if ( $params['row']['list_type'] == 't3sjslidernews_content' ) {


	    	if ( is_array($data) && $data['data']['contentslider']['lDEF']['switchableControllerActions'] ) {
	        	$selectedAction = explode('->',$data['data']['contentslider']['lDEF']['switchableControllerActions']['vDEF']);

	        	$selectedAction = $selectedAction[1];

		        if ( $selectedAction == 'flexslider') {
		          $style = $data['data']['contentslider']['lDEF']['settings.content.flexslider.style']['vDEF'] ? ' (Style: '.$data['data']['contentslider']['lDEF']['settings.content.flexslider.style']['vDEF'].')' : '';
		        }
		        if ( $selectedAction == 'nivoslider') {
		          $style = $data['data']['contentslider']['lDEF']['settings.content.nivoslider.theme']['vDEF'] ? ' (Theme: '.$data['data']['contentslider']['lDEF']['settings.content.jslidernews.theme']['vDEF'].')' : '';
		        }
		        if ( $selectedAction == 'jssorslider') {
		          $style = $data['data']['contentslider']['lDEF']['settings.content.jssorslider.style']['vDEF'] ? ' (Style: '.$data['data']['contentslider']['lDEF']['settings.content.jssorslider.style']['vDEF'].')' : '';
		        }
		        if ( $selectedAction == 'jslidernews') {
		          $style = $data['data']['contentslider']['lDEF']['settings.content.jslidernews.style']['vDEF'] ? ' (Style: '.$data['data']['contentslider']['lDEF']['settings.content.jslidernews.style']['vDEF'].')' : '';
		        }

		        $result = '<b>Content Slider</b> (t3s_jslidernews)</br><b>Action:</b> '.$selectedAction.$style.'</br>';

	    		return $result;
	    	}
	    }

	    if ( $params['row']['list_type'] == 't3sjslidernews_page' ) {

	    	if ( is_array($data) && $data['data']['pageslider']['lDEF']['switchableControllerActions'] ) {
	        	$selectedAction = explode('->',$data['data']['pageslider']['lDEF']['switchableControllerActions']['vDEF']);

	        	$selectedAction = $selectedAction[1];

		        if ( $selectedAction == 'flexslider') {
		          $style = $data['data']['pageslider']['lDEF']['settings.page.flexslider.style']['vDEF'] ? ' (Style: '.$data['data']['pageslider']['lDEF']['settings.page.flexslider.style']['vDEF'].')' : '';
		        }
		        if ( $selectedAction == 'nivoslider') {
		          $style = $data['data']['pageslider']['lDEF']['settings.page.nivoslider.theme']['vDEF'] ? ' (Theme: '.$data['data']['pageslider']['lDEF']['settings.page.jslidernews.theme']['vDEF'].')' : '';
		        }
		        if ( $selectedAction == 'jssorslider') {
		          $style = $data['data']['pageslider']['lDEF']['settings.page.jssorslider.style']['vDEF'] ? ' (Style: '.$data['data']['pageslider']['lDEF']['settings.page.jssorslider.style']['vDEF'].')' : '';
		        }
		        if ( $selectedAction == 'jslidernews') {
		          $style = $data['data']['pageslider']['lDEF']['settings.page.jslidernews.style']['vDEF'] ? ' (Style: '.$data['data']['pageslider']['lDEF']['settings.page.jslidernews.style']['vDEF'].')' : '';
		        }

		        $result = '<b>Page Slider</b> (t3s_jslidernews)</br><b>Action:</b> '.$selectedAction.$style.'</br>';

	    		return $result;
	    	}
		}

	    if ( $params['row']['list_type'] == 't3sjslidernews_news' ) {

	    	if ( is_array($data) && $data['data']['newsslider']['lDEF']['switchableControllerActions'] ) {
	        	$selectedAction = explode('->',$data['data']['newsslider']['lDEF']['switchableControllerActions']['vDEF']);

	        	$selectedAction = $selectedAction[1];

		        if ( $selectedAction == 'flexslider') {
		          $style = $data['data']['newsslider']['lDEF']['settings.news.flexslider.style']['vDEF'] ? ' (Style: '.$data['data']['newsslider']['lDEF']['settings.news.flexslider.style']['vDEF'].')' : '';
		        }
		        if ( $selectedAction == 'nivoslider') {
		          $style = $data['data']['newsslider']['lDEF']['settings.news.nivoslider.theme']['vDEF'] ? ' (Theme: '.$data['data']['newsslider']['lDEF']['settings.news.jslidernews.theme']['vDEF'].')' : '';
		        }
		        if ( $selectedAction == 'jssorslider') {
		          $style = $data['data']['newsslider']['lDEF']['settings.news.jssorslider.style']['vDEF'] ? ' (Style: '.$data['data']['newsslider']['lDEF']['settings.news.jssorslider.style']['vDEF'].')' : '';
		        }
		        if ( $selectedAction == 'jslidernews') {
		          $style = $data['data']['newsslider']['lDEF']['settings.news.jslidernews.style']['vDEF'] ? ' (Style: '.$data['data']['newsslider']['lDEF']['settings.news.jslidernews.style']['vDEF'].')' : '';
		        }

		        $result = '<b>News Slider</b> (t3s_jslidernews)</br><b>Action:</b> '.$selectedAction.$style.'</br>';

	    		return $result;
	    	}
		}

	}
}

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
* Class FlexFormViewHelper
*/
class FlexFormViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	* @var \TYPO3\CMS\Extbase\Service\FlexFormService
	*/
	protected $flexFormService;

	/**
	* @param \TYPO3\CMS\Extbase\Service\FlexFormService $flexFormService
	* @return void
	*/
	public function injectFlexFormService(\TYPO3\CMS\Extbase\Service\FlexFormService $flexFormService) {
		$this->flexFormService = $flexFormService;
	}

	/**
	* @param string $flexForm
	* @return array
	*/
	public function render( $flexForm = '' ) {

		$ff = $this->flexFormService->convertFlexFormContentToArray($flexForm);

		$flexFormArray['action'] = $ff['switchableControllerActions'];

		if ($ff['switchableControllerActions'] == 'flexslider') {

			$flexFormArray['flexslider'] = $ff['settings']['flexslider'];

		} elseif ($ff['switchableControllerActions'] == 'nivoslider') {

			$flexFormArray['nivoslider'] = $ff['settings']['nivoslider'];

		} elseif ($ff['switchableControllerActions'] == 'jssorslider') {

			$flexFormArray['jssorslider'] = $ff['settings']['jssorslider'];

		} else {

			$flexFormArray['jssorslider'] = $ff['settings'];

		}

		return $flexFormArray;

	}

}
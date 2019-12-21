<?php
namespace T3S\T3sJslidernews\Controller;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \Tx_News_Controller_NewsController as Tx_News_Controller_NewsController;

/**
 * Newsslider Controller
 *
 * @package TYPO3
 * @subpackage T3S\T3sJslidernews\
 */
class NewssliderController extends Tx_News_Controller_NewsController {

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {

		\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($this->settings,$this->settings['news']);

		$this->contentObj = $this->configurationManager->getContentObject();
		$this->settings['contentUid'] = $this->contentObj->data['uid'];
		$this->settings['controller'] = $this->request->getControllerName();
		$this->settings['action'] = $this->request->getControllerActionName();
		$this->settings = \T3S\T3sJslidernews\Utility\SliderSettings::getSettings($this->settings);

		$tsSettings = $this->configurationManager->getConfiguration(
			\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK,
			'news',
			'news_pi1'
		);
		$this->settings['orderByAllowed'] = $tsSettings['settings']['orderByAllowed'];
		$this->settings['dummyImage'] = $tsSettings['settings']['list']['media']['dummyImage'];

	}


	/**
	 * Output a jslidernews view of news
	 *
	 * @return return string the Rendered view
	 */
	public function jslidernewsAction() {

		$demand = parent::createDemandObjectFromSettings($this->settings);

		$this->view->assign('slides',$this->newsRepository->findDemanded($demand));

	}


	/**
	 * Output a flexslider view of news
	 *
	 * @return return string the Rendered view
	 */
	public function flexsliderAction() {

		$demand = parent::createDemandObjectFromSettings($this->settings);

		$this->view->assign('slides',$this->newsRepository->findDemanded($demand));
	}


	/**
	 * Output a nivolider view of news
	 *
	 * @return return string the Rendered view
	 */
	public function nivosliderAction() {

		$demand = parent::createDemandObjectFromSettings($this->settings);

		$this->view->assign('slides',$this->newsRepository->findDemanded($demand));
	}

	/**
	 * Output a jssorslider view of tt_content
	 *
	 * @return return string the Rendered view
	 */
	public function jssorsliderAction() {

		$demand = parent::createDemandObjectFromSettings($this->settings);

		$this->view->assign('slides',$this->newsRepository->findDemanded($demand));
	}


	/**
	 * Output a customslider view of tt_content
	 *
	 * @return return string the Rendered view
	 */
	public function customsliderAction() {

		$demand = parent::createDemandObjectFromSettings($this->settings);

		$this->view->assign('slides',$this->newsRepository->findDemanded($demand));
	}

}



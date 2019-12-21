<?php
namespace T3S\Newsslider\Controller;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

/**
 * Slider Controller
 *
 * @package TYPO3
 * @subpackage T3S\Newsslider\
 */
class SliderController extends \GeorgRinger\News\Controller\NewsController {

	/**
	 * Initializes the current action
	 *
	 */
	public function initializeAction()
	{
		$action = $this->request->getControllerActionName();
		$tsSettings = $this->configurationManager->getConfiguration(
			ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK,
			'newsslider',
			'newsslider_pi1'
		);

		if (is_array($tsSettings['settings'][$action])) {
			foreach ($tsSettings['settings'][$action] as $key=>$css) {
				if ( !$this->settings[$action][$key] ) {
					$this->settings[$action][$key] = $css;
				}
			}
		}
	}


	/**
	 * Output a flexslider view of news
	 *
	 * @param array $overwriteDemand
	 * @return return string the Rendered view
	 */
	public function flexsliderAction(array $overwriteDemand = NULL) {

		$demand = parent::createDemandObjectFromSettings($this->settings);

		if ($this->settings['disableOverrideDemand'] != 1 && $overwriteDemand !== NULL) {
			$demand = parent::overwriteDemandObject($demand, $overwriteDemand);
		}

		$assignedValues = [
			'news' => $this->newsRepository->findDemanded($demand),
			'settings' => $this->settings
		];
		$this->view->assignMultiple($assignedValues);
	}


	/**
	 * Output a nivolider view of news
	 *
	 * @param array $overwriteDemand
	 * @return return string the Rendered view
	 */
	public function nivosliderAction(array $overwriteDemand = NULL) {

		$demand = parent::createDemandObjectFromSettings($this->settings);

		if ($this->settings['disableOverrideDemand'] != 1 && $overwriteDemand !== NULL) {
			$demand = parent::overwriteDemandObject($demand, $overwriteDemand);
		}

		$assignedValues = [
			'news' => $this->newsRepository->findDemanded($demand),
			'settings' => $this->settings
		];
		$this->view->assignMultiple($assignedValues);
	}


	/**
	 * Output a camera slideshow view of news
	 *
	 * @param array $overwriteDemand
	 * @return return string the Rendered view
	 */
	public function cameraAction(array $overwriteDemand = NULL) {

		$demand = parent::createDemandObjectFromSettings($this->settings);

		if ($this->settings['disableOverrideDemand'] != 1 && $overwriteDemand !== NULL) {
			$demand = parent::overwriteDemandObject($demand, $overwriteDemand);
		}

		$assignedValues = [
			'news' => $this->newsRepository->findDemanded($demand),
			'settings' => $this->settings
		];
		$this->view->assignMultiple($assignedValues);
	}


	/**
	 * Output a coustom slider view of news
	 *
	 * @param array $overwriteDemand
	 * @return return string the Rendered view
	 */
	public function customsliderAction(array $overwriteDemand = NULL) {

		$demand = parent::createDemandObjectFromSettings($this->settings);

		if ($this->settings['disableOverrideDemand'] != 1 && $overwriteDemand !== NULL) {
			$demand = parent::overwriteDemandObject($demand, $overwriteDemand);
		}

		$assignedValues = [
			'news' => $this->newsRepository->findDemanded($demand),
			'settings' => $this->settings
		];
		$this->view->assignMultiple($assignedValues);

	}

}

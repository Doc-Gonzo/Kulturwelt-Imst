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

/**
 * Pageslider Controller
 *
 * @package TYPO3
 * @subpackage T3S\T3sJslidernews\
 */
class PagesliderController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * pagesRepository
	 *
	 * @var \T3S\T3sJslidernews\Domain\Repository\PagesRepository
	 * @inject
	 */
	protected $pagesRepository = NULL;

	/**
	 * pagesLanguageOverlayRepository
	 *
	 * @var \T3S\T3sJslidernews\Domain\Repository\PagesLanguageOverlayRepository
	 * @inject
	 */
	protected $pagesLanguageOverlayRepository = NULL;

	/**
	 * @var \TYPO3\CMS\Core\Resource\FileRepository
	 * @inject
	 */
	protected $fileRepository;

	/**
	 * slides - Array
	 *
	 * @array
	 */
	protected $slides = array();


	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {

		\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($this->settings,$this->settings['page']);

		$this->contentObj = $this->configurationManager->getContentObject();
		$this->settings['contentUid'] = $this->contentObj->data['uid'];
		$this->settings['controller'] = $this->request->getControllerName();
		$this->settings['action'] = $this->request->getControllerActionName();
		$this->settings = \T3S\T3sJslidernews\Utility\SliderSettings::getSettings($this->settings);

		$pageUidArr = GeneralUtility::intExplode(',', $this->settings['pages']);

		if ( $this->settings['subpages'] ) {

			$queryGenerator = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Database\\QueryGenerator');
			foreach ($pageUidArr as $pageUid) {

				if( $this->settings['subpages'] == 1 ) {
					$treeList = $queryGenerator->getTreeList($pageUid, $this->settings['recursiveSubPages'], 0, 1);
				} else {
					$treeList = $queryGenerator->getTreeList($pageUid, $this->settings['recursiveSubPages'], -1, 1);
				}
				if (strlen($treeList) > 0) {
					$recursiveTreeList .= ',' . $treeList;
				}

				$pageUidArr = GeneralUtility::intExplode(',', ltrim($recursiveTreeList, ','));
			}
		}

		if ( $GLOBALS['TSFE']->sys_language_uid )
			$pageRepository = GeneralUtility::makeInstance('TYPO3\\CMS\\Frontend\\Page\\PageRepository');

		foreach ( $pageUidArr as $uid ) {

			if ( $GLOBALS['TSFE']->sys_language_uid ) {
				$pageOverlay = $pageRepository->getPageOverlay( $uid, $GLOBALS['TSFE']->sys_language_uid );
				$fileObjects = $this->fileRepository->findByRelation('pages_language_overlay', 'media', $pageOverlay['_PAGES_OVERLAY_UID']);
			} else {
				$fileObjects = $this->fileRepository->findByRelation('pages', 'media', $uid);
			}

			if ( is_array($fileObjects) && count($fileObjects) ) {

				$file = $fileObjects[0]->getReferenceProperties();

				$page = $this->pagesRepository->findPageByUid($uid);

				if( is_object($page[0]) ) {

					$page[0]->setImage($file);

					$pages[] = $page[0];
				}
			}
		}
		unset($fileObjects);
		unset($file);
		unset($page);

		$this->slides = $pages;

	}


	/**
	 * Output a jslidernews view of pages
	 *
	 * @return return string the Rendered view
	 */
	public function jslidernewsAction() {

		$this->view->assign('slides',$this->slides);
	}


	/**
	 * Output a flexslider view of pages
	 *
	 * @return return string the Rendered view
	 */
	public function flexsliderAction() {

		$this->view->assign('slides',$this->slides);
	}


	/**
	 * Output a nivolider view of pages
	 *
	 * @return return string the Rendered view
	 */
	public function nivosliderAction() {

		$this->view->assign('slides',$this->slides);
	}


	/**
	 * Output a jssorslider view of pages
	 *
	 * @return return string the Rendered view
	 */
	public function jssorsliderAction() {

		$this->view->assign('slides',$this->slides);
	}


	/**
	 * Output a customslider view of pages
	 *
	 * @return return string the Rendered view
	 */
	public function customsliderAction() {

		$this->view->assign('slides',$this->slides);
	}


}

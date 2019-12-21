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
 * Contentslider Controller
 *
 * @package TYPO3
 * @subpackage T3S\T3sJslidernews\
 */
class ContentsliderController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * contentRepository
	 *
	 * @var \T3S\T3sJslidernews\Domain\Repository\ContentRepository
	 * @inject
	 */
	protected $contentRepository = NULL;

	/**
	 * @var \TYPO3\CMS\Core\Resource\FileRepository
	 * @inject
	 */
	protected $fileRepository;

	/**
	 * slides - Array of fileObjects
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

		\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($this->settings,$this->settings['content']);

		$this->contentObj = $this->configurationManager->getContentObject();
		$this->settings['contentUid'] = $this->contentObj->data['uid'];
		$this->settings['controller'] = $this->request->getControllerName();
		$this->settings['action'] = $this->request->getControllerActionName();
		$this->settings = \T3S\T3sJslidernews\Utility\SliderSettings::getSettings($this->settings);

		if ( $this->settings['pages'] ) {

			$pageUidArr = GeneralUtility::intExplode(',',$this->settings['pages']);
			$pageContentArr = array();
			$pidArr = array();

			foreach ( $pageUidArr as $pid ) {

				$pageContentArr[] = $this->contentRepository->findContentElementsWithImagesByPid($pid,$this->settings['colPos']);
			}

			foreach ( $pageContentArr as $pageContents ) {

				foreach ( $pageContents as $pageContent ) {

					$pidArr[] = $pageContent->getUid();
				}
			}
			unset($pageUidArr);
			unset($pageContentArr);
		}

		if ( $this->settings['contentElements'] || $this->settings['pages'] ) {

			$uidArr = GeneralUtility::intExplode(',',$this->settings['contentElements']);

			$files = array();
			$origUidArr = array();
			$allFiles = array();
			$uniqueFiles = array();

			if ( is_array($pidArr) && count($pidArr) ) {

				if( $this->settings['pagesfirst'] ) {
					$uidArr = array_merge($pidArr, $uidArr);
				} else {
					$uidArr = array_merge($uidArr, $pidArr);
				}
			}

			foreach ( $uidArr as $uid ) {

				$fileObjects = $this->fileRepository->findByRelation('tt_content', 'image', $uid);

				if ( is_array($fileObjects) && count($fileObjects) ) {

					foreach ( $fileObjects as $key => $value ) {

						$files[$uid][$key]['reference'] = $value->getReferenceProperties();
						$files[$uid][$key]['original'] = $value->getOriginalFile()->getProperties();
					}
				}


			}

			foreach ( $files as $key => $value ) {
				foreach ( $value as $file ) {
					if ( $this->settings['preview'] ) {

						if ( $file['reference']['showinpreview'] ) {
							$origUidArr[$key] = $file['original']['uid'];
							$allFiles[$key] = $this->contentRepository->findByUid($key);
							$allFiles[$key]->setImage($file['reference']);
							break;
						}

					} else {

						$origUidArr[$key] = $file['original']['uid'];
						$allFiles[$key] = $this->contentRepository->findByUid($key);
						$allFiles[$key]->setImage($file['reference']);
						break;
					}
				}
			}

			if ( $this->settings['nodupe'] ) {

				$uniqueUidArr = array_unique( $origUidArr );

				foreach ( $uniqueUidArr as $uniqueKey => $noMatter ) {

					foreach ( $allFiles as $key => $uniqueValue ) {

						if ( $uniqueKey == $key ) $uniqueFiles[$key] = $uniqueValue;
					}
				}
			}

			unset($pidArr);
			unset($uidArr);
			unset($fileObjects);
			unset($files);
			unset($origUidArr);

			$this->slides = $uniqueFiles ? $uniqueFiles : $allFiles;

		}
	}


	/**
	 * Output a jslidernews view of tt_content
	 *
	 * @return return string the Rendered view
	 */
	public function jslidernewsAction() {

		$this->view->assign('slides',$this->slides);
	}


	/**
	 * Output a flexslider view of tt_content
	 *
	 * @return return string the Rendered view
	 */
	public function flexsliderAction() {

		$this->view->assign('slides',$this->slides);
	}


	/**
	 * Output a nivolider view of tt_content
	 *
	 * @return return string the Rendered view
	 */
	public function nivosliderAction() {

		$this->view->assign('slides',$this->slides);
	}


	/**
	 * Output a jssorslider view of tt_content
	 *
	 * @return return string the Rendered view
	 */
	public function jssorsliderAction() {

		$this->view->assign('slides',$this->slides);
	}


	/**
	 * Output a customslider view of tt_content
	 *
	 * @return return string the Rendered view
	 */
	public function customsliderAction() {

		$this->view->assign('slides',$this->slides);
	}

}

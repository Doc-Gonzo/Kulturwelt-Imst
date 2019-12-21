<?php
namespace T3S\Newsslider\ViewHelpers;

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

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class IncludeFileViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	* Arguments Initialization
	*/
	public function initializeArguments()
	{
		$this->registerArgument('path', 'string', 'Path to the CSS/JS file which should be included', true);
		$this->registerArgument('compress', 'bool', 'Define if file should be compressed', false, false);
	}

	/**
	 * Include a CSS/JS file
	 *
	 * @return void
	 */
	public function render() {

		$path = $this->arguments['path'];
		$compress = $this->arguments['compress'];

		$pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);

		$path = $GLOBALS['TSFE']->tmpl->getFileName($path);

		// JS
		if (strtolower(substr($path, -3)) === '.js') {

			if (ExtensionManagementUtility::isLoaded('vhs')) {
				// VHS Asset
				\FluidTYPO3\Vhs\Asset::createFromFile($path);
			} else {
				$settings = $this->templateVariableContainer->get('settings');

				if ($settings['moveJsFromHeaderToFooter']) {
					$pageRenderer->addJsFooterFile($path, NULL, $compress, false, '', true);
				} else {
					$pageRenderer->addJsFile($path, NULL, $compress, false, '', true);
				}
			}

		// CSS
		} elseif (strtolower(substr($path, -4)) === '.css') {
			$pageRenderer->addCssFile($path, 'stylesheet', 'all', '', $compress, false, '', true);
		}
	}
}

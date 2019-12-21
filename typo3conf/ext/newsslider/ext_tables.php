<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

call_user_func(function ($extKey) {
	
	/***************
	 * Add plugin to list
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	    'T3S.'.$extKey,
	    'Pi1',
	    'News slider'
	);
	
	/***************
	 * Default TypoScript
	 */
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'News slider');

}, $_EXTKEY);
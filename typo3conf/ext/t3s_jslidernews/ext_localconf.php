<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

/***************
 * Extension configuration
 */
$_EXTCONF = unserialize($_EXTCONF);


if ( $_EXTCONF['contentslider'] ) {

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'T3S.' . $_EXTKEY,
		'Content',
		array(
	        'Contentslider' => 'jslidernews, flexslider, nivoslider, jssorslider, customslider',
		),
		// non-cacheable actions
		array(
			'Contentslider' => '',
		)
	);
}

if ( $_EXTCONF['newsslider'] ) {

	 # if news is loaded
	if ( \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('news', $exitOnError = FALSE) ) {

		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
			'T3S.' . $_EXTKEY,
			'News',
			array(
		        'Newsslider' => 'jslidernews, flexslider, nivoslider, jssorslider, customslider',
			),
			// non-cacheable actions
			array(
				'Newsslider' => '',
			)
		);

	}
}

if ( $_EXTCONF['pageslider'] ) {

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'T3S.' . $_EXTKEY,
		'Page',
		array(
	        'Pageslider' => 'jslidernews, flexslider, nivoslider, jssorslider, customslider',
		),
		// non-cacheable actions
		array(
			'Pageslider' => '',
		)
	);
}

if ( $_EXTCONF['preview'] ) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
		'plugin.tx_t3sjslidernews.settings.preview = 1'
	);
}

if ( $_EXTCONF['textslider'] ) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
	'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page.ts">');
}

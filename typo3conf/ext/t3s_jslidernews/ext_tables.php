<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

/***************
 * Extension configuration
 */
$_EXTCONF = unserialize($_EXTCONF);


$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);


if ( $_EXTCONF['contentslider'] ) {

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		$_EXTKEY,
		'Content',
		'Content Slider'
	);

	$pluginSignature = strtolower($extensionName) . '_content';
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_content.xml');
}

if ( $_EXTCONF['newsslider'] ) {

	 # if news is loaded
	if ( \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('news', $exitOnError = FALSE) ) {

		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
			$_EXTKEY,
			'News',
			'News Slider'
		);

		$pluginSignature = strtolower($extensionName) . '_news';
		$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_news.xml');
	}
}

if ( $_EXTCONF['pageslider'] ) {

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		$_EXTKEY,
		'Page',
		'Page Slider'
	);

	$pluginSignature = strtolower($extensionName) . '_page';
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_page.xml');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'News & Content Slider');


if ( $_EXTCONF['preview'] ) {
	# Add extra field showinpreview
	$GLOBALS['TCA']['sys_file_reference']['palettes']['imageoverlayPalette']['showitem'] =
	'showinpreview,--linebreak--,title,alternative;;;;3-3-3,--linebreak--,link,description';
}


if (TYPO3_MODE == 'BE') {

  /***************
   * Extension Summary
   */
  if ( $_EXTCONF['pageslider'] ) $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['list_type_Info']['t3sjslidernews_page']['t3s_jslidernews']
   = 'EXT:t3s_jslidernews/Classes/Layout/Entry.php:Entry->getExtensionSummary';

  if ( $_EXTCONF['contentslider'] ) $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['list_type_Info']['t3sjslidernews_content']['t3s_jslidernews']
   = 'EXT:t3s_jslidernews/Classes/Layout/Entry.php:Entry->getExtensionSummary';

  if ( $_EXTCONF['newsslider'] ) $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['list_type_Info']['t3sjslidernews_news']['t3s_jslidernews']
   = 'EXT:t3s_jslidernews/Classes/Layout/Entry.php:Entry->getExtensionSummary';

}
<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

/** @var string */
$_EXTKEY = 't3s_jslidernews';

/***************
 * Extension configuration
 */
$_EXTCONF = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);


if ($_EXTCONF['textslider']) {

	/***************
	 * Add Content Elements to List
	 */
	$defaultCTypeItems = $GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'];

	$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'] = array(
		array(
		    'LLL:EXT:'.$_EXTKEY.'/Resources/Private/Language/locallang.xlf:t3sjslidernews',
		    '--div--'
		),
		array(
		    'LLL:EXT:'.$_EXTKEY.'/Resources/Private/Language/locallang.xlf:textslider',
		    'textslider',
		    'sysext/t3skin/icons/gfx/i/tt_content_textpic.gif'
		),
	);
	foreach($defaultCTypeItems as $key => $value){
	    $GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = $value;
	}
	unset($key);
	unset($value);
	unset($defaultCTypeItems);

	/***************
	 * Text & Slider
	 */
	$GLOBALS['TCA']['tt_content']['types']['textslider']['showitem'] = '
		--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
		--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.header;header,
		bodytext;Text;;richtext:rte_transform[flag=rte_enabled|mode=ts_css],
		rte_enabled;LLL:EXT:cms/locallang_ttc.xlf:rte_enabled_formlabel,
		--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.images, image,
		--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.imagelinks;imagelinks,
		--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.appearance,
		--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.frames;frames,
		pi_flexform,
		--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,
		--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.visibility;visibility,
		--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.access;access,
		--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.extended,
		--div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category, categories
	';

	// Add flexform
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('*', 'FILE:EXT:t3s_jslidernews/Configuration/FlexForms/flexform_textslider.xml', 'textslider');

}

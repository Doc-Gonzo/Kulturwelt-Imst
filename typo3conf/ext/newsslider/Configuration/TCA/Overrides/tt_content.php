<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}
	
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['newsslider_pi1']='layout,select_key,pages,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['newsslider_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('newsslider_pi1', 
	'FILE:EXT:newsslider/Configuration/FlexForms/flexform_slider.xml');

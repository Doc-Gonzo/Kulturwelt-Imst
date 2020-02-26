<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

call_user_func(function ($extKey) {

	/***************
	 * Make plugin available in frontend
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	    'T3S.'.$extKey,
	    'Pi1',
	    array(
	        'Slider' => 'flexslider, nivoslider, customslider',
	    )
	);
	
	# hooks
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem'][] = 
		'T3S\\Newsslider\\Hooks\\PreviewRenderer';
	
	$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['Domain/Repository/AbstractDemandedRepository.php']['findDemanded'][$extKey] =
		'T3S\\Newsslider\\Hooks\\Repository->modify';
	
	
	 # Default TSconfig
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:'.$extKey.'/Configuration/TSconfig/ContentElementWizard.tsconfig">'
	);

	if (TYPO3_MODE === 'BE') {
		/***************
		 * Register Icons
		 */
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		$iconRegistry->registerIcon(
			'tx-newsslider-icon',
			\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
			['source' => 'EXT:'.$extKey.'/Resources/Public/Icons/pi1.gif']
		);
	}

}, $_EXTKEY);
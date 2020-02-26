<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('navidual', 'Configuration/TypoScript', 'Navidual');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_navidual_domain_model_ort', 'EXT:navidual/Resources/Private/Language/locallang_csh_tx_navidual_domain_model_ort.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_navidual_domain_model_ort');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_navidual_domain_model_route', 'EXT:navidual/Resources/Private/Language/locallang_csh_tx_navidual_domain_model_route.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_navidual_domain_model_route');

    }
);

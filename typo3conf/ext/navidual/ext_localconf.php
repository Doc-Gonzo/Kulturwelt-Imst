<?php
defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Ciresa.Navidual',
    'OrtListe',
    [
        Ort::class => 'list',
    ],
    // non-cacheable actions
    [
        Ort::class => '',
    ]
);


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Ciresa.Navidual',
    'RouteListe',
    [
        Route::class => 'list',
    ],
    // non-cacheable actions
    [
        Route::class => '',
    ]
);
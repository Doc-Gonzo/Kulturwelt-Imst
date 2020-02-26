<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:navidual/Resources/Private/Language/locallang_db.xlf:tx_navidual_domain_model_route',
        'label' => 'route_bezeichnung',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'versioningWS' => true,
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'route_bezeichnung,route_beschreibung,wegpunkte',
        'iconfile' => 'EXT:navidual/Resources/Public/Icons/tx_navidual_domain_model_route.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden, route_bezeichnung, route_beschreibung, wegpunkte',
    ],
    'types' => [
        '1' => ['showitem' => 'hidden, route_bezeichnung, route_beschreibung, wegpunkte, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'route_bezeichnung' => [
            'exclude' => false,
            'label' => 'LLL:EXT:navidual/Resources/Private/Language/locallang_db.xlf:tx_navidual_domain_model_route.route_bezeichnung',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'route_beschreibung' => [
            'exclude' => false,
            'label' => 'LLL:EXT:navidual/Resources/Private/Language/locallang_db.xlf:tx_navidual_domain_model_route.route_beschreibung',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'wegpunkte' => [
            'exclude' => false,
            'label' => 'LLL:EXT:navidual/Resources/Private/Language/locallang_db.xlf:tx_navidual_domain_model_route.wegpunkte',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_navidual_domain_model_ort',
                'MM' => 'tx_navidual_route_ort_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
    
    ],
];

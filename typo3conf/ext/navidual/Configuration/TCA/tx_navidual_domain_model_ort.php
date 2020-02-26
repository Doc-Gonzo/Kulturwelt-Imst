<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:navidual/Resources/Private/Language/locallang_db.xlf:tx_navidual_domain_model_ort',
        'label' => 'ort_bezeichnung',
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
        'searchFields' => 'ort_bezeichnung,ort_beschreibung,ort_adresse,ort_gemeinde,ort_plz,ort_latitude,ort_longitude',
        'iconfile' => 'EXT:navidual/Resources/Public/Icons/tx_navidual_domain_model_ort.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden, ort_bezeichnung, ort_beschreibung, ort_adresse, ort_gemeinde, ort_plz, ort_latitude, ort_longitude',
    ],
    'types' => [
        '1' => ['showitem' => 'hidden, ort_bezeichnung, ort_beschreibung, ort_adresse, ort_gemeinde, ort_plz, ort_latitude, ort_longitude, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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

        'ort_bezeichnung' => [
            'exclude' => false,
            'label' => 'LLL:EXT:navidual/Resources/Private/Language/locallang_db.xlf:tx_navidual_domain_model_ort.ort_bezeichnung',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'ort_beschreibung' => [
            'exclude' => false,
            'label' => 'LLL:EXT:navidual/Resources/Private/Language/locallang_db.xlf:tx_navidual_domain_model_ort.ort_beschreibung',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'ort_adresse' => [
            'exclude' => false,
            'label' => 'LLL:EXT:navidual/Resources/Private/Language/locallang_db.xlf:tx_navidual_domain_model_ort.ort_adresse',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'ort_gemeinde' => [
            'exclude' => false,
            'label' => 'LLL:EXT:navidual/Resources/Private/Language/locallang_db.xlf:tx_navidual_domain_model_ort.ort_gemeinde',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'ort_plz' => [
            'exclude' => false,
            'label' => 'LLL:EXT:navidual/Resources/Private/Language/locallang_db.xlf:tx_navidual_domain_model_ort.ort_plz',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'ort_latitude' => [
            'exclude' => false,
            'label' => 'LLL:EXT:navidual/Resources/Private/Language/locallang_db.xlf:tx_navidual_domain_model_ort.ort_latitude',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'ort_longitude' => [
            'exclude' => false,
            'label' => 'LLL:EXT:navidual/Resources/Private/Language/locallang_db.xlf:tx_navidual_domain_model_ort.ort_longitude',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
    
    ],
];

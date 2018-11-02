<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'type' => 'office_type',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,contact_person,description',
        'iconfile' => 'EXT:pfprojects/Resources/Public/Icons/tx_pfprojects_domain_model_project.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, start_date, status, contact_person, telephone, email, office_type, organisationseinheit, office_manuell, images, description, files, links',
    ],
    'types' => [
        '1' => [
            'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, start_date,
            status, contact_person, telephone, email, office_type, organisationseinheit, office_manuell, images,
            description, files, links,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access, 
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access'
        ],
    ],
    'palettes' => [
        'access' => [
            'showitem' => 'starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
        ]
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_pfprojects_domain_model_project',
                'foreign_table_where' => 'AND tx_pfprojects_domain_model_project.pid=###CURRENT_PID### AND tx_pfprojects_domain_model_project.sys_language_uid IN (-1,0)',
                'default' => 0,
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => ''
            ]
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255
            ]
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:hidden.I.0'
                    ]
                ]
            ]
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ]
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'start_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.start_date',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'dbType' => 'date',
                'size' => 10,
                'eval' => 'date'
            ],
        ],
        'status' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.status',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'size' => 1,
                'items' => [
                    // I need the numbers in front, because of sorting
                    [
                        'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.status.1green',
                        '1green',
                        'EXT:pfprojects/Resources/Public/Icons/light_1green.png'
                    ],
                    [
                        'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.status.2yellow',
                        '2yellow',
                        'EXT:pfprojects/Resources/Public/Icons/light_2yellow.png'
                    ],
                    [
                        'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.status.3red',
                        '3red',
                        'EXT:pfprojects/Resources/Public/Icons/light_3red.png'
                    ],
                ],
            ],
        ],
        'contact_person' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.contact_person',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'telephone' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.telephone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'office_type' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.office_type',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
        'organisationseinheit' => [
            'displayCond' => 'FIELD:office_type:=:0',
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.organisationseinheit',
            'config' => \JWeiland\ServiceBw2\Utility\TCAUtility::getOrganisationseinheitenFieldTCAConfig(['maxitems' => 1])
        ],
        'office_manuell' => [
            'displayCond' => 'FIELD:office_type:=:1',
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.office_manuell',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'images' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.images',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'images',
                ['maxitems' => 5],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'softref' => 'rtehtmlarea_images,typolink_tag,images,email[subst],url',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
            ],
        ],
        'files' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.files',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'files',
                ['maxitems' => 5],
                '',
                'php,exe'
            ),
        ],
        'links' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.links',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_pfprojects_domain_model_link',
                'foreign_field' => 'project',
                'foreign_label' => 'title',
            ]
        ]
    ]
];

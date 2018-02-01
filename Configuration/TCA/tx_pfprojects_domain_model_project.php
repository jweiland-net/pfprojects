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
        'versioningWS' => 2,
        'versioning_followPages' => true,

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
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, start_date, status, contact_person, telephone, email, office_type, organisationseinheit, office_manuell, images, description, tx_maps2_uid, files, links',
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => [
                    ['LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages', -1],
                    ['LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.default_value', 0]
                ],
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_pfprojects_domain_model_project',
                'foreign_table_where' => 'AND tx_pfprojects_domain_model_project.pid=###CURRENT_PID### AND tx_pfprojects_domain_model_project.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],

        't3ver_label' => [
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ]
        ],

        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ],
        ],
        'starttime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ],
            ],
        ],
        'endtime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ],
            ],
        ],

        'title' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'start_date' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.start_date',
            'config' => [
                'type' => 'input',
                'dbType' => 'date',
                'size' => 10,
                'eval' => 'date'
            ],
        ],
        'status' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.status',
            'config' => [
                'type' => 'select',
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
            'exclude' => 1,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.contact_person',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'telephone' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.telephone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'email' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'office_type' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.office_type',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
        'organisationseinheit' => [
            'displayCond' => 'FIELD:office_type:=:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.organisationseinheit',
            'config' => \JWeiland\ServiceBw2\Utility\TCAUtility::getOrganisationseinheitenFieldTCAConfig(['maxitems' => 1])
        ],
        'office_manuell' => [
            'displayCond' => 'FIELD:office_type:=:1',
            'exclude' => 1,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.office_manuell',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'images' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.images',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'images',
                ['maxitems' => 5],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'description' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'wizards' => [
                    '_PADDING' => 2,
                    'RTE' => [
                        'notNewRecords' => 1,
                        'RTEonly' => 1,
                        'type' => 'script',
                        'title' => 'Full screen Rich Text Editing',
                        'icon' => 'wizard_rte2.gif',
                        'module' => [
                            'name' => 'wizard_rte',
                        ],
                    ],
                ],
            ],
        ],
        'tx_maps2_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.tx_maps2_uid',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_maps2_domain_model_poicollection',
                'prepend_tname' => false,
                'show_thumbs' => false,
                'size' => 1,
                'maxitems' => 1,
                'wizards' => [
                    'suggest' => [
                        'type' => 'suggest',
                        'default' => [
                            'searchWholePhrase' => true
                        ],
                    ],
                ],
            ],
        ],
        'files' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.files',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'files',
                ['maxitems' => 5],
                '',
                'php,exe'
            ),
        ],
        'links' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.links',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_pfprojects_domain_model_link',
                'foreign_field' => 'project',
                'foreign_label' => 'title',
            ],
        ],
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, start_date, status, contact_person, telephone, email, office_type, organisationseinheit, office_manuell, images, description;;;richtext:rte_transform[mode=ts_links], tx_maps2_uid, files, links, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'palettes' => [
        '1' => ['showitem' => ''],
    ],
];

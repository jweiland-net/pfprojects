<?php

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

return [
    'ctrl' => [
        'title' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
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
        'iconfile' => 'EXT:pfprojects/Resources/Public/Icons/tx_pfprojects_domain_model_project.svg',
    ],
    'types' => [
        '1' => [
            'showitem' => '--palette--;;language, --palette--;;titleHidden, path_segment,
            --palette--;LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:palette.contact;contact,
            --div--;LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tab.project,
            --palette--;LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:palette.projectData;projectData,
            office_manuell,
            area_of_activity, links,
            --div--;LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tab.media,
            images, files,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access',
        ],
    ],
    'palettes' => [
        'language' => ['showitem' => 'sys_language_uid, l10n_parent'],
        'titleHidden' => ['showitem' => 'title, hidden'],
        'contact' => ['showitem' => 'contact_person, --linebreak--, telephone, email'],
        'projectData' => ['showitem' => 'start_date, status, --linebreak--, description'],
        'access' => [
            'showitem' => 'starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
        ],
    ],
    'columns' => [
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'path_segment' => [
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.path_segment',
            'displayCond' => 'VERSION:IS:false',
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['title'],
                    // Do not add pageSlug, as we add pageSlug on our own in RouteEnhancer
                    'prefixParentPageSlug' => false,
                    'fieldSeparator' => '-',
                    'replacements' => [
                        '/' => '-',
                    ],
                ],
                'fallbackCharacter' => '-',
                'eval' => 'unique',
                'default' => '',
            ],
        ],
        'start_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.start_date',
            'config' => [
                'type' => 'datetime',
                'default' => 0,
                'dbType' => 'date',
                'size' => 10,
                'eval' => 'date',
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
                        'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.status.1green',
                        'value' => '1green',
                        'icon' => 'EXT:pfprojects/Resources/Public/Icons/light_1green.png',
                    ],
                    [
                        'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.status.2yellow',
                        'value' => '2yellow',
                        'icon' => 'EXT:pfprojects/Resources/Public/Icons/light_2yellow.png',
                    ],
                    [
                        'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.status.3red',
                        'value' => '3red',
                        'icon' => 'EXT:pfprojects/Resources/Public/Icons/light_3red.png',
                    ],
                ],
                'fieldWizard' => [
                    'selectIcons' => [
                        'disabled' => false,
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
                'eval' => 'trim',
            ],
        ],
        'telephone' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.telephone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'office_manuell' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.office',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'area_of_activity' => [
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.area_of_activity',
            'exclude' => true,
            'config' => [
                'type' => 'category',
            ],
        ],
        'images' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.images',
            'config' => [
                'type' => 'file',
                'maxitems' => 5,
                'allowed' => 'common-image-types',
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'softref' => 'typolink_tag,email[subst],url',
                'enableRichtext' => true,
            ],
        ],
        'files' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.files',
            'config' => [
                'type' => 'file',
                'maxitems' => 5,
                'allowed' => 'pdf',
            ],
        ],
        'links' => [
            'exclude' => true,
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.links',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_pfprojects_domain_model_link',
                'foreign_field' => 'project',
                'foreign_label' => 'title',
            ],
        ],
    ],
];

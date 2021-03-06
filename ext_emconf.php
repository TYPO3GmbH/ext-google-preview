<?php
/************************************************************************
 * Extension Manager/Repository config file for ext "google_preview".
 ************************************************************************/
$EM_CONF[$_EXTKEY] = array(
    'title' => 'Google Preview',
    'description' => 'Google Search Results Preview Wizard',
    'category' => 'extension',
    'constraints' => array(
        'depends' => array(
            'typo3' => '8.6.0-8.99.99',
            'pagepath' => '1.1.6-1.1.6'
        ),
        'conflicts' => array(),
    ),
    'autoload' => array(
        'psr-4' => array(
            'T3G\\AgencyPack\\GooglePreview\\' => 'Classes',
        ),
    ),
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Susanne Moog',
    'author_email' => 'susanne.moog@typo3.com',
    'author_company' => 'TYPO3 GmbH',
    'version' => '1.0.0',
);

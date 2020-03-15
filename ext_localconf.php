<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(
    function () {
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        $icons = [
            'googlesearchresultpreview-ok' => 'EXT:google_preview/Resources/Public/Icons/icon-ok.svg',
            'googlesearchresultpreview-warning' => 'EXT:google_preview/Resources/Public/Icons/icon-warning.svg',
        ];
        foreach ($icons as $iconIdentifier => $source) {
            $iconRegistry->registerIcon(
                $iconIdentifier, \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                ['source' => $source]
            );
        }
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1485861827] = [
            'nodeName' => 'GoogleSearchResultPreview',
            'priority' => 40,
            'class' => \T3G\AgencyPack\GooglePreview\FormEngine\GoogleSearchResultPreview::class,
        ];
    }
);
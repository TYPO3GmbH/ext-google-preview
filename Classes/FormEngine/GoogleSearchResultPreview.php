<?php

declare (strict_types=1);

namespace T3G\AgencyPack\GooglePreview\FormEngine;

use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;


class GoogleSearchResultPreview extends AbstractFormElement
{

    /**
     * Renders the Apparel Calculation Table
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    public function render()
    {
        $resultArray = $this->initializeResultArray();

        $iconFactory = GeneralUtility::makeInstance(IconFactory::class);

        $titleIcon = 'ok';
        $descriptionIcon = 'ok';

        $croppedTitle = GeneralUtility::fixed_lgd_cs($this->data['databaseRow']['title'], 60);
        if ($croppedTitle !== $this->data['databaseRow']['title']) {
            $titleIcon = 'warning';
        }
        $croppedDescription = GeneralUtility::fixed_lgd_cs($this->data['databaseRow']['description'], 156);
        if ($croppedDescription !== $this->data['databaseRow']['description']) {
            $descriptionIcon = 'warning';
        }
        $googleMarkup = '
        <div style="background: white;border: 1px solid #ddd;padding: 5px; width: 600px; margin-top: 10px;">
            <table border="0">
                <tr>
                    <td style="font-family: Arial, sans-serif; color:#1a0dab; font-size: 18px">' .
                        $croppedTitle .
                        '</td>
                    <td style="padding-left: 5px;">' .
                        $iconFactory->getIcon('googlesearchresultpreview-' . $titleIcon, Icon::SIZE_SMALL) .
                        '</td>
                </tr>
                <tr>
                    <td colspan="2" style="border-top: 1px solid #ddd;border-bottom: 1px solid #ddd;color: #006621; font-size: 14px">' .
                        \tx_pagepath_api::getPagePath($this->data['databaseRow']['uid']) .
                        '</td>
                </tr>
                <tr>
                    <td style="font-family: Arial, sans-serif;font-size: 13px">' .
                        $croppedDescription .
                        '</td>
                    <td style="padding-left: 5px;">' .
                        $iconFactory->getIcon('googlesearchresultpreview-' . $descriptionIcon, Icon::SIZE_SMALL) .
                        '</td>
                </tr>
            </table>
        </div>
        ';

        $resultArray['html'] = $googleMarkup;

        return $resultArray;
    }
}
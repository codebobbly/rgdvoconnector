<?php

<<<<<<< HEAD
namespace RGU\Dvoconnector\Utility;
=======
namespace RG\Rgdvoconnector\Utility;
>>>>>>> parent of 8432775... Change Namespace

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * TemplateLayout utility class
 */
class TemplateLayout implements SingletonInterface
{

    /**
     * Get available template layouts for a certain page
     *
     * @param int $pageUid
     * @return array
     */
    public function getAvailableTemplateLayouts($pageUid)
    {
        $templateLayouts = [];

        // Check if the layouts are extended by ext_tables
        if (isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['Dvoconnector']['templateLayouts'])
            && is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['Dvoconnector']['templateLayouts'])
        ) {
            $templateLayouts = $GLOBALS['TYPO3_CONF_VARS']['EXT']['Dvoconnector']['templateLayouts'];
        }

        // Add TsConfig values
        foreach ($this->getTemplateLayoutsFromTsConfig($pageUid) as $templateKey => $title) {
            if (GeneralUtility::isFirstPartOfStr($title, '--div--')) {
                $optGroupParts = GeneralUtility::trimExplode(',', $title, true, 2);
                $title = $optGroupParts[1];
                $templateKey = $optGroupParts[0];
            }
            $templateLayouts[] = [$title, $templateKey];
        }

        return $templateLayouts;
    }

    /**
     * Get template layouts defined in TsConfig
     *
     * @param $pageUid
     * @return array
     */
    protected function getTemplateLayoutsFromTsConfig($pageUid)
    {
        $templateLayouts = [];
        $pagesTsConfig = BackendUtility::getPagesTSconfig($pageUid);
        if (isset($pagesTsConfig['tx_Dvoconnector.']['templateLayouts.']) && is_array($pagesTsConfig['tx_Dvoconnector.']['templateLayouts.'])) {
            $templateLayouts = $pagesTsConfig['tx_Dvoconnector.']['templateLayouts.'];
        }
        return $templateLayouts;
    }
}

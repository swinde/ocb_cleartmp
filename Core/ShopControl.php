<?php

namespace OxCom\OcbClearTmp\Core;

/**
 * Class ShopControl
 *
 * @package OxCom\OcbClearTmp\Core
 */
class ShopControl extends ShopControl_parent
{
    protected function _runOnce()
    {
        $oConf     = \OxidEsales\Eshop\Core\Registry::getConfig();
        $blDevMode = $oConf->getShopConfVar('blDevMode', null, 'module:ocb_cleartmp');
        
        
        if ($blDevMode && !$oConf->isProductiveMode()) {
            $sTmpDir = realpath($oConf->getShopConfVar('sCompileDir'));
            $aFiles = glob($sTmpDir.'{/smarty/,/ocb_cache/,/}*{.php,.txt,.json}', GLOB_BRACE);
            if (count($aFiles) > 0) {
                foreach ($aFiles as $file) {
                    @unlink($file);
                }
            }
        }
        parent::_runOnce();
    }
}

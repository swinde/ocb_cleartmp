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
        $config     = \OxidEsales\Eshop\Core\Registry::getConfig();
        $ocbcleartmpDevMode = $config->getShopConfVar('ocbcleartmpDevMode', null, 'module:ocb_cleartmp');

        if ($ocbcleartmpDevMode && !$config->isProductiveMode()) {
            $tmpDirectory = realpath($config->getShopConfVar('sCompileDir'));
            $fles = glob($tmpDirectory.'{/smarty/,/ocb_cache/,/}*{.php,.txt,.json}', GLOB_BRACE);
            if (count($fles) > 0) {
                foreach ($fles as $file) {
                    @unlink($file);
                }
            }
        }
        parent::_runOnce();
    }
}

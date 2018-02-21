<?php
/**
 * @package   ocb_cleartmp
 * @category  OXID Module
 * @license   GNU License http://opensource.org/licenses/GNU
 * @author    Joscha Krug <krug@marmalade.de> / OXID Community
 * @link      https://github.com/OXIDprojects/ocb_cleartmp
 * @see       https://github.com/OXIDCookbook/ocb_cleartmp
 */

namespace OxidCommunity\OcbClearTmp\Core;

/**
 * Class ShopControl
 *
 * @package OxidCommunity\OcbClearTmp\Core
 */
class ShopControl extends ShopControl_parent
{

    protected function _runOnce()
    {
        $config = \OxidEsales\Eshop\Core\Registry::getConfig();
        $ocbcleartmpDevMode = $config->getShopConfVar('ocbcleartmpDevMode', \OxidEsales\Eshop\Core\Registry::getConfig()->getShopId(), 'module:ocb_cleartmp');

        if ($ocbcleartmpDevMode && !$config->isProductiveMode()) {
            \OxidEsales\Eshop\Core\Registry::getUtils()->resetLanguageCache();
            $tmpDirectory = realpath($config->getShopConfVar('sCompileDir'));
            $aFiles = glob($tmpDirectory . '/smarty/*.php');
            $aFiles = array_merge($aFiles, glob($tmpDirectory . '/ocb_cache/*.json'));
            $aFiles = array_merge($aFiles, glob($tmpDirectory . '/*.txt'));
            $aFiles = array_merge($aFiles, glob($tmpDirectory . '/*.php'));
            if (count($aFiles) > 0) {
                foreach ($aFiles as $file) {
                    @unlink($file);
                }
            }
        }
        parent::_runOnce();
    }
}

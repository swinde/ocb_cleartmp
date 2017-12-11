[{$smarty.block.parent}]
<li class="sep">
    <form method="post" id="formSubmit" action="[{$oViewConf->getSelfLink()}]" id="cleartmp">
        <div>
            <input type="hidden" name="cl" value="navigation" />
            <input type="hidden" name="item" value="header.tpl" />
            <input type="hidden" name="fnc" value="cleartmp" />
            <input type="hidden" name="editlanguage" value="[{ $editlanguage }]" />
            [{$oViewConf->getHiddenSid()}]
        </div>
        <span class="rc"><label for="clearOption">[{ oxmultilang ident="OCB_CLEARTMP_LABEL" }]</label></span>
        <select name="clearoption" id="clearOption" onchange="document.getElementById('formSubmit').submit();">
            <option value="none">[{ oxmultilang ident="OCB_CLEARTMP_PLEASECHOOSE" }]</option>
            <option value="smarty">[{ oxmultilang ident="OCB_CLEARTMP_SMARTY" }]</option>
            <option value="staticcache">[{ oxmultilang ident="OCB_CLEARTMP_STATICCACHE" }]</option>
            <option value="language">[{ oxmultilang ident="OCB_CLEARTMP_LANGUAGE" }]</option>
            <option value="database">[{ oxmultilang ident="OCB_CLEARTMP_DATABASE" }]</option>
            <option value="seo">[{ oxmultilang ident="OCB_CLEARTMP_SEO" }]</option>
            <option value="complete">[{ oxmultilang ident="OCB_CLEARTMP_COMPLETE" }]</option>
            [{if $oView->isEEVersion()}]
            <option value="content">[{ oxmultilang ident="OCB_CLEARTMP_CONTENT" }]</option>
            [{/if}]
            [{if $oView->isPictureCache()}]
            <option value="picture">[{ oxmultilang ident="OCB_CLEARTMP_PICTURE" }]</option>
            [{/if}]
            [{if $oView->isDevMode()}]
            <option value="allMods">[{ oxmultilang ident="OCB_CLEARTMP_MODULES" }]</option>
            [{/if}]
        </select>
        <input type="checkbox" onchange="document.getElementById('formSubmit').submit();" value="1" [{if $prodmode}]disabled="disabled"[{/if}] id="devmode" name="devmode" [{if $oView->isDevMode()}]checked="checked"[{/if}] />
        <label for="devmode" class="rc[{if $prodmode}] disabled[{/if}]">[{ oxmultilang ident="OCB_CLEARTMP_DEVMODE" }]</label>
    </form>
</li>
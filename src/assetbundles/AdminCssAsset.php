<?php
/**
 * AdminCSS plugin for Craft CMS 3.x
 * 
 * Adds a stylesheet with colors for Neo Blocks
 * 
 * @link    https://www.imarc.com
 * @copyright Copyright (c) 2022 Tim Spears and Linnea Hartsuyker
 */

 namespace imarc\admincss\assetbundles;

 use Craft;
 use craft\web\AssetBundle;
 use craft\web\assets\cp\CpAsset;

 class AdminCssAsset extends AssetBundle
 {
    public function init() 
    {

        $this->sourcePath = "@imarc/admincss/assetbundles/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->css = [
            'css/AdminCss.css'
        ];

        parent::init();
    }
 }

<?php
/**
 * AdminCSS plugin for Craft CMS 3.x
 * 
 * Adds a stylesheet with colors for Neo Blocks
 * 
 * @link    https://www.imarc.com
 * @copyright Copyright (c) 2022 Tim Spears and Linnea Hartsuyker
 */

 namespace imarc\admincss;

 use imarc\admincss\assetbundles\AdminCssAsset;

 use Craft;
 use craft\base\Plugin;
 use craft\web\View;
 use craft\events\TemplateEvent;

 use yii\base\Event;

 class AdminCss extends Plugin
 {
    // Static Properties
    // =========================================================================

    /**
     * Static property that is an instance of this plugin class so that it can be accessed via
     * AdminCss::$plugin
     *
     * @var AdminCss
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * To execute your plugin’s migrations, you’ll need to increase its schema version.
     *
     * @var string
     */
    public $schemaVersion = '1.0.0';

    public function init()
    {
        parent::init();
        self::$plugin = $this;

         // If not control panel request, bail
         if (!Craft::$app->getRequest()->getIsCpRequest()) {
            return;
        }

        // Load CSS before page template is rendered
        Event::on(
            View::class,
            View::EVENT_BEFORE_RENDER_PAGE_TEMPLATE,
            function (TemplateEvent $event) {

                // Get view
                $view = Craft::$app->getView();

                // Load CSS file
                $view->registerAssetBundle(AdminCssAsset::class);

            }
        );

        Craft::info(
            Craft::t(
                'admincss',
                'AdminCss plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );

    }

 }

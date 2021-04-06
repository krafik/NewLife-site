<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'css/header_main.css',
        'css/advantage.css',
        'css/catalog.css',
        'css/partners.css',
        'css/collections.css',
        'css/contacts.css',
        'css/footer.css',
        'css/interface.css',
        'css/site.css',


    ];
    public $js = [
        'js/jquery.inputmask.min.js',
        'js/jquery.migrate.js',
        'js/slick.js',
        'js/ajaxcatalog.js',
        'js/fixedNav.js',
        'js/reqForm.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapPluginAsset',
    ];
}

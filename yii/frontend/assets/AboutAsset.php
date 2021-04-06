<?php
/**
 * Created by PhpStorm.
 * User: alexe
 * Date: 04.05.2020
 * Time: 12:32
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class AboutAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'css/about.css',
        'css/header_main.css',
        'css/interface.css',
        'css/products.css',
        'css/footer.css',
    ];

    public $js = [
//        'js/jquery.migrate.js',
//        'js/slick.js',
//        'js/ajaxcatalog.js',
        'js/fixedNav.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
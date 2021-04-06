<?php
namespace frontend\assets;


use yii\web\AssetBundle;

class MainAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'css/header_main.css',
        'css/interface.css',
        'css/partners.css',
        'css/productsv2.css',
        'css/footer.css',
        'css/style.css',
        'css/onegoodv2.css',
        'css/site.css'
    ];

    public $js = [
        'js/jquery.inputmask.min.js',
        'js/jquery.migrate.js',
        'js/slick.js',
        'js/ajaxcatalog.js',
       'js/fixedNav.js',
       'js/reqForm.js',
//       'js/main.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
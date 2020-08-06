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
        'fonts/font-awesome.min.css',
        'fonts/fontawesome5-overrides.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css',
        'css/navbar.css',
        'css/styles.css',
    ];
    public $js = [
        'js/bs-init.js',
        'https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js',
        'js/navbar.js',
        'js/scripts.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}
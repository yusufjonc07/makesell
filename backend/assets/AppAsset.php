<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        [
            'href' => "/static/brand.png",
            'rel' => 'icon',
            'sizes' => '60x32',
            'style' => 'object-fit:contain;'
        ],
        [
            'href' => 'manifest.json',
            'rel' => 'manifest',
        ],
        'css/site.css',
        'css/bootstrap.min.css',
    ];
    public $js = [
        'js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}

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
        'css/vendor.css',
        'css/site.css',
        [
            'href'=>'https://fonts.googleapis.com',
            'rel'=>'preconnect',
        ],
        [
            'href'=>'https://fonts.gstatic.com',
            'rel'=>'preconnect',
        ],
        [
            'href'=>'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,900;1,900&family=Source+Sans+Pro:wght@400;600;700;900&display=swap',
            'rel'=>'stylesheet',
        ],
    ];
    public $js = [
        'js/plugins.js',
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}

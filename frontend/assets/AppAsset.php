<?php

namespace frontend\assets;

use common\assets\AbstractAsset;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AbstractAsset
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'js/sar/sarSubmit.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

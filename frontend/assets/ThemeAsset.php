<?php
/**
 * Created by PhpStorm.
 * User: TOSHIBA-PC
 * Date: 16.05.2018
 * Time: 22:57
 */

namespace frontend\assets;


use common\assets\AbstractAsset;

class ThemeAsset extends AbstractAsset
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/spacelab/css/main.css',
        'theme/spacelab/css/custom.min.css',
        'min/all.min.css',
    ];
    public $js = [
        'theme/spacelab/js/custom.js',
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}

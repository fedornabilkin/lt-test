<?php
/**
 * Created by PhpStorm.
 * User: TOSHIBA-PC
 * Date: 02.05.2018
 * Time: 11:12
 */

namespace frontend\assets;


use common\assets\AbstractAsset;

class SarAsset extends AbstractAsset
{
    public $sourcePath = '@bower';
    public $css = [];
    public $js = [
        'simple-ajax-requests/dist/sar.js',
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}
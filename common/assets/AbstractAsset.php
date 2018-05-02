<?php
/**
 * Created by PhpStorm.
 * User: TOSHIBA-PC
 * Date: 01.05.2018
 * Time: 23:44
 */

namespace common\assets;


use yii\web\AssetBundle;

abstract class AbstractAsset extends AssetBundle
{
    // всегда публиковать актуальные версии в режиме DEV
    public $publishOptions = [
        'forceCopy' => YII_ENV_DEV ? true : false,
    ];
}
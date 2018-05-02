<?php
/**
 * Created by PhpStorm.
 * User: TOSHIBA-PC
 * Date: 01.05.2018
 * Time: 23:39
 */

namespace common\widgets;


use yii\base\Widget;

abstract class AbstractWidget extends Widget
{
    public function init() {
        parent::init();
        $this->registerAssets();
    }

    abstract function registerAssets();
}
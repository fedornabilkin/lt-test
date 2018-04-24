<?php
/**
 * Created by PhpStorm.
 * User: TOSHIBA-PC
 * Date: 15.04.2018
 * Time: 23:03
 */

namespace common\traits;


trait BaseModelTrait
{
    /**
     * @return int
     */
    public static function getUserId()
    {
        return \Yii::$app->user->identity->id;
    }
}
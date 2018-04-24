<?php
/**
 * Created by PhpStorm.
 * User: TOSHIBA-PC
 * Date: 15.04.2018
 * Time: 17:05
 */

namespace common\controllers;


use dektrium\user\models\User;
use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class BaseWebController extends Controller
{
    protected function _getUser(){
        $user = User::findOne(Yii::$app->user->identity->id);
        return $user;
    }

    /**
     * @param $id
     * @param $class
     * @return mixed
     * @throws NotFoundHttpException
     */
    protected function _findCustomModel($id, $class)
    {
        if (($model = $class::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findModelAlias($alias, $class)
    {
        if (($model = $class::getModelByAlias($alias, $class)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function checkUserByCustomer($model)
    {
        if (!is_object($model->user) or $model->user->id != Yii::$app->user->identity->id) {
            throw new ForbiddenHttpException(Yii::t('app', 'Access to this page is restricted.'));
        }

        return true;
    }
}
<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $model common\models\Vacancy
 * @var $form yii\widgets\ActiveForm
 */

$customers = ArrayHelper::map($model::getCustomersByUser(),'id','title');
?>

<div class="vacancy-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-xs-12 col-sm-8">
            <?= \fedornabilkin\binds\widgets\status\StatusWidget::widget(['model' => $model])?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'phones')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'customer_id')->dropDownList($customers) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'age_min')->textInput() ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'age_max')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'salary_min')->textInput() ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'salary_max')->textInput() ?>
                </div>
            </div>

            <hr>
            <?= \fedornabilkin\binds\widgets\seo\SeoWidget::widget(['model' => $model])?>

            <br>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <?= \fedornabilkin\binds\widgets\binds\BindsWidget::widget(['model' => $model])?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

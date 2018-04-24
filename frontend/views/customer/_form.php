<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-xs-12 col-sm-8">
            <?= \fedornabilkin\binds\widgets\status\StatusWidget::widget(['model' => $model])?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'phones')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>
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

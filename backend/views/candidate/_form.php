<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Candidate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="candidate-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'iname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'oname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?php
            $model->birthday = date('d-m-Y', $model->birthday);
            echo $form->field($model, 'birthday')->widget(DateTimePicker::class,[
                'name' => 'Candidate[birthday]',
                'type' => DateTimePicker::TYPE_INPUT,
                'options' => [
                    'placeholder' => Yii::t('app', 'Birthday'),
                ],
                'convertFormat' => true,
//        'value'=> date('d-m-Y', $model->birthday),
                'pluginOptions' => [
                    'format' => 'dd-MM-yyyy',
                    'autoclose' => true,
                    'weekStart' => 1,
                    'startView' => 'decade',
                    'minView' => 'month',
                    'endDate' => date('d-m-Y', mktime(0,0,0, date('m'), date('d'), date('Y')-16)),
                    'startDate' => date('d-m-Y', mktime(0,0,0, date('m'), date('d'), date('Y')-70)),
                ]
            ]); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

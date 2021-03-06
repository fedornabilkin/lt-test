<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\VacancySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'customer') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'age_min') ?>

    <?php // echo $form->field($model, 'age_max') ?>

    <?php // echo $form->field($model, 'phones') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'salary_min') ?>

    <?php // echo $form->field($model, 'salary_max') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

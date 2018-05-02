<?php
/**
 * Created by PhpStorm.
 * User: TOSHIBA-PC
 * Date: 02.05.2018
 * Time: 2:43
 *
 * @var $this yii\web\View
 *
 */

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<?php
$model = new \common\models\Candidate();
$form = ActiveForm::begin([
    'action' => Url::to(['/site/candidate']),
    'options' => [
        'data-request' => 'ajax',
    ],
]);

?>

<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'fname')->textInput()?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'iname')->textInput()?>
    </div>
    <div class="clearfix"></div>
    <div class="col-sm-6">
        <?= $form->field($model, 'oname')->textInput()?>
    </div>
    <div class="col-sm-6">
        <?php
        echo $form->field($model, 'birthday')->widget(DateTimePicker::class,[
            'name' => 'Candidate[birthday]',
            'type' => DateTimePicker::TYPE_INPUT,
            'options' => [
                'placeholder' => Yii::t('app', 'Birthday'),
            ],
            'convertFormat' => true,
            'value'=> date('d-m-Y', mktime(0,0,0, date('m'), date('d'), date('Y')-20)),
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
    <div class="col-sm-6">
        <?= $form->field($model, 'email')->input('email')?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'phone')->textInput()?>
    </div>
</div>

<?=Html::submitButton(Yii::t('app', 'Submit'), [
    'class' => 'btn btn-success',
    'type' => '',
])?>

<?php
echo Html::activeHiddenInput($model, 'uid_content');
ActiveForm::end();
?>
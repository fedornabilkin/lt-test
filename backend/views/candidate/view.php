<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Candidate */

$this->title = $model->fname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Candidates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="candidate-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fname',
            'iname',
            'oname',
            'email:email',
            'phone',
            [
                'label' => Yii::t('app', 'Birthday'),
                'value' => function($data){
                    return date('d.m.y', $data->birthday);
                }
            ],
        ],
    ]) ?>

</div>

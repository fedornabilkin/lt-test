<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CandidateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Candidates');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="candidate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        //echo Html::a(Yii::t('app', 'Create Candidate'), ['create'], ['class' => 'btn btn-success']);
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
            ],
            [
                'attribute' => 'fname',
                'value' => function($data){
                    return $data->fname . ' ' . $data->iname . ' ' . $data->oname;
                }
            ],
            'email:email',
            'phone',
            [
                'label' => Yii::t('app', 'Birthday'),
                'value' => function($data){
                    return date('d.m.y', $data->birthday);
                }
            ],
            [
                'label' => Yii::t('app', 'Created At'),
                'value' => function($data){
                    return date('d.m.y', $data->createTime);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

<?php

use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

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
            'title',
            'phones',
            'address:ntext',
            'email:email',
            'status',
            [
                'label' => Yii::t('app', 'Created At'),
                'value' => function($data){
                    return date('d.m.y', $data->createTime);
                }
            ],
            [
                'label' => Yii::t('app', 'Updated At'),
                'value' => function($data){
                    return date('d.m.y', $data->updateTime);
                }
            ],
        ],
    ]) ?>



    <h2><?=Yii::t('app', 'Vacancies')?></h2>
    <p>
        <?= Html::a(
            Yii::t('app', 'Create Vacancy'),
            Url::to(['vacancy/create', 'customer' => $model->id]),
            ['class' => 'btn btn-success']
        ) ?>
    </p>
    <?php

    $dataProvider = new ArrayDataProvider([
        'key' => 'id',
        'allModels' => $model->vacancies,
        'sort' => [
            'attributes' => ['id'],
            'defaultOrder' => [
                'id' => SORT_DESC,
            ],
        ],
        'pagination' => [
            'pageSize' => 100,
        ],
    ]);

    echo GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-pencil"></span>',
                            Url::to(['/vacancy/update', 'id' => $model->id])
                        );
                    }
                ],
            ],
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function($data){
                    $url = Url::to(['/vacancy/view', 'alias' => $data->seo->alias]);
                    return Html::a($data->title, $url);
                }
            ],
            [
                'label' => Yii::t('app', 'Created At'),
                'value' => function($data){
                    return date('d.m.y', $data->createTime);
                }
            ],
            [
                'label' => Yii::t('app', 'Updated At'),
                'value' => function($data){
                    return date('d.m.y', $data->updateTime);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
            ],
        ],
    ]); ?>

</div>

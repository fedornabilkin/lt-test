<?php

use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/*
 * @var $this yii\web\View
 * @var $model common\models\Vacancy
 * @var $candidates \common\models\Candidate
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vacancies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-view">

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
            [
                'label' => Yii::t('app', 'Customer'),
                'format' => 'raw',
                'value' => function ($data){
                    $url = Url::to(['/customer/view', 'alias' => $data->customer->seo->alias]);
                    return Html::a($data->customer->title, $url);
                }
            ],
            'title',
            'content:ntext',
            'age_min',
            'age_max',
            'phones',
            'address:ntext',
            'salary_min',
            'salary_max',
        ],
    ]) ?>

    <?php

    $dataProvider = new ArrayDataProvider([
        'key' => 'id',
        'allModels' => $model->candidates,
        'sort' => [
            'attributes' => ['id'],
            'defaultOrder' => [
                'id' => SORT_DESC,
            ],
        ],
        'pagination' => [
            'pageSize' => 25,
        ],
    ]);

    echo GridView::widget([
        'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],


//            [
//                'class' => 'yii\grid\ActionColumn',
//                'template' => '{update}',
//                'buttons' => [
//                    'update' => function ($url, $model) {
//                        return Html::a(
//                            '<span class="glyphicon glyphicon-eye-open"></span>',
//                            Url::to(['/candidate/view', 'id' => $model->id])
//                        );
//                    }
//                ],
//            ],
            [
                'label' => Yii::t('app', 'FIO'),
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
//            [
//                'class' => 'yii\grid\ActionColumn',
//                'template' => '{delete}',
//            ],
        ],
    ]);

    ?>

</div>

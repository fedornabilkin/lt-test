<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $searchModel common\models\VacancySearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = Yii::t('app', 'Vacancies');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function($data){
                    $url = Url::to(['/vacancy/view', 'alias' => $data->seo->alias]);
                    return Html::a($data->title, $url);
                }
            ],
            [
                'attribute' => 'content',
                'label' => Yii::t('app', 'Description'),
                'value' => 'content'
            ],
            'address',
//            [
//                'attribute' => 'content',
//                'label' => Yii::t('app', 'Address'),
//                'value' => function($data){
//                    return $data->customer->address;
//                }
//            ],
            [
                'label' => Yii::t('app', 'Updated At'),
                'value' => function($data){
                    return date('d.m.y', $data->updateTime);
                }
            ],
        ],
    ]); ?>
</div>

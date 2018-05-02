<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $searchModel common\models\VacancySearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = Yii::t('app', 'Vacancies');
//$this->params['breadcrumbs'][] = $this->title;

$modalWidget = \frontend\widgets\modal\Widget::begin([
    'title' => Yii::t('app', 'To leave bid'),
    'body' => $this->render('@frontend/views/forms/candidate'),
]);
$modalId = $modalWidget->getId();
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
            [
                'label' => Yii::t('app', 'Action'),
                'format' => 'raw',
                'value' => function($data) use ($modalId){
                    $button = Html::button(Yii::t('app', 'Sign up'), [
                        'class' => 'btn btn-primary',
                        'data-toggle' => 'modal',
                        'data-target' => '#' . $modalId,
                        'data-vacancy_uid' => $data->uid,
                    ]);
                    return $button;
                }
            ],
        ],
    ]); ?>
</div>

<?php
$this->registerJs("$('#".$modalId."').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var vacancy = button.data('vacancy_uid');
        var modal = $(this);
        modal.find('.modal-body #candidate-uid_content').attr({'value':vacancy});
        modal.find('.response').remove();
    })");
?>


<?php $modalWidget::end() ?>
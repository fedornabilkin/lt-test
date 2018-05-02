<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Candidate */

$this->title = Yii::t('app', 'Update: {nameAttribute}', [
    'nameAttribute' => $model->fname,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Candidates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="candidate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

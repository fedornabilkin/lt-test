<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Candidate */

$this->title = Yii::t('app', 'Create Candidate');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Candidates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="candidate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

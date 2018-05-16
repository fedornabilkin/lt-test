<?php
/**
 * Created by PhpStorm.
 * User: TOSHIBA-PC
 * Date: 15.04.2018
 * Time: 14:40
 */

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-main navbar navbar-inverse',
    ],
]);
$menuItems = [
    ['label' => 'Home', 'url' => ['/']],
    ['label' => Yii::t('app', 'Customers'), 'url' => Url::to(['/customer/index'])],
//    ['label' => 'About', 'url' => ['/site/about']],
//    ['label' => 'Contact', 'url' => ['/site/contact']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/user/register']];
    $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/user/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/user/logout'], 'post')
        . Html::submitButton(
            Yii::t('app', 'Logout') . ' (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
?>
<?php

/**
 * User: TheCodeholic
 * Date: 4/17/2020
 * Time: 9:20 AM
 */

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar-expand-md navbar-light bg-light shadow-sm'],
    'innerContainerOptions' => [
        'class' => 'container-fluid'
    ]
]);

if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Sign Up', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = [
        'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
        'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'post'
        ]
    ];
}
?>
<form action="<?php echo Url::to(['/video/search']) ?>" class="form-inline my-2 my-lg-0 d-flex">
    <input class="form-control mr-sm-2" type="search" 
    placeholder="Search" name="keyword" 
    value="<?php echo Yii::$app->request->get('keyword') ?>">
    <button class="btn btn-outline-success my-2 my-sm-0 mx  -2">Search</button>
</form>

<?php
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => $menuItems,
]);
NavBar::end();

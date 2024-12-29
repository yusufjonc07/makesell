<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

   <?= $this->render('_list', compact('dataProvider', 'searchModel')) ?>

</div>

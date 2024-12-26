<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Stock $model */

$this->title = Yii::t('app', 'Create Stock');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

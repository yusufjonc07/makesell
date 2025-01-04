<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Supply $model */

$this->title = Yii::t('app', 'Create Supply');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Supplies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supply-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

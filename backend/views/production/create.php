<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Production $model */

$this->title = Yii::t('app', 'Create Production');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

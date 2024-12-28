<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Ingredient $model */

$this->title = Yii::t('app', 'Create Ingredient');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingredients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Supply $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="supply-form">

    <?php $form = ActiveForm::begin(['action'=>'/supply/create']); ?>

    <?= Html::activeHiddenInput($model, 'product_id') ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <div class="form-group mt-2">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

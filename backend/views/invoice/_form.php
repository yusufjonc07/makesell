<?php

use common\widgets\AddressAutocomplete;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Invoice $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="invoice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::activeLabel($model, 'total_value') ?>
    <div class="input-group">
        <?= Html::activeInput('number', $model, 'total_value', ['class' => 'form-control']) ?>
        <div class="input-group-text">
            <?= Yii::$app->params['currency'] ?>
        </div>
    </div>
    <?= $form->field($model, 'address')->widget(AddressAutocomplete::class, [
        'apiKey' => '211e808f91284a558dd0e5c775f7dc62', // Replace with your Geoapify API key
        'placeholder' => 'Start typing your address...',
    ]); ?>
    <?= $form->field($model, 'comment')->textarea(['maxlength' => true]) ?>

    <div class="form-group mt-2">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
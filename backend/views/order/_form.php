<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Order $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(['action'=>'/order/create']); ?>

    <?= Html::activeHiddenInput($model, 'product_id') ?>

    <div class="input-group">
        <button type="button" class="btn btn-secondary decrease-button">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <?= Html::activeInput('number', $model, 'qty', ['class' => 'form-control text-center px-1']) ?>
       
        <button type="button" class="btn btn-secondary increase-button">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    <?= Html::activeHiddenInput($model, 'price') ?>

    <?= Html::activeHiddenInput($model, 'customer_id') ?>

    <div class="form-group mt-2 d-flex justify-content-between gap-2">
        <?= Html::submitButton(Yii::t('app', 'Sell now'), ['class' => 'btn btn-success w-100']) ?>
        <?= Html::submitButton(Yii::t('app', 'Pre-order'), ['class' => 'btn btn-warning w-100']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
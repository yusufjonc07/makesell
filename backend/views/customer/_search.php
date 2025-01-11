<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\CustomerSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id')->textInput(['placeholder' => Yii::t('app', 'Enter ID')]) ?>

    <?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('app', 'Enter Name')]) ?>

    <?= $form->field($model, 'email')->textInput(['placeholder' => Yii::t('app', 'Enter Email')]) ?>

    <?= $form->field($model, 'phone')->textInput(['placeholder' => Yii::t('app', 'Enter Phone')]) ?>

    <?= $form->field($model, 'balance')->textInput(['placeholder' => Yii::t('app', 'Enter Balance')]) ?>

    <div class="form-group mt-2">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Reset'), ['index'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

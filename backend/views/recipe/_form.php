<?php

use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Recipe $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recipe-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); 
    
    ?>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <div class="panel panel-default card mt-3">
        <div class="panel-heading card-header">
            <h4 class="lead">Ingredients</h4>
        </div>

        <div class="panel-body card-body">
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $ingredientModels[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'full_name',
                    'address_line1',
                    'address_line2',
                    'city',
                    'state',
                    'postal_code',
                ],
            ]); ?>

            <div class="container-items row"><!-- widgetContainer -->
                <?php foreach ($ingredientModels as $i => $modelIngredient): ?>
                    <div class="item panel panel-default col-lg-3"><!-- widgetBody -->
                        <div class="panel-heading">
                            <h4 class="panel-title pull-left">Ingredient</h4>
                            <div class="pull-right">

                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                            // necessary for update action.
                            if (!$modelIngredient->isNewRecord) {
                                echo Html::activeHiddenInput($modelIngredient, "[{$i}]id");
                            }
                            ?>
                            <?= $form->field($modelIngredient, "[{$i}]product_id")->dropDownList(ArrayHelper::map($product_list, 'id', function($model){
                                return "$model->name ( $model->measurement )";
                            })) ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelIngredient, "[{$i}]qty")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-6 d-flex align-items-end">
                                    <div class="d-flex justify-content-between w-100 gap-2">
                                    <button type="button" class="add-item btn btn-success w-100">+</button>
                                    <button type="button" class="remove-item btn btn-danger w-100">-</button>
                                    </div>
                                </div>

                            </div><!-- .row -->

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group mt-2">
        <?= Html::submitButton($modelIngredient->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
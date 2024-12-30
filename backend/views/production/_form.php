<?php

use backend\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Production $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="production-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header lead">
                    Production details
                </div>
                <div class="card-body">
                    <?= Html::activeLabel($model, 'product_id') ?>
                    <div class="input-group">
                        <?= Html::activeDropDownList($model, 'product_id', ArrayHelper::map(Product::find()->all(), 'id', 'name'), ['class' => 'form-select']) ?>
                        <a href="<?= Url::toRoute(["/product/create", "redirect_to_production" => true]) ?>"
                            class="btn btn-secondary">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 10.5V6.8C20 5.11984 20 4.27976 19.673 3.63803C19.3854 3.07354 18.9265 2.6146 18.362 2.32698C17.7202 2 16.8802 2 15.2 2H8.8C7.11984 2 6.27976 2 5.63803 2.32698C5.07354 2.6146 4.6146 3.07354 4.32698 3.63803C4 4.27976 4 5.11984 4 6.8V17.2C4 18.8802 4 19.7202 4.32698 20.362C4.6146 20.9265 5.07354 21.3854 5.63803 21.673C6.27976 22 7.11984 22 8.8 22H12M14 11H8M10 15H8M16 7H8M18 21V15M15 18H21"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    <label class="control-label" for="production-product_id">Recipe</label>
                    <div class="input-group">
                        <?= Html::activeDropDownList($model, 'recipe_id', [], ['class' => 'form-select']) ?>

                        <a href="<?= Url::to(["/recipe/create", "redirect_to_production" => true], ) ?>"
                            class="btn btn-secondary">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 10.5V6.8C20 5.11984 20 4.27976 19.673 3.63803C19.3854 3.07354 18.9265 2.6146 18.362 2.32698C17.7202 2 16.8802 2 15.2 2H8.8C7.11984 2 6.27976 2 5.63803 2.32698C5.07354 2.6146 4.6146 3.07354 4.32698 3.63803C4 4.27976 4 5.11984 4 6.8V17.2C4 18.8802 4 19.7202 4.32698 20.362C4.6146 20.9265 5.07354 21.3854 5.63803 21.673C6.27976 22 7.11984 22 8.8 22H12M14 11H8M10 15H8M16 7H8M18 21V15M15 18H21"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>


                    <label class="control-label" for="production-qty">Quantity</label>
                    <div class="input-group">
                        <?= Html::activeInput('number', $model, 'qty', ['class' => 'form-control']) ?>
                        <span id="production-product-measurement" class="input-group-text">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2 17V16.8498C2 16.5333 2 16.3751 2.02421 16.2209C2.0457 16.084 2.08136 15.9497 2.13061 15.8202C2.18609 15.6743 2.2646 15.5369 2.42162 15.2622L6 9M2 17C2 19.2091 3.79086 21 6 21C8.20914 21 10 19.2091 10 17M2 17V16.8C2 16.52 2 16.38 2.0545 16.273C2.10243 16.1789 2.17892 16.1024 2.273 16.0545C2.37996 16 2.51997 16 2.8 16H9.2C9.48003 16 9.62004 16 9.727 16.0545C9.82108 16.1024 9.89757 16.1789 9.9455 16.273C10 16.38 10 16.52 10 16.8V17M6 9L9.57838 15.2622C9.7354 15.5369 9.81391 15.6743 9.86939 15.8202C9.91864 15.9497 9.9543 16.084 9.97579 16.2209C10 16.3751 10 16.5333 10 16.8498V17M6 9L18 7M14 15V14.8498C14 14.5333 14 14.3751 14.0242 14.2209C14.0457 14.084 14.0814 13.9497 14.1306 13.8202C14.1861 13.6743 14.2646 13.5369 14.4216 13.2622L18 7M14 15C14 17.2091 15.7909 19 18 19C20.2091 19 22 17.2091 22 15M14 15V14.8C14 14.52 14 14.38 14.0545 14.273C14.1024 14.1789 14.1789 14.1024 14.273 14.0545C14.38 14 14.52 14 14.8 14H21.2C21.48 14 21.62 14 21.727 14.0545C21.8211 14.1024 21.8976 14.1789 21.9455 14.273C22 14.38 22 14.52 22 14.8V15M18 7L21.5784 13.2622C21.7354 13.5369 21.8139 13.6743 21.8694 13.8202C21.9186 13.9497 21.9543 14.084 21.9758 14.2209C22 14.3751 22 14.5333 22 14.8498V15M12 3V8"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>



                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card" style="min-height: 100%">
                <div class="card-header lead">
                    Ingredient usage & Cost calculation
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Used qty.</th>
                                <th>Tot. cost</th>
                                <th>Avg. cost</th>
                            </tr>
                            <tr>
                                <td colspan="5" id="usage-label">* Please fill production details</td>
                            </tr>
                        </thead>
                        <tbody id="usage"></tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <label class="control-label" for="production-product_id">Cost</label>
                    <div class="input-group">
                        <?= Html::activeInput('price', $model, 'qty', ['class' => 'form-control', 'readonly' => true]) ?>
                        <span class="input-group-text">
                            <?= Yii::$app->params['currency'] ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group mt-2">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php $this->registerJs(<<<JS


    $.fn.fillRecipeDropDown = function(recipes){

        let optionsString = recipes.map(function(recipe) {
            return `<option value='\${recipe.id}'>\${recipe.name}</option>`;
            }).join(', ')

        $("#production-recipe_id").html(optionsString);
    }

    $.fn.putUsageDetails = function(recipe, qty){

        $("#usage-label").addClass("d-none");


        let usageTableRowsString = recipe.ingredients.map(function(ingredient) {
            return `<tr>
                <td>\${ingredient.product.name}</td>
                <td>\${ingredient.qty * qty}</td>
                <td>\${ingredient.qty}</td>
            </tr>`;
            }).join(', ')

        $("#usage").html(usageTableRowsString);
    }

    $.fn.getProductInfo = function(product_id){

        if(!product_id){
            return
        }

        $.get('/product/info', {id: product_id}, function(productInfo) {
            $.fn.fillRecipeDropDown(productInfo.recipes)

            if(productInfo.recipes.length > 0){
                $.fn.putUsageDetails(productInfo.recipes[0], 0)
            }
        });
    }

    $.fn.getProductInfo($('#production-product_id').val())


    $('#production-product_id').on('change', function() {
        $.fn.getProductInfo($(this).val())
    });
JS); ?>
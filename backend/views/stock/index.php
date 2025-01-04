<?php

use backend\models\Production;
use backend\models\Stock;
use backend\models\Supply;
use common\widgets\Dropdown;
use yii\bootstrap5\Modal;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var backend\models\StockSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Stock products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product'), ['/product/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render("/product/_list", [
        "dataProvider" => $dataProvider,
        "searchModel" => $searchModel,
        "footer" => function ($model) {
                return Html::tag('div', 
                Html::buttonInput(Yii::t('app', 'Make'), ['class' => 'btn btn-primary w-100 production_button', 'data-product-id' => $model->id]).
                Html::buttonInput(Yii::t('app', 'Buy'), ['class' => 'btn btn-secondary w-100 supply_button', 'data-product-id' => $model->id]) . 
                Dropdown::widget([
                    'buttonLabel' => '...',
                    'items' => [
                        ['label' => Yii::t('app', 'View'), 'url' => ['/product/view', 'id'=>$model->id]],
                        ['label' => Yii::t('app', 'Update'), 'url' => ['/product/update', 'id'=>$model->id]],
                        
                    ],
                    'buttonOptions' => ['class' => 'btn btn-primary'], // Custom button classes
                ]),
                 [
                    'class' => 'd-flex justify-content-between gap-1',
                ]);
                
            }
    ]) ?>

</div>

<?php Modal::begin([
    'id' => 'production-modal',
    'size' => 'modal-xl',
    'title' => Yii::t('app', 'Make production'),
    'options' => [
        'tabindex' => false,
    ],
]); 

echo $this->render('/production/_form', [
    'model' => new Production(),
]);

Modal::end(); ?>

<?php Modal::begin([
    'id' => 'supply-modal',
    'size' => 'modal-sm',
    'title' => Yii::t('app', 'Get supply'),
    'options' => [
        'tabindex' => false,
    ],
]); 

echo $this->render('/supply/_form', [
    'model' => new Supply(),
]);

Modal::end(); ?>

<?php

$this->registerJs(<<<JS

$.fn.productId = function(that){
    return $(that).data('product-id');
};

$('.production_button').click(function(){

    $('#production-modal').modal('show');

    $('#production-product_id').val($.fn.productId(this));

    $.fn.getProductInfo($.fn.productId(this));

});

$('.supply_button').click(function(){

    $('#supply-modal').modal('show');

    $('#supply-product_id').val($.fn.productId(this));

});

JS);
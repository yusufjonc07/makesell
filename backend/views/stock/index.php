<?php

use backend\models\Production;
use backend\models\Stock;
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

$this->title = Yii::t('app', 'Stocks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Stock'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render("/product/_list", [
        "dataProvider" => $dataProvider,
        "searchModel" => $searchModel,
        "footer" => function ($model) {
                return Html::tag('div', 
                Html::buttonInput(Yii::t('app', 'Make'), ['class' => 'btn btn-primary w-100 add_button', 'data-product-id' => $model->id]).
                Html::buttonInput(Yii::t('app', 'Buy'), ['class' => 'btn btn-secondary w-100 add_button', 'data-product-id' => $model->id]),
                 [
                    'class' => 'd-flex justify-content-between gap-1',
                ]);
                
            }
    ]) ?>

</div>

<?php Modal::begin([
    'id' => 'stock-modal',
    'size' => 'modal-xl',
    'title' => Yii::t('app', 'Add Stock'),
    'options' => [
        'tabindex' => false,
    ],
]); 

echo $this->render('/production/_form', [
    'model' => new Production(),
]);

Modal::end(); ?>

<?php

$this->registerJs(<<<JS

$('.add_button').click(function(){
    var product_id = $(this).data('product-id');

    $('#stock-modal').modal('show');

    $('#production-product_id').val(product_id);

    $.fn.getProductInfo(product_id);

    // $.ajax({
    //     url: '/stock/add',
    //     type: 'POST',
    //     data: {id: id},
    //     success: function(data) {
    //         $.pjax.reload({container: '#pjax-container'});
    //     }
    // });
});

JS);
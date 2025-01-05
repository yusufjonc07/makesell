<?php

use yii\bootstrap5\Modal;
use yii\bootstrap5\Popover;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\models\ProductSearch $model */
/** @var yii\widgets\ActiveForm $form */


Modal::begin([
    'title' => Yii::t('app', 'Orders on the basket diwj wdihj dwjidd djw'),
    'toggleButton' => ['label' => 'click me'],
    'id'=>'basket-modal'
]);
Pjax::begin();
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'product.name',
        'price',
        [
            'attribute'=>'qty',
            'value'=>function($model){
                
                return $model->qty . ' ' . $model->product->measurement;
            }
        ],
        [
            'contentOptions' => ['class' => 'text-center'],
            'format'=>'html',
            'value'=>function($model){
                return Html::a('x', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-sm btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]);
            }
        ]
    ],
]);
Pjax::end();

Modal::end();

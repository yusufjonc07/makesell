<?php

use yii\grid\CheckboxColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\models\Invoice $model */

$this->title = Yii::t('app', 'Create Invoice');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Invoices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
          

            [
                'attribute' => 'product_id',
                'value' => 'product.name',
            ],
            [
                'attribute' => 'price',
                'format' => ['currency', Yii::$app->params['currency']],
            ],

            [
                'attribute' => 'qty',
                'value' => function ($model) {
                    return $model->qty . ' ' . $model->product->measurement;
                },

            ],
            [
                'contentOptions' => ['class' => 'text-center'],
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('x', ['/order/delete', 'id' => $model->id], [
                        'class' => 'btn btn-sm btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                            'pjax' => 1
                        ],
                    ]);
                }
            ]
        ],
    ]);
    Pjax::end();


    ?>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProvider' => $dataProvider,
    ]) ?>

</div>
<?php

use backend\models\Invoice;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\InvoiceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Invoices');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Invoice'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'number',
            [
                'attribute' => 'customer_id',
                'value' => 'customer.name',
            ],
            [
                'format' => ['currency', Yii::$app->params['currency']],
                'attribute' => 'total_value',
            ],
            'created_at',
            [
                
                'attribute' => 'status',
                'format'=>'raw',
                'value' => function ($model) {
                    return Html::tag('span', $model->getStatusLabel(), ['class'=>'badge bg-'.$model->getStatusColor()]);
                },
                'filter'=>[
                    0=>'Pending',
                    1=>'Confirmed',
                ]
            ],
            'address',
            'comment',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Invoice $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

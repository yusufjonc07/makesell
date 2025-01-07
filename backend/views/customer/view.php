<?php

use backend\models\Invoice;
use common\widgets\ProfileView;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Customer $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'email:email',
            'phone',
            'balance',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

    <h1><?= Yii::t('app', 'Invoices'); ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'number',
            [
                'attribute' => 'total_value',
                'value' => function ($model) {
                    return Yii::$app->formatter->asCurrency($model->total_value, Yii::$app->params['currency']);
                }
            ],
            'created_at',
            [
                
                'attribute' => 'status',
                'format'=>'raw',
                'value' => function ($model) {
                    return Html::tag('span', $model->getStatusLabel(), ['class'=>'badge bg-'.$model->getStatusColor()]);
                }
            ],
            [
                'attribute' => 'address',
                'contentOptions' => ['style' => 'max-width: 250px']
            ],
            'comment',
            [
                'class' => ActionColumn::className(),
                'template' => "{view} {delete}",
                'urlCreator' => function ($action, Invoice $model, $key, $index, $column) {
                    return Url::toRoute(["/invoice/$action", 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>




</div>
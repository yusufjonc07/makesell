<?php

use yii\bootstrap5\Modal;
use yii\bootstrap5\Popover;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\i18n\Formatter;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\models\ProductSearch $model */
/** @var yii\widgets\ActiveForm $form */


// Define the SVG path element
$path = Html::tag('path', '', [
    'd' => 'M2 2H3.30616C3.55218 2 3.67519 2 3.77418 2.04524C3.86142 2.08511 3.93535 2.14922 3.98715 2.22995C4.04593 2.32154 4.06333 2.44332 4.09812 2.68686L4.57143 6M4.57143 6L5.62332 13.7314C5.75681 14.7125 5.82355 15.2031 6.0581 15.5723C6.26478 15.8977 6.56108 16.1564 6.91135 16.3174C7.30886 16.5 7.80394 16.5 8.79411 16.5H17.352C18.2945 16.5 18.7658 16.5 19.151 16.3304C19.4905 16.1809 19.7818 15.9398 19.9923 15.6342C20.2309 15.2876 20.3191 14.8247 20.4955 13.8988L21.8191 6.94969C21.8812 6.62381 21.9122 6.46087 21.8672 6.3335C21.8278 6.22177 21.7499 6.12768 21.6475 6.06802C21.5308 6 21.365 6 21.0332 6H4.57143ZM10 21C10 21.5523 9.55228 22 9 22C8.44772 22 8 21.5523 8 21C8 20.4477 8.44772 20 9 20C9.55228 20 10 20.4477 10 21ZM18 21C18 21.5523 17.5523 22 17 22C16.4477 22 16 21.5523 16 21C16 20.4477 16.4477 20 17 20C17.5523 20 18 20.4477 18 21Z',
    'stroke' => 'currentColor',
    'stroke-width' => '2',
    'stroke-linecap' => 'round',
    'stroke-linejoin' => 'round',
]);

// Create the SVG tag with the path
$svg = Html::tag('svg', $path, [
    'width' => '20',
    'height' => '20',
    'viewBox' => '0 0 24 24',
    'fill' => 'none',
    'xmlns' => 'http://www.w3.org/2000/svg',
]);

$badge = Html::tag('span', $dataProvider->getTotalCount(), ['class' => 'badge bg-secondary']);

$label = Html::tag('div', $svg . ' ' . $badge, ['class' => 'd-flex align-items-center gap-2']);

$total = $dataProvider->query->sum('price*qty');

Modal::begin([
    'title' => Yii::t('app', 'Orders on the basket'),
    'toggleButton' => ['label' => $label, 'class' => 'btn btn-outline-primary'],
    'id' => 'basket-modal'
]);

Pjax::begin();
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'showFooter' => true,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'product_id',
            'value' => 'product.name',
            'footer' => Yii::t('app', 'Total payment')
        ],
        [
            'attribute' => 'price',
            'format' => ['currency', Yii::$app->params['currency']],
            'footer' => Yii::$app->formatter->asCurrency($total, Yii::$app->params['currency'])
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
                return Html::a('x', ['delete', 'id' => $model->id], [
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

echo $total ? Html::a(Yii::t('app', 'Make an invoice'), ['/invoice/create', 'customer_id'=>$dataProvider->models[0]->customer_id], ['class' => 'btn btn-primary w-100']) : null;

Modal::end();

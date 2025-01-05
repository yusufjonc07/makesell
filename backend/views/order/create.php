<?php

use backend\models\Order;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Customer $customer */

$order = new Order();
$order->customer_id = $customer->id;
$order->qty = 1;

$this->title = Yii::t('app', 'Create Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex justify-content-between">
        <div>
            <?= $this->render('/product/_search', ['model'=>$searchModel]) ?>
        </div>
        <div class="d-flex align-items-end">
            <?= $this->render('_basket', ['dataProvider'=>$basketOrders]) ?>
        </div>
    </div>

    <?= $this->render('/product/_list', [
        'dataProvider' => $dataProvider,
        'searchModel' => null,
        'footer' => function ($model) use ($order) {
                $order->product_id = $model->id;
                $order->price = $model->price;
                return $this->render('/order/_form', ['model' => $order]);
            }
    ]) ?>

</div>

<?php $this->registerJs(<<<JS
    $('.decrease-button, .increase-button').on('click', function() {
        var input = $(this).parent().find('input[type="number"]');
        var value = parseInt(input.val());
        if ($(this).hasClass('decrease-button')) {
            value = value > 1 ? value - 1 : 1;
        } else {
            value++;
        }
        input.val(value);
    });
JS); ?>
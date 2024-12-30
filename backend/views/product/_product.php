<?php

use backend\models\Order;
use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var backend\models\Product $model */
/** @var backend\models\Customer $customer */


if ($customer) {
    $order = new Order();
    $order->product_id = $model->id;
    $order->price = $model->price;
    $order->customer_id = $customer->id;
    $order->qty = 1;
}

?>

<div class="card h-100">
    <?= Html::img("@web/uploads/$model->image", ['class' => 'card-img-top h-100', 'style' => 'background-image:url(https://i0.wp.com/mckameyanimalcenter.org/wp-content/uploads/2022/05/placeholder-661.png); background-size:cover;']) ?>
    <div class="card-body">
        <h5 class="card-title"><?= $model->name ?></h5>
        <span class="card-text text-primary">For:
            <?= number_format($model->price, 2) . ' ' . Yii::$app->params['currency'] ?></span>
        <p class="card-text"><?= $model->description ?></p>
        <?= $customer ? $this->render('/order/_form', ['model' => $order]) : Html::a('View', ['/product/view', 'id'=>$model->id], ['class'=>'btn btn-primary w-100']); ?>
    </div>
</div>
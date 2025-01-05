<?php

use backend\models\Order;
use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var backend\models\Product $model */

?>

<div class="card h-100 position-relative">
   
    <?= Html::img("@web/uploads/$model->image", ['class' => 'card-img-left h-100', 'style' => 'background-image:url(https://i0.wp.com/mckameyanimalcenter.org/wp-content/uploads/2022/05/placeholder-661.png); background-size:cover;']) ?>
    <div class="card-body">
        <h5 class="card-title"><?= $model->name ?></h5>
        <span class="card-text text-primary">For:
            <?= number_format($model->price, 2) . ' ' . Yii::$app->params['currency'] ?></span>
        <br>
        <span class="card-text text-success">On stock:
            <?= $model->remind_value . ' ' . $model->measurement ?></span>
        <p class="card-text"><?= $model->description ?></p>

        <?= is_callable($footer) ? $footer($model) : '' ?>
    </div>
</div>

<!-- : Html::a('View', ['/product/view', 'id'=>$model->id], ['class'=>'btn btn-primary w-100']) -->
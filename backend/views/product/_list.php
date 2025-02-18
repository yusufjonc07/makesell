<?php

use common\widgets\DataTableMode;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var backend\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var backend\models\Customer $customer */
/** @var callable $footer */

$footer = $footer ?? null;
?>

<?= $searchModel ? $this->render('_search', ['model' => $searchModel]) : ''; ?>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemOptions' => ['class' => 'col'],
    'layout' => "{items}\n{pager}",
    'itemView' => function ($model) use ($footer) {
        return $this->render('_product', ['model' => $model, 'footer' => $footer]);
    },
    'options' => ['class' => 'mt-2 row row-cols-1 row-cols-md-4 row-cols-lg-5 g-4'],
]) ?>
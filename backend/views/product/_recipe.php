<?php

use yii\bootstrap5\Html;

/* @var $model backend\models\Recipe */

?>

<div class="card mt-2 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="lead"><?= $model->name ?></span>
        <div>
            <?= Html::a(Yii::t('app', 'Update'), ['recipe/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['recipe/delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
                <?php foreach ($model->ingredients as $ingredient) { ?>
                    <tr>
                        <th><?= $ingredient->product->name ?></th>
                        <th><?= $ingredient->qty . ' ' . $ingredient->product->measurement ?></th>
                    </tr>
               <?php } ?>
        </table>
    </div>
</div>
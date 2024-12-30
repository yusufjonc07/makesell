<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var backend\models\Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

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

    <?= Html::img("@web/uploads/$model->image", ['width' => '100', 'class'=>'img-thumbnail my-2']) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'price',
            'description:ntext',
            'created_at',
            'updated_at',
            'remind_value',
            'measurement',
        ],
    ]) ?>

    <div class="d-flex gap-2 align-items-center">
        <span class="lead">Recipes</span>
        <a href="<?= Url::to(['/recipe/create', 'id'=>$model->id]) ?>">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 8V16M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </div>
    <!-- <hr class="hr"> -->

    <?= ListView::widget([
        'dataProvider' => $recipesProvider,
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_recipe', [
                'model' => $model,
                'index' => $index,
            ]);
        },
        'layout' => "{items}\n{pager}",
    ]) ?>
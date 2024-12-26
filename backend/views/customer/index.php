<?php

use backend\models\Customer;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var backend\models\CustomerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Customers');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="customer-index">



    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Customer'), ['create'], ['class' => 'btn btn-success']) ?>
        <?php Modal::begin([
            'title' => Yii::t('app', 'Search Customer'),
            'toggleButton' => ['label' => Yii::t('app', 'Search Customer'), 'class' => 'btn btn-secondary'],
        ]); ?>

        <?= $this->render('_search', ['model' => $searchModel]) ?>

        <?php Modal::end(); ?>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'layout' => "<div class='row'>{items}</div>\n<br>{pager}",
        'itemOptions' => ['class' => 'col-lg-3 mt-2'],
        'emptyText' => Yii::t('app', 'No customers found.'),
        'pager' => [
            'options' => ['class' => 'pagination justify-content-center'],
            'prevPageLabel' => '<',
            'nextPageLabel' => '>',
            'linkOptions'=>['class' => 'page-link'],
            'disabledPageCssClass'=>['class' => 'page-link'],
            'disableCurrentPageButton'=>true,
        ],
        'emptyTextOptions' => ['class' => 'text-center'],
        'summaryOptions' => ['class' => 'mb-0'],
    ]) ?>




</div>
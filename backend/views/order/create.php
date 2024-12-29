<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Customer $customer */

$this->title = Yii::t('app', 'Create Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('/product/_list', compact('dataProvider', 'searchModel', 'customer')) ?>

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

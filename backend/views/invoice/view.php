<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Invoice $model */

$this->title = "INVOICE #" . $model->number;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Invoices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="invoice-view">

    <!-- Invoice 1 - Bootstrap Brain Component -->
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-9 col-xl-8 col-xxl-7">
        <div class="row gy-3 mb-3">
          <div class="col-6">
            <h2 class="text-uppercase text-endx m-0">Invoice</h2>
          </div>
          <div class="col-6">
            <a class="d-block text-end" href="#!">
                <?= Html::img("@web/static/transparent.png", ['class'=>"img-fluid", "width"=>100, "height"=>44, "style"=>"object-fit:cover"]) ?>
            </a>
          </div>
          <div class="col-8">
            <h4>From</h4>
            <address>
              <strong>MakeSell</strong><br>
              875 N Coast Hwybr<br>
              Laguna Beach, California, 92651<br>
              United States<br>
            Phone: (949) 494-7695<br>
              Email: <?= Yii::$app->user->identity->email ?>
            </address>
          </div>
          <div class="col-4 text-end">
          <img src="<?= $model->getQrCode() ?>" alt="QrCode" width="135"  class="img-fluid">

          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 col-sm-6 col-md-8">
            <h4>Bill To</h4>
            <address>
              <strong><?= $model->customer->name ?></strong><br>
              <?= implode(',', array_slice(explode(',', $model->address), 0, 3)); ?><br>
              <?= implode(',', array_slice(explode(',', $model->address), 3, 6)); ?><br>
              Phone: <?= $model->customer->phone ?><br>
              Email: <?= $model->customer->email ?>
            </address>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <h4 class="row">
              <span class="col-6">Invoice #</span>
              <span class="col-6 text-sm-end"><?= $model->number ?></span>
            </h4>
            <div class="row">
              <span class="col-6">Order ID</span>
              <span class="col-6 text-sm-end">#<?= $model->id ?></span>
              <span class="col-6">Invoice Date</span>
              <span class="col-6 text-sm-end"><?= Yii::$app->formatter->asDate($model->created_at, "dd/MM/Y") ?></span>
              <span class="col-6">Due Date</span>
              <span class="col-6 text-sm-end"><?= Yii::$app->formatter->asDate($model->created_at, "dd/MM/Y") ?></span>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="table-responsive">

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col" class="text-uppercase">Qty</th>
                    <th scope="col" class="text-uppercase">Product</th>
                    <th scope="col" class="text-uppercase text-end">Unit Price</th>
                    <th scope="col" class="text-uppercase text-end">Amount</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($model->orders as $order): ?>
                        <tr>
                            <th scope="row"><?= $order->qty ?></th>
                            <td><?= $order->product->name ?></td>
                            <td class="text-end"><?= Yii::$app->formatter->asCurrency($order->price, Yii::$app->params['currency']) ?></td>
                            <td class="text-end"><?= Yii::$app->formatter->asCurrency( $order->qty * $order->price, Yii::$app->params['currency']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                        
                
                  <tr>
                    <th scope="row" colspan="3" class="text-uppercase text-end">Total</th>
                    <td class="text-end"><?= Yii::$app->formatter->asCurrency($model->getOrders()->sum('qty*price'), Yii::$app->params['currency']) ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-end">
            <?= Html::a(Yii::t('app', 'Download Invoice'), ['download', 'number'=>$model->number], ['class'=>'btn btn-primary mb-3']) ?>
            <button type="button" class="btn btn-danger mb-3" id="printButton">Submit Payment</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>




<?php
$this->registerJs(<<<JS
    // Print the content
    $('#printButton').on('click', function () {
        var printContents = $('#invoice-view').html();
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload(); // Reload to restore original page
    });

    // Download the content
    $('#downloadButton').on('click', function () {
        var content = $('#contentToPrint').html();
        var blob = new Blob([content], { type: 'text/html' });
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = 'content.html';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });
JS
);
?>
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
            'customer_id',
            'total_value',
            'created_at',
            'updated_at',
            'number',
            'status',
            'address',
            'comment',
        ],
    ]) ?>


<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Invoice $model */

$this->title = Yii::t("app", "INVOICE #") . $model->number;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Invoices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div id="invoice-view">

  <!-- Invoice 1 - Bootstrap Brain Component -->
  <section class="py-3 py-md-5">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-12 col-lg-9 col-xl-8 col-xxl-7">

          <div id="print-window">
            <div class="row gy-3 mb-3">
              <div class="col-6">
                <h2 class="text-uppercase text-endx m-0"><?= Yii::t("app", ""); ?></h2>
              </div>
              <div class="col-6">
                <a class="d-block text-end" href="#!">
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="135px" height="75px"
                    viewBox="0 0 321.000000 226.000000" preserveAspectRatio="xMidYMid meet">

                    <g transform="translate(0.000000,226.000000) scale(0.100000,-0.100000)" fill="#000000"
                      stroke="none">
                      <path
                        d="M1293 2169 c-48 -10 -81 -35 -111 -84 -55 -89 -48 -84 -79 -47 -24 28 -34 32 -76 32 -26 0 -64 -7 -84 -15 -35 -15 -36 -15 -76 21 l-40 36 -81 -4 c-124 -7 -133 -17 -161 -173 -9 -49 -26 -130 -38 -180 -24 -105 -21 -110 -58 115 -16 102 -28 145 -48 177 -42 69 -134 94 -196 53 -51 -34 -59 -38 -77 -44 -35 -11 -41 -76 -35 -416 6 -351 16 -450 50 -520 20 -40 28 -47 80 -63 57 -18 57 -18 93 4 20 12 42 36 49 52 l13 31 14 -30 c9 -16 18 -62 21 -102 9 -115 37 -162 182 -311 126 -130 147 -161 160 -238 7 -43 -9 -113 -25 -113 -5 0 -15 -3 -24 -6 -9 -3 -26 5 -41 20 -23 23 -25 32 -25 121 l0 95 -117 0 -116 0 6 -118 c7 -144 30 -214 86 -265 54 -49 100 -62 211 -62 102 1 151 17 197 67 58 62 93 223 74 344 -17 112 -48 161 -196 307 -105 104 -135 140 -144 172 -14 50 6 85 47 85 40 0 52 -17 52 -77 l0 -53 120 0 120 0 0 39 0 39 45 -17 45 -16 0 -442 0 -443 240 0 240 0 0 115 0 115 -125 0 -125 0 0 135 0 135 109 0 110 0 3 100 c2 55 2 105 0 110 -2 6 -51 10 -113 10 l-109 0 0 115 0 115 58 0 c50 0 60 -4 84 -29 46 -49 130 -50 160 -1 7 11 16 20 20 20 5 0 8 -211 8 -470 l0 -470 240 0 240 0 0 100 0 100 -125 0 -125 0 0 374 c0 333 2 378 17 404 15 26 15 37 4 98 -13 67 -12 72 15 153 l28 83 28 -34 c52 -61 128 -182 140 -223 7 -22 29 -56 50 -76 l38 -37 0 -471 0 -471 235 0 235 0 0 100 0 100 -120 0 -120 0 0 333 0 334 43 12 c23 7 83 30 132 51 115 49 251 93 390 126 121 29 158 52 174 112 21 75 -22 210 -82 258 -33 26 -35 30 -20 46 8 9 18 38 21 63 4 40 1 52 -29 93 -18 26 -43 55 -54 64 -17 15 -18 17 -3 18 31 0 48 29 48 79 0 109 -49 157 -157 155 -35 -1 -63 1 -63 5 0 9 -120 6 -322 -8 -93 -7 -198 -11 -235 -10 -38 2 -106 2 -153 0 -72 -3 -79 -5 -43 -10 76 -13 59 -22 -25 -15 -67 6 -85 4 -100 -9 -15 -13 -19 -14 -36 -1 -28 20 -57 17 -63 -7 -4 -12 -11 -18 -20 -15 -8 3 -19 6 -24 6 -5 0 -9 9 -9 20 0 73 -87 130 -164 109 -38 -10 -102 -70 -118 -109 l-10 -25 -19 38 c-11 21 -34 47 -52 57 -18 11 -43 27 -56 37 -30 23 -68 31 -108 22z m68 -65 c10 -9 33 -23 51 -32 39 -20 56 -61 58 -142 l2 -55 13 40 13 40 1 -55 c1 -30 4 -93 8 -138 6 -78 8 -84 32 -94 14 -5 34 -16 43 -25 16 -14 16 -2 11 184 l-5 198 37 38 c39 39 58 44 98 26 33 -15 45 -46 36 -94 -4 -22 -8 -80 -7 -130 l0 -90 9 65 c16 113 23 123 29 38 l5 -77 141 68 c77 37 173 87 212 110 79 46 119 51 137 15 6 -11 16 -19 23 -16 17 5 15 -30 -3 -54 -25 -33 -17 -34 50 -3 69 31 234 81 325 98 80 15 166 24 160 18 -3 -4 -84 -25 -180 -47 -234 -55 -372 -102 -420 -143 -21 -17 -72 -52 -114 -77 -71 -43 -98 -68 -57 -55 28 9 135 -122 203 -249 33 -62 37 -67 38 -41 0 62 -29 281 -40 307 -16 35 -6 89 23 116 30 28 168 73 377 122 96 22 196 46 222 52 54 13 103 -1 113 -33 7 -22 10 -78 4 -83 -2 -2 -92 -29 -199 -61 -160 -47 -344 -109 -358 -120 -2 -2 0 -19 3 -38 l7 -35 106 45 c200 83 384 123 423 91 8 -7 28 -32 43 -55 51 -77 21 -106 -145 -139 -119 -24 -269 -74 -361 -120 -50 -25 -54 -34 -42 -91 l6 -29 141 57 c187 74 350 129 387 129 45 0 85 -41 104 -108 33 -120 14 -151 -109 -177 -110 -23 -245 -67 -407 -132 -148 -58 -201 -65 -222 -29 -6 10 -21 29 -33 42 -13 13 -23 28 -23 35 0 8 -6 7 -18 -3 -27 -24 -46 -27 -79 -13 -24 10 -34 23 -42 52 -24 89 -270 405 -326 419 -37 9 -65 -11 -60 -44 2 -15 12 -87 20 -160 9 -73 23 -154 31 -180 22 -75 19 -99 -18 -118 -23 -12 -44 -14 -81 -10 -60 8 -83 19 -97 46 -9 16 -49 307 -50 358 0 8 -11 1 -24 -15 l-25 -29 19 -83 c55 -249 47 -327 -34 -307 -38 9 -83 102 -124 252 l-36 134 -52 0 c-29 0 -56 -4 -59 -10 -3 -5 -15 -68 -27 -140 -13 -77 -26 -129 -32 -127 -6 2 -10 23 -9 48 1 33 -2 26 -12 -31 -11 -58 -20 -80 -40 -97 -34 -30 -76 -29 -113 2 -29 24 -29 24 -47 5 -24 -27 -74 -26 -116 3 -37 25 -35 16 -59 232 -6 55 -26 165 -44 245 l-33 145 -23 -75 c-13 -41 -33 -111 -45 -155 -12 -44 -25 -73 -27 -65 -3 8 -4 5 -2 -6 5 -26 -40 -229 -62 -284 -11 -26 -24 -42 -39 -46 -50 -12 -60 5 -115 203 -28 103 -56 199 -61 213 -6 16 -7 -44 -4 -167 2 -108 0 -204 -5 -217 -13 -36 -40 -47 -84 -35 -49 13 -60 42 -75 184 -13 135 -19 685 -7 704 15 24 26 -9 27 -89 l2 -75 6 94 c6 82 9 95 30 112 35 29 87 25 121 -10 16 -16 31 -39 34 -52 2 -13 20 -116 40 -229 38 -220 67 -361 72 -345 11 35 114 509 119 550 4 28 14 60 21 72 13 21 21 23 86 20 68 -2 72 -3 99 -37 39 -48 64 -124 91 -272 12 -68 23 -125 25 -127 1 -2 13 7 25 20 20 22 47 36 99 52 10 3 19 22 23 47 10 62 65 228 97 291 45 89 106 123 150 83z m-322 -240 c12 -30 21 -72 21 -93 0 -34 -4 -40 -26 -45 -15 -4 -28 -6 -29 -4 -2 2 -10 44 -18 93 -15 82 -15 91 0 102 22 17 29 10 52 -53z m1176 -150 c27 -66 19 -79 -21 -34 -35 39 -36 41 -18 55 10 8 20 15 21 15 2 0 10 -16 18 -36z m-1491 -340 c5 -37 3 -42 -15 -47 -20 -5 -21 -3 -15 35 6 39 15 63 21 56 1 -2 5 -22 9 -44z m609 -11 c2 -10 8 -26 12 -36 7 -16 4 -18 -16 -15 -13 1 -23 6 -21 11 1 4 2 18 2 32 0 29 15 34 23 8z" />
                      <path
                        d="M360 1936 c0 -22 61 -280 67 -286 3 -3 3 6 0 20 -8 32 -47 260 -47 271 0 5 -4 9 -10 9 -5 0 -10 -6 -10 -14z" />
                      <path
                        d="M1302 1781 c-12 -43 -22 -88 -22 -100 0 -20 4 -22 33 -16 17 4 34 9 36 11 3 3 -18 177 -23 181 -2 2 -13 -32 -24 -76z" />
                      <path
                        d="M720 1755 c-20 -54 -71 -256 -67 -268 2 -7 7 5 11 26 4 21 22 89 41 150 19 61 32 113 30 116 -3 2 -9 -9 -15 -24z" />
                      <path
                        d="M2196 1529 c14 -23 48 -87 76 -143 28 -55 47 -88 43 -71 -9 38 -67 155 -106 211 -38 56 -48 58 -13 3z" />
                      <path
                        d="M2591 1551 c-29 -10 -57 -25 -62 -34 -7 -12 8 -9 63 14 40 17 75 33 77 35 9 8 -26 1 -78 -15z" />
                      <path
                        d="M990 1482 c1 -4 9 -45 19 -92 l17 -85 13 64 c7 34 15 69 18 77 3 9 -2 14 -16 14 -12 0 -21 4 -21 9 0 5 -7 11 -15 15 -8 3 -15 2 -15 -2z" />
                      <path d="M1241 1454 c0 -11 3 -14 6 -6 3 7 2 16 -1 19 -3 4 -6 -2 -5 -13z" />
                      <path d="M1231 1414 c0 -11 3 -14 6 -6 3 7 2 16 -1 19 -3 4 -6 -2 -5 -13z" />
                      <path d="M1222 1370 c0 -14 2 -19 5 -12 2 6 2 18 0 25 -3 6 -5 1 -5 -13z" />
                      <path d="M1212 1315 c0 -16 2 -22 5 -12 2 9 2 23 0 30 -3 6 -5 -1 -5 -18z" />
                      <path d="M2490 1110 c-26 -11 -36 -19 -25 -19 11 0 36 8 55 19 45 24 28 24 -30 0z" />
                      <path d="M2028 2073 c7 -3 16 -2 19 1 4 3 -2 6 -13 5 -11 0 -14 -3 -6 -6z" />
                    </g>
                  </svg>
                </a>
              </div>
              <div class="col-8">
                <h4><?= Yii::t("app", "From"); ?></h4>
                <address>
                  <strong>MakeSell</strong><br>
                  <?= Yii::t("app", "875 N Coast Hwybr"); ?><br>
                  <?= Yii::t("app", "Laguna Beach, California, 92651"); ?><br>
                  <?= Yii::t("app", "United States"); ?><br>
                  <?= Yii::t("app", "Phone"); ?>: (949) 494-7695<br>
                  <?= Yii::t("app", "Email"); ?>: <?= Yii::$app->user->identity->email ?>
                </address>
              </div>
              <div class="col-4 text-end">
                <img src="<?= $model->getQrCode() ?>" alt="QrCode" width="135" class="img-fluid">

              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12 col-sm-6 col-md-8">
                <h4><?= Yii::t("app", "Bill To"); ?></h4>
                <address>
                  <strong><?= $model->customer->name ?></strong><br>
                  <?= implode(',', array_slice(explode(',', $model->address), 0, 3)); ?><br>
                  <?= implode(',', array_slice(explode(',', $model->address), 3, 6)); ?><br>
                  <?= Yii::t("app", "Phone"); ?>: <?= $model->customer->phone ?><br>
                  <?= Yii::t("app", "Email"); ?>: <?= $model->customer->email ?>
                </address>
              </div>
              <div class="col-12 col-sm-6 col-md-4">
                <h4 class="row">
                  <span class="col-6"><?= Yii::t("app", "Invoice #"); ?></span>
                  <span class="col-6 text-sm-end"><?= $model->number ?></span>
                </h4>
                <div class="row">
                  <span class="col-6"><?= Yii::t("app", "Order ID"); ?></span>
                  <span class="col-6 text-sm-end">#<?= $model->id ?></span>
                  <span class="col-6"><?= Yii::t("app", "Invoice Date"); ?></span>
                  <span
                    class="col-6 text-sm-end"><?= Yii::$app->formatter->asDate($model->created_at, "dd/MM/Y") ?></span>
                  <span class="col-6"><?= Yii::t("app", "Due Date"); ?></span>
                  <span
                    class="col-6 text-sm-end"><?= Yii::$app->formatter->asDate($model->created_at, "dd/MM/Y") ?></span>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <div class="table-responsive">

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col" class="text-uppercase"><?= Yii::t("app", "Qty"); ?></th>
                        <th scope="col" class="text-uppercase"><?= Yii::t("app", "Product"); ?></th>
                        <th scope="col" class="text-uppercase text-end"><?= Yii::t("app", "Unit Price"); ?></th>
                        <th scope="col" class="text-uppercase text-end"><?= Yii::t("app", "Amount"); ?></th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                      <?php foreach ($model->orders as $order): ?>
                        <tr>
                          <th scope="row"><?= $order->qty ?></th>
                          <td><?= $order->product->name ?></td>
                          <td class="text-end">
                            <?= Yii::$app->formatter->asCurrency($order->price, Yii::$app->params['currency']) ?>
                          </td>
                          <td class="text-end">
                            <?= Yii::$app->formatter->asCurrency($order->qty * $order->price, Yii::$app->params['currency']) ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      <tr>
                        <th scope="row" colspan="3" class="text-uppercase text-end"><?= Yii::t("app", "Total"); ?></th>
                        <td class="text-end">
                          <?= Yii::$app->formatter->asCurrency($model->getOrders()->sum('qty*price'), Yii::$app->params['currency']) ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-between gap-3">
            <?= Html::a('<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M11 3.99998H6.8C5.11984 3.99998 4.27976 3.99998 3.63803 4.32696C3.07354 4.61458 2.6146 5.07353 2.32698 5.63801C2 6.27975 2 7.11983 2 8.79998V17.2C2 18.8801 2 19.7202 2.32698 20.362C2.6146 20.9264 3.07354 21.3854 3.63803 21.673C4.27976 22 5.11984 22 6.8 22H15.2C16.8802 22 17.7202 22 18.362 21.673C18.9265 21.3854 19.3854 20.9264 19.673 20.362C20 19.7202 20 18.8801 20 17.2V13M7.99997 16H9.67452C10.1637 16 10.4083 16 10.6385 15.9447C10.8425 15.8957 11.0376 15.8149 11.2166 15.7053C11.4184 15.5816 11.5914 15.4086 11.9373 15.0627L21.5 5.49998C22.3284 4.67156 22.3284 3.32841 21.5 2.49998C20.6716 1.67156 19.3284 1.67155 18.5 2.49998L8.93723 12.0627C8.59133 12.4086 8.41838 12.5816 8.29469 12.7834C8.18504 12.9624 8.10423 13.1574 8.05523 13.3615C7.99997 13.5917 7.99997 13.8363 7.99997 14.3255V16Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
 </svg>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary w-100']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
              'class' => 'btn btn-danger w-100',
              'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
              ],
            ]) ?>
            <?= Html::a('<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M9 11L12 14L22 4M16 3H7.8C6.11984 3 5.27976 3 4.63803 3.32698C4.07354 3.6146 3.6146 4.07354 3.32698 4.63803C3 5.27976 3 6.11984 3 7.8V16.2C3 17.8802 3 18.7202 3.32698 19.362C3.6146 19.9265 4.07354 20.3854 4.63803 20.673C5.27976 21 6.11984 21 7.8 21H16.2C17.8802 21 18.7202 21 19.362 20.673C19.9265 20.3854 20.3854 19.9265 20.673 19.362C21 18.7202 21 17.8802 21 16.2V12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
 </svg>', ['confirm', 'id' => $model->id], ['class' => 'btn btn-success w-100',  'data' => [
  'confirm' => Yii::t('app', 'Are you sure you want to confirm this invoice?'),
  'method' => 'post',
],]) ?>
            <?= Html::button('<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M18 7V5.2C18 4.0799 18 3.51984 17.782 3.09202C17.5903 2.71569 17.2843 2.40973 16.908 2.21799C16.4802 2 15.9201 2 14.8 2H9.2C8.0799 2 7.51984 2 7.09202 2.21799C6.71569 2.40973 6.40973 2.71569 6.21799 3.09202C6 3.51984 6 4.0799 6 5.2V7M6 18C5.07003 18 4.60504 18 4.22354 17.8978C3.18827 17.6204 2.37962 16.8117 2.10222 15.7765C2 15.395 2 14.93 2 14V11.8C2 10.1198 2 9.27976 2.32698 8.63803C2.6146 8.07354 3.07354 7.6146 3.63803 7.32698C4.27976 7 5.11984 7 6.8 7H17.2C18.8802 7 19.7202 7 20.362 7.32698C20.9265 7.6146 21.3854 8.07354 21.673 8.63803C22 9.27976 22 10.1198 22 11.8V14C22 14.93 22 15.395 21.8978 15.7765C21.6204 16.8117 20.8117 17.6204 19.7765 17.8978C19.395 18 18.93 18 18 18M15 10.5H18M9.2 22H14.8C15.9201 22 16.4802 22 16.908 21.782C17.2843 21.5903 17.5903 21.2843 17.782 20.908C18 20.4802 18 19.9201 18 18.8V17.2C18 16.0799 18 15.5198 17.782 15.092C17.5903 14.7157 17.2843 14.4097 16.908 14.218C16.4802 14 15.9201 14 14.8 14H9.2C8.0799 14 7.51984 14 7.09202 14.218C6.71569 14.4097 6.40973 14.7157 6.21799 15.092C6 15.5198 6 16.0799 6 17.2V18.8C6 19.9201 6 20.4802 6.21799 20.908C6.40973 21.2843 6.71569 21.5903 7.09202 21.782C7.51984 22 8.07989 22 9.2 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
 </svg>', ['class' => 'btn btn-primary w-100', 'id' => 'printButton']) ?>
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
        var printContents = $('#print-window').html();
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload(); // Reload to restore original page
    });

   
JS
);
?>
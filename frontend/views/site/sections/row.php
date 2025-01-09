<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */

?>

<section id="featured-products" class="product-store">
  <div class="container-md">
    <div class="display-header d-flex align-items-center justify-content-between">
      <h2 class="section-title text-uppercase"><?= $title; ?></h2>
      <div class="btn-right">
        <a href="index.html" class="d-inline-block text-uppercase text-hover fw-bold">View all</a>
      </div>
    </div>
    <div class="product-content padding-small">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
        <?php foreach ($products as $product):

          echo $this->render('/shared/_product-card', ['product' => $product]);
        endforeach; ?>

      </div>
    </div>
  </div>
</section>
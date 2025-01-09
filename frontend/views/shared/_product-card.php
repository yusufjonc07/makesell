<?php
use yii\bootstrap5\Html;
/** @var yii\web\View $this */

?>

<div class="col mb-4">
    <div class="product-card position-relative">
        <div class="card-img">
            <img src="http://localhost:8009/uploads/<?= $product['image']; ?>" alt="product-item"
                class="product-image img-fluid">
            <div class="cart-concern position-absolute d-flex justify-content-center">
                <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modallong">
                        <svg class="shopping-carriage">
                            <use xlink:href="#shopping-carriage"></use>
                        </svg>
                    </button>

                    <?= Html::button('<svg class="quick-view"><use xlink:href="#quick-view"></use></svg>', [
                        'class' => 'btn btn-light quick-view-btn',
                        'data-bs-target' => '#modaltoggle',
                        'data-bs-toggle' => 'modal',
                        'data' => $product
                    ]) ?>
                </div>
            </div>
            <!-- cart-concern -->
        </div>
        <div class="card-detail d-flex justify-content-between align-items-center mt-3">
            <h3 class="card-title fs-6 fw-normal m-0">
                <a href="index.html"><?= $product['name']; ?></a>
            </h3>
            <span class="card-price fw-bold"><?= Yii::$app->formatter->asCurrency($product['price']); ?></span>
        </div>
    </div>
</div>

<?php

$this->registerJs(<<<JS
  $('.quick-view-btn').on('click', function() {
    var data = $(this).data();

    $('#qw-image').attr('src', `http://localhost:8009/uploads/\${encodeURIComponent(data.image)}`);
    $('#qw-name').text(data.name);
    $('#qw-price').text(data.price);
    $('#qw-description').text(data.description);
    $('#qw-qty').text(data.qty);
    $('#qw-active').text(data.active);
    $('#qw-add_btn').attr('data-id', data.id);

    console.log(data);
    
    // $('#modaltoggle').find('.modal-body').load('quick-view.php', data);
  });
JS) ?>
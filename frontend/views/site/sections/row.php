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
        <?php foreach ($products as $product): ?>
          <div class="col mb-4">
            <div class="product-card position-relative">
              <div class="card-img">
                <img src="http://localhost:8009/uploads/<?= $product->image; ?>" alt="product-item" class="product-image img-fluid">
                <div class="cart-concern position-absolute d-flex justify-content-center">
                  <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modallong">
                      <svg class="shopping-carriage">
                        <use xlink:href="#shopping-carriage"></use>
                      </svg>
                    </button>
                    <button type="button" class="btn btn-light" data-bs-target="#modaltoggle" data-bs-toggle="modal">
                      <svg class="quick-view">
                        <use xlink:href="#quick-view"></use>
                      </svg>
                    </button>
                  </div>
                </div>
                <!-- cart-concern -->
              </div>
              <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                <h3 class="card-title fs-6 fw-normal m-0">
                  <a href="index.html"><?= $product->name; ?></a>
                </h3>
                <span class="card-price fw-bold"><?= Yii::$app->formatter->asCurrency($product->price); ?></span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</section>
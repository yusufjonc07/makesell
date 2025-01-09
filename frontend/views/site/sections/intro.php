<?php


?>
<section id="intro" class="position-relative mt-4">
  <div class="container-lg">
    <div class="swiper main-swiper">
      <div class="swiper-wrapper">
        <?php foreach ($products as $product) { ?>
          <div class="swiper-slide">
            <div class="row g-2">
              <div class="col-lg-12 mb-4">
                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img bg-dark">
                  <img src="http://localhost:8009/uploads/<?= $product->image; ?>" alt="shoes"
                    class="img-fluid jarallax-img ">
                  <div class="cart-concern p-3 m-3 py-lg-5 m-lg-5">
                    <h2 class="card-title style-2 display-4 light"><?= $product->name ?></h2>
                    <a href="index.html"
                      class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>

      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</section>
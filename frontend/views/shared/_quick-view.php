<?php

/** @var yii\web\View $this */


?>
  <!-- quick view -->
  <div class="modal fade" id="modaltoggle" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="col-lg-12 col-md-12 me-3">
            <div class="image-holder">
              <img id="qw-image" alt="Shoes">
            </div>
          </div>
          <div class="col-lg-12 col-md-12">
            <div class="summary">
              <div class="summary-content fs-6">
                <div class="product-header d-flex justify-content-between mt-4">
                  <h3 class="display-7" id="qw-name">Running Shoes For Men</h3>
                  <div class="modal-close-btn">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                  </div>
                </div>
                <span class="product-price fs-3" id="qw-price">$99</span>
                <div class="product-details">
                  <p class="fs-7" id="qw-description">Buy good shoes and a good mattress, because when you're not in one you're in the
                    other. With four pairs of shoes, I can travel the world.</p>
                </div>
               
                <div class="variations-form shopify-cart">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="quantity d-flex pb-4">
                        <div
                          class="qty-number align-top qty-number-plus d-flex justify-content-center align-items-center text-center">
                          <span class="increase-qty plus">
                            <svg class="plus">
                              <use xlink:href="#plus"></use>
                            </svg>
                          </span>
                        </div>
                        <input type="number" id="quantity_001" class="input-text text-center" step="1" min="1" name="quantity" value="1" title="Qty">
                        <div
                          class="qty-number qty-number-minus d-flex justify-content-center align-items-center text-center">
                          <span class="increase-qty minus">
                            <svg class="minus">
                              <use xlink:href="#minus"></use>
                            </svg>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-medium btn-black hvr-sweep-to-right" id="qw-add_btn">Add to cart</button>
                    </div>
                  </div>
                </div>
                <div class="categories d-flex flex-wrap pt-3">
                  <strong class="pe-2">Stock quantity:</strong>
                  <span id="qw-qty"></span>
                  <strong class="px-2">Active orders:</strong>
                  <span id="qw-active"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / quick view -->


<?php

$this->registerJs(<<<JS
  $("#modaltoggle").on("shown.bs.modal", function(){

    // Get the button that triggered the modal

    // Extract data from HTML element attributes
    

    // Extract custom data attribute (if any)
    // var buttonData = button.data('name');



  }) 
JS) ?>
<?php
namespace common\widgets;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class AddressAutocomplete extends InputWidget
{
    /**
     * @var string Your Geoapify API key
     */
    public $apiKey;

    /**
     * @var string Placeholder for the input field
     */
    public $placeholder = 'Enter your address';

    public function run()
    {
        $inputId = $this->options['id'] ?? $this->getId();
        $modalId = $inputId . '-modal';
        $searchInputId = $modalId . '-search';
        $resultsId = $modalId . '-results';

        // Render the input field
        if ($this->hasModel()) {
            echo Html::activeTextInput($this->model, $this->attribute, [
                'id' => $inputId,
                'class' => 'form-control address-input',
                'placeholder' => $this->placeholder,
                'readonly' => true, // Make input readonly since the modal will handle address selection
            ]);
        } else {
            echo Html::textInput($this->name, $this->value, [
                'id' => $inputId,
                'class' => 'form-control address-input',
                'placeholder' => $this->placeholder,
                'readonly' => true,
            ]);
        }

        // Render the modal
        echo $this->renderModal($modalId, $searchInputId, $resultsId);

        // Register JavaScript and CSS
        $this->registerClientCss();
        $this->registerClientScript($inputId, $modalId, $searchInputId, $resultsId);
    }

    /**
     * Render the modal HTML.
     */
    protected function renderModal($modalId, $searchInputId, $resultsId)
    {
        return <<<HTML
<div class="modal fade" id="$modalId" tabindex="-1" aria-labelledby="{$modalId}-label" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="{$modalId}-label">Find Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" id="$searchInputId" class="form-control mb-3" placeholder="Start typing an address...">
        <div id="$resultsId" class="list-group"></div>
      </div>
    </div>
  </div>
</div>
HTML;
    }

    /**
     * Registers the necessary CSS for the widget.
     */
    protected function registerClientCss()
    {
        $css = <<<CSS
        .address-autocomplete-item {
            cursor: pointer;
        }

        .address-autocomplete-item:hover {
            background-color: #f0f0f0;
        }
CSS;
        $this->getView()->registerCss($css);
    }

    /**
     * Registers the necessary JavaScript for the widget.
     */
    protected function registerClientScript($inputId, $modalId, $searchInputId, $resultsId)
    {
        $apiKey = Json::encode($this->apiKey);
        $js = <<<JS
            (function($) {
                var input = $('#$inputId');
                var modal = $('#$modalId');
                var searchInput = $('#$searchInputId');
                var results = $('#$resultsId');
                var apiKey = $apiKey;
                let typingTimer; // Timer identifier
                const typingDelay = 1000; // Delay in milliseconds



                // Open modal on input focus
                input.on('focus', function () {
                    modal.modal('show');
                });

                // Handle address search
                searchInput.on('input', function () {
                    var query = searchInput.val();
                    clearTimeout(typingTimer);

                    if (query.length < 3) {
                        results.empty();
                        return;
                    }

                    typingTimer = setTimeout(function(){
                        // Fetch address suggestions
                        $.getJSON(
                            `https://api.geoapify.com/v1/geocode/autocomplete?text=\${encodeURIComponent(query)}&apiKey=\${apiKey}&limit=5`,
                            function (data) {
                                results.empty();
                                if (data.features && data.features.length > 0) {
                                    data.features.forEach(function (result) {


                                        var item = $('<a href="#" class="list-group-item list-group-item-action address-autocomplete-item"></a>')
                                            .text(result.properties.formatted)
                                            .appendTo(results);

                                        item.on('click', function (e) {
                                            e.preventDefault();
                                            input.val(result.properties.formatted); // Set the selected address in the input
                                            modal.modal('hide'); // Close the modal
                                        });
                                    });
                                } else {
                                    results.html('<div class="list-group-item">No results found</div>');
                                }
                            }
                        ).fail(function () {
                            console.error('Address Autocomplete Error: Failed to fetch data');
                        });
                    }, typingDelay);

                    
                });

                // Optional: Clear the timer when the input field is cleared
                searchInput.on('keydown', function () {
                    clearTimeout(typingTimer);
                });
            })(jQuery);
            JS;

        $this->getView()->registerJs($js);
    }
}

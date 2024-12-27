<?php

namespace common\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\web\View;

class ImageUpload extends Widget
{
    public $model;
    public $attribute;
    public $previewOptions = [];
    public $containerOptions = [];
    public $dropZoneText = 'Drag and drop an image here or click to upload';
    public $previewImageStyle = 'max-width: 100%; max-height: 200px; display: none;';
    public $containerStyle = 'border: 2px dashed #ccc; padding: 20px; text-align: center; cursor: pointer;';

    public function run()
    {
        $id = $this->getId();
        $inputId = $id . '-input';
        $containerId = $id . '-container';
        $imageId = $id . '-img';

        // Render the drag-and-drop container and preview section
        echo Html::tag('div', 
            Html::tag('span', $this->dropZoneText, ['class' => 'drop-zone-text']) .
            Html::img('#', [
                'id' => $imageId,
                'style' => $this->previewImageStyle,
            ]), 
            array_merge(['id' => $containerId, 'style' => $this->containerStyle], $this->containerOptions)
        );

        // Hidden input for file upload
        echo Html::activeFileInput($this->model, $this->attribute, [
            'id' => $inputId,
            'style' => 'display: none;',
        ]);

        // Register drag-and-drop script
        $this->registerDragAndDropScript($inputId, $containerId, $imageId);
    }

    protected function registerDragAndDropScript($inputId, $containerId, $imageId)
    {
        $script = <<<JS
            var container = document.getElementById('$containerId');
            var input = document.getElementById('$inputId');
            var image = document.getElementById('$imageId');

            container.addEventListener('click', function() {
                input.click();
            });

            container.addEventListener('dragover', function(event) {
                event.preventDefault();
                container.style.borderColor = '#999';
            });

            container.addEventListener('dragleave', function(event) {
                container.style.borderColor = '#ccc';
            });

            container.addEventListener('drop', function(event) {
                event.preventDefault();
                container.style.borderColor = '#ccc';
                var file = event.dataTransfer.files[0];
                previewImage(file);
            });

            input.addEventListener('change', function(event) {
                var file = event.target.files[0];
                previewImage(file);
            });

            function previewImage(file) {
                if (file && file.type.match('image.*')) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        image.src = event.target.result;
                        image.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('Please upload a valid image file.');
                }
            }
JS;
        $this->getView()->registerJs($script, View::POS_END);
    }
}

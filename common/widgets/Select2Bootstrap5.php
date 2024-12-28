<?php

namespace common\widgets;

use kartik\select2\Select2;

class Select2Bootstrap5 extends Select2
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        
        // Registering the Select2 bootstrap 5 theme CSS file
        $this->view->registerCssFile('https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css');
        
        // Setting the theme to bootstrap-5
        $this->theme = 'bootstrap-5';
    }
}
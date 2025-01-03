<?php


namespace common\widgets;

use yii\bootstrap5\Widget;


class DataTableMode extends Widget
{
    public $id = 'dataTableMode';
    public $options = [];
    public $items = [];

    public function init()
    {
        parent::init();
        $this->options['class'] = 'btn-group';
        $this->options['role'] = 'group';
        $this->options['aria-label'] = 'Basic radio toggle button group';
    }

    public function run()
    {
        $content = '';
        foreach ($this->items as $key => $item) {
            $content .= $this->renderItem($key, $item);
        }
        return $content;
    }

    protected function renderItem($key, $item)
    {
        $checked = $item['checked'] ?? false;
        $label = $item['label'] ?? '';
        $icon = $item['icon'] ?? '';
        $inputOptions = $item['inputOptions'] ?? [];
        $labelOptions = $item['labelOptions'] ?? [];
        $inputOptions['class'] = 'btn-check';
        $inputOptions['name'] = 'btnradio';
        $inputOptions['id'] = $this->id . $key;
        $inputOptions['autocomplete'] = 'off';
        if ($checked) {
            $inputOptions['checked'] = true;
        }
        $labelOptions['class'] = 'btn btn-outline-primary';
        $content = '<input ' . $this->renderOptions($inputOptions) . '>';
        $content .= '<label ' . $this->renderOptions($labelOptions) . '>';
        $content .= $icon;
        $content .= $label;
        $content .= '</label>';
        return $content;
    }

    protected function renderOptions($options)
    {
        $content = '';
        foreach ($options as $key => $value) {
            $content .= $key . '="' . $value . '" ';
        }
        return $content;
    }
}
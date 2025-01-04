<?php

namespace common\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class Dropdown extends Widget
{
    public $buttonLabel = 'Dropdown';
    public $items = []; // Array of dropdown items
    public $buttonOptions = []; // Additional options for the button
    public $dropdownOptions = []; // Additional options for the dropdown

    public function run()
    {
        // Set default button options
        $this->buttonOptions['class'] = $this->buttonOptions['class'] ?? 'btn btn-secondary dropdown-toggle';
        $this->buttonOptions['type'] = 'button';
        $this->buttonOptions['data-bs-toggle'] = 'dropdown'; // Bootstrap 5
        $this->buttonOptions['aria-expanded'] = 'false';

        // Generate the button
        $button = Html::button($this->buttonLabel, $this->buttonOptions);

        // Generate the dropdown items
        $items = '';
        foreach ($this->items as $item) {
            if (isset($item['items'])) {
                // Submenu (if needed)
                $submenu = '';
                foreach ($item['items'] as $subItem) {
                    $submenu .= Html::tag('li', Html::a($subItem['label'], Url::to($subItem['url']), ['class' => 'dropdown-item']));
                }
                $items .= Html::tag('li', $submenu, ['class' => 'dropdown-submenu']);
            } else {
                $items .= Html::tag('li', Html::a($item['label'], Url::to($item['url']), ['class' => 'dropdown-item']));
            }
        }

        // Wrap items in a dropdown menu
        $dropdown = Html::tag('ul', $items, array_merge(['class' => 'dropdown-menu'], $this->dropdownOptions));

        // Wrap everything in a container
        return Html::tag('div', $button . $dropdown, ['class' => 'dropdown']);
    }
}

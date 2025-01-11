<?php

namespace common\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use Yii;

class LanguageSwitcher extends Widget
{
    // Define supported languages
    public $supportedLanguages = [
        'en-US' => 'English',
        'ko-KR' => '한국어',
    ];

    // Layout types
    public $layout = 'dropdown'; // Default to 'dropdown'

    public function run()
    {
        // Get the current language
        $currentLanguage = Yii::$app->language;

        // Generate language switch URLs
        $languageItems = [];
        foreach ($this->supportedLanguages as $code => $label) {
            $languageItems[] = [
                'label' => $label,
                'url' => Url::current(['language' => $code]),
                'active' => $code === $currentLanguage,
            ];
        }

        // Layout handling based on $layout property
        if ($this->layout === 'inline') {
            // Render inline list with | separators
            return $this->renderInline($languageItems, $currentLanguage);
        } else {
            // Default dropdown layout
            return $this->renderDropdown($languageItems, $currentLanguage);
        }
    }

    // Render dropdown layout
    private function renderDropdown($languageItems, $currentLanguage)
    {
        return Html::tag('div', 
            Html::tag('button', 
                $this->supportedLanguages[$currentLanguage] ?? 'Language', 
                [
                    'class' => 'btn btn-secondary dropdown-toggle',
                    'type' => 'button',
                    'id' => 'languageDropdown',
                    'data-bs-toggle' => 'dropdown',
                    'aria-expanded' => 'false',
                    'style' => 'z-index: 1000;',
                ]
            ) . Html::tag('ul', 
                implode('', array_map(function($item) {
                    return Html::tag('li', 
                        Html::a($item['label'], $item['url'], ['class' => $item['active'] ? 'dropdown-item active' : 'dropdown-item'])
                    );
                }, $languageItems)), 
                [
                    'class' => 'dropdown-menu',
                    'aria-labelledby' => 'languageDropdown'
                ]
            ), 
            ['class' => 'dropdown']
        );
    }

    // Render inline layout with | separators
    private function renderInline($languageItems, $currentLanguage)
    {
        $inlineLinks = array_map(function($item) use ($currentLanguage) {
            $class = $item['active'] ? 'active' : '';
            return Html::a($item['label'], $item['url'], ['class' => $class]);
        }, $languageItems);

        // Join links with | separator
        return implode(' | ', $inlineLinks);
    }
}

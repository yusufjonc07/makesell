<?php

namespace common\widgets;

use Yii;
use yii\base\Widget;

class ProfileView extends Widget
{
    public $title = null;
    public $subtitle = 'Some Sub Title';
    public $profileImage = null;
    public $underTitle = null;
    public $tabs = [];
    public $dropdown = [];
    public $cardContainer = false;

    public function run()
    {

        return $this->render('profileView', [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'profileImage' => $this->profileImage,
            'tabs' => $this->tabs,
            'cardContainer' => $this->cardContainer,
            'dropdown' => $this->dropdown,
            'underTitle' => $this->underTitle,
        ]);
    }
}
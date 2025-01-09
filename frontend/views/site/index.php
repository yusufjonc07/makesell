<?php

use Yii;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';

echo $this->render('sections/intro', [
    'products'=>$introProducts
]);

echo $this->render('sections/discount', [
    'email'=>Yii::$app->params['adminEmail'],
]);

echo $this->render('sections/featured', [
    'products'=>$introProducts
]);


?>

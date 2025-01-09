<?php


/** @var yii\web\View $this */

$this->title = 'My Yii Application';

echo $this->render('sections/intro', [
    'products'=>$introProducts
]);

echo $this->render('sections/discount', [
    'email'=>Yii::$app->params['adminEmail'],
]);

echo $this->render('sections/row', [
    'products'=>$featuredProducts,
    'title'=>Yii::t('app', 'Featured Products')
]);

echo $this->render('sections/row', [
    'products'=>$latestProducts,
    'title'=>Yii::t('app', 'Latest Products')
]);


?>

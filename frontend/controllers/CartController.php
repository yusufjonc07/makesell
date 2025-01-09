<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class CartController extends Controller
{
    public function actionIndex()
    {
        $cart = Yii::$app->session->get('cart', []);
        return $this->render('index', ['cart' => $cart]);
    }

    public function actionAdd($id)
    {
        $session = Yii::$app->session;
        $cart = $session->get('cart', []);

        // Example product retrieval logic
        $product = Product::findOne($id);
        if ($product) {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => ($cart[$id]['quantity'] ?? 0) + 1,
            ];
            $session->set('cart', $cart);
        }

        return $this->redirect(['cart/index']);
    }

    public function actionRemove($id)
    {
        $session = Yii::$app->session;
        $cart = $session->get('cart', []);
        unset($cart[$id]);
        $session->set('cart', $cart);

        return $this->redirect(['cart/index']);
    }
}

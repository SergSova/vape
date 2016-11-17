<?php
/**
 * Created by PhpStorm.
 * User: sova
 * Date: 16.11.16
 * Time: 14:57
 */

namespace backend\controllers;


use common\models\Cart;
use common\models\Order;
use common\models\OrderDetail;
use common\models\Product;
use yii\web\Controller;

class OrderController extends Controller
{
    public function actionIndex()
    {
        return $this->render('_form', ['model' => new Order()]);
    }

    public function AddProduct($product_id, $count, $option_id = null)
    {
        if ($count <= 0) return false;
        $product = Product::findOne($product_id);
        $od = new OrderDetail([
            'product_id' => $product_id,
            'old_price' => $product->price,
            'count' => $count
        ]);
    }

    public function actionAddOrder()
    {
        $carts = Cart::getAllCartUser();
        foreach ($carts as $cart) {
            $this->AddProduct($cart->product_id, $cart->count);
        }
    }

}
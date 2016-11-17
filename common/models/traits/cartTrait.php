<?php

namespace common\models\traits;


use common\models\Cart;
use Yii;

trait cartTrait
{
    /**
     * @return bool|Cart[]
     */
    public static function getAllCartUser()
    {
        $condition = [
            'user_id' => Cart::getUserId(),
        ];
        if (Cart::find()->where($condition)->exists())
            return $cart = Cart::find()->where($condition)->one();
        return false;
    }

    public static function getCart($product_id, $option_id)
    {
        $condition = [
            'user_id' => Cart::getUserId(),
            'product_id' => $product_id,
            'option_id' => $option_id
        ];
        if (Cart::find()->where($condition)->exists())
            $cart = Cart::find()->where($condition)->one();
        else
            $cart = new Cart($condition);
        return $cart;
    }

    public
    function getFull_price()
    {
        return $this->product->price + $this->option->price;
    }

    public
    static function getUserId()
    {
        if (Yii::$app->user->isGuest) {
            $user_id = Yii::$app->session->get('user_id');
            $user_id = $user_id ? $user_id : Yii::$app->security->generateRandomString();
        } else $user_id = Yii::$app->user->id;
        Yii::$app->session->set('user_id', $user_id);
        return $user_id;
    }
}
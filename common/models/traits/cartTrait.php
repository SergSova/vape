<?php

namespace common\models\traits;


use common\models\Cart;
use common\models\Option;
use common\models\User;
use Yii;

trait cartTrait
{
    /**
     * @return bool|Cart[]
     */
    public static function getAllCartUser()
    {
        $condition = [
            'user_id' => User::getUserId(),
        ];
        if (Cart::find()->where($condition)->exists())
            return $cart = Cart::find()->where($condition)->all();
        return false;
    }

    public static function getCart($product_id, $option_id)
    {
        $options = [];
        if ($option_id) {
            foreach ($option_id as $item) {
                if ($item == '') continue;
                $options[] = $item;
            }
        }
        $condition = [
            'user_id' => User::getUserId(),
            'product_id' => $product_id,
            'option_id' => json_encode($options)
        ];
        if (Cart::find()->where($condition)->exists())
            $cart = Cart::find()->where($condition)->one();
        else
            $cart = new Cart($condition);
        return $cart;
    }

    public function getOptions()
    {
        $options = Option::findAll(json_decode($this->option_id));
        return $options ? $options : [];
    }

    public
    function getFull_price()
    {
        $optionPrice = 0;
        foreach (json_decode($this->option_id) as $item) {
            $optionPrice += Option::findOne($item)->price;
        }
        return $this->product->price + $optionPrice;
    }


}
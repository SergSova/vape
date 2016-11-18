<?php

namespace common\models\traits;


use common\models\Cart;
use common\models\OrderDetail;
use common\models\Product;
use common\models\User;
use Yii;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

trait orderTrait
{
    public function getAllCustomer()
    {
        return User::find()->all();
    }

    public function getStatusMap()
    {
        return ['received' => 'Получен', 'accepted' => 'Подтвержден', 'sent' => 'Отправлен', 'canceled' => 'Отменен'];
    }

    public function AddProduct($order_id, $product_id, $count, $options)
    {
        if ($count <= 0) return false;
        $product = Product::findOne($product_id);
        $od = new OrderDetail([
            'order_id' => $order_id,
            'product_id' => $product_id,
            'old_price' => $product->price,
            'count' => $count,
            'options' => $options,
        ]);
        if ($od->save()) {
            return $od;
        }
        throw new Exception($od->errors);
    }

    public function AddOrder()
    {
        $carts = Cart::getAllCartUser();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if (!$this->save()) throw new Exception($this->errors);
            foreach ($carts as $cart) {
                $order_details[] = $this->AddProduct($this->id, $cart->product_id, $cart->count, $cart->option_id);
            }

            foreach ($carts as $cart) {
                $cart->delete();
            }

            $transaction->commit();
            return true;
        } catch (Exception $e) {
            $transaction->rollBack();
            return false;
        }
    }
}
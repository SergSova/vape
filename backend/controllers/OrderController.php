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
use common\models\traits\orderTrait;
use common\models\User;
use Yii;
use yii\web\Controller;

class OrderController extends Controller
{
    public function actionIndex()
    {
        /** @var User $user */
        if (Yii::$app->user->isGuest) {
            $user_id = User::getUserId();
            $orders = Order::find()->where(['user_id' => $user_id])->all();
        } else {
            $orders = Yii::$app->user->identity->orders;
        }

        if ($user->role == 'admin') {
            $orders = Order::find()->all();
        }

        return $this->render('index', ['model' => $orders]);
    }


    public function actionAddOrder()
    {
        $order = new Order();

        if ($order->load(Yii::$app->request->post()) && $order->AddOrder()) {
            return $this->goHome();
        }

        return $this->render('_form', ['order' => $order,]);
    }


}
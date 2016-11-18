<?php

namespace backend\controllers;

use common\models\Cart;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * CartController implements the CRUD actions for Cart model.
 */
class CartController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cart models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Cart::find()->where(['user_id' => User::getUserId()])->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionAddProduct(/*$product_id, $count, $options*/)
    {
        $cart_p = Yii::$app->request->post('Cart');
        $cart = Cart::getCart($cart_p['product_id'], $cart_p['options']);
        $cart->count += $cart_p['count'];
        if ($cart->save())
            return $this->redirect(['index']);
        else  return var_dump($cart->errors);
    }

    public function actionRemoveProduct($cart_id)
    {
        Cart::findOne($cart_id)->delete();
        return $this->redirect(['index']);
    }

}

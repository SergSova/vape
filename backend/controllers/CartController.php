<?php

namespace backend\controllers;

use common\models\Cart;
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
        $model = Cart::find()->where(['user_id' => Cart::getUserId()])->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionAddProduct($product_id, $count, $option_id = null)
    {
//        $cart = Cart::getInstance();
//        $cart->product_id = $id;
//        $cart->count = $count;
//        $cart->option_id = $option_id;
//        $cart->save();

        $cart = Cart::getCart($product_id, $option_id);
        $cart->count += $count;
        if ($cart->save())
            return $this->redirect(['index']);
        else  return var_dump($cart->errors);
    }

    public function actionRemoveProduct($product_id, $option_id = null)
    {
        $cart = Cart::getCart($product_id, $option_id);
        $cart->delete();
        return $this->redirect(['index']);
    }

}

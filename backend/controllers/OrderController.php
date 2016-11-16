<?php
/**
 * Created by PhpStorm.
 * User: sova
 * Date: 16.11.16
 * Time: 14:57
 */

namespace backend\controllers;


use common\models\Order;
use yii\web\Controller;

class OrderController extends Controller
{
    public function actionIndex()
    {
        return $this->render('_form', ['model' => new Order()]);
    }

}
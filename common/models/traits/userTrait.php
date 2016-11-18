<?php

namespace common\models\traits;


use Yii;
use yii\helpers\ArrayHelper;

trait userTrait
{
    /**
     * Return mapped deliver to user
     * @return array
     */
    public function getDeliversMap()
    {
        return ArrayHelper::map($this->delivers, 'id', 'place');
    }

    public static function getUserId()
    {
        if (Yii::$app->user->isGuest) {
            $user_id = Yii::$app->session->get('user_id');
            $user_id = $user_id ? $user_id : Yii::$app->security->generateRandomString();
        } else $user_id = Yii::$app->user->id;
        Yii::$app->session->set('user_id', $user_id);
        return $user_id;
    }
}
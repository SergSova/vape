<?php

namespace common\models\traits;


use common\models\User;

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
}
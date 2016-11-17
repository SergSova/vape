<?php

namespace common\models\traits;


use yii\helpers\ArrayHelper;

trait userTrait
{
    /**
     * Return maped deliver to user
     * @return array
     */
    public function getDeliversMap()
    {
        return ArrayHelper::map($this->delivers, 'id', 'place');
    }
}
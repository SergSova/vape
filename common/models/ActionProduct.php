<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%action_product}}".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $action_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class ActionProduct extends ActiveRecord
{
    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%action_product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'action_id', 'created_at', 'updated_at'], 'required'],
            [['product_id', 'action_id', 'created_at', 'updated_at'], 'integer'],
            [['action_id'], 'exist', 'skipOnError' => true, 'targetClass' => Action::className(), 'targetAttribute' => ['action_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'action_id' => 'Action ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

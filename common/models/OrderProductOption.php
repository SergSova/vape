<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%order_product_option}}".
 *
 * @property integer $id
 * @property integer $order_detail_id
 * @property integer $option_id
 * @property string $old_price
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Option $option
 * @property OrderDetail $orderDetail
 */
class OrderProductOption extends \yii\db\ActiveRecord
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
        return '{{%order_product_option}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_detail_id', 'option_id', 'old_price'], 'required'],
            [['order_detail_id', 'option_id', 'created_at', 'updated_at'], 'integer'],
            [['old_price'], 'number'],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => Option::className(), 'targetAttribute' => ['option_id' => 'id']],
            [['order_detail_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderDetail::className(), 'targetAttribute' => ['order_detail_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_detail_id' => 'Order Detail ID',
            'option_id' => 'Option ID',
            'old_price' => 'Old Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOption()
    {
        return $this->hasOne(Option::className(), ['id' => 'option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetail()
    {
        return $this->hasOne(OrderDetail::className(), ['id' => 'order_detail_id']);
    }
}

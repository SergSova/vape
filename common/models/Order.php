<?php

namespace common\models;

use common\models\traits\orderTrait;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property integer $id
 * @property string $status
 * @property integer $deliver_id
 * @property integer $customer
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $customer0
 * @property Deliver $deliver
 * @property OrderDetail[] $orderDetails
 */
class Order extends ActiveRecord
{
    use orderTrait;

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
        return '{{%order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'string'],
            [['deliver_id'], 'required'],
            [['deliver_id', 'customer', 'created_at', 'updated_at'], 'integer'],
            [
                ['customer'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::className(),
                'targetAttribute' => ['customer' => 'id']
            ],
            [
                ['deliver_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Deliver::className(),
                'targetAttribute' => ['deliver_id' => 'id']
            ],
            ['customer', 'default', 'value' => Yii::$app->user->id]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'deliver_id' => 'Deliver ID',
            'customer' => 'Customer',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer0()
    {
        return $this->hasOne(User::className(), ['id' => 'customer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliver()
    {
        return $this->hasOne(Deliver::className(), ['id' => 'deliver_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['order_id' => 'id']);
    }

}

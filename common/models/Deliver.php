<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%deliver}}".
 *
 * @property integer $id
 * @property string $place
 * @property string $address
 * @property string $country
 * @property string $city
 * @property string $phone
 * @property string $contact_name
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 * @property Order[] $orders
 */
class Deliver extends \yii\db\ActiveRecord
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
        return '{{%deliver}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place', 'address', 'country', 'city'], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['place', 'address', 'country', 'city', 'phone', 'contact_name'], 'string', 'max' => 255],
            [
                ['user_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::className(),
                'targetAttribute' => ['user_id' => 'id']
            ],
            [['user_id'], 'default', 'value' => Yii::$app->user->id],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'place' => 'Place',
            'address' => 'Address',
            'country' => 'Country',
            'city' => 'City',
            'phone' => 'Phone',
            'contact_name' => 'Contact Name',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['deliver_id' => 'id']);
    }
}

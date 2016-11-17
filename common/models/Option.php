<?php

namespace common\models;

use common\models\traits\iconTrait;
use common\models\traits\optionTrait;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%option}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $cat_option_id
 * @property string $price
 * @property string $icon
 * @property string $description
 * @property integer $stock
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Cart[] $carts
 * @property OptionCategory $catOption
 * @property OptionProduct[] $optionProducts
 * @property OrderDetail[] $orderDetails
 */
class Option extends ActiveRecord
{
    use iconTrait;
    use optionTrait;
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
        return '{{%option}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'cat_option_id', 'price', 'description'], 'required'],
            [['cat_option_id', 'stock', 'created_at', 'updated_at'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name', 'icon'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['cat_option_id'], 'exist', 'skipOnError' => true, 'targetClass' => OptionCategory::className(), 'targetAttribute' => ['cat_option_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'cat_option_id' => 'Cat Option ID',
            'price' => 'Price',
            'icon' => 'Icon',
            'description' => 'Description',
            'stock' => 'Stock',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['option_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatOption()
    {
        return $this->hasOne(OptionCategory::className(), ['id' => 'cat_option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionProducts()
    {
        return $this->hasMany(OptionProduct::className(), ['option_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['option_id' => 'id']);
    }
}

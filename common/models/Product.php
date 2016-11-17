<?php

namespace common\models;

use common\models\traits\productTrait;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "vps_product".
 *
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property string $gallery
 * @property string $price
 * @property string $description
 * @property integer $stock
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ActionProduct[] $actionProducts
 * @property CategoryProduct[] $categoryProducts
 * @property OptionProduct[] $optionProducts
 * @property OrderDetail[] $orderDetails
 */
class Product extends ActiveRecord
{
    use productTrait;

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
        return 'vps_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'description'], 'required'],
            [['gallery', 'description'], 'string'],
            [['price', 'stock'], 'number', 'min' => 0],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'icon'], 'string', 'max' => 255],
            ['stock', 'default', 'value' => 0],
            [['options', 'categories'], 'safe'],
            [['name'], 'unique'],
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
            'icon' => 'Icon',
            'gallery' => 'Gallery',
            'price' => 'Price',
            'description' => 'Description',
            'stock' => 'Stock',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActionProducts()
    {
        return $this->hasMany(ActionProduct::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryProducts()
    {
        return $this->hasMany(CategoryProduct::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionProducts()
    {
        return $this->hasMany(OptionProduct::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['product_id' => 'id']);
    }

}

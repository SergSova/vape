<?php

namespace common\models;

use common\models\traits\cartTrait;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%cart}}".
 *
 * @property integer $id
 * @property string $user_id
 * @property integer $product_id
 * @property integer $count
 * @property string $option_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Option $option
 * @property Product $product
 */
class Cart extends ActiveRecord
{

    use cartTrait;

    /**
     * @inheritdoc
     */
    public
    function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public
    static function tableName()
    {
        return '{{%cart}}';
    }

    /**
     * @inheritdoc
     */
    public
    function rules()
    {
        return [
            [['user_id'], 'required'],
            [['product_id', 'count', /*'option_id',*/ 'created_at', 'updated_at'], 'integer'],
            /*[
                ['option_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Option::className(),
                'targetAttribute' => ['option_id' => 'id']
            ],*/
            [
                ['product_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Product::className(),
                'targetAttribute' => ['product_id' => 'id']
            ],
            ['option_id','safe'],
            ['count', 'default', 'value' => 0]
        ];
    }

    /**
     * @inheritdoc
     */
    public
    function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User_id',
            'product_id' => 'Product ID',
            'count' => 'Count',
            'option_id' => 'Option ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public
//    function getOption()
//    {
//        return $this->hasOne(Option::className(), ['id' => 'option_id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public
    function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }


}

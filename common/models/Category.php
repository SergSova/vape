<?php

namespace common\models;

use common\models\traits\iconTrait;
use Yii;
use yii\alexposseda\fileManager\FileManager;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property integer $parent
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Category $parent0
 * @property Category[] $categories
 * @property CategoryProduct[] $categoryProducts
 * @property OptionProduct[] $optionProducts
 */
class Category extends ActiveRecord
{
    use iconTrait;
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
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent', 'created_at', 'updated_at'], 'integer'],
            [['name', 'icon'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent' => 'id']],
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
            'parent' => 'Parent',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['parent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryProducts()
    {
        return $this->hasMany(CategoryProduct::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionProducts()
    {
        return $this->hasMany(OptionProduct::className(), ['category_id' => 'id']);
    }
}

<?php

namespace common\models\traits;


use common\models\CategoryProduct;
use common\models\OptionProduct;
use yii\alexposseda\fileManager\FileManager;

trait productTrait
{
    public $categories;
    public $options;

    public function afterFind()
    {
        if (is_null($this->categories)) $this->categories = [];
        foreach ($this->categoryProducts as $categoryProduct) {
            array_push($this->categories, $categoryProduct->category_id);
        }
        if (is_null($this->options)) $this->options = [];
        foreach ($this->optionProducts as $optionProduct) {
            array_push($this->options, $optionProduct->option_id);
        }

    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub

        //clear icon session
        $icon = json_decode($this->icon);
        if (!empty($icon)) {
            FileManager::getInstance()
                ->removeFromSession($icon[0]);
        }
        //clear gallery session
        $gallery = json_decode($this->gallery);
        if (!empty($gallery)) {
            foreach ($gallery as $img) {
                FileManager::getInstance()
                    ->removeFromSession($img);
            }
        }
        //save options
        if (!empty($this->options)) {
            foreach ($this->options as $option_id) {
                if (!$this->getOptionProducts()->where(['option_id' => $option_id])->exists()) {
                    $opt_prod = new OptionProduct(['product_id' => $this->id, 'option_id' => $option_id]);
                    $opt_prod->save();
                }
            }
        }
        //remove unselected option
        $tmp_op = $this->getOptionProducts()->where(['not in', 'option_id', $this->options])->all();
        foreach ($tmp_op as $op) {
            $op->delete();
        }

        //save categories
        if (!empty($this->categories)) {
            foreach ($this->categories as $category_id) {
                if (!$this->getCategoryProducts()->where(['category_id' => $category_id])->exists()) {
                    $cat_prod = new CategoryProduct(['product_id' => $this->id, 'category_id' => $category_id]);
                    $cat_prod->save();
                }
            }
        }
        //remove unselected categories
        $tmp_cat = $this->getCategoryProducts()->where(['not in', 'category_id', $this->categories])->all();
        foreach ($tmp_cat as $cat) {
            $cat->delete();
        }
    }

    /**
     * Return src to icon
     * @return string
     */
    public function getIcon()
    {
        $icon = json_decode($this->icon);
        return FileManager::getInstance()->getStorageUrl() . (!empty($icon[0]) ? $icon[0] : 'no_image.jpg');
    }

    /**
     * Return option to product in mapped array
     * @return array
     */
    public function getOptionProductMap()
    {
        $map = [];
        foreach ($this->optionProducts as $optionProduct) {
            $map[$optionProduct->option_id] = $optionProduct->option->name;
        }

        return $map;
    }
}
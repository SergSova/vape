<?php

use backend\widgets\FileManagerWidget\FileManagerWidget;
use common\models\Category;
use common\models\OptionCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */

$category = ArrayHelper::map(Category::find()->all(), 'id', 'name');
if ($model->isNewRecord) {
    $opt_category = OptionCategory::find()->all();
}
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <?= $form->field($model, 'name', ['options' => ['class' => 'col-lg-6']])
                    ->textInput(['placeholder' => 'Название']) ?>
                <?= $form->field($model, 'categories', ['options' => ['class' => 'col-lg-6']])
                    ->dropDownList($category, [
                        'multiple' => 'multiple',
                    ]) ?>
                <?= $form->field($model, 'price', ['options' => ['class' => 'col-lg-4']])->input('money') ?>
                <?= $form->field($model, 'stock', ['options' => ['class' => 'col-lg-4']])->input('number') ?>
            </div>
            <?= $form->field($model, 'description')->textarea([
                'rows' => 6,
                'placeholder' => 'Описание'
            ]) ?>
            <?php /** @var OptionCategory[] $opt_category */
            foreach ($opt_category as $optCat): ?>
                <h4><?= $optCat->name ?></h4>
                <?= $form->field($model, 'options')
                    ->checkboxList(ArrayHelper::map($optCat->options, 'id', 'name'))->label(false) ?>
            <?php endforeach; ?>
        </div>
        <div class="col-lg-6">
            <?= Html::activeHiddenInput($model, 'icon', ['id' => 'product-cover']) ?>
            <?= FileManagerWidget::widget([
                'uploadUrl' => Url::to(['product-cover-upload']),
                'removeUrl' => Url::to(['product-cover-remove']),
                'files' => ($model->isNewRecord) ? '' : $model->icon,
                'targetInputId' => 'product-cover',
                'maxFiles' => 1,
                'title' => 'Cover'
            ]) ?>
            <?= Html::activeHiddenInput($model, 'gallery', ['id' => 'product-gallery']) ?>
            <?= FileManagerWidget::widget([
                'uploadUrl' => Url::to(['product-gallery-upload']),
                'removeUrl' => Url::to(['product-gallery-remove']),
                'files' => ($model->isNewRecord) ? '' : $model->icon,
                'targetInputId' => 'product-gallery',
                'maxFiles' => 5,
                'title' => 'Gallery'
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use backend\widgets\FileManagerWidget\FileManagerWidget;
use common\models\Category;
use common\models\Option;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */

$category = ArrayHelper::map(Category::find()->all(), 'id', 'name');
$options = ArrayHelper::map(Option::find()->all(), 'id', 'name');
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
            <?= $form->field($model, 'options')
                ->dropDownList($options, ['multiple' => 'multiple']) ?>
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

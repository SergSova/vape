<?php

use backend\widgets\FileManagerWidget\FileManagerWidget;
use common\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */

$category = ArrayHelper::map(Category::find()->all(), 'id', 'name');
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'parent')->dropDownList($category, ['prompt' => 'Выберете родителя']) ?>
        </div>
        <div class="col-lg-6">
            <?= Html::activeHiddenInput($model, 'icon', ['id' => 'category-icon']) ?>
            <?= FileManagerWidget::widget([
                'uploadUrl' => Url::to(['category-upload']),
                'removeUrl' => Url::to(['category-remove']),
                'files' => ($model->isNewRecord) ? '' : $model->icon,
                'targetInputId' => 'category-icon',
                'maxFiles' => 1,
                'title' => 'Icon'
            ]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

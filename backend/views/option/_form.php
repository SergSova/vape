<?php

use backend\widgets\FileManagerWidget\FileManagerWidget;
use common\models\OptionCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Option */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="option-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'cat_option_id')->dropDownList(ArrayHelper::map(OptionCategory::find()->all(), 'id', 'name')) ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <div class="row">
                <div class="col-lg-8">
                    <?= $form->field($model, 'price')->input('money') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'stock')->input('number') ?>
                </div>
            </div>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            <div class="row"></div>
        </div>
        <div class="col-lg-6">
            <?= Html::activeHiddenInput($model, 'icon', ['id' => 'option-icon']) ?>
            <?= FileManagerWidget::widget([
                'uploadUrl' => Url::to(['option-upload']),
                'removeUrl' => Url::to(['option-remove']),
                'files' => ($model->isNewRecord) ? '' : $model->icon,
                'targetInputId' => 'option-icon',
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

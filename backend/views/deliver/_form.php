<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\Deliver */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deliver-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-danger">
        <p class="panel-heading"><?= $this->title ?></p>
        <div class="panel-body">
            <div class="row">
                <?= $form->field($model, 'place', ['options' => ['class' => 'col-lg-12']])->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'address', ['options' => ['class' => 'col-lg-12']])->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'country', ['options' => ['class' => 'col-lg-3']])->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'city', ['options' => ['class' => 'col-lg-3']])->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'phone', ['options' => ['class' => 'col-lg-3']])->widget(MaskedInput::className(), [
                    'mask' => '999-999-9999',
                ]) ?>
                <?= $form->field($model, 'contact_name', ['options' => ['class' => 'col-lg-3']])->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="panel-footer form-group no-margin">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

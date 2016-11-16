<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\SearchProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
<div class="row">
    <?= $form->field($model, 'name',['options'=>['class'=>'col-lg-4']]) ?>
    <?= $form->field($model, 'price',['options'=>['class'=>'col-lg-4']]) ?>
    <div class="col-lg-4 action">
        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>

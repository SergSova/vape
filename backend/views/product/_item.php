<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\models\Product
 */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\Url;

?>
<a href="<?= Url::to(['view', 'id' => $model->id]) ?>">
    <img src="<?= $model->Icon ?>" alt="">
    <div class="product-info">
        <?= $model->name ?>
        <p class="product-price"><?= $model->price ?></p>
    </div>
</a>
<div class="product-order">
    <?php $order = ActiveForm::begin(['method' => 'get', 'action' => ['cart/add-product']]) ?>
    <?= Html::hiddenInput('product_id', $model->id) ?>
    <?php if ($model->stock >= 1): ?>
        <?= Html::input('number', 'count', 1, ['min' => 1, 'max' => $model->stock]) ?>
    <?php else: ?>
        <p>Нет в наличии</p>
    <?php endif; ?>
    <?= Html::radioList('option_id', '', $model->getOptionProductMap()) ?>
    <?= Html::submitButton('Купить', ['class' => 'btn btn-warning', 'disabled' => $model->stock < 1]) ?>
    <?php ActiveForm::end() ?>
</div>


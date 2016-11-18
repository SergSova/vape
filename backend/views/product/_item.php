<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\models\Product
 */
use common\models\OptionCategory;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
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
    <?php $order = ActiveForm::begin([/*'method' => 'get',*/ 'action' => ['cart/add-product']]) ?>
    <?= Html::hiddenInput('Cart[product_id]', $model->id) ?>
    <?php if ($model->stock >= 1): ?>
        <?= Html::input('number', 'Cart[count]', 1, ['min' => 1, 'max' => $model->stock]) ?>
    <?php else: ?>
        <p>Нет в наличии</p>
    <?php endif; ?>
    <?php /** @var OptionCategory $opt_cat */
    foreach ($model->getOptionCategory() as $opt_cat): ?>
        <h4><?= $opt_cat->name ?></h4>
        <?= Html::dropDownList('Cart[options][]', null, ArrayHelper::map($opt_cat->options, 'id', 'name'),['prompt'=>'select option']) ?>
    <?php endforeach; ?>
    <?= Html::submitButton('Купить', ['class' => 'btn btn-warning', 'disabled' => $model->stock < 1]) ?>
    <?php ActiveForm::end() ?>
</div>


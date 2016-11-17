<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\models\Cart[]
 */
use yii\bootstrap\Html;

?>
<?php foreach ($model as $item): ?>
    <div class="cart-item"
         style="border: 1px solid black; display: inline-block; height: 200px; width: 150px; vertical-align: top">
        <div>
            <span>Name </span> <?= $item->product->name ?>
        </div>
        <div>
            <span>Price </span><?= $item->getFull_price() ?>
        </div>
        <div>
            <span>Count </span><?= Html::input('number', 'count', $item->count, ['style' => ['width' => '40px']]) ?>
        </div>
        <div>
            <span>Img </span><img src="<?= $item->product->Icon ?>" alt="">
        </div>
        <div>
            <span>Option </span><?= $item->option->name ?><img src="<?= $item->option->Icon ?>" alt="">
        </div>
        <div>
            <span>Summ: </span><?= $item->getFull_price() * $item->count ?>
        </div>
        <?= Html::a('Remove', ['remove-product', 'product_id' => $item->product_id, 'option_id' => $item->option_id], [
            'class' => 'btn btn-danger',
            'data-confirm' => 'Remove'
        ]) ?>
    </div>
<?php endforeach; ?>
<?= Html::a('Оформить', ['add-order'], ['class' => 'btn btn-success']) ?>
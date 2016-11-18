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
        <h4>Option</h4>
        <?php foreach ($item->getOptions() as $option) : ?>
            <div>
                <img src="<?= $option->Icon ?>" alt=""><?= $option->name ?>
            </div>
        <?php endforeach; ?>
        <div>
            <span>Summ: </span><?= $item->getFull_price() * $item->count ?>
        </div>
        <?= Html::a('Remove', ['remove-product', 'cart_id' => $item->id], [
            'class' => 'btn btn-danger',
            'data-confirm' => 'Remove'
        ]) ?>
    </div>
<?php endforeach; ?>
<?php if (count($model)): ?>
    <?= Html::a('Оформить', ['order/add-order', 'user_id' => $model[0]->user_id], ['class' => 'btn btn-success']) ?>
<?php endif; ?>
<?= Html::a('Добавить продукт', ['product/index'], ['class' => 'btn btn-info']) ?>

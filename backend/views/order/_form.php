<?php
/**
 * @var $this \yii\web\View
 * @var $order common\models\Order
 */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

if (!Yii::$app->user->isGuest) {
    $delivery = Yii::$app->user->identity->getDeliversMap();
} else $delivery = [];

?>
<?php $form = ActiveForm::begin() ?>
    <div class="row">
        <div class="col-lg-6">

            <?= $form->field($order, 'deliver_id')->dropDownList($delivery) ?>
            <div class="form-group">
                <?= Html::a('Добавить место', ['deliver/create'], ['class' => 'btn btn-primary']) ?>
            </div>
            <?= $form->field($order, 'customer')->dropDownList(ArrayHelper::map($order->getAllCustomer(), 'id', 'username')) ?>
            <?= $form->field($order, 'status')->dropDownList($order->getStatusMap(), [
                'readonly' => true,
                'disabled' => true
            ]) ?>
            <p>Детали заказа</p>
            <?php foreach ($order->orderDetails as $orderDetail) : ?>
                <?= $orderDetail->product->name ?>
                <?= $orderDetail->old_price ?>
            <?php endforeach; ?>
        </div>
    </div>
<?= Html::submitButton('save') ?>
<?php ActiveForm::end() ?>
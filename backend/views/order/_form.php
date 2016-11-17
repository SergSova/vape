<?php
/**
 * @var $this \yii\web\View
 * @var $model common\models\Order
 */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

if (!Yii::$app->user->isGuest) {
    $delivery = Yii::$app->user->identity->getDeliversMap();
}

?>
<?php $form = ActiveForm::begin() ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'deliver_id')->dropDownList(isset($delivery) ? $delivery : []) ?>
            <div class="form-group">
                <?= Html::a('Добавить место', ['deliver/create'], ['class' => 'btn btn-primary']) ?>
            </div>
            <?= $form->field($model, 'customer')->dropDownList(ArrayHelper::map($model->getAllCustomer(), 'id', 'username')) ?>
            <?= $form->field($model, 'status')->dropDownList($model->getStatusMap(), [
                'readonly' => true,
                'disabled' => true
            ]) ?>
            <p>Детали заказа</p>
            <?= Html::a('Добавить продукт', ['product/index'], ['class' => 'btn btn-info']) ?>
            <?php foreach ($model->orderDetails as $orderDetail) : ?>
                <?= $orderDetail->product->name ?>
                <?= $orderDetail->old_price ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
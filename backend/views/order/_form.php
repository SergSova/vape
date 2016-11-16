<?php
/**
 * @var $this \yii\web\View
 * @var $model common\models\Order
 */
use common\models\User;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

if (!Yii::$app->user->isGuest) {
    $delivery = ArrayHelper::map(Yii::$app->user->identity->delivers, 'id', 'place');
}

$customers = ArrayHelper::map(User::find()->all(), 'id', 'username');

?>
<?php $form = ActiveForm::begin() ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'deliver_id')->dropDownList($delivery) ?>
            <div class="form-group">
                <?= Html::a('Добавить место', ['deliver/create'], ['class' => 'btn btn-primary']) ?>
            </div>
            <?= $form->field($model, 'customer')->dropDownList($customers) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
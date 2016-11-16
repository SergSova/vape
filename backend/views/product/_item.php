<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\models\Product
 */
use yii\helpers\Url;

?>
<div class="row">
    <a href="<?= Url::to(['view', 'id' => $model->id]) ?>">
        <div class="col-lg-1">
            <img src="<?= $model->Icon ?>" alt="">
        </div>
        <div class="col-lg-10">
            <p><?= $model->name ?></p>
            <p><?= $model->price ?></p>
        </div>
    </a>
</div>


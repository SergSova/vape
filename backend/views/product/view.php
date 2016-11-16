<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <p><span>Название: </span><?= $model->name ?></p>
    <img src="<?= $model->Icon ?>">
    <p><span>Цена: </span><?= $model->price ?></p>
    <p><span>Описание: </span><?= $model->description ?></p>
    <p><span>На складе: </span><?= $model->stock ?></p>
    <?php foreach ($model->optionProducts as $op): ?>
        <a href="<?= Url::to(['option/view', 'id' => $op->option_id]) ?>">
            <img src="<?= $op->option->Icon?>">
            <?= $op->option->name ?>
        </a>
    <?php endforeach; ?>

</div>

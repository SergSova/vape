<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Deliver */

$this->title = 'Update Deliver: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Delivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="deliver-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

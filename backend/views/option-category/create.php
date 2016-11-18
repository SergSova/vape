<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OptionCategory */

$this->title = 'Create Option Category';
$this->params['breadcrumbs'][] = ['label' => 'Option Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="option-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

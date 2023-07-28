<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Transporters $model */

$this->title = 'Update Transporters: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transporters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transporters-update">

    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

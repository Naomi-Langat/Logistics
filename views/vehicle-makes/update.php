<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\VehicleMakes $model */

$this->title = 'Update Vehicle Makes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Makes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehicle-makes-update">

    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

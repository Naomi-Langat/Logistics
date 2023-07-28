<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\VehicleMakes $model */

$this->title = 'Create Vehicle Makes';
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Makes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-makes-create">

    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\VehicleTypes $model */

$this->title = 'Create Vehicle Types';
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-types-create">

    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

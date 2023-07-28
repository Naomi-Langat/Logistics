<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TripDetails $model */

$this->title = 'Update Trip Details: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Trip Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trip-details-update">

    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TripDetails $model */

$this->title = 'Trip Details';
$this->params['breadcrumbs'][] = ['label' => 'Trip Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

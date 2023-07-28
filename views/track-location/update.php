<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TrackLocation $model */

$this->title = 'Update Track Location: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Track Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="track-location-update">

    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

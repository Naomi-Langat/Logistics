<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TrackLocation $model */

$this->title = 'Create Track Location';
$this->params['breadcrumbs'][] = ['label' => 'Track Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="track-location-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

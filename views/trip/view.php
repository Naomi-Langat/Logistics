<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Trip $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="trip-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Details', ['/trip-details/', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'VehicleID',
                'value' => function ($model) {
                    return $model->vehicle->REG_No;
                },
            ],
            [
                'attribute' => 'DriverID',
                'value' => function ($model) {
                    return $model->driver->Surname.' '.$model->driver->Othernames;
                },
            ],
            'TripDate',
            'DispatchRefNo',
            [
                'attribute' => 'SourceStationID',
                'value' => function ($model) {
                    return $model->sourceStation->StationName;
                },
            ],
            [
                'attribute' => 'DestinationStationID',
                'value' => function ($model) {
                    return $model->destinationStation->StationName;
                },
            ],
            //'CreatedBy',
            //'CreatedDate',
        ],
    ]) ?>

</div>

<?php

use app\models\Trip;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Trips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Trip', ['create'], ['class' => 'btn btn-success float-right']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'label'=>'Vehicle REG-No',
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
            //'SourceStationID',
            //'DestinationStationID',
            //'CreatedBy',
            //'CreatedDate',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Trip $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

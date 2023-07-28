<?php

use app\models\VehicleTypes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Vehicle Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-types-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vehicle Types', ['create'], ['class' => 'btn btn-success float-right']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Description',
            'CreatedBy',
            'CreatedDate',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, VehicleTypes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

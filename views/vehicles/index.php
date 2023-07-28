<?php

use app\models\Vehicles;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Vehicles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Vehicle', ['create'], ['class' => 'btn btn-success float-right']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'REG_No',
            [
                'attribute' => 'MakeID',
                'value' => function ($model) {
                    return $model->make->MakeName;
                },
            ],
            [
                'attribute' => 'TypeID',
                'value' => function ($model) {
                    return $model->type->Description;
                },
            ],
            [
                'attribute' => 'Capacity',
                'value' => function ($model) {
                    return $model->Capacity.' kgs';
                },
            ],
            [
                'attribute' => 'Status',
                'value' => function ($model) {
                    if ($model->Status == 1) {
                        return 'Busy';
                    } else {
                        return 'Available';
                    }
                },
            ],
            [
                'label' => 'Trips completed',
                'value' => function ($model) {
                    $modelArray = (array) $model->trips; // Convert the object to an array
                    $filteredModels = array_filter($modelArray, function ($item) {
                        return isset($item['Status']) && $item['Status'] == 2;
                    });
                    return count($filteredModels);
                },
            ],  
            //'TransporterID',
            //'LogbookNo',
            //'CreateBy',
            //'CreatedDate',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Vehicles $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

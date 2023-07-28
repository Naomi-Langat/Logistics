<?php

use app\models\Drivers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Drivers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drivers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Driver', ['create'], ['class' => 'btn btn-success float-right']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Surname',
            'Othernames',
            'DrivingLicenceNo',
            'MobileNo',
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
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Drivers $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

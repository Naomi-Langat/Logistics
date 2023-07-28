<?php

use app\models\Transporters;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Transporters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transporters-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Transporter', ['create'], ['class' => 'btn btn-success float-right']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [ 
                'label'=>'Transporter Names',
                'attribute' => 'Surname',
                'value'=> function ($model) {
                    return $model->Surname.' '.$model->OtherNames;
                }
            ],
            'IdNumber',
            'MobileNo',
            [
                'attribute' => 'Rating',
                'value' => function ($model) {
                    if ($model->Rating == 1) {
                        return 'Poor';
                    } elseif ($model->Rating == 2) {
                        return 'Average';
                    } elseif ($model->Rating == 3) {
                        return 'Great';
                    } else {
                        return 'Excellent';
                    }
                },
            ],
            //'HomeOfResidence',
            //'CurrentResidence',
            //'CreatedBy',
            //'CreatedDate',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Transporters $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

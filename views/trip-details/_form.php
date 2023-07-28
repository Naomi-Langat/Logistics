<?php

use app\models\TripDetails;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Products;
use app\models\Trip;


/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Trip Details';
$this->params['breadcrumbs'][] = ['label' => 'Trip Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-details-index">
<h1 >Add Products</h1>

    <div class="card">
        <div class="card-content collapse show">
            <div class="trip-details-form">
                    <div class="row">
                        
                    </div>

                <?php $form = ActiveForm::begin(['action' => ['create']]); ?>

                    <div class="row">

                        <?= $form->field($model, 'TripID')->hiddenInput()->label(false) ?>

                        <div class="col-md-5">
                            <?= $form->field($model, 'ProductID')->dropDownList(ArrayHelper::map(Products::find()->all(), 'id', 'ProductName'),['prompt' => '--SELECT--']) ?>
                        </div>

                        <div class="col-md-5">
                            <?= $form->field($model, 'Quantity')->textInput() ?>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>
                        
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
            <h1><?= Html::encode($this->title) ?></h1>
                <!-- <p>
                    <?= Html::a('Create Trip Details', ['create'], ['class' => 'btn btn-success float-right']) ?>
                </p> -->


                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        // ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        [
                            'attribute' => 'TripID',
                            'value' => function ($model) {
                                return $model->trip->id;
                            },
                        ],
                        [
                            'attribute' => 'ProductID',
                            'value' => function ($model) {
                                return $model->product->ProductName;
                            },
                        ],
                        'Quantity',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, TripDetails $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],
                    ],
                ]); ?>
                
            </div>
        </div>
    </div>
</div>

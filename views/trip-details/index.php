<?php

use app\models\TripDetails;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Products;
use app\models\Trip;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $model->trip->DispatchRefNo.' Details';
$this->params['breadcrumbs'][] = ['label' => 'Trip Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-details-index">

    <?php if ($model->trip->Status == 0): ?>
        
        <h1 >Add Products</h1>
        <div class="card">
            <div class="card-content collapse show">
                <div class="trip-details-form">
                    <div class="row"></div>

                    <?php $form = ActiveForm::begin(['action' => ['create']]); ?>

                    <div class="row">
                        <?= $form->field($model, 'TripID')->hiddenInput()->label(false) ?>

                        <div class="col-md-5">
                            <?= $form->field($model, 'ProductID')->dropDownList(
                                ArrayHelper::map(Products::find()->all(), 'id', function ($product) {
                                    return $product->ProductName . ' (' . $product->SizeID . 'Kg)';
                                }),
                                ['prompt' => '--SELECT--']
                            ) ?>
                        </div>

                        <div class="col-md-5">
                            <?= $form->field($model, 'Quantity')->textInput(['type'=>'number','max'=>'']) ?>
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

    <?php endif; ?>

    <div class="row">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="col-12">
            <div class="form-group">
                    <?= Html::a('Transporter', ['/transporters/view', 'id'=>$model->trip->vehicle->transporter->id], ['class' => 'btn btn-info']) ?>
                    <?= Html::a('Driver', ['/drivers/view', 'id'=>$model->trip->driver->id], ['class' => 'btn btn-warning']) ?>
                    <?= Html::a('Vehicle', ['/vehicles/view', 'id'=>$model->trip->vehicle->id], ['class' => 'btn btn-success']) ?>

                <?php if ($model->trip->Status == 1): ?>
                    <?= Html::a('End Trip', ['status','id'=>$model->TripID,'s'=>2], 
                    ['class' => 'btn btn-dark float-right',
                    'data' => [
                        'confirm' => 'Are you sure you want to end this trip?',
                        'method' => 'post',
                    ],
                    ]) ?>

                <?php elseif($model->trip->Status == 0): ?>
                    <?= Html::a('Start Trip', ['status','id'=>$model->TripID,'s'=>1], 
                    ['class' => 'btn btn-primary float-right',
                    'data' => [
                        'confirm' => 'Are you sure you want to start this trip?',
                        'method' => 'post',
                    ],
                    ]) ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-12">
            <div class="card">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        // ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        //'TripID',
                        [
                            'attribute' => 'ProductID',
                            'value' => function ($model) {
                                return $model->product->ProductName;
                            },
                        ],
                        [
                            'attribute' => 'Product Size',
                            'value' => function ($model) {
                                return $model->product->SizeID.' kg';
                            },
                        ],
                        [
                            'attribute' => 'Quantity',
                            'value' => function ($model) {
                                return $model->Quantity.' bags';
                            },
                        ],  
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, TripDetails $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],
                    ],

                ]); 
               echo ExportMenu::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        // ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        //'TripID',
                        [
                            'attribute' => 'ProductID',
                            'value' => function ($model) {
                                return $model->product->ProductName;
                            },
                        ],
                        [
                            'attribute' => 'Product Size',
                            'value' => function ($model) {
                                return $model->product->SizeID.' kg';
                            },
                        ],
                        [
                            'attribute' => 'Quantity',
                            'value' => function ($model) {
                                return $model->Quantity.' bags';
                            },
                        ],  
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, TripDetails $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],
                    ],
                    'filename' => 'exported_data',
                    'showConfirmAlert' => false,
                    'dropdownOptions' => [
                        'label' => 'Export',
                        'class' => 'btn btn-danger',
                    ],
                    'exportFormOptions' => [
                        'class' => 'form-inline',
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>                    
</div>
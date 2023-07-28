<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap5\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Drivers;
use app\models\Stations;
use app\models\Vehicles;
use kartik\date\DatePicker;
/** @var yii\web\View $this */
/** @var app\models\Trip $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="container">
    <div class="card">
        <div class="trip-form">
            <div class="col-md-1"></div>

            <div class="col-md-10">

                    <?php $form = ActiveForm::begin(); ?>

                    <div class="row">    
                        <div class="col-md-4">
                            <?= $form->field($model, 'DispatchRefNo')->hiddenInput()->label(false) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'VehicleID')->dropDownList(ArrayHelper::map(Vehicles::find()->where(['Status'=>0])->all(), 'id','REG_No'), ['prompt' => '--SELECT--']) ?>
                        </div>
                        <div class="col-md-6">
                        <?= $form->field($model, 'DriverID')->dropDownList(ArrayHelper::map(Drivers::find()->where(['Status'=>0])->all(),'id',function($driver) {return $driver->Surname . ' ' . $driver->Othernames; }),['prompt' => '--SELECT--']) ?>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'SourceStationID')->dropDownList(ArrayHelper::map(Stations::find()->all(), 'id','StationName'), ['prompt' => '--SELECT--']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'DestinationStationID')->dropDownList(ArrayHelper::map(Stations::find()->all(),'id', 'StationName'), ['prompt' => '--SELECT--']) ?>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-6">    
                            <?= $form->field($model, 'TripDate')->input('date', ['class' => 'form-control']) ?>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'CreatedBy')->textInput() ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'CreatedDate')->textInput() ?>
                        </div>
                    </div> -->
                    <div class="form-group" style="text-align: center;">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

            </div>

            <div class="col-md-1"></div>
        </div>
    </div>
</div>

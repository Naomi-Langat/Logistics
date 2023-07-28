<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Transporters;
use app\models\VehicleMakes;
use app\models\VehicleTypes;
//use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\Vehicles $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="container">
    <div class="card">
        <div class="vehicles-form">
            <div class="col-md-1"></div>

            <div class="col-md-10">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                    <?= $form->field($model, 'REG_No')->textInput() ?>

                    <?= $form->field($model, 'MakeID')->dropDownList(ArrayHelper::map(VehicleMakes::find()->orderBy(['MakeName'=>SORT_ASC])->all(),'id','MakeName'), ['prompt' => '--SELECT--'])  ?>

                    <?= $form->field($model, 'TypeID')->dropDownList(ArrayHelper::map(VehicleTypes::find()->all(),'id','Description'), ['prompt' => '--SELECT--'])  ?>

                    <?= $form->field($model, 'Capacity')->textInput() ?>

                    <?= $form->field($model, 'TransporterID')->dropDownList(ArrayHelper::map(Transporters::find()->all(),'id',function($transporter) {return $transporter->Surname . ' ' . $transporter->OtherNames; }), ['prompt' => '--SELECT--']) ?>

                    <?= $form->field($model, 'LogbookNo')->textInput(['maxlength' => true]) ?>

                    <!-- <?= $form->field($model, 'CreateBy')->textInput() ?>

                    <?= $form->field($model, 'CreatedDate')->textInput() ?> -->

                    <div class="form-group" style="text-align: center;">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>

            <div class="col-md-1"></div>
        </div>
    </div>
</div>
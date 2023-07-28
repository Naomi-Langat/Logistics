<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Drivers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="container">   
    <div class="card">
        <div class="drivers-form">

            <div class="col-md-1"></div>

            <div class="col-md-10">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                    <?= $form->field($model, 'Surname')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'Othernames')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'DrivingLicenceNo')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'MobileNo')->textInput() ?>

                    <?= $form->field($model, 'IdNumber')->textInput() ?>

                    <div class="form-group" style="text-align: center;">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>

            <div class="col-md-1"></div>
        </div>
    </div>
</div>
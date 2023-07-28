<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Transporters $model */
/** @var yii\widgets\ActiveForm $form */
?>



<div class="container">
    <div class="card">
        <div class="transporters-form">

            <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'Surname')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'OtherNames')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'IdNumber')->textInput() ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'MobileNo')->textInput() ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'HomeOfResidence')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'CurrentResidence')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                         <?= $form->field($model, 'Rating')->dropDownList(['1' => 'Poor','2' => 'Average','3' => 'Great','4' => 'Excellent'],['prompt' => '--SELECT--']) ?>
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

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

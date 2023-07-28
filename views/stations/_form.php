<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Stations $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="container">
    <div class="card">
        <div class="stations-form">

            <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-md-4">
                    <?= $form->field($model, 'StationName')->textInput(['maxlength' => true]) ?>
                        </div>
                    <!-- <div class="col-md-4">
                    <?= $form->field($model, 'CreatedBy')->textInput() ?>
                        </div>
                    <div class="col-md-4">
                    <?= $form->field($model, 'CreatedDate')->textInput() ?>
                        </div> -->
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
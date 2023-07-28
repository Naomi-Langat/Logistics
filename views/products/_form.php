<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Products $model */
/** @var yii\widgets\ActiveForm $form */
?>


<div class="container">
    <div class="card">
        <div class="products-form">

            <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <!-- <div class="col-md-6">
                        <?= $form->field($model, 'CreatedBy')->textInput() ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'CreatedDate')->textInput() ?>
                    </div> -->
                </div>

                <div class="row">
                        <!-- <div class="col-md-4">
                        <?= $form->field($model, 'id')->textInput() ?>
                        </div> -->
                    <div class="col-md-4">
                        <?= $form->field($model, 'ProductName')->textInput() ?>
                        </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'SizeID')->textInput() ?>
                        </div>
                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\VehicleMakes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vehicle-makes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MakeName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Common')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TrackLocation $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="track-location-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'VehicleLocation')->textInput() ?>

    <?= $form->field($model, 'Time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

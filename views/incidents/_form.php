<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Incidents $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="incidents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TripID')->textInput() ?>

    <?= $form->field($model, 'IncidentTypeID')->textInput() ?>

    <?= $form->field($model, 'Description')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

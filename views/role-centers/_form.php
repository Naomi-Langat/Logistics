<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RoleCenters $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="role-centers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'RoleCenterName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CreatedBy')->textInput() ?>

    <?= $form->field($model, 'CreatedDate')->textInput() ?>

    <?= $form->field($model, 'SuperUser')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

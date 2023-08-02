<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserRoles $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-roles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'UserID')->textInput() ?>

    <?= $form->field($model, 'RoleCenterID')->textInput() ?>

    <?= $form->field($model, 'CreatedBy')->textInput() ?>

    <?= $form->field($model, 'CreatedDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

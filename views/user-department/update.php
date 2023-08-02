<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserDepartment $model */

$this->title = 'Update User Department: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'User Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

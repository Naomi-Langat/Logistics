<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RoleCenters $model */

$this->title = 'Update Role Centers: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Role Centers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="role-centers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

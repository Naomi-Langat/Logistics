<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RoleCenters $model */

$this->title = 'Create Role Centers';
$this->params['breadcrumbs'][] = ['label' => 'Role Centers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-centers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Drivers $model */

$this->title = 'Add Driver';
$this->params['breadcrumbs'][] = ['label' => 'Drivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drivers-create">

    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

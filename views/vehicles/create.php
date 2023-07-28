<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Vehicles $model */

$this->title = 'Add Vehicle';
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicles-create">

    <div style="text-align: center;"><h1><?= Html::encode($this->title) ?></h1></div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

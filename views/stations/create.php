<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Stations $model */

$this->title = 'Add Stations';
$this->params['breadcrumbs'][] = ['label' => 'Stations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stations-create">

    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

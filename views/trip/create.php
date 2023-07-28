<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Trip $model */

$this->title = 'Create Trip';
$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-create">

<div style="text-align: center;"><h1><?= Html::encode($this->title) ?></h1></div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

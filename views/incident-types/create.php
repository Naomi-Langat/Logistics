<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\IncidentTypes $model */

$this->title = 'Create Incident Types';
$this->params['breadcrumbs'][] = ['label' => 'Incident Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="incident-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

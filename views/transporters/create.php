<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Transporters $model */

$this->title = 'Create Transporters';
$this->params['breadcrumbs'][] = ['label' => 'Transporters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transporters-create">

    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

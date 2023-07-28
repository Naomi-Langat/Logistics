<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Vehicles $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vehicles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'REG_No',
            [
                'attribute' => 'MakeID',
                'value' => function ($model) {
                    return $model->make->MakeName;
                },
            ],
            [
                'attribute' => 'TypeID',
                'value' => function ($model) {
                    return $model->type->Description;
                },
            ],
            [
                'attribute' => 'Capacity',
                'value' => function ($model) {
                    return $model->Capacity.' kgs';
                },
            ],
            [
                'attribute' => 'TransporterID',
                'value' => function ($model) {
                    return $model->transporter->Surname.' '.$model->transporter->OtherNames;
                },
            ],
            'LogbookNo',
            //'CreateBy',
            //'CreatedDate',
        ],
    ]) ?>

</div>

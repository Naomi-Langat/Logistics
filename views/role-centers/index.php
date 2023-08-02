<?php

use app\models\RoleCenters;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Role Centers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-centers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Role Centers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'RoleCenterName',
            'CreatedBy',
            'CreatedDate',
            'SuperUser',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RoleCenters $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>

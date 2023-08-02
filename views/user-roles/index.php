<?php

use app\models\UserRoles;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'User Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-roles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Roles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'UserID',
            'RoleCenterID',
            'CreatedBy',
            'CreatedDate',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UserRoles $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>

<?php

use app\models\UserDepartment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'User Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-department-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Department', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'UserID',
            'DepartmentID',
            'CreatedBy',
            'CreatedDate',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UserDepartment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>

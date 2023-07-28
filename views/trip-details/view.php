<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TripDetails $model */

$this->title = $model->trip->DispatchRefNo;
$this->params['breadcrumbs'][] = ['label' => 'Trip Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="content-wrapper">
    <div class="content-body">
        
        <!-- Material Chips start -->
        <section id="material-chips">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <p>  
                            <h1 class="text-center">
                                <a class="btn float-left">
                                    '<span class="avatar avatar-online"><img src="/app-assets/images/logo/logo.jpg"alt="avatar"></span>'.
                                            <h3 class="brand-text">Transport MS</h3>
                                </a>
                                <?= Html::encode($this->title) ?>
                                <a class="btn float-right">
                                    <i class="fas fa-search"></i> 
                                    '<span class="avatar avatar-online"><img src="/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"></span>'.
                                    <?= ($model->trip->vehicle->transporter->Surname . ' ' . $model->trip->vehicle->transporter->OtherNames)?><br><?= $model->trip->vehicle->transporter->MobileNo;?>
                                </a>
                            </h1>
                        </p>
                        <p class="text-right">  
                        DATE : <?= $model->trip->TripDate;?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Material Chips end -->
        <!-- Material Chips start -->
        <section id="material-chips">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Stations</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="card-body" >
                                <div class="d-flex flex-row p-3">
                                    <div class="col-sm-6 p-2">
                                        <?= $form->field($model->trip->sourceStation,'StationName')->textInput(['disabled' => true])->label('FROM') ?>
                                    </div>
                                    <div class="col-sm-6 p-2">
                                        <?= $form->field($model->trip->destinationStation,'StationName')->textInput(['disabled' => true])->label('TO') ?>
                                    </div>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Material Chips end -->
        <!-- Material Chips start -->
        <section id="material-chips">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Products</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body text-center">
                                <div class="row p-5">
                                    <div class="form-group" style="margin: 0 auto;">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Size</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?= $model->product->ProductName; ?></td>
                                                    <td><?= $model->product->SizeID; ?>Kg</td>
                                                    <td><?= $model['Quantity']; ?> Bags</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Material Chips end -->
        <!-- Material Chips start -->
        <section id="material-chips">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Vehicle Details</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body" >
                                <div class="d-flex flex-row p-3">
                                    <div class="col-sm-3 p-2">
                                        <?= $form->field($model->trip->vehicle,'REG_No')->textInput(['disabled' => true]) ?>
                                    </div>
                                    <div class="col-sm-3 p-2">
                                        <?= $form->field($model->trip->vehicle->make,'MakeName')->textInput(['disabled' => true]) ?>
                                    </div>
                                    <div class="col-sm-3 p-2">
                                        <?= $form->field($model->trip->vehicle->type,'Description')->textInput(['disabled' => true]) ?>
                                    </div>
                                    <div class="col-sm-3 p-2">
                                        <?= $form->field($model->trip->vehicle,'Capacity')->textInput(['disabled' => true]) ?>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Material Chips end -->
        <!-- Material Chips start -->
        <section id="material-chips">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Driver Details</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body text-center">
                                <div class="d-flex flex-row p-3">
                                    <div class="col-sm-3 p-2">
                                        <?= $form->field($model->trip->driver,'Surname')->textInput(['disabled' => true])->label('Driver Names')  ?>
                                    </div>
                                    <div class="col-sm-3 p-2">
                                        <?= $form->field($model->trip->driver,'MobileNo')->textInput(['disabled' => true])->label('Driver Phone.NO') ?>
                                    </div>
                                    <div class="col-sm-3 p-2">
                                        <?= $form->field($model->trip->driver,'DrivingLicenceNo')->textInput(['disabled' => true])->label('Driver Licence.NO') ?>
                                    </div>
                                    <div class="col-sm-3 p-2">
                                        <?= $form->field($model->trip->driver,'IdNumber')->textInput(['disabled' => true])->label('Driver Id.NO') ?>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Material Chips end -->
    </div>
</div>

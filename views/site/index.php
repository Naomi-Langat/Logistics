<?php

use app\models\Products;
use app\models\Drivers;
use app\models\Stations;
use app\models\Vehicles;
use app\models\Transporters;

?>
<style>
.card {
    transition: transform 0.3s;
}

.card:hover {
    transform: scale(1.05);
}
</style>
<div class="content-wrapper">
            <div class="content-body">
                <!-- Statistic -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12">
                        <a href="/products">
                            <div class="card bg-gradient-directional-danger">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-white text-left">
                                                <h3 class="text-white"><?= Products::find()->count(); ?></h3>
                                                <span>Product Listings</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="icon-pointer text-white font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <a href="/vehicles">
                            <div class="card bg-gradient-directional-success">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-white text-left">
                                                <h3 class="text-white"><?= Vehicles::find()->where(['Status'=>0])->count(); ?></h3>
                                                <span>Available Vehicles</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="icon-cup text-white font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <a href="/drivers">
                            <div class="card bg-gradient-directional-amber">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-white text-left">
                                                <h3 class="text-white"><?= Drivers::find()->where(['Status'=>0])->count(); ?></h3>
                                                <span>Available Drivers</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="icon-plane text-white font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <a href="/transporters">
                            <div class="card bg-gradient-directional-info">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-white text-left">
                                                <h3 class="text-white"><?= Transporters::find()->count(); ?></h3>
                                                <span>Registered Transporters</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="icon-star text-white font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!--/ eCommerce statistic -->
                <!-- Products sell and New Orders -->
                <div class="row match-height">
                    <div class="col-xl-8 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Total Trips</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body pt-0">
                                    <div class="row mb-1">
                                        <div class="col-6 col-md-4">
                                            <h5>This year</h5>
                                            <h2 class="info">$1,45,490</h2>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <h5>Previous year</h5>
                                            <h2 class="text-muted">$67,690</h2>
                                        </div>
                                    </div>
                                    <div class="chartjs">
                                        <canvas id="thisYearRevenue" width="400" style="position: absolute;"></canvas>
                                        <canvas id="lastYearRevenue" width="400"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body sales-growth-chart">
                                    <div id="monthly-sales" class="height-250"></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="chart-title mb-1 text-center">
                                    <h6>Trips Of 2022</h6>
                                </div>
                                <div class="chart-stats text-center">
                                    <a href="#" class="btn btn-sm btn-success box-shadow-2 mr-1">Statistics <i class="ft-bar-chart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Products sell and New Orders -->

                <!-- Products sell and New Orders -->
                <!-- <div class="row match-height">
                    <div class="col-xl-8 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Total Product Sales</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body pt-0">
                                    <div class="row mb-1">
                                        <div class="col-6 col-md-4">
                                            <h5>Current year</h5>
                                            <h2 class="info">$1,45,490</h2>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <h5>Previous year</h5>
                                            <h2 class="text-muted">$67,690</h2>
                                        </div>
                                    </div>
                                    <div class="chartjs">
                                        <canvas id="thisYearRevenue" width="400" style="position: absolute;"></canvas>
                                        <canvas id="lastYearRevenue" width="400"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body sales-growth-chart">
                                    <div id="monthly-sales" class="height-250"></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="chart-title mb-1 text-center">
                                    <h6>Total Trips 2023</h6>
                                </div>
                                <div class="chart-stats text-center">
                                    <a href="#" class="btn btn-sm btn-success box-shadow-2 mr-1">Statistics <i class="ft-bar-chart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--/ Products sell and New Orders -->

                <!-- Trip Details -->
                <div class="row">
                    <div id="recent-transactions" class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Recent Trips</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="/trip/create" >New Trip</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table id="havatable" class="table table-hover table-xl mb-0">
                                        <thead>
                                            <tr>
                                                <th>Dispatch RefNo</th>
                                                <th>Date</th>
                                                <!-- <th>Product</th> -->
                                                <th>Source</th>
                                                <th>Destination</th>
                                                <th>Vehicle REG_No</th>
                                                <th>Driver Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($dataArray as $data): ?>
                                                <tr>
                                                    <td><?= $data['DispatchRefNo'] ?></td>
                                                    <td><?= $data['Date'] ?></td>
                                                    <!-- <td>
                                                        <?php if (is_array($data['ProductName'])): ?>
                                                            <?php foreach ($data['ProductName'] as $product): ?>
                                                                <?= $product ?><br>
                                                            <?php endforeach; ?>
                                                        <?php else: ?>
                                                            <?= $data['ProductName'] ?><br>
                                                        <?php endif; ?>
                                                    </td> -->
                                                    <td><?= $data['Source'] ?></td>
                                                    <td><?= $data['Destination'] ?></td>
                                                    <td><?= $data['VehicleRegNo'] ?></td>
                                                    <td><?= $data['DriverName'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Trip Details -->
            </div>
        </div>
<?php
$this->registerJs('
    $(function() {
        $("#havatable").DataTable();
    });
');
?>
<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
$baseUrl = Yii::$app->request->baseUrl;

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<html class="loading" lang="<?= Yii::$app->language ?>" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Transport- Products - Clean Bootstrap 4 Dashboard HTML Template</title>
    <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/material-vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/nouislider.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/ui/prism.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/icheck/icheck.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/material.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/material-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/material-colors.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/material-vertical-compact-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/material-palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/fonts/mobiriseicons/24px/mobirise/style.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/noui-slider.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-noui.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/ecommerce-shop.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/checkboxes-radios.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/travel.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-compact-menu material-vertical-layout material-layout content-detached-left-sidebar   fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="content-detached-left-sidebar">
    <?php $this->beginBody() ?>
    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark bg-cyan navbar-shadow navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href=""><img class="brand-logo" alt="modern admin logo" src="/app-assets/images/logo/logo.jpg">
                            <h3 class="brand-text">Transport MS</h3>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="material-icons mt-1">more_vert</i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle" href=""><i class="ft-menu"></i></a></li>
                        <li class="nav-item nav-link-search"><a class="nav-link d-none d-lg-block" href="#"><i class="material-icons search-icon">search</i>
                                <input class="round form-control search-box" type="text" placeholder="Explore Modern Admin"><a class="nav-link dropdown-toggle search-bar-toggle d-lg-none d-m-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">search</i></a>
                                <div class="dropdown-menu arrow"><a class="dropdown-item">
                                        <input class="round form-control" type="text" placeholder="Search Here"></a></div>
                            </a></li>
                        <li class="nav-item d-none d-lg-block d-none"><a class="nav-link nav-link-expand" href=""><i class="ficon ft-maximize"></i></a></li>
                        
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="" data-toggle="dropdown"><i class="material-icons">notifications_none</i><span class="badge badge-pill badge-danger badge-up badge-glow">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6><span class="notification-tag badge badge-danger float-right m-0">5 New</span>
                                </li>
                                <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="material-icons icon-bg-circle bg-cyan">add_box</i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">You have new order!</h6>
                                                <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="material-icons icon-bg-circle bg-red bg-darken-1">cloud_download</i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading red darken-1">99% Server load</h6>
                                                <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Five hour ago</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="material-icons icon-bg-circle bg-yellow bg-darken-3">warning</i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                                                <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="material-icons icon-bg-circle bg-cyan">check_circle</i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Complete the task</h6><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="material-icons icon-bg-circle bg-teal">insert_drive_file</i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Generate monthly report</h6><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                            </div>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="material-icons">mail_outline </i></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span></h6><span class="notification-tag badge badge-warning float-right m-0">4 New</span>
                                </li>
                                <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Margaret Govan</h6>
                                                <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start.</p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left"><span class="avatar avatar-sm avatar-busy rounded-circle"><img src="/app-assets/images/portrait/small/avatar-s-2.png" alt="avatar"><i></i></span></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Bret Lezama</h6>
                                                <p class="notification-text font-small-3 text-muted">I have seen your work, there is</p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Tuesday</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="/app-assets/images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Carie Berra</h6>
                                                <p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Friday</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left"><span class="avatar avatar-sm avatar-away rounded-circle"><img src="/app-assets/images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Eric Alsobrook</h6>
                                                <p class="notification-text font-small-3 text-muted">We have project party this saturday.</p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">last month</time></small>
                                            </div>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all messages</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700">John Doe</span><span class="avatar avatar-online"><img src="/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="user-profile.html"><i class="material-icons">person_outline</i> Edit Profile</a>
                                                                            <a class="dropdown-item" href="app-email.html"><i class="material-icons">mail_outline</i> My Inbox</a>
                                                                            <a class="dropdown-item" href="user-cards.html"><i class="material-icons">content_paste</i> Task</a>
                                                                            <a class="dropdown-item" href="app-chat.html"><i class="material-icons">chat_bubble_outline</i> Chats</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/site/login"><i class="material-icons">power_settings_new</i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

    <div class="main-menu material-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="/trip"><i class="mbri-paper-plane"></i><span class="menu-title" data-i18n="nav.dash.travel">Trips</span></a>
                </li>
<!--                 
                <li class=" nav-item"><a href="/trip-details"><i class="mbri-paper-plane"></i><span class="menu-title" data-i18n="">Trip Details</span></a>
                </li> -->
                <li class=" nav-item"><a href="/transporters"><i class="mbri-extension"></i><span class="menu-title" data-i18n="nav.ui.main">Application Settings</span></a>
                    <ul class="menu-content">
                        <li class=" nav-item"><a href="/products"><i class="mbri-cash"></i><span class="menu-title" data-i18n="">Products</span></a>
                        </li>
                        <li class=" nav-item"><a href="/transporters"><i class="mbri-bootstrap"></i><span class="menu-title" data-i18n="">Transporters</span></a>
                        </li>
                        <li class=" nav-item"><a href="/vehicles"><i class="mbri-database"></i><span class="menu-title" data-i18n="">Vehicles</span></a>
                        </li>
                        <li class="active"><a href="/drivers"><i class="mbri-bulleted-list"></i><span class="menu-title" data-i18n="">Drivers</span></a>
                        </li>
                        <li class=" nav-item"><a href="/stations"><i class="mbri-success"></i><span class="menu-title" data-i18n="">Stations</span></a>
                        </li>
                        <li><a class="menu-item" href="#"><i class="material-icons">grid_on</i><span data-i18n="nav.form_layouts.main">Form Layouts</span></a>
                            <ul class="menu-content">
                                <li><a class="menu-item" href="form-layout-basic.html"><i class="material-icons"></i><span data-i18n="nav.form_layouts.form_layout_basic">Basic Forms</span></a>
                                </li>
                                <li><a class="menu-item" href="form-layout-horizontal.html"><i class="material-icons"></i><span data-i18n="nav.form_layouts.form_layout_horizontal">Horizontal Forms</span></a>
                                </li>
                                <li><a class="menu-item" href="form-layout-hidden-labels.html"><i class="material-icons"></i><span data-i18n="nav.form_layouts.form_layout_hidden_labels">Hidden Labels</span></a>
                                </li>
                                <li><a class="menu-item" href="form-layout-form-actions.html"><i class="material-icons"></i><span data-i18n="nav.form_layouts.form_layout_form_actions">Form Actions</span></a>
                                </li>
                                <li><a class="menu-item" href="form-layout-row-separator.html"><i class="material-icons"></i><span data-i18n="nav.form_layouts.form_layout_row_separator">Row Separator</span></a>
                                </li>
                                <li><a class="menu-item" href="form-layout-bordered.html"><i class="material-icons"></i><span data-i18n="nav.form_layouts.form_layout_bordered">Bordered</span></a>
                                </li>
                                <li><a class="menu-item" href="form-layout-striped-rows.html"><i class="material-icons"></i><span data-i18n="nav.form_layouts.form_layout_striped_rows">Striped Rows</span></a>
                                </li>
                                <li><a class="menu-item" href="form-layout-striped-labels.html"><i class="material-icons"></i><span data-i18n="nav.form_layouts.form_layout_striped_labels">Striped Labels</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-header row">
            <div class="content-header-light col-12">
                <div class="row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <h3 class="content-header-title">Travel List</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/site/index">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Travel List
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="content-body">
                <?= $content ?>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-dark navbar-border navbar-shadow">
        <p>Copyright <?= date('Y') ?></p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/vendors/js/material-vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/ui/prism.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/jquery.raty.js"></script>
    <script src="/app-assets/vendors/js/extensions/jquery.cookie.js"></script>
    <script src="/app-assets/vendors/js/extensions/jquery.treeview.js"></script>
    <script src="/app-assets/vendors/js/extensions/wNumb.js"></script>
    <script src="/app-assets/vendors/js/extensions/nouislider.min.js"></script>
    <script src="/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/app-assets/js/core/app-menu.js"></script>
    <script src="/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/pages/material-app.js"></script>
    <script src="/app-assets/js/scripts/pages/content-panel-sidebar.js"></script>
    <script src="/app-assets/js/scripts/pages/ecommerce-product-shop.js"></script>
    <!-- END: Page JS-->
    <?php $this->endBody() ?>
</body>
<!-- END: Body-->

</html>
<?php $this->endPage() ?>

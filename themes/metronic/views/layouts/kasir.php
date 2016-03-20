<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?= Yii::app()->name; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- FORM YII -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/detailview/styles.css" />
        <?php $baseUrl = Yii::app()->theme->baseUrl; ?>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?= $baseUrl; ?>/assets/css/jquery-ui.css">
        <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->
        <link href="<?= $baseUrl; ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- <link href="<?= $baseUrl; ?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/css/select2.min.css" rel="stylesheet" /> -->
        <link href="<?= $baseUrl; ?>/assets/css/select2.min.css" rel="stylesheet" />
        <link href="<?= $baseUrl; ?>/assets/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?= $baseUrl; ?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?= $baseUrl; ?>/assets/pages/css/search.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/pages/css/invoice-2.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?= $baseUrl; ?>/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?= $baseUrl; ?>/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
        <?php Yii::app()->clientScript->registerCoreScript('jquery') ?>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-full-width">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index.php/site">
                        <img src="<?= $baseUrl; ?>/assets/layouts/layout/img/logodpn2.png" alt="logo klinik ar rahmah" class="logo-default" /> </a>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN MEGA MENU -->
                <!-- DOC: Remove "hor-menu-light" class to have a horizontal menu with theme background instead of white background -->
                <!-- DOC: This is desktop version of the horizontal menu. The mobile version is defined(duplicated) in the responsive menu below along with sidebar menu. So the horizontal menu has 2 seperate versions -->
                <div class="hor-menu   hidden-sm hidden-xs">
                    <ul class="nav navbar-nav">
                        <!-- DOC: Remove data-hover="megamenu-dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
                        <li class="<?= ($this->ID=="site") ? "classic-menu-dropdown active" : "classic-menu-dropdown"; ?>">
                            <?php echo CHtml::link('Home <span class="selected"></span>', array('/')) ?>
                        </li>
                        <li class="<?= ($this->ID=="obat") ? "classic-menu-dropdown active" : "classic-menu-dropdown"; ?>">
                            <?php echo CHtml::link('List Obat', array('/obat')) ?>
                        </li>
                        <li class="<?= ($this->ID=="order") ? "classic-menu-dropdown active" : "classic-menu-dropdown"; ?>">
                            <?php echo CHtml::link('Order <i class="fa fa-angle-down"></i>', "javascript:;", array('data-hover' => 'dropdown', 'data-close-others' => 'true', 'data-toggle' => 'dropdown')) ?>
                            <ul class="dropdown-menu pull-left">
                                <li>
                                    <?php echo CHtml::link('<i class="icon-table"></i> Daftar Order', array('/order')) ?>
                                </li>
                            </ul>
                        </li>
                        <li class="<?= ($this->ID=="pasien") ? "classic-menu-dropdown active" : "classic-menu-dropdown"; ?>">
                            <?php echo CHtml::link('Pasien <i class="fa fa-angle-down"></i>', "javascript:;", array('data-hover' => 'dropdown', 'data-close-others' => 'true', 'data-toggle' => 'dropdown')) ?>
                            <ul class="dropdown-menu pull-left">
                                <li>
                                    <?php echo CHtml::link('<i class="icon-user-add"></i> Daftar Pasien', array('/pasien')) ?>
                                </li>
                                <li>
                                    <?php echo CHtml::link('<i class="icon-user-add"></i> Tambah Pasien', array('/pasien/create')) ?>
                                </li>
                            </ul>
                        </li>
                        <li class="<?= ($this->ID=="sms") ? "classic-menu-dropdown active" : "classic-menu-dropdown"; ?>">
                            <?php echo CHtml::link('SMS Broadcast <i class="fa fa-angle-down"></i>', "javascript:;", array('data-hover' => 'dropdown', 'data-close-others' => 'true', 'data-toggle' => 'dropdown')) ?>
                            <ul class="dropdown-menu pull-left">
                                <li>
                                    <?php echo CHtml::link('<i class="icon-user-add"></i> Riwayat SMS', array('/sms')) ?>
                                </li>
                                <li>
                                    <?php echo CHtml::link('<i class="icon-user-add"></i> Kirim SMS Pelanggan', array('/sms/createMultiple')) ?>
                                </li>
                                <li>
                                    <?php echo CHtml::link('<i class="icon-user-add"></i> Kirim SMS Manual', array('/sms/create')) ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- END MEGA MENU -->
                <!-- BEGIN HEADER SEARCH BOX -->
                <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                <!-- <form class="search-form" action="extra_search.html" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="query">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form> -->
                <!-- END HEADER SEARCH BOX -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        
                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="<?= $baseUrl; ?>/assets/layouts/layout/img/avatar3_small.jpg" />
                                <span class="username username-hide-on-mobile"> <?= Yii::app()->user->nama; ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <?php echo CHtml::link('<i class="icon-key"></i> Log Out ', array('/site/logout')) ?>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Horizontal Menu</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs"><?= MyFormatter::formatTanggal(date('Y-m-d')); ?></span>&nbsp;
                            </div>
                        </div>
                    </div> -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> KASIR KLINIK AR RAHMA
                        <small>Selamat datang di Halaman Kasir</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <?= $content; ?>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> &copy;  2016 - <?php echo date('Y'); ?> Klinik by Safira Solution.
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="<?= $baseUrl; ?>/assets/global/plugins/respond.min.js"></script>
<script src="<?= $baseUrl; ?>/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?= $baseUrl; ?>/assets/js/jquery-1.10.2.js"></script>
        <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
        <script src="<?= $baseUrl; ?>/assets/js/jquery-ui.js"></script>
        <!-- <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
        <script src="<?= $baseUrl; ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!--<script src="<?= $baseUrl; ?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js"></script> -->
        <script src="<?= $baseUrl; ?>/assets/js/select2.min.js"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/bootstrap-growl/jquery.bootstrap-growl.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?= $baseUrl; ?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!--<script src="<?= $baseUrl; ?>/assets/pages/scripts/components-select2.js" type="text/javascript"></script>-->
        <script src="<?= $baseUrl; ?>/assets/pages/scripts/form-validation.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/pages/scripts/form-icheck.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/pages/scripts/ui-bootstrap-growl.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/pages/scripts/ui-modals.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?= $baseUrl; ?>/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <script type="text/javascript">
            $(function () {
                $('#tabelku').DataTable( {
                    "language": {
                        "aria": {
                            "sortAscending": ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        },
                        "emptyTable": "Tidak ada data",
                        "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ data",
                        "infoEmpty": "Tidak ada hasil yang ditemukan",
                        "infoFiltered": "(dicari dari _MAX_ total data)",
                        "lengthMenu": "Tampilan _MENU_",
                        "search": "Cari:",
                        "zeroRecords": "Tidak ada data yang cocok ditemukan",
                        "paginate": {
                            "previous":"Sebelumnya",
                            "next": "Selanjutnya",
                            "last": "Terakhir",
                            "first": "Pertama"
                        }
                    },
                    "pageLength": 5,
                    "pagingType": "bootstrap_full_number",
                    "order": [[ 0, "asc" ]],
                    "lengthMenu": [
                        [5, 15, 20, -1],
                        [5, 15, 20, "All"] // change per page values here
                    ],
                } );
            });
        </script>
    </body>

</html>
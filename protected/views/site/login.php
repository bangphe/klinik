<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.3
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Halaman Login | <?= Yii::app()->name; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <?php $baseUrl = Yii::app()->theme->baseUrl; ?>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?= $baseUrl; ?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?= $baseUrl; ?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?= $baseUrl; ?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?= $baseUrl; ?>/assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset">
                    <div class="login-bg" style="background-image:url(<?= $baseUrl; ?>/assets/pages/img/login/bg1.jpg)">
                        <!-- <img class="login-logo" src="<?= $baseUrl; ?>/assets/pages/img/login/logo.png" /> -->
                    </div>
                </div>
                <div class="col-md-6 login-container bs-reset">
                    <div class="login-content">
                        <h1 class="text-center">Halaman Login</h1>
                        <!-- <p> Lorem ipsum dolor sit amet, coectetuer adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum dolor sit amet, coectetuer adipiscing. </p> -->
                        <?php
                        	$form = $this->beginWidget('CActiveForm', array(
                        		'id' => 'login-user',
                        		'htmlOptions' => array('class' => 'login-form'),
                        		'enableAjaxValidation' => false,
                        	));
                        ?>
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Masukkan username dan password. </span>
                            </div>

                            <?php echo $form->errorSummary($model) ?>

                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Username" name="LoginForm[username]" required/> </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="LoginForm[password]" required/> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="rem-password">
                                        <p>Ingatkan saya
                                            <input type="checkbox" class="rem-checkbox" />
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <div class="forgot-password">
                                        <a href="javascript:;" id="forget-password" class="forget-password">Lupa password?</a>
                                    </div>
                                    <button class="btn blue" type="submit">Masuk</button>
                                </div>
                            </div>
                        <?php $this->endWidget(); ?>
                        <!-- BEGIN FORGOT PASSWORD FORM -->
                        <form class="forget-form" action="javascript:;" method="post">
                            <h3 class="font-green">Lupa Password ?</h3>
                            <p> Silahkan menghubungi Admin untuk mereset password Anda! Terima kasih </p>
                            <!-- <div class="form-group">
                                <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email" name="email" />
                            </div> -->
                            <div class="form-actions">
                                <button type="button" id="back-btn" class="btn grey btn-default">Kembali</button>
                                <button type="submit" class="btn blue btn-success uppercase pull-right">Kirim</button>
                            </div>
                        </form>
                        <!-- END FORGOT PASSWORD FORM -->
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-5 bs-reset">
                                <ul class="login-social">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-7 bs-reset">
                                <div class="login-copyright text-right">
                                    <p><?= Yii::app()->name; ?> &copy; <?php echo date('Y'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-1 -->
        <!--[if lt IE 9]>
<script src="<?= $baseUrl; ?>/assets/global/plugins/respond.min.js"></script>
<script src="<?= $baseUrl; ?>/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?= $baseUrl; ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?= $baseUrl; ?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?= $baseUrl; ?>/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?= $baseUrl; ?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?= $baseUrl; ?>/assets/pages/scripts/login-5.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
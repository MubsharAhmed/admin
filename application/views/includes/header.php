<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $pageTitle; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style>
        .error {
            color: red;
            font-weight: normal;
        }
    </style>
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
    .main-header {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
    }
    .main-sidebar {
        position: fixed;
        left: 0;


    }

    body {
        padding-top: 50px;
    }
</style>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo base_url(); ?>" class="logo" style="background-color:white">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b style="color:darkcyan">VearaLink</b></span>
                <!-- logo for regular state and mobile devices -->
                <!-- <span class="logo-lg"><img src="<?= base_url() ?>assets/images/logo.png"></span> -->
                <span class="logo-lg" style="color: darkcyan">VearaLink</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image" />
                                <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">

                                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $_SESSION['name']; ?>
                                        <!-- <small><?php echo $role_text; ?></small> -->
                                    </p>

                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <!-- <div class="pull-left">
                                        <a href="<?php echo base_url(); ?>profile" class="btn btn-warning btn-flat"><i class="fa fa-user-circle"></i> Profile</a>
                                    </div> -->
                                    <div class="pull-right">
                                        <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <!-- <li>
                        <a href="<?php echo base_url(); ?>dashboard">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>managers">
                            <i class="fa fa-users"></i>
                            <span>Managers</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>agents">
                            <i class="fa fa-users"></i>
                            <span>Agents</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>users">
                            <i class="fa fa-users"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>bethistory">
                            <i class="fa fa-money"></i>
                            <span>Bet History</span>
                        </a>
                    </li> -->

                    <li>
                        <a href="<?php echo base_url(); ?>general/generalSetting">
                            <i class="fa fa-edit"></i>
                            <span>General Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>general/popup">
                            <i class="fa fa-edit"></i>
                            <span>Popup Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>general/home">
                            <i class="fa fa-edit"></i>
                            <span>Home Page Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>general/aboutUs">
                            <i class="fa fa-edit"></i>
                            <span>About Us Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>general/services">
                            <i class="fa fa-edit"></i>
                            <span>Services Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>general/caseStudies">
                            <i class="fa fa-edit"></i>
                            <span>Case Studies Setting</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>general/pricepackage">
                            <i class="fa fa-edit"></i>
                            <span>Price & Packages Setting</span>
                        </a>
                    </li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
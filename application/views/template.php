<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Admin Warteg</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url() ?>/assets/admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?= base_url() ?>/assets/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?= base_url() ?>/assets/admin/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>/assets/admin/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?= base_url() ?>/assets/admin/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- DataTable -->
    <link href="<?= base_url() ?>/assets/admin/datatables/dataTables.bootstrap.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/admin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>assets/admin/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?= base_url() ?>assets/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?= base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>assets/admin/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url() ?>assets/admin/js/custom.min.js"></script>
    <!-- DataTable -->
    <script src="<?= base_url() ?>assets/admin/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>assets/admin/datatables/dataTables.bootstrap.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="<?= base_url()?>index.php/menu">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="<?= base_url() ?>assets/admin/plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="<?= base_url() ?>assets/admin/plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="<?= base_url() ?>assets/admin/plugins/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="<?= base_url() ?>assets/admin/plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="<?= base_url() ?>index.php/login/process_logout"> <img src="<?= base_url() ?>/assets/admin/plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?= $this->session->userdata('logged_in')['nama']; ?></b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="index.html" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>index.php/menu" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Menu Makanan</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>index.php/stok" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Stok Menu</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>index.php/jenis_menu" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i>Jenis Menu</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>index.php/jenis_parameter" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>Jenis Parameter</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>index.php/parameter" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i>Parameter</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>index.php/menu_parameter" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>Menu Parameter</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>index.php/aturan" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>Aturan</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>index.php/user" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>User</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Blank Page</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Blank Page</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">  
                            <?= $content ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- /#wrapper -->
</body>

</html>

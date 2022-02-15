<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Management Dashboard</title>
    <link rel="icon" type="images/png" href="../images/logo.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="frontend/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="frontend/dist/css/adminlte.min.css">



    <!-- DataTables -->
    <link rel="stylesheet" href="frontend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="frontend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="frontend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->


    <!-- toaster links -->

    <link href="./../css/toastr.min.css" rel="stylesheet" />
    <script src="./../js/jquery.min.js"></script>
    <script src="./../js/toastr.min.js"></script>


    <style type="text/css">
    a.brand-link img {
        width: 50%;
        height: 100%;
    }

    .card-box {
        position: relative;
        color: #fff;
        padding: 20px 10px 40px;
        margin: 20px 0px;
    }

    .card-box:hover {
        text-decoration: none;
        color: #f1f1f1;
    }

    .card-box:hover .icon i {
        font-size: 100px;
        transition: 1s;
        -webkit-transition: 1s;
    }

    .card-box .inner {
        padding: 5px 10px 0 10px;
    }

    .card-box h3 {
        font-size: 27px;
        font-weight: bold;
        margin: 0 0 8px 0;
        white-space: nowrap;
        padding: 0;
        text-align: left;
    }

    .card-box p {
        font-size: 15px;
    }

    .card-box .icon {
        position: absolute;
        top: auto;
        bottom: 5px;
        right: 5px;
        z-index: 0;
        font-size: 72px;
        color: rgba(0, 0, 0, 0.15);
    }

    .card-box .card-box-footer {
        position: absolute;
        left: 0px;
        bottom: 0px;
        text-align: center;
        padding: 3px 0;
        color: rgba(255, 255, 255, 0.8);
        background: rgba(0, 0, 0, 0.1);
        width: 100%;
        text-decoration: none;
    }

    .card-box:hover .card-box-footer {
        background: rgba(0, 0, 0, 0.3);
    }

    .bg-blue {
        background-color: #00c0ef !important;
    }

    .bg-green {
        background-color: #00a65a !important;
    }

    .bg-orange {
        background-color: #f39c12 !important;
    }

    .bg-red {
        background-color: #d9534f !important;
    }
    </style>



</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link"><b>Hello Admin, <span
                                style="text-transform: uppercase;"><?php echo $_SESSION['username'];?></span></b></a>
                </li>
                <li class="nav-item float-right">
                    <a class="nav-link" href="http://localhost/ctms/admin/logout.php">Logout</a>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="dashboard.php" class="brand-link">
                <img src="./../images/main-logo.png" alt="CTMS Logo" class="ml-2">
                <span class="brand-text font-weight-light"></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->




                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="/ctms/admin/dashboard.php" class="nav-link">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ctms/admin/fixture.php" class="nav-link">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Fixture
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ctms/admin/pointstable.php" class="nav-link">
                                <i class="nav-icon fa fa-table"></i>
                                <p>
                                    Points Table
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ctms/admin/performance.php" class="nav-link">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Performance
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ctms/admin/news.php" class="nav-link">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    News
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ctms/admin/ground.php" class="nav-link">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Ground
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ctms/admin/sponser.php" class="nav-link">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Sponser
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ctms/admin/tournament.php" class="nav-link">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Tournament
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ctms/admin/recent_results.php" class="nav-link">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Recent Result
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ctms/admin/user.php" class="nav-link">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ctms/admin/confirmRegistration.php" class="nav-link">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    Registration Confirmation
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">

            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
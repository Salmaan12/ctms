<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Captain Dashboard</title>
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
            <ul class="navbar-nav" style="width: 100vw;">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link"><b>Hello Captain, <span
                                style="text-transform: uppercase;"><?php echo $_SESSION['username'];?></span></b></a>
                </li>
                <li class="nav-item float-right">
                    <a class="nav-link" href="http://localhost/ctms/captain/logout.php">Logout</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block ml-auto">
                    <a class="nav-link"><b>Team Name:
                            <span style="text-transform: uppercase;">
                                <?php 
                                    include 'database/connection.php';
                                    $id = $_SESSION['teamId'];
                                    $query1 = "select TeamName from `team` where TeamId = $id";
                                    $queryfire1 = mysqli_query($con, $query1);
                                    $res = mysqli_fetch_array($queryfire1);
                                    echo $res['TeamName'];
                                ?>
                            </span></b></a>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="login.php" class="brand-link">
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
                            <a href="/ctms/captain/dashboard.php" class="nav-link">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ctms/captain/my_team.php" class="nav-link">
                                <i class="nav-icon fa fa-table"></i>
                                <p>
                                    My Team
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
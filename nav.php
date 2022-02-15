<?php include 'header.php'; ?>
<div class="topone wow fadeInDown">
    <nav class="navbar navbar-default" id="header">
        <div class="top_bar">
            <div class="container-fluid">
                <?php if (!isset($_SESSION['username'])) { ?>
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <ul class="social_icon">
                            <li>
                                <a href="#" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <button class="login">
                            <a href="account.php"><i class="fa fa-user" aria-hidden="true"></i>Login</a>
                        </button>
                    </div>
                </div>
                <?php } else { ?>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <ul class="social_icon">
                            <li>
                                <a href="#" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                        <p class="usernametag">
                            Hello
                            <?php echo $_SESSION['username']; ?>
                            <a href="http://localhost/ctms/logout.php">logout here</a>
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12" style="display: none;">
                        <button class="login">
                            <a href="account.php"><i class="fa fa-user" aria-hidden="true"></i>Login</a>
                        </button>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <div class="container-fluid">
            <!--<div class="navbar-header">-->
            <!--    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"-->
            <!--        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">-->
            <!--        <span class="sr-only">Toggle navigation</span>-->
            <!--        <span class="icon-bar"></span>-->
            <!--        <span class="icon-bar"></span>-->
            <!--        <span class="icon-bar"></span>-->
            <!--    </button>-->
            <!--</div>-->



            <div class="row">

                <div class="sidenav" id="mySidenav">
                    <a class="closebtn" href="javascript:void(0)" onclick="closeNav()">×</a>
                </div>

                <div class="mobilecontainer hidden-lg hidden-md">
                    <span class="pull-right" onclick="openNav()" style="font-size:30px;cursor:pointer">☰</span>
                </div>

                <div class="col-md-4">
                    <div class="logo">
                        <a href="home.php"><img src="images/main-logo.png" /></a>
                    </div>
                </div>

                <div class="col-md-8">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1 navbar">
                        <ul class="nav navbar-nav nav-padding navbar-right">
                            <li class="active"><a href="home.php">HOME</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Matches <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="result.php">results</a></li>
                                </ul>
                            </li>
                            <li><a href="teams.php">Teams</a></li>
                            <!-- <li><a href="points-table.php">Points Table</a></li>
                            <li><a href="fixtures.php">Fixtures</a></li> -->
                            <li><a href="contact.php">CONTACT</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">MORE <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="news.php">News</a></li>
                                    <li><a href="gallery.php">Photos</a></li>
                                    <li><a href="video.php">Video</a></li>
                                </ul>
                            </li>
                            <li>
                                <div class="fast-quote">
                                    <button>
                                        <a href="team-reg.php" class="whitebtn hvr-icon-forward">Register A
                                            Team</a>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>

            <!-- Brand and toggle get grouped for better mobile display -->
        </div>
        <!-- /.container -->
    </nav>
</div>
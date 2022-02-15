<?php
    session_start();

    if (!isset($_SESSION['is_admin'])) {
        // echo "Please Login again";
        // echo "<a href='https://localhost/ctms/account.php'>Click Here to Login</a>";
        echo '<script> $(document).ready(function(){ toastr.success("Logout Successfully"); }); </script>';
        header('Location: http://localhost/ctms/home.php');
    }
    else {

        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='https://localhost/ctms/account.php'>Login here</a>";
        } 
        else {

 include 'header.php';
 include 'nav.php';

?>

<section class="inner_bannersec">
    <img src="images/innerbanner.jpg">
    <div class="inner-banner-header wf100">
        <h1 data-generated="Contact">Gallery</h1>
        <div class="gt-breadcrumbs">
            <ul>
                <li>
                    <a href="home.php"> <i class="fa fa-home"></i> Home </a>
                </li>
                <li class="none"> <a href="gallery.php" class="active"> Gallery </a> </li>
            </ul>
        </div>
    </div>
</section>



<section class="gallery_sec">



    <div class="container">
        <div class="row">
            <div class='list-group gallery'>
                <div class='col-sm-4 col-xs-6 col-md-4 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="images/g1.jpg">
                        <img class="img-responsive-1" alt="" src="images/g1.jpg" />

                    </a>
                </div> <!-- col-6 / end -->
                <div class='col-sm-4 col-xs-6 col-md-4 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="images/g2.jpg">
                        <img class="img-responsive-1" alt="" src="images/g2.jpg" />

                    </a>
                </div> <!-- col-6 / end -->
                <div class='col-sm-4 col-xs-6 col-md-4 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="images/g3.jpg">
                        <img class="img-responsive-1" alt="" src="images/g3.jpg" />

                    </a>
                </div> <!-- col-6 / end -->
                <div class='col-sm-4 col-xs-6 col-md-4 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="images/g4.jpg">
                        <img class="img-responsive-1" alt="" src="images/g4.jpg" />

                    </a>
                </div> <!-- col-6 / end -->
                <div class='col-sm-4 col-xs-6 col-md-4 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="images/g5.jpg">
                        <img class="img-responsive-1" alt="" src="images/g5.jpg" />

                    </a>
                </div> <!-- col-6 / end -->
                <div class='col-sm-4 col-xs-6 col-md-4 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="images/g6.jpg">
                        <img class="img-responsive-1" alt="" src="images/g6.jpg" />

                    </a>
                </div> <!-- col-6 / end -->

                <div class='col-sm-4 col-xs-6 col-md-4 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="images/g7.jpg">
                        <img class="img-responsive-1" alt="" src="images/g7.jpg" />

                    </a>
                </div> <!-- col-6 / end -->
                <div class='col-sm-4 col-xs-6 col-md-4 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="images/g1.jpg">
                        <img class="img-responsive-1" alt="" src="images/g1.jpg" />

                    </a>
                </div> <!-- col-6 / end -->
                <div class='col-sm-4 col-xs-6 col-md-4 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="images/g2.jpg">
                        <img class="img-responsive-1" alt="" src="images/g2.jpg" />

                    </a>
                </div> <!-- col-6 / end -->
                <div class='col-sm-4 col-xs-6 col-md-4 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="images/g3.jpg">
                        <img class="img-responsive-1" alt="" src="images/g3.jpg" />

                    </a>
                </div>



            </div> <!-- list-group / end -->
        </div> <!-- row / end -->
    </div>


    <!-- <div class="container">
            <div class="row">
                <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="gallery-title">Gallery</h1>
                </div>

                <div align="center">
                    <button class="btn btn-default filter-button" data-filter="all">All</button>
                    <button class="btn btn-default filter-button" data-filter="tournament">Tournament</button>
                    <button class="btn btn-default filter-button" data-filter="test">Test Match</button>
                    <button class="btn btn-default filter-button" data-filter="t20">T20 Match</button>
                    <button class="btn btn-default filter-button" data-filter="odi">ODI</button>
                </div>
                <br/>



                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter tournament">
                    <img src="images/g1.jpg" class="img-responsive-1">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter test">
                    <img src="images/g2.jpg" class="img-responsive-1">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter tournament">
                    <img src="images/g3.jpg" class="img-responsive-1">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter odi">
                    <img src="images/g4.jpg" class="img-responsive-1">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter t20">
                    <img src="images/g5.jpg" class="img-responsive-1">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter odi">
                    <img src="images/g6.jpg" class="img-responsive-1">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter t20">
                    <img src="images/g7.jpg" class="img-responsive-1">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter odi">
                    <img src="images/g8.jpg" class="img-responsive-1">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter odi">
                    <img src="images/g1.jpg" class="img-responsive-1">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter tournament">
                    <img src="images/g2.jpg" class="img-responsive-1">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter t20">
                    <img src="images/g3.jpg" class="img-responsive-1">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter test">
                    <img src="images/g4.jpg" class="img-responsive-1">
                </div>
            </div>
        </div> -->


</section>


<?php
include 'footer.php';
    }
}
?>
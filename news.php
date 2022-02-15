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
    <img src="images/innerbanner.jpg" class="img-responsive">
    <div class="inner-banner-header wf100">
        <h1 data-generated="Contact">Blog</h1>
        <div class="gt-breadcrumbs">
            <ul>
                <li> <a href="home.php"> <i class="fa fa-home"></i> Home </a> </li>
                <li class="none"> <a href="news.php" class="active"> Blog </a> </li>
            </ul>
        </div>
    </div>
</section>


<section class="news">
    <div class="container">
        <div class="row">

            <br><br>

            <div class="col-md-12 text_align_center">
                <h2>Latest News</h2>
            </div>

        </div>

        <div class="row">
            <div class="blogslid_a">

                <div class="col-md-4">
                    <div class="ser_main wow zoomIn" data-wow-duration="2s">
                        <div class="serv text_align_center">
                            <img src="images/blog-1.jpg" class="img-responsive">
                            <h5>Heading Here</h5>
                            <p>Lorem ipsum dolore sit amet, consecteture adipiscing eliate, sed doist eiusmod tempor
                                incididunt ut labore et dolore</p>
                        </div>
                        <div class="ser_btn"> <a href="news-detail.php"> Leran More</a></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ser_main wow zoomIn" data-wow-duration="2s">
                        <div class="serv text_align_center">
                            <img src="images/blog-1.jpg" class="img-responsive">
                            <h5>Heading Here</h5>
                            <p>Lorem ipsum dolore sit amet, consecteture adipiscing eliate, sed doist eiusmod tempor
                                incididunt ut labore et dolore</p>
                        </div>
                        <div class="ser_btn"> <a href="news-detail.php"> Leran More</a></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ser_main wow zoomIn" data-wow-duration="2s">
                        <div class="serv text_align_center">
                            <img src="images/blog-1.jpg" class="img-responsive">
                            <h5>Heading Here</h5>
                            <p>Lorem ipsum dolore sit amet, consecteture adipiscing eliate, sed doist eiusmod tempor
                                incididunt ut labore et dolore</p>
                        </div>
                        <div class="ser_btn"> <a href="news-detail.php"> Leran More</a></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ser_main wow zoomIn" data-wow-duration="2s">
                        <div class="serv text_align_center">
                            <img src="images/blog-1.jpg" class="img-responsive">
                            <h5>Heading Here</h5>
                            <p>Lorem ipsum dolore sit amet, consecteture adipiscing eliate, sed doist eiusmod tempor
                                incididunt ut labore et dolore</p>
                        </div>
                        <div class="ser_btn"> <a href="news-detail.php"> Leran More</a></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ser_main wow zoomIn" data-wow-duration="2s">
                        <div class="serv text_align_center">
                            <img src="images/blog-1.jpg" class="img-responsive">
                            <h5>Heading Here</h5>
                            <p>Lorem ipsum dolore sit amet, consecteture adipiscing eliate, sed doist eiusmod tempor
                                incididunt ut labore et dolore</p>
                        </div>
                        <div class="ser_btn"> <a href="news-detail.php"> Leran More</a></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ser_main wow zoomIn" data-wow-duration="2s">
                        <div class="serv text_align_center">
                            <img src="images/blog-1.jpg" class="img-responsive">
                            <h5>Heading Here</h5>
                            <p>Lorem ipsum dolore sit amet, consecteture adipiscing eliate, sed doist eiusmod tempor
                                incididunt ut labore et dolore</p>
                        </div>
                        <div class="ser_btn"> <a href="news-detail.php"> Leran More</a></div>
                    </div>
                </div>



            </div>
        </div>



        <br><br>

    </div>
</section>




<?php
include 'footer.php';
    }
}
?>
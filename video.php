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
        <h1 data-generated="Contact">Video</h1>
        <div class="gt-breadcrumbs">
            <ul>
                <li> <a href="home.php"> <i class="fa fa-home"></i> Home </a> </li>
                <li class="none"> <a href="video.php" class="active"> Video </a> </li>
            </ul>
        </div>
    </div>
</section>


<section class="news">
    <div class="container">


        <div class="row">

            <div class="col-md-12 text_align_center">
                <h2>Latest Video</h2>
            </div>

        </div>

        <div class="row">
            <div class="videoslid_a">

                <div class="col-md-4">
                    <div class="hvideo-box">
                        <div class="hv_box_inner">
                            <!--<span class="vtime">02:10</span>-->
                            <img src="images/video_new.jpg" alt="">
                            <div class="hv-info">
                                <a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                    data-caption="My caption" class="play">
                                    <i class="fa fa-play"></i>
                                </a>
                                <h4><a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                        data-caption="My caption">Nicolson Goals are like Storm</a></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="hvideo-box">
                        <div class="hv_box_inner">
                            <!--<span class="vtime">02:10</span>-->
                            <img src="images/video_new.jpg" alt="">
                            <div class="hv-info">
                                <a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                    data-caption="My caption" class="play">
                                    <i class="fa fa-play"></i>
                                </a>
                                <h4><a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                        data-caption="My caption">Nicolson Goals are like Storm</a></h4>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="hvideo-box">
                        <div class="hv_box_inner">
                            <!--<span class="vtime">02:10</span>-->
                            <img src="images/video_new.jpg" alt="">
                            <div class="hv-info">
                                <a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                    data-caption="My caption" class="play">
                                    <i class="fa fa-play"></i>
                                </a>
                                <h4><a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                        data-caption="My caption">Nicolson Goals are like Storm</a></h4>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="hvideo-box">
                        <div class="hv_box_inner">
                            <!--<span class="vtime">02:10</span>-->
                            <img src="images/video_new.jpg" alt="">
                            <div class="hv-info">
                                <a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                    data-caption="My caption" class="play">
                                    <i class="fa fa-play"></i>
                                </a>
                                <h4><a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                        data-caption="My caption">Nicolson Goals are like Storm</a></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="hvideo-box">
                        <div class="hv_box_inner">
                            <!--<span class="vtime">02:10</span>-->
                            <img src="images/video_new.jpg" alt="">
                            <div class="hv-info">
                                <a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                    data-caption="My caption" class="play">
                                    <i class="fa fa-play"></i>
                                </a>
                                <h4><a href="https://www.youtube.com/watch?v=g-beFHld19c" data-fancybox="images"
                                        data-caption="My caption">Nicolson Goals are like Storm</a></h4>
                            </div>
                        </div>
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
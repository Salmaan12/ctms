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
        <h1 data-generated="Contact">Contact</h1>
        <div class="gt-breadcrumbs">
            <ul>
                <li>
                    <a href="home.php"> <i class="fa fa-home"></i> Home </a>
                </li>
                <li class="none"> <a href="contact.php" class="active"> Contact </a> </li>
            </ul>
        </div>
    </div>
</section>


<section class=" ab_page">
    <div class="container marginleftright">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 flexCol">
                <h3 class="bottom">Send Us Message</h3>
                <div class="sptext">
                    <p>If you have any queries or complaints regarding our products or services, please contact us. Our
                        customer support team will get back to assist you shortly.</p>
                </div>
                <form class="contact_form" action="database/contactFormform.php" method="POST" id="contactFormForm">
                    <div class="">
                        <div class="form-group">
                            <input type="text" placeholder="Your Name" name="name" id="name">
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <input type="text" placeholder="Your Email" name="email" id="email">
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <input type="text" placeholder="Your Number" name="number" id="number">
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <textarea placeholder="Your Message" name="message" id="message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="contactClick" value="Send Message">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 flexCol">
                <div class="inner_text contact">
                    <h3 class="bottom">Contact Details</h3>
                    <p>Choose one of the alternative methods of communication. We’re available from Monday to Friday,
                        07:30-19:00 to take your call.</p>
                    <ul>
                        <li>
                            <a href="#"> <img src="images/pin.jpg" alt="">Garden West, Progressive Plaza Karachi</a>
                        </li>
                        <li>
                            <a href="mailto:info@yourdomain.com"><img src="images/emial.jpg"
                                    alt="">ctmsfyp@gmail.com</a>
                        </li>
                        <li>
                            <a href="tel:03122558011"><img src="images/phone.jpg" alt="">03122558011</a>
                        </li>
                    </ul>
                </div>
                <div class="map_sec">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d115818.65156441362!2d66.96279295103668!3d24.886625257437178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1644432951872!5m2!1sen!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left"> </div>
        </div>
    </div>
</section>

<script type="text/javascript">
$("#contactClick").click(function() {

    if ($("#name").val() == '' || $("#email").val() == '' || $("#number").val() == '' || $("#message").val() ==
        '') {
        toastr.error("Please Fill The Complete Form");
        return;
    }

    $.post($("#contactFormForm").attr("action"), $("#contactFormForm :input").serializeArray(), function(
        info) {
        $("#result").html(info);
        toastr.success("Your Message has Been Sent To CTMS Management Committee");
    });
});
$("#contactFormForm").submit(function() {
    return false;
});
</script>



<?php
include 'footer.php';
    }
}
?>
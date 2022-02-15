<?php
 include 'header.php';
 include 'nav.php';
?>

<section class="inner_bannersec">
    <img src="images/innerbanner.jpg" class="img-responsive">
    <div class="inner-banner-header wf100">
        <h1 data-generated="Contact">Account</h1>
        <div class="gt-breadcrumbs">
            <ul>
                <li> <a href="index.html"> <i class="fa fa-home"></i> Home </a> </li>
                <li class="none"> <a href="account.html" class="active"> Account </a> </li>
            </ul>
        </div>
    </div>
</section>


<section class=" ab_page account_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <form action="database/userlogin.php" method="POST" id="userLoginForm">
                    <h3>Login To Your Account</h3>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Password" required>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="">Remember me</label>
                        <span><a href="">Forgot Password?</a></span>
                    </div>
                    <div>
                        <button type="submit" id="loginAcct" name="login"
                            class="btn btn-success btn-block">LOGIN</button>
                    </div>
                </form>


            </div>
            <div class="col-md-6 col-sm-6">
                <div class="login-box">
                    <h3>Register Your Account</h3>
                    <form action="database/userregform.php" method="POST" id="regForm">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" name="fname" id="fname" placeholder="First Name" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" id="lname" placeholder="Last Name" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input type="email" name="email" id="email" placeholder="Email Address" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Re-type password</label>
                            <input type="password" name="repass" id="repass" placeholder="Retype password"
                                class="form-control" required>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="">
                                <p>By creating an account, You agree to our <span class="t&policy"><a href="">Term &
                                            Condition</a></span></p>
                            </label>
                            <!-- <span><a href="">Forgot Password?</a></span> -->
                        </div>
                        <button type="submit" id="createAcct" name="submit" class="btn btn-success btn-block">CREATE
                            ACCOUNT</button>
                    </form>
                    <span id="result"></span>
                </div>
            </div>
        </div>
    </div>
</section>




<script type="text/javascript">
// user registration form data ajax

if ($("#fname").val() == '' || $("#lname").val() == '' || $("#email").val() == '' || $("#password").val() == '' || $(
        "#repass").val() == '') {
    toastr.error("Please Fill The Complete Form");
    return;
}

jQuery("#createAcct").click(function() {
    jQuery.post(jQuery("#regForm").attr("action"), jQuery("#regForm :input").serializeArray(), function(info) {
        jQuery("#result").html(info);
    });
});
jQuery("#regForm").submit(function() {
    return false;
});
</script>

<?php

include 'footer.php';
    
?>
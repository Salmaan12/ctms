<?php include 'header.php'?>
<div class="signin">
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 sign-in-block">
                <a href="index.php"><img src="./../images/main-logo.png" alt="logo" style="width: 100%;"></a>
                <form action="database/captainlogin.php" method="post">
                    <!-- <h4>Sign in with your social network</h4>
                    <a href="https://www.facebook.com/" class="btn btn-default facebook-btn">
                        <i class="fa fa-facebook" aria-hidden="true"></i> Sign in with FACEBOOK
                    </a>
                    <a href="https://accounts.google.com/login/signinchooser?hl=en&flowName=GlifWebSignIn&flowEntry=ServiceLogin"
                        class="btn btn-default google-btn">
                        <i class="fa fa-google" aria-hidden="true"></i> Sign in with GOOGLE
                    </a>
                    <h6>OR</h6> -->
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                            placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                            placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                    <button type="submit" name="login" class="btn btn-default submit-btn">SIGN IN</button>
                    <h6><a href="#">Lost Your Password?</a></h6>
                    <h5>“Don’t Have An Account" <a href="register.php">GET REGISTER FREE NOW!</a></h5>
                </form>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
</div>
</body>

</html>
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

<section class="result">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="decorated" style="margin: 5% 0%;"><span>Previous Results</span></h3>
            </div>

            <h3 class="dateheading">Sunday, 4 July 2021</h3>

            <div class="js-match match-list__item result PBKSDC col-md-12">
                <div class="result__team-logos">
                    <div class="result__team-logo">
                        <img src="images/logo1.jpeg" alt="" width="80px">
                    </div>
                    <div class="result__versus">v</div>
                    <div class="result__team-logo">
                        <img src="images/logo2.jpeg" alt="" width="80px">
                    </div>
                </div>

                <div class="result__teams">
                    <div class="result__team result__team--loser">
                        <div class="result__logo u-show-phablet tLogo40x32 t-PBKS PBKS"></div>
                        <div class="result__logo u-show-tablet u-hide-phablet tLogo40x PBKS"></div>
                        <p class="result__team-name">Sindh tigers</p>

                        <span class="result__score ">
                            <strong>123</strong>/6
                            <span class="result__overs">
                                10/10
                            </span>
                        </span>
                    </div>
                    <div class="result__team ">
                        <div class="result__logo u-show-phablet tLogo40x32 t-DC DC"></div>
                        <div class="result__logo u-show-tablet u-hide-phablet tLogo40x DC"></div>
                        <p class="result__team-name">North Kings</p>

                        <span class="result__score result__score--winner">
                            <strong>126</strong>/7
                            <span class="result__overs">
                                9.2/10
                            </span>
                        </span>
                    </div>

                    <p class="result__info u-show-phablet">
                        <span class="result__description">Match 29</span> 19:30 IST (14:00 GMT), Narendra Modi Stadium,
                        Ahmedabad
                    </p>
                </div>

                <div class="result__links">
                    <p class="result__outcome u-hide-phablet">North Kings won by 7 wickets</p>
                    <p class="result__info u-hide-phablet">
                        <span class="result__description">Match 01</span>
                    </p>
                    <div class="result__buttons"><a class="result__button u-show-phablet btn" aria-role="button"
                            href="//www.iplt20.com/video/238204?references=CRICKET_MATCH:23498">Highlights</a>
                        <a class="result__button result__button--mc btn"
                            href="/match/2021/29?tab=scorecard">Scorecard</a>
                    </div>

                </div>
            </div>
            <div class="js-match match-list__item result PBKSDC col-md-12">
                <div class="result__team-logos">
                    <div class="result__team-logo">
                        <img src="images/sindh.png" alt="" width="80px">
                    </div>
                    <div class="result__versus">v</div>
                    <div class="result__team-logo">
                        <img src="images/north.png" alt="" width="80px">
                    </div>
                </div>

                <div class="result__teams">
                    <div class="result__team result__team--loser">
                        <div class="result__logo u-show-phablet tLogo40x32 t-PBKS PBKS"></div>
                        <div class="result__logo u-show-tablet u-hide-phablet tLogo40x PBKS"></div>
                        <p class="result__team-name">Sindh tigers</p>

                        <span class="result__score ">
                            <strong>67</strong>/9
                            <span class="result__overs">
                                10/10
                            </span>
                        </span>
                    </div>
                    <div class="result__team ">
                        <div class="result__logo u-show-phablet tLogo40x32 t-DC DC"></div>
                        <div class="result__logo u-show-tablet u-hide-phablet tLogo40x DC"></div>
                        <p class="result__team-name">North Kings</p>

                        <span class="result__score result__score--winner">
                            <strong>68</strong>/3
                            <span class="result__overs">
                                9.2/10
                            </span>
                        </span>
                    </div>

                    <p class="result__info u-show-phablet">
                        <span class="result__description">Match 29</span> 19:30 IST (14:00 GMT), Narendra Modi Stadium,
                        Ahmedabad
                    </p>
                </div>

                <div class="result__links">
                    <p class="result__outcome u-hide-phablet">North Kings won by 7 wickets</p>
                    <p class="result__info u-hide-phablet">
                        <span class="result__description">Match 02</span>
                    </p>
                    <div class="result__buttons"><a class="result__button u-show-phablet btn" aria-role="button"
                            href="//www.iplt20.com/video/238204?references=CRICKET_MATCH:23498">Highlights</a>
                        <a class="result__button result__button--mc btn"
                            href="/match/2021/29?tab=scorecard">Scorecard</a>
                    </div>

                </div>
            </div>

            <h3 class="dateheading">Sunday, 11 July 2021</h3>

            <div class="js-match match-list__item result PBKSDC col-md-12">
                <div class="result__team-logos">
                    <div class="result__team-logo">
                        <img src="images/logo3.jpeg" alt="" width="80px">
                    </div>
                    <div class="result__versus">v</div>
                    <div class="result__team-logo">
                        <img src="images/logo4.jpeg" alt="" width="80px">
                    </div>
                </div>

                <div class="result__teams">
                    <div class="result__team result__team--loser">
                        <div class="result__logo u-show-phablet tLogo40x32 t-PBKS PBKS"></div>
                        <div class="result__logo u-show-tablet u-hide-phablet tLogo40x PBKS"></div>
                        <p class="result__team-name">Sindh tigers</p>

                        <span class="result__score ">
                            <strong>123</strong>/6
                            <span class="result__overs">
                                10/10
                            </span>
                        </span>
                    </div>
                    <div class="result__team ">
                        <div class="result__logo u-show-phablet tLogo40x32 t-DC DC"></div>
                        <div class="result__logo u-show-tablet u-hide-phablet tLogo40x DC"></div>
                        <p class="result__team-name">North Kings</p>

                        <span class="result__score result__score--winner">
                            <strong>126</strong>/7
                            <span class="result__overs">
                                9.2/10
                            </span>
                        </span>
                    </div>

                    <p class="result__info u-show-phablet">
                        <span class="result__description">Match 29</span> 19:30 IST (14:00 GMT), Narendra Modi Stadium,
                        Ahmedabad
                    </p>
                </div>

                <div class="result__links">
                    <p class="result__outcome u-hide-phablet">North Kings won by 7 wickets</p>
                    <p class="result__info u-hide-phablet">
                        <span class="result__description">Match 03</span>
                    </p>
                    <div class="result__buttons"><a class="result__button u-show-phablet btn" aria-role="button"
                            href="//www.iplt20.com/video/238204?references=CRICKET_MATCH:23498">Highlights</a>
                        <a class="result__button result__button--mc btn"
                            href="/match/2021/29?tab=scorecard">Scorecard</a>
                    </div>

                </div>
            </div>
            <div class="js-match match-list__item result PBKSDC col-md-12">
                <div class="result__team-logos">
                    <div class="result__team-logo">
                        <img src="images/south.png" alt="" width="80px">
                    </div>
                    <div class="result__versus">v</div>
                    <div class="result__team-logo">
                        <img src="images/kpk.png" alt="" width="80px">
                    </div>
                </div>

                <div class="result__teams">
                    <div class="result__team result__team--loser">
                        <div class="result__logo u-show-phablet tLogo40x32 t-PBKS PBKS"></div>
                        <div class="result__logo u-show-tablet u-hide-phablet tLogo40x PBKS"></div>
                        <p class="result__team-name">Sindh tigers</p>

                        <span class="result__score ">
                            <strong>123</strong>/6
                            <span class="result__overs">
                                10/10
                            </span>
                        </span>
                    </div>
                    <div class="result__team ">
                        <div class="result__logo u-show-phablet tLogo40x32 t-DC DC"></div>
                        <div class="result__logo u-show-tablet u-hide-phablet tLogo40x DC"></div>
                        <p class="result__team-name">North Kings</p>

                        <span class="result__score result__score--winner">
                            <strong>126</strong>/7
                            <span class="result__overs">
                                9.2/10
                            </span>
                        </span>
                    </div>

                    <p class="result__info u-show-phablet">
                        <span class="result__description">Match 29</span> 19:30 IST (14:00 GMT), Narendra Modi Stadium,
                        Ahmedabad
                    </p>
                </div>

                <div class="result__links">
                    <p class="result__outcome u-hide-phablet">North Kings won by 7 wickets</p>
                    <p class="result__info u-hide-phablet">
                        <span class="result__description">Match 04</span>
                    </p>
                    <div class="result__buttons"><a class="result__button u-show-phablet btn" aria-role="button"
                            href="//www.iplt20.com/video/238204?references=CRICKET_MATCH:23498">Highlights</a>
                        <a class="result__button result__button--mc btn"
                            href="/match/2021/29?tab=scorecard">Scorecard</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php';
    }
}
?>
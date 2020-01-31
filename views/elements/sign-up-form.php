<header id="landingBanner">

    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center text-white pt-3">Adventure | Passion | Escape</h3>
        </div> <!--End of image col-md-6-->

        <div class="col-md-6" id="signUpRight">
            <div id="signupAccordion">
                <p class="text-center mt-4 text-secondary">A Social Gathering Place For All Drone Enthusiasts</p>
              <!--Signup Start-->



    <div class="row">
        <div class="col-md-2"><!--Leave Empty--></div>
            <div class="col-md-8">
         
                    <div class="card-body" id="signupCardBody" data-parent="#signupAccordion">
                        <?php echo (!empty ($_SESSION["create_account_msg"]))?$_SESSION["create_account_msg"]:''; ?>
                        <form action="/users/add.php" method="post" id="registerForm">

                            <div class="text-center">
                                <img class="register-logo" src="/views/assets//images/skysocial-logo.png" alt="SkySocial logo">
                            </div>

                            <input type="text" class="form-control mb-3" name="username" placeholder="Username" required>                    
                            <input type="email" class="form-control mb-3" name="email" placeholder="Email Address" required>                    
                            <input type="password" class="form-control mb-3" name="password" placeholder="Password" required>                    
                            <input type="password" class="form-control mb-3" name="password2" placeholder="Confirm Password" required>
                            <hr>
                            <h5>Profile Info</h5>
                            <input type="text" class="form-control mb-3" name="firstname" placeholder="First Name" required>  
                            <input type="text" class="form-control mb-3" name="lastname" placeholder="Last Name" required>
                            <textarea class="form-control mb-3" name="bio" placeholder="Bio" required></textarea>
                            <div class="text-left">
                               <span>Already have an account? <br/> <span id="hideRegister" class="register-back"> Click here.</span></span>
                               <button type="submit" class="btn btn-primary float-right register-btn" name="registerButton">Register</button>  
                            </div>
                           
                                 
                        </form>
                    </div>
    
            </div> <!--End of sign up md-8-->
        <div class="col-md-2"><!--Leave Empty--></div>
    </div> <!--End of Sign up row-->

    <div class="row">
        <div class="col-md-2"><!--Leave empty--></div>
            <div class="col-md-8">

                <div class="card-body show" id="loginCardBody" data-parent="#signupAccordion">
                    <?php echo (!empty ($_SESSION["login_attempt_msg"]))?$_SESSION["login_attempt_msg"]:''; ?>
                        <form action="/users/login.php" method="post" id="loginForm">

                        <div class="text-center">
                            <img class="login-logo" src="/views/assets//images/skysocial-logo.png" alt="SkySocial logo">
                        </div>

                            <input type="text" name="username" class="form-control mb-3" placeholder="Username or Email" required>
                            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="remember" value="true">
                                <label for="remember">Remember Me</label>
                            </div>

                            <div>
                                <span>Not a member? <br/> <span class="text-left login-back" id="hideLogin"> Register here.</span></span>
                                <button type="submit" class="btn btn-primary float-right login-btn">Login</button>
                            </div>
                           
                        </form>
                 </div>

            </div> <!--End of login md-8-->
        <div class="col-md-2"><!--Leave empty--></div>
    </div> <!--End of Login row-->


       <ul class="list-group list-group-horizontal right-icons">
            <li><a href=""><i class="fab fa-instagram fa-lg"></i></a></li>
            <li><a href=""><i class="fab fa-youtube fa-lg"></i></a></li>
            <li><a href=""><i class="fab fa-facebook-square fa-lg"></i></a></li>  
       </ul>

       <ul class="list-group list-group-horizontal right-links">
            <li><a href="#">About</a></li>
            <li><a href="#">Press</a></li>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact</a></li>
       </ul>     

            </div>   <!--signupAccordion End-->
        </div> <!--End of row-->

</header>

     <footer class="footer">
        <div class="container footer-content">
            <div class="row">
                <div class="col-md-1"><!--Leave empty--></div>

                <div class="col-md-2">
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Terms and Conditions</a></li>
                    </ul>
                </div>

                <div class="col-md-2">
                    <ul>
                        <li><a href=""><i class="fab fa-instagram fa-lg"></i> Facebook</a></li>
                        <li><a href=""><i class="fab fa-youtube fa-lg"></i> Youtube</a></li>
                        <li><a href=""><i class="fab fa-facebook-square fa-lg"></i> Instagram</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <small class="newsletter">Subscribe to our newsletter.</small>
                    <div class="flex">
                        <div>
                            <div class="input-group mt-2">
                                <input type="text" class="form-control footer-input" placeholder="Email Address">
                                <span><button class="btn btn-primary news-btn">Sign Up</button></span>
                            </div>
                        </div> 
                    </div>
                </div>

                <div class="col-md-2 footer-spacing">
                    <ul class="footer-contact">
                        <li>106-1708 Kelowna Ave</li>
                        <li>V1Y 9S4</li>
                        <li>+250.212.6079</li>
                        <li><a href="mailto:example@example.com">info@skysocial.com</a></li>
                    </ul>
                </div>

                <div class="col-md-1"><!--Leave empty--></div>
            </div>
        </div>
     </footer>


        <?php
        unset($_SESSION['login_attempt_msg']);
        unset($_SESSION['login_account_msg']);
        ?>

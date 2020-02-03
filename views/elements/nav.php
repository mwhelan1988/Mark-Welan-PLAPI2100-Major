
    <?php
        //if user is logged in (session is NOT empty)
        if( !empty($_SESSION['user_logged_in']) ) { 
    ?>

       
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light my-2" id="nav">
    <div class="container nav-container">

                <div class="col-md-4 nav-brand-mobile">
                    <a class="navbar-brand" href="/"><img src="/views/assets/images/skysocial-logo.png" alt="SkySocial logo on transparent background"></a>
                </div> <!--End of col-md-4 logo-->



                <div class="col-md-1"><!--Leave empty--></div>



                <div class="col-md-3">
                    <div class="search-locate">
                            <form class="form-inline" id="search_form">
                                <input id="search" type="search" autocomplete="off" name="search" class="form-control" placeholder="search">
                                <div id="search_results">
                                    
                                    </div>
                                </form>
                    </div>
                </div> <!--End of col-md-3 search-->
            


                <div class="col-md-2">
                    <a href="/users/"><img class="nav-profile-pic" id="img-preview" src="<?=$current_user['profile_pic']?>"></a> 
                </div> <!--End of col-md-2 profile pic-->



                <div class="col-md-2 browser-nav">   
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNavBar">
                        <i class="fas fa-bars"></i>
                    </button>

                        <div class="navbar-collapse collapse right-nav" id="mainNavBar">
                            <ul class="navbar-nav">      
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-item" id="accountDropdown" data-toggle="dropdown"><i class="fas fa-cogs fa-lg cog"></i></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="/users/">My Profile</a>
                                            <a class="dropdown-item" href="/users/logout.php">Logout</a>
                                        </div> <!--end of dropdown menu-->
                                </li>
                            </ul>
                        </div> <!--End of navbar-collapse-->
                </div><!--End of col-md-2 -->

            <div class="col-md-2 mobile-nav">   
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavBar" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                    <div class="collapse navbar-collapse right-nav" id="mainNavBar">
                        <div class="navbar-nav">
                            <a class="dropdown-item" href="/users/">My Profile</a>
                            <a class="dropdown-item" href="/users/logout.php">Logout</a>
                        </div>
                    </div>
                </div>

        </nav>
 

</div> <!--end of container-->



            <?php
                } //end of userr_logged_in session
            ?>
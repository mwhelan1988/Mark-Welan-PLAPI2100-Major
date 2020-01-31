
    <?php
        //if user is logged in (session is NOT empty)
        if( !empty($_SESSION['user_logged_in']) ) { 
            ?>

       
<div class="container">


        <nav class="navbar navbar-expand-lg navbar-light bg-light my-4">
            <div class="col-md-4">
                <a class="navbar-brand" href="/"><img src="/views/assets/images/skysocial-logo.png" alt="SkySocial logo on transparent background"></a>
            </div> <!--End of col-md-4 logo-->



             <div class="col-md-1"><!--Leave empty--></div>



            <div class="col-md-3">
                <div class="search-locate">
                        <form class="form-inline" id="search_form">
                            <input id="search" type="search" autocomplete="off" name="search" class="form-control" placeholder="search">
                            <div id="search_results">
                        </form>
                            </div>
                </div>
            </div> <!--End of col-md-3 search-->
        


            <div class="col-md-2">
                <img class="nav-profile-pic mx-auto" id="img-preview" src="<?=$current_user['profile_pic']?>">
            </div> <!--End of col-md-2 profile pic-->



            <div class="col-md-2">   
                <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNavBar">
                    <i class="fas fa-bars"></i>
                </button>

                    <div class="navbar-collapse collapse right-nav" id="mainNavBar">
                        <ul class="navbar-nav">
                                
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-item" id="accountDropdown" data-toggle="dropdown"><i class="fas fa-cogs fa-lg"></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/users/">My Profile</a>
                                        <a class="dropdown-item" href="/users/logout.php">Logout</a>
                                    </div>
                            </li>
                            
                        </ul>
                    </div>
                </div><!--End of col-md-2 -->
        </nav>
    </div>      
</div>

            <?php
                } //end of userr_logged_in session
            ?>
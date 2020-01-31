<?php

require_once("../../controllers/includes.php");

$title = "My Profile";

require_once("../elements/header.php");
require_once("../elements/nav.php");

//check if the is is set
//if it is, get the user by id and paste data 
//else load the current user

if( !empty($_GET['id']) ) {
    $user_id = $_GET['id'];
    $u_model = new User;
    $selected_user = $u_model->get_by_id($user_id);

} else {
    $selected_user = $current_user;
}

?>


<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2>My Profile</h2>
            <hr>
            <img id="img-preview" src="<?=$selected_user ['profile_pic']?>">

            <?php  echo $selected_user ['firstname'] . " " . $selected_user ['lastname'] ?>

            
            <?php
                if($selected_user['id'] == $_SESSION['user_logged_in'] ) {
            ?>

            
            <p>
                <a href="/users/edit.php" class="btn btn-primary">Edit User</a>
            </p>

            <?php
            }
            ?>
           
           
        </div>
    </div>

    <div class="container">
        <div class="row">

                <?php
                                
                $p_model = new Project;
                $user_projects = $p_model->get_by_user_id($selected_user['id']);
                // print_r($user_projects);

                foreach( $user_projects as $user_project) {
                    // print_r($user_project);
                    // echo $user_project['title']; this would give you the title of the project

                ?>  
                    
                        <div class="col-md-4">
                            <div class="outer-img-box">
                             <img class="inner-img" src="<?= $user_project['file_url'] ?>" alt="">
                            </div>
                        </div>
            
                        
                <?php
                }
                ?>

        </div>
    </div>




</div>


<?php

require_once("../elements/footer.php");

?>







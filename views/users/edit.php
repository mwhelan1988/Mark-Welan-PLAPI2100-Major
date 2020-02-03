<?php

require_once("../../controllers/includes.php");

//if the form was submitted 
if(!empty($_POST) ) {
    $user->edit();
    header("location: /users/");
    exit;
}

$title = "Editing " . $current_user['username'];

require_once("../elements/header.php");
require_once("../elements/nav.php");
// echo "<pre>";
// print_r($current_user);
?>

<div class="container">
    <div class="row">

        <div class="col-md-2"><!--Leave this empty--></div>

        <div class="col-md-3">
             <!--Profile Picture-->
             <div class="text-center">
                 <img id="img-preview" class="edit-img-preview" src="<?=$current_user['profile_pic']?>">
             </div>
        </div>

        <div class="col-md-1"><!--Leave this empty--></div>

        <div class="col-md-4">

            <form method="post" enctype="multipart/form-data">

         
                <div class="form-group custom-file mb-3">
                    <input class="custom-file-input" id="file-with-preview" type="file" name="fileToUpload" class="form-control">
                    <label class="custom-file-label">Upload Creation</label>
                </div>


                <div class="form-group">
                <div class="input-icons">
                    <i class="fas fa-user-edit"></i>
                    <input id="username" type="text"" name="username" class="form-control" value="<?=$current_user['username']?>" required>
                </div>
                </div>



                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                <div class="input-icons">
                <i class="fas fa-user"></i>
                    <input id="firstname" type="text" name="firstname" class="form-control" value="<?=$current_user['firstname']?>" required>
                </div>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                <div class="input-icons">
                <i class="fas fa-user"></i>
                    <input id="lastname" type="text" name="lastname" class="form-control" value="<?=$current_user['lastname']?>" required>
                </div>
                </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                <div class="input-icons">
                    <i class="fas fa-lock icons"></i>
                    <input id="password" placeholder="Password" type="text" name="password" class="form-control">
                </div>
                </div>
                </div>

        
                <div class="col-md-6">
                <div class="form-group">
                <div class="input-icons">
                    <i class="fas fa-lock icons"></i>
                    <input id="password2" placeholder="Re-Enter Password" type="text" name="password2" class="form-control">
                </div>
                </div>
                </div>

                </div>

                <div class="form-group">
                <div class="input-icons">
                    <textarea id="bio" name="bio" class="form-control"><?=$current_user['bio']?></textarea>
                </div>
                </div>

                <div class="text-right edit-btn-update">
                    <button class="btn btn-primary update-btn">Update</button>
                </div>

               <div id="modalTest" class="edit-btn-update">
            <button type="button" class="btn btn-danger modal-btn" data-toggle="modal" data-target="#exampleModal">
                Delete Account
            </button>

        </div> 


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Are you sure you want to delete your account?</h6>

                    

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <a class="float-right btn btn-danger" href="/users/delete.php">Yes, delete now.</a>
                </div>
                </div>
            </div>
        </div>
    </div>



            </form>
           
           
        </div> <!--End of col-md-4-->

        <div class="col-md-2"><!--Leave this empty--></div>

    </div> <!--End of row-->
</div> <!--End of container-->


<?php

require_once("../elements/footer.php");

?>
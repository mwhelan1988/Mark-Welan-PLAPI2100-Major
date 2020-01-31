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

        <div class="col-md-6">
             <!--Profile Picture-->
             <div class="text-center">
                 <img id="img-preview" src="<?=$current_user['profile_pic']?>">
             </div>
        </div>


        <div class="col-md-6">

            <form method="post" enctype="multipart/form-data">

         
                <div class="form-group custom-file mb-3">
                    <input class="custom-file-input" id="file-with-preview" type="file" name="fileToUpload" class="form-control">
                    <label class="custom-file-label">Upload Creation</label>
                </div>


                <div class="form-group">
                    <input id="username" type="text"" name="username" class="form-control" value="<?=$current_user['username']?>" required>
                </div>

                <div class="form-group">
                    <input id="firstname" type="text" name="firstname" class="form-control" value="<?=$current_user['firstname']?>" required>
                </div>

                <div class="form-group">
                    <input id="lastname" type="text" name="lastname" class="form-control" value="<?=$current_user['lastname']?>" required>
                </div>

                <div class="form-group">
                    <input id="password" placeholder="Password" type="text" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <input id="password2" placeholder="Re-Enter Password" type="text" name="password2" class="form-control">
                </div>

                <div class="form-group">
                    <textarea id="bio" name="bio" class="form-control"><?=$current_user['bio']?></textarea>
                </div>

                <div class="text-right">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
           
           
        </div>
    </div>
</div>


<?php

require_once("../elements/footer.php");

?>
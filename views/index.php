<?php

require_once("../controllers/includes.php");

$title = "Home Page";

require_once("elements/header.php");
require_once("elements/nav.php");


            if( empty($_SESSION['user_logged_in'])) {
                //shows login form
                require_once("elements/sign-up-form.php");
            } else {
                         //check for alerts          
                        if( !empty($_SESSION['errors'] ) && is_array($_SESSION['errors']) ) {
                            foreach( $_SESSION['errors'] as $error ) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                            unset($_SESSION['errors']);
                        
                        }

                    ?>

<div class="container">
        <div class="row">

    <div id="modalTest">
         <div class="col-md-12">
            <button type="button" class="btn btn-primary modal-btn" data-toggle="modal" data-target="#exampleModal">
                Click this to open modal
            </button>

            </div> <--remove later?!?!?-->


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    </div>
      

            <div class="col-md-8" id="projectFeed">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Share your new Creation!</h4>
                    </div>
                    <div class="card-body">
                        <form action="/projects/add.php" method="post" enctype="multipart/form-data">
                            <img id="img-preview" class="w-100">
                            <div class="form-group custom-file">
                                <input class="custom-file-input" id="file-with-preview" type="file" name="fileToUpload" class="form-control" required>
                                <label class="custom-file-label">Upload Creation</label>
                            </div>
                            <div class="form-group mt-3">
                                <input class="form-control" type="text" name="title" placeholder="MOC Name" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="description" placeholder="MOC Description" required></textarea>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-outline-warning">Post MOC!</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="projectFeed">
                    <?php
                        $p_model = new Project;
                        $projects = $p_model->get_all();
                        // print_r($projects);
                        $c_model = new Comment;

                        foreach($projects as $project) {
                            ?>
                            <div class="card project-post mt-3">
                                <div class="card-header">
                                    
                                <h4><a href="/users?id=<?=$project['user_id']?>"><?=$project['firstname']. " " . $project["lastname"]?></a>
                                <?php
                                if($project['user_id'] == $_SESSION['user_logged_in'] ) {
                                    ?>
                                    <span class="float-right">
                                        <a href="/projects/edit.php?id=<?=$project['id']?>"><i class="fas fa-edit"></i></a>
                                        <a href="/projects/delete.php?id=<?=$project['id']?>"><i class="fas fa-trash"></i></a>
                                    </span>
                                    <?php
                                }
                                ?></h4>  
                                </div>

                                <div class="card-img">
                                    <img src="<?=$project['file_url']?>" class="img-fluid 2=100">
                                </div>

                                <div class="card-body">
                                <h4><?=$project['title']?></h4>
                                 <p><?=$project['description']?></p>
                                 <p><small class="text-muted">Posted <?=date("M d, Y", strtotime($project['date_uploaded']))?></small></p>
                                </div>

                                <div class="card-footer">
                                <?php
                                    $love_class = 'far';
                                    if(!empty($project['love_id'] ) ) {
                                        $love_class = 'fas';
                                    }
                            ?> <div class="project-meta">
                                    <span class="love-btn float-left" data-project="<?=$project['id']?>">
                                        <i class="<?=$love_class?> fa-heart text-danger love-icon"></i>
                                        <span class="love-count"><?=$project['love_count']?></span>
                                    </span>

                                    <span class="float-right comment-btn">
                                        <i class="far fa-comment"></i>
                                        <span class="comment-count"><?php 
                                            echo $c_model->get_count($project['id']);
                                        ?></span>
                                    </span>
                                </div> <!--End of project meta-->
                                    <hr>

                                    <div class="comment-loop pt-4">
                                    <?php
                                    $project_comments = $c_model->get_all_by_project_id($project['id']);
                                    foreach($project_comments as $user_comment) {
                                       $my_comment = ($user_comment['user_owns'] == "true") ? "my_comment" : "";
                                       $my_comment_trash = ($user_comment['user_owns'] == "true") ? "<i class='fas fa-trash'></i>" : "";
                                       
                                    ?>
                                        <div class="user-comment ">
                                            <p>
                                                <span class="font-weight-bold comment-username <?=$my_comment?>"><?=$user_comment['username']?>: </span> 
                                                <?=$user_comment['comment']?>
                                                <a href="/comments/delete.php?id=<?=$user_comment['id']?>"><?=$my_comment_trash?></a>
                                            </p>
                                        </div>
                                        <?php 
                                    } //end of foreach $project_comments
                                        ?>
                                    </div> <!--end of comment-loop-->

                                    <hr>

                                    <p class='comment-btn'>Show comments</p>
                                    <form class="comment-form" data-project="<?=$project['id']?>">
                                        <input type="text" name="comment" placeholder="Write a comment." class="form-control comment-box">
                                    
                                    </form>
                                </div> <!--end of card-footer-->
                            </div>
                            <?php

                        }
                    ?>
                </div>

         
             </div>
            <div class="col-md-4" id="searchArea">
                   

        </div>
    </div>
</div>
        
        <?php
            }
        ?>



<?php
require_once("elements/footer.php")
?>


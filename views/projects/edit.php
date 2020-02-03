<?php 
require_once("../../controllers/includes.php");

if( !empty($_GET['id']) ) {
    $p_model = new Project; //start project model 
    $project = $p_model->get_by_id($_GET['id']);

    if (!empty($_POST)) {
        $p_model->edit($_GET['id']);
        header('Location: /');
        exit;
    }
    
} else {
    header("Location: /");
    exit;
}

require_once('../elements/header.php');
require_once('../elements/nav.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Edit Project</h4>
                </div> <!--end of card-header-->

                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                    <img id="img-preview" class="w-100" src="<?=$project['file_url']?>">
                            <div class="form-group custom-file">
                                <input class="custom-file-input" id="file-with-preview" type="file" name="fileToUpload" class="form-control">
                                <label class="custom-file-label">Attach image</label>
                            </div>

                            <div class="form-group mt-3">
                                <input class="form-control" type="text" name="title" placeholder="Title" value="<?=$project['title']?>" required>
                            </div>

                            <div class="form-group mt-3">
                                <textarea class="form-control" name="description" placeholder="Description"required><?=$project['description']?></textarea>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-outline-warning">Update Project</button>
                            </div>

                    </form>
                </div> <!--End of card body-->
            </div> <!--end of card class-->
        </div>
    </div>
</div>

<?php
require_once('../elements/footer.php')
?>
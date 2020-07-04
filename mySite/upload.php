<?php mb_internal_encoding("UTF-8");
require 'blocks/header.php';
require 'config/connect_to_red.php';
if(isset($_POST['upload']))
{
   // var_dump($_POST);
    if(isset($_FILES['image']['name'])){
        $target="img/user_uploaded_images/".basename($_FILES['image']['name']);
        $image=$_FILES['image']['name'];
        //var_dump($_FILES);
        $query='update user set image="'.$image.'" where login="'.$_COOKIE['usa'].'"';
        mysqli_query($conn,$query);
    }else{
        echo '<div class="container alert alert-danger">Choose new image</div><hr>';
    }
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        echo '<div class="container alert alert-success">Image uploaded successfully</div><hr>';
        echo '<div class="container alert alert-success text-center">
<a href="profile.php" class="btn btn-outline-primary">My Profile</a>
<a href="../index.php" class="btn btn-outline-primary">To main page</a>
</div>';
    }else{
        echo '<div class="container alert alert-danger">There was a problem</div><hr>';
    }
}
?>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <div class="container  mt-5">
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6">
                <h3 class="mb-3 ">Upload</h3>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="image" class="form-group btn btn-outline-secondary"/><br/>
                    <input type="submit" name="upload" value="Загрузить" class="btn btn-success"/>
                </form>
            </div>
            <div class="col-3 text-md-right">
            </div>
        </div>
    </div>
<?php
require 'blocks/footer.php' ?>
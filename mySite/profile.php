
<?php require 'blocks/header.php';
require 'config/connect_to_red.php';
$get_gender="SELECT is_male,email,is_admin,is_super_admin,image FROM user WHERE login='".$_COOKIE['usa']."'";
$get_gen_result = mysqli_query($conn, $get_gender);
$gend = mysqli_fetch_assoc($get_gen_result);
    $is_male=$gend['is_male'];
$email=$gend['email'];
$is_super_admin=$gend['is_super_admin'];
$is_admin=$gend['is_admin'];
?>

<div class="container text-center ">
    <div class="row">
        <div class="col-3 mb-3">
            <img src="img/<?php
            if(isset($gend['image'])){
             echo   'user_uploaded_images/'.$gend['image'];
            } else if($is_male) {
                echo 'male_avatar.png';
            }else{echo 'female_avatar2.png';}
            ?>" alt="" width="130" height="130" class="img-thumbnail" style="border-radius: 50%"/><br/>
<a href="upload.php">Upload new Image?</a>
        </div>
        <div class="col-5"> </div>
        <div class="col-4">
            <img src="img/konoha/Konoha22.png" width="130" height="130">
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <h6 class="">Name</h6>
            <p>Email</p>
            <p>Gender</p>
            <p>Status</p>
        </div>
        <div class="col-5">
            <h6 class="mb-2"><?php echo $_COOKIE['usa']?></h6>
            <p><?php echo $email?></p>
            <p><?php if($is_male) {
                    echo 'male';
                }else{echo 'female';}
                ?></p>
            <p><?php if($is_admin&&!$is_super_admin) {
                    echo '<b>Administrator<b>';
                }elseif ($is_super_admin){echo '<b>Super Administrator<b>';
                }else{echo 'User';}
                ?></p>
        </div>
        <div class="col-4 md-3">

        </div>
    </div>
</div>

<?php require 'blocks/footer.php' ?>

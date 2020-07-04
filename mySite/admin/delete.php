<?php if(!isset($_COOKIE['usa'])){
    header('Location: /mySite/blocks/404.php');
}else {
    require '../blocks/header.php';
    require '../config/connect_to_red.php';
    $sql = "delete  from articles where id='" . $_GET['id'] . "'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {
        echo 'OK';
        header('Location:admin.php');
    } else {
        echo '<div class="container alert alert-warning">' . "Error: " . $sql . "" . mysqli_error($conn) . '</div><hr>';
    }
    require '../blocks/footer.php';
}
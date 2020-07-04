<?php require 'blocks/header.php';
require 'config/connect_to_red.php';
$data_article=$_POST;
$id=$data_article['id'];
$sql ="SELECT title,content,image,author,date_time,views  FROM articles WHERE id='".$id."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$title=$row["title"] ;
$author=$row["author"];
$date_time=$row["date_time"];
$image=$row["image"];
$content=$row["content"];
$views=$row['views'];
mysqli_query($conn,"update articles set views = views+1 WHERE id='".$id."'");

?>
<!-- Title -->

<div class="col-lg-12 ">
    <div class="container text-center">
        <h1 class="mt-4 "><?php echo $title ?></h1>
        <hr>
        <div class="row text-center">
            <br/>
            <div class="col">
                <p class="lead font-weight-normal">
                    <i class="fas fa-eye " style="color: blue"></i> Total Views :  <?php echo $views ?>
                </p>
            </div>
            <!-- Author -->
            <div class="col">
                <p class="lead font-weight-normal">
                    <i class="fas fa-user fa-lg" style="color: blue"></i> by <i><?php echo $author ?></i>
                </p>
            </div>

            <div class="col">
                <!-- Date/Time -->
                <p><i class="fas fa-clock fa-lg" style="color: blue"></i>  <?php echo date('d.m.Y H:i',$date_time)?></p>
            </div
        </div>
    </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-8">
                <!-- Preview Image -->
                <img class=" rounded center" src="<?php echo $image?>" width="900"height="500">
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>

    <hr>

    <!-- Post Content -->
    <p class="lead"><?php echo $text = iconv("UTF-8", "UTF-8//IGNORE", $content); ?></p>
    <blockquote class="blockquote">
        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <footer class="blockquote-footer">Someone famous in
            <cite title="Source Title">Source Title</cite>
        </footer>
    </blockquote>





    <?php if (isset($_COOKIE['usa'])):

        ?>
        <div class="card my-4" style="width: 550px">
            <h5 class="card-header">Оставьте комментарий:</h5>
            <div class="card-body" >
                <form action="comment.php" method="post">
                    <div class="form-group">
                        <input class="form-control mb-2" type="text" name="name" value="<?php echo $_COOKIE['usa'];?>"readonly>
                        <input type="hidden" value="<?php echo $data_article['id'];?>" name="id_article">
                        <textarea class="form-control"placeholder="Введите ваш текст" rows="3" name="comment"></textarea>
                    </div>
                    <button type="submit" name="do_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    <?php else: ?>

        <div class="card my-4" style="width: 550px">
            <h5 class="card-header">Оставьте комментарий:</h5>
            <div class="card-body" >
                <form action="comment.php" method="post">
                    <div class="form-group">
                        <input class="form-control mb-2"placeholder="Имя" type="text" name="name"value="<?php echo 'Anonymous';?>"readonly>
                        <input type="hidden" value="<?php echo $data_article['id'];?>" name="id_article">
                        <textarea class="form-control"placeholder="Пожалуйста авторизуйтесь" rows="3" name="comment"></textarea>

                    </div>
                    <button type="submit" name="" class="btn btn-primary" disabled>Submit</button>
                </form>
            </div>
        </div>
    <?php endif; ?>



    <?php
    $get_comment_query ="SELECT name,comment  FROM comments WHERE article_id='".$data_article['id']."'limit 10";
    $get_com_result = mysqli_query($conn, $get_comment_query);

    while($com = mysqli_fetch_assoc($get_com_result)) {
        $name = $com['name'];

        $write = iconv("UTF-8", "UTF-8//IGNORE", $com['comment']);

        $get_gender="SELECT is_male FROM user WHERE login='".$name."'";
        $get_gen_result = mysqli_query($conn, $get_gender);
        while($gend = mysqli_fetch_assoc($get_gen_result)) {
            $is_male=$gend['is_male'];
            ?>
            <!-- Single Comment -->
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="img/<?php if($is_male) {
                    echo 'user.png';
                }else{echo 'wwuser.jpg';}
                ?>" alt="" width="50" height="50">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $name; ?></h5>
                    <p><?php echo $write; ?></p>
                </div>
            </div>
            <?php
        }
    }   require 'blocks/footer.php' ?>

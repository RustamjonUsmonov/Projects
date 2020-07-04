<?php
require 'blocks/header.php' ;
require 'config/connect_to_red.php';
$comment_data=$_POST;
if(isset($comment_data['do_comment'])){
    $commentator=$comment_data['name'];
    $comment= iconv("UTF-8", "UTF-8//IGNORE",  $comment_data['comment']);
    $comments_article_id=$comment_data['id_article'];

    $error=array();
    if (trim($commentator) == '') {
        $error[] = 'Введите Имя';
    } else if ($comment_data['comment'] =='') {
        $error[] = 'Введите ваше сообщение';
    }else if (strlen(trim($comment)) < 10) {
        $error[] = 'Сообщение должно быть больше 10 символов';
    }

    if (empty($error))
    {
        mysqli_set_charset($conn,"utf8");
        $com_query="insert into comments(name,comment,article_id) values('".$commentator."','".$comment."','".$comments_article_id."');";

        if (mysqli_query($conn, $com_query)) {
            ?>
            <div class="container  mt-5 text-center">
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <h3 class="mb-3 "style="text-align: center">Спасибо за Ваш комментарий</h3>
                        <form action="article.php" method="post" class="">
                            <input type="hidden" name="id" value="<?php echo $comments_article_id?>">
                            <input type="submit" name="OK" value="OK" class="btn btn-success" style="width: 200px">
                        </form>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            <?php

        } else {
            echo '<div class="container alert alert-warning">'."Error: " . $sql . "" . mysqli_error($conn).'</div><hr>';
        }
        $conn->close();

    }else
    {
        echo '<div class="container alert alert-danger">'.array_shift($error).'</div><hr>';
    }

    require 'blocks/footer.php';
}

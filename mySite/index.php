<?php require 'blocks/header.php' ?>
<?php require 'config/connect_to_red.php' ?>
<html>
<head>

</head>
<body>

<div class="container mt-5" >
    <h3 class="mb-5 ">Наши статьи</h3>

</div>
<div class="d-flex flex-wrap">
    <?php
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page= 1;
    }

    $notesOnPage=3;
    $from=($page-1)*$notesOnPage;
    mysqli_set_charset($conn,'utf8');
    $sql = "SELECT category,id,image,title,author,date_time,content FROM articles order by date_time desc LIMIT $from, $notesOnPage ";
    $result = mysqli_query($conn, $sql);

    $sql_cou = "SELECT count(*) as count FROM articles ";
    $result_cou = mysqli_query($conn, $sql_cou);
    $row_cou = mysqli_fetch_assoc($result_cou);
    $links_count=ceil($row_cou['count']/$notesOnPage);

    if ($page>$links_count )
    {
        header('Location: /mySite/blocks/404.php');
    }?>

    <?php
    while($row = mysqli_fetch_assoc($result)) {
        $title=$row["title"] ;
        $author=$row["author"];
        $date_time=$row["date_time"];
        $image=$row["image"];
        $id=$row["id"];
        $content=iconv("UTF-8", "UTF-8//IGNORE", $row["content"]);

        $category_id=$row["category"] ;
        $cat_query ="SELECT name  FROM categories WHERE id='".$category_id."'";
        $cat_result = mysqli_query($conn, $cat_query);
        while($cat = mysqli_fetch_assoc($cat_result)) {
            $category=$cat['name'];

            //for($i=0;$i<6;$i++): ?>

            <div class="card mb-4 shadow-sm text-center" style="width: 30%;">
                <div class="card-header">
                    <form action="article.php" method="post" class="">
                </div>
                <div class="card-body">
                    <img src="<?php echo $image?>" class="img-thumbnail">
                    <h1 class="card-title pricing-card-title font-weight-normal"><?php echo $category ?></small></h1>
                    <ul class="list-unstyled mt-3 mb-4" id="List">
                        <li><h5><?php echo $title?></h5></li>
                        <li><b>by <i><?php echo $author?></i></b></li>
                        <li> <?php echo date('d.m.Y H:i',$date_time)?></li><hr>
                        <li><?php echo iconv("UTF-8", "UTF-8//IGNORE", mb_substr($content,0,128,'UTF-8'))."...";?></li>

                    </ul>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" name="article_sub" class="btn btn-lg btn-block btn-outline-primary">Подробнее</button>
                    </form>
                </div>

            </div>

            <?php //endfor;
        }
    }
    ?>
</div>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class=" text-center ">
            <?php
            if($page==1){
                $prev=1;
            }else{
                $prev=$page-1;
                ?>
                <a id="myLink" class="bth btn-outline-primary "  href="?page=<?php echo $prev?>"><-</a>
                <?php
            }
              for ($i=1;$i<$links_count+1;$i++)
            {
                if($page==$i){?>
                    <a  class="bth btn-outline-primary active" style="font-size:large" href="?page=<?php echo $i?>"><?php echo $i?></a>
                    <?php
                }else{
                    ?>
                    <a  class="bth btn-outline-primary "  href="?page=<?php echo $i?>"><?php echo $i?></a>
                    <?php
                }
            }

            if($page<$links_count){
                $next=$page+1;
                ?>
                <a  class="bth btn-outline-primary "  href="?page=<?php echo $next?>">-></a>
                <?php
            }else{
                $next=$links_count;
            }
            ?>
        </div>
        <div class="col"></div>
    </div>
</div>
<?php require 'blocks/footer.php';
?>
</body>
</html>
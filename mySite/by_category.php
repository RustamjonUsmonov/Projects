<?php require 'blocks/header.php';
require 'config/connect_to_red.php';

?>

<div class="d-flex flex-wrap">
    <?php
    $cat_id=$_POST['id'];
    $sql ="SELECT category,id,image,title,author,date_time,content  FROM articles WHERE category='".$cat_id."' order by date_time desc";


    $sqll = "SELECT name,description FROM categories WHERE id='".$cat_id."' ";
    $resultt = mysqli_query($conn, $sqll);
    $roww = mysqli_fetch_assoc($resultt);

    $name=$roww["name"];

    $cont=iconv("UTF-8", "UTF-8//IGNORE", $roww["description"]);


    ?>
    <div class="container">
        <div class="row">
            <h2><?php echo $name ?></h2>
            <div class="alert-heading col-12 mb"style="color: #0056b3">
                <p class="mb-1" ><i><?php echo $cont ?></i></p>
                <div class="blockquote-footer mb-2">Someone famous in
                    <cite title="Source Title" >Source Title</cite><br/><hr>
                </div>
            </div>
        </div>
    </div>
    <?php
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $title=$row["title"] ;
        $author=$row["author"];
        $date_time=$row["date_time"];
        $image=$row["image"];
        $id=$row["id"];
        $content=iconv("UTF-8", "UTF-8//IGNORE", $row["content"]);


        $cat_query ="SELECT name  FROM categories WHERE id='".$cat_id."'";
        $cat_result = mysqli_query($conn, $cat_query);
        while($cat = mysqli_fetch_assoc($cat_result)) {
            $category = $cat['name'];



            ?>

            <div class="card mb-4 shadow-sm text-center" style="width: 30%;">
                <div class="card-header "  >
                    <form action="article.php" method="post" class="">

                </div>
                <div class="card-body">
                    <img src="<?php echo $image ?>" class="img-thumbnail">
                    <h1 class="card-title pricing-card-title font-weight-normal"><?php echo $category ?></small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li><h5><?php echo $title?></h5></li>
                        <li><b>by <i><?php echo $author ?></i></b></li>
                        <li><?php echo date('d.m.Y H:i', $date_time) ?></li>
                        <hr>
                        <li><?php echo mb_substr($content, 0, 128, 'UTF-8') . "..."; ?></li>

                    </ul>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" name="article_sub" class="btn btn-lg btn-block btn-outline-primary">Подробнее
                    </button>
                    </form>
                </div>
            </div>

            <?php //endfor;
        }
    }
    ?>
</div>

<?php require 'blocks/footer.php' ?>

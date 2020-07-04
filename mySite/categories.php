<?php require 'blocks/header.php';
require 'config/connect_to_red.php';
?>
<img src="img/cham/ChameleonPack34.png" height="150" width="150" >
<div class="d-flex flex-wrap">
    <?php
    mysqli_set_charset($conn,'UTF-8');
    $sql = 'SELECT id,images,name,description FROM categories';
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {

        $name=$row["name"];
        $content=iconv("UTF-8", "UTF-8//IGNORE", $row["description"]);
        $images=$row["images"];
        $id=$row["id"];


        ?>

        <div class="card mb-4 shadow-sm text-center" style="width: 30%;">
            <div class="card-header">
                <form action="by_category.php" method="post" class="">

            </div>
            <div class="card-body">
                <img src="<?php echo $images?>" class="img-thumbnail">
                <h1 class="card-title pricing-card-title font-weight-normal "><?php echo $name ?></small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li><b>by <i>Teacher's name</i></b></li>
                    <li></li><hr>
                    <li><?php echo mb_substr($content,0,128,'UTF-8')."...";?></li>

                </ul>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="cat_sub" class="btn btn-lg btn-block btn-outline-primary">Подробнее</button>
                </form>
            </div>
        </div>

        <?php //endfor;

    }?>
</div>


<?php require 'blocks/footer.php' ?>

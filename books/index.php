<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php
require 'config/db_connect.php';
$genres_arr=array();
$authors_arr=array();
if (isset($_POST['search']))
{
    $data=$_POST;
    //var_dump($_POST);
    $book=$data['bname'];
    foreach ($data as  $key=>$val){
        if (strpos($key, 'genre')!==false){
            $genres_arr[] = $val;
        }
        if (strpos($key, 'author')!==false){
            $authors_arr[] = $val;
        }
    }

} ?>

<div class="container mt-5">
    <form action="index.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="poisk"><h4>Наименование книги</h4></label>
                <input type="text" id="poisk" class="form-control" name="bname" placeholder="Введите название" value="<?php echo @$_POST['bname']; ?>">
            </div>

        </div>
        <div class="form-row" >

            <div class="form-group col-md-6" >
                <h5 id="genres">Жанры</h5>
            </div>
            <div class="form-group col-md-6" >
                <h5 id="author">Авторы</h5>
            </div>
        </div>
        <div class="form-row" >
            <div class="form-group col-md-6" id="genre">

                <script>
                    function f(detonator,target) {
                        var button = document.getElementById(detonator);
                        button.onclick = function() {
                            var div = document.getElementById(target);
                            if (div.style.display !== 'none') {
                                div.style.display = 'none';
                            }
                            else {
                                div.style.display = 'block';
                            }
                        };
                    }
                    f('genres','genre');
                    f('author','authors');
                </script>
                <?php
                $sql="select gname,genre_id from genres";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        //var_dump($row);
                        ?>
                        <div class="form-check mt-2">
                            <input class="form-check-input" id="<?php echo $row['gname']?>" type="checkbox" name="<?php echo 'genre'.$row['genre_id']?>" value="<?php echo $row['gname']?>" <?php
                            if (in_array($row['gname'], $genres_arr)) {
                                    echo "checked='checked'";
                                }
                            ?>>
                            <label class="form-check-label" for="<?php echo $row['gname']?>">
                                <?php
                                echo $row['gname'];
                                ?>
                            </label>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="form-group col-md-6" id="authors">
<!--                <p></p>
-->                <?php
                $authors_sql="select a_fullname, authors_id from authors";
                $aut_result = mysqli_query($conn, $authors_sql);

                if (mysqli_num_rows($aut_result) > 0) {
                    while($aut_row = mysqli_fetch_assoc($aut_result)) {
                        ?>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="<?php echo $aut_row['a_fullname']?>" name="<?php echo 'author'.$aut_row['authors_id']?>" value="<?php echo $aut_row['a_fullname'];?>" <?php
                            if (in_array($aut_row['a_fullname'], $authors_arr)) {
                                echo "checked='checked'";
                            }
                            ?>>
                            <label class="form-check-label" for="<?php echo $aut_row['a_fullname']?>">
                                <?php
                                echo $aut_row['a_fullname'];
                                ?>
                            </label>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="form-group col-md-6 ">

            <button type="submit" class="btn btn-primary mt-1" name="search">Поиск</button>

        </div>
    </form>
    <hr>


<div class="d-flex flex-wrap">
    <?php
    if(!isset($_POST['search'])){
        $books_query = "SELECT bname,image,description FROM books ";
    }elseif (isset($_POST['search'])&&$book!=''){
        $books_query = "select distinct bname,image,description from books where bname='".$book."'";
    }elseif(isset($_POST['search'])){
        $gen='';
        if(count($genres_arr)>0) {
            for ($i = 0; $i < count($genres_arr); $i++) {
                if ($genres_arr[$i] == $genres_arr[0]) {
                    $gen = $genres_arr[0];
                } else {
                    $gen .="'".' or genres.gname='."'". $genres_arr[$i];
                }
            }
        }
        $aut='';
        if(count($authors_arr)>0){
            for ($i=0;$i<count($authors_arr);$i++){
                if($authors_arr[$i]==$authors_arr[0])
                {
                    $aut=$authors_arr[0];
                }else{
                    $aut.="'".' or a_fullname='."'".$authors_arr[$i];
                }
            }
        }
        $books_query = "select distinct bname,image,description from books,genres,authors where ((genres.gname='".$gen."')and  (books.book_id=genres.book_id)) or ((a_fullname='".$aut."') and (authors.book_id=books.book_id));";
        // var_dump($books_query);
    }
    $books_res = mysqli_query($conn, $books_query);
    while($brow = mysqli_fetch_assoc($books_res)) {

        $bname=$brow["bname"];
        $image=$brow["image"];
        $descr=$brow['description'];
        ?>

        <div class="card mb-4 shadow-sm text-center" >
            <div class="card-header">
                <form action="" method="post" class="">
            </div>
            <div class="card-body">
                <img src="<?php echo $image?>" class="img-thumbnail">
                <h1 class="card-title pricing-card-title font-weight-normal"><?php echo $bname ?></small></h1>
                <ul class="list-unstyled mt-3 mb-4" id="List">
                    <!--<li><h5><?php /*echo $title*/?></h5></li>-->
                    <!--<li><b>by <i><?php /*echo $author*/?></i></b></li>-->
                    <li> <?php echo mb_substr($descr,0,256,'UTF-8')."..." ?></li><hr>
                </ul>
                <button type="submit" name="article_sub" class="btn btn-lg btn-block btn-outline-primary">Подробнее</button>
                </form>
            </div>

        </div>

        <?php
    }

    ?>
</div>

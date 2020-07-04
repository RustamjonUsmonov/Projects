<?php if(!isset($_COOKIE['usa'])){
    header('Location: /mySite/blocks/404.php');
}else{
    require '../blocks/header.php';
require '../config/connect_to_red.php';
if(isset($_POST['do_add'])){
    $error=array();
    if (strval(trim($_POST['Author']))==''){
        $error[]="Пожалуйста введите ИМЯ автора";
    }else if(strval(trim($_POST['Title']))=='' || strlen($_POST['Title'])<3){
        $error[]="Пожалуйста введите Название поста";
    }else if($_POST['img']==''){
        $error[]='Пожалуйста введите ссылку';
    }else if(strval(trim($_POST['text']))==''|| strlen($_POST['text'])<15){
        $error[]='Пожалуйста введите текст поста';
    }else if(strlen($_POST['new_cat'])==0 && $_POST['select']=='false'){
        $error[]='Пожалуйста выберете категорию из ниже приведённых  либо введите свою';
    }else if(strlen($_POST['new_cat'])!=0 && $_POST['select']=='false'&& strlen($_POST['img_cat'])==0){
        $error[]='Пожалуйста введите ссылку на обложку для новой категории';
    }else if(strlen($_POST['new_cat'])!=0 && $_POST['select']=='false'&& strlen($_POST['img_cat'])!=0){
        $sql = "insert into categories(name,images) values ('".$_POST['new_cat']."','".$_POST['img_cat']."');";
        if (mysqli_query($conn, $sql)) {
            echo '<div class="container alert alert-success">You Successfully added new Category</div><hr>';
            $sql="select id from categories where name='".$_POST['new_cat']."'";
            $id_cat_res=mysqli_query($conn,$sql);
            if (mysqli_query($conn, $sql)) {
                $id_parse=mysqli_fetch_assoc($id_cat_res);
                $id_cat=$id_parse['id'];
            } else {
                echo '<div class="container alert alert-warning">'."Error: " . $sql . "" . mysqli_error($conn).'</div><hr>';
            }
        } else {
            echo '<div class="container alert alert-warning">'."Error: " . $sql . "" . mysqli_error($conn).'</div><hr>';
        }
    }else if(strlen($_POST['new_cat'])==0 && $_POST['select']!='false'){
        //id_cat
        $sql="select id from categories where name='".$_POST['select']."'";
        $id_cat_res=mysqli_query($conn,$sql);
        if (mysqli_query($conn, $sql)) {
            $id_parse=mysqli_fetch_assoc($id_cat_res);
            $id_cat=$id_parse['id'];
        } else {
            echo '<div class="container alert alert-warning">'."Error: " . $sql . "" . mysqli_error($conn).'</div><hr>';
        }
    }

    if (empty($error))
    {
        $timestamp = time();
        $sqlm = "insert into articles(title,author,image,content,date_time,category)
                values ('".trim($_POST['Title'])."','".trim($_POST['Author'])."','".$_POST['img']."','".mysqli_real_escape_string($conn,trim($_POST['text']))."','".$timestamp."','".$id_cat."');";
        if (mysqli_query($conn, $sqlm)) {
            echo '<div class="container alert alert-success">You Successfully added new Article</div><hr>';
            echo '<div class="container alert alert-success text-center">
<a href="add.php" class="btn btn-outline-primary">Want to add more?</a>
<a href="../index.php" class="btn btn-outline-primary">To main page</a>
</div>';
        } else {
            echo '<div class="container alert alert-warning">'."Error: " . $sqlm . " " . mysqli_error($conn).'</div><hr>';
        }
        $conn->close();
    }else
    {
        echo '<div class="container alert alert-danger">'.array_shift($error).'</div>';
    }
}else{
    ?>
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <form method="post" action="add.php">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col text-center">
                            <img src="../img/add.jpg"width="100px" height="100px" style="border-radius: 50%;">
                        </div><div class="col"></div>
                    </div>
                    <h2 class="text-center mb-4">Add New Article</h2>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Author"><b>Author</b></label>
                            <input type="text" class="form-control" id="Author" placeholder="Author" name="Author"value="<?php echo @$_POST['Author']; ?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="Title"><b>Title of article</b></label>
                            <input type="text" class="form-control" id="Title" placeholder="Title" name="Title"value="<?php echo @$_POST['Title']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Image"><b>Image url</b></label>
                        <input type="text" class="form-control" id="Image" placeholder="http://..." name="img" value="<?php echo @$_POST['img']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Content"><b>Article content</b></label>
                        <textarea type="text" class="form-control" id="Content" placeholder="Main text" name="text" value="<?php echo @$_POST['text']; ?>"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="new"><b><i>New Category</i></b></label>
                            <input type="text" class="form-control" id="new" placeholder="new Category" name="new_cat">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Category"><b>Category</b></label>
                            <select id="Category" class="form-control" name="select">
                                <option selected value="false">Choose...</option>
                                <?php
                                $query ="SELECT name  FROM categories";
                                $result = mysqli_query($conn, $query);
                                while($res = mysqli_fetch_assoc($result)) {
                                    echo '<option value="'.$res['name'].'">'.$res['name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Image"><b>URL of image for new category </b></label>
                        <input type="text" class="form-control col-12" id="Image" placeholder="Only if you want to create new category" name="img_cat" value="<?php echo @$_POST['img_cat']; ?>">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="do_add">Add New Article</button>
                    </div>
                </form>
            </div>

            <div class="col"></div>
        </div>
    </div>

    <?php
}
require '../blocks/footer.php' ;
}

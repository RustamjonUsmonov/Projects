<?php mb_internal_encoding("UTF-8");
include($_SERVER['DOCUMENT_ROOT'] . '\config\connect_to_red.php');?>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/style.css">

<title><?php echo  'PHP Blog'  /*$config['title'];*/?></title>
<div class="navbar sticky-top d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">

    <h5 class="my-0 mr-md-auto  font-weight-normal" ><a style="text-decoration: none;" href="/mySite/index.php"><?php echo 'PHP Blog'/*echo $config['title'];*/?></a></h5>


    <?php
    $is_admin=false;
    if (isset($_COOKIE['usa'])):
        $qq ="SELECT is_admin FROM user WHERE login='".$_COOKIE['usa']."'";
        $qq_result = mysqli_query($conn, $qq);
        $row = mysqli_fetch_assoc($qq_result);
        $is_admin=$row['is_admin'];
        ?>

         <i class="fas fa-user fa-2x" style="color: green"></i>
    <?php else: ?>
    <?php endif;?>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/mySite/index.php">Главная</a>
        <a class="p-2 text-dark" href="/mySite/categories.php">Категории</a>
        <a class="p-2 text-dark" href="/mySite/about.php">Команда</a>
        <a class="p-2 text-dark" href="/mySite/support.php">Поддержка</a>
<?php
        if($is_admin){
        ?>
            <a class=" btn btn-outline-secondary" href="/mySite/admin/admin.php">Панель Администратора</a>
        <?php
    }
    ?>

    </nav>
    <?php


    if (isset($_COOKIE['usa'])): ?>
        <a class=" btn btn-outline-primary" href="/mySite/profile.php">Личный кабинет</a>
        <a type="button" class="mbtn btn btn-outline-primary" href="/mySite/logout.php">Выйти</a>

    <?php else: ?>
        <a class="btn btn-outline-primary" href="/mySite/authorize.php">Войти</a>
        <a class=" mbtn btn btn-outline-primary" href="/mySite/register.php">Регистрация</a>
    <?php endif; ?>
  <!--  <form class="form-inline ml-auto">
        <input type="text" class="form-control mr-sm-2" placeholder="Search">
        <button type="submit" class="btn btn-outline-light">Search</button>
    </form>-->
</div>

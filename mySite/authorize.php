
<?php require 'blocks/header.php';
require 'config/connect_to_red.php';
$login_data=$_POST;
if(isset($login_data['do_login']))
{
    $login=$login_data['login'];
    $password=$login_data['password'];
    $error=array();

    $query ="SELECT id  FROM user WHERE login='".$login."'";
    $result = mysqli_query($conn, $query);

    $password_query ="SELECT password FROM user WHERE login='".$login."'";
    $password_result = mysqli_query($conn, $password_query);
    $row = mysqli_fetch_assoc($password_result);

    $password_stored=$row['password'];



    if ($row['password']==null)
    {
        $error[]='Введите данные';
    }else if (trim($login_data['login'])=='')
    {
        $error[]='Введите ваше Имя';
    }else if($login_data['password']=='')
    {
        $error[]='Введите ваш пароль';
    }else if(mysqli_num_rows($result)==0)
    {
        $error[]='Пользователь с таким логином не сущестует';
    }else if(password_verify($password,$password_stored)==false)
    {
        $error[]='Пароль не правильно введён';
    }

    if (empty($error))
    {
        //$_SESSION['logged_user']=$login;
        setcookie('usa',$login,time() +36000,'/');
        echo '<div class="container alert alert-success">Вы успешно авторизованы. Можете перейти на главную страницу</div><hr>';
        header('Location: /mySite/index.php');
    }else
    {
        echo '<div class="container alert alert-danger">'.array_shift($error).'</div><hr>';
    }
}
?>
<div class="container text-center">
    <div class="row">
        <div class="col-3">
            <img src="img/konoha/Konoha26.png">
        </div>
        <div class="col-md-6 mt-5">
            <form  method="post" action="authorize.php">
                <img class=" mb-4 mx-auto d-block" src="https://i.pinimg.com/originals/d9/12/09/d91209340bdc005936c46323a62caaff.png"  width="72" height="72"><br/>
                <input type="text" name="login" class="form-control mb-3" placeholder="Login"  value="<?php echo @$data['email']; ?>">
                <input type="password" name="password" class="form-control mb-3" placeholder="Password" >

                <button class="btn btn-lg btn-primary btn-block" name="do_login" type="submit">Войти</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>
<?php require 'blocks/footer.php' ?>

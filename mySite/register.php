<?php require 'blocks/header.php' ?>
<?php  require 'config/connect_to_red.php';
$data=$_POST;
if(isset($data['do_signup']))
{
    $login=$data['login'];
    $email=$data['Email'];
    $password=password_hash($data['password'],PASSWORD_DEFAULT);
    $error=array();
    $selected_radio = $_POST['gender'];


    $query ="SELECT id  FROM user WHERE login='".$login."'";
    $result = mysqli_query($conn, $query);

    $email_query ="SELECT id FROM user WHERE email='".$email."'";
    $email_result = mysqli_query($conn, $email_query);


    if (trim($data['login'])=='')
    {
        $error[]='Введите ваше Имя';
    }else if(trim($data['Email'])=='')
    {
        $error[]='Введите email';
    }else if($data['password']=='')
    {
        $error[]='Введите ваш пароль';
    }else if($data['password_2']!=$data['password'])
    {
        $error[]='Повторный пароль введён не верно';
    }else if(mysqli_num_rows($result)>0)
    {
        $error[]='Пользователь с таким логином уже сущестует';
    }else if(mysqli_num_rows($email_result)>0)
    {
        $error[]='Пользователь с таким почтовым ящиком уже сущестует';
    }else if(!preg_match("((?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$)", $_POST['password']))//regex
    {
        $error[]='Minimum eight characters, at least one uppercase letter, one lowercase letter and one number';
    }else if ($selected_radio == 'male') {
        $is_male = true;
    }
    else if ($selected_radio == 'female') {
        $is_male = false;
    }else{
        $error[]='Укажите ваш пол';
    }


    if (empty($error))
    {

        $sql = "insert into user(login,email,password,is_male) values ('".$login."','".$email."','".$password."','".$is_male."');";
        if (mysqli_query($conn, $sql)) {
            echo '<div class="container alert alert-success">Вы успешно зарегистрированы</div><hr>';

        } else {
            echo '<div class="container alert alert-warning">'."Error: " . $sql . "" . mysqli_error($conn).'</div><hr>';
        }
        $conn->close();


    }else
    {
        echo '<div class="container alert alert-danger">'.array_shift($error).'</div><hr>';
    }
}
?>
<div class="container text-center">
    <div class="row">
        <div class="col">
            <img src="img/konoha/Konoha47.png" width="130" height="130">

        </div>
        <div class="col container mt-5 text-center ">
            <h3 class="mb-3 font-weight-normal ">Регистрация</h3>
            <form action="register.php" method="post" class="text-center">
                <input type="text" name="login" placeholder="Login" class="form-control mb-3" value="<?php echo @$data['login']; ?>">
                <input type="email" name="Email" placeholder="Email" class="form-control mb-3" value="<?php echo @$data['Email']; ?>">
                <div class="row ">
                    <div class="col">
                        <input type="radio"  name="gender" value="male" >
                        <label for="male">Male</label>
                    </div>
                    <div class="col">
                        <input type="radio"  name="gender" value="female">
                        <label for="female">Female</label><br>
                    </div>
                </div>
                <input type="password" name="password" placeholder="Password" class="form-control mb-3">
                <input type="password" name="password_2" placeholder="Confirm Your Password" class="form-control mb-3"><br/>

                <input type="submit" name="do_signup" value="Зарегистрироваться" class="btn btn-success">
            </form>
        </div>
        <div class="col">

        </div>
    </div>
</div>


<?php require 'blocks/footer.php' ?>

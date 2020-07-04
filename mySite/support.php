<?php require 'blocks/header.php' ?>
<?php require 'config/connect_to_red.php';
$data=$_POST;
if(isset($data['do_support'])) {
    $mail = $_POST['email'];
    $message = $_POST['message'];
    $error = array();
    if (trim($mail) == '') {
        $error[] = 'Введите email';
    } else if (trim($message) == '') {
        $error[] = 'Введите ваше сообщение';
    }
    if (!empty($error)) {
        echo '<div class="container alert alert-danger">' . array_shift($error) . '</div><hr>';
    } else {
        /*
$subject="=?utf-8?B?".base64_encode("ToSupport")."?=";//sends message to mail
$headers="From :$mail\r\nReply-to :$mail\r\nContent-type :text/html;charset=utf-8\r\n  ";
mail('admins@mail.com',$subject,$message,$headers);*/
        header('Location: /mySite/index.php');
    }
}
?>
<div class="container  mt-5">
    <div class="row">
        <div class="col-3">
            <img src="img/konoha/Konoha36.png">
        </div>
        <div class="col-6">
            <h3 class="mb-3 ">Контактная форма</h3>
            <form action="support.php" method="post">
                <input type="email" name="email" placeholder="Email" class="form-control mb-3" value="<?php echo @$data['email']; ?>">
                <textarea name="message" placeholder="Your text" class="form-control"></textarea><br/>
                <input type="submit" name="do_support" value="Отправить" class="btn btn-success">
            </form>
        </div>
        <div class="col-3 text-md-right">
            <img src="img/cham/ChameleonPack64.png" width="200" height="200">
        </div>
    </div>
</div>
<?php
require 'blocks/footer.php' ?>

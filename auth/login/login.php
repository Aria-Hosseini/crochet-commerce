<?php

require_once "../../functions/DB.php";
require_once "../../functions/users.php";

global $conn;
$error = "";

if(isset($_POST["submit"])){
  if(
    !empty($_POST['email']) &&
    !empty($_POST['password'])
  ){
     $user = checkuser($_POST['email']);
        if($user){
            if(password_verify($_POST['password'], $user['password'])){
                $_SESSION['user'] = $user['email'];
                header('Location: ../../index.php');
                exit;
            } else {
                $error = "اطلاعات وارد شده صحیح نیست";
            }
        } else {
            $error = "اطلاعات وارد شده صحیح نیست";
        }

  } else {
    $error = "همه فیلد ها را پر کنید";
  }
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/styles/login.css" />
    <title>ورود</title>
  </head>
  <body>
    <div class="box">
      <form action="login.php" method="POST">
        <span><?php if( $error !=="" ){ echo $error;}?></span>
        <div>
          <label>ایمیل</label>
          <input
            dir="rtl"
            name="email"
            type="text"
            placeholder="ایمیل خود را وارد کنید"
          />
          <label>رمز عبور</label>
          <input
            dir="rtl"
            name="password"
            type="password"
            placeholder="رمز عبور خود را وارد کنید"
          />
          <button name="submit" type="submit" class="submit">ورود</button>
        </div>
      </form>
      <span
        >حساب کاربری ندارید؟
        <a href="../register/register.php" class="register-btn">ثبت نام کنید</a></span
      >
      <a class="returnhome" href="../../index.php"
        ><span class="returnhome-btn">بازگشت به خانه < </span></a
      >
    </div>
  </body>
</html>

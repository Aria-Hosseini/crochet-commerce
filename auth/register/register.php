<?php

  require_once "../../functions/DB.php";

   global $conn;
   $error="";

    if(isset($_POST['submit'])){
        if(
            !empty($_POST['name']) &&
            !empty($_POST['email']) &&
            !empty($_POST['password'])
        ){
            $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO users SET name=?, email=?, password=?, created_at=NOW()";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$_POST['name'], $_POST['email'], $hashed_password]);

            header('Location: ../login/login.php');
            exit;
          
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
    <link rel="stylesheet" href="../../assets/styles/register.css" />
    <title>ثبت نام</title>
  </head>
  <body>
    <div class="box">
      <form action="register.php" method="POST">
        <span><?php if( $error !== "") {echo $error;}?></span>
        <div>
          <label for="">نام کاربری</label>
          <input
            dir="rtl"
            name="name"
            type="text"
            placeholder="نام کاربری خود را وارد کنید"
          />
          <label for="">ایمیل</label>
          <input
            dir="rtl"
            name="email"
            type="text"
            placeholder="ایمیل خود را وارد کنید"
          />
          <label for="">رمز عبور</label>
          <input
            dir="rtl"
            name="password"
            type="password"
            placeholder="یک رمز عبور برای خود تعریف کنید"
          />
          <button name="submit" type="submit" class="submit">ثبت نام</button>
        </div>
      </form>
      <span
        >حساب کاربری دارید؟ <a href="../login/login.php" class="register-btn">وارد شوید</a></span
      >
      <a class="returnhome" href="../../index.php"
        ><span class="returnhome-btn">بازگشت به خانه < </span></a
      >
    </div>
  </body>
</html>

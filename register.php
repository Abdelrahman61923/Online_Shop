<?php

    include 'config.php';
    
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));
        $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

        if ($pass === $cpass) {
            
            $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

            if(mysqli_num_rows($select) > 0){
                $userExist = true;
            }
            else{
                mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
                header('location: login.php');
            }
        } 
        else {
            $unCorrectPass = true;
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Register</title>
</head>
<body>
    <div class="login mt-5">
        <div class="container d-flex justify-content-center align-items-center">
            <form method="post" class="border">
                <h3 class="text-center mb-4">انشاء حساب جديد</h3>
                <div class="mb-3">
                    <input type="text" id="name" name="name" class="form-control text-center" required placeholder="اسم المستخدم">
                </div>
                <div class="mb-3">
                    <input type="email" id="email" name="email" class="form-control text-center" required placeholder="البريد الالكتونى">
                </div>
                <div class="mb-3">
                    <input type="password" id="pass" name="pass" class="form-control text-center" placeholder="كلمه المرور" required>
                </div>
                <div class="mb-3">
                    <input type="password" id="cpassword" name="cpassword" class="form-control text-center" placeholder="تأكيد كلمه المرور" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-50 d-block m-auto my-3">تسجيل الدخول</button>
            </form>
        </div>
    </div>

    <div class="modal" id="modal1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-danger bg-gradient">
                <div class="modal-header text-warning">
                    <button class="btn btn-close" data-bs-dismiss="modal"></button>
                    <h5 class="position-absolute mx-5 mt-2">المستخدم موجود بالفعل</h5>
                </div>
                <div class="modal-body text-warning">
                    <h4 class="text-center p-3">برجاء تغير كلمه المرور والمحاوله مره اخرى</h4>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark w-75 d-block m-auto" data-bs-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal2">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-danger bg-gradient">
                <div class="modal-header text-warning">
                    <button class="btn btn-close" data-bs-dismiss="modal"></button>
                    <h5 class="position-absolute mx-5 mt-2">كلمه المرور غير متطابقه</h5>
                </div>
                <div class="modal-body text-warning">
                    <h4 class="text-center p-3">برجاء ادخال كلمتى المرور متطابقتين</h4>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark w-75 d-block m-auto" data-bs-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>

    <?php
        if(isset($userExist)){
            echo "
                <script>
                    var x = document.getElementById('modal1');
                    new bootstrap.Modal(x).show();
                </script>
            ";
        }

        if(isset($unCorrectPass)){
            echo "
                <script>
                    var y = document.getElementById('modal2');
                    new bootstrap.Modal(y).show();
                </script>
            ";
        }
    ?>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>
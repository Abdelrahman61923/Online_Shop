<?php

    session_start();
    if(isset($_POST["submit"])){

        $expectedUsername = 'admin';
        $expectedPassword = 'admin';

        $username = $_POST["username"];
        $pass = $_POST["pass"];

        if ($username == $expectedUsername && $pass == $expectedPassword) {
            header('location: index.php');
            exit() ;
        } else {
            $messageUncorrect = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>NetMarket</title>
</head>
<body>
    <div class="login">
        <h2>NetMarket</h2>
        <div class="container d-flex justify-content-center align-items-center">
            <form action="" method="post" class="border">
                <h3 class="text-center m-4">تسجيل الدخول</h3>
                <div class="mb-3">
                    <input type="username" id="username" name="username" class="form-control text-center" required placeholder="Enter Username">
                </div>
                <div class="mb-3">
                    <input type="password" id="pass" name="pass" class="form-control text-center" placeholder="Enter Password" required>
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
                    <h5 class="position-absolute mx-5 mt-2">Try Again</h5>
                </div>
                <div class="modal-body text-warning">
                    <h4 class="text-center p-3">Username or Password is Uncorrect</h4>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark w-75 d-block m-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/all.min.js"></script>

    <?php
        if(isset($messageUncorrect)){
            echo "
                <script>
                    var x = document.getElementById('modal1');
                    new bootstrap.Modal(x).show();
                </script>
            ";
        }
    ?>
</body>
</html>
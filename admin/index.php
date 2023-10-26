<?php

    include 'config.php';
    session_start();
    $user_id = "admin";

    if(!isset($user_id)){
        header('location: login.php');
    };

    if(isset($_GET['logout'])){
        unset($user_id);
        session_destroy();
        header('location: login.php');
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/add_prodect.css">
    <title>Online Shop</title>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="links">
                <a href="#">NetMarket</a>
                <a href="prodects.php">عرض جميع المنتجات</a>
                <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟');" class="delete-btn btn btn-danger">تسجيل الخروج</a>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="container">
            <div class="row my-4">
            <div class="col-12">
                    <form action="insert.php" method="POST" class="border m-auto text-center bg-light" enctype="multipart/form-data">
                        <h2 class="text-center">موقع تسويقى اونلاين</h2>
                        <img src="online-shopping.png" alt="لوجو الموقع" class="algin-item-center">
                        <div class="form-group p-2 my-1">
                            <input type="text" name="name" id="name" class="form-control text-center mt-2" placeholder="Prodect Name" required>
                        </div>
                        <div class="form-group p-2 my-1">
                            <input type="text" name="price" id="price" class="form-control text-center mt-2" placeholder="Price" required>
                        </div>
                        <input type="file" name="image" id="file" class="text-center mt-2" style="display:none;" required>
                        <label for="file" class="btn btn-success " >اختيار صوره للمنتج</label>
                        <button name="upload" class="btn btn-success w-25">رفع المنتج</button>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</body>
</html>
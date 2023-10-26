<?php 
    include 'config.php';

    $result = mysqli_query($con,"SELECT * FROM prodect");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>prodects</title>
    <style>
        .link {
            text-decoration: none;
            font-weight: bold;
            font-size: 20px;
        }
        .container {
            width: 60%;
        }
        .card {
            float: right;
            margin: 20px 0px 10px 10px;
        }
        .card img {
            width: 100$;
            height: 200px;
        }
    </style>
</head>
<body>
<div class="team text-center pt-5 pb-5">
    <div class="container">
        <h3> جميع المنتجات المتوفره للادمن</h3>
        <div>
            <a href="index.php" class="link">تسجيل منتج جديد</a>
        </div>
        <?php while ($row = mysqli_fetch_array($result)):  ?>
        <div class="card" style="width: 15rem;">
            <img src="<?php echo $row['image'] ?>" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['name'] ?></h5>
                <p class="card-text"><?php echo $row['price'] ?></p>
                <a href="delete.php? id=<?php echo $row['id'] ?>" class="btn btn-danger">حذف منتج</a>
                <a href="update.php? id=<?php echo $row['id'] ?>" class="btn btn-primary">تعديل منتج</a>
            </div>
        </div> 
        <?php endwhile; ?>
        </div>
    </div>
</body>
</html>


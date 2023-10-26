<?php 
    include 'config.php';

    if (isset($_POST['update'])) {
        $ID = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $IMAGE = $_FILES['image'];
        $image_location = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_up = "images/".$image_name;

        $update = "UPDATE prodect SET name='$name', price='$price', image='$image_up' WHERE id=$ID";
        mysqli_query($con, $update);

        if (move_uploaded_file($image_location, 'images/'.$image_name)) {
            echo "<script>alert('تم تحديث المنتج بنجاح')</script>";
        } else {
            echo "<script>alert('حدث مشكله لم يتم رفع المنتج')</script>";
        }
        header("location: prodects.php");
    }

?>
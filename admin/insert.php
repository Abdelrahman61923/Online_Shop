<?php 
    include 'config.php';

    if (isset($_POST['upload'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $IMAGE = $_FILES['image'];
        $image_location = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_up = "images/".$image_name;

        $insert = "INSERT INTO prodect (name, price, image) VALUES ('$name', '$price', '$image_up')";
        mysqli_query($con, $insert);

        if (move_uploaded_file($image_location, 'images/'.$image_name)) {
            echo "<script>alert('تم رفع المنتج بنجاح')</script>";
        } else {
            echo "<script>alert('حدث مشكله لم يتم رفع المنتج')</script>";
        }
        header("location: index.php");
    }

?>
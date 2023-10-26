<?php 
    include 'config.php';

    $ID = $_GET['id'];
    $up =  mysqli_query($con, "SELECT * FROM prodect WHERE id=$ID");
    $date = mysqli_fetch_array($up);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Update</title>
    <style>
        .link {
            text-decoration: none;
            font-weight: bold;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row my-4">
        <div class="col-12">
                <form action="up.php" method="POST" class="border rounded p-4 w-50 m-auto text-center" enctype="multipart/form-data">
                    <h2 class="text-center">تعديل المنتج</h2>
                    <div class="form-group p-2 my-1">
                        <input type="text" name="id" id="id" class="form-control text-center mt-2" required value="<?php echo $date['id'] ?>">
                    </div>
                    <div class="form-group p-2 my-1">
                        <input type="text" name="name" id="name" class="form-control text-center mt-2" required value="<?php echo $date['name'] ?>">
                    </div>
                    <div class="form-group p-2 my-1">
                        <input type="text" name="price" id="price" class="form-control text-center mt-2" required value="<?php echo $date['price'] ?>">
                    </div>
                    <input type="file" name="image" id="file" class="text-center mt-2" style="display:none;" required>
                    <label for="file" class="btn btn-success mb-3" >تحديث صوره المنتج</label>

                    <button name="update" type="submit" class="btn btn-success w-25 mb-3">تعديل المنتج</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
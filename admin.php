<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        form {
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
</head>

<?php
include "database.php";
include "uploadImage.php";
$kq = ketnoi("SELECT id, name, img, price, quantity, hot, sale FROM shoes");
if (isset($_GET['edit'])) $index = $_GET['edit'];
if (isset($_GET['del'])) {
    $delId = $_GET['del'];
    deleteDB($delId);
    header("Location: admin.php");
}
if (isset($_POST["editProduct"]) && ($_POST["editProduct"])) {
    $id = $_POST['id'];
    $image = $_POST['image'];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $hot = $_POST["hot"];
    ///////
    updateDB("UPDATE shoes SET name='$name', img='$image', price='$price' WHERE id='$id'");
    // $sql = "INSERT INTO dienthoai (id,tensanpham,gia,imageurl) VALUES ('$id','$name','$price','$img')";
    // $conn->exec($sql);  
    header("Location: admin.php");
}

if (isset($_POST["addProduct"]) && ($_POST["addProduct"])) {
    $id = $_POST['id'];
    //$image = $_POST['img'];
    $image = uploadImage();
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = 1;
    $hot = $_POST["hot"];
    $sale = $_POST["sale"];
    ketnoi("INSERT INTO shoes (id,name,price,img,quantity,hot,sale) VALUES ('$id','$name','$price','$image','$quantity','$hot','$sale')");
    header("Location: admin.php");
}
?>

<body>
    <form action="" method="post" class="m-4" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <label class="form-label">Nhập ID sản phẩm</label>
                <input class="form-control" type="text" name="id" value="<?php if (isset($index)) echo $kq[$index]['id'] ?>">
                <label class="form-label">Tên sản phẩm</label>
                <input class="form-control" type="text" name="name" value="<?php if (isset($index)) echo $kq[$index]['name'] ?>">
                <label class="form-label">Số lượng mua</label>
                <input class="form-control" type="text" name="quantity" disabled value="1">
                <label class="form-label">Đánh giá sản phẩm hot</label>
                <input class="form-control" type="text" name="hot" value="<?php if (isset($index)) echo $kq[$index]['hot'] ?>">
                <br>
                <input type="submit" class="btn btn-primary" name="addProduct" value="Thêm sản phẩm">
                <input type="submit" class="btn btn-warning" name="editProduct" value="Cập nhật sản phẩm">
            </div>
            <div class="col-6">
                <label class="form-label">Nhập URL hình ảnh</label>
                <input disabled class="form-control" type="text" name="image" value="<?php if (isset($index)) echo $kq[$index]['img'] ?>">
                <label for="form-label">Tải hình ảnh sản phẩm</label>
                <input type="file" name="fileToUpLoad" class="form-control">
                <label class="form-label">Giá sản phẩm</label>
                <input class="form-control" type="text" name="price" value="<?php if (isset($index)) echo $kq[$index]['price'] ?>">
                <label class="form-label">Số lượng đã bán</label>
                <input class="form-control" type="text" name="sale" value="<?php if (isset($index)) echo $kq[$index]['sale'] ?>">
            </div>
        </div>

    </form>
    <div class="card m-4 shadow">
        <div class="card-header">Quản lý sản phẩm</div>
        <div class="card-body">
            <table class="table table-sm">
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Poster</th>
                    <th>Price</th>
                    <th>Hot</th>
                    <th>Sold</th>
                    <th>Change</th>
                </tr>
                <?php
                $stt = 1;
                foreach ($kq as $index => $item) {
                    echo "   
                               <tr>
                                   <td>$stt</td>
                                   <td>" . $item["id"] . "</td>
                                   <td>" . $item["name"] . "</td>
                                   <td> <img src='" . $item["img"] . "' style='width:100px; height:110px;'> </td>
                                   <td>" . $item["price"] . "</td>
                                   <td>" . $item["hot"] . "</td>
                                   <td>" . $item["sale"] . "</td>
                                   <td><a href='admin.php?edit=" . $index . "'>Sửa</a> / 
                                       <a href='admin.php?del=" . $item["id"] . "'>Xóa</a></td>
                                </tr>
                                   ";
                    $stt++;
                }
                ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
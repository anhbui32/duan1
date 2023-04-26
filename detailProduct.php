<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Định dạng phần tử chứa hình ảnh */
        div:first-of-type {
            margin-bottom: 20px;
        }

        /* Định dạng hình ảnh */
        img {
            display: block;
            margin: 0 auto;
            border: 2px solid #ddd;
            transition: all 0.3s ease;
        }

        /* Hiệu ứng hover cho hình ảnh */
        img:hover {
            transform: scale(1.1);
            box-shadow: 5px 5px 5px #ddd;
        }

        /* Định dạng phần tử chứa thông tin sản phẩm */
        div:last-of-type {
            padding: 20px;
            background-color: #f2f2f2;
            box-shadow: 5px 5px 5px #ddd;
        }

        /* Định dạng phần tử p */
        p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        /* Định dạng phần tử span */
        span {
            font-weight: bold;
        }

        /* Định dạng nút Đặt hàng */
        input[type="submit"] {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Hiệu ứng hover cho nút Đặt hàng */
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }

        @keyframes move {
            from {
                transform: translateX(30px);
            }

            to {
                transform: translateX(10px);
            }
        }

        /*Apply Aninmation*/
        a.reback {
            animation: move 0.6s infinite alternate;
            position: fixed;
            width: 150px;
            top: 20px;
            right: 20px;
            font-family: Roboto;
            text-align: center;
            background-color: transparent;
            color: blue;
            transition-duration: 0.3s;
        }

        a:hover {
            background-color: blue;
            color: white;
        }

        a:active {
            background-color: red;
            color: white;
        }

        .empty {
            animation: slide 7s linear infinite;
            overflow: hidden;
            white-space: nowrap;
            color: red;
            margin: 300px;
        }

        @keyframes slide {
            from {
                transform: translateX(-130%);
            }

            to {
                transform: translateX(130%);
            }
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include('connectDB.php');
    $products = connectDB();
    //Hiển thị chi tiết sản phẩm.
    /*     $products = array(
        array('quantity' => 1, 'id' => '0', 'name' => 'BELLA TOES', 'price' => '675.00', 'img' => './images/s1.jpg'),
        array('quantity' => 1, 'id' => '1', 'name' => 'CHIKKU LOAFERS', 'price' => '800.00', 'img' => 'images/s2.jpg'),
        array('quantity' => 1, 'id' => '2', 'name' => '(SRV) SNEAKERS', 'price' => '655.00', 'img' => 'images/s3.jpg'),
        array('quantity' => 1, 'id' => '3', 'name' => 'SHUPPERRY', 'price' => '982.00', 'img' => 'images/s4.jpg'),
        array('quantity' => 1, 'id' => '4', 'name' => 'RED BAELUF', 'price' => '730.00', 'img' => 'images/s5.jpg'),
        array('quantity' => 1, 'id' => '5', 'name' => 'HUGGUER HARIC', 'price' => '625.00', 'img' => 'images/s6.jpg'),
        array('quantity' => 1, 'id' => '6', 'name' => 'BANACAT COLE', 'price' => '382.00', 'img' => 'images/s7.jpg'),
        array('quantity' => 1, 'id' => '7', 'name' => 'OLCRAC CALAVEL', 'price' => '530.00', 'img' => 'images/s8.jpg'),
        array('quantity' => 1, 'id' => '8', 'name' => 'TUNNY FACHAR', 'price' => '625.00', 'img' => 'images/s9.jpg')
    ); */
    $index;
    foreach ($products as $key => $product) {
        if ($product['id'] == $_GET['c']) {
            $index = $key;
        }
    }
    echo '
            <h1>Chi tiết sản phẩm</h1>
            <form action="" method="post">
                <div>
                    <img src="' . $products[$index]['img'] . '" width="400px" height="auto" >
                </div>
                <div>
                    <p>Tên sản phẩm: <span>' . $products[$index]['name'] . '</span></p>
                    <p>Giá: <span>' . $products[$index]['price'] . ' </span></p>
                    <input type="hidden" name="index" value="' . $key . '">
                    <input type="hidden" name="id" value="' . $product['id'] . '">
                    <input type="submit" name="add" value="Đặt hàng">
                </div>
            </form>
        ';

    if (isset($_POST['add'])) {
        $check = true;
        $id = $_POST['id'];
        $index = $_POST['index'];
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $id) {
                    $_SESSION['cart'][$key]['quantity'] += 1;
                    $check = false;
                }
            }
        }
        if ($check == true) {
            $_SESSION['cart'][] = $products[$index];
        }
    }

    ?>
    <a class="reback" href="shop.php">Quay trở lại trang sản phẩm</a>
</body>

</html>
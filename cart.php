<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th {
            background-color: #112e56;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        td a {
            color: #666;
            text-decoration: none;
            font-size: 14px;
        }

        td a:hover {
            color: #000;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td[colspan="4"] {
            text-align: right;
            font-weight: bold;
            padding: 10px;
        }

        td[colspan="2"] {
            font-size: 18px;
        }

        a.button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 12px 16px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin-top: 20px;
            border-radius: 4px;
        }

        a.button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <th>Name</th>
            <th>Poster</th>
            <th>Price</th>
            <th>Total</th>
            <th>Delete</th>
        </tr>


        <?php if (isset($_SESSION['cart'])) foreach ($_SESSION['cart'] as $index => $item) { ?>
            <tr>
                <td><?php echo $item['name'] ?></td>
                <td><img src="<?php echo $item['img'] ?>" width="50px"></td>
                <td><?php echo $item['price'] ?></td>
                <td>
                    <a href="cart.php?increase=<?= $index ?>"> - </a>
                    <?php echo $item['quantity'] ?>
                    <a href="cart.php?decrease=<?= $index ?>"> + </a>
                </td>
                <td>
                    <a href="cart.php?del=<?= $index ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>


        <tr>
            <td colspan="4">Tổng tiền</td>
            <td colspan="2">
                <?php
                $tongtien = 0;
                foreach ($_SESSION['cart'] as $item) {
                    $tongtien += $item['price'] * $item['quantity'];
                }
                echo $tongtien;
                ?>
            </td>
        </tr>
    </table>

    <?php
    if (isset($_GET['del'])) {
        if ($_GET['del'] == 'all') {
            unset($_SESSION['cart']);
            header("Location: demo.php");
        } else {
            $index = $_GET['del'];
            unset($_SESSION['cart'][$index]);
            header("Location: cart.php");
        }
    }
    if (isset($_GET['increase'])) {
        $index = $_GET['increase'];
        if ($_SESSION['cart'][$index]['quantity'] > 1) {
            $_SESSION['cart'][$index]['quantity'] -= 1;
        }
        header("Location: cart.php");
    }
    if (isset($_GET['decrease'])) {
        $index = $_GET['decrease'];
        $_SESSION['cart'][$index]['quantity'] += 1;
        header("Location: cart.php");
    }
    ?>

    <a style="display: block; margin: 30px 700px;" href="shop.php">Home</a>
</body>

</html>
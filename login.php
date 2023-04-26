<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #2e3740;
            color: #b7c3cf;
            font-family: sans-serif;
            overflow: hidden;
        }

        form {
            margin: 50px auto;
            width: 900px;
            background: #2e3740;
            padding: 25px;
        }

        input[type="text"],
        input[type="password"] {
            display: block;
            margin-bottom: 20px;
            border: none;
            padding: 10px;
            box-sizing: border-box;
            width: 100%;
            font-size: 13.5px;
            border-radius: 5px;
            background-color: #6d7781;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .condition {
            color: red;
            font-size: x-small;
            margin-top: 5px;
            font-family: Roboto;
            letter-spacing: 0.5px;
        }

        .notification {
            position: relative;
            z-index: 1;
            font-family: Roboto;
            font-size: larger;
            color: red;
            height: 40px;
            width: 400px;
            background-color: #6d7781;
            left: 540px;
            text-align: center;
            padding-top: 18px;
            border-radius: 8px;
        }

        .waybackhome {
            position: relative;
            top: -400px;
            right: -1250px;

        }

        .waybackhome a {
            text-decoration: none;
            color: #b7c3cf;
            margin-right: 4px;
            margin-left: 4px;
        }
    </style>
    <?php
    /* setcookie('user', $_POST['username'], time() + 1800, "/");
    setcookie('password', $_POST['password'], time() + 1800, "/"); */
    ?>
</head>

<body>

    <?php

    $username = $password = $conName = $conPass = $notification = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        if (empty($_POST['username'])) {
            $conName = "*Bắt buộc";
        } else {
            $username = $_POST['username'];
        }

        if (empty($_POST['password'])) {
            $conPass = '*Bắt buộc';
        } else {
            $password = $_POST['password'];
        }

        if ($username == 'admin' && $password == '123') {
            $notification = 'Thành công';
            setcookie('user', $_POST['username'], time() + 1800, "/");
            setcookie('password', $_POST['password'], time() + 1800, "/");
            header('location: shop.php');
        } else {
            $notification = 'Sai trường, nhập lại!';
        }
    }

    ?>

    <form method="post" action="">
        <h2>Login Form</h2>

        <label>Username:</label>
        <div class="condition"><?php echo $conName; ?></div>
        <input type="text" name="username" value="<?php echo $username; ?>">

        <label>Password:</label>
        <div class="condition"><?php echo $conPass; ?></div>
        <input type="password" name="password" value="<?php echo $password; ?>">

        <input id="submit" type="submit" name="submit" value="Login">
    </form>
    <div class="waybackhome">
        <a href="shop.php">Home</a>
        <span>|</span>
        <a href="sigup.php">Đăng ký</a>
    </div>
    <div class="notification"><?php echo $notification; ?></div>


</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form đăng ký</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background: #2E3740;
            color: #435160;
            font-family: "Open Sans", sans-serif;
        }

        h2 {
            color: #6D7781;
            font-family: "Sofia", cursive;
            font-size: 15px;
            font-weight: bold;
            font-size: 3.6em;
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            color: #435160;
            text-decoration: none;
        }

        .login {
            width: 350px;
            position: absolute;
            top: 10%;
            left: 50%;
            margin-left: -175px;
        }

        input[type="text"],
        input[type="password"] {
            width: 350px;
            padding: 20px 0px;
            background: transparent;
            border: 0;
            border-bottom: 1px solid #435160;
            outline: none;
            color: #6D7781;
            font-size: 16px;
        }

        input[type=checkbox] {
            display: none;
        }

        label {
            display: block;
            position: absolute;
            margin-right: 10px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: transparent;
            content: "";
            transition: all 0.3s ease-in-out;
            cursor: pointer;
            border: 3px solid #435160;
        }

        #agree:checked~label[for=agree] {
            background: #435160;
        }

        input[type="submit"] {
            background: #1FCE6D;
            border: 0;
            width: 350px;
            height: 40px;
            border-radius: 3px;
            color: #fff;
            font-size: 12px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background: #16aa56;
            animation-name: shake;
        }

        .forgot {
            margin-top: 30px;
            display: block;
            font-size: 11px;
            text-align: center;
            font-weight: bold;
        }

        .forgot:hover {
            margin-top: 30px;
            display: block;
            font-size: 11px;
            text-align: center;
            font-weight: bold;
            color: #6D7781;
        }

        .agree {
            padding: 30px 0px;
            font-size: 12px;
            text-indent: 25px;
            line-height: 15px;
        }

        ::-webkit-input-placeholder {
            color: #435160;
            font-size: 12px;
        }

        .animated {
            animation-fill-mode: both;
            animation-duration: 1s;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-10px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(10px);
            }
        }
    </style>
</head>
<?php
if (isset($_POST['submit']) && $_POST['username'] && $_POST['password'] && $_POST['email']) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dienthoaishopdb4";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO dbsignup (username,password,gmail)
            VALUES ('$_POST[username]', '$_POST[password]', '$_POST[email]')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: white'>Đăng ký tài khoản thành công</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

<body>
    <form method="post">
        <div class='login'>
            <h2>Sign up</h2>
            <input name='username' placeholder='Username' type='text'>
            <input id='pw' name='password' placeholder='Password' type='password'>
            <input name='email' placeholder='E-Mail Address' type='text'>
            <div class='agree'>
                <input id='agree' name='agree' type='checkbox'>
                <label for='agree'></label>Accept rules and conditions
            </div>
            <input class='animated' type='submit' name='submit' value='Register'>
            <a class='forgot' href='login.php'>Already have an account?</a>
        </div>
    </form>
</body>

</html>
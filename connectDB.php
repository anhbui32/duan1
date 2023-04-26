<?php
function connectDB()
{
    //Kết nối database
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=dienthoaishopdb4", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //   echo "Connected successfully";
        $stmt = $conn->prepare("SELECT quantity,hot ,id, sale, name,price, img FROM shoes");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $produc = $stmt->fetchAll();
        return $produc;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

<?php
function ketnoi($sql)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=localhost;dbname=dienthoaishopdb4", $username, $password);
    //echo "Connected successfully";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $kq = $stmt->fetchAll();
    return $kq;
}
function updateDB($sql)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=dienthoaishopdb4", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
function deleteDB($id)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=dienthoaishopdb4", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // sql to delete a record
        $sql = "DELETE FROM shoes WHERE id='$id'";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Record deleted successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
    // header('location: admin.php');
}


/* function insertSignUp()
{
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
            VALUES ()";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} */

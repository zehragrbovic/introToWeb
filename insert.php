<?php

require_once("rest/dao/StudentsDao.class.php");
$students_dao = new StudentsDao();
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$result = $students_dao->add($first_name, $last_name);
print_r($result);

/*
$servername = "localhost";
$username = "root";
$password = "root";
$schema = "introtoweb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected sucessfully";

    print_r($_REQUEST);
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $stmt = $conn->prepare("INSERT INTO students (first_name, last_name) VALUES ('$first_name', '$last_name')");
    $result = $stmt->execute();
    print_r($result);
    

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
*/
?>
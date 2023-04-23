<?php

require_once("rest/dao/StudentsDao.class.php");
$students_dao = new StudentsDao();

$result = $students_dao->get_all();
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

    $stmt = $conn->prepare("SELECT * FROM students");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($result);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
*/
?>
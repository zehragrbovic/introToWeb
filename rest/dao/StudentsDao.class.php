<?php 

class StudentsDao {

    private $conn;

    /*
    * Class constructor used to establosh connection with database.
    */

    public function __construct() {

        try {
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $schema = "introtoweb";
            $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //    echo "Connected sucessfully";
        
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    /*
    * Method used to get all students from database.
    */
    public function get_all() {
        $stmt = $this->conn->prepare("SELECT * FROM students");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
    * Method used to get student by id from database.
    */
    public function get_by_id($id) {
        $stmt = $this->conn->prepare("SELECT * FROM students WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /*
    * Method used to add students to database.
    */
    public function add($student) {
        $stmt = $this->conn->prepare("INSERT INTO students (first_name, last_name) VALUES (:first_name, :last_name)");
        $stmt->execute($student);
        $student['id'] = $this->conn->lastInsertId();
        return $student;
    }

    /*
    * Method used to update students from database.
    */
    public function update($student, $id) {
        $student['id'] = $id;
        $stmt = $this->conn->prepare("UPDATE students SET first_name = :first_name, last_name=:last_name WHERE id=:id");
        $stmt->execute($student);
        return $student;
    }

    /*
    * Method used to delete students from database.
    */
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM students WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}

?>
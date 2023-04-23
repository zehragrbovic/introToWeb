<?php 

require_once("rest/dao/StudentsDao.class.php");
$students_dao = new StudentsDao();

$type = $_REQUEST['type'];

switch($type) {
    case 'add':
        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $result = $students_dao->add($first_name, $last_name);
        print_r($result);
        break;
    case 'delete':
        $id = $_REQUEST['id'];
        $students_dao->delete($id);
        break;
    case 'update':
        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $id = $_REQUEST['id'];
        $students_dao->update($first_name, $last_name, $id);
        break;
    case 'get':  
    default:
        $result = $students_dao->get_all();
        print_r($result); 
        break;
}

?>
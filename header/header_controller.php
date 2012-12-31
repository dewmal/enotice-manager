<?php session_start();
/**
 * Created by JetBrains PhpStorm.
 * User: dewmal
 * Date: 12/30/12
 * Time: 10:04 AM
 * To change this template use File | Settings | File Templates.
 */


error_reporting(E_ALL & ~E_DEPRECATED);

require_once "./controller/DB.php";
require_once "./controller/Employee.php";


$emplopyee = NULL;


if (array_key_exists('user', $_SESSION)) {

    $employee = new Employee($_SESSION['user']);
    $type = $employee->type;

    switch ($type) {
        case 'EM':
            include "./header/header_em.php";
            break;
        case 'MA':
            include "./header/header_ma.php";
            break;
        case 'AD':
            include "./header/header.php";
            break;
    }


} else {


    header("Location:./index.php");
}



?>
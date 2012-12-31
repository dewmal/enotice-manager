<?php

session_start();
include_once "DB.php";
include_once "Employee.php";

/**
 * Created by JetBrains PhpStorm.
 * User: dewmal
 * Date: 12/27/12
 * Time: 10:32 AM
 * To change this template use File | Settings | File Templates.
 */

if (function_exists($_GET['f'])) {
    $_GET['f']();
} else {
    echo 'Function not Found';
}
/**
 *
 */


function add_notice()
{
    try {


        $status = insert_notice($_POST['topic'], $_POST['content'], $_POST['catid'], $_POST['expiredate'], $_SESSION['user']);


    } catch (Exception $e) {
        echo $e;
    }

    if ($status) {
        header("Location:../notices.php");
    }


}

function register()
{
    try {
        $status = insert_employee($_POST['name'], $_POST['email'], $_POST['dob'], $_POST['password'], $_POST['depid']);
    } catch (Exception $e) {
        echo $e;
    }

    if ($status) {
        header("Location:../index.php");
    }
}


function register2()
{

    try {
        $status = insert_employee($_POST['name'], $_POST['email'], $_POST['dob'], $_POST['password'], $_POST['depid']);
    } catch (Exception $e) {
        echo $e;
    }

    if ($status) {
        header("Location:../users.php");
    }


}
function login()
{

    $get_con = get_connection();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['login_type'];


    $result = mysql_query("SELECT * FROM Employee WHERE email='$username' AND password='$password'", $get_con);

    $row = mysql_fetch_row($result);


    if ($row[2] == $username) {
        $_SESSION['user'] = $row[0];

        //printf("%s", $type);

        switch ($type) {
            case "1":
                header("Location:../index_em.php");
                break;
            case "2":
                header("Location:../index_ma.php");
                break;
            case "3":
                header("Location:../index_ad.php");
                break;


        }


    } else {
        header("Location:../index.php?msg=Invallid Username or Password");
    }


}

function add_catagorey()
{

    try {
        insert_catagorey($_POST['name']);
        header("Location:../notices.php");
    } catch (Exception $e) {
        echo $e;
    }


}

function approve_notice_view()
{
    $id = $_POST['note_id'];

    $notice = new Notices($id);

    approve_notice($notice, $_SESSION['user']);
    return "dewmal $id";
}


function add_department()
{
    try {
        insert_department($_POST['name'], $_POST['supid']);
        header("Location:../users.php");
    } catch (Exception $e) {
        echo $e;
    }
}


function update_settings()
{
    $employee = new Employee($_SESSION['user']);
    if (array_key_exists('name', $_POST)) {
        $employee->name = $_POST['name'];
    }
    if (array_key_exists('email', $_POST)) {
        $employee->email = $_POST['email'];
    }
    if (array_key_exists('depid', $_POST)) {
        $employee->department = $_POST['depid'];
    }
    if (array_key_exists('dob', $_POST)) {
        $employee->dob = $_POST['dob'];
    }
    if (array_key_exists('password', $_POST)) {
        $pasword=$_POST['password'];
        if(empty($pasword)){
            $pasword=$employee->password;
        }
        $employee->password = $pasword;
    }

    update_user($employee);


    //header("Location:../settings.php");



}



function edit_user()
{
    $employee = new Employee($_POST['empid']);
    if (array_key_exists('name', $_POST)) {
        $employee->name = $_POST['name'];
    }
    if (array_key_exists('email', $_POST)) {
        $employee->email = $_POST['email'];
    }
    if (array_key_exists('depid', $_POST)) {
        $employee->department = $_POST['depid'];
    }
    if (array_key_exists('dob', $_POST)) {
        $employee->dob = $_POST['dob'];
    }
    if (array_key_exists('password', $_POST)) {
        $pasword=$_POST['password'];
        if(empty($pasword)){
            $pasword=$employee->password;
        }
        $employee->password = $pasword;
    }

    update_user($employee);


    header("Location:../users.php");



}


?>

<?php
require_once "Department.php";
require_once "Notices.php";
error_reporting(E_ALL & ~E_DEPRECATED);
/**
 * Created by JetBrains PhpStorm.
 * User: dewmal
 * Date: 12/27/12
 * Time: 10:30 AM
 * To change this template use File | Settings | File Templates.
 */
function insert_notice($topic, $content, $catid, $expiredate, $userid)
{
    $sql_connection = get_connection();


    $emp_row = mysql_query("SELECT COUNT(*) FROM Notice", $sql_connection);

    $row = mysql_fetch_row($emp_row);

    foreach ($row as $r) {
        $id = $r;
    }
    $id += 1;

    //echo $id;


    $sql = "INSERT INTO Notice
    (note_id, topic, content, posteddate, expiredate, catagorey_cat_id, empid, supid)
    VALUES ('$id', '$topic', '$content', NOW(), '$expiredate', '$catid', '$userid', NULL)";


    // echo $sql;

    mysql_query($sql, $sql_connection);

    mysql_close($sql_connection);


    return true;


}


function insert_employee($NAME, $email, $dob, $password, $dep_id)
{
    $sql_connection = get_connection();


    $emp_row = mysql_query("SELECT COUNT(*) FROM Employee", $sql_connection);

    $row = mysql_fetch_row($emp_row);

    foreach ($row as $r) {
        $id = $r;
    }
    $id += 1;

    $dep_row = mysql_query("SELECT * FROM Department WHERE dep_id= $dep_id", $sql_connection);

    $row2 = mysql_fetch_row($dep_row);
    $supervisour = $row2[2];

    if (isset($supervisour) || empty($supervisour)) {
        $supervisour = "NULL";

    }


    // Probably should check to make sure the connection was successful
    // But I'm too lazy...
    $insert_query = "INSERT INTO Employee
(empid,NAME,email,dob,joindate,password,supervisour,dep_id,TYPE)
VALUES
(
'$id','$NAME','$email','$dob',curdate(),'$password',$supervisour,$dep_id,'EM')";

    echo $insert_query;

    mysql_query($insert_query, $sql_connection);


    mysql_close($sql_connection);


    return true;
}

function get_departments()
{

    $sql_connection = get_connection();

    $departemnts = mysql_query("SELECT * FROM Department", $sql_connection);


    $departments = array();

    $i = 0;
    while ($row = mysql_fetch_row($departemnts)) {


        $departments[$i] = $row;


        $i++;
    }

    mysql_close($sql_connection);
    return $departments;

}

function get_notices()
{
    $sql_connection = get_connection();

    $notices = mysql_query("SELECT * FROM Notice ORDER BY supid ", $sql_connection);


    $notices_ar = array();

    $i = 0;
    while ($row = mysql_fetch_row($notices)) {

        $not_ob = new Notices(NULL);
        $not_ob->id = $row[0];
        $not_ob->topic = $row[1];
        $not_ob->content = $row[2];
        $not_ob->posteddate = $row[3];
        $not_ob->expiredate = $row[4];
        $not_ob->cat_id = $row[5];
        $not_ob->empid = $row[6];
        $not_ob->supid = $row[7];

        $notices_ar[$i] = $not_ob;


        $i++;
    }

    mysql_close($sql_connection);
    return $notices_ar;
}


function get_catagorey()
{

    $sql_connection = get_connection();

    $catagorey = mysql_query("SELECT * FROM catagorey", $sql_connection);


    $catagoreys = array();

    $i = 0;
    while ($row = mysql_fetch_row($catagorey)) {


        $catagoreys[$i] = $row;


        $i++;
    }

    mysql_close($sql_connection);
    return $catagoreys;

}


function get_employees()
{
    $sql_connection = get_connection();

    $emp_res = mysql_query("SELECT * FROM Employee", $sql_connection);


    $employees = array();

    $i = 0;
    while ($row = mysql_fetch_row($emp_res)) {


        $employees[$i] = $row;


        $i++;
    }

    mysql_close($sql_connection);


    return $employees;
}


function get_dep_name($id)
{


    $sql_connection = get_connection();


    $res_id = mysql_query("SELECT * FROM Department WHERE dep_id=$id", $sql_connection);

    $row = mysql_fetch_row($res_id);
    mysql_close($sql_connection);

    return $row[1];

}

function approve_notice(Notices $notice, $user)
{
    $sql_connection = get_connection();
    $sql = "UPDATE Notice SET supid = '$user',posteddate=now() WHERE note_id = '$notice->id'";


    mysql_query($sql);

    mysql_close($sql_connection);
}

function get_cat_name($id)
{


    $sql_connection = get_connection();


    $res_id = mysql_query("SELECT * FROM catagorey WHERE cat_id=$id", $sql_connection);

    $row = mysql_fetch_row($res_id);
    mysql_close($sql_connection);

    return $row[1];

}


function insert_department($NAME, $sup_id)
{


    $id = count(get_departments());
    $id++;


    $sql_connection = get_connection();

    $insert_query = "INSERT INTO Department (dep_id,NAME,supid) VALUES ($id,'$NAME','$sup_id')";
    mysql_query($insert_query, $sql_connection);

    $insert_query = "UPDATE Employee
SET
TYPE = 'MA',dep_id=$id
WHERE empid=$sup_id";
    mysql_query($insert_query, $sql_connection);


    mysql_close($sql_connection);

}


function insert_catagorey($NAME)


{


    $id = count(get_catagorey());

    $id++;


    $insert_query = "INSERT INTO catagorey (cat_id,NAME) VALUES ($id,'$NAME')";


    $sql_connection = get_connection();
    mysql_query($insert_query, $sql_connection);


    mysql_close($sql_connection);


}


function get_active_notices()
{
    $sql_connection = get_connection();

    $notices = mysql_query("SELECT * FROM Notice WHERE supid IS NOT NULL ORDER BY posteddate DESC", $sql_connection);


    $notices_ar = array();

    $i = 0;
    while ($row = mysql_fetch_row($notices)) {

        $not_ob = new Notices(NULL);
        $not_ob->id = $row[0];
        $not_ob->topic = $row[1];
        $not_ob->content = $row[2];
        $not_ob->posteddate = $row[3];
        $not_ob->expiredate = $row[4];
        $not_ob->cat_id = $row[5];
        $not_ob->empid = $row[6];
        $not_ob->supid = $row[7];

        $notices_ar[$i] = $not_ob;


        $i++;
    }

    mysql_close($sql_connection);
    return $notices_ar;
}


function update_user(Employee $employee)
{


    $dep = new Department($employee->department);




    $insert_sql = "UPDATE Employee
SET
NAME = '$employee->name',
email = '$employee->email',
dob = '$employee->dob',
password = '$employee->password',
supervisour = '$dep->sup_id',
dep_id = $employee->department,
TYPE = '$employee->type'
WHERE
empid ='$employee->empid'";

   // echo $insert_sql;

    $sql_connection = get_connection();


    mysql_query($insert_sql, $sql_connection);

    mysql_close($sql_connection);
}

/**
 * @return resource
 */
function get_connection()
{
// Connect to our DB with mysql_connect(<server>, <username>, <password>)
    $sql_connection = mysql_connect("localhost", "root", "");


    //$sql_connection = mysql_connect('localhost', 'sasanala_enotice', 'test91');

    mysql_select_db("sasanala_enotice", $sql_connection);
    return $sql_connection;
}


?>
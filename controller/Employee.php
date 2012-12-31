<?php

include_once "DB.php";

class Employee
{

    var $empid = "";
    var $name = "";
    var $email = "";
    var $password = "";
    var $dob = "";
    var $joindate = "";
    var $sup_id = "";
    var $department = 0;
    var $type = "EM";


    function __construct($empid)
    {
        $sql_connnection = get_connection();
        $result = mysql_query("SELECT * FROM Employee WHERE empid=$empid",$sql_connnection);

        $row = mysql_fetch_row($result);
        $this->empid = $row[0];
        $this->name = $row[1];
        $this->email = $row[2];
        $this->dob = $row[3];
        $this->joindate = $row[4];
        $this->password = $row[5];
        $this->sup_id = $row[6];
        $this->department = $row[7];
        $this->type = $row[8];

        mysql_close($sql_connnection);

    }





}



?>

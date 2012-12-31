<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dewmal
 * Date: 12/27/12
 * Time: 11:34 AM
 * To change this template use File | Settings | File Templates.
 */

include_once "DB.php";

class Department
{
    var $id;
    var $name;
    var $sup_id;

    function  __construct($id)
    {
        $sql_connection = get_connection();
        $res_id = mysql_query("SELECT * FROM Department WHERE dep_id=$id", $sql_connection);

        $row = mysql_fetch_row($res_id);


        $this->id = $id;
        $this->name = $row[1];
        $this->sup_id = $row[2];


        mysql_close($sql_connection);
    }
}

?>

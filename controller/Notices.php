<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dewmal
 * Date: 12/28/12
 * Time: 8:00 AM
 * To change this template use File | Settings | File Templates.
 */
include_once "DB.php";

class Notices
{


    var $id;
    var $topic;
    var $content;
    var $posteddate;
    var $expiredate;
    var $cat_id;
    var $empid;
    var $supid;

    function __construct($id)
    {


        if (isset($id)) {
            $sql_connnection = get_connection();
            $result = mysql_query("SELECT * FROM Notice WHERE note_id=$id", $sql_connnection);

            $note_row = mysql_fetch_row($result);

            $this->id = $note_row[0];
            $this->topic = $note_row[1];
            $this->content = $note_row[2];
            $this->posteddate = $note_row[3];
            $this->expiredate = $note_row[4];
            $this->cat_id = $note_row[5];
            $this->empid = $note_row[6];
            $this->supid = $note_row[7];
            mysql_close($sql_connnection);
        }



    }


}

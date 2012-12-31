<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dewmal
 * Date: 12/27/12
 * Time: 10:56 AM
 * To change this template use File | Settings | File Templates.
 */

require_once "./controller/DB.php";


$departments = get_notices();


foreach ($departments as $de) {

    $notice=$de;
    printf("%s", $notice->id);
}


?>
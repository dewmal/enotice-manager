<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dewmal
 * Date: 12/26/12
 * Time: 8:15 PM
 * To change this template use File | Settings | File Templates.
 */

require_once "./controller/DB.php";
require_once "./controller/Employee.php";



?>

<!DOCTYPE html>
<html>

<!-- Mirrored from wbpreview.com/previews/WB0G25H3J/messages.php by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 26 Dec 2012 14:15:01 GMT -->
<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="description" content="description of your site">
    <meta name="author" content="author of the site">
    <title>Industry Notification Manager</title>
    <link rel="stylesheet" href="static/css/bootstrap.css">
    <link rel="stylesheet" href="static/css/bootstrap-responsive.css">
    <link rel="stylesheet"
          href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic">
    <link rel="stylesheet" href="static/css/styles.css">
    <link rel="stylesheet" href="static/css/toastr.css">
    <link rel="stylesheet" href="static/css/fullcalendar.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="static/js/bootstrap.js"></script>
    <script src="static/js/jquery.knob.js"></script>
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="static/js/jquery.sparkline.min.js"></script>
    <script src="static/js/toastr.js"></script>
    <script src="static/js/jquery.tablesorter.min.js"></script>
    <script src="static/js/jquery.peity.min.js"></script>
    <script src="static/js/fullcalendar.min.js"></script>
    <script src="static/js/gcal.js"></script>
    <script src="static/js/setup.js"></script>
</head>
<body>
<div id="in-nav">
    <div class="container">
        <div class="row">
            <div class="span12">
                <ul class="pull-right">
                    <li><a href="logout.php">Logout</a></li>
                </ul>
                <a id="logo" href="index-2.php">
                    <h4>System <strong>Admin</strong></h4></a>
            </div>
        </div>
    </div>
</div>
<div id="in-sub-nav">
    <div class="container">
        <div class="row">
            <div class="span12">
                <ul>
                    <li><a href="index_ad.php"><i class="batch home"></i><br>Dashboard</a></li>
                    <li><span class="label label-important pull-right">08</span><a href="stream.php"><i
                                class="batch stream"></i><br>Notices Live</a></li>
                    <li><a href="notices.php"><i class="batch users"></i><br>Notices</a></li>
                    <li><a href="users.php"><i class="batch users"></i><br>Employees</a></li>
                    <li><a href="settings.php"><i class="batch settings"></i><br>Settings</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

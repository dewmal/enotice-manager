<?php
require_once "./controller/DB.php";

?>

<!DOCTYPE html>
<html>

<!-- Mirrored from wbpreview.com/previews/WB0G25H3J/login.php by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 26 Dec 2012 14:15:00 GMT -->
<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="description" content="description of your site">
    <meta name="author" content="author of the site">
    <title>IndustryApp Template</title>
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
                    <li><a href="register.php">register</a></li>
                    <li><a href="index.php">Login</a></li>
                </ul>
                <a id="logo" href="index_ad.php" style="color: red">
                    <h4>My<strong>Coparation</strong></h4></a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="span6 offset2">
            <div class="login">
                <!-- form -->
                <form class="form-horizontal" action="./controller/Controller.php?f=register" method="post">

                    <div class="control-group">
                        <label class="control-label" for="inputName">Name</label>

                        <div class="controls">
                            <input type="text" placeholder="Enter name" name="name">
                            <span class="help-inline">Max 15 letters</span>
                        </div>
                    </div>

                    <div class="control-group ">
                        <label class="control-label" for="inputEmail">Email</label>

                        <div class="controls">
                            <input type="text" placeholder="Enter email" name="email">
                        </div>
                    </div>

                    <div class="control-group ">
                        <label class="control-label" for="inputPassword">Password</label>

                        <div class="controls">
                            <input type="password" name="password">
                            <span class="help-inline">Max 15 letters</span>
                        </div>
                    </div>

                    <div class="control-group ">
                        <label class="control-label" for="inputDepartment">Department</label>

                        <div class="controls">
                            <select name="depid">
                                <option value="-1" selected="true">[choose Department]</option>
                                <?php

                                $departments = get_departments();

                                foreach ($departments as $row) {
                                    echo "<option value='$row[0]'>$row[1]</option>";
                                }




                                ?>


                            </select>

                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label" for="inputDOB">Date of Birth</label>

                        <div class="controls">
                            <input type="text" placeholder="Enter DOB" name="dob">
                            <span class="help-inline">dd/mm/yy</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button class="btn btn-primary" type="submit ">
                                Add
                            </button>
                            <button class="btn btn-primary" type="reset">
                                Cancel
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script>protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
    address = protocol + window.location.host + window.location.pathname + '/ws';
    socket = new WebSocket(address);
    socket.onmessage = function (msg) {
        msg.data == 'reload' && window.location.reload()
    }</script>

<!-- Mirrored from wbpreview.com/previews/WB0G25H3J/login.html by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 26 Dec 2012 14:15:00 GMT -->
</html>
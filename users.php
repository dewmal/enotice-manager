<?php
include_once "header/header_controller.php";


?>
    <div class="page">
    <div class="page-container">
    <div class="container">
        <div class="row">
            <div class="span12"><a href="#newUserModal" data-toggle="modal" class="btn pull-right">New User</a>

                <a href="#newDepartModal" data-toggle="modal" class="btn pull-right">New Department</a>
                <h4 class="header">Users</h4>
                <table class="table table-striped sortable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Date Joined</th>
                        <th>DOB</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    $employees = get_employees();

                    foreach ($employees as $emp_row) {
                        ?>
                        <tr>
                            <td><?php echo $emp_row[1] ?></td>
                            <td><?php echo $emp_row[2] ?></td>
                            <td><?php
                                $emp_dep = get_dep_name($emp_row[7]);
                                echo $emp_dep ?></td>
                            <td><?php echo $emp_row[8] ?></td>
                            <td><?php echo $emp_row[4] ?></td>
                            <td><?php echo $emp_row[3] ?></td>


                            <td>
                                <div class="btn-group">

                                        <?php  echo "<a class='btn' href='./edit_user.php?edit_user=$emp_row[0]' > Edit</a>" ?>


                                    <button data-toggle="dropdown" class="btn dropdown-toggle"><span
                                            class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><?php echo "<a href='#editUserModal$emp_row[0]' data-toggle='modal'> Edit</a>" ?>

                                            <a href="#">Disable Account</a></li>
                                    </ul>
                                </div>
                            </td>


                        </tr>

                    <?php } ?>


                    </tbody>
                </table>
                <div class="pagination pagination-centered">
                    <ul>
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>

                    </ul>
                </div>


            </div>
        </div>
    </div>


    <div id="newDepartModal" class="modal hide fade">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
            <h3>New Department</h3>
        </div>


        <div class="modal-body"><!-- form -->
            <form class="form-horizontal" action="./controller/Controller.php?f=add_department" method="post">

                <div class="control-group ">
                    <label class="control-label" for="inputTopic">Name</label>

                    <div class="controls">
                        <input type="text" placeholder="Enter Catagoery Name" name="name">
                        <span class="help-inline">Max 15 letters</span>
                    </div>
                </div>

                <div class="control-group ">
                    <label class="control-label" for="inputDepartment">Department</label>

                    <div class="controls">
                        <select name="supid">
                            <option value="-1" selected="true">[choose Supervisour]</option>
                            <?php

                            $employess = get_employees();

                            foreach ($employess as $row) {
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }

                            ?>


                        </select>

                    </div>
                </div>


                <div class="control-group">
                    <div class="controls">
                        <button class="btn btn-primary" type="submit ">
                            Add
                        </button>
                        <button class="btn btn-primary" type="reset" data-dismiss="modal" aria-hidden="true"
                                class="close">
                            Cancel
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div id="newUserModal" class="modal hide fade">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
            <h3>New Employee</h3>
        </div>
        <div class="modal-body">
            <!-- form -->
            <form class="form-horizontal" action="./controller/Controller.php?f=register2" method="post">

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


                        <button class="btn btn-primary" type="submit">
                            Add
                        </button>
                        <button class="btn btn-primary">
                            Cancel
                        </button>
                    </div>

                </div>

            </form>
        </div>
        <div class="modal-footer"><a href="#" data-dismiss="modal" class="btn">Close</a><a href="#"
                                                                                           data-dismiss="modal"
                                                                                           class="btn btn-primary">Save
                Changes</a></div>
    </div>
    </div>
    </div>

<?php
include_once "./header/footer.php"
?>
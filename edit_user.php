<?php
include_once "header/header_controller.php";
$employee = new Employee($_SESSION['user']);

if(array_key_exists('edit_user',$_GET)){
    $employee=new Employee($_GET['edit_user']);
    echo $_GET['edit_user'];
}
?>
    <div class="page">
        <div class="page-container">
            <div class="container">
                <div class="row">
                    <div class="span12 header">
                        <h4>Settings</h4>
                    </div>
                    <div class="span6">


                        <form class="form-horizontal" action="./controller/Controller.php?f=edit_user"
                              method="post">

                            <div class="control-group">
                                <label class="control-label" for="inputName">Name</label>

                                <div class="controls">
                                    <?php
                                    echo "<input type='text' placeholder='Enter name' name='name' value=$employee->name>"
                                    ?>


                                    <span class="help-inline">Max 15 letters</span>
                                </div>
                            </div>

                            <div class="control-group ">
                                <label class="control-label" for="inputEmail">Email</label>

                                <div class="controls">
                                    <?php
                                    echo "<input type='text' placeholder='Enter email' name='email' value=$employee->email>"
                                    ?>
                                </div>
                            </div>

                            <div class="control-group ">
                                <label class="control-label" for="inputPassword">Password</label>

                                <div class="controls">
                                    <?php
                                    echo "<input type='password' placeholder='Enter email' name='password' value=$employee->password>"
                                    ?>
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

                                        $dep = $employee->department;

                                        foreach ($departments as $row) {
                                            if ($row[0] == $dep) {
                                                echo "<option value='$row[0]' selected='true'>$row[1]</option>";
                                            } else {
                                                echo "<option value='$row[0]'>$row[1]</option>";
                                            }

                                        }

                                        ?>


                                    </select>

                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label" for="inputDOB">Date of Birth</label>

                                <div class="controls">
                                    <?php
                                    echo "<input type='text' placeholder='Enter DOB' name='dob' value=$employee->dob>"
                                    ?>
                                    <span class="help-inline">dd/mm/yy</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <?php
                                    echo "<input type='hidden' name='empid' value=$employee->empid>"
                                    ?>

                                    <button class="btn btn-primary" type="submit ">
                                        Change
                                    </button>
                                    <button class="btn btn-primary" type="reset">
                                        Cancel
                                    </button>
                                </div>

                            </div>

                        </form>


                    </div>
                    <div class="span6">
                        <p>If you want to change your email or password please remember to do these three things.</p>
                        <ul>
                            <li>The first thing you should do is this</li>
                            <li>The second thing is probably this</li>
                            <li>There isn't actually a third thing</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php
include_once "./header/footer.php"
?>
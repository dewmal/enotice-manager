<?php
include_once "header/header_controller.php";

?>
    <div class="page">
        <div class="page-container">
            <div class="container">
                <div class="row">
                    <div class="span12 header">
                        <h4>Settings</h4>
                    </div>
                    <div class="span6">
                        <form class="form-horizontal" action="./controller/Controller.php?f=update_settings"
                              method="post">
                            <div class="control-group">
                                <label for="inputEmail" class="control-label">Email </label>

                                <div class="controls">
                                    <?php
                                    echo "<input type='text' placeholder='Enter Email' name='email' value=$employee->email>"
                                    ?>

                                </div>
                            </div>
                            <div class="control-group">
                                <label for="inputCurrentPassword" class="control-label">Current Password </label>

                                <div class="controls">
                                    <input id="inputCurrentPassword" type="password" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="inputPassword" class="control-label">Password </label>

                                <div class="controls">
                                    <input id="inputPassword" type="password" placeholder="Password"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="inputPasswordAgain" class="control-label">Password Again</label>

                                <div class="controls">
                                    <input id="inputPasswordAgain" type="password" name="password"
                                           placeholder="Password Again"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn">Save Changes</button>
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
                    <div class="span12 settings-group">
                        <h4 class="header">Profile</h4>
                    </div>
                    <div class="span6">
                        <form class="form-horizontal" action="./controller/Controller.php?f=update_settings"
                              method="post">
                            <div class="control-group">
                                <label for="username" class="control-label">Name </label>

                                <div class="controls">
                                    <?php
                                    echo "<input type='text' placeholder='Enter name' name='name' value=$employee->name>"
                                    ?>
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
                                    <button type="submit" class="btn">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="span6">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque suscipit lobortis
                            eros, quis convallis diam laoreet sit amet. Duis dapibus lacinia ornare. Class aptent
                            taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php
include_once "./header/footer.php"
?>
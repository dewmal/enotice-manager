<?php
include_once "header/header_controller.php";
require_once "controller/Notices.php";
require_once "controller/Employee.php";
?>
    <div class="page">
    <div class="page-container">
    <div class="container">
        <div class="row">
            <div class="span12"><a href="#newUserModal" data-toggle="modal" class="btn pull-right">New
                    Notice</a>

                <a href="#newCatagoryModal" data-toggle="modal" class="btn pull-right">

                    New Catagorey</a>
                <h4 class="header">Notices</h4>
                <table class="table table-striped sortable">
                    <thead>
                    <tr>
                        <th>Topic</th>
                        <th>Posted date</th>
                        <th>Expire date</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Catagorey</th>
                    </tr>
                    </thead>
                    <tbody>


                    <?php

                    $notices = get_notices();
                    $emp_row = new Notices(NULL);

                    foreach ($notices as $emp_row) {
                        ?>

                        <tr>
                            <td><?php echo $emp_row->topic ?></td>
                            <td><?php echo $emp_row->posteddate ?></td>
                            <td><?php echo $emp_row->expiredate ?></td>
                            <td>
                                <?php

                                $emp = new Employee($emp_row->empid);
                                $department = new Department($emp->department);


                                echo $department->name;



                                ?>
                            </td>
                            <td>
                                <?php

                                if (isset($emp_row->supid)) {
                                    echo "<span class='label label-success'>Active</span>";
                                } else {
                                    echo "<span class='label label-important'>Inactivate</span>";
                                }


                                ?>
                            </td>
                            <td><?php
                                echo get_cat_name($emp_row->cat_id);

                                ?></td>

                            <td>
                                <div class="btn-group">
                                    <?php
                                    echo " <button class='btn' onclick='approve($emp_row->id)'>Approve</button>";

                                    ?><

                                    <button data-toggle="dropdown" class="btn dropdown-toggle"><span
                                            class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Edit </a><a href="#">Disable </a><a href="#">Destroy</a>
                                        </li>
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
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div id="newCatagoryModal" class="modal hide fade">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
            <h3>New Catagorey</h3>
        </div>


        <div class="modal-body"><!-- form -->
            <form class="form-horizontal" action="./controller/Controller.php?f=add_catagorey" method="post">

                <div class="control-group ">
                    <label class="control-label" for="inputTopic">Name</label>

                    <div class="controls">
                        <input type="text" placeholder="Enter Catagoery Name" name="name">
                        <span class="help-inline">Max 15 letters</span>
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
            <h3>New Notice</h3>
        </div>


        <div class="modal-body"><!-- form -->
            <form class="form-horizontal" action="./controller/Controller.php?f=add_notice" method="post">

                <div class="control-group ">
                    <label class="control-label" for="inputTopic">Topic</label>

                    <div class="controls">
                        <input type="text" placeholder="Enter Topic" name="topic">
                        <span class="help-inline">Max 15 letters</span>
                    </div>
                </div>

                <div class="control-group ">
                    <label class="control-label" for="inputContent">Content</label>

                    <div class="controls">
                        <textarea name="content" rows="5" cols="20"></textarea>
                        <span class="help-inline">Max 20 letters</span>
                    </div>
                </div>

                <div class="control-group ">
                    <label class="control-label" for="inputCatergory">Catergory</label>

                    <div class="controls">

                        <select name="catid">
                            <option value="-1" selected="true">[choose Catergory]</option>
                            <?php

                            $catagorey = get_catagorey();

                            foreach ($catagorey as $row) {
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }
                            ?>

                        </select>


                    </div>
                </div>

                <div class="control-group ">
                    <label class="control-label" for="inputExpireDate">Expire Date</label>

                    <div class="controls">
                        <input type="text" name="expiredate" placeholder="MM/DD/YYYY">
                        <span class="help-inline">MM/DD/YYYY - Expire Date</span>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button class="btn btn-primary" type="submit ">
                            Add
                        </button>
                        <button class="btn btn-primary" data-dismiss="modal" type="reset">
                            Cancel
                        </button>
                    </div>

                </div>


            </form>
        </div>

    </div>
    </div>
    </div>

    <script type="text/javascript">
        function approve(value) {
            console.log(value);

            $.post("./controller/Controller.php?f=approve_notice_view", { note_id: value },
                function (data) {
                    window.location.reload(true);

                });
        }
        (function () {


        });


    </script>

<?php
include_once "./header/footer.php"
?>
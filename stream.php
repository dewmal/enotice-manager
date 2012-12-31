<?php
include_once "header/header_controller.php";
?>
    <div class="page">
        <div class="page-container">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <h4 class="header">Filters</h4>

                        <div class="filters"><span class="pull-right">4</span>
                            <input type="checkbox" id="cb3" checked="checked"/>
                            <label for="cb3">Engenireeing</label><span class="pull-right">7</span>
                            <input type="checkbox" id="cb4" checked="checked"/>
                            <label for="cb4">Computer</label>
                            <input type="checkbox" id="cb3" checked="checked"/>
                            <label for="cb3">H R M </label><span class="pull-right">7</span>
                            <input type="checkbox" id="cb4" checked="checked"/>
                            <label for="cb4">Administrator</label>

                        </div>
                    </div>
                    <div class="span9">
                        <div class="btn-group pull-right">
                            <button class="btn"><i class="icon-refresh"></i></button>
                            <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Turn Live Update On</a></li>
                                <li><a href="#">Turn Live Update Off</a></li>
                                <li><a href="#">Disable</a></li>
                            </ul>
                        </div>
                        <h4 class="header">Stream</h4>

                        <div class="stream">

                            <?php

                            $notices = get_active_notices();
                            $notice_row = new Notices(NULL);

                            foreach ($notices as $notice_row) {



                                $emp = new Employee($notice_row->empid);
                                $department = new Department($notice_row->id);

                                ?>


                                <div class="item">

                                    <?php

                                    $type = $emp->type;

                                    switch ($type) {
                                        case "EM":
                                            echo " <div class='stream-icon stream-success'><i class='icon-off icon-white'></i></div>";
                                            break;
                                        case "MA":
                                            echo " <div class='stream-icon stream-success'><i class='icon-off icon-white'></i></div>";
                                            break;
                                        case "AD":
                                            echo " <div class='stream-icon stream-success'><i class='icon-off icon-white'></i></div>";
                                            break;
                                    }


                                    ?>




                                    <p class="date">

                                        <?php
                                        echo $notice_row->posteddate;
                                        ?>
                                    </p>
                                    <h4>

                                        <?php




                                        echo $emp->name;



                                        ?>

                                    </h4>

                                    <div class="row">
                                        <p class="span6">
                                            <?php



                                            echo $notice_row->content;



                                            ?>
                                        </p>
                                    </div>
                                </div>



                            <?php } ?>


                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                (function () {
                    var delay;

                    $($(".item")[0]).hide();

                    delay = function (ms, func) {
                        return setTimeout(func, ms);
                    };

                    delay(500, function () {
                        return $($(".item")[0]).slideDown("slow");
                    });

                }).call(this);
            </script>
        </div>
    </div>

<?php
include_once "./header/footer.php"
?>
<?php
include_once "header/header_controller.php";
?>
    <div class="page">
        <div class="page-container">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <h4>Dashboard</h4>

                        <div class="sidebar">
                            <ul class="col-nav span3">
                                <li>
                                    <a href="#bookmarks" data-toggle="collapse" class="accordion-toggle"><span
                                            class="label label-inverse pull-right">3 </span>Bookmarks</a>
                                </li>
                                <li id="bookmarks" class="collapse">
                                    <ul>
                                        <li><a href="#"> <i class="pull-right icon-plane"></i>Flights</a><a href="#"> <i
                                                    class="pull-right icon-fire"></i>Fires</a><a href="#"> <i
                                                    class="pull-right icon-comment"></i>Comments</a></li>
                                    </ul>
                                </li>
                                <li><a href="#metrics" data-toggle="collapse" class="accordion-toggle"> <span
                                            class="label label-inverse pull-right">2</span>Metrics</a></li>
                                <li id="metrics" class="collapse">
                                    <ul>
                                        <li><a href="#"> <i class="pull-right icon-signal"></i>Stats</a><a href="#"> <i
                                                    class="pull-right icon-fire"></i>Fires</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"> <i class="pull-right icon-cog"></i>Settings</a></li>
                                <li><a href="#"> <i class="pull-right icon-star"></i>Extra</a></li>
                                <li><a href="http://wbpreview.com/profile.html"><i class="pull-right icon-user"></i>Profile</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="span9">

                        <h4>Departments</h4>

                        <div class="panel">
                            <div class="top primary"><i class="batch-big b-database"></i>
                                <h6>Computer</h6>
                            </div>
                            <div class="bottom">
                                <h2>7720</h2>
                                <h6>rows</h6>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="top warning"><i class="batch-big b-flag"></i>
                                <h6>warnings</h6>
                            </div>
                            <div class="bottom">
                                <h2>21</h2>
                                <h6>service requests</h6>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="top success"><i class="batch-big b-code"></i>
                                <h6>Code Size</h6>
                            </div>
                            <div class="bottom">
                                <h2>2034</h2>
                                <h6>loc</h6>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="top danger"><i class="batch-big b-comment"></i>
                                <h6>Communication</h6>
                            </div>
                            <div class="bottom">
                                <h2>596</h2>
                                <h6>comments</h6>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="top"><i class="batch-big b-alarm"></i>
                                <h6>Time Remaining</h6>
                            </div>
                            <div class="bottom">
                                <h2>51</h2>
                                <h6>minutes</h6>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="top purple"><i class="batch-big b-wifi"></i>
                                <h6>WiFi Range</h6>
                            </div>
                            <div class="bottom">
                                <h2>86%</h2>
                                <h6>availability</h6>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="top info"><i class="batch-big"></i>
                                <h6>Locations</h6>
                            </div>
                            <div class="bottom">
                                <h2>45</h2>
                                <h6>sites</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script type="text/javascript">
                (function () {
                    var delay;

                    delay = function (ms, func) {
                        return setTimeout(func, ms);
                    };

                    toastr.options = {
                        positionClass: 'toast-bottom-left'
                    };

                    delay(1000, function () {
                        return toastr.success('Have fun storming the castle!', 'Miracle Max Says');
                    });

                    delay(1500, function () {
                        return toastr.warning('My name is Inigo Montoya. You Killed my father, prepare to die!');
                    });

                    delay(2000, function () {
                        return toastr.error('I do not think that word means what you think it means.', 'Inconceivable!');
                    });

                }).call(this);
            </script>
        </div>
    </div>

    <script src="static/js/d3-setup.js"></script>
<?php
include_once "./header/footer.php"
?>
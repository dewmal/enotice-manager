<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dewmal
 * Date: 12/26/12
 * Time: 9:02 PM
 * To change this template use File | Settings | File Templates.
 */


?>


<footer>
    <div class="container">
        <div class="row">
            <div class="span12">
                <p class="pull-right">Admin Theme by Nathan Speller</p>

                <p>&copy; Copyright 2013 FreelanceLeague</p>
            </div>
        </div>
    </div>
</footer>
</body>
<script src="static/js/d3-setup.js"></script>
<script>protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
    address = protocol + window.location.host + window.location.pathname + '/ws';
    socket = new WebSocket(address);
    socket.onmessage = function (msg) {
        msg.data == 'reload' && window.location.reload()
    }</script>

<!-- Mirrored from wbpreview.com/previews/WB0G25H3J/ by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 26 Dec 2012 14:14:59 GMT -->
</html>
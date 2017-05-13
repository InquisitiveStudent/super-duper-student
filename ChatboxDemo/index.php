<?php
?>

<html>

<head>
    <title>Chat Box</title>
    <link rel="stylesheet" type="text/css" href="chat.css" />
    <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
    <script>
        function submitChat() {
            if (form1.uname.value == '' || form1.msg.value == '') {
                alert('ALL FIELDS ARE MANDATORY!!!!');
                return;
            }
            form1.uname.readOnly = true;
            form1.uname.style.border = 'none';
            var uname = form1.uname.value;
            var msg = form1.msg.value;
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;

                }

            }
            xmlhttp.open('GET', 'insert.php?uname=' + uname + '&msg=' + msg, true);
            xmlhttp.send();


        }
        /*so here we just simply load.. logs.php every 2 secs*/
        
        $(document).ready(function(e) {
            $.ajaxSetup({
                /*this line is to disable the cache of a broswer so it does not load old data*/
                cache: false
            });
            setInterval(function() {
                $('#chatlogs').load('logs.php');
            }, 2000);
        });

    </script>


</head>

<body>
    <form name="form1">
        Enter Your Chatname: <input type="text" name="uname" style="width:200px;" /><br/> Your Message: <br />
        <textarea name="msg" styles="width:200px; height: 70px"></textarea><br />
        <a href="#" onclick="submitChat()" class="button">Send</a><br /><br />

        <div id="chatlogs">
            LOADING CHATLOGS PLEASE WAIT...
        </div>
    </form>
</body>

</html>

<?php

    mysql_connect('mysql9.000webhost.com', 'a6492199_root', 'jesuloba2');
    mysql_select_db('a6492199_jesuye');
    $query=mysql_query("SELECT * FROM scores");
    $trivia=mysql_fetch_assoc($query);
    echo $trivia['recScores'];

?>

<?php

  if(isset($_POST['name'])===true && empty ($_POST['name'])===false){
    mysql_connect('mysql9.000webhost.com', 'a6492199_root', 'jesuloba2');
    mysql_select_db('a6492199_jesuye');
    $query = mysql_query("UPDATE scores SET recScores= '" .mysql_real_escape_string(trim($_POST['name']))."' WHERE indexNo=1");
    echo "New high score created!";
  }

?>

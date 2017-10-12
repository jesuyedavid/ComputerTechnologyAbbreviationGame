<?php

  if(isset($_POST['name'])===true && empty ($_POST['name'])===false){
    mysql_connect('mysql9.000webhost.com', 'a6492199_root', 'jesuloba2');
    mysql_select_db('a6492199_jesuye');
    $query = mysql_query("select ans3 from qanda where question='" .
    mysql_real_escape_string(trim($_POST['name'])) ."'");
    echo (mysql_num_rows($query)!==0)?mysql_result($query, 0, 'ans3'):'Name not found';
  }

?>

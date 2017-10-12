<?php
  mysql_connect('mysql9.000webhost.com', 'a6492199_root', 'jesuloba2');
  mysql_select_db('a6492199_jesuye');
  $rant=rand(1, 5000000);

  $result = mysql_query("select count(1) FROM qanda");
  $row = mysql_fetch_array($result);
  $numR = $row[0];

  $ran=($rant%$numR)+1;
  $query=mysql_query("SELECT * FROM qanda where indexNo=$ran");
  //$trivia=mysql_fetch_assoc($query);
  //echo $trivia['question'];
  $arr=array();
  while($data=mysql_fetch_assoc($query)){
    $arr[]=$data;
  }
  echo json_encode($arr);
?>


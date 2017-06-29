<?php



    mysql_connect('mysql9.000webhost.com', 'a6492199_root', 'jesuloba2');
    mysql_select_db('a6492199_jesuye');
    $rant=rand(1, 5000000);

    $result = mysql_query("select count(1) FROM qanda");
    $row = mysql_fetch_array($result);
    $numR = $row[0];
    
    $ran=($rant%$numR)+1;
    $sql="SELECT * FROM qanda where indexNo=$ran";
    $records=mysql_query($sql);
    $employee=mysql_fetch_assoc($records);
 ?>


<DOCTYPE html>
  <html>
  <head>
    <title>IEEE TRIVIA</title>
    <link rel="stylesheet" type="text/css" href="style.css"></link>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
          for(var i=0;i<1000;i++){
           var div = $("#box");  
           div.animate({left: '83.4%'}, "slow");
           div.animate({left: '0px'}, "slow");
           div.animate({fontSize: '3em'}, "slow");
          }
        });
    </script>
  </head>
  <body>
    <div id="box" style="background:#80ff00;height:50px;width:150px;position:relative;">JORE!</div>
    <div id=heading>
        <text>HOW MANY CTEC ABBREVIATIONS CAN
              YOU SOLVE IN 60 SECONDS?
        </text>
    </div>
    <div id=timer>
        <p id="status"></p>
        <p id="ele1"></p>
        <p id="ele2"></p>
        <p id="ele3"></p>
        <p id="ele4"></p>

      </div>

      <div id=rw></div>

      <div id=qanda><br><br>
            <text  id= "quest"><?php echo $employee['question'];?></text><br><br>
            <input type="Submit" id="ans1" value="<?php echo $employee['ans1'];?>"></input><br><br>
            <input type="Submit" id="ans2" value="<?php echo $employee['ans2'];?>"></input><br><br>
            <input type="Submit" id="ans3" value="<?php echo $employee['ans3'];?>"></input><br><br>
            <input type="Submit" id="ans4" value="<?php echo $employee['ans4'];?>"></input><br><br><br><br>
            <input type="Submit" id="next" value="NEXT"></input><br><br>
      </div>

      <a href="ind.php">CLICK TO GO TO CHAT AREA</a>

  </body>
  <script src="myjs.js"></script>
  </html>
					
var score=0;
var done=false;
function countDown(secs, elem){
    var element = document.getElementById(elem);
    element.innerText="Time left: "+secs+"seconds";
    if(secs<1){
      clearTimeout(timer);
      element.innerHTML='<p>Countdown Complete!<p>';
      element.innerHTML='<a href="#">Click here now</a>';
      element.innerHTML="<p> Your score is: "+score+"</p>";

      $.post('scores.php', function(data){

        if(score <= data){//if current score is highest score
          document.getElementById('ele1').innerHTML="<p> Sorry, you don't have the highest score! </p>";
        }else{//update database
          document.getElementById('ele3').innerHTML="<p> YOU have the highest score </p>";
          var name=score;
          $.post('scores3.php', {name: name}, function(data){
            document.getElementById('ele4').innerHTML="<p> "+data +" </p>";
          });
        }
      });
      $('#box').hide();
      $('#qanda').hide();
      exit();
    }
    secs--;
    var timer=setTimeout('countDown('+secs+',"'+elem+'")', 1000);
  }

  countDown(60, "status");
  $('#rw').hide();


  $(document).ready(function(){
      $("#ans1").click(function(){
          $("#ans1").css("color", "red");
          $("#ans2").css("color", "black");
          $("#ans3").css("color", "black");
          $("#ans4").css("color", "black");
      });
      $("#ans2").click(function(){
          $("#ans2").css("color", "red");
          $("#ans1").css("color", "black");
          $("#ans3").css("color", "black");
          $("#ans4").css("color", "black");
      });
      $("#ans3").click(function(){
          $("#ans3").css("color", "red");
          $("#ans1").css("color", "black");
          $("#ans2").css("color", "black");
          $("#ans4").css("color", "black");
      });
      $("#ans4").click(function(){
          $("#ans4").css("color", "red");
          $("#ans1").css("color", "black");
          $("#ans2").css("color", "black");
          $("#ans3").css("color", "black");
      });

   });

      $('#next').click(function(){
        var done=false;
          var name=$("#quest").text();
          //alert(name);
          if($.trim(name)!=''){
          $.post('ans.php', {name: name}, function(data){
              var list=["#ans1", "#ans2", "#ans3", "#ans4"];
                //alert(data);
                for(i in list){
                  if($(list[i]).css("color") == "rgb(255, 0, 0)"){
                    //alert(list[i]+"is red");
                    if($(list[i]).val()==data){
                        //$(list[i]).css("color", "black");
                        //alert("CORRECT");
                        $('#rw').text("CORRECT!!!! :-)");
                        $('#rw').show(500);
                        $('#rw').hide(500);
                        score+=5;
                        done=true;
                        break;
                    }else {
                       //alert("WRONG");
                       $('#rw').text("WRONG :-(");
                       $('#rw').show(500);
                       $('#rw').hide(500);
                       done=true;
                       break;
                    }
                  }
                };

                $("#ans3").css("color", "black");
                $("#ans1").css("color", "black");
                $("#ans2").css("color", "black");
                $("#ans4").css("color", "black");

              if(done){
                var name="";
                $.post('name.php', function(data){
                  var res=JSON.parse(data);
                  $('#quest').text(res[0].question);
                  $('#ans1').val(res[0].ans1);
                  $('#ans2').val(res[0].ans2);
                  $('#ans3').val(res[0].ans3);
                  $('#ans4').val(res[0].ans4);
                 });
              }
            });
          };
       });

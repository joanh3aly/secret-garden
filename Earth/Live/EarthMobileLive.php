
<?php
/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = 'root';

try {
    $dbh = new PDO("mysql:host=$hostname; dbname=TestDB", $username, $password);

    /*** The SQL SELECT statement ***/
    $sql = "SELECT light FROM ProcTest";

    /*** fetch into an PDOStatement object ***/
    $stmt = $dbh->query($sql);

    /*** echo number of columns ***/
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

    /*** loop over the object directly ***/
	
   /*for($i = 0; $i<10; $i++){
	var_dump($result[$i]);
   }*/
	 
    /*** close the database connection ***/
    $dbh = null;
}
catch(PDOException $e)
    {
   echo $e->getMessage();
    }
    
?><!DOCTYPE html>
<html>
<head>
<audio id="audOne"  preload="auto">
			<source src="EarthAudio/one.mp3"></source>
			<!--<source src="EarthAudio/one.ogg"></source>-->
			<source src="EarthAudio/one.wav"></source>
			Your browser isn't invited for super fun time.
	</audio>	

	
	<audio id="audTwo"  preload="auto">
			<source src="EarthAudio/two.mp3"></source>
			<!--<source src="EarthAudio/two.ogg"></source>-->
			<source src="EarthAudio/two.wav"></source>
			Your browser isn't invited for super fun time.
	</audio>
	
	<audio id="audThree" preload="auto">
			<source src="EarthAudio/three.mp3"></source>
			<!--<source src="EarthAudio/three.ogg"></source>-->
			<source src="EarthAudio/three.wav"></source>
			Your browser isn't invited for super fun time.
	</audio>

	<audio id="audFour" preload="auto">
			<source src="EarthAudio/four.mp3"></source>
			<!--<source src="EarthAudio/four.ogg"></source>-->
			<source src="EarthAudio/four.wav"></source>
			Your browser isn't invited for super fun time.
	</audio>
	
	<audio id="audFive" preload="auto">
			<source src="EarthAudio/five.mp3"></source>
			<!--<source src="EarthAudio/five.ogg"></source>-->
			<source src="EarthAudio/five.wav"></source>
			Your browser isn't invited for super fun time.
	</audio>
	
	<audio id="audSix" preload="auto">
			<source src="EarthAudio/six.mp3"></source>
			<!--<source src="EarthAudio/six.ogg"></source>-->
			<source src="EarthAudio/six.wav"></source>
			Your browser isn't invited for super fun time.
	</audio>	


	<audio id="audSeven" preload="auto">
			<source src="EarthAudio/seven.mp3"></source>
			<!--<source src="EarthAudio/seven.ogg"></source>-->
			<source src="EarthAudio/seven.wav"></source>
			Your browser isn't invited for super fun time.
	</audio>
	
	<audio id="audEight" preload="auto">
			<source src="EarthAudio/eight.mp3"></source>
			<!--<source src="EarthAudio/eight.ogg"></source>-->
			<source src="EarthAudio/eight.wav"></source>
			Your browser isn't invited for super fun time.
	</audio>	
	
		<audio id="audNine" preload="auto">
			<source src="EarthAudio/nine.mp3"></source>
			<!--<source src="EarthAudio/nine.ogg"></source>-->
			<source src="EarthAudio/nine.wav"></source>
			Your browser isn't invited for super fun time.
	</audio>
	
	<audio id="audTen" preload="auto">
			<source src="EarthAudio/ten.mp3"></source>
			<!--<source src="EarthAudio/ten.ogg"></source>-->
			<source src="EarthAudio/ten.wav"></source>
			Your browser isn't invited for super fun time.
	</audio>

<script type="text/javascript" src="jquery-1.8.0.js"></script>
<script type="text/javascript">
var dataArray = new Array();	 
dataArray = <?php echo json_encode($result);?> ;



var wholeArray = new Array();
for (var i=0; i<10; i++){
	wholeArray[i] = dataArray[i+20];

	}

var sum=0;

for(var j=0; j<wholeArray.length; j++){
	sum=sum+parseFloat(wholeArray[j]);
	}
	
var mean=Math.floor(sum/wholeArray.length);

var useArray=new Array();
var percentageArray=new Array();

for(var i=0; i<10; i++){
	useArray[i]=parseFloat(wholeArray[i])-mean;
	percentageArray[i]=Math.abs(parseInt(useArray[i]*10))*25;
	//document.write(percentageArray[i]);
	//document.write("<br />");		
	}
$("#firstcolumn").append('<img id= "first" src="darkLeaf.png" alt="Leaf"  />');
$("#secondcolumn").append('<img id= "second" src="lightLeaf.png" alt="Leaf"  />');
$("#thirdcolumn").append('<img id= "third" src="darkLeaf.png" alt="Leaf"  />');
$("#fourthcolumn").append('<img id= "fourth" src="lightLeaf.png" alt="Leaf"  />');
$("#fifthcolumn").append('<img id= "fifth" src="darkLeaf.png" alt="Leaf"  />');
$("#sixthcolumn").append('<img id= "sixth" src="lightLeaf.png" alt="Leaf"  />');
$("#seventhcolumn").append('<img id= "seventh" src="darkLeaf.png" alt="Leaf"  />');
$("#eighthcolumn").append('<img id= "eighth" src="lightLeaf.png" alt="Leaf"  />');
$("#ninthcolumn").append('<img id= "ninth" src="darkLeaf.png" alt="Leaf"  />');
$("#tenthcolumn").append('<img id= "tenth" src="lightLeaf.png" alt="Leaf"  />');

function makeX(sensorValue){
  var x;	
    if((sensorValue >= 0) && (sensorValue <= 10)){
      x=0;
    }
     if((sensorValue > 10) && (sensorValue <= 20)){
      x=1;
    }
     if((sensorValue > 20) && (sensorValue <= 30)){
      x=2;
    }
     if((sensorValue > 30) && (sensorValue <= 40)){
      x=3;
    }
     if((sensorValue > 40) && (sensorValue <= 50)){
      x=4;
    }
    if((sensorValue > 50) && (sensorValue <= 60)){
      x=5;
    }
    if((sensorValue > 60) && (sensorValue <= 70)){
      x=6;
    }
    if((sensorValue > 70) && (sensorValue <= 80)){
      x=7;
    }
    if((sensorValue > 80) && (sensorValue <= 90)){
      x=8;
    }
    if((sensorValue > 90) && (sensorValue <= 100)){
      x=9;
    }
    return x;
}

function chooseSound(sensorValue){
  if((sensorValue >= 0) && (sensorValue <= 10)){
    var soundOne = $("#audOne")[0];
		return soundOne.play();
  }
  if((sensorValue > 10) && (sensorValue <= 20)){
    var soundTwo = $("#audTwo")[0];
        return soundTwo.play();
  }
  if((sensorValue > 20) && (sensorValue <= 30)){
    var soundThree = $("#audThree")[0];
        return soundThree.play();
  }
  if((sensorValue > 30) && (sensorValue <= 40)){
    var soundFour = $("#audFour")[0];
        return soundFour.play();
  }
  if((sensorValue > 40) && (sensorValue <= 50)){
    var soundFive = $("#audFive")[0];
        return soundFive.play();
  }
  if((sensorValue > 50) && (sensorValue <= 60)){
    var soundSix = $("#audSix")[0];
        return soundSix.play();
  }
  if((sensorValue > 60) && (sensorValue <= 70)){
    var soundSeven = $("#audSeven")[0];
        return soundSeven.play();
  }
  if((sensorValue > 70) && (sensorValue <= 80)){
    var soundEight = $("#audEight")[0];
        return soundEight.play();
  }
  if((sensorValue > 80) && (sensorValue <= 90)){
    var soundNine = $("#audNine")[0];
        return soundNine.play();
  }
  if((sensorValue > 90) && (sensorValue <= 100)){
    var soundTen = $("#audTen")[0];
        return soundTen.play();
  }
}



$(document).ready(function(){ 

    if(makeX(percentageArray[0])==0){
      $("#first").after('<img id= "firstSound" src="darkLeaf.png" alt="Leaf" />');
        $("#firstSound").mouseover(function(){
          chooseSound(percentageArray[0]);  
      });
      $("#first").mouseover(function(){
          chooseSound(percentageArray[0]);  
      });
    }else {
          for(var i=1; i<=(makeX(percentageArray[0])); i++){
            $("#first").after('<img id= "firstSound" src="darkLeaf.png" alt="Leaf" />');
            $("#firstSound").mouseover(function(){
              chooseSound(percentageArray[0]);
             
            });
            $("#first").mouseover(function(){
              chooseSound(percentageArray[0]);  
            });
          }
	}

    if(makeX(percentageArray[1])==0){
        $("#second").after('<img id= "secondSound" src="lightLeaf.png" alt="Leaf"  />');
           $("#secondSound").mouseover(function(){
             chooseSound(percentageArray[1]);
           });
           $("#second").mouseover(function(){
          chooseSound(percentageArray[1]);  
      });
    }else {
          for(var i=1; i<=(makeX(percentageArray[1])); i++){
            $("#second").after('<img id= "secondSound" src="lightLeaf.png" alt="Leaf"  />');
               $("#secondSound").mouseover(function(){
                 chooseSound(percentageArray[1]);
               });
               $("#second").mouseover(function(){
          chooseSound(percentageArray[1]);  
      });
          }
	}
    
    if(makeX(percentageArray[2])==0){
        $("#third").after('<img id= "thirdSound" src="darkLeaf.png" alt="Leaf" />');
        $("#thirdSound").mouseover(function(){
                 chooseSound(percentageArray[2]);
        		});
        $("#third").mouseover(function(){
          chooseSound(percentageArray[2]);  
        });
    }else {
          for(var i=1; i<=(makeX(percentageArray[2])); i++){
            $("#third").after('<img id= "thirdSound" src="darkLeaf.png" alt="Leaf"  />');
              $("#thirdSound").mouseover(function(){
                 chooseSound(percentageArray[2]);
              });
              $("#third").mouseover(function(){
                 chooseSound(percentageArray[2]);  
              });
               
          }
	}
	 if(makeX(percentageArray[3])==0){
        $("#fourth").after('<img id= "fourthSound" src="lightLeaf.png" alt="Leaf" />');
          $("#fourthSound").mouseover(function(){
                 chooseSound(percentageArray[3]);
          });
          $("#fourth").mouseover(function(){
                 chooseSound(percentageArray[3]);  
              });   
     }else {
          for(var i=1; i<=(makeX(percentageArray[3])); i++){
            $("#fourth").after('<img id= "fourthSound" src="lightLeaf.png" alt="Leaf"  />');
              $("#fourthSound").mouseover(function(){
                 chooseSound(percentageArray[3]);
               });
               $("#fourth").mouseover(function(){
                 chooseSound(percentageArray[3]);  
              });
          }
	 }
	 if(makeX(percentageArray[4])==0){
        $("#fifth").after('<img id= "fifthSound" src="darkLeaf.png" alt="Leaf"  />');
           $("#fifthSound").mouseover(function(){
                 chooseSound(percentageArray[4]);
               });
               $("#fifth").mouseover(function(){
                 chooseSound(percentageArray[4]);  
              });
    }else {
          for(var i=1; i<=(makeX(percentageArray[4])); i++){
            $("#fifth").after('<img id= "fifthSound" src="darkLeaf.png" alt="Leaf"  />');
             $("#fifthSound").mouseover(function(){
                 chooseSound(percentageArray[4]);
               });
               $("#fifth").mouseover(function(){
                 chooseSound(percentageArray[4]);  
              });
          }
	}
	if(makeX(percentageArray[5])==0){
        $("#sixth").after('<img id= "sixthSound" src="lightLeaf.png" alt="Leaf"  />');
           $("#sixthSound").mouseover(function(){
                 chooseSound(percentageArray[5]);
               });
               $("#sixth").mouseover(function(){
                 chooseSound(percentageArray[5]);  
              });
    }else {
          for(var i=1; i<=(makeX(percentageArray[5])); i++){
            $("#sixth").after('<img id= "sixthSound" src="lightLeaf.png" alt="Leaf"  />');
               $("#sixthSound").mouseover(function(){
                 chooseSound(percentageArray[5]);
               });
               $("#sixth").mouseover(function(){
                 chooseSound(percentageArray[5]);  
              });
          }
	}
	if(makeX(percentageArray[6])==0){
        $("#seventh").after('<img id= "seventhSound" src="darkLeaf.png" alt="Leaf"  />');
           $("#seventhSound").mouseover(function(){
                 chooseSound(percentageArray[6]);
               });
               $("#seventh").mouseover(function(){
                 chooseSound(percentageArray[6]);  
              });
    }else {
          for(var i=1; i<=(makeX(percentageArray[6])); i++){
            $("#seventh").after('<img id= "seventhSound" src="darkLeaf.png" alt="Leaf"  />');
               $("#seventhSound").mouseover(function(){
                 chooseSound(percentageArray[6]);
               });
               $("#seventh").mouseover(function(){
                 chooseSound(percentageArray[6]);  
              });
          }
	}
	if(makeX(percentageArray[7])==0){
        $("#eighth").after('<img id= "eighthSound" src="lightLeaf.png" alt="Leaf"  />');
           $("#eighthSound").mouseover(function(){
                 chooseSound(percentageArray[7]);
               });
               $("#eighth").mouseover(function(){
                 chooseSound(percentageArray[7]);  
              });
    }else {
          for(var i=1; i<=(makeX(percentageArray[7])); i++){
            $("#eighth").after('<img id= "eighthSound" src="lightLeaf.png" alt="Leaf"  />');
               $("#eighthSound").mouseover(function(){
                 chooseSound(percentageArray[7]);
               });
               $("#eighth").mouseover(function(){
                 chooseSound(percentageArray[7]);  
              });
          }
	}
	if(makeX(percentageArray[8])==0){
        $("#ninth").after('<img id= "ninthSound" src="darkLeaf.png" alt="Leaf" />');
           $("#ninthSound").mouseover(function(){
                 chooseSound(percentageArray[8]);
               });
               $("#ninth").mouseover(function(){
                 chooseSound(percentageArray[8]);  
              });
    }else {
          for(var i=1; i<=(makeX(percentageArray[8])); i++){
            $("#ninth").after('<img id= "ninthSound" src="darkLeaf.png" alt="Leaf"  />');
               $("#ninthSound").mouseover(function(){
                 chooseSound(percentageArray[8]);
               });
               $("#ninth").mouseover(function(){
                 chooseSound(percentageArray[8]);  
              });
          }
	}
	if(makeX(percentageArray[9])==0){
        $("#tenth").after('<img id= "tenthSound" src="lightLeaf.png" alt="Leaf" />');
           $("#tenthSound").mouseover(function(){
                 chooseSound(percentageArray[9]);
               });
               $("#tenth").mouseover(function(){
                 chooseSound(percentageArray[9]);  
              });
    }else {
          for(var i=1; i<=(makeX(percentageArray[9])); i++){
            $("#tenth").after('<img id= "tenthSound" src="lightLeaf.png" alt="Leaf"  />');
               $("#tenthSound").mouseover(function(){
                 chooseSound(percentageArray[9]);
               });
               $("#tenth").mouseover(function(){
                 chooseSound(percentageArray[9]);  
              });
          }
	}

});
</script>

<style type="text/css">
#container {
width: 100%
height: 100%
margin: 0 auto; /* the auto value on the 
sides, coupled with the width, centres the 
layout */}

body{
background-image:url('Brown/brown3.jpeg');
}

img { 
width:68%;
height:10%;
margin:5px;

}
#leftside { width: 50%; float: left; } 
#rightside { width: 50%; float: right; } 
.leftsideleft {width: 60%; float: left; }
.leftsideright {width: 40%; float: right; }

.leftcolumn {width: 66.65%; float: left; }
#thirdcolumn {width: 33.33%; float: right; }
#eighthcolumn {width: 33.33%; float: right; }

#firstcolumn {width: 50%; float: left; }
#secondcolumn {width: 50%; float: right; }
#fourthcolumn {width: 50%; float: left; }
#fifthcolumn {width: 50%; float: right; }

#sixthcolumn {width: 50%; float: left; }
#seventhcolumn {width: 50%; float: right; }
#ninthcolumn {width: 50%; float: left; }
#tenthcolumn {width: 50%; float: right; }


</style>
</head>
<body>
<div id="container">
<div id="leftside"> 
<div class="leftsideleft">
<div class="leftcolumn">
<div id="firstcolumn"><img id= "first" src="darkLeaf.png" alt="Leaf"  /></div>
<div id="secondcolumn"><img id= "second" src="lightLeaf.png" alt="Leaf" /></div>
</div>
<div id="thirdcolumn"><img id= "third" src="darkLeaf.png" alt="Leaf" /></div>
</div>
<div class="leftsideright">
<div id="fourthcolumn"><img id= "fourth" src="lightLeaf.png" alt="Leaf" /></div>
<div id="fifthcolumn"><img id= "fifth" src="darkLeaf.png" alt="Leaf"  /></div>
</div>
</div>
<div id="rightside">
<div class="leftsideleft">
<div class="leftcolumn">
<div id="sixthcolumn"><img id= "sixth" src="lightLeaf.png" alt="Leaf" /></div>
<div id="seventhcolumn"><img id= "seventh" src="darkLeaf.png" alt="Leaf"  /></div>
</div>
<div id="eighthcolumn"><img id= "eighth" src="lightLeaf.png" alt="Leaf" /></div>
</div>
<div class="leftsideright">
<div id="ninthcolumn"><img id= "ninth" src="darkLeaf.png" alt="Leaf"  /></div>
<div id="tenthcolumn"><img id= "tenth" src="lightLeaf.png" alt="Leaf" /></div>
</div>
</div>


	
	
</div>
</div>

</body>
</html>

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
    $sql = "SELECT temp1 FROM ProcTest";

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
    
?>
<!DOCTYPE HTML>
<html>
  <head>
 


    <style>
      body {
        margin: 0px;
        padding: 0px;
      }
      canvas {
        border: 1px transparent;
        background:wheat;
        

      }
    </style>
    </head>
    <script src="libraries/kinetic.js"></script>
    <script src="libraries/jquery.js"></script>
    <script>
    

var dataArray = new Array();	 
dataArray = <?php echo json_encode($result);?> ;



var wholeArray = new Array();
for (var i=0; i<10; i++){
	wholeArray[i] = parseFloat(dataArray[Math.floor(Math.random()*dataArray.length)]);
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
	percentageArray[i]=Math.abs(parseInt(useArray[i]*100));
	}      

var pArrayTotal=0;

for(i=0; i<percentageArray.length; i++){
	pArrayTotal=pArrayTotal+percentageArray[i];
	}


if(pArrayTotal>2000){
	for(i=0; i<percentageArray.length; i++){
		percentageArray[i]=Math.abs(percentageArray[i]-150);
		}
	}

if(pArrayTotal>1500){
	for(i=0; i<percentageArray.length; i++){
		percentageArray[i]=Math.abs(percentageArray[i]-70);
		}
	}

if(pArrayTotal<1000){
	for(i=0; i<percentageArray.length; i++){
		percentageArray[i]=percentageArray[i]+100;
		}	
	}

pArrayTotal=0;




for(i=0; i<percentageArray.length; i++){
	document.write(percentageArray[i]);
	document.write("<br />");
	pArrayTotal=pArrayTotal+percentageArray[i];
	}
	
document.write(pArrayTotal);	




    var size=new Array(6);




    </script>

  <body>
    <div id="container"></div>
  </body>
</html>
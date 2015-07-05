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

var divis=dataArray.length/4;

var rand=Math.floor(Math.random()*divis);

document.write(rand);


var wholeArray = new Array();
for (var i=0; i<10; i++){
	wholeArray[i] = dataArray[i+rand];
	}


for(i=0; i<wholeArray.length; i++){
	document.write(wholeArray[i]);
	document.write('<br />');
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
	percentageArray[i]=Math.abs(parseInt(useArray[i]*300));
	
	}      
	
/*for(var i=0; i<10; i++){
	var ind=Math.abs(Math.random()*dataArray.length)
	percentageArray[i]=dataArray[ind];
	
	}*/




    var size=new Array(6);
/*    size[0]=100+percentageArray[0];
    size[1]=300+percentageArray[2];    
    size[2]=500+percentageArray[4];
    size[3]=700+percentageArray[6];
    size[4]=900+percentageArray[8];
    size[5]=1100+percentageArray[10];*/
    
    size[0]=percentageArray[0];
    size[1]=size[0]+percentageArray[1];    
    size[2]=size[1]+percentageArray[2];
    size[3]=size[2]+percentageArray[3];
    size[4]=size[3]+percentageArray[4];
    size[5]=size[4]+percentageArray[5];    



    </script>

  <body>
    <div id="container"></div>
  </body>
</html>
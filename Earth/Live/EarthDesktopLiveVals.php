
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
    $sql = "SELECT light FROM LiveTable";

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
<script>
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
	percentageArray[i]=Math.abs(parseInt(useArray[i]*10))*10;
	document.write(percentageArray[i]);
	document.write("<br />");		
	}

</script>
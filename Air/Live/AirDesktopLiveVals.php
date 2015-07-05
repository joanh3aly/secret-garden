<?php
/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = 'root';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=TestDB", $username, $password);
    /*** echo a message saying we have connected ***/
    //echo 'Connected to database<p>';

    /*** The SQL SELECT statement ***/
    $sql = "SELECT pressure FROM LiveTable";

    /*** fetch into an PDOStatement object ***/
    $stmt = $dbh->query($sql);

    /*** echo number of columns ***/
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

    /*** loop over the object directly ***/
	
  
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
	dataArray = <?php echo json_encode($result);?>;


	var floatArray = new Array();

	for(i=0; i<10; i++){
		floatArray[i]=parseFloat(dataArray[(i)*10]);
	}

	var totalValues=0; 

	for(i=0; i<10; i++){
		totalValues=totalValues+floatArray[i];
	}

	var average = totalValues/10;
	//document.write("<br /> average : " + average+"<br />");


	var difference = new Array();

	for(i=0; i<floatArray.length; i++){
		difference[i]=Math.floor(Math.abs(floatArray[i]-average)*300);

	}

var posArray=new Array();	

	for(i=0; i<difference.length; i++){
		if(difference[i]>=10){
			posArray[i]=difference[i]-3;
			}else{
			posArray[i]=difference[i];
			}
	}		


    

    </script>

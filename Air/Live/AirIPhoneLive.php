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
    $sql = "SELECT pressure FROM ProcTest";

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

<!DOCTYPE HTML>
<html>
<head>
  <meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	<audio id="audOne"  preload="auto">
			<source src="audio/Air - Full Track Mp3.mp3"></source>
			<!--<source src="audio/one.ogg"></source>-->
			<source src="audio/one.wav"></source>
			Sorry, your browser does not support HTML5 audio!
	</audio>	

	
	<audio id="audTwo"  preload="auto">
			<source src="audio/two.mp3"></source>
			<!--<source src="audio/two.ogg"></source>-->
			<source src="audio/two.wav"></source>
			Sorry, your browser does not support HTML5 audio!
	</audio>
	
	<audio id="audThree" preload="auto">
			<source src="audio/three.mp3"></source>
			<!--<source src="audio/three.ogg"></source>-->
			<source src="audio/three.wav"></source>
			Sorry, your browser does not support HTML5 audio!
	</audio>

	<audio id="audFour" preload="auto">
			<source src="audio/four.mp3"></source>
			<!--<source src="audio/four.ogg"></source>-->
			<source src="audio/four.wav"></source>
			Sorry, your browser does not support HTML5 audio!
	</audio>
	
	<audio id="audFive" preload="auto">
			<source src="audio/five.mp3"></source>
			<!--<source src="audio/five.ogg"></source>-->
			<source src="audio/five.wav"></source>
			Sorry, your browser does not support HTML5 audio!
	</audio>
	
	<audio id="audSix" preload="auto">
			<source src="audio/six.mp3"></source>
			<!--<source src="audio/six.ogg"></source>-->
			<source src="audio/six.wav"></source>
			Sorry, your browser does not support HTML5 audio!
	</audio>	
	
	<audio id="audSeven" preload="auto">
			<source src="audio/seven.mp3"></source>
			<!--<source src="audio/six.ogg"></source>-->
			<source src="audio/seven.wav"></source>
			Sorry, your browser does not support HTML5 audio!
	</audio>		

	<audio id="audEight" preload="auto">
			<source src="audio/eight.mp3"></source>
			<!--<source src="audio/six.ogg"></source>-->
			<source src="audio/eight.wav"></source>
			Sorry, your browser does not support HTML5 audio!
	</audio>	

	<audio id="audNine" preload="auto">
			<source src="audio/nine.mp3"></source>
			<!--<source src="audio/six.ogg"></source>-->
			<source src="audio/nine.wav"></source>
			Sorry, your browser does not support HTML5 audio!
	</audio>	
	
	<audio id="audTen" preload="auto">
			<source src="audio/ten.mp3"></source>
			<!--<source src="audio/ten.ogg"></source>-->
			<source src="audio/ten.wav"></source>
			Sorry, your browser does not support HTML5 audio!
	</audio>	
</head>
    <style>
      body {
        margin: 0px;
        padding: 0px;
      }
      canvas {
        border: 1px transparent;
        background:gray;
        background-image:url("backs/8.jpeg");

        

      }
    </style>

    <script src="libraries/kinetic.js"></script>
    <script src="libraries/jquery.js"></script>
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

var radArray=new Array();
	for(i=0; i<difference.length; i++){
		if(difference[i]<=3){
			radArray[i]=difference[i]+2;
			}else{
			radArray[i]=difference[i];
			}
	}		



var posArray=new Array();	

	for(i=0; i<difference.length; i++){
		if(difference[i]>=10){
			posArray[i]=difference[i]-3;
			}else{
			posArray[i]=difference[i];
			}
	}			


    
      function loadImages(sources, callback) {
        var images = {};
        var loadedImages = 0;
        var numImages = 0;
        // get num of sources
        for(var src in sources) {
          numImages++;
        }
        for(var src in sources) {
          images[src] = new Image();
          images[src].onload = function() {
            if(++loadedImages >= numImages) {
              callback(images);
            }
          };
          images[src].src = sources[src];
        }
      }
      
      
      function draw(images) {
        
        var stage = new Kinetic.Stage({
          container: "container",
          width: 960,
          height: 640,

        });
        var layer = new Kinetic.Layer();

		var Xposition = new Array();
		var Yposition = new Array();
      
		Xposition[0]=stage.getWidth()/10-(stage.getWidth()/20);
		Xposition[1]=stage.getWidth()/5-(stage.getWidth()/20);		
		Xposition[2]=stage.getWidth()/10*3-(stage.getWidth()/20);
		Xposition[3]=stage.getWidth()/5*2-(stage.getWidth()/20);
		Xposition[4]=stage.getWidth()/2-(stage.getWidth()/20);
		Xposition[5]=stage.getWidth()/5*3-(stage.getWidth()/20);
		Xposition[6]=stage.getWidth()/10*7-(stage.getWidth()/20);
		Xposition[7]=stage.getWidth()/5*4-(stage.getWidth()/20);
		Xposition[8]=stage.getWidth()/10*9-(stage.getWidth()/20);		
		Xposition[9]=stage.getWidth()-(stage.getWidth()/20);		
		
		Yposition[0]=stage.getHeight()/10;
		Yposition[1]=stage.getHeight()/5;		
		Yposition[2]=stage.getHeight()/10*3;
		Yposition[3]=stage.getHeight()/5*2;
		Yposition[4]=stage.getHeight()/2;
		Yposition[5]=stage.getHeight()/5*3;
		Yposition[6]=stage.getHeight()/10*7;
		Yposition[7]=stage.getHeight()/5*4;
		Yposition[8]=stage.getHeight()/10*9;		
		Yposition[9]=stage.getHeight();						 


		 
		 
		function createCloud(x,y,radius){
    	var circle = new Kinetic.Circle({
          x: x,
          y: y,
          radius: radius,
          //opacity:0.5,
          fill: {
            image: images.eleven,
            offset: [-220, -70]
          },
          stroke: "transparent",
          strokeWidth: 4,
          
        });
        return circle;
        }
        
        function createRing(x,y,radius){
    	var circle = new Kinetic.Circle({
          x: x,
          y: y,
          radius: radius,
          //opacity:0.5,
          fill: "transparent",
          stroke: "white",
          strokeWidth: 2,
          
        });
        return circle;
        }
        
        function createAniOut(ring, size){
          var periodOut = 1000;
          var animOut = new Kinetic.Animation({
          func: function(frame) {           
            var scale=Math.sin(frame.time*2/periodOut)*size;
            ring.setScale(scale);            
          },
          node: layer
        });
  		return animOut;
  		}
  		

        
        var cloud = new Array();
        var ring = new Array();
        
        
        for(i=0; i<10; i++){
    		var posY=Math.floor(Math.random()*9);    		
            cloud[i]=createCloud(Xposition[i], Yposition[posArray[i]], 35);
            ring[i]=createRing(Xposition[i], Yposition[posArray[i]], 40);            
            }
            
            
        for(i=0; i<cloud.length; i++){
        	layer.add(ring[i]);
			}
        for(i=0; i<cloud.length; i++){
            layer.add(cloud[i]);
			}
			

		var animOut=new Array;

		
		
		for(k=0; k<cloud.length; k++){
			var rad=Math.random()*3+5;			
			animOut[k]=createAniOut(ring[k],radArray[k]);
			
		}
		
		
	

		cloud[0].on("touchstart", function() {
	        animOut[0].start();
        	});
        	
        cloud[0].on("touchend", function() {
	        animOut[0].stop();
        	});	

		cloud[1].on("touchstart", function() {
	        animOut[1].start();
        	});
        	
        cloud[1].on("touchend", function() {
	        animOut[1].stop();
        	});	
        	
		cloud[2].on("touchstart", function() {
	        animOut[2].start();
        	});
        	
        cloud[2].on("touchend", function() {
	        animOut[2].stop();
        	});	

		cloud[3].on("touchstart", function() {
	        animOut[3].start();
        	});
        	
        cloud[3].on("touchend", function() {
	        animOut[3].stop();
        	});
        	
		cloud[4].on("touchstart", function() {
	        animOut[4].start();
        	});
        	
        cloud[4].on("touchend", function() {
	        animOut[4].stop();
        	});        	
		
		cloud[5].on("touchstart", function() {
	        animOut[5].start();
        	});
        	
        cloud[5].on("touchend", function() {
	        animOut[5].stop();
        	});      		
		
		cloud[6].on("touchstart", function() {
	        animOut[6].start();
        	});
        	
        cloud[6].on("touchend", function() {
	        animOut[6].stop();
        	});      

		cloud[7].on("touchstart", function() {
	        animOut[7].start();
        	});
        	
        cloud[7].on("touchend", function() {
	        animOut[7].stop();
        	});      
        	
		cloud[8].on("touchstart", function() {
	        animOut[8].start();
        	});
        	
        cloud[8].on("touchend", function() {
	        animOut[8].stop();
        	});              	

		cloud[9].on("touchstart", function() {
	        animOut[9].start();
        	});
        	
        cloud[9].on("touchend", function() {
	        animOut[9].stop();
        	});      
        	
        ring[0].on("touchstart", function() {
	        audOne.play();
	        });

        ring[1].on("touchstart", function() {
	        audTwo.play();
	        });
	        
        ring[2].on("touchstart", function() {
	        audThree.play();
	        });
	        
        ring[3].on("touchstart", function() {
	        audFour.play();
	        });
	        
        ring[4].on("touchstart", function() {
	        audFive.play();
	        });
	        
        ring[5].on("touchstart", function() {
	        audSix.play();
	        });
	        
        ring[6].on("touchstart", function() {
	        audSeven.play();
	        });
	        
        ring[7].on("touchstart", function() {
	        audEight.play();
	        });
	        
        ring[8].on("touchstart", function() {
	        audNine.play();
	        });	   
	        
        ring[9].on("touchstart", function() {
	        audTen.play();
	        });	   	        
        	
    stage.add(layer);
        

        
        stage.add(layer);
      }
 if (window.addEventListener) // W3C standard
{
  window.addEventListener('load', window.scrollTo(1,5), false); // NB **not** 'onload'
}
      window.onload = function() {
        var sources = {
          one: "backs/1.jpeg",
          two: "backs/2.jpeg",
          three: "backs/3.jpeg",
          four: "backs/4.jpeg",
          five: "backs/5.jpeg",
          six: "backs/6.jpeg",
          seven: "backs/7.jpeg",
          eight: "backs/8.jpeg",
          nine: "backs/9.jpeg",
          ten: "backs/10.jpeg",          
          eleven: "backs/19.jpeg",
        };
		
		
		
        loadImages(sources, function(images) {
          draw(images);
        });
      }
    </script>

  <body>
    <div id="container"></div>
  </body>
</html>
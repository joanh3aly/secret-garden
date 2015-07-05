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
    $sql = "SELECT temp1 FROM LiveTable";

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
  <meta name="apple-mobile-web-app-capable" content="yes" />
  
	<audio id="audOne"  preload="auto">
			<source src="audio/one.mp3"></source>
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


var sum=0;



var wholeArray = new Array();
for (var i=0; i<10; i++){
	wholeArray[i] = dataArray[i*10];
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
	percentageArray[i]=Math.abs(parseInt(useArray[i]*300))+10;
	}      
	




    var size=new Array(6);

    
    size[0]=percentageArray[0];
    size[1]=size[0]+percentageArray[1];    
    size[2]=size[1]+percentageArray[2];
    size[3]=size[2]+percentageArray[3];
    size[4]=size[3]+percentageArray[4];
    size[5]=size[4]+percentageArray[5];
    

function selectAudio(number){
	if(number==0){
		return audOne;
		}
    else if(number==1){
	    return audTwo;
	    }
    else if(number==2){
	    return audThree;
	    }
    else if(number==3){
	    return audFour;
	    }
    else if(number==4){
	    return audFive;
	    }
    else if(number==5){
	    return audSix;
	    }
	}    
	
var circAud=new Array;

for(i=0; i<6; i++){
	circAud[i]=selectAudio(i);
	}

for(i=0; i<percentageArray.length; i++){
	if(percentageArray[i]>percentageArray[i+1]){
		circAud[i]=selectAudio(i+1);
		circAud[i+1]=selectAudio(i);
		}
	}	
	
	
function audioPlay(audio){
	audio.currentTime=0;
	audio.play();
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
          width: window.innerWidth,
          height: window.innerHeight,
        });
        var layer = new Kinetic.Layer();

		 


		 
		 
		 var circle1 = new Kinetic.Circle({
          x: 0,
          y: stage.getHeight() / 2,
          radius: size[0],
          fill: {
            image: images.one,
            offset: [-220, -70]
          },

          alpha: 0.5,
          stroke: "white",
          strokeWidth: 4
        });
                  
        

        
        var circle2 = new Kinetic.Circle({
          x: 0,
          y: stage.getHeight() / 2,
          radius: size[1],
          fill: {
            image: images.three,
            offset: [-220, -70]
          },

          alpha: 0.5,
          stroke: "white",
          strokeWidth: 4
        });



        
        var circle3 = new Kinetic.Circle({
          x: 0,
          y: stage.getHeight() / 2,
          radius: size[2],
          fill: {
            image: images.five,
            offset: [-220, -70]
          },
    
          alpha: 0.5,
          stroke: "white",
          strokeWidth: 4
        });
        

        
        var circle4 = new Kinetic.Circle({
          x: 0,
          y: stage.getHeight() / 2,
          radius: size[3],
          fill: {
            image: images.seven,
            offset: [-220, -70]
          },
  
          alpha: 0.5,
          stroke: "white",
          strokeWidth: 4
        });
        

        
        var circle5 = new Kinetic.Circle({
          x: 0,
          y: stage.getHeight() / 2,
          radius: size[4],
          fill: {
            image: images.nine,
            offset: [-220, -70]
          },
       
          alpha: 0.5,
          stroke: "white",
          strokeWidth: 4
        });
        

        
        var circle6 = new Kinetic.Circle({
          x: 0,
          y: stage.getHeight() / 2,
          radius: size[5],
          fill: {
            image: images.one,
            offset: [-220, -70]
          },

          alpha: 0.5,
          stroke: "white",
          strokeWidth: 4
        });


		circle1.on("mouseover", function() {
          this.setAlpha(1);
          this.setRadius(size[0]+20);
          audioPlay(circAud[0]);
          layer.draw();
        });     
        
        circle1.on("mouseout", function() {
          this.setAlpha(0.5);
          this.setRadius(size[0]);           
          layer.draw();
        });
        

        
        circle2.on("mouseover", function() {
          this.setAlpha(1);
          this.setRadius(size[1]+20);                     
          audioPlay(circAud[1]);          
          layer.draw();
        });     
        
        circle2.on("mouseout", function() {
          this.setAlpha(0.5);
          this.setRadius(size[1]);           
          layer.draw();
        });


        
		circle3.on("mouseover", function() {
          this.setAlpha(1);
          this.setRadius(size[2]+20);                     
          audioPlay(circAud[2]);
          layer.draw();
        });     
        
        circle3.on("mouseout", function() {
          this.setAlpha(0.5);
          this.setRadius(size[2]);                  
          layer.draw();
        });
        

        
        circle4.on("mouseover", function() {
          this.setAlpha(1);
          this.setRadius(size[3]+20);                     
          audioPlay(circAud[3]);
          layer.draw();
        });     
        
        circle4.on("mouseout", function() {
          this.setAlpha(0.5);
          this.setRadius(size[3]);           
          layer.draw();
        });
        

        
        circle5.on("mouseover", function() {
          this.setAlpha(1);
          this.setRadius(size[4]+20);                     
          audioPlay(circAud[4]);
          layer.draw();
        });     
        
        circle5.on("mouseout", function() {
          this.setAlpha(0.5);
          this.setRadius(size[4]);           
          layer.draw();
        });
      
        circle6.on("mouseover", function() {
          this.setAlpha(1);
          this.setRadius(size[5]+20);                     
          audioPlay(circAud[5]);
          layer.draw();
        });     
        
        circle6.on("mouseout", function() {
          this.setAlpha(0.5);
          this.setRadius(size[5]);           
          layer.draw();
        });
                
                

		
		layer.add(circle6);
        layer.add(circle5);
        layer.add(circle4);
        layer.add(circle3);
        layer.add(circle2);  
        layer.add(circle1);
        

        
        stage.add(layer);
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
          eleven: "backs/11.jpeg",
          info: "backs/info.png",
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
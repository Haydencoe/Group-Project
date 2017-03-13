<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Student Database System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  
  
  </head>
   
    <body>
  
    
    <header class="top-navbar">
      <div class="container">
        <div class="call-us">Call us on 01522 876000</div>
          <ul class="top-navbar-list">
           <li><a href="mailto:hayden@haydencoe.co.uk">Contact</a></li>
          
          </ul>
      </div>
    </header>
    
    <div class="container">

    <h1 class="main-title">Student Database System<span></span></h1>

      <ul class="nav nav-tabs">
        <li class="active"><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="helpPage.html">Help Page</a></li>
      </ul>


       <div id="slideshow"> 
         
           
                 
          <div>                
               
             
             <div id="studentDetails" >   
                 <p> Student Details:</p>
                
                         
                <!--<p id="">Student Name: </p>-->
                <!--<ul id="decodeders"> </ul>-->

                <!--<p id="">Student Number: </p>-->
                <ul id="decoded"></ul>
               
               <?php
$servername = "db668576206.db.1and1.com";
$username = "dbo668576206";
$password = "hayden301";
$dbname = "db668576206";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection

$db_selected = mysqli_select_db($conn, $dbname);

$user = $_GET['firstname'];

//$user_id = $_POST['firstname'];

//echo ("First name: " . $user. "<br />\n");

$query = "SELECT * FROM studentList WHERE studentID = '$user'";//. mysqli_real_escape_string($conn,$user_id);
    
    $result2 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result2) == 1) 
    {
      
        while($row2 = mysqli_fetch_array($result2)){
            echo "<tr>";
                
                               
               
                echo "<td>" . "<br> Name: " . $row2['firstname'] . "</td>";
                echo "<td>" ." " . $row2['lastname'] . "<br>". "</td>"; 
              
                echo "<td>" . "<br> Student ID: " . $row2['studentID'] . "<br>" . "</td>";
         
                echo "<td>" . "<br> Course: " . $row2['course'] . "</td>";
         
             echo "</tr>";
        

        }

    } 
    else 
    {
	   if  ('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] == "http://sds.computerscience.online/")
	    	
	    	{
		    	echo "Please Type or Scan your Student I.D. "; //Start
	    	}
	    	
	    if  ('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] == "http://sds.computerscience.online/index.php")
	    	
	    	{
		    	echo "Please Type or Scan your Student I.D. "; //Start
	    	}

	    
	    
	    else 
	   {	    
        echo "Student I.D. not recognised."; //Fail
        }
    
    }


mysqli_close($conn);

  ?>

        
             </div><!-- End of Student Dtails -->
               
               
               
               <video autoplay></video>
               <div id="inner"></div>
               <div id="redline"></div>
               
               <!--
               <button style="height:50px; width: 395px;" class="button" id="cam" onclick="myFunction()">Start Camera</button>
              -->
               
              
               <div id="panel">
	              
	               <form id="myForm" method="get" >
                      <label for="fname">Enter Student I.D.</label>
                      <input type="text" id="fname" name="firstname">
                      <input type="submit" value="Submit">
               
                             
	               </form>         
                              <!--<button style="height:50px; width: 200px;" class="button" onclick="">Enter</button>-->
               </div>

               
               <!--
               <div >
               
                  <button style="height:50px; width: 187.5px;" class="button" id="scan" >Scan</button>
                   
                  <button style="height:50px; width: 187.5px;" class="button" id="type" >Type</button>
            
               </div>
      
              -->
      
      
      
              <div class="center">
  
  
  
  
  <div id="btn-container3">
    <div id='btn3' onclick="stopCamFunction()">
      <div class='share-icon'>
        <i class="ion-share"> </i>
       <img src="cross-flat.png" style="width:50px;height:50px;" alt="Stop"> 
      </div>
      <div class='share-label'>
        <span>Stop</span>
      </div>
    </div>
  </div>

  
  <div class="btn-container4">
    <div class='btn4' onclick="myFunction()"  >
      <div class='share-icon'>
        <i class="ion-share"> </i>
       <img src="green%20tick.png" style="width:50px;height:50px;" alt="Start"> 
      </div>
      <div class='share-label'>
        <span>Start</span>
      </div>
    </div>
  </div>

  
  
<div class="btn-container">
    <div class='btn' id='scanBtn' >
      <div class='share-icon'>
        <i class="ion-share"> </i>
       <img src="UPC-1977.png" style="width:50px;height:50px;" alt="Scan"> 
      </div>
      <div class='share-label'>
        <span>Scan</span>
      </div>
    </div>
  </div>


   <div id="btn-container2">
    <div id='btn2'>
      <div class='share-icon'>
        <i class="ion-share"> </i>
       <img src="keyboard-icon.png" style="width:50px;height:50px;" alt="Type"> 
      </div>
      <div class='share-label'>
        <span>Type</span>
      </div>
    </div>
  </div>


   


</div>
  
      
      
               <canvas style="display:none;"></canvas> 
            
            
           </div>                       
           
           
           
           
       
           
       
       </div>    <!-- end of main div-->
            
            
      <div style="text-align: center;"></div>   

         
  
       

        <!--Stuff for displaying the timetable-->
      
        <div id="timeTableHolder"> 
     
            <div id="appearHere">
	         
	           <div id="emptyTimetable" class="unhidden">
    
                 <h6> Time table will appear here.</h6> 
   
               </div>
           
               <div id="HND2Timetable" class="hidden">
    
                 <img src="HND2Timetable.JPG" height="420" width="840" alt="HND Timetable">
   
               </div>

     
               <div id="HNC2Timetable" class="hidden">
    
                 <img src="HNC2Timetable.JPG" height="420" width="840" alt="HNC Timetable">
   
               </div>
  
            </div> <!-- End of appearHere -->
   
        </div> <!-- End of timeTable Holder --> 
   
   </div> <!-- class="container"> -->
         

    <footer>
      <div class="container">
        <!-- <a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fsds.computerscience.online%2F" class="valid-link"></a> -->   
        <!-- <div>&copy; Copyright 2017 Hayden Coe</div> -->
      </div>
    </footer>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="common.js"></script>
    
 
 
 
 
        
  </body>
  

  
</html>


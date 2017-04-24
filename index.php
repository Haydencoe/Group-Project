<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Student Database System</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
  
  
  </head>
   
    <body>
  
    
    <header class="top-navbar">
      <div class="container">
        <div class="call-us">Call us on 01522 876000</div>
          <ul class="top-navbar-list">
           <li><a href="mailto:309219@student.lincolncollege.ac.uk">Contact</a></li>
          
          </ul>
      </div>
    </header>
    
    <div class="container">

    <h1 class="main-title">Student Database System<span></span></h1>

      <ul class="nav nav-tabs">
        <li class="active"><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="helpPage.html">Help Page</a></li>
      
      <li><a href='php/logout.php'>Log Out</a></li>
      
      </ul>


       <div id="slideshow"> 
         
           
                 
          <div>                
               
             
             <div id="studentDetails" >   
                 <p id="pDetails"> Student Details:</p>
                              
               <?php


// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection

$db_selected = mysqli_select_db($conn, $dbname);

//$user = $_GET['firstname'];



$user_id = $_POST["firstname"];

$user_password = $_POST["password"];

//WHERE username = '".mysql_real_escape_string($_POST['username'])."'AND password = '$password'");


$query = "SELECT * FROM studentListPassword WHERE studentID = '$user_id' AND password = '$user_password'";//. mysqli_real_escape_string($conn,$user_id);
    
$query2 = "SELECT * FROM studentListPassword WHERE studentID = '$user_id'";//. mysqli_real_escape_string($conn,$user_id);    
    
  
    $result2 = mysqli_query($conn, $query);  //user id and password for type 
    $result3 = mysqli_query($conn, $query2); //just user id for scan
    
   if ($user_id == "")  //entered on start page
	       
	     {
		    echo "Please Type or Scan your Student I.D. "; //Start
	     }
	    	
   
   else
   {
   
	  
   if (mysqli_num_rows($result2) == 1) //user id and password type
    {
      
        while($row2 = mysqli_fetch_array($result2)){
            
            echo "<img src='Pictures/".$row2['firstname'].".png' alt='profilePic' height='60' width='60' border='2' style='float:none; margin:0px 0px; border-radius: 10px; '/>";    
            
            echo "<tr>";
                
                              
               
                echo "<td>" . "<br> Name: " . $row2['firstname'] . "</td>";
                echo "<td>" ." " . $row2['lastname'] . "<br>". "</td>"; 
              
              
                echo "<td>" . "<br> Student ID: " . $row2['studentID'] . "<br>" . "</td>";
         
                echo "<td>" . "<br> Course: " . $row2['course'] . "</td>";
         
                   
                echo "</tr>";
         
               
              
             
               
        }  //end of while 

      } // end of user id and password type
   
	    	
		 
	        
	    
	    else 
	   {	    
        
        echo "Student I.D. or Password not recognised."; //Fail on password and id 
        
       }
    
    
    if ($user_password=="")//if doing scan 
 
     {
 
      if (mysqli_num_rows($result3) == 1) //just user name
    {
      
        while($row2 = mysqli_fetch_array($result2)){
            
            echo "<img src='Pictures/".$row2['firstname'].".png' alt='profilePic' height='60' width='60' border='2' style='float:none; margin:0px 0px; border-radius: 10px; '/>";    
            
            echo "<tr>";
                
                              
               
                echo "<td>" . "<br> Name: " . $row2['firstname'] . "</td>";
                echo "<td>" ." " . $row2['lastname'] . "<br>". "</td>"; 
              
              
                echo "<td>" . "<br> Student ID: " . $row2['studentID'] . "<br>" . "</td>";
         
                echo "<td>" . "<br> Course: " . $row2['course'] . "</td>";
         
                   
                echo "</tr>";
   
               
        }//end of while  


      }//end of if for just user name scan 
      
    	    
	    else 
	   {	    
        
        echo "Student I.D. or Password not recognised."; //Fail scan 
        
       }
    }
    
}//end of else from start page
    



mysqli_close($conn);

  ?>

        
             </div><!-- End of Student Details -->
               
               
               
               <video autoplay></video>
               <div id="inner"></div>
               <div id="redline"></div>
               
                             
               <div id="panel">
	              
	                              
                  <form action = "/index.php<?php $_PHP_SELF ?>" method = "POST" id = "myForm" onsubmit = "return validateForm(this)">
                     
                      <label for="fname">Enter Student I.D.</label>
                      <input type="text" id="fname" name="firstname">
                      <label for="pword">Enter Your Password.</label>
                      <input type="password" id="pword" name="password" >
                      <input type="submit" value="Submit">
               
                 </form>   
                 
                                                            
               </div>
                     
   
   <div id="center">
  
  
  
   <!-- button for stoping the webcam function--> 
  <div id="stopBtn-container">
    <div id='stopBtn' onclick="stopCamFunction()">
      <div class='share-icon'>
        <i class="ion-share"> </i>
       <img src="Pictures/redCross.png" style="width:50px;height:50px;" alt="Stop"> 
      </div>
      <div class='btn-label'>
        <span>Stop</span>
      </div>
    </div>
  </div>

   <!-- button for starting the webcam function--> 
  <div id="startBtn-container">
    <div id='startBtn' onclick="myFunction()"  >
      <div class='share-icon'>
        <i class="ion-share"> </i>
       <img src="Pictures/greenTick.png" style="width:50px;height:50px;" alt="Start"> 
      </div>
      <div class='btn-label'>
        <span>Start</span>
      </div>
    </div>
  </div>

  
  <!-- button for scanning function--> 
<div id="scanBtn-container">
    <div id='scanBtn'>
       <div class='share-icon'>
         <i class="ion-share"> </i>
         <img src="Pictures/barCode.png" style="width:50px;height:50px;" alt="Scan"> 
       </div>
       <div class='btn-label'>
        <span>Scan</span>
       </div>
    </div>
 </div>

    <!-- button for typing function-->
   <div id="typeBtn-container">
    <div id='typeBtn'>
      <div class='share-icon'>
        <i class="ion-share"> </i>
       <img src="Pictures/keyBoard.png" style="width:50px;height:50px;" alt="Type"> 
      </div>
      <div class='btn-label'>
        <span>Type</span>
      </div>
    </div>
  </div>


   


</div><!--end of center div-->
  
      
      
               <canvas style="display:none;"></canvas> 
            
            
           </div>                       
           
           
           
           
       
           
       
       </div>    <!-- end of main div-->
            
            
            <div id="studentDetailsHolder"> 
            
            <div id="secondStudentDetails"> 
            
            
              <p> Student Details:</p>
                
                         
                <!--<p id="">Student Name: </p>-->
                <!--<ul id="decodeders"> </ul>-->

                <!--<p id="">Student Number: </p>-->
                
               
               <?php


// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection

$db_selected = mysqli_select_db($conn, $dbname);

//$user = $_GET['firstname'];



$user_id = $_POST["firstname"];

$user_password = $_POST["password"];

//WHERE username = '".mysql_real_escape_string($_POST['username'])."'AND password = '$password'");


$query = "SELECT * FROM studentListPassword WHERE studentID = '$user_id' AND password = '$user_password'";//. mysqli_real_escape_string($conn,$user_id);
    
$query2 = "SELECT * FROM studentListPassword WHERE studentID = '$user_id'";//. mysqli_real_escape_string($conn,$user_id);    
    
  
    $result2 = mysqli_query($conn, $query);  //user id and password for type 
    $result3 = mysqli_query($conn, $query2); //just user id for scan
    
   if ($user_id == "")  //entered on start page
	       
	     {
		    echo "Please Type or Scan your Student I.D. "; //Start
	     }
	    	
   
   else
   {
   
	  
   if (mysqli_num_rows($result2) == 1) //user id and password type
    {
      
        while($row2 = mysqli_fetch_array($result2)){
            
            echo "<img src='Pictures/".$row2['firstname'].".png' alt='profilePic' height='60' width='60' border='2' style='float:none; margin:0px 0px; border-radius: 10px; '/>";    
            
            echo "<tr>";
                
                              
               
                echo "<td>" . "<br> Name: " . $row2['firstname'] . "</td>";
                echo "<td>" ." " . $row2['lastname'] . "<br>". "</td>"; 
              
              
                echo "<td>" . "<br> Student ID: " . $row2['studentID'] . "<br>" . "</td>";
         
                echo "<td>" . "<br> Course: " . $row2['course'] . "</td>";
         
                   
                echo "</tr>";
         
               
              
             
               
        }  //end of while 

      } // end of user id and password type
   
	    	
		 
	        
	    
	    else 
	   {	    
        
        echo "Student I.D. or Password not recognised."; //Fail on password and id 
        
       }
    
    
    if ($user_password=="")//if doing scan 
 
     {
 
      if (mysqli_num_rows($result3) == 1) //just user name
    {
      
        while($row2 = mysqli_fetch_array($result2)){
            
            echo "<img src='Pictures/".$row2['firstname'].".png' alt='profilePic' height='60' width='60' border='2' style='float:none; margin:0px 0px; border-radius: 10px; '/>";    
            
            echo "<tr>";
                
                              
               
                echo "<td>" . "<br> Name: " . $row2['firstname'] . "</td>";
                echo "<td>" ." " . $row2['lastname'] . "<br>". "</td>"; 
              
              
                echo "<td>" . "<br> Student ID: " . $row2['studentID'] . "<br>" . "</td>";
         
                echo "<td>" . "<br> Course: " . $row2['course'] . "</td>";
         
                   
                echo "</tr>";
   
               
        }//end of while  


      }//end of if for just user name scan 
      
    	    
	    else 
	   {	    
        
        echo "Student I.D. or Password not recognised."; //Fail scan 
        
       }
    }
    
}//end of else from start page
    



mysqli_close($conn);

  ?>


     


            
            
            </div><!-- end of second student details-->
            
            </div> <!-- end of time table holder--> 
            
      <div style="text-align: center;"></div>   

         
         
         
        
        <!--Stuff for displaying the timetable-->
      
        <div id="timeTableHolder"> 
     
            <div id="appearHere">
	         
	           <div id="emptyTimetable" class="unhidden">
    
                   <h6> Time table will appear here.</h6> 
   
                  
   
               </div>
           
               <div id="HND2Timetable" class="hidden">
                   <a class="thumbnail">
                 <img src="Pictures/HND2Timetable.JPG" alt="HND Timetable">
                   </a>
               </div>

     
               <div id="HNC2Timetable" class="hidden">
    
    
                 <a class="thumbnail">
                 <img src="Pictures/HNC2Timetable.JPG"  alt="HNC Timetable">
                 </a>
               </div>
  
            </div> <!-- End of appearHere -->
   
        </div> <!-- End of timeTable Holder --> 
   
   </div> <!-- class="container"> -->
         


         <div id="twitterHolder">
     
           <div id="twitter">
            
            <a class="twitter-timeline" href="https://twitter.com/frustr8dlec">Tweets by frustr8dlec</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> 

           </div>
           
         </div>


    <footer>
      <div class="container">
        <!-- <a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fsds.computerscience.online%2F" class="valid-link"></a> -->   
        <!-- <div>&copy; Copyright 2017 Hayden Coe</div> -->
      </div>
    </footer>


    <script type="text/javascript">
                   var MyJSStringVar = "<?php Print($user_id); ?>"; //Part to show time table based on users student ID
      
                   var MyJSStringVarTwo = "<?php Print($user_password); ?>";
      
                       
           if ((MyJSStringVar=='309219')&&(MyJSStringVarTwo=='password1'))  
            {
	               	               	               
	                //Part to unhide the right timetable HNC2Timetable
                var item = document.getElementById('HNC2Timetable');
                if (item) 
                {
                  item.className=(item.className=='hidden')?'unhidden':'hidden';
                }
            
                //Hides the empty time table holder
                var item = document.getElementById('emptyTimetable');
                if (item) 
                {
                  item.className=(item.className=='hidden')?'unhidden':'hidden';
                }

	        
            
            
            }//end of if statement 
      
      
            if ((MyJSStringVar=='271592')&&(MyJSStringVarTwo=='password2')||(MyJSStringVar=='308401')&&(MyJSStringVarTwo=='password3')||(MyJSStringVar=='312825')&&(MyJSStringVarTwo=='password4')||(MyJSStringVar=='273051')&&(MyJSStringVarTwo=='password5'))  //Checks usernames and passwords match up to display correct timetable
            {
	         
	                
	               	               
	                //Part to unhide the right timetable HND2Timetable
                var item = document.getElementById('HND2Timetable');
                if (item) 
                {
                  item.className=(item.className=='hidden')?'unhidden':'hidden';
                }
            
                //Hides the empty time table holder
                var item = document.getElementById('emptyTimetable');
                if (item) 
                {
                  item.className=(item.className=='hidden')?'unhidden':'hidden';
                }

	                            
          
            
            
            }//end of if statement 

      
      
      
          function validateForm(x) {
          var x = document.forms["myForm"]["fname"].value;
          
          if (x == "") 
          {
          alert("Student I.D. Must Be Filled Out!");
          return false;
          }
         
         
         var y = document.forms["myForm"]["pword"].value;
          
          if (y == "") 
          {
          alert("A Password Must Be Entered!");
          return false;
          }

         
         else
         {
	         document.getElementById('myForm').submit();
	     }
         
         
         
         }

      
      
            
         </script>



    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="javaScript/common.js"></script>
    
 
 
 
 
        
  </body>
  

  
</html>


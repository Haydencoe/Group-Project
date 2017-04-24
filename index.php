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
            <div id="topContainer"> 
          
                <div> <!--sub div-->               
                    <div id="studentDetails" >   
                      <p id="pDetails"> Student Details:</p>
                              
                      <!--PHP to retrieve the student details form the dataBase--> 
                      <?php
                     
			    //Removed login details to protect data

                      // Create connection
                      $conn = mysqli_connect($servername, $username, $password);
                      // Check connection
                      $db_selected = mysqli_select_db($conn, $dbname);

                      $user_id = $_POST["studentNumber"];
                      $user_password = $_POST["password"];

                      $query = "SELECT * FROM studentListPassword WHERE studentID = '$user_id' AND password = '$user_password'";//. mysqli_real_escape_string($conn,$user_id);
                      $query2 = "SELECT * FROM studentListPassword WHERE studentID = '$user_id'";
    
                      $result2 = mysqli_query($conn, $query);  //user id and password for type 
                      $result3 = mysqli_query($conn, $query2); //just user id for scan
    
                      if ($user_id == "")  //entered on start page
	                   {
		                 echo "Please Type or Scan your Student I.D. "; //Start
	                   }
                      else//other than start page
                       {
     
                          if (strlen($user_password) > 0)//if doing type
                           {
                     
                               if (mysqli_num_rows($result2) == 1) //user id and password type
                               {
                                   while($row2 = mysqli_fetch_array($result2)){
            
                                   echo "<img src='Pictures/".$row2['firstname'].".JPG' alt='profilePic' height='60' width='60' border='2' style=' border-radius: 10px; '/>";    
                                   echo "<tr>";
                                   echo "<td>" . "<br> Name: " . $row2['firstname'] . "</td>";
                                   echo "<td>" ." " . $row2['lastname'] . "<br>". "</td>"; 
                                   echo "<td>" . "<br> Student ID: " . $row2['studentID'] . "<br>" . "</td>";
                                   echo "<td>" . "<br> Course: " . $row2['course'] . "</td>";
                                   echo "</tr>";
                                   $stored_password = $row2['password'];
                                   }  //end of while 
                                } // end of user id and password type
   
	                            else 
	                            {	    
                                   echo "Student I.D. or Password not recognised."; //Fail on password and id 
                                }
                            }
                            if ($user_password=="")//if doing scan 
                            {
 
                                if (mysqli_num_rows($result3) == 1) //just user name
                                {
                                    while($row2 = mysqli_fetch_array($result3)){
                                             
                                      echo "<img src='Pictures/".$row2['firstname'].".JPG' alt='profilePic' height='60' width='60' border='2' style='; border-radius: 10px; '/>";    
                                      echo "<tr>";
                                      echo "<td>" . "<br> Name: " . $row2['firstname'] . "</td>";
                                      echo "<td>" ." " . $row2['lastname'] . "<br>". "</td>"; 
                                      echo "<td>" . "<br> Student ID: " . $row2['studentID'] . "<br>" . "</td>";
                                      echo "<td>" . "<br> Course: " . $row2['course'] . "</td>";
                                      echo "</tr>";
                                      $stored_password = "";
                                    }//end of while  
                                }//end of if for just user name scan 
                                else 
	                            {	    
                                    echo "Student I.D. or Password not recognised."; //Fail scan 
                                }    
                            }// end of if for scanning
                        }//end of else from start page
                        mysqli_close($conn); //closing of database connection
                        ?>
                    </div><!-- End of Student Details -->
               
                    <video autoplay></video>
                    <div id="inner"></div>
                    <div id="redline"></div>
                          
                    <div id="panel">
	              
	                              
                      <form action = "/index.php<?php $_PHP_SELF ?>" method = "POST" id = "typeForm" onsubmit = "return validateForm(this)">
                     
                      <label for="sNumber">Enter Student I.D.</label>
                      <input type="text" id="sNumber" name="studentNumber">
                      <label for="pWord">Enter Your Password.</label>
                      <input type="password" id="pWord" name="password" >
                      <input type="submit" value="Submit">
                      </form>   
                    </div> <!--end of panel div--> 
                     
                    <!-- div to hold all the buttons together-->
                    <div id="btnDiv"> 
  
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
                            <div id='startBtn' onclick="startCamFunction()"  >
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
                    </div><!--end of button div-->
                    <canvas style="display:none;"></canvas> 
                </div> <!--end of sub div-->                      
            </div> <!-- end of top container div-->
        
            <!-- second student detail div that appears when there's a small screen resolution.-->
            <div id="studentDetailsHolder"> 
            
                <div id="secondStudentDetails"> 
	      
	               <p> Student Details:</p> 
                      <!--PHP to retrieve the student details form the dataBase--> 
                      <?php
                     
	              //Removed login details to protect data

                      // Create connection
                      $conn = mysqli_connect($servername, $username, $password);
                      // Check connection
                      $db_selected = mysqli_select_db($conn, $dbname);

                      $user_id = $_POST["studentNumber"];
                      $user_password = $_POST["password"];

                      $query = "SELECT * FROM studentListPassword WHERE studentID = '$user_id' AND password = '$user_password'";//. mysqli_real_escape_string($conn,$user_id);
                      $query2 = "SELECT * FROM studentListPassword WHERE studentID = '$user_id'";
    
                      $result2 = mysqli_query($conn, $query);  //user id and password for type 
                      $result3 = mysqli_query($conn, $query2); //just user id for scan
    
                      if ($user_id == "")  //entered on start page
	                   {
		                 echo "Please Type or Scan your Student I.D. "; //Start
	                   }
                      else//other than start page
                       {
     
                          if (strlen($user_password) > 0)//if doing type
                           {
                     
                               if (mysqli_num_rows($result2) == 1) //user id and password type
                               {
                                   while($row2 = mysqli_fetch_array($result2)){
            
                                   echo "<img src='Pictures/".$row2['firstname'].".JPG' alt='profilePic' height='60' width='60' border='2' style=' border-radius: 10px; '/>";    
                                   echo "<tr>";
                                   echo "<td>" . "<br> Name: " . $row2['firstname'] . "</td>";
                                   echo "<td>" ." " . $row2['lastname'] . "<br>". "</td>"; 
                                   echo "<td>" . "<br> Student ID: " . $row2['studentID'] . "<br>" . "</td>";
                                   echo "<td>" . "<br> Course: " . $row2['course'] . "</td>";
                                   echo "</tr>";
                                   $stored_password = $row2['password'];
                                   }  //end of while 
                                } // end of user id and password type
   
	                            else 
	                            {	    
                                   echo "Student I.D. or Password not recognised."; //Fail on password and id 
                                }
                            }
                            if ($user_password=="")//if doing scan 
                            {
 
                                if (mysqli_num_rows($result3) == 1) //just user name
                                {
                                    while($row2 = mysqli_fetch_array($result3)){
                                             
                                      echo "<img src='Pictures/".$row2['firstname'].".JPG' alt='profilePic' height='60' width='60' border='2' style='; border-radius: 10px; '/>";    
                                      echo "<tr>";
                                      echo "<td>" . "<br> Name: " . $row2['firstname'] . "</td>";
                                      echo "<td>" ." " . $row2['lastname'] . "<br>". "</td>"; 
                                      echo "<td>" . "<br> Student ID: " . $row2['studentID'] . "<br>" . "</td>";
                                      echo "<td>" . "<br> Course: " . $row2['course'] . "</td>";
                                      echo "</tr>";
                                      $stored_password = "";

                                    }//end of while  
                                }//end of if for just user name scan 
                                else 
	                            {	    
                                    echo "Student I.D. or Password not recognised."; //Fail scan 
                                }    
                            }// end of if for scanning
                        }//end of else from start page
                        mysqli_close($conn); //closing of database connection
                        ?>
                </div><!-- end of second student details-->
            </div> <!-- end of student details holder--> 
            <div style="text-align: center;"></div>   

            <!--Stuff for displaying the timetable-->
            <div id="timeTableHolder"> 
                <div id="appearHere">
	         
	                <div id="emptyTimetable" class="unhidden">
                      <h6> Time table will appear here.</h6> 
                    </div>
           
                    <div id="HND2Timetable" class="hidden">
                        <a class="tumbnail">
                           <img src="Pictures/HND2Timetable.JPG" alt="HND Timetable">
                        </a>
                    </div>

                    <div id="HNC2Timetable" class="hidden">
                        <a class="tumbnail">
                          <img src="Pictures/HNC2Timetable.JPG"  alt="HNC Timetable">
                        </a>
                    </div>
                </div> <!-- End of appearHere -->
            </div> <!-- End of timeTable Holder --> 
            <!--twitter feed--> 
            <div id="twitterHolder">
                <div id="twitter">
                   <a class="twitter-timeline" href="https://twitter.com/frustr8dlec">Tweets by frustr8dlec</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> 
                </div>
            </div>
        </div> <!-- class="container"> -->
         
        <footer>
            <div class="container">
                <a href="https://validator.w3.org/nu/?doc=https%3A%2F%2Fsds.computerscience.online%2F" class="valid-link">Valid HTML</a>    
                <div>&copy; Copyright 2017 Hayden Coe</div> 
            </div>
        </footer>


        <!--JavaScript to handle the showing of the correct timetable-->
        <script type="text/javascript">
                   
            var MyJSStringVar = "<?php Print($user_id); ?>"; //Part to show time table based on users student ID
            var MyJSStringVarTwo = "<?php Print($user_password); ?>"; //the entered password
            var MyJSStringVarThree = "<?php Print($stored_password); ?>"; //the stored password
                
                              
            if ((MyJSStringVar=='309219')&&(MyJSStringVarTwo==MyJSStringVarThree))//checks the student id and checks the entered password against the stored password
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
      
      
            
      
      
            //Checks usernames and passwords match up to display correct timetable
            if ((MyJSStringVar=='271592')&&(MyJSStringVarTwo==MyJSStringVarThree)||(MyJSStringVar=='308401')&&(MyJSStringVarTwo==MyJSStringVarThree)||(MyJSStringVar=='312825')&&(MyJSStringVarTwo==MyJSStringVarThree)||(MyJSStringVar=='273051')&&(MyJSStringVarTwo==MyJSStringVarThree))  
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
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="javaScript/common.js"></script>
    </body>
</html>
 
 
 
 


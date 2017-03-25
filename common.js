 
             function delay() {
              
              document.getElementById('startBtn').style.pointerEvents = 'auto';   
              document.getElementById('stopBtn').style.pointerEvents = 'auto';   

              }



    
 //Button Animation Stuff
 
 $(document).ready(function() {  
           
            $( "#scanBtn" ).addClass( "selected" );
            //document.getElementById('scanBtn').className = 'btnSelected';
                       
            document.getElementById('scanBtn').style.pointerEvents = 'none'; //STOP the press of scan while already on scan

                       
    $("#typeBtn").click(function(){//type button
        
     
        $("#inner").slideUp(500);
        $("#redline").slideUp(500);
               
        $("#panel").delay(500).slideDown(500);
   
   
   
               

         
             });


     $("#scanBtn").click(function(){//scan button
        
        $("#panel").slideUp(500);
        $("#inner").delay(500).slideDown(500);
        $("#redline").delay(500).slideDown(500);
        
        //$("#cam").delay(1000).show("slow");
    
         
    });

            
           
            
            
            //Type button
            $("#typeBtn").click(function () {
               
             
                          
             
             //$(".selected").removeClass("selected");
             
             //$(this).addClass("active");
             
            //$("#typeBtn").addClass('.active');
              
             
             
             //Hide all 4 
            

             $('#stopBtn').animate({
                 'marginLeft' : "-=0px" //moves left
                });
             
             $('#startBtn').animate({
                 'marginLeft' : "-=108px" //moves left
                });
             
              $('#scanBtn').animate({
                 'marginLeft' : "-=110px" //moves left
                });
             
             
             
             $('#typeBtn').animate({
                 'marginLeft' : "-=110px" //moves left
                });
             
               				
         
         
         
          //Show the 2
          $('#scanBtn').delay(300).animate({
                 'marginLeft' : "+=0px" //moves right
                });

             
             $('#typeBtn').delay(300).animate({
                 'marginLeft' : "+=110px" //moves right
                });
         
               document.getElementById('stopBtn').style.pointerEvents = 'none'; //Stop the press of start while on type
               document.getElementById('startBtn').style.pointerEvents = 'none'; //Stop the press of start while on type
               document.getElementById('typeBtn').style.pointerEvents = 'none'; //STOP the press of type btn while already on type
               document.getElementById('scanBtn').style.pointerEvents = 'auto'; //ENABLE the press of scan while on type

               
                $( "#scanBtn" ).removeClass( "selected" );
                $( "#typeBtn" ).addClass( "selected" );
               
                        
           });
         
         
         
         
         
         
            //Scan button
            $("#scanBtn").click(function () {
               
                //$("#scanBtn-container3").delay(0).show( "fast" );
               
               //$("#scanBtn-container4").delay(0).show("fast" );

               
               
               
            //Hide the 2
                          
             $('#scanBtn').animate({
                 'marginLeft' : "-=0px" //moves left
                });

             
             $('#typeBtn').animate({
                 'marginLeft' : "-=110px" //moves left
                });
             
               
                        
				
          //Show all 4
         
            /* 
             $('.stopBtn').animate({
                 'marginLeft' : "+=0px" //moves right
                });
             */
             
             $('#typeBtn').delay(500).animate({
                 'marginLeft' : "+=110px" //moves right
                });
                    
             

             $('#scanBtn').delay(700).animate({
                 'marginLeft' : "+=110px" //moves right
                });

                         
             $('#startBtn').delay(900).animate({
                 'marginLeft' : "+=110px" //moves right
             
                });
         
              
              
               document.getElementById('typeBtn').style.pointerEvents = 'auto'; //ENABLE the press of type while on scan
               document.getElementById('scanBtn').style.pointerEvents = 'none'; //STOP the press of scan while already on scan
                
               setTimeout(delay, 1000);
           
            
         
         
         
               $( "#typeBtn" ).removeClass( "selected" );
                $( "#scanBtn" ).addClass( "selected" );

         
           });
         
         
                  
         });





//JQueary for switching from type/scan
  $(document).ready(function(){
    $("#typeBtn").click(function(){
        
        //$("#cam").fadeOut(1000);
        $("#cam").hide("slow");

                
       
        $("#inner").slideUp(1000);
        $("#redline").slideUp(1000);
               
        $("#panel").delay(1000).slideDown(1000);
   
    
    });


     $("#scanBtn").click(function(){
        $("#panel").slideUp(1000);
        $("#inner").delay(1000).slideDown(1000);
        $("#redline").delay(1000).slideDown(1000);
        
        $("#cam").delay(1000).show("slow");
    
    
    });


});  
  
 
 


$(window).scroll(function() {
  // Darken the top navbar when scrolling down
  var scroll = $(window).scrollTop();
  if (scroll >= 50) {
    $(".top-navbar").addClass("dark");
  } else {
    $(".top-navbar").removeClass("dark");
  }
});

$(document).ready(function() {
 
 
});


  
  function getUserMedia(options, successCallback, failureCallback) {
  var api = navigator.getUserMedia || navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia || navigator.msGetUserMedia;
  if (api) {
    return api.bind(navigator)(options, successCallback, failureCallback);
  }
  alert('User Media API not supported.');
}



function getStream(type) {
  
   var constraints = {};
  constraints[type] = true;
  getUserMedia(constraints, function(stream) {
    var mediaControl = document.querySelector(type);
    if (navigator.mozGetUserMedia) {
      mediaControl.mozSrcObject = stream;
    } else {
      mediaControl.srcObject = stream;
      mediaControl.src = (window.URL || window.webkitURL).createObjectURL(stream);
    }
  }, function(err) {
    alert('Error: ' + err);
  });
}
  
 
//TRIAL STUFF***************************************************************************************************


function stopCamFunction() {  //button click "Stop"
	

location.reload();


document.getElementById('typeBtn').style.pointerEvents = 'auto'; //ENABLE the press of type when web cam is deactivated

	
}  //end stop function


function myFunction() {  //button click "Start"
  
  
       
      
    
    //    alert("Hello! I am an alert box!!");
       
        var localStream;

        var sound = new Audio("Sounds/barcode.wav");

        var video = document.querySelector('video');
        var canvas = document.querySelector('canvas');
        var ctx = canvas.getContext('2d');
        var localMediaStream = null;
        var list = document.querySelector('ul#decoded');
        
        var lists = document.querySelector('ul#decodeders');
        
        
        
        
        //When a barcode has been scanned 
        
        var worker = new Worker('javaScript/zbar-processor.js');
        worker.onmessage = function(event) {
            if (event.data.length == 0) return;
            var d = event.data[0];
            
                      
            sound.play(); //Plays 'beep' noise
        
             // Submit form with name function.
              
              
              var str = event.data[0]; 
              var res = str.slice(-1);
              
              document.getElementById('fname').value = res;    
              
              
             document.getElementById('myForm').submit();
              
              

            localStream.getTracks().forEach(function(track) { track.stop() }) //Stops the camera stream
            
                   
           
           
           }; //End of "Worker" 

        function snapshot() {
            if (localMediaStream === null) return;
            var k = (320 + 240) / (video.videoWidth + video.videoHeight);
            canvas.width = Math.ceil(video.videoWidth * k);
            canvas.height = Math.ceil(video.videoHeight * k);
            var ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0, video.videoWidth, video.videoHeight,
                          0, 0, canvas.width, canvas.height);

            var data = ctx.getImageData(0, 0, canvas.width, canvas.height);
            worker.postMessage(data);
        }

        setInterval(snapshot, 500);

        navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
        window.URL = window.URL || window.webkitURL || window.mozURL || window.msURL;

        if (navigator.getUserMedia) {
            navigator.getUserMedia({video: true},
                                   
                                   function(stream) { // success callback
                                       
                                       
                                       localStream = stream;
                                       
                                       
                                       if (video.mozSrcObject !== undefined) 
                                       
                                       {
                                           video.mozSrcObject = stream;
                                       
        
                                       } 
                                       
                                       else 
                                       {
                                           video.src = (window.URL && window.URL.createObjectURL(stream)) || stream;
                                       }
                                       
                                       localMediaStream = true;
                                   },
                                   
                                   function(error) {
                                       console.error(error);
                                   });
        }
        else {
       
       
       
        }
        
        
         document.getElementById('typeBtn').style.pointerEvents = 'none'; //STOP the press of type while web cam is active

        } //end of myFunction
        
        
        
        function validateForm() {
          var x = document.forms["myForm"]["fname"].value;
          
          if (x == "") 
          {
          alert("Student I.D. must be filled out");
          return false;
          }
         
         
         var y = document.forms["myForm"]["pword"].value;
          
          if (y == "") 
          {
          alert("Password must be entered");
          return false;
          }


           
         
         
         }
         
         
         
         
         
         

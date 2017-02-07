

            

 //Button Animation Stuff
 
 $(document).ready(function() {  
            
            
    $("#btn2").click(function(){
        
     
        $("#inner").slideUp(500);
        $("#redline").slideUp(500);
               
        $("#panel").delay(500).slideDown(500);
   
    
    });


     $(".btn").click(function(){
        
        $("#panel").slideUp(500);
        $("#inner").delay(500).slideDown(500);
        $("#redline").delay(500).slideDown(500);
        
        //$("#cam").delay(1000).show("slow");
    
    
    });

            
           
            
            
            //Type button
            $("#btn2").click(function () {
               
             
             //$(".selected").removeClass("selected");
             $(this).addClass("active");
             
            //$("#btn2").addClass('.active');
              
             
             
             //Hide all 4 
            

             $('#btn3').animate({
                 'marginLeft' : "-=0px" //moves left
                });
             
             $('.btn4').animate({
                 'marginLeft' : "-=108px" //moves left
                });
             
              $('.btn').animate({
                 'marginLeft' : "-=110px" //moves left
                });
             
             
             
             $('#btn2').animate({
                 'marginLeft' : "-=110px" //moves left
                });
             
               
               //$(".btn-container3").delay(500).hide( "fast" ); 
               //$(".btn-container4").delay(500).hide("fast" );
				
         
         
         
          //Show the 2
          $('.btn').delay(300).animate({
                 'marginLeft' : "+=0px" //moves left
                });

             
             $('#btn2').delay(300).animate({
                 'marginLeft' : "+=110px" //moves left
                });
         
         

         
         
           });
         
         
         
         
         
         
            //Scan button
            $(".btn").click(function () {
               
                //$(".btn-container3").delay(0).show( "fast" );
               
               //$(".btn-container4").delay(0).show("fast" );

               
               
               
            //Hide the 2
                          
             $('.btn').animate({
                 'marginLeft' : "-=0px" //moves left
                });

             
             $('#btn2').animate({
                 'marginLeft' : "-=110px" //moves left
                });
             
               
                        
				
          //Show all 4
         
            /* 
             $('.btn3').animate({
                 'marginLeft' : "+=0px" //moves right
                });
             */
             
             $('#btn2').delay(500).animate({
                 'marginLeft' : "+=110px" //moves right
                });
                    
             

             $('.btn').delay(700).animate({
                 'marginLeft' : "+=110px" //moves right
                });

                         
             $('.btn4').delay(900).animate({
                 'marginLeft' : "+=110px" //moves right
             
                });
         
         
           });
         
         
         });





//JQueary for switching from type/scan
  
$(document).ready(function(){
    $("#btn").click(function(){
        
        //$("#cam").fadeOut(1000);
        $("#cam").hide("slow");

                
       
        $("#inner").slideUp(1000);
        $("#redline").slideUp(1000);
               
        $("#panel").delay(1000).slideDown(1000);
   
    
    });


     $(".btn2").click(function(){
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
 
 /*
  // Fade through slideshow on main page
  $("#slideshow > div:gt(0)").hide();
  setInterval(function() {
    $('#slideshow > div:first')
      .fadeOut(2000)
      .next()
      .fadeIn(2000)
      .end()
      .appendTo('#slideshow');
  }, 4000);

*/


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
  
        
        
                

// Function that adds product to localstorage and navigates to cart page
//function addCart(id, title, price) {
  //localStorage.setItem(id, JSON.stringify({title: title, price: price}))
  //location.href = 'http://www.haydencoe.co.uk/cart.html';
//}


//TRIAL STUFF***************************************************************************************************


//function stopCamFunction() {  //button click "Stop"
	
//alert("Hello! I am an alert box!!");
//var localStream;

//localStream.getTracks().forEach(function(track) { track.stop() }) //Stops the camera stream

	
var MediaStream = window.MediaStream;

if (typeof MediaStream === 'undefined' && typeof webkitMediaStream !== 'undefined') {
    MediaStream = webkitMediaStream;
}

/*global MediaStream:true */
if (typeof MediaStream !== 'undefined' && !('stop' in MediaStream.prototype)) {
    MediaStream.prototype.stop = function() {
        this.getAudioTracks().forEach(function(track) {
            track.stop();
        });

        this.getVideoTracks().forEach(function(track) {
            track.stop();
        });
    };
}
	

	
}  //end function


function myFunction() {  //button click "Start"
  
  
      
    
    //    alert("Hello! I am an alert box!!");
       
        var localStream;

        var sound = new Audio("barcode.wav");

        var video = document.querySelector('video');
        var canvas = document.querySelector('canvas');
        var ctx = canvas.getContext('2d');
        var localMediaStream = null;
        var list = document.querySelector('ul#decoded');
        
        var lists = document.querySelector('ul#decodeders');
        
        
        
        
        //When a barcode has been scanned 
        
        var worker = new Worker('zbar-processor.js');
        worker.onmessage = function(event) {
            if (event.data.length == 0) return;
            var d = event.data[0];
            var entry = document.createElement('li');
            entry.appendChild(document.createTextNode(d[2] + ' (' + d[0] + ')'));
            list.appendChild(entry);
            sound.play(); //Plays 'beep' noise
        

            localStream.getTracks().forEach(function(track) { track.stop() }) //Stops the camera stream
            
           
            
            // Statement to work who has been scanned
            if (event.data == "CODE-39,,309219")  
            {
	        
	           var name = "Hayden Coe";
               var entrys = document.createElement('li');
               entrys.appendChild(document.createTextNode(name));
               lists.appendChild(entrys);

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
           
           
           
           // Statement to work who has been scanned
            if (event.data == "CODE-39,,271592")  
            {
	        
	           var name = "Kieran Brown";
               var entrys = document.createElement('li');
               entrys.appendChild(document.createTextNode(name));
               lists.appendChild(entrys);

                //Part to unhide the right timetable HNC2Timetable
                var item = document.getElementById('HND2Timetable');
                if (item) 
                {
                  item.className=(item.className=='hidden')?'unhidden':'hidden';
                }
            
                var item = document.getElementById('emptyTimetable');
                if (item) 
                {
                  item.className=(item.className=='hidden')?'unhidden':'hidden';
                }
            
            
            }//end of if statement 

           
             // Statement to work who has been scanned
            if (event.data == "CODE-39,,308401")  
            {
	        
	           var name = "Sam Price";
               var entrys = document.createElement('li');
               entrys.appendChild(document.createTextNode(name));
               lists.appendChild(entrys);

                //Part to unhide the right timetable HNC2Timetable
                var item = document.getElementById('HND2Timetable');
                if (item) 
                {
                  item.className=(item.className=='hidden')?'unhidden':'hidden';
                }
            
                var item = document.getElementById('emptyTimetable');
                if (item) 
                {
                  item.className=(item.className=='hidden')?'unhidden':'hidden';
                }
            
            
            }//end of if statement 

              // Statement to work who has been scanned
            if (event.data == "CODE-39,,312825")  
            {
	        
	           var name = "Steven Trevor ";
               var entrys = document.createElement('li');
               entrys.appendChild(document.createTextNode(name));
               lists.appendChild(entrys);

                //Part to unhide the right timetable HNC2Timetable
                var item = document.getElementById('HND2Timetable');
                if (item) 
                {
                  item.className=(item.className=='hidden')?'unhidden':'hidden';
                }
            
                var item = document.getElementById('emptyTimetable');
                if (item) 
                {
                  item.className=(item.className=='hidden')?'unhidden':'hidden';
                }
            
            
            }//end of if statement 

           
           
           // Statement to work out who has been scanned 
            if (event.data == "CODE-39,,273051")  
            {
	        
	            var name = "Patrick Scott";
                var entrys = document.createElement('li');
                entrys.appendChild(document.createTextNode(name));
                lists.appendChild(entrys);

                //Part to unhide the right timetable HND2Timetable      
                var item = document.getElementById('HND2Timetable');
                if (item) 
                {
                  item.className=(item.className=='hidden')?'unhidden':'hidden';
                }
           
                var item = document.getElementById('emptyTimetable');
                if (item) 
                {
                  item.className=(item.className=='hidden')?'unhidden':'hidden';
                }

	            
            }//end of if statement 

           
          
            }; //End of "Worker" 
            
            

           // window.open("https://www.haydencoe.co.uk/popUp.html"); 
            
           

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
        
        
        

        } //end of myFunction
        
        
        
        function validateForm() {
          var x = document.forms["myForm"]["fname"].value;
          
          if (x == "") 
          {
          alert("Name must be filled out");
          return false;
          }
         
         
         }
         
         
         
         
         
         
         

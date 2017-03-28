function delay() { //function that allows for the animation to finish before allowing the start button to be pressed 
	document.getElementById('startBtn').style.pointerEvents = 'auto';
	document.getElementById('stopBtn').style.pointerEvents = 'auto';
}
$(document).ready(function() { //Main function on load
	$("#scanBtn").addClass("selected");
	document.getElementById('scanBtn').style.pointerEvents = 'none'; //STOP the press of scan while already on scan
	//scan/type divs Animation Stuff..................................................................                  
	$("#typeBtn").click(function() { //type button press = hides away the scan feature and brings down the type feature
		$("#inner").slideUp(500);
		$("#redline").slideUp(500);
		$("#panel").delay(500).slideDown(500);
	});
	$("#scanBtn").click(function() { //scan button press = hides away the typing feature and brings down the scan feature
		$("#panel").slideUp(500);
		$("#inner").delay(500).slideDown(500);
		$("#redline").delay(500).slideDown(500);
		//$("#cam").delay(1000).show("slow");
	});
	//Button Animation Stuff..................................................................                  
	//Type button press
	$("#typeBtn").click(function() {
		//Hide all 4 scan/type/start/stop
		$('#stopBtn').animate({
			'marginLeft': "-=0px" //moves left
		});
		$('#startBtn').animate({
			'marginLeft': "-=108px" //moves left
		});
		$('#scanBtn').animate({
			'marginLeft': "-=110px" //moves left
		});
		$('#typeBtn').animate({
			'marginLeft': "-=110px" //moves left
		});
		//Show the 2 type/scan
		$('#scanBtn').delay(300).animate({
			'marginLeft': "+=0px" //moves right
		});
		$('#typeBtn').delay(300).animate({
			'marginLeft': "+=110px" //moves right
		});
		document.getElementById('stopBtn').style.pointerEvents = 'none'; //Stop the press of start while on type
		document.getElementById('startBtn').style.pointerEvents = 'none'; //Stop the press of start while on type
		document.getElementById('typeBtn').style.pointerEvents = 'none'; //STOP the press of type btn while already on type
		document.getElementById('scanBtn').style.pointerEvents = 'auto'; //ENABLE the press of scan while on type
		//Change over of the yellow ring
		$("#scanBtn").removeClass("selected");
		$("#typeBtn").addClass("selected");
	});
	//Scan button press
	$("#scanBtn").click(function() {
		//Hide the 2 scan/type
		$('#scanBtn').animate({
			'marginLeft': "-=0px" //moves left
		});
		$('#typeBtn').animate({
			'marginLeft': "-=110px" //moves left
		});
		//Show all 4 scan/type/start/stop
		$('#typeBtn').delay(500).animate({
			'marginLeft': "+=110px" //moves right
		});
		$('#scanBtn').delay(700).animate({
			'marginLeft': "+=110px" //moves right
		});
		$('#startBtn').delay(900).animate({
			'marginLeft': "+=110px" //moves right
		});
		document.getElementById('typeBtn').style.pointerEvents = 'auto'; //ENABLE the press of type while on scan
		document.getElementById('scanBtn').style.pointerEvents = 'none'; //STOP the press of scan while already on scan
		setTimeout(delay, 1000);
		//chnage over of the yellow ring
		$("#typeBtn").removeClass("selected");
		$("#scanBtn").addClass("selected");
	});
});
//scan/type divs Animation Stuff..................................................................  
//JQueary for switching from type/scan
$(document).ready(function() {
	$("#typeBtn").click(function() {
		$("#cam").hide("slow");
		$("#inner").slideUp(1000);
		$("#redline").slideUp(1000);
		$("#panel").delay(1000).slideDown(1000);
	});
	$("#scanBtn").click(function() {
		$("#panel").slideUp(1000);
		$("#inner").delay(1000).slideDown(1000);
		$("#redline").delay(1000).slideDown(1000);
		$("#cam").delay(1000).show("slow");
	});
});
//Scrolling down animation ..................................................................   
$(window).scroll(function() {
	// Darken the top navbar when scrolling down
	var scroll = $(window).scrollTop();
	if (scroll >= 50) {
		$(".top-navbar").addClass("dark");
	} else {
		$(".top-navbar").removeClass("dark");
	}
});
//Access to user's media..................................................................  
$(document).ready(function() {});

function getUserMedia(options, successCallback, failureCallback) {
	var api = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
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
//WEB CAM STUFF***************************************************************************************************
function stopCamFunction() { //button click "Stop"
	location.reload();
	document.getElementById('typeBtn').style.pointerEvents = 'auto'; //ENABLE the press of type when web cam is deactivated
} //end stop function
function startCamFunction() { //button click "Start"
	var localStream;
	var sound = new Audio("Sounds/barcode.wav");
	var video = document.querySelector('video');
	var canvas = document.querySelector('canvas');
	var ctx = canvas.getContext('2d');
	var localMediaStream = null;
	//When a barcode has been successfully scanned 
	var worker = new Worker('javaScript/zbar-processor.js'); //points to the seperate js file that stores the barcode information
	worker.onmessage = function(event) {
		if (event.data.length == 0) return;
		var d = event.data[0];
		sound.play(); //Plays 'beep' noise
		// Submit form with name function.
		var str = event.data[0];
		var res = str.slice(-1);
		document.getElementById('sNumber').value = res;
		document.getElementById('pWord').value = "";
		document.getElementById('typeForm').submit();
		localStream.getTracks().forEach(function(track) {
				track.stop()
			}) //Stops the camera stream
	}; //End of "Worker" 
	function snapshot() {
		if (localMediaStream === null) return;
		var k = (320 + 240) / (video.videoWidth + video.videoHeight);
		canvas.width = Math.ceil(video.videoWidth * k);
		canvas.height = Math.ceil(video.videoHeight * k);
		var ctx = canvas.getContext('2d');
		ctx.drawImage(video, 0, 0, video.videoWidth, video.videoHeight, 0, 0, canvas.width, canvas.height);
		var data = ctx.getImageData(0, 0, canvas.width, canvas.height);
		worker.postMessage(data);
	}
	setInterval(snapshot, 500);
	navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
	window.URL = window.URL || window.webkitURL || window.mozURL || window.msURL;
	if (navigator.getUserMedia) {
		navigator.getUserMedia({
			video: true
		}, function(stream) { // successful callback
			localStream = stream;
			if (video.mozSrcObject !== undefined) {
				video.mozSrcObject = stream;
			} else {
				video.src = (window.URL && window.URL.createObjectURL(stream)) || stream;
			}
			localMediaStream = true;
		}, function(error) {
			console.error(error);
		});
	} else {}
	document.getElementById('typeBtn').style.pointerEvents = 'none'; //STOP the press of type while web cam is active
} //end of startCamFunction
//form validation code to ensure all fields are filled out 
function validateForm() {
	var x = document.forms["typeForm"]["sNumber"].value;
	if (x == "") {
		alert("Student I.D. must be filled out");
		return false;
	}
	var y = document.forms["typeForm"]["pWord"].value;
	if (y == "") {
		alert("Password must be entered");
		return false;
	}
}



function showPages(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }

 
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getPages.php?q="+str, true);
  xhttp.send();
}



function showPageContent(val) {
	
	if (val != "") {
		
		var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("content").innerHTML =
		      this.responseText;
		    }
		  };
		  xhttp.open("GET", "getPageContent.php?page="+val, true);
		  xhttp.send();
		
	}
}




function showRanks(str){
	
	if(str !=""){
		
		var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("rank_page").innerHTML =
		      this.responseText;
		    }
		  };
		  xhttp.open("GET", "getRanks.php?menu_id="+str, true);
		  xhttp.send();
		
	}
	
}


function showCourse(str){
	
	if(str !=""){
		
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("editCourse").innerHTML =
					this.responseText;
			}
		};
		xhttp.open("GET", "getCourse.php?course="+str, true);
		xhttp.send();
		
	}else{
		document.getElementById("editCourse").innerHTML = '<div class="alert alert-default" '+
			'style="border: 1px solid #bdc3c7" role="alert" >'+
			'<h4>قم باختيار الكورس الذي ترغب في تعديله اعلاه !!</h4>'+
			  '</div>';
	}
	
}





$(document).ready(function(){
	

	$('.toast').toast('show');

	
 $("#selectPath").change(function(){
	var value = $(this).val();
	 var dataString = "course="+value;
	$.ajax({
		type : "GET",
		url : "getCourseCards.php",
		data: dataString,
		success: function(result){
			$("#showCardsCrs").html(result);
		}

	});
});


	$("#course_select").change(function(){
		var value = $(this).val();
		 var dataString = "course="+value;
		$.ajax({
			type : "GET",
			url : "getPagesIndex.php",
			data: dataString,
			success: function(result){
				$("#showPagesIndex").html(result);
			}
	
		});
	});

	$('#descriptionCourse').keyup(function(){
		$("#count").text($(this).val().length+"/500 ");
	  });




});






//scroll to top


//Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
} 












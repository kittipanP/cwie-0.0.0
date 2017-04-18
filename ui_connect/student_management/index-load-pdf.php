

<script src='../../libs/js/jquery.min.js'></script>
<script type="text/javascript">
	$(function(){
		//$('#btnshow').off().on({
		//	click: function(){
				$('#show_pdf').prop('src', 'load_file.php');
		//		}	
		//	});
		});
</script>

<div class="w3-container">
</div>
<div class="w3-content" style="max-width:800px">
  <iframe id="show_pdf" style="width: 90%; height: 990px;" class="mySlides" ></iframe>
  <iframe id="show_pdf" style="width: 90%; height: 550px;" class="mySlides" ></iframe>
  <iframe id="show_pdf" style="width: 90%; height: 550px;" class="mySlides" ></iframe>
</div>

<div class="w3-center">
  <div class="w3-section">
    <button class="w3-button" onclick="plusDivs(-1)">< Prev</button>
    <button class="w3-button" onclick="plusDivs(1)">Next ></button>
  </div>
  <button class="w3-button demo" onclick="currentDiv(1)">1</button> 
  <button class="w3-button demo" onclick="currentDiv(2)">2</button> 
  <button class="w3-button demo" onclick="currentDiv(3)">3</button> 
</div>

	
    
    
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-red", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-red";
}
</script>


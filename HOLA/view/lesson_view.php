<?php require_once __SITE_PATH . '/view/header1.php'; ?>

<?php
$ime='';
$lesson=0;
foreach( $lessonList as $user )
{ $ime=$user->link; $lesson=$user->id_lesson;?>
  <div class = "name-logo-box" style="background-color: #956ec4;">
    <p1>Lesson <?php echo $user->id_lesson." - ".$user->title."</br>";?></p1>
    <p2><img src="http://www.holaprestamo.es/assets/design/logo.png" style="width: 120px;"></p2>
  </div>
<?php
}
?>
<span id="username"><?php echo $_SESSION['username']; ?></span>
<span id="lesson"><?php echo $lesson; ?></span>

<div class="back">
<a class="goback" href="<?php echo __SITE_URL; ?>/index.php?rt=users">Go back</a>
</div>
</br></br>
<div id="prez" style="position: absolute;">
<iframe src='<?php echo $ime; ?>'
width='650px' height='500px' frameborder='0'>This is an embedded <a target='_blank' href='https://office.com'>Microsoft Office</a> presentation, powered by
<a target='_blank' href='https://office.com/webapps'>Office Online</a>.</iframe>
</div>
</br>
<div class="box2">
  <p3>Start a quiz</p3>
  <div class="button"><a href='<?php echo __SITE_URL."/index.php?rt=kviz";?>'>Start quiz</a></div>
  <p4><img src="http://www.anallianceforlife.com/wp-content/uploads/2015/10/Larry-Pointing-Up-211x300.png" style="width: 30%; position: absolute; top:50%; left: 10%;"></p4>
</div>
</br></br></br></br></br></br></br></br></br></br></br>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div><div class="space"></div>
</br>
<div class="box3">
  <img src="https://userscontent2.emaze.com/images/afde1a9d-06dc-4180-80d7-1250f40db29e/4082af98787f1210981a06046800d67e.png" style="padding-left: 10%; width:80%; height:50%;">
  <!--<p3>Discussion box:</p3>-->
  <p style="color:#7e4eb6; padding-left: 10%; font-size: 25px; ">What's on your mind? <input type="text" id="diss"style="width:84%; height:50px;"/>
  <button type="submit" class="send" onclick="sendComment()">Send</button></p>
</br>
  <table>
		<?php
			foreach( $discussionList as $user )
			{?>
				<tr style="background-color: white;">
					<td><p><?php  echo '@'.$user->id_user.' -  '.$user->date."</br>".$user->text;?></p>
					</td>
				</tr>
			<?php }
		?>
	</table>
</div>
<div class="space1"></div>

<script>
	function sendComment() {
		console.log("click");
		$.ajax({
			url: '<?php echo __SITE_URL;?>/view/addComment.php',
			dataType: 'text',
			data: {
				text: $("#diss").val(),
				id_user: '<?php echo $_SESSION['username']; ?>',
				id_lesson: <?php echo $lesson;?>
			},                         
			success: function(php_script_response){
				location.reload();
			}
		 });
	}
</script>

<script>/*
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}*/
</script>
<script>
var i=0;
$( document ).ready( function(){
$("#username").hide();
$("#lesson").hide();
 $(".button").click(function(){
   localStorage.setItem( "username", $("#username").html());
   localStorage.setItem("lesson_begin",$("#lesson").html());
   localStorage.setItem("lesson_end",$("#lesson").html());
 });
  povecaj();
});

function povecaj(){
  if(i===0){
    var button1=$("#btn0");
    button1.css("padding-top","25px");
    button1.css("padding-bottom","25px");
    button1.css("padding-left","40px");
    button1.css("padding-right","40px");
    button1.css("background-color","LawnGreen");
    button1.css("font-size","18px");
    i=1;
    setTimeout(povecaj,400);
  }else{
    i=0;
    var button1=$("#btn0");
    button1.css("padding-top","20px");
    button1.css("padding-bottom","20px");
    button1.css("padding-left","30px");
    button1.css("padding-right","30px");
    button1.css("background-color","#32CD32");
    button1.css("font-size","16px");
    button1.css("font-size","16px");
    setTimeout(povecaj,400);
  }
}
</script>
<?php require_once __SITE_PATH . '/view/__footer.php'; ?>

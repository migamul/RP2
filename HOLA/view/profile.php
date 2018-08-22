<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<meta charset="utf8">
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
}

/* Style the header */
.header {
    padding: 5px;
    font-size: 20px;
    text-align: center;
    background: #956ec4;
    color: white;
}

/* Increase the font size of the h1 element */
.header h1 {
    font-size: 40px;
}

/* Style the top navigation bar */
.navbar {
    overflow: hidden;
    background-color: #333;
}

/* Style the navigation bar links */
.navbar a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
}

/* Right-aligned link */
.navbar a.right {
    float: right;
}

/* Change color on hover */
.navbar a:hover {
    background-color: #ddd;
    color: black;
}

/* Column container */
.row {
    display: flex;
    flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
    flex: 30%;
    background-color: #f1f1f1;
    padding: 20px;
}

/* Main column */
.main {
    flex: 70%;
    background-color: white;
    padding: 20px;
}

/* Fake image, just for this example */
.fakeimg {
    background-color: #aaa;
    width: 70%;

}

/* Footer */
.footer {
    padding: 20px;
    text-align: center;
    background: #ddd;
}
.send
{
	background-color: #956ec4;
	border: none;
	color: white;
	padding: 10px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	border-radius: 50px;
	margin: 2px 2px;
	position: absolute;
	right: 7%;
}
.goback
{
    background-color: #956ec4;
    border: solid black 1px;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 50px;
    margin: 2px 2px;
    cursor: pointer;
    position: absolute;
    left: 0px;
		top:15px;
}

</style>
</head>
<body>

<div class="header">
  <p><div class="back">
	<a class="goback" href="<?php echo __SITE_URL; ?>/index.php?rt=users">Go back</a>
	</div>My profile</p>
</div>
<?php
$image='';
$o_meni='';
$kontakt='';
$user='';
$score='';
$level='';
 foreach ($profilList as $profil){
   $image=$profil->image;
   $o_meni=$profil->title;
   $kontakt=$profil->link;
	 $user=$profil->user;
	 $score=$profil->score;
	 $level=$profil->level;
 }

 $authorized = false;
 if ($_SESSION['username'] === $user) {
	$authorized = true;
 }
 ?>

<div class="row">
  <div class="side">
      <h2><?php echo $user;?></h2>
      <h5>Photo of me:</h5>
      <div class="fakeimg" style="height:200px;"><img src="<?php echo __SITE_URL.$image;?>" style="width: 100%; height:100%;"/></div>

	  <?php if($authorized) { ?>
		  <input id="picture" type="file" name="pic" />
		  <button id="upload">Upload</button>
	  <?php } ?>


      <h3>Contact me:</h3>
      <p><?php echo $kontakt; ?></p>

  </div>
  <div class="main">
      <h2>Game stats:</h2>
			<p>My score: <?php echo $score; ?></p>
			<p>On level: <?php echo $level; ?></p>
		</br>
      <h2>About me:</h2>
      <p><?php echo $o_meni;?></p>
      <?php if($authorized) { ?>
	  <p>Tell the world about yourself:<input type="text" id="about" style="width:60%; height:50px; border-radius: 10px;"/>
			<button type="submit" class="send" id="btnAboutMe" onclick="addAboutMe()">Send</button></p>
	  <?php } ?>

      </div>
</div>

<script>
	function addAboutMe() {
		console.log("click");
		$.ajax({
			url: '<?php echo __SITE_URL;?>/view/aboutMe.php',
			dataType: 'text',
			type: 'post',
			data: {
				text: $("#about").val(),
				username: '<?php echo $_SESSION['username']; ?>',
			},
			success: function(php_script_response){
				location.reload();
			}
		 });
	}
</script>

<div class="footer">
  <h2><img src="http://www.holaprestamo.es/assets/design/logo.png" style="width: 120px;"></h2>
</div>

</body>


<script>
    $( document ).ready(function() {
        $('#upload').on('click', function() {
            console.log("click");
            var file_data = $('#picture').prop('files')[0];
            var form_data = new FormData();
            form_data.append('fileToUpload', file_data);
            form_data.append('new_name', '<?php echo $user;?>');
            $.ajax({
                url: '<?php echo __SITE_URL;?>/upload/upload.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(php_script_response){
                    alert(php_script_response);
                    location.reload();
                }
             });
        });
    });
</script>

</html>

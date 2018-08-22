<?php require_once __SITE_PATH . '/view/_header.php';
 ?>
<div class="helloo">
<?php foreach ($userList as $user)
{
    $lesson_end=$user->id_lesson;
    echo "Hello ".$user->username."!";
}
?></div>
      <div class="score">
      <div class="hello">
        Your score: </div>
      </br>
        <img src="https://www.shareicon.net/data/256x256/2015/09/22/104982_success_256x256.png" style="height:350px; width:400px;">
        <!--<div class="uslici">-->
        <?php foreach ($userList as $user)
        {
            if($user->score>=0 && $user->score<10)
            {
              ?>
              <div class="one">
              <?php
              echo $user->score;
            }?>

          <?php
            if($user->score>=10 && $user->score<100)
            {
              ?>
              <div class="two">
              <?php
              echo $user->score;
            }?><?php
            if($user->score>=100 && $user->score<1000)
            {
              ?>
              <div class="three">
              <?php
              echo $user->score;
            }?><?php
            if($user->score>=1000){
              ?>
              <div class="else">
              <?php
              echo $user->score;
            }?><?php
        }
        ?>
      </div>
      </div>
      </br>
    </br>
  </br>
        <div class="rank">
          <div class="hello">Rankings: </div></br>
        <a href="<?php echo __SITE_URL; ?>/index.php?rt=users/leaderboard">
            <img src="http://fereshtegansch.com/files/3a61af9e-af00-40b7-9c5f-e82a6ea01a1c.png" style="height: 200px; width:200px;" ></a>

   </br></br>
    <div class="rankings"><button id="practice"><img src="<?php echo __SITE_URL; ?>/view/practice.png" style="height: 35px; float:left;"/>PRACTICE </button></div>
  </div>


      <div class="categ-box">
        <ul class="opr">

          <?php foreach ($lessonList as $list)
            {?>
              <li><a href="<?php echo __SITE_URL; ?>/index.php?rt=users/lesson/smijes=<?php echo $list->locked; ?>/niz=<?php echo $list->id_lesson;?>">
                <img src=<?php echo __SITE_URL.$list->image; ?> alt="Avatar" class="avatar"></br><?php echo $list->title; ?></a></br></li>
            <?php
            }?>
      </ul>
    </div>
<script>
$(document).ready(function(){
  $("#practice").click(posalji);
});

function posalji(){
  console.log("unutra sam");
  var user="<?php echo $_SESSION['username']; ?>";
  var lesson=<?php echo $lesson_end; ?>;
  localStorage.setItem( "username", user);
  localStorage.setItem("lesson_begin","1");
  localStorage.setItem("lesson_end",lesson);
  document.location.href="<?php echo __SITE_URL; ?>"+"/kviz.php";
}
</script>
<?php require_once __SITE_PATH . '/view/__footer.php'; ?>

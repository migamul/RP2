<?php require_once __SITE_PATH . '/view/__header.php'; ?>

<form method="post" action="<?php echo __SITE_URL; ?>/index.php?rt=login/provjeri">

  <div class="materialContainer">
     <div class="box">
        <div class="title">LOGIN</div>

        <div class="input">
           <label for="name">Username</label>
           <input type="text" name="username" id="name">
           <span class="spin"></span>
        </div>

        <div class="input">
           <label for="pass">Password</label>
           <input type="password" name="password" id="pass">
           <span class="spin"></span>
        </div>

        <div class="button login">
           <button><span>LOG IN</span> <i class="fa fa-check"></i></button>
        </div>
      </form>


      <form method="post" action="<?php echo __SITE_URL; ?>/index.php?rt=login/provjeri2">

     </div>
     <div class="overbox">
         <div class="material-button alt-2"><span class="shape"></span></div>

         <div class="title">REGISTRATION</div>

         <div class="input">
            <label for="regname">Username</label>
            <input type="text" name="username" id="regname">
            <span class="spin"></span>
         </div>

         <div class="input">
            <label for="regpass">Password</label>
            <input type="password" name="password" id="regpass">
            <span class="spin"></span>
         </div>

         <div class="input">
            <label for="reregpass">E-mail</label>
            <input type="text" name="email" id="reregpass">
            <span class="spin"></span>
         </div>

         <div class="button">
            <button><span>SIGN UP</span></button>
         </div>
       </div>

</div>

<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script src="<?php echo __SITE_URL;?>/javascript/login.js"></script>

</form>

<?php require_once __SITE_PATH . '/view/__footer.php'; ?>

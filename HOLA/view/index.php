<?php define( '__SITE_URL', dirname( $_SERVER['PHP_SELF'] ) );
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hola - introduction</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <style>
    body{
      margin: 0px;
    }
    #zaglavlje{
      background-color: #956ec4;
      margin-bottom: 0px;
      padding-top: 1%;
      padding-bottom: 1%;
      color: white;
    }
    div p#naziv{
      margin-left: 2%;
      font-size: 30px;
      margin-top: 0px;
      margin-bottom: 0px;
      padding-top: 15px;
    }
    #example1 {
        background-image: url(nova.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        padding-bottom: 5%;
        background-color: white;
        height: 450px;
        margin-top: 0px;
        padding-top: 0px;
        background-position: center;
        text-align: center;

    }
    #btn0{
      background-color: #32CD32;
      border: none;
      padding-top: 20px;
      padding-bottom: 20px;
      padding-left: 40px;
      padding-right: 40px;
      border-radius: 50px;
      color: white;
      margin-top: 35%;
      font-weight: bold;
      font-size: 16px;
     }
     #btn1{
       background-color: #32CD32;
       border: none;
       padding-top: 20px;
       padding-bottom: 20px;
       padding-left: 40px;
       padding-right: 40px;
       border-radius: 50px;
       color: white;
       font-weight: bold;
      font-size: 16px;

      }
     #text{
       font-size: 50px;
       font-family: 'Varela Round', sans-serif;
       color: black;
       font-weight: bold;
     }
     #nekaj{

     }
     #ispod{
       font-size: 24px;
     }
     #example2,#example4{
       display: inline;
       margin-left: 5%;
     }
     #example3, #example4{
       display: inline;
     }
     #about1, #about3{
       font-size: 20px;
       padding-top: 2%;
       padding-bottom: 2%;
     }
     #sjednestr,#sjednestr2{
       display: inline-block;
     }
     #sdrugestr,#sdrugestr2{
       display: inline-block;
     }
     #about2, #about4{
       font-size: 20px;
       padding-top: 3%;
       padding-bottom: 2%;

     }
     #sjednestr1,#sjednestr3{
       display: inline-block;

     }
     #sdrugestr1, #sdrugestr3{
       display: inline-block;
       width: 40%;
       margin-left: 5%;
     }
     #kraj{
       background-color: #956ec4;
       text-align: center;
       font-size: 30px;
       font-family: 'Varela Round', sans-serif;
      color: white;
      height: 300px;
     }
     ul li{
       display: inline;
     }
   </style>
    </head>
    <body>
    <div id="zaglavlje">
     <p id="naziv"><img src="http://www.holaprestamo.es/assets/design/logo.png" style="width: 100px;">
     </p>
    </div>
    <div id="example1">

      <form method="post" action="<?php echo __SITE_URL; ?>/../index.php?rt=login">
      	<button id="btn0" type="submit">Get started >></button>
      </form>
    </div>
  </br>
</br>
    <div id="example2">
      <div id="sjednestr">
        <h2 style="font-family: 'Varela Round', sans-serif; font-size: 30px; padding-top:2%;">About the course</h2>
        <p id="about1">Learning with Hola is fun and addictive. Earn points for  </br>
                     correct answers, race against the clock, and level up.Our  </br>
                     bite-sized lessons are effective and we have proof that it works.  </p>
        </br>
      </br>
    </br>
      </div>
      <div id="sdrugestr">
        <img src="1..png" class="slikica1" style="width: 70%; height:80%; padding-left: 25%;">
      </div>
    </div>

    <div id="example3">
      </br>
      </br>
      <div id="sdrugestr1">
        <img src="2..png" class="slikica2" style="width: 80%; height:80%; padding-left: 10%;opacity: 0.8;padding-bottom: 0px;">
      </div>
      <div id="sjednestr1" style="padding-left:12%;">
        <h2 style="font-family: 'Varela Round', sans-serif; font-size: 30px; padding-top:2%; ">About the Spanish</h2>
        <p id="about2">Spoken in 21 countries, many with beautiful beaches and ancient</br>
                       cultures, Spanish is one of the most important languages</br>
                       in the western hemisphere and the third most spoken language in</br>
                       the world. On Hola, you'll learn a version of Spanish closer</br>
                       to what you'd hear in Latin America than in Spain,but the differences</br>
                       are relatively small and everybody will be able to understand you.</p>
      </div>
    </br>
  </br>
    </div>
    <h2 style="font-family: 'Varela Round', sans-serif; font-size: 30px; padding-top:2%; margin-left:5%; color: #956ec4">Why you should use Hola?</h2>
    <div id="example4">
      <div id="sjednestr2">
        <h2 style="font-family: 'Varela Round', sans-serif; font-size: 30px; padding-top:2%;">Get better job opportunities</h2>
        <p id="about3">Speaking languages improves your resume and gives you the key</br>
                       for the job market. Some studies demonstrated that speaking a second</br>
                       language offers access to more than 70% of job offers.</p>
        </br>
      </br>
    </br>
      </div>
      <div id="sdrugestr2">
        <img src="3..png" class="slikica3" style="width: 80%; height:80%; padding-left: 27%;">
      </div>
    </div>
    <div id="example4">
      </br>
      </br>
      <div id="sdrugestr3">
        <img src="fast.png" class="slikica4" style="width: 60%; height:50%; padding-left: 10%;padding-bottom: 0px;">
      </div>
      <div id="sjednestr3" style="padding-left:12%;">
        <h2 style="font-family: 'Varela Round', sans-serif; font-size: 30px; padding-top:2%;">Learn faster</h2>
        <p id="about4">Hola is your made-to-measure, intelligent teacher who</br>
                       uses artificial intelligence to adapt the course to your level,</br>
                       progress, and motivation to personalise your learning experience.</br>
                       Hola helps you to progress faster,your course will be focused on</br>
                       your requirements.
                       </p>
      </div>
    </br>
  </br>
    </div>

    <footer>
      <div id="kraj">
      </br>
        <p id="zavrsna_poruka" style="padding-top: 2%;">What are you waiting for?</p>
        <p style="font-size: 20px;"> Over 30 million people are already learning a language on Hola. Join them now! </p>
       <form method="post" action="<?php echo __SITE_URL; ?>/../index.php?rt=login">
        	<button id="btn1" type="submit">Get started >></button>
	      </form>
      </br>
      </div>
        <div id="social" style="color:white; margin: 0px;background-color:black; padding-top: 2px;font-size: 15px;">
          <ul id="lista" style="text-align: right; list-style-type: none; margin-top: 5px;">
            <li>Contact us: </li>
            <li><a href="https://www.twitter.com"><img src="twi.png" style="width: 2%;"></a></li>
            <li><a href="https://www.facebook.com"><img src="face.png" style="width: 2%;"></a></li>
            <li><a href="https://www.google.com"><img src="google.png" style="width: 2%;"></a></li>
          </ul>
         <p style="text-align: center; margin-bottom: 0px;">Copyright @Hola. Your website 2018.</p>
       </div>

    </footer>
    <script>
    var i=0;
$( document ).ready( function(){

      povecaj();
    });

    function povecaj(){
      if(i===0){
        var button1=$("#btn0");
        var button2=$("#btn1");
        console.log(button1.prop("id"));
        button1.css("padding-top","25px");
        button1.css("padding-bottom","25px");
        button1.css("padding-left","40px");
        button1.css("padding-right","40px");
        button1.css("background-color","LawnGreen");
        button1.css("font-size","18px");
        button2.css("font-size","18px");
        button2.css("padding-top","25px");
        button2.css("padding-bottom","25px");
        button2.css("padding-left","40px");
        button2.css("padding-right","40px");
        button2.css("background-color","LawnGreen");
        i=1;
        setTimeout(povecaj,400);
      }else{
        i=0;
        var button1=$("#btn0");
        var button2=$("#btn1");
        button1.css("padding-top","20px");
        button1.css("padding-bottom","20px");
        button1.css("padding-left","30px");
        button1.css("padding-right","30px");
        button1.css("background-color","#32CD32");
        button1.css("font-size","16px");
        button1.css("font-size","16px");
        button2.css("padding-top","20px");
        button2.css("padding-bottom","20px");
        button2.css("padding-left","30px");
        button2.css("padding-right","30px");
        button2.css("background-color","#32CD32");
        setTimeout(povecaj,400);
      }
    }
    </script>
    </body>
</html>

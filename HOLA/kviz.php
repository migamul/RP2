
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="jquery.ml-keyboard.min.js"></script>
		<link rel="stylesheet" href="jquery.ml-keyboard.css">
		<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<style>
body{
	background-color: #eeeeee;
}
div#wrapper{
	text-align: center;
	border: 2px solid #956ec4;
	margin-top: 2%;
	margin-left: 7%;
	margin-right: 7%;
  height: 600px;
	background-color: white;
	box-shadow: 10px 15px 5px #cbcbcb;
	position: relative;
}
div#taskImage{
	margin-top: 40px;
}
div#divImage{

	height: 200px;
	text-align: center;

}

div#div1Image{

	height: 200px;
	text-align: center;

}
div#result_image{

	height: 200px;
	text-align: center;

}
div#divImage1{
	border: 2px solid #eeeeee;
	height: 200px;
	text-align: center;
	background-color: #eeeeee;
	margin-right: 3%;
}

div#divImage2{
	background-color: #eeeeee;
	height: 200px;
	margin-right: 3%;
	text-align: center;
	border: 2px solid #eeeeee;

}

div#divImage3{

	height: 200px;
	background-color: #eeeeee;
	text-align: center;
	border: 2px solid #eeeeee;

}

div#correct_answer{
	position: absolute;
	bottom: 0px;
	width: 100%;
	height: 100px;
	background-color: #eeeeee;

}

div#correct_image{
	height: 80px;
	display: inline;
	margin-left: 5px;
	margin-top: 10px;
}
div#correct_response{
	padding-left: 5px;
	font-size: 19px;
  float: left;
	font-family: cursive;
	display: inline;
}


#spSentence1, #spSentence2, #spSentence3, #spSentence4,#spImage1,#spImage2,#spImage3,#spImage4, #gapOption1, #gapOption2, #gapOption3, #gapOption4 {
    background-color: #eeeeee;
		width: 200px;
    font-size: 16px;
    color: #5A6772;
    border: 1px solid darkgrey;
    padding: 10px 10px;
		margin-top: 2px;
}

#spSentence1:hover, #spSentence2:hover, #spSentence3:hover, #spSentence4:hover,#spImage1:hover, #spImage2:hover,#spImage3:hover,#spImage4:hover,#gapOption1:hover, #gapOption2:hover, #gapOption3:hover, #gapOption4:hover{
    cursor: pointer;
    background-color: #956ec4;
    color: white;
}
#next_button{
  padding: 10px 10px;
	margin-top: 30px;
	margin-right: 5px;
	width: 150px;
	background-color: darkgray;
	border: none;
	color: lightgray;
	font-weight: bold;
	border-radius: 50px;
	display: inline;
}



#question1{
	font-family: cursive;
	font-size: 20px;
	padding-bottom: 15px;
}
#enImage{
	font-family: cursive;
	font-size: 20px;
	padding-bottom: 15px;
  padding-top: 10px;
}

#enImages3{
	font-family: cursive;
	font-size: 20px;
	padding-bottom: 60px;
  padding-top: 40px;
}

#question2{
	font-family: cursive;
	font-size: 20px;
	padding-bottom: 60px;
	padding-top: 20px;
}
#result_message{
	font-family: cursive;
	font-size: 30px;
	padding-bottom: 15%;
	padding-top: 20px;
}

#question3{
	font-family: cursive;
	font-size: 20px;
	padding-bottom: 40px;
	padding-top: 20px;
}
#enSentence{
	font-family: cursive;
	font-size: 18px;
	padding-bottom: 20px;
  color: #956ec4;
}
#enFillIn{
	color: #956ec4;

	font-size: 18px;
	padding-bottom: 10px;

}
#gapSentence{

	font-size: 18px;
	padding-bottom: 20px;

}

#btnConfirm{
	background-color: darkgray;
	border: none;
	color: white;
	border-radius: 50px;
	padding: 5px 10px;
	width: 80px;

}
#btnGapConfirm{
	background-color: #32CD32;
	border: none;
	color: white;
	border-radius: 50px;
	padding: 5px 10px;
	width: 80px;

}
</style>
	</head>

	<body>

		<div id="wrapper">

			<div id="taskImage">
				<p id="question1">Write in <span style="color: #956ec4;" >spanish</span>. Who is in the picture?</p>
				<div id="divImage"></div> <br>
				<input type="hidden" id="imgCorrect">
				<input type="text" name="imageInput" id="answerImage"><br><br>
				<button type="button" id="btnConfirm">Confirm</button>
				<a href='#' id="btnTrigger" class="btn btn-default"><i class="glyphicon glyphicon-font"></i></a>
			</div>


			<div id="taskImage3">
				<p id="enImages3"></p>
				<input type="hidden" id="imgCorrect3">
				<div id="spImages3">
					<div id="divImage1" style="display: inline-block;"><div id="bas_img1"></div><div id="bas_radio1"></div></div>
					<div id="divImage2" style="display: inline-block;"><div id="bas_img2"></div><div id="bas_radio2"></div></div>
					<div id="divImage3" style="display: inline-block;"><div id="bas_img3"></div><div id="bas_radio3" ></div></div>
				</div>
			</div>


			<div id="taskSelectSentence">
				<p id="question2">How to write the next sentence in spanish?</p>
				<p id="enSentence"></p>
				<input type="hidden" id="selCorrect">
				<div id="spSentences">
					<button type="button" id="spSentence1"></button><br>
					<button type="button" id="spSentence2"></button><br>
					<button type="button" id="spSentence3"></button><br>
					<button type="button" id="spSentence4"></button>
				</div>
			</div>

			<div id="taskSelectImage">
				<p id="enImage"></p>
				<div id="div1Image"></div> <br>
				<input type="hidden" id="imageCorrect">
				<div id="spImages">
					<button type="button" id="spImage1"></button><br>
					<button type="button" id="spImage2"></button><br>
					<button type="button" id="spImage3"></button><br>
					<button type="button" id="spImage4"></button>
				</div>
			</div>

			<div id="taskGap">
				<p id="question3">What missing?</p>
				<p id="enFillIn"></p>
				<p id="gapSentence"></p>
				<input type="hidden" id="missing">
				<input type="hidden" id="gapCorrect">
				<input type="hidden" id="fullCorrect">
				<div id="gapWords">
					<button type="button" id="gapOption1"></button><br>
					<button type="button" id="gapOption2"></button><br>
					<button type="button" id="gapOption3"></button><br>
					<button type="button" id="gapOption4"></button>
				</div><br>
				<button type="button" id="btnGapConfirm">Confirm</button>
			</div>
			<div id="correct_answer">
				<div id="correct_image" style="float: left;"></div>
				<div id="correct_response"></div>
				<button id="next_button" style="float: right;">Next!</button>
			</div>
			<div id="result"><div id="result_message"></div><div id="result_image"></div></div>

		</div>
	</body>

	<script>
		var currentQuestion = 1;
		var correctCounter = 0;

		function ImgTask(obj) {
			this.path = obj.path;
			this.answer = obj.answer;
		}

		function runImageTask(task) {
			$("#divImage").html('<img src="' + task.path + '" alt="image" style="height: 200px;">');
			$("#imgCorrect").val(task.answer);
			$("#taskImage").show();
		}



		function shuffle(a) {
			var j, x, i;
			for (i = a.length - 1; i > 0; i--) {
				j = Math.floor(Math.random() * (i + 1));
				x = a[i];
				a[i] = a[j];
				a[j] = x;
			}
			return a;
		}

		function shuffle1(a,b) {
			var j, x, i,y;
			for (i = a.length - 1; i > 0; i--) {
				j = Math.floor(Math.random() * (i + 1));
				x = a[i];
				a[i] = a[j];
				a[j] = x;
				y=b[i];
				b[i]=b[j];
				b[j]=y;
			}
			return a;
		}

		function SelTask(obj) {
			this.enSentence = obj.enSentence;
			this.correct = obj.correct;

			this.options = [];
			this.options.push(this.correct);
			this.options.push(obj.spSentence2);
			this.options.push(obj.spSentence3);
			this.options.push(obj.spSentence4);

			shuffle(this.options);
		}

		function runSelectTask(task) {
			$("#enSentence").html('"'+task.enSentence+'"');
			$("#spSentence1").html(task.options[0]);
			$("#spSentence2").html(task.options[1]);
			$("#spSentence3").html(task.options[2]);
			$("#spSentence4").html(task.options[3]);

			$("#selCorrect").val(task.correct);
			$("#taskSelectSentence").show();
		}


//ovoooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo
		function ImgOptionTask(obj) {
			this.enImage = obj.enImage;
			this.correct = obj.correct;
			this.path=obj.path;
			this.options = [];
			this.options.push(this.correct);
			this.options.push(obj.spImage2);
			this.options.push(obj.spImage3);
			this.options.push(obj.spImage4);

			shuffle(this.options);
		}

		function runSelectImageTask(task) {
			$("#enImage").html('Select word for '+'<span style="color: #956ec4;">"'+task.enImage+'"</span>');
			$("#div1Image").html('<img src="' + task.path + '" alt="image" style="height: 200px;">');
			$("#spImage1").html(task.options[0]);
			$("#spImage2").html(task.options[1]);
			$("#spImage3").html(task.options[2]);
			$("#spImage4").html(task.options[3]);

			$("#imageCorrect").val(task.correct);
			$("#taskSelectImage").show();
		}

//ovoooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo
function ImgTask3(obj) {
	this.enImages3 = obj.enImages3;
	this.correct = obj.correct;

	this.options = [];
	this.options.push(obj.path1);
	this.options.push(obj.path2);
	this.options.push(obj.path3);
  this.options1=[];
	this.options1.push(obj.spa1);
	this.options1.push(obj.spa2);
	this.options1.push(obj.spa3);
	shuffle1(this.options,this.options1);
}

function runImgTask3(task) {
	$("#enImages3").html('Select word for '+'<span style="color: #956ec4;">"'+task.enImages3+'"</span>');

	$("#bas_img1").html('<img src="' + task.options[0] + '" alt="image" style="height: 150px; background-color: white; 	margin: 5px 5px;">');
	$("#bas_radio1").html('<input type="radio" id="'+task.options1[0]+'"/> '+task.options1[0]);
	$("#bas_img2").html('<img src="' + task.options[1] + '" alt="image" style="height: 150px; background-color: white; margin: 5px 5px;">');
	$("#bas_radio2").html('<input type="radio"  id="'+task.options1[1]+'"/> '+task.options1[1]);

	$("#bas_img3").html('<img src="' + task.options[2] + '" alt="image" style="height: 150px; background-color: white; margin: 5px 5px;">');
  //$("#spImages3").css("display","inline-block");
	$("#bas_radio3").html('<input type="radio"  id="'+task.options1[2]+'"/> '+task.options1[2]);

	$("#imgCorrect3").val(task.correct);
	$("#taskImage3").show();
}


		function GapTask(obj) {
			this.enFillIn = obj.enSentence;
			this.fullCorrect = obj.spSentence;
			this.gapSentence = obj.missing;
			this.correct = obj.correct;
			this.option1 = obj.option1;
			this.option2 = obj.option2;
			this.option3 = obj.option3;
			this.option4 = obj.option4;
		}

		function runGapTask(task) {
			$("#enFillIn").html(task.enFillIn);
			$("#gapSentence").html(task.gapSentence);
			$("#gapCorrect").val(task.correct);
			$("#missing").val(task.gapSentence);
			$("#fullCorrect").val(task.fullCorrect);

			$("#gapOption1").html(task.option1);
			$("#gapOption2").html(task.option2);
			$("#gapOption3").html(task.option3);
			$("#gapOption4").html(task.option4);

			$("#taskGap").show();
		}

		var imgTasks = [];
		var imgTasks3 = [];
		var selTasks = [];
		var gapTasks = [];
		var selImgTasks=[];

		function Quiz(lvlFrom, lvlTo) {
			this.lvlFrom = lvlFrom;
			this.lvlTo = lvlTo;

			this.initialize();
		}

		Quiz.prototype.initialize = function() {
			$.ajax(
				{
					url: "methods.php",
					dataType: "json",
					data:
					{
						lvlFrom : this.lvlFrom,
						lvlTo : this.lvlTo
					},
					success: function( data )
					{
						if( typeof( data.error ) === "undefined" )
						{
							for(let i = 0; i < data.imgTasks.length; ++i) {
								let task = new ImgTask(data.imgTasks[i]);
								imgTasks.push(task);
							}

							for(let i = 0; i < data.imgTasks3.length; ++i) {
								let task = new ImgTask3(data.imgTasks3[i]);
								imgTasks3.push(task);
							}

							for(let i = 0; i < data.selTasks.length; ++i) {
								let task = new SelTask(data.selTasks[i]);
								selTasks.push(task);
							}

							for(let i = 0; i < data.selImgTasks.length; ++i) {
								let task = new ImgOptionTask(data.selImgTasks[i]);
								selImgTasks.push(task);
							}

							for(let i = 0; i < data.gapTasks.length; ++i) {
								let task = new GapTask(data.gapTasks[i]);
								console.log(task);
								gapTasks.push(task);
							}
						}

						startQuiz();

					},
					error: function( xhr, status )
					{
					}
				} );
		}

		function hideAll() {
				$("#taskImage").hide();
				$("#taskSelectSentence").hide();
				$("#taskSelectImage").hide();
				$("#taskImage3").hide();
				$("#taskFillIn").hide();
				$("#btnConfirm").attr("disabled",true);
				$("#answerImage").val("");
				$("#taskGap").hide();
				//$("#correct_response").hide();

				enableAll();
		}

		function startQuiz() {
			nextQuestion();
		}

		function nextQuestion() {
			hideAll();
			$("#next_button").attr("disabled",true);

			if(currentQuestion <= 14) {

				switch(currentQuestion) {
					case 1: runImgTask3(imgTasks3[0]);
							break;
					case 2: runSelectImageTask(selImgTasks[0]);
							break;
					case 3: runGapTask(gapTasks[0]);
							break;
					case 4: runSelectTask(selTasks[0]);
							break;
					case 5: runImageTask(imgTasks[1]);
							break;
					case 6: runSelectImageTask(selImgTasks[1]);
							break;
					case 7: runGapTask(gapTasks[1]);
							break;
					case 8: runSelectTask(selTasks[1]);
							break;
					case 9: runImageTask(imgTasks[2]);
							break;
					case 10: runSelectImageTask(selImgTasks[2]);
							break;
					case 11: runGapTask(gapTasks[2]);
							break;
					case 12: runSelectTask(selTasks[2]);
							break;
					case 13:runImageTask(imgTasks[3]);
							break;
					case 14: runImageTask(imgTasks[0]);
							break;
				}
				currentQuestion++;
			} else {
				//alert("kraj kviza, broj tocnih: " + correctCounter);
					var bodovi= correctCounter*5;

					$("#result_message").html('End of the quiz! Correct answers: <span style="color: #956ec4;">'+correctCounter+'</span>.</br>');
					$("#result_image").html('<span style="border: 13px solid gold; border-radius: 50%; text_align:center; padding: 60px 30px; font-size: 40px; color: gold;"> +'+bodovi+' XP</span>');

					$("body").css("background-color","white");
					$("#wrapper").css("border","2px solid #eeeeee");
         if(correctCounter<8){
					$("#correct_response").html("</br>You can do that better. Try again!");
					$("#correct_image").prepend('<img src="view/sad.png" alt="image" style="height: 80px; width: 80px;padding-left: 5px; padding-top: 5px;">')
					$("#next_button").html("Continue!");
					$("#correct_response").css("color","red");
					$("#next_button").css("background-color","#32CD32");
					$("#next_button").css("color","white");
					$("#next_button").attr("disabled",false);
					$("#next_button").click(function(){
						$.ajax(
							{
								url: "view/obradi.php",
								dataType: "json",
								data:
								{
									bodovi : bodovi,
									user: localStorage.getItem("username"),
									end: localStorage.getItem("lesson_end"),
									begin: localStorage.getItem("lesson_begin")
								},
								success: function( data )
								{
									console.log(data.bodovi);
									console.log(data.lesson);
									document.location.href="index.php?rt=users";
								},
								error: function( xhr, status )
								{
								}
							} );
					});
				}
				if(correctCounter<12 && correctCounter>7){
					$("#correct_response").html("</br>Very good! But you can do much better. Try again!");
					$("#correct_image").prepend('<img src="view/worry.png" alt="image" style="height: 80px; width: 80px;padding-left: 5px; padding-top: 5px;">')
					$("#next_button").html("Continue!");
					$("#correct_response").css("color","gold");
					$("#next_button").css("background-color","#32CD32");
					$("#next_button").css("color","white");
					$("#next_button").attr("disabled",false);
					$("#next_button").click(function(){
						$.ajax(
							{
								url: "view/obradi.php",
								dataType: "json",
								data:
								{
									bodovi : bodovi,
									user: localStorage.getItem("username"),
									end: localStorage.getItem("lesson_end"),
									begin: localStorage.getItem("lesson_begin")
								},
								success: function( data )
								{
									console.log(data.bodovi);
									console.log(data.lesson);
									document.location.href="index.php?rt=users";
								},
								error: function( xhr, status )
								{
								}
							} );
					});
				}
				if(correctCounter>11){
					$("#correct_response").html("</br>You are excellent! Congratulations.");
					$("#correct_image").prepend('<img src="view/happy.png" alt="image" style="height: 80px; width: 80px;padding-left: 5px; padding-top: 5px;">')
					$("#next_button").html("Continue!");
					$("#correct_response").css("color","green");
					$("#next_button").css("background-color","#32CD32");
					$("#next_button").css("color","white");
					$("#next_button").attr("disabled",false);
					$("#next_button").click(function(){
						$.ajax(
							{
								url: "view/obradi.php",
								dataType: "json",
								data:
								{
									bodovi : bodovi,
									user: localStorage.getItem("username"),
									end: localStorage.getItem("lesson_end"),
									begin: localStorage.getItem("lesson_begin")
								},
								success: function( data )
								{
									console.log(data.bodovi);
									console.log(data.lesson);
									document.location.href="index.php?rt=users";
								},
								error: function( xhr, status )
								{
								}
							} );
					});
				}
			}
		}

		function showMessage(message, isCorrect) {
		//	alert(message + " correct: " + isCorrect);

			$("#next_button").attr("disabled",false);
			$("#correct_response").html("<br>"+message);
		  if(isCorrect===false){
				$("#correct_answer").css("background-color","pink");
				$("#correct_response").css("color","red");
				$("#correct_image").prepend('<img src="view/wrong.png" alt="image" style="height: 80px; width: 80px;padding-left: 5px; padding-top: 5px;">');
				$("#next_button").css("background-color","red");
				$("#next_button").css("color","white");
			}else{
				$("#correct_answer").css("background-color","lightgreen");
				$("#correct_response").css("color","darkgreen");
				$("#correct_image").prepend('<img src="view/correct.png" alt="image" style="height: 80px; width: 80px;padding-left: 5px; padding-top: 5px;">');
				$("#next_button").css("background-color","green");
				$("#next_button").css("color","white");
			}
			//nextQuestion();
		}

		function next(){
			$("#correct_response").html("");
			$("#correct_image").html("");
			$("#correct_answer").css("background-color","#eeeeee");
			$("#next_button").css("background-color","darkgray");
			$("#next_button").css("color","lightgray");
			$("#spSentences button").attr("disabled",false);
			$("#spImages button").attr("disabled",false);
			$("#btnGapConfirm").attr("disabled",false);

			nextQuestion();
		}
		function stoppedTyping() {
			let text = $("#answerImage").val();
			if(text.length > 0){
				$("#btnConfirm").attr("disabled",false);
				$("#btnConfirm").css("background-color","#32CD32");
			}
			else{
				$("#btnConfirm").attr("disabled",true);
				$("#btnConfirm").css("background-color","darkgray");

			}
		}

		function confirmImgAnswer() {
			let text = $("#answerImage").val().trim();
			let correct = $("#imgCorrect").val().trim();
			$("#btnConfirm").attr("disabled",true);
			let message = "Your answer was incorrect. The correct answer was \"" + correct + "\".";
			let isCorrect = false;
			if(text === correct) {
				correctCounter++;
				message = "Your answer is correct!";
				isCorrect = true;
			}
			showMessage(message, isCorrect);
		}

		function selectAnswer() {
			let btn = $(this);
			let text = btn.html().trim();
			$("#spSentences button").attr("disabled",true);
			let correct = $("#selCorrect").val().trim();
			let message = "Your answer was incorrect. The correct answer was \"" + correct + "\".";
			let isCorrect = false;
			if(text === correct) {
				correctCounter++;
				message = "Your answer is correct!";
				isCorrect = true;
			}
			showMessage(message, isCorrect);
		}



		function selectImgAnswer() {
			let btn = $(this);
			let text = btn.html().trim();
			$("#spImages button").attr("disabled",true);

			let correct = $("#imageCorrect").val().trim();
			let message = "Your answer was incorrect. The correct answer was \"" + correct + "\".";
			let isCorrect = false;
			if(text === correct) {
				correctCounter++;
				message = "Your answer is correct!";
				isCorrect = true;
			}
			showMessage(message, isCorrect);
		}

			function imgselect3(){
				let btn = $('#'+$(this).prop("id")+' input');
				btn.attr("checked","checked");
				$("#divImage1").off("click");
				$("#divImage2").off("click");
				$("#divImage3").off("click");

				$("#divImage1").off("mouseenter");
				$("#divImage2").off("mouseenter");
				$("#divImage3").off("mouseenter");
				$("#divImage1").off("mouseleave");
				$("#divImage2").off("mouseleave");
				$("#divImage3").off("mouseleave");
				console.log(btn.prop("id"));
				let text = btn.prop("id");
				let correct = $("#imgCorrect3").val().trim();
				let message = "Your answer was incorrect. The correct answer was \"" + correct + "\".";
				let isCorrect = false;
				if(text === correct) {
					correctCounter++;
					message = "Your answer is correct!";
					isCorrect = true;
				}
				showMessage(message, isCorrect);
			}


		function enableAll() {
			$("#gapWords button").attr("disabled", false);
		}

		function fillTheGap() {
			enableAll();

			let missing = $("#missing").val();
			let btn = $(this);
			btn.attr("disabled", true);

			let text = btn.html();
			var re=/_+/;
			let res = missing.replace(re, "<span class='filling' style='color:#5A6672; border:1px solid darkgray; padding: 5px 5px; background-color: #eeeeee;'>" + text + "</span>"); // TODO izbrisat unutar spana
			$("#gapSentence").html(res);
		}

		function confirmGapAnswer() {
			let guess = $("#gapSentence span").text().trim();
			let correctWord = $("#gapCorrect").val().trim();
			$("#btnGapConfirm").attr("disabled",true);
			let message = "Your answer was incorrect. The correct answer was \"" + correctWord + "\".";
			let isCorrect = false;

			console.log("guess: " + guess);
			console.log("correctWord: " + correctWord);
			if(guess === correctWord) {
				correctCounter++;
				message = "Your answer is correct!";
				isCorrect = true;
			}
			showMessage(message, isCorrect);
		}

    function oboji(){
			$(this).css("border","2px solid #956ec4");
			console.log($(this).prop("id"));


		}

		function izbrisi(){
			$(this).css("border","2px solid #eeeeee");


		}

		$( document ).ready(function() {
			let quiz = new Quiz(Number(localStorage.getItem("lesson_begin")), Number(localStorage.getItem("lesson_end")));
			$("#answerImage").on("propertychange change keyup paste input", stoppedTyping);
			$("body").mousedown(stoppedTyping);
			$("#btnConfirm").click(confirmImgAnswer);
			$("#spSentences button").click(selectAnswer);
			$("#spImages button").click(selectImgAnswer);
			$("#gapWords button").click(fillTheGap);
			$("#btnGapConfirm").click(confirmGapAnswer);
			$("#divImage1").on("mouseenter", oboji);
			$("#divImage1").on("mouseleave", izbrisi);
			$("#divImage2").on("mouseenter", oboji);
			$("#divImage2").on("mouseleave", izbrisi);
			$("#divImage3").on("mouseenter", oboji);
			$("#divImage3").on("mouseleave", izbrisi);
			$("#divImage1").on("click",imgselect3);
			$("#divImage2").on("click",imgselect3);
			$("#divImage3").on("click",imgselect3);

			$('#answerImage').mlKeyboard({layout: 'es_ES', trigger: '#btnTrigger'});
			$('#answerImage').keypress(function(e){
				if(e.keyCode==13)
					$('#btnConfirm').click();
			});
			$("#next_button").click(next);

		});


	</script>
</html>

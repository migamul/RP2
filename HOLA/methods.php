<?php
require_once 'model/db.class.php';

class ImageTask implements JsonSerializable {
	public $path;
	public $answer;

	public function jsonSerialize () {
        return array(
            'path'=>$this->path,
            'answer'=>$this->answer
        );
    }
}

class ImageTask3 implements JsonSerializable {
	public $path1;
	public $path2;
	public $path3;
	public $spa1;
	public $spa2;
	public $spa3;

	public $enImages3;
	public $correct;

	public function jsonSerialize () {
        return array(
            'path1'=>$this->path1,
						'path2'=>$this->path2,
						'path3'=>$this->path3,
						'spa1'=>$this->spa1,
						'spa2'=>$this->spa2,
						'spa3'=>$this->spa3,
						'enImages3'=>$this->enImages3,
            'correct'=>$this->correct
        );
    }
}

class SelectTask implements JsonSerializable {
	public $id;
	public $enSentence;
	public $correct;
	public $spSentence2;
	public $spSentence3;
	public $spSentence4;

	public function jsonSerialize () {
        return array(
            'enSentence'=>$this->enSentence,
            'correct'=>$this->correct,
			'spSentence2'=>$this->spSentence2,
			'spSentence3'=>$this->spSentence3,
			'spSentence4'=>$this->spSentence4
        );
    }
}


class SelectImageTask implements JsonSerializable {
	public $id;
	public $enImage;
	public $path;
	public $correct;
	public $spImage2;
	public $spImage3;
	public $spImage4;

	public function jsonSerialize () {
        return array(
            'enImage'=>$this->enImage,
            'correct'=>$this->correct,
						'path'=>$this->path,
			'spImage2'=>$this->spImage2,
			'spImage3'=>$this->spImage3,
			'spImage4'=>$this->spImage4
        );
    }
}






class GapTask {
	public $id;
	public $spSentence;
	public $enSentence;
	public $missing;
	public $correct;
	public $option1;
	public $option2;
	public $option3;
	public $option4;
}

function sendJSONandExit( $message )
{
    header( 'Content-type:application/json;charset=utf-8' );
    echo json_encode( $message );
    flush();
    exit( 0 );
}


function sendErrorAndExit( $messageText )
{
	$message = [];
	$message[ 'error' ] = $messageText;
	sendJSONandExit( $message );
}

$db = DB::getConnection();







function setRandomSentences($selTask) {
	$db = DB::getConnection();
	$st = $db->prepare( "SELECT spa FROM llSentence where id_sentence!=:id ORDER BY RAND() LIMIT 3" );
	$st->execute(array('id'=>$selTask->id));

	$rows = $st->fetchAll();

	$selTask->spSentence2 = $rows[0]['spa'];
	$selTask->spSentence3 = $rows[1]['spa'];
	$selTask->spSentence4 = $rows[2]['spa'];
}


function setRandomImage($selTask) {
	$db = DB::getConnection();
	$st = $db->prepare( "SELECT spa FROM llImages where id_image!=:id ORDER BY RAND() LIMIT 3" );
	$st->execute(array('id'=>$selTask->id));

	$rows = $st->fetchAll();

	$selTask->spImage2 = $rows[0]['spa'];
	$selTask->spImage3 = $rows[1]['spa'];
	$selTask->spImage4 = $rows[2]['spa'];
}

///////////////////////////////////////////////////////////////////////
if( !isset( $_GET['lvlFrom'] ) )
	sendErrorAndExit( 'Nije postavljeno $_GET["from"].' );

if( !isset( $_GET['lvlTo'] ) )
	sendErrorAndExit( 'Nije postavljeno $_GET["to"].' );


$from = (int) $_GET[ 'lvlFrom' ];
$to = (int) $_GET[ 'lvlTo' ];

$st = $db->prepare( "SELECT link, spa FROM llImages where id_lesson between :from and :to ORDER BY RAND() LIMIT 4" );
$st->execute(array('from'=>$from, 'to'=>$to));

$images=array();
while( $row = $st->fetch() )
{
	$imgTask = new ImageTask();
	$imgTask->path = $row['link'];
	$imgTask->answer = $row['spa'];
	$images[] = $imgTask;
}
$message[ 'imgTasks' ] = $images;
/////////////////////////////////////////////////////////////////////////////
$st = $db->prepare( "SELECT link, eng, spa FROM llImages where id_lesson between :from and :to ORDER BY RAND() LIMIT 3" );
$st->execute(array('from'=>$from, 'to'=>$to));

$images3=array();
$row = $st->fetchAll();

$imgTask3 = new ImageTask3();
$imgTask3->path1 = $row[0]['link'];
$imgTask3->spa1=$row[0]['spa'];

$imgTask3->path2 = $row[1]['link'];
$imgTask3->spa2=$row[1]['spa'];

$imgTask3->path3 = $row[2]['link'];
$imgTask3->spa3=$row[2]['spa'];
$i=rand(0,3);
$imgTask3->enImages3=$row[$i]['eng'];
$imgTask3->correct=$row[$i]['spa'];
$images3[] = $imgTask3;

$message[ 'imgTasks3' ] = $images3;
///////////////////////////////////////////////////////////////////////////
$st2 = $db->prepare( "SELECT id_sentence, eng, spa FROM llSentence where id_lesson between :from and :to ORDER BY RAND() LIMIT 3" );
$st2->execute(array('from'=>$from, 'to'=>$to));

$selects=array();
while( $row = $st2->fetch() )
{
	$selTask = new SelectTask();
	$selTask->id = $row['id_sentence'];
	$selTask->enSentence = $row['eng'];
	$selTask->correct = $row['spa'];
	setRandomSentences($selTask);
	$selects[] = $selTask;
}
$message[ 'selTasks' ] = $selects;
////////////////////////////////////////////////////////////////////////////
$st2 = $db->prepare( "SELECT id_image, link, eng, spa FROM llImages where id_lesson between :from and :to ORDER BY RAND() LIMIT 3" );
$st2->execute(array('from'=>$from, 'to'=>$to));

$selectsImg=array();
while( $row = $st2->fetch() )
{
	$selImageTask = new SelectImageTask();
	$selImageTask->id = $row['id_image'];
	$selImageTask->enImage = $row['eng'];
	$selImageTask->correct = $row['spa'];
	$selImageTask->path=$row['link'];
	setRandomImage($selImageTask);
	$selectsImg[] = $selImageTask;
}
$message[ 'selImgTasks' ] = $selectsImg;


///////////////////////////////////////////////////////////////////////////////////////
$st2 = $db->prepare( "SELECT id_sentence, eng, spa, missing, option1, option2, option3, option4, correct FROM llSentence where id_lesson between :from and :to ORDER BY RAND() LIMIT 3" );
$st2->execute(array('from'=>$from, 'to'=>$to));

$gaps=array();
while( $row = $st2->fetch() )
{
	$gapTask = new GapTask();

	$gapTask->id = $row['id_sentence'];
	$gapTask->enSentence = $row['eng'];
	$gapTask->spSentence = $row['spa'];
	$gapTask->missing = $row['missing'];
	$gapTask->option1 = $row['option1'];
	$gapTask->option2 = $row['option2'];
	$gapTask->option3 = $row['option3'];
	$gapTask->option4 = $row['option4'];
	$gapTask->correct = $row['correct'];

	$gaps[] = $gapTask;
}
$message[ 'gapTasks' ] = $gaps;

sendJSONandExit( $message );
?>

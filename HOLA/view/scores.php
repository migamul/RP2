<?php 
require_once '../model/db.class.php';

class Score {
	public $scores;
	public $username;
	public $color;
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

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

$db = DB::getConnection();

///////////////////////////////////////////////////////////////////////

$st = $db->prepare( "SELECT username, score FROM llUsers order by score desc" );
$st->execute();

$message = [];
$arr = [];
$i = 0;
while( $row = $st->fetch() )
{
	$sc = new Score();
	$sc->scores = $row['score'];
	$sc->username = $row['username'];
	$sc->color = "#".random_color();
	$i++;
	$arr[] = $sc;
}
$message['scores'] = $arr;
sendJSONandExit( $message );
?>

<?php

class User
{
	protected $id_user, $username,$score,$id_lesson;

	function __construct( $id_user, $username,$score,$id_lesson )
	{
		$this->id_user = $id_user;
		$this->username = $username;
		$this->score=$score;
		$this->id_lesson=$id_lesson;
	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }
}




?>

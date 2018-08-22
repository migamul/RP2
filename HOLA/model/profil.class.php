<?php

class Profil
{
	protected $link, $title, $image;

	function __construct( $title, $link, $image,$user,$score,$level)
	{

		$this->title=$title;
		$this->link = $link;
		$this->image=$image;
		$this->user=$user;
		$this->score=$score;
		$this->level=$level;
	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }
}

?>

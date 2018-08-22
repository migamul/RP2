<?php

class Discussion
{
	protected $id_discussion,$text,$id_user,$id_lesson,$date;

	function __construct( $id_discussion,$text,$id_user,$id_lesson,$date)
	{
		$this->id_discussion=$id_discussion;
		$this->text=$text;
		$this->id_user = $id_user;
		$this->id_lesson = $id_lesson;
		$this->date=$date;

	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }
}

?>

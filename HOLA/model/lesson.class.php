<?php

class Lesson
{
	protected $id_lesson, $title, $link,$image,$locked;

	function __construct( $id_lesson, $title, $link,$image,$locked)
	{
		$this->id_lesson = $id_lesson;
		$this->title=$title;
		$this->link = $link;
		$this->image=$image;
		$this->locked=$locked;
	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }
}

?>

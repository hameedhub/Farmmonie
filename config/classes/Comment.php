<?php

/**
 * 
 */
class Comment
{
	
	public function viewComment(){
		$data = DB::query('SELECT * FROM comment ORDER BY id DESC LIMIT 50');
		return $data;
	}
}



?>
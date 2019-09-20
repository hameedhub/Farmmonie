<?php

/**
 * @description Notificaiton class
 */
class Notification
{
	
	public function feeds(){
		$data = DB::query('SELECT * FROM notification ORDER BY id LIMIT 20');
		return $data;
	}
}

?>
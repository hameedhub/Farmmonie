<?php

/**
 * Author: Hameed Abdulrahaman
 * Email: hameedabdulrahamann@gmail.com
 * Phone: +2347064567799
 */
class User
{
	
	public function data()
	{
		$data = DB::query('SELECT * FROM users WHERE id =:id', array(':id'=>$_SESSION['user']))[0];
		return $data;
	}
	public function members(){
		$data = DB::query('SELECT * FROM users');
		return $data;
	}
	public function userByID($id)
	{
		$data = DB::query('SELECT * FROM users WHERE id =:id', array(':id'=>$id))[0];
		return $data;
	}
	public function Notification(){
		$data = DB::query('SELECT * FROM notification ORDER BY id DESC LIMIT 20');
		return $data;
	}
}

?>
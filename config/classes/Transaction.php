<?php

class Transaction{
	
	public function history(){
		$data = DB::query('SELECT * FROM transaction WHERE user_id=:user_id ORDER BY id DESC LIMIT 20', array(':user_id' =>$_SESSION['user']));
		return $data;
	}	
	public function checkPending(){
		$data = DB::query('SELECT * FROM transaction WHERE user_id=:user_id AND status =:status', array(':user_id' =>$_SESSION['user'] ,':status'=>'Pending'));
		
		if (count($data) >0) {
			return true;
		}else{
			return false;
		}
	}
	public function numFunded(){
		$data = DB::query('SELECT * FROM transaction WHERE user_id=:user_id', array(':user_id' =>$_SESSION['user']));
		return count($data);
	}
	public function funded(){
		$status = 'Completed' || 'Successful';
		$data = DB::query('SELECT * FROM transaction WHERE user_id=:user_id AND status=:status', array(':user_id' => $_SESSION['user'] , ':status'=> 'Successful'));
		return $data;
	}
	// Admin Data..
	public function totalTrans(){
		$data = DB::query('SELECT * FROM transaction');
		return count($data);
	}
	public function totalUnprocessed(){
		$data = DB::query('SELECT * FROM transaction WHERE status=:status', array(':status'=>'Pending'));
		return count($data);
	}
	public function bankTrans(){
		$data = DB::query('SELECT * FROM bank_payment WHERE status =:status ORDER BY id DESC LIMIT 20', array(':status' => 'Pending'));
		return $data;
	}
	public function trans(){
		$data = DB::query('SELECT * FROM transaction ORDER BY id DESC');
		return $data;
	}
}

?>
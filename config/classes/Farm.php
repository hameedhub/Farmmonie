<?php

/**
 * @class { Farm }
 */
class Farm {
	
	public function farms() {
		$data = DB::query('SELECT * FROM farm ORDER BY id DESC LIMIT 20');
		return $data;
	}
	public function farmByID($id) {
		$data = DB::query('SELECT * FROM farm WHERE id=:id', array(':id' => $id));
		return $data;
	}
	public function totalFarm(){
		$data = DB::query('SELECT * FROM farm');
		return $data;		
	}
	public function status($id){
		$data = DB::query('SELECT * FROM farm WHERE id=:id', array(':id' =>$id))[0];
		if ($data['avail_amount']>= $data['amount']) {
			return true;
		}
		return false;
	}
}


?>
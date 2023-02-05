<?php
namespace App\Supports\Database;

use Illuminate\Support\Facades\DB; 

trait TruncateTable{

	public function truncate($table){
		DB::table($table)->truncate();
	}

	public function forgenKeyCheckDisable(){
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
	}

	public function forgenKeyCheckEnable()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}
}
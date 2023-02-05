<?php 
namespace App\Supports\Helpers;


trait DateTimeHelper{
	/**
	 * @param $formate & $data 
	 * @return valid data based formate 
	 */
	public function makeDate($formate="d-M-y", $data = null)
	{
		return date($formate, strtotime($data));
	}
}
<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetLoginLog extends Model
{
	public $timestamps = false;
	protected $fillable=['UserId','LoginDate','Status'];
	protected $table = 'userloginlog';

	public function SaveLoginLog($data)
	{
		$this->UserId = $data['UserId'];
		$this->LoginDate = now();
		$this->Status = $data['Status'];
		$this->save();
	    //return 1;
		return $this->id;
	}	
}

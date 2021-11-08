<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetRoleMaster extends Model
{
	public $timestamps = false;
	protected $fillable=['Role','IsActive'];
	protected $table = 'rolemaster';
	
}

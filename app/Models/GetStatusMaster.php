<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetStatusMaster extends Model
{
	public $timestamps = false;
	protected $fillable=['Name','IsActive'];
	protected $table = 'statusmaster';
}
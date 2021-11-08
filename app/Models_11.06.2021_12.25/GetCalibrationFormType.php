<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetCalibrationFormType extends Model
{
	public $timestamps = false;
	protected $fillable=['Name','DayAdd','IsActive','CreatedBy'];
	protected $table = 'calibrationformtype';

	public function SaveCalFormType($data)
	{
		$this->Name = $data['Name'];
		$this->DayAdd = $data['DayAdd'];
		$this->IsActive = $data['IsActive'];
		$this->CreatedBy = $data['CreatedBy'];
		$this->CreatedDate = $data['CreatedDate'];
		$this->save();
		return 1;
		//return $this->id;
	}

	public function UpdCalFormType($data)
	{
		$this->where('RecId', $data['RecId'])->update(array('Name' => $data['Name'],'DayAdd' => $data['DayAdd']));
		return 1;
	}

	public function ActiveDeactiveCalFormType($data)
	{
		$this->where('RecId', $data['RecId'])->update(array('IsActive' => $data['IsActive']));
		return 1;
	}
}

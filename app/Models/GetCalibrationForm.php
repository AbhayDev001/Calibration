<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetCalibrationForm extends Model
{
	public $timestamps = false;
	protected $fillable=['Name','CType','IsActive','CreatedBy'];
	protected $table = 'calibrationform';

	public function SaveCaliForm($data)
	{
		$this->Name = $data['Name'];
		$this->CType = $data['CType'];
		$this->IsActive = $data['IsActive'];
		$this->CreatedBy = $data['CreatedBy'];
		$this->CreatedDate = $data['CreatedDate'];
		$this->save();
		return 1;
		//return $this->id;
	}

	public function UpdCaliForm($data)
	{
		$this->where('RecId', $data['RecId'])->update(array('Name' => $data['Name'],'CType' => $data['CType']));
		return 1;
	}

	public function ActiveDeactiveCaliForm($data)
	{
		$this->where('RecId', $data['RecId'])->update(array('IsActive' => $data['IsActive']));
		return 1;
	}
}

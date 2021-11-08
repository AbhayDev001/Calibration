<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetCalibrationComment extends Model
{
	public $timestamps = false;
	//protected $primaryKey = 'RecId';
	protected $fillable=['LineRecId','RefRecId','CalibrationStatus','Comments','Type','CreatedBy'];
	protected $table = 'calibrationcomment';

	public function SaveCalibrationComment($data)
	{
		$this->LineRecId = $data['CalibrationLineRecId'];
		$this->RefRecId = $data['RefRecId'];
		$this->CalibrationStatus = $data['CalibrationStatus'];
		$this->Comments = $data['Comments'];
		$this->Type = $data['Type'];
		$this->CreatedBy = $data['CreatedBy'];
		$this->save();
	    //return 1;
		return $this->id;
	}

	public function InsertCalibrationComment($data)
	{
		$this->insert($data);
		return 1;
	}
}

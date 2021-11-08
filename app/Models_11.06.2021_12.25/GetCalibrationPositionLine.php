<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetCalibrationPositionLine extends Model
{
	public $timestamps = false;
	protected $fillable=['RefRecId','LineId','Type','PositionWeight','StWeight','ActualMass','ObsMass','CreatedBy'];
	protected $table = 'calibrationposition';

	public function SaveCalibrationPositionLine($data)
	{
		$this->insert($data);
		return 1;
	}
	public function UpdCalibrationlLine($data)
	{
		$this->where('RecId', $data['CalibrationLineRecId'])->update(array('LineId' => $data['LineId'],'StWeight' => $data['StWeight'],'PositionWeight' => $data['PositionWeight'],'ActualMass' => $data['ActualMass'],'ObsMass' => $data['ObserverMass'],'Tfile' => $data['Tfile'],'Ifile' => $data['Ifile']));
		return 1;
	}
}

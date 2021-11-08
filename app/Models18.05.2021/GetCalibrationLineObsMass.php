<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetCalibrationLineObsMass extends Model
{
	public $timestamps = false;
	protected $fillable=['RefRecId','LineId','Type','StWeight','ObsMass','CreatedBy'];
	protected $table = 'calibrationlineobsmass';

	public function SaveCalibrationLineObsMass($data)
	{
		$this->insert($data);
		return 1;
	}
	public function DeleteCalibrationLineObsMass($data)
	{
		$this->where('RefRecId', $data['RefRecId'])->delete();
		return 1;
	}
	/*public function UpdCalibrationlLine($data)
	{
	    //$this->cname = $data['categoryname'];
	    $this->where('RecId', $data['CalibrationLineRecId'])->update(array('LineId' => $data['LineId'],'StWeight' => $data['StWeight'],'CertWeight' => $data['CertWeight'],'DispWeight' => $data['DispWeight'],'DiffWeight' => $data['DifferentAB'],'AccpWeight' => $data['AccpWeight'],'Result' => $data['Result'],'Tfile' => $data['Tfile'],'Ifile' => $data['Ifile']));
	    return 1;
	}*/
	public function UpdCalibrationlLine($data)
	{
		$this->where('RecId', $data['CalibrationLineRecId'])->update(array('LineId' => $data['LineId'],'StWeight' => $data['StWeight'],'ObsMass' => $data['ObsMass'],'Tfile' => $data['Tfile'],'Ifile' => $data['Ifile']));
		return 1;
	}
}

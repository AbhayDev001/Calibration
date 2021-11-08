<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetCalibrationReq extends Model
{
	public $timestamps = false;
	protected $fillable=['CalibrationId','InstrumentId','DeviceId','CalibrationDate','ReqStatus','CreatedBy','ResponseBy'];
	protected $table = 'calibrationreq';

	public function SaveCalibrationreq($data)
	{
		$this->CalibrationId = $data['RCalibrationId'];
		$this->InstrumentId = $data['RInstrumentId'];
		$this->DeviceId = $data['RDeviceId'];
		$this->CalibrationDate = date("Y-m-d",strtotime(Now()));
		$this->ReqStatus = 10;
		$this->CreatedBy = $data['CreatedBy'];
		$this->ResponseBy = "";
		$this->save();
	    //return 1;
		return $this->id;
	}
	public function UpdReqStatus($data)
	{
		$this->where('RecId', $data['ReqRecId'])->update(array('ReqStatus' => $data['ReqStatus'],'ResponseBy' => $data['ResponseBy']));
		return 1;
	}
}

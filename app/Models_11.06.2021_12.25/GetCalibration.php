<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetCalibration extends Model
{
	public $timestamps = false;
	protected $fillable=['CalibrationId','WeightBoxId','CalibrationName','InstrumentId','InstrumentName','DeviceId','DeviceName','DeviceType','Make','Model','SpiritLevel','Internal','CalibrationDate','CalibrationNextDate','PerformedBy','PerformDate','VerifiedBy','VerifiedDate','AproovelBy','AproovelDate','Status','FormId','RePerform','Desired_Smallest'];
	protected $table = 'calibration';

	public function SaveCalibration($data)
	{
        $performDate = Now();
		$this->CalibrationId = $data['CalibrationMethod'];
		$this->WeightBoxId = $data['WeightBoxId'];
		$this->CalibrationName = "";
		$this->InstrumentId = $data['InstrumentID'];
		$this->InstrumentName = "";
		$this->DeviceId = $data['DeviceType'];
		$this->DeviceName = "";
		$this->DeviceType = "";
		$this->Make = $data['Make'];
		$this->Model = $data['Model'];
		$this->SpiritLevel = $data['BalanceChecked'];
		$this->Internal = $data['InternalCalibration'];
		$this->CalibrationDate = date("Y-m-d H:i",strtotime($data['CalibratedDate']));
        $this->CalibrationNextDate = date("Y-m-d H:i",strtotime($data['NextCalibratedDate']));
        $this->DailyCalibrationNextDate = date('Y-m-d H:i',strtotime('+22 hour',strtotime($performDate)));//date("Y-m-d H:i",strtotime($data['NextCalibratedDate1']));
		$this->PerformedBy = $data['PerformedBy'];
		$this->PerformDate = $performDate;
		$this->VerifiedBy = "";
		$this->VerifiedDate = Null;
		$this->AproovelBy = "";
		$this->AproovelDate = Null;
		$this->Status = 10;
		$this->FormId = $data['FormId'];
		$this->RePerform = 0;
		$this->save();
	    //return 1;
		return $this->id;
	}
	public function SaveMonthlyCalibration($data)
	{

		// print_r($data);die;
		$this->CalibrationId = $data['CalibrationMethod'];
		$this->WeightBoxId = $data['WeightBoxId'];
		$this->CalibrationName = "";
		$this->InstrumentId = $data['InstrumentID'];
		$this->InstrumentName = "";
		$this->DeviceId = $data['DeviceType'];
		$this->DeviceName = "";
		$this->DeviceType = "";
		$this->Make = $data['Make'];
		$this->Model = $data['Model'];
		$this->SpiritLevel =0;
		$this->Internal = 0;
		$this->CalibrationDate = date("Y-m-d H:i",strtotime($data['CalibratedDate']));
		$this->CalibrationNextDate = date("Y-m-d H:i",strtotime($data['NextCalibratedDate']));
		$this->CalibrationNextDate1 = date("Y-m-d H:i",strtotime($data['NextCalibratedDate1']));
		$this->PerformedBy = $data['PerformedBy'];
		$this->PerformDate = Now();
		$this->VerifiedBy = "";
		$this->VerifiedDate = Null;
		$this->AproovelBy = "";
		$this->AproovelDate = Null;
		$this->Status = 10;
		$this->FormId = $data['FormId'];
		$this->RePerform = 0;
		$this->Desired_Smallest = $data['Desired_Smallest'];
		$this->save();
	    //return 1;
		return $this->id;
	}
	public function UpdCalibration($data)
	{
		$this->where('RecId', $data['RecId'])->update(array('SpiritLevel' => $data['BalanceChecked'],'Internal' => $data['InternalCalibration'],'WeightBoxId' => $data['WeightBoxId']));
		return 1;
	}
	public function UpdCalibrationStatus($data)
	{
		$this->where('RecId', $data['RecId'])->update(array('Status' => $data['Status'],'VerifiedBy' => $data['VerifiedBy'],'VerifiedDate' => $data['VerifiedDate']));
		return 1;
	}
	public function UpdCalibrationStatus1($data)
	{
		$this->where('RecId', $data['RecId'])->update(array('Status' => $data['Status'],'AproovelBy' => $data['AproovelBy'],'AproovelDate' => $data['AproovelDate']));
		return 1;
	}
	public function Request_RePerform($data)
	{
		$this->where('RecId', $data['CalRecId'])->update(array('RePerform' => 10));
		return 1;
	}
}

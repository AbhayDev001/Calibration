<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetDeviceMaster extends Model
{
	public $timestamps = false;
	protected $fillable=['Name','InstrumentId','Make','Model','SearialNo','IsActive','DirPath','DeviceType','CreatedBy','Instrument_No','Master_Calibration_Date'];
    protected $table = 'devicemaster';

    public function SaveDevice($data)
	{
		$this->Name = $data['Name'];
		$this->Instrument_No = $data['Instrument_No'];
		$this->Master_Calibration_Date = $data['Master_Calibration_Date'];
		$this->InstrumentId = $data['InstrumentId'];
		$this->Make = $data['Make'];
		$this->Model = $data['Model'];
		$this->SearialNo = $data['SearialNo'];
		$this->DirPath = $data['DirPath'];
		$this->IsActive = $data['IsActive'];
		$this->CreatedBy = $data['CreatedBy'];
		$this->DeviceType = $data['DeviceType'];
		$this->CreatedDate = $data['CreatedDate'];
		$this->save();
		return 1;
		//return $this->id;
	}

	public function UpdDevice($data)
	{
		$this->where('RecId', $data['RecId'])->update(array('Name' => $data['Name'],'InstrumentId' => $data['InstrumentId'],'Make' => $data['Make'],'Model' => $data['Model'],'SearialNo' => $data['SearialNo'],'DirPath' => $data['DirPath'],'DeviceType' => $data['DeviceType'],'Instrument_No'=>$data['Instrument_No'],'Master_Calibration_Date'=>$data['Master_Calibration_Date']));
		return 1;
	}

	public function ActiveDeactiveDevice($data)
	{
		$this->where('RecId', $data['RecId'])->update(array('IsActive' => $data['IsActive']));
		return 1;
	}
}

<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetDevicePositionWeight extends Model
{
	public $timestamps = false;
	protected $fillable=['DeviceId','InstrumentId','CalibrationTypeId','LineId','PositionWeight','StWeight','Type','CreatedBy'];
	protected $table = 'devicepositionweight';


	public function SaveDevicePositionWeight($data)
	{
		$this->insert($data);
		return 1;
	}
	public function DeleteDevicePositionWeight($data)
	{
		$this->where('DeviceId', $data['DeviceId'])->where('InstrumentId', $data['InstrumentId'])->where('CalibrationTypeId', $data['CalibrationTypeId'])->delete();
		return 1;
	}
}

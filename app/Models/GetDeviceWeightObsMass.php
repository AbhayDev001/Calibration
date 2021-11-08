<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetDeviceWeightObsMass extends Model
{
	public $timestamps = false;
	protected $fillable=['DeviceId','InstrumentId','CalibrationTypeId','LineId','StWeight','Type','CreatedBy'];
	protected $table = 'deviceweightobsmass';


	public function SaveDeviceWeightObsMass($data)
	{
		$this->insert($data);
		return 1;
	}
	public function DeleteDeviceWeightObsMass($data)
	{
		$this->where('DeviceId', $data['DeviceId'])->where('InstrumentId', $data['InstrumentId'])->where('CalibrationTypeId', $data['CalibrationTypeId'])->delete();
		return 1;
	}
}

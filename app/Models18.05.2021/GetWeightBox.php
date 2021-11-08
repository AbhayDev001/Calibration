<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetWeightBox extends Model
{
	public $timestamps = false;
	protected $fillable=['RecId','WeightBoxId','WeightBox_calibration_on','WeightBox_next_calibration','CreatedBy','CreatedDate'];
    protected $table = 'weightbox';

    public function SaveWeightBox($data)
	{
		$this->WeightBoxId = $data['WeightBoxId'];
		$this->WeightBox_calibration_on = $data['WeightBox_calibration_on'];
		$this->WeightBox_next_calibration = $data['WeightBox_next_calibration'];
		$this->IsActive = 1;//$data['IsActive'];
		$this->CreatedBy = $data['CreatedBy'];
		$this->CreatedDate = $data['CreatedDate'];
		$this->save();
		return 1;
		//return $this->id;
	}

	public function UpdateWeightBox($data)
	{
		$this->where('RecId', $data['RecId'])->update(
			array(
				'WeightBoxId' => $data['WeightBoxId'],
				'WeightBox_calibration_on' => $data['WeightBox_calibration_on'],
				'WeightBox_next_calibration' => $data['WeightBox_next_calibration'],
				'CreatedDate' => $data['CreatedDate'],
				'CreatedBy' => $data['CreatedBy'])
		);
		return 1;
	}

	public function DeleteWeightBox($data)
	{
		$this->where('RecId', $data['RecId'])->delete();
		return 1;
	}

	public function ActiveDeactiveWeightBox($data)
	{
		$this->where('RecId', $data['RecId'])->update(array('IsActive' => $data['IsActive']));
		return 1;
	}
}

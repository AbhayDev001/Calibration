<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetMonthlyCalibrationDetails extends Model
{
	public $timestamps = false;
	protected $fillable=['RefRecId','AverageMass','SD1','SD2','AcceptanceCriteria','CompliesAcceptanceCriteria','DiffAcceptanceCriteria','CompliesAcceptanceCriteria2','CompliesAcceptanceCriteria3	','DisplayWeightA','DisplayWeightB','Sensitivity','AcceptanceCriteriaDetail','TfileA','IfileA','TfileB','IfileB','CreatedBy'];
	protected $table = 'monthlycalibrationdetails';

	public function SaveCalibrationDetails($data)
	{
		$this->RefRecId = $data['RefRecId'];
		$this->AverageMass = $data['AverageMass'];
		$this->SD1 = $data['SD1'];
		$this->SD2 = $data['SD2'];
		$this->AcceptanceCriteria = $data['AcceptanceCriteria'];
		$this->CompliesAcceptanceCriteria = $data['CompliesAcceptanceCriteria'];
		$this->DiffAcceptanceCriteria = "";
		$this->CompliesAcceptanceCriteria2 = 0;
		$this->CompliesAcceptanceCriteria3 = 0;
		$this->DisplayWeightA = 0;
		$this->DisplayWeightB = 0;
		$this->Sensitivity = "";
		$this->TfileA = "";
		$this->IfileA = "";
		$this->TfileB = "";
		$this->IfileB = "";
		$this->AcceptanceCriteriaDetail ="";
		$this->CreatedBy = $data['CreatedBy'];
		$this->save();
	    //return 1;
		return $this->id;
	}
	public function UpdCalibrationDetails($data)
	{
		$this->where('RefRecId', $data['RefRecId'])->update(array('AverageMass' => $data['AverageMass'],'SD1' => $data['SD1'],'SD2' => $data['SD2'],'AcceptanceCriteria' => $data['AcceptanceCriteria'],'CompliesAcceptanceCriteria' => $data['CompliesAcceptanceCriteria']));
		return 1;
	}
	public function SaveCalibrationDetails1($data)
	{
		$this->where('RefRecId', $data['RefRecId'])->update(array('DiffAcceptanceCriteria' => $data['DiffAcceptanceCriteria'],'CompliesAcceptanceCriteria2' => $data['CompliesAcceptanceCriteria2'],'CompliesAcceptanceCriteria3' => $data['CompliesAcceptanceCriteria3']));
		return 1;
	}
	public function SaveCalibrationDetails2($data)
	{
		$this->where('RefRecId', $data['RefRecId'])->update(array('DisplayWeightA' => $data['DisplayWeightA'],'DisplayWeightB' => $data['DisplayWeightB'],'Sensitivity' => $data['Sensitivity'],'AcceptanceCriteriaDetail' => $data['AcceptanceCriteriaDetail'],'TfileA' => $data['TfileA'],'IfileA' => $data['IfileA'],'TfileB' => $data['TfileB'],'IfileB' => $data['IfileB']));
		return 1;
	}
}
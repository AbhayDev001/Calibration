<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetCalibrationLine extends Model
{
	public $timestamps = false;
	//protected $primaryKey = 'RecId';
	protected $fillable=['RefRecId','LineId','Type','StWeight','CertWeight','DispWeight','DiffWeight','AccpWeight','Result','Tfile','Ifile','CreatedBy'];
	protected $table = 'calibrationline';

	public function SaveCalibrationlLine($data)
	{
		/*$this->RefRecId = $data['RefRecId'];
		$this->LineId = $data['LineId'];
		$this->Type = 0;
		$this->StWeight = $data['StWeight'];
		$this->CertWeight = $data['CertWeight'];
		$this->DispWeight = $data['DispWeight'];
		$this->DiffWeight = $data['DiffWeight'];
		$this->AccpWeight = $data['AccpWeight'];
		$this->Result = $data['Result'];
		$this->Tfile = $data['Tfile'];
		$this->Ifile = $data['Ifile'];
		$this->CreatedBy = $data['CreatedBy'];*/
		$this->insert($data);
	    return 1;
		//return $this->id;
	}
	public function UpdCalibrationlLine($data)
	{
	    //$this->cname = $data['categoryname'];
	    $this->where('RecId', $data['CalibrationLineRecId'])->update(array('LineId' => $data['LineId'],'StWeight' => $data['StWeight'],'CertWeight' => $data['CertWeight'],'DispWeight' => $data['DispWeight'],'DiffWeight' => $data['DifferentAB'],'AccpWeight' => $data['AccpWeight'],'Result' => $data['Result'],'Tfile' => $data['Tfile'],'Ifile' => $data['Ifile']));
	    return 1;
	}
}

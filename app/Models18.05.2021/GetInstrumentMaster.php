<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetInstrumentMaster extends Model
{
	public $timestamps = false;
	protected $fillable=['Name','IsActive','CreatedBy'];
	protected $table = 'instrumentmaster';

	public function SaveInstrument($data)
	{
		$this->Name = $data['Name'];
		$this->IsActive = $data['IsActive'];
		$this->CreatedBy = $data['CreatedBy'];
		$this->CreatedDate = $data['CreatedDate'];
		$this->save();
		return 1;
		//return $this->id;
	}

	public function UpdInstrument($data)
	{
		$this->where('RecId', $data['RecId'])->update(array('Name' => $data['Name']));
		return 1;
	}

	public function ActiveDeactiveInstrument($data)
	{
		$this->where('RecId', $data['RecId'])->update(array('IsActive' => $data['IsActive']));
		return 1;
	}
}

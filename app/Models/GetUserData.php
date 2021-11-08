<?php
namespace App\Models;
Use DB;

use Illuminate\Database\Eloquent\Model;

class GetUserData extends Model
{
	public $timestamps = false;
	protected $fillable=['UserId','UserName','UserEmail','ContactNum','Role','Password','IsActive','LdapUser'];
	protected $table = 'usermaster';

	public function SaveUser($data)
	{
		$this->UserId = $data['UserId'];
		$this->UserName = $data['UserName'];
		$this->UserEmail = $data['UserEmail'];
		$this->ContactNum = $data['ContactNum'];
		$this->CreatedDate = $data['CreatedDate'];
		$this->Role = $data['Role'];
		$this->Password = $data['Password'];
		$this->IsActive = $data['IsActive'];
		$this->LdapUser = $data['LdapUser'];
		$this->save();
	    return 1;
		//return $this->id;
	}

	public function UpdUser($data)
	{
		$this->where('UserId', $data['UserId'])->update(array('UserName' => $data['UserName'],'UserEmail' => $data['UserEmail'],'ContactNum' => $data['ContactNum']));
		return 1;
	}

	public function UpdUser1($data)
	{
		$this->where('UserId', $data['UserId'])->update(array('UserName' => $data['UserName'],'UserEmail' => $data['UserEmail'],'ContactNum' => $data['ContactNum'],'Role' => $data['Role'],'Password' => $data['Password']));
		return 1;
	}

	public function ActiveDeactiveUser($data)
	{
		$this->where('UserId', $data['UserId'])->update(array('IsActive' => $data['IsActive']));
		return 1;
	}
}

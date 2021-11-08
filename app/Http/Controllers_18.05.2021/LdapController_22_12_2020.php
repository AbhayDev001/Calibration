<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use DB;
use Mail;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\GetUserData;
use App\Models\GetInstrumentMaster;
use App\Models\GetDeviceMaster;
use App\Models\GetCalibrationFormType;
use App\Models\GetCalibrationForm;
use App\Models\GetDeviceWeight;
use App\Models\GetCalibration;
use App\Models\GetCalibrationLine;
use App\Models\GetCalibrationComment;
use App\Models\GetLoginLog;
use App\Models\GetStatusMaster;

class LdapController extends BaseController
{
	//Dual Use
	function SecureKeyToPassword($key)
	{
		$base1=base64_decode($key);
		$base2=base64_decode($base1);
		$base3=base64_decode($base2);
		return $base3;
	}

	//Live Server Code
	/*
	function SaveUser(Request $request)
	{
		if(Session::get('LoginData')['Role']==1)
		{
			//echo"<pre>"; print_r($request->all()); exit;
			$UserId=$request['UserId'];
			$UserType=$request['UserType'];
			$LocalUser=$request['LocalUser'];
			$UserDataC=GetUserData::where('UserId',$UserId)->count();
			if($UserDataC<1)
			{
				if($LocalUser==1)
				{
					$data=[];
					$data['UserName']="";
					$data['UserEmail']="";
					$data['ContactNum']="";
					$data['UserId']=$UserId;
					$data['Role']=$UserType;
					$data['CreatedDate']=now();
					$data['Password']=$request['Password'];
					$data['IsActive']=1;
					$data['LdapUser']=0;

					$GetUserData = new GetUserData();
					if($GetUserData->SaveUser($data))
					{
						return redirect("/AddUser")->with('success', 'User has been added successfully.');
					}
					else
					{
						return redirect("/AddUser")->with('failed', 'Unable to save user...');
					}
				}
				else
				{
					$hostname=env("LDAP_HOSTNAME");
					$username=$this->SecureKeyToPassword(env("LDAP_ADMIN"));
					//$ldap_dn = "cn=".$username.",dc=".env('LDAP_DC1').",dc=".env('LDAP_DC2');
					$ldap_dn = $username."@".env("LDAP_HOSTNAME");
					$ldap_password = $this->SecureKeyToPassword(env("LDAP_PASSWORD"));

					$ldap_con = ldap_connect($hostname,389);
					ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
					ldap_set_option($ldap_con, LDAP_OPT_REFERRALS, 0);
					ldap_set_option($ldap_con, LDAP_OPT_NETWORK_TIMEOUT, 10);

					if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) 
					{
						$filter = "(samaccountname=".$UserId.")";
					  //$filter="(sAMAccountName=$UserId)";
						$result = @ldap_search($ldap_con,"dc=".env('LDAP_DC1').",dc=".env('LDAP_DC2')."",$filter) or exit("Unable to search");
						$entries = ldap_get_entries($ldap_con, $result);

						if(count($entries)>1)
						{
							$UserName="";
							if(isset($entries[0]["cn"][0]))
							{
								$UserName=$entries[0]["cn"][0];
							}
							$UserEmail="";
							if(isset($entries[0]["mail"][0]))
							{
								$UserEmail=$entries[0]["mail"][0];
							}
							$ContactNum="";
							if(isset($entries[0]["telephonenumber"][0]))
							{
								$ContactNum=$entries[0]["telephonenumber"][0];
							}

							$data=[];
							$data['UserName']=$UserName;
							$data['UserEmail']=$UserEmail;
							$data['ContactNum']=$ContactNum;
							$data['UserId']=$UserId;
							$data['Role']=$UserType;
							$data['CreatedDate']=now();
							$data['Password']="";
							$data['IsActive']=1;
							$data['LdapUser']=1;

							$GetUserData = new GetUserData();
							if($GetUserData->SaveUser($data))
							{
								return redirect("/AddUser")->with('success', 'User has been added successfully.');
							}
							else
							{
								return redirect("/AddUser")->with('failed', 'Unable to save user...');
							}
						}
						else
						{
							return redirect("/AddUser")->with('failed', 'user not found on server...');		
						}
					}
					else
					{
						return redirect("/AddUser")->with('failed', 'Unable to get admin credentials please contact to administrator');
					}	
				}
			}
			else
			{
				return redirect("/AddUser")->with('failed', 'UserId already exists in database...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function UserLogin(Request $request)
	{
		$UserId=$request['UserId'];
		$Password=$request['Password'];
		$UserDataC=GetUserData::where('UserId',$UserId)->count();
		if($UserDataC>0)
		{
			$UserData=GetUserData::where('UserId',$UserId)->select("UserId","UserName","UserEmail","ContactNum","Role","IsActive","LdapUser","Password")->first();
			if($UserData['IsActive']==1)
			{
				if($UserData['LdapUser']==0)
				{
					if($UserData['UserId']==$UserId && $UserData['Password']==$Password)
					{
						if($UserData['UserName']!='' && $UserData['UserEmail']!='' && $UserData['ContactNum']!='')
						{
							$SessionData['UserId']=$UserData['UserId'];
							$SessionData['UserName']=$UserData['UserName'];
							$SessionData['UserEmail']=$UserData['UserEmail'];
							$SessionData['ContactNum']=$UserData['ContactNum'];
							$SessionData['Role']=$UserData['Role'];
							$SessionData['IsActive']=$UserData['IsActive'];
							$SessionData['LdapUser']=$UserData['LdapUser'];
							Session::put('LoginData', $SessionData);
							$LoginLog = new GetLoginLog();
							$Logindata['UserId']=$UserId;
							$Logindata['Status']=1;
							$LoginLog->SaveLoginLog($Logindata);
							if($UserData['Role']==1)
							{
								return redirect("/home");
							}
							else if($UserData['Role']==2)
							{
								return redirect("/CalibrationAnalysis");
							}
							else if($UserData['Role']==3)
							{
								return redirect("/CalibrationVerify");
							}
							else if($UserData['Role']==4)
							{
								return redirect("/CalibrationApprovel");
							}
							else
							{
								return redirect("/home");
							}
						}
						else
						{
							Session::put('TempLoginData', $UserData);
							return redirect("/UserProfile");
						}
					}
					else
					{
						$LoginLog = new GetLoginLog();
						$Logindata['UserId']=$UserId;
						$Logindata['Status']=0;
						$LoginLog->SaveLoginLog($Logindata);
						return redirect("/")->with('failed', 'Login failed ! UserId or Password incorrect');
					}
				}
				else
				{
					$ldap_con = @ldap_connect(env("LDAP_HOSTNAME"));
					ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
					//$ldap_dn = "uid=".$UserId.",dc=".env('LDAP_DC1').",dc=".env('LDAP_DC2');
					$ldap_dn = $UserId."@".env("LDAP_HOSTNAME");
					if(@ldap_bind($ldap_con, $ldap_dn, $Password)) 
					{
						if($UserData['UserName']!='' && $UserData['UserEmail']!='' && $UserData['ContactNum']!='')
						{
							$SessionData['UserId']=$UserData['UserId'];
							$SessionData['UserName']=$UserData['UserName'];
							$SessionData['UserEmail']=$UserData['UserEmail'];
							$SessionData['ContactNum']=$UserData['ContactNum'];
							$SessionData['Role']=$UserData['Role'];
							$SessionData['IsActive']=$UserData['IsActive'];
							$SessionData['LdapUser']=$UserData['LdapUser'];
							Session::put('LoginData', $SessionData);
							$LoginLog = new GetLoginLog();
							$Logindata['UserId']=$UserId;
							$Logindata['Status']=1;
							$LoginLog->SaveLoginLog($Logindata);
							if($UserData['Role']==1)
							{
								return redirect("/home");
							}
							else if($UserData['Role']==2)
							{
								return redirect("/CalibrationAnalysis");
							}
							else if($UserData['Role']==3)
							{
								return redirect("/CalibrationVerify");
							}
							else if($UserData['Role']==4)
							{
								return redirect("/CalibrationApprovel");
							}
							else
							{
								return redirect("/home");
							}
						}
						else
						{
							Session::put('TempLoginData', $UserData);
							return redirect("/UserProfile");
						}
					}
					else
					{
						$LoginLog = new GetLoginLog();
						$Logindata['UserId']=$UserId;
						$Logindata['Status']=0;
						$LoginLog->SaveLoginLog($Logindata);
						return redirect("/")->with('failed', 'Login failed ! UserId or Password not found on server');
					}
				}
			}
			else
			{
				$LoginLog = new GetLoginLog();
				$Logindata['UserId']=$UserId;
				$Logindata['Status']=0;
				$LoginLog->SaveLoginLog($Logindata);
				return redirect("/")->with('failed', 'Login failed ! Your userid is deactive contact to administrator');
			}
		}
		else
		{
			$LoginLog = new GetLoginLog();
			$Logindata['UserId']=$UserId;
			$Logindata['Status']=0;
			$LoginLog->SaveLoginLog($Logindata);
			return redirect("/")->with('failed', 'Login failed ! UserId or Password incorrect');
		}
	}

	function SearchLdapUser($SearchText)
	{
		$hostname=env("LDAP_HOSTNAME");
		$username=$this->SecureKeyToPassword(env("LDAP_ADMIN"));
		$ldap_dn = $username."@".env("LDAP_HOSTNAME");
		$ldap_password = $this->SecureKeyToPassword(env("LDAP_PASSWORD"));

		$ldap_con = ldap_connect($hostname,389);
		ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($ldap_con, LDAP_OPT_REFERRALS, 0);
		ldap_set_option($ldap_con, LDAP_OPT_NETWORK_TIMEOUT, 10);

		if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) 
		{
			$filter = "(samaccountname=".$SearchText."*)";
			$result = @ldap_search($ldap_con,"dc=".env('LDAP_DC1').",dc=".env('LDAP_DC2')."",$filter) or exit("Unable to search");
			$entries = ldap_get_entries($ldap_con, $result);
			if(count($entries)>1)
			{
				//echo"<pre>"; print_r($entries); exit;
				$data=[];
				$i=0;
				foreach($entries as $key=>$user)
				{
					if(isset($entries[$key]['samaccountname'][0]))
					{
						$i=$i+1;
						$data[$i]=$entries[$key]['samaccountname'][0];
					}
				}
				return response()->json($data);
			}
			else
			{
				return"";
			}
		}
		else
		{
			return"";
		}
	}
	*/

	
	function SaveUser(Request $request)
	{
		if(Session::get('LoginData')['Role']==1)
		{
		//echo"<pre>"; print_r($request->all()); exit;
			$UserId=$request['UserId'];
			$UserType=$request['UserType'];
			$LocalUser=0;
			if(isset($request['LocalUser']))
			{
				$LocalUser=$request['LocalUser'];
			}
			$UserDataC=GetUserData::where('UserId',$UserId)->count();
			if($UserDataC<1)
			{
				if($LocalUser==1)
				{
					$data=[];
					$data['UserName']="";
					$data['UserEmail']="";
					$data['ContactNum']="";
					$data['UserId']=$UserId;
					$data['Role']=$UserType;
					$data['CreatedDate']=now();
					$data['Password']=$request['Password'];
					$data['IsActive']=1;
					$data['LdapUser']=0;

					$GetUserData = new GetUserData();
					if($GetUserData->SaveUser($data))
					{
						return redirect("/AddUser")->with('success', 'User has been added successfully.');
					}
					else
					{
						return redirect("/AddUser")->with('failed', 'Unable to save user...');
					}
				}
				else
				{
					$hostname=env("LDAP_HOSTNAME");
					$username=$this->SecureKeyToPassword(env("LDAP_ADMIN"));
					$ldap_dn = "cn=".$username.",dc=".env('LDAP_DC1').",dc=".env('LDAP_DC2');
					$ldap_password = $this->SecureKeyToPassword(env("LDAP_PASSWORD"));

					$ldap_con = ldap_connect($hostname);
					ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

					if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) 
					{
						$filter = "(uid=".$UserId.")";
						$result = ldap_search($ldap_con,"dc=".env('LDAP_DC1').",dc=".env('LDAP_DC2')."",$filter) or exit("Unable to search");
						$entries = ldap_get_entries($ldap_con, $result);

						if(count($entries)>1)
						{
							$UserName="";
							if(isset($entries[0]["cn"][0]))
							{
								$UserName=$entries[0]["cn"][0];
							}
							$UserEmail="";
							if(isset($entries[0]["mail"][0]))
							{
								$UserEmail=$entries[0]["mail"][0];
							}
							$ContactNum="";
							if(isset($entries[0]["telephonenumber"][0]))
							{
								$ContactNum=$entries[0]["telephonenumber"][0];
							}

							$data=[];
							$data['UserName']=$UserName;
							$data['UserEmail']=$UserEmail;
							$data['ContactNum']=$ContactNum;
							$data['UserId']=$UserId;
							$data['Role']=$UserType;
							$data['CreatedDate']=now();
							$data['Password']="";
							$data['IsActive']=1;
							$data['LdapUser']=1;

							$GetUserData = new GetUserData();
							if($GetUserData->SaveUser($data))
							{
								return redirect("/AddUser")->with('success', 'User has been added successfully.');
							}
							else
							{
								return redirect("/AddUser")->with('failed', 'Unable to save user...');
							}
						}
						else
						{
							return redirect("/AddUser")->with('failed', 'user not found on server...');		
						}
					}
					else
					{
						return redirect("/AddUser")->with('failed', 'Unable to get admin credentials please contact to administrator');
					}	
				}
			}
			else
			{
				return redirect("/AddUser")->with('failed', 'UserId already exists in database...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function UserLogin(Request $request)
	{
		$UserId=$request['UserId'];
		$Password=$request['Password'];
		$UserDataC=GetUserData::where('UserId',$UserId)->count();
		if($UserDataC>0)
		{
			$UserData=GetUserData::where('UserId',$UserId)->select("UserId","UserName","UserEmail","ContactNum","Role","IsActive","LdapUser","Password")->first();
			if($UserData['IsActive']==1)
			{
				if($UserData['LdapUser']==0)
				{
					if($UserData['UserId']==$UserId && $UserData['Password']==$Password)
					{
						if($UserData['UserName']!='' && $UserData['UserEmail']!='' && $UserData['ContactNum']!='')
						{
							$SessionData['UserId']=$UserData['UserId'];
							$SessionData['UserName']=$UserData['UserName'];
							$SessionData['UserEmail']=$UserData['UserEmail'];
							$SessionData['ContactNum']=$UserData['ContactNum'];
							$SessionData['Role']=$UserData['Role'];
							$SessionData['IsActive']=$UserData['IsActive'];
							$SessionData['LdapUser']=$UserData['LdapUser'];
							Session::put('LoginData', $SessionData);
							$LoginLog = new GetLoginLog();
							$Logindata['UserId']=$UserId;
							$Logindata['Status']=1;
							$LoginLog->SaveLoginLog($Logindata);
							if($UserData['Role']==1)
							{
								return redirect("/home");
							}
							else if($UserData['Role']==2)
							{
								return redirect("/CalibrationAnalysis");
							}
							else if($UserData['Role']==3)
							{
								return redirect("/CalibrationVerify");
							}
							else if($UserData['Role']==4)
							{
								return redirect("/CalibrationApprovel");
							}
							else
							{
								return redirect("/home");
							}
						}
						else
						{
							Session::put('TempLoginData', $UserData);
							return redirect("/UserProfile");
						}
					}
					else
					{
						$LoginLog = new GetLoginLog();
						$Logindata['UserId']=$UserId;
						$Logindata['Status']=0;
						$LoginLog->SaveLoginLog($Logindata);
						return redirect("/")->with('failed', 'Login failed ! UserId or Password incorrect');
					}
				}
				else
				{
					$ldap_con = @ldap_connect(env("LDAP_HOSTNAME"));
					ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
					$ldap_dn = "uid=".$UserId.",dc=".env('LDAP_DC1').",dc=".env('LDAP_DC2');
					if(@ldap_bind($ldap_con, $ldap_dn, $Password)) 
					{
						if($UserData['UserName']!='' && $UserData['UserEmail']!='' && $UserData['ContactNum']!='')
						{
							$SessionData['UserId']=$UserData['UserId'];
							$SessionData['UserName']=$UserData['UserName'];
							$SessionData['UserEmail']=$UserData['UserEmail'];
							$SessionData['ContactNum']=$UserData['ContactNum'];
							$SessionData['Role']=$UserData['Role'];
							$SessionData['IsActive']=$UserData['IsActive'];
							$SessionData['LdapUser']=$UserData['LdapUser'];
							Session::put('LoginData', $SessionData);
							$LoginLog = new GetLoginLog();
							$Logindata['UserId']=$UserId;
							$Logindata['Status']=1;
							$LoginLog->SaveLoginLog($Logindata);
							if($UserData['Role']==1)
							{
								return redirect("/home");
							}
							else if($UserData['Role']==2)
							{
								return redirect("/CalibrationAnalysis");
							}
							else if($UserData['Role']==3)
							{
								return redirect("/CalibrationVerify");
							}
							else if($UserData['Role']==4)
							{
								return redirect("/CalibrationApprovel");
							}
							else
							{
								return redirect("/home");
							}
						}
						else
						{
							Session::put('TempLoginData', $UserData);
							return redirect("/UserProfile");
						}
					}
					else
					{
						$LoginLog = new GetLoginLog();
						$Logindata['UserId']=$UserId;
						$Logindata['Status']=0;
						$LoginLog->SaveLoginLog($Logindata);
						return redirect("/")->with('failed', 'Login failed ! UserId or Password not found on server');
					}
				}
			}
			else
			{
				$LoginLog = new GetLoginLog();
				$Logindata['UserId']=$UserId;
				$Logindata['Status']=0;
				$LoginLog->SaveLoginLog($Logindata);
				return redirect("/")->with('failed', 'Login failed ! Your userid is deactive contact to administrator');
			}
		}
		else
		{
			$LoginLog = new GetLoginLog();
			$Logindata['UserId']=$UserId;
			$Logindata['Status']=0;
			$LoginLog->SaveLoginLog($Logindata);
			return redirect("/")->with('failed', 'Login failed ! UserId or Password incorrect');
		}
	}
	function SearchLdapUser($SearchText)
	{
		$hostname=env("LDAP_HOSTNAME");
		$username=$this->SecureKeyToPassword(env("LDAP_ADMIN"));
		$ldap_dn = "cn=".$username.",dc=".env('LDAP_DC1').",dc=".env('LDAP_DC2');
		$ldap_password = $this->SecureKeyToPassword(env("LDAP_PASSWORD"));

		$ldap_con = ldap_connect($hostname);
		ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

		if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) 
		{
			$filter = "(uid=".$SearchText."*)";
			$result = ldap_search($ldap_con,"dc=".env('LDAP_DC1').",dc=".env('LDAP_DC2')."",$filter) or exit("Unable to search");
			$entries = ldap_get_entries($ldap_con, $result);

			if(count($entries)>1)
			{
				//echo"<pre>"; print_r($entries); exit;
				$data=[];
				$i=0;
				foreach($entries as $key=>$user)
				{
					if(isset($entries[$key]['uid'][0]))
					{
						$i=$i+1;
						$data[$i]=$entries[$key]['uid'][0];
					}
				}
				return response()->json($data);
			}
			else
			{
				return"";
			}
		}
		else
		{
			return"";
		}
	}
}
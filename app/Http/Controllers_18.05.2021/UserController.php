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
use App\Models\GetDeviceWeightObsMass;
use App\Models\GetCalibrationLineObsMass;
use App\Models\GetMonthlyCalibrationDetails;
use App\Models\GetDevicePositionWeight;
use App\Models\GetCalibrationPositionLine;
use App\Models\GetCalibrationReq;

class UserController extends BaseController
{
	function Index()
	{
		return view('Login');
	}
	function UserProfile()
	{
		if(Session::get('LoginData'))
		{
			$UserId=Session::get('LoginData')['UserId'];
			$UserData=GetUserData::where('UserId',$UserId)->select("UserId","UserName","UserEmail","ContactNum","Role")->get();
			return view('UserProfile',['UserData'=>$UserData]);
		}
		else if(Session::get('TempLoginData'))
		{
			$UserId=Session::get('TempLoginData')['UserId'];
			$UserData=GetUserData::where('UserId',$UserId)->select("UserId","UserName","UserEmail","ContactNum","Role")->get();
			return view('UserProfile',['UserData'=>$UserData]);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function UpdProfile(request $request)
	{
		if(Session::get('LoginData') || Session::get('TempLoginData'))
		{
			//echo"<pre>"; print_r($request->all()); exit;
			$Users = new GetUserData();
			$data=$request;
			if(Session::get('LoginData'))
			{
				$data['UserId']=Session::get('LoginData')['UserId'];
			}
			if(Session::get('TempLoginData'))
			{
				$data['UserId']=Session::get('TempLoginData')['UserId'];
			}
			if($Users->UpdUser($data))
			{
				$UserData=GetUserData::where('UserId',$data['UserId'])->select("UserId","UserName","UserEmail","ContactNum","Role")->first();
				Session::put('LoginData', $UserData);
				$LoginLog = new GetLoginLog();
				$Logindata['UserId']=$data['UserId'];
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
				return redirect("/UpdProfile")->with('failed', 'Unable to update user data...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function Home()
	{
		if(Session::get('LoginData'))
		{
			$totcal=GetCalibration::count();
			$newcal=GetCalibration::where('Status',10)->count();
			$verifiedcal=GetCalibration::where('Status',20)->count();
			$approvedcal=GetCalibration::where('Status',30)->count();
			$declinedcal=GetCalibration::whereIn('Status',[25,40])->count();

			$MainData=[];
			$MainData["totcal"]=$totcal;
			$MainData["newcal"]=$newcal;
			$MainData["verifiedcal"]=$verifiedcal;
			$MainData["approvedcal"]=$approvedcal;
			$MainData["declinedcal"]=$declinedcal;

			// rhl 14-12-2020 //

			$MainData["Calibration"]=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("mcal.CType","calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.AproovelBy","dm.DeviceType","calibration.CalibrationNextDate1")->whereIn('Status',[10,20,30])->where('mcal.CType',2)->where('calibration.CalibrationNextDate1', '>', date('Y-m-d H:i:s'))->get();

			/*$MainData["VerifiedCalibration"]=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("mcal.CType","calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.AproovelBy","dm.DeviceType")->where('Status',20)->where('mcal.CType',2)->get();

			$MainData["ApprovedCalibration"]=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("mcal.CType","calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.AproovelBy","dm.DeviceType")->where('Status',30)->where('mcal.CType',2)->get();*/

			// $MainData["DeclinedCalibration"]=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("mcal.CType","calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.AproovelBy","dm.DeviceType")->whereIn('Status',[25,40])->get();

			// end rhl 14-12-2020 //

			return view('AdminHome',['MainData'=>$MainData]);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function CalibrationHome($cal)
	{
		if(Session::get('LoginData'))
		{
			$totcal=GetCalibration::count();
			$newcal=GetCalibration::where('Status',10)->count();
			$verifiedcal=GetCalibration::where('Status',20)->count();
			$approvedcal=GetCalibration::where('Status',30)->count();
			$declinedcal=GetCalibration::whereIn('Status',[25,40])->count();

			$MainData=[];
			$MainData["totcal"]=$totcal;
			$MainData["newcal"]=$newcal;
			$MainData["verifiedcal"]=$verifiedcal;
			$MainData["approvedcal"]=$approvedcal;
			$MainData["declinedcal"]=$declinedcal;
			$MainData["Calibration"]=[];
			if($cal=="NewCalibration")
			{
				$MainData["Calibration"]=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("mcal.CType","calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.AproovelBy","dm.DeviceType")->where('Status',10)->get();
			}
			if($cal=="VerifiedCalibration")
			{
				$MainData["Calibration"]=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("mcal.CType","calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.AproovelBy","dm.DeviceType")->where('Status',20)->get();
			}
			if($cal=="ApprovedCalibration")
			{
				$MainData["Calibration"]=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("mcal.CType","calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.AproovelBy","dm.DeviceType")->where('Status',30)->get();
			}
			if($cal=="DeclinedCalibration")
			{
				$MainData["Calibration"]=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("mcal.CType","calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.AproovelBy","dm.DeviceType")->whereIn('Status',[25,40])->get();
			}
			return view('AdminHome',['MainData'=>$MainData]);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function AdminHome()
	{
		if(Session::get('LoginData'))
		{
			$totcal=GetCalibration::count();
			$newcal=GetCalibration::where('Status',10)->count();
			$verifiedcal=GetCalibration::where('Status',20)->count();
			$approvedcal=GetCalibration::where('Status',30)->count();
			$declinedcal=GetCalibration::whereIn('Status',[25,40])->count();

			$MainData=[];
			$MainData["totcal"]=$totcal;
			$MainData["newcal"]=$newcal;
			$MainData["verifiedcal"]=$verifiedcal;
			$MainData["approvedcal"]=$approvedcal;
			$MainData["declinedcal"]=$declinedcal;
			return view('AdminHome',['MainData'=>$MainData]);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function GetCalibrationList($fStatus,$fFillter,$FROMDATE,$TODATE)
	{
		$TODATE=date('Y-m-d',strtotime($TODATE . "+1 days"));
		$CalData=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("mcal.CType","calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.AproovelBy","dm.DeviceType")->whereBetween('PerformDate', [$FROMDATE, $TODATE])->orderBy("PerformDate","desc")->get();
			//echo"<pre>"; print_r($CalData->all()); exit;
		$MainData['CalData']=$CalData;
		$MainData['SelectedStatus']=$fStatus;
		$MainData['FilterForm']=$fFillter;
		return view('CalibrationList',['MainData'=>$MainData]);
	}
	function CalibrationAnalysis()
	{
		if(Session::get('LoginData'))
		{
			$FROMDATE=date('Y-m-d', strtotime(date('Y-m-d') . ' -7 day'));
			$TODATE=date('Y-m-d', strtotime(date('Y-m-d') . ' +0 day'));
			return $this->GetCalibrationList("New","CalibrationAnalysis",$FROMDATE,$TODATE);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function CalibrationAnalysisFilter(request $request)
	{
		if(Session::get('LoginData'))
		{
			$FROMDATE=$request['FROMDATE'];
			$TODATE=$request['TODATE'];
			return $this->GetCalibrationList("New","CalibrationAnalysis",$FROMDATE,$TODATE);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function CalibrationVerify()
	{
		if(Session::get('LoginData'))
		{
			$FROMDATE=date('Y-m-d', strtotime(date('Y-m-d') . ' -7 day'));
			$TODATE=date('Y-m-d', strtotime(date('Y-m-d') . ' +0 day'));
			return $this->GetCalibrationList("New","CalibrationVerify",$FROMDATE,$TODATE);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function CalibrationVerifyFilter(request $request)
	{
		if(Session::get('LoginData'))
		{
			$FROMDATE=$request['FROMDATE'];
			$TODATE=$request['TODATE'];
			return $this->GetCalibrationList("New","CalibrationVerify",$FROMDATE,$TODATE);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function CalibrationApprovel()
	{
		if(Session::get('LoginData'))
		{
			$FROMDATE=date('Y-m-d', strtotime(date('Y-m-d') . ' -7 day'));
			$TODATE=date('Y-m-d', strtotime(date('Y-m-d') . ' +0 day'));
			return $this->GetCalibrationList("Verify","CalibrationApprovel",$FROMDATE,$TODATE);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function CalibrationApprovelFilter(request $request)
	{
		if(Session::get('LoginData'))
		{
			$FROMDATE=$request['FROMDATE'];
			$TODATE=$request['TODATE'];
			return $this->GetCalibrationList("Verify","CalibrationApprovel",$FROMDATE,$TODATE);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function AddCalibration()
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{

				return view("AddCalibration");
			}
			else
			{
				return redirect("/home")->with('failed', 'Unable to access add calibration page...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function AddMonthlyCalibration()
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{

				return view("AddMonthlyCalibration");
			}
			else
			{
				return redirect("/home")->with('failed', 'Unable to access add calibration page...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function AddMGMonthlyCalibration()
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{

				return view("AddMGMonthlyCalibration");
			}
			else
			{
				return redirect("/home")->with('failed', 'Unable to access add calibration page...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function AjaxGetInstrument($cid)
	{
		if(Session::get('LoginData'))
		{
			$sub_data=GetInstrumentMaster::where('IsActive',1)->get();
			return response()->json($sub_data);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function AjaxGetDeviceType($cid)
	{
		if(Session::get('LoginData'))
		{
			$sub_data=GetDeviceMaster::where('InstrumentId',$cid)->where('IsActive',1)->where("DeviceType",1)->get();
			return response()->json($sub_data);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function AjaxGetDeviceTypeAdmin($cid)
	{
		if(Session::get('LoginData'))
		{
			$sub_data=GetDeviceMaster::where('InstrumentId',$cid)->where('IsActive',1)->get();
			return response()->json($sub_data);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function AjaxGetDeviceType1($cid)
	{
		if(Session::get('LoginData'))
		{
			$sub_data=GetDeviceMaster::where('InstrumentId',$cid)->where('IsActive',1)->where("DeviceType",2)->get();
			return response()->json($sub_data);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function AjaxGetDeviceTypeText($did)
	{
		if(Session::get('LoginData'))
		{
			$caldata=GetDeviceMaster::where('RecId',$did)->select("DeviceType")->first();
			if($caldata->DeviceType==1)
			{
				$DeviceTypeText="gm";
			}
			elseif($caldata->DeviceType==2)
			{
				$DeviceTypeText="mg";
			}
			else
			{
				$DeviceTypeText=" ";
			}
			return $DeviceTypeText;
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function AjaxGetDeviceValue($jsondata)
	{
		if(Session::get('LoginData'))
		{
			$Jdata=json_decode($jsondata,true);
			$data=GetDeviceMaster::where('RecId',$Jdata["DeviceType"])->get();
			$data1=GetCalibrationForm::join('calibrationformtype as CalType', 'CalType.RecId', '=', 'CType')->where('calibrationform.RecId',$Jdata["CalibrationMethod"])->get();
			$firstdata=[];
			if(count($data)>0 && count($data1)>0)
			{
				$firstdata['Make']=$data[0]['Make'];
				$firstdata['Model']=$data[0]['Model'];
				$firstdata['DeviceFilePath']=str_replace('\\',"*",$data[0]['DirPath']);
				$Days=$data1[0]['DayAdd'];
				$times=strtotime("+$Days day");
				$firstdata['DayAdd']=date("Y-m-d H:i",$times);
			}
			$MainData['firstdata']=$firstdata;
			$data1=GetDeviceWeight::join('calibrationformtype as cft', 'deviceweight.CalibrationTypeId', '=', 'cft.RecId')->join('calibrationform as cf', 'cft.RecId', '=', 'cf.CType')->where('deviceweight.DeviceId',$Jdata["DeviceType"])->where('deviceweight.InstrumentId',$Jdata["InstrumentID"])->where('cf.RecId',$Jdata["CalibrationMethod"])->get();
			$MainData['seconddata']=$data1;
			$MainData['Decimal'] = DB::table('decimal_settings')->get();
			return response()->json($MainData);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function AjaxGetFileData($FilePath)
	{
		if(Session::get('LoginData'))
		{
			$MainData=[];
			$FilePath=str_replace('*','\\',$FilePath);
			$mg=0;
			$NegativeVal=0;
			$files = array_merge(glob("$FilePath/*.txt"));
			$files = array_combine($files, array_map("filemtime", $files));
			arsort($files);
			$latest_file = key($files);
			$myfile = fopen($latest_file, "r") or die("Unable to open file!");
			while(!feof($myfile)) {
				$readfile=fgets($myfile);
				if(strpos($readfile, "Weight") !== false){
					foreach(explode(" ",$readfile) as $val)
					{
						if($val=="-")
						{
							$NegativeVal=1;
						}
						if(is_numeric($val))
						{
							$mg=$val;
						}
					}
				}
			}
			fclose($myfile);
			//return $mg;
			if($NegativeVal>0)
			{
				$mg="-".$mg;
			}
			$MainData['mg']=number_format($mg,5);
			$MainData['Tfile']=basename($latest_file, ".txt").".txt";
			$MainData['Ifile']=basename($latest_file, ".txt").".bmp";

			$newfile = public_path().'/Doc/'.basename($latest_file, ".txt").'.txt';
			copy($latest_file, $newfile);
			$newfile1 = public_path().'/Doc/'.basename($latest_file, ".txt").'.bmp';
			copy(str_replace("txt","bmp",$latest_file), $newfile1);

			return response()->json($MainData);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function CheckAvailableCalibration($data)
	{
		if(Session::get('LoginData'))
		{
			$Jdata=json_decode($data,true);

			$CalData=GetCalibration::join('usermaster as um', 'calibration.PerformedBy', '=', 'um.UserId')->select("um.UserName")->whereDate('calibration.PerformDate',date('Y-m-d'))->where("RePerform","!=",10)->where('calibration.CalibrationId',$Jdata['CalibrationMethod'])->where('calibration.InstrumentId',$Jdata['InstrumentID'])->where('calibration.DeviceId',$Jdata['DeviceType']);
			if($CalData->count()>0)
			{
				$todaycalby=$CalData->first()['UserName'];
				return "Calibration form already added by ".$todaycalby."<form action='".url('RePerformReq')."' method='post' class='ReperformArea'><input type='hidden' value='".csrf_token()."' name='_token' /><input type='hidden' name='RCalibrationId' value='".$Jdata['CalibrationMethod']."' /><input type='hidden' name='RInstrumentId' value='".$Jdata['InstrumentID']."' /><input type='hidden' name='RDeviceId' value='".$Jdata['DeviceType']."' /><button class='btn btn-primary btnreperform' type='submit'>Re-Perform</button></form>";
			}
			else
			{
				return 1;
			}

		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SaveCalibration(Request $request)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$CalCount=GetCalibration::join('usermaster as um', 'calibration.PerformedBy', '=', 'um.UserId')->select("um.UserName")->whereDate('calibration.CalibrationDate',date('Y-m-d'))->where("RePerform","!=",10)->where('calibration.CalibrationId',$request['CalibrationMethod'])->where('calibration.InstrumentId',$request['InstrumentID'])->where('calibration.DeviceId',$request['DeviceType']);
				if($CalCount->count()>0)
				{
					$todaycalby=$CalCount->first()['UserName'];
					return redirect("/AddCalibration")->with('failed', 'Calibration form already added by '.$todaycalby);
				}
				else
				{
					//echo"<pre>"; print_r($request->all()); exit;
					$Calibration = new GetCalibration();
					$CalibrationLine = new GetCalibrationLine();
					$data=$request;
					$data['PerformedBy']=Session::get('LoginData')['UserId'];
					//echo $Calibration->insertGetId($data);
					$CalId=$Calibration->SaveCalibration($data);
					if($CalId>0)
					{
						$CalLineDt=[];
						foreach ($request['LineId'] as $key => $val) {
							if($request['DispWeight'][$key]!="" && $request['DifferentAB'][$key]!="" && $request['Result'][$key]!="")
							{
								$LineData['RefRecId']=$CalId;
								$LineData['LineId']=$request['LineId'][$key];
								$LineData['Type']=0;
								$LineData['StWeight']=$request['StWeight'][$key];
								$LineData['CertWeight']=$request['CertWeight'][$key];
								$LineData['DispWeight']=$request['DispWeight'][$key];
								$LineData['DiffWeight']=$request['DifferentAB'][$key];
								$LineData['AccpWeight']=$request['AccpWeight'][$key];
								if($request['Result'][$key]=="Fails")
								{
									$LineData['Result']=2;
								}
								else if($request['Result'][$key]=="Passes")
								{
									$LineData['Result']=1;
								}
								else
								{
									$LineData['Result']=0;
								}
								$LineData['Tfile']=$request['Tfile'][$key];
								$LineData['Ifile']=$request['Ifile'][$key];
								$LineData['CreatedBy']=Session::get('LoginData')['UserId'];
								$CalLineDt[$key]=$LineData;
							}
						}
						$CalibrationLine->SaveCalibrationlLine($CalLineDt);

						//Calibration Comment
						if(Session::get('CommentsData'))
						{
							if(count(Session::get('CommentsData'))>0)
							{
								$CalibrationComment = new GetCalibrationComment();
								$CommentsData=Session::get('CommentsData');
								$CalCommentDt=[];
								for($i=0; $i<count($CommentsData); $i++)
								{
									if($CommentsData[$i]['FormId']==$data['FormId'])
									{
										$CalLineData=GetCalibrationLine::where('RefRecId',$CalId)->where('LineId', $CommentsData[$i]['LineId'])->get();
										$Jdata['LineRecId']=$CalLineData[0]['RecId'];
										$Jdata['RefRecId']=$CalId;
										$Jdata['Type']=1;
										$Jdata['CalibrationStatus']=10;
										$Jdata['Comments']=$CommentsData[$i]['Comments'];
										$Jdata['CreatedBy']=Session::get('LoginData')['UserId'];
										$Jdata['CreatedDate']=$CommentsData[$i]['CreatedDate'];
										$CalCommentDt[$i]=$Jdata;
									}
								}
								$CalibrationComment->InsertCalibrationComment($CalCommentDt);
							}
							Session::put('CommentsData', "");
						}

					//Mail Sent code
						$MailData=[];
						$MailData['FormId']=$request['FormId'];
						$CalibrationName=GetCalibrationForm::where('RecId',$request['CalibrationMethod'])->select("Name")->get();
						$MailData['CalibrationMethod']=$CalibrationName[0]['Name'];
						$InstrumentName=GetInstrumentMaster::where('RecId',$request['InstrumentID'])->select("Name")->get();
						$MailData['InstrumentID']=$InstrumentName[0]['Name'];
						$DeviceName=GetDeviceMaster::where('RecId',$request['DeviceType'])->select("Name")->get();
						$MailData['DeviceType']=$DeviceName[0]['Name'];
						$MailData['Make']=$request['Make'];
						$MailData['Model']=$request['Model'];
						$MailData['CalibratedDate']=$request['CalibratedDate'];
						$MailData['NextCalibratedDate']=$request['NextCalibratedDate'];
						if($request['BalanceChecked']==1)
						{
							$MailData['BalanceChecked']="Yes";
						}
						else if($request['BalanceChecked']==2)
						{
							$MailData['BalanceChecked']="No";
						}
						else
						{
							$MailData['BalanceChecked']=" ";
						}

						if($request['InternalCalibration']==1)
						{
							$MailData['InternalCalibration']="Passes";
						}
						else if($request['InternalCalibration']==2)
						{
							$MailData['InternalCalibration']="Fails";
						}
						else
						{
							$MailData['InternalCalibration']=" ";
						}

						$MailData['url'] = "<p><b>View Form :</b> <a href='".url('ViewCalibration/'.$CalId)."' target='_blank'>Click Here</a></p>";

						$VerifyUsers=GetUserData::where('Role',3)->select("UserId","UserName","UserEmail","ContactNum","Role")->where("UserEmail","!=","")->get();
						foreach ($VerifyUsers as $key => $val)
						{
							if($val->UserEmail!='' && strpos($val->UserEmail, '.') !== false && strpos($val->UserEmail, '@') !== false)
							{
								$MailData['Email']=$val->UserEmail;
								$MailData['UserName']=$val->UserName;

								Mail::send([],[], function ($message)  use ($MailData) {
									$message->to($MailData['Email'], $MailData['UserName'])->subject('New Form Added on Calibration App');
									//$message->from('reminderzilla.supp@gmail.com','Online Registration Portal');
									$message->setBody("<p><b>Daily Calibration :</b> </p><p><b>Form ID :</b> ".$MailData['FormId']."</p><p><b>Calibration Method :</b> ".$MailData['CalibrationMethod']."</p><p><b>Instrument :</b> ".$MailData['InstrumentID']."</p><p><b>Device :</b> ".$MailData['DeviceType']."</p><p><b>Make :</b> ".$MailData['Make']."</p><p><b>Model :</b> ".$MailData['Model']."</p><p><b>Calibrated on :</b> ".$MailData['CalibratedDate']."</p><p><b>Next Calibration on :</b> ".$MailData['NextCalibratedDate']."</p><p><b>Spirit level of Balance Checked :</b> ".$MailData['BalanceChecked']."</p><p><b>Internal Calibration :</b> ".$MailData['InternalCalibration']."</p>".$MailData['url'],"text/html");
								});
							}
						}

						if (Mail::failures()) {
							return redirect("/AddCalibration")->with('failed', 'Mail Server Bad Request Error');
						}
						else
						{
							return redirect("/AddCalibration")->with('success', 'Data has been saved successfully');
						}
					}
					else
					{
						return redirect("/AddCalibration")->with('failed', 'Unable to save...');
					}
				}
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SaveMonthlyCalibration(Request $request)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$CalCount=GetCalibration::join('usermaster as um', 'calibration.PerformedBy', '=', 'um.UserId')->select("um.UserName")->whereDate('calibration.CalibrationDate',date('Y-m-d'))->where("RePerform","!=",10)->where('calibration.CalibrationId',$request['CalibrationMethod'])->where('calibration.InstrumentId',$request['InstrumentID'])->where('calibration.DeviceId',$request['DeviceType']);
				if($CalCount->count()>0)
				{
					$todaycalby=$CalCount->first()['UserName'];
					return redirect("/AddMonthlyCalibration")->with('failed', 'Calibration form already added by '.$todaycalby);
				}
				else
				{
					//echo"<pre>"; print_r($request->all()); exit;
					$Calibration = new GetCalibration();
					$CalibrationLine = new GetCalibrationLine();
					$data=$request;
					$data['PerformedBy']=Session::get('LoginData')['UserId'];
					//echo $Calibration->insertGetId($data);
					$CalId=$Calibration->SaveMonthlyCalibration($data);
					if($CalId>0)
					{
						$CalLineDt=[];
						foreach ($request['LineId'] as $key => $val)
						{
							if($request['DispWeight'][$key]!="" && $request['DifferentAB'][$key]!="" && $request['Result'][$key]!="")
							{
								$LineData['RefRecId']=$CalId;
								$LineData['LineId']=$request['LineId'][$key];
								$LineData['Type']=0;
								$LineData['StWeight']=$request['StWeight'][$key];
								$LineData['CertWeight']=$request['CertWeight'][$key];
								$LineData['DispWeight']=$request['DispWeight'][$key];
								$LineData['DiffWeight']=$request['DifferentAB'][$key];
								$LineData['AccpWeight']=$request['AccpWeight'][$key];
								if($request['Result'][$key]=="Fails")
								{
									$LineData['Result']=2;
								}
								else if($request['Result'][$key]=="Passes")
								{
									$LineData['Result']=1;
								}
								else
								{
									$LineData['Result']=0;
								}
								$LineData['Tfile']=$request['Tfile'][$key];
								$LineData['Ifile']=$request['Ifile'][$key];
								$LineData['CreatedBy']=Session::get('LoginData')['UserId'];
								$CalLineDt[$key]=$LineData;
							}
						}
						$CalibrationLine->SaveCalibrationlLine($CalLineDt);

						//Negative Data Save
						$CalLineDt=[];
						foreach ($request['NegativeLineId'] as $key => $val)
						{
							if($request['NegativeDispWeight'][$key]!="" && $request['NegativeDifferentAB'][$key]!="" && $request['NegativeResult'][$key]!="")
							{
								$LineData['RefRecId']=$CalId;
								$LineData['LineId']=$request['NegativeLineId'][$key];
								$LineData['Type']=1;
								$LineData['StWeight']=$request['NegativeStWeight'][$key];
								$LineData['CertWeight']=$request['NegativeCertWeight'][$key];
								$LineData['DispWeight']=$request['NegativeDispWeight'][$key];
								$LineData['DiffWeight']=$request['NegativeDifferentAB'][$key];
								$LineData['AccpWeight']=$request['NegativeAccpWeight'][$key];
								if($request['Result'][$key]=="Fails")
								{
									$LineData['Result']=2;
								}
								else if($request['NegativeResult'][$key]=="Passes")
								{
									$LineData['Result']=1;
								}
								else
								{
									$LineData['Result']=0;
								}
								$LineData['Tfile']=$request['NegativeTfile'][$key];
								$LineData['Ifile']=$request['NegativeIfile'][$key];
								$LineData['CreatedBy']=Session::get('LoginData')['UserId'];
								$CalLineDt[$key]=$LineData;
							}
						}
						$CalibrationLine->SaveCalibrationlLine($CalLineDt);
						//Calibration Comment
						if(Session::get('CommentsData'))
						{
							if(count(Session::get('CommentsData'))>0)
							{
								$CalibrationComment = new GetCalibrationComment();
								$CommentsData=Session::get('CommentsData');
								$CalCommentDt=[];

								for($i=0; $i<count($CommentsData); $i++)
								{
									if($CommentsData[$i]['FormId']==$data['FormId'])
									{
										$CalLineData=GetCalibrationLine::where('RefRecId',$CalId)->where('LineId', $CommentsData[$i]['LineId'])->get();
										$Jdata['LineRecId']=$CalLineData[0]['RecId'];
										$Jdata['RefRecId']=$CalId;
										$Jdata['CalibrationStatus']=10;
										$Jdata['Type']=2;
										$Jdata['Comments']=$CommentsData[$i]['Comments'];
										$Jdata['CreatedBy']=Session::get('LoginData')['UserId'];
										$Jdata['CreatedDate']=$CommentsData[$i]['CreatedDate'];
										$CalCommentDt[$i]=$Jdata;
									}
								}
								$CalibrationComment->InsertCalibrationComment($CalCommentDt);
							}
							Session::put('CommentsData', "");
						}

					//Mail Sent code
						$MailData=[];
						$MailData['FormId']=$request['FormId'];
						$CalibrationName=GetCalibrationForm::where('RecId',$request['CalibrationMethod'])->select("Name")->get();
						$MailData['CalibrationMethod']=$CalibrationName[0]['Name'];
						$InstrumentName=GetInstrumentMaster::where('RecId',$request['InstrumentID'])->select("Name")->get();
						$MailData['InstrumentID']=$InstrumentName[0]['Name'];
						$DeviceName=GetDeviceMaster::where('RecId',$request['DeviceType'])->select("Name")->get();
						$MailData['DeviceType']=$DeviceName[0]['Name'];
						$MailData['Make']=$request['Make'];
						$MailData['Model']=$request['Model'];
						$MailData['CalibratedDate']=$request['CalibratedDate'];
						$MailData['NextCalibratedDate']=$request['NextCalibratedDate'];

						$MailData['url'] = "<p><b>View Form :</b> <a href='".url('ViewMonthlyCalibration/'.$CalId)."' target='_blank'>Click Here</a></p>";

						$VerifyUsers=GetUserData::where('Role',3)->select("UserId","UserName","UserEmail","ContactNum","Role")->where("UserEmail","!=","")->get();
						foreach ($VerifyUsers as $key => $val)
						{
							if($val->UserEmail!='' && strpos($val->UserEmail, '.') !== false && strpos($val->UserEmail, '@') !== false)
							{
								$MailData['Email']=$val->UserEmail;
								$MailData['UserName']=$val->UserName;

								Mail::send([],[], function ($message)  use ($MailData) {
									$message->to($MailData['Email'], $MailData['UserName'])->subject('New Form Added on Calibration App');
								//$message->from('reminderzilla.supp@gmail.com','Online Registration Portal');
									$message->setBody("<p><b>Monthly Calibration :</b> </p><p><b>Form ID :</b> ".$MailData['FormId']."</p><p><b>Calibration Method :</b> ".$MailData['CalibrationMethod']."</p><p><b>Instrument :</b> ".$MailData['InstrumentID']."</p><p><b>Device :</b> ".$MailData['DeviceType']."</p><p><b>Make :</b> ".$MailData['Make']."</p><p><b>Model :</b> ".$MailData['Model']."</p><p><b>Calibrated on :</b> ".$MailData['CalibratedDate']."</p><p><b>Next Calibration on :</b></p>".$MailData['url'],"text/html");
								});
							}
						}

						if (Mail::failures()) {
							return redirect("/AddMonthlyCalibration")->with('failed', 'Mail Server Bad Request Error');
						}
						else
						{
							return redirect("/CalibrationDetails/$CalId")->with('success', 'Calibration form has been added continue fill data');
						}
					}
					else
					{
						return redirect("/AddMonthlyCalibration")->with('failed', 'Unable to save...');
					}
				}
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SaveMGMonthlyCalibration(Request $request)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$CalCount=GetCalibration::join('usermaster as um', 'calibration.PerformedBy', '=', 'um.UserId')->select("um.UserName")->whereDate('calibration.CalibrationDate',date('Y-m-d'))->where("RePerform","!=",10)->where('calibration.CalibrationId',$request['CalibrationMethod'])->where('calibration.InstrumentId',$request['InstrumentID'])->where('calibration.DeviceId',$request['DeviceType']);
				if($CalCount->count()>0)
				{
					$todaycalby=$CalCount->first()['UserName'];
					return redirect("/AddMonthlyCalibration")->with('failed', 'Calibration form already added by '.$todaycalby);
				}
				else
				{
					//echo"<pre>"; print_r($request->all()); exit;
					$Calibration = new GetCalibration();
					$data=$request;
					$data['PerformedBy']=Session::get('LoginData')['UserId'];
					$CalId=$Calibration->SaveMonthlyCalibration($data);
					if($CalId>0)
					{
						//Mail Sent code
						$MailData=[];
						$MailData['FormId']=$request['FormId'];
						$CalibrationName=GetCalibrationForm::where('RecId',$request['CalibrationMethod'])->select("Name")->get();
						$MailData['CalibrationMethod']=$CalibrationName[0]['Name'];
						$InstrumentName=GetInstrumentMaster::where('RecId',$request['InstrumentID'])->select("Name")->get();
						$MailData['InstrumentID']=$InstrumentName[0]['Name'];
						$DeviceName=GetDeviceMaster::where('RecId',$request['DeviceType'])->select("Name")->get();
						$MailData['DeviceType']=$DeviceName[0]['Name'];
						$MailData['Make']=$request['Make'];
						$MailData['Model']=$request['Model'];
						$MailData['CalibratedDate']=$request['CalibratedDate'];
						$MailData['NextCalibratedDate']=$request['NextCalibratedDate'];

						$MailData['url'] = "<p><b>View Form :</b> <a href='".url('ViewMonthlyCalibrationMG/'.$CalId)."' target='_blank'>Click Here</a></p>";

						$VerifyUsers=GetUserData::where('Role',3)->select("UserId","UserName","UserEmail","ContactNum","Role")->where("UserEmail","!=","")->get();
						foreach ($VerifyUsers as $key => $val)
						{
							if($val->UserEmail!='' && strpos($val->UserEmail, '.') !== false && strpos($val->UserEmail, '@') !== false)
							{
								$MailData['Email']=$val->UserEmail;
								$MailData['UserName']=$val->UserName;

								Mail::send([],[], function ($message)  use ($MailData) {
									$message->to($MailData['Email'], $MailData['UserName'])->subject('New Form Added on Calibration App');
								//$message->from('reminderzilla.supp@gmail.com','Online Registration Portal');
									$message->setBody("<p><b>Monthly Calibration :</b> </p><p><b>Form ID :</b> ".$MailData['FormId']."</p><p><b>Calibration Method :</b> ".$MailData['CalibrationMethod']."</p><p><b>Instrument :</b> ".$MailData['InstrumentID']."</p><p><b>Device :</b> ".$MailData['DeviceType']."</p><p><b>Make :</b> ".$MailData['Make']."</p><p><b>Model :</b> ".$MailData['Model']."</p><p><b>Calibrated on :</b> ".$MailData['CalibratedDate']."</p><p><b>Next Calibration on :</b></p>".$MailData['url'],"text/html");
								});
							}
						}

						if (Mail::failures()) {
							return redirect("/AddMGMonthlyCalibration")->with('failed', 'Mail Server Bad Request Error');
						}
						else
						{
							return redirect("/MGCalibrationDetails/$CalId")->with('success', 'Calibration form has been added continue fill data');
						}
					}
					else
					{
						return redirect("/AddMGMonthlyCalibration")->with('failed', 'Unable to save...');
					}
				}
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function CalibrationDetails($cid)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$MainData=[];
				$CalData=GetCalibration::where('RecId',$cid)->get();
				$MainData['CalData']=$CalData;
				$MainData['DeviceWeightObsMass']=GetDeviceWeightObsMass::join('calibrationformtype as cft', 'DeviceWeightObsMass.CalibrationTypeId', '=', 'cft.RecId')->join('calibrationform as cf', 'cft.RecId', '=', 'cf.CType')->where('DeviceWeightObsMass.DeviceId',$CalData[0]->DeviceId)->where('DeviceWeightObsMass.InstrumentId',$CalData[0]->InstrumentId)->where('cf.RecId',$CalData[0]->CalibrationId)->get();
				$MainData['Decimal'] = DB::table('decimal_settings')->get();
				return view('CalibrationDetails',['MainData'=>$MainData]);
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function MGCalibrationDetails($cid)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$MainData=[];
				$CalData=GetCalibration::where('RecId',$cid)->get();
				$MainData['CalData']=$CalData;
				$MainData['DeviceWeightObsMass']=GetDeviceWeightObsMass::join('calibrationformtype as cft', 'DeviceWeightObsMass.CalibrationTypeId', '=', 'cft.RecId')->join('calibrationform as cf', 'cft.RecId', '=', 'cf.CType')->where('DeviceWeightObsMass.DeviceId',$CalData[0]->DeviceId)->where('DeviceWeightObsMass.InstrumentId',$CalData[0]->InstrumentId)->where('cf.RecId',$CalData[0]->CalibrationId)->get();
				$MainData['Decimal'] = DB::table('decimal_settings')->get();
				return view('MGCalibrationDetails',['MainData'=>$MainData]);
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SaveMonthlyCalibrationP2(Request $request)
	{
		//echo"<pre>"; print_r($request->all()); exit;
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$CalId=$request['cid'];
				$CalibrationLine = new GetCalibrationLineObsMass();
				$CalibrationDetails = new GetMonthlyCalibrationDetails();
				$CalLineDt=[];
				foreach ($request['LineId'] as $key => $val)
				{
					if($request['StWeight'][$key]!="" && $request['ObsMass'][$key]!="")
					{
						$LineData['RefRecId']=$CalId;
						$LineData['LineId']=$request['LineId'][$key];
						$LineData['StWeight']=$request['StWeight'][$key];
						$LineData['ObsMass']=$request['ObsMass'][$key];
						$LineData['Tfile']=$request['Tfile'][$key];
						$LineData['Ifile']=$request['Ifile'][$key];
						$LineData['Type']=0;
						$LineData['CreatedBy']=Session::get('LoginData')['UserId'];

						$CalLineDt[$key]=$LineData;
					}
				}
				if($CalibrationLine->SaveCalibrationLineObsMass($CalLineDt))
				{
					$calDetails['RefRecId']=$CalId;
					$calDetails['SD1']=$request['StandardDeviation'];
					$calDetails['AcceptanceCriteria']=$request['AcceptanceCriteria'];
					$calDetails['CompliesAcceptanceCriteria']=0;
					if(isset($request['RdoComplies']))
					{
						$calDetails['CompliesAcceptanceCriteria']=$request['RdoComplies'];
					}
					$calDetails['AverageMass']=$request['AverageMass'];
					$calDetails['SD2']=$request['StandardMass'];
					$calDetails['CreatedBy']=Session::get('LoginData')['UserId'];

					$calmonthdata=GetMonthlyCalibrationDetails::where("RefRecId",$CalId);
					$editmaintable=0;
					if($calmonthdata->count()>0)
					{
						$editmaintable=$CalibrationDetails->UpdCalibrationDetails($calDetails);
					}
					else
					{
						$editmaintable=$CalibrationDetails->SaveCalibrationDetails($calDetails);
					}

					if($editmaintable)
					{
						if(Session::get('CommentsData'))
						{
							if(count(Session::get('CommentsData'))>0)
							{
								$CalibrationComment = new GetCalibrationComment();
								$CommentsData=Session::get('CommentsData');
								$CalCommentDt=[];
								for($i=0; $i<count($CommentsData); $i++)
								{
									if($CommentsData[$i]['FormId']==$request['FormId'])
									{
										$CalLineData=GetCalibrationLineObsMass::where('RefRecId',$CalId)->where('LineId', $CommentsData[$i]['LineId'])->get();
										$Jdata['LineRecId']=$CalLineData[0]['RecId'];
										$Jdata['RefRecId']=$CalId;
										$Jdata['Type']=4;
										$Jdata['CalibrationStatus']=10;
										$Jdata['Comments']=$CommentsData[$i]['Comments'];
										$Jdata['CreatedBy']=Session::get('LoginData')['UserId'];
										$Jdata['CreatedDate']=$CommentsData[$i]['CreatedDate'];
										$CalCommentDt[$i]=$Jdata;
									}
								}
								$CalibrationComment->InsertCalibrationComment($CalCommentDt);
							}
							Session::put('CommentsData', "");
						}
						return redirect("/CalibrationDetails1/$CalId")->with('success', 'Calibration Details has been added continue fill data');
					}
					else
					{
						return redirect("/CalibrationDetails/$CalId")->with('failed', 'Calibration Details added failed...');
					}
				}
				else
				{
					return redirect("/CalibrationDetails/$CalId")->with('failed', 'Calibration Details added failed...');
				}
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SaveMonthlyCalibrationP2MG(Request $request)
	{
		//echo"<pre>"; print_r($request->all()); exit;
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$CalId=$request['cid'];
				$CalibrationLine = new GetCalibrationLineObsMass();
				$CalibrationDetails = new GetMonthlyCalibrationDetails();
				$CalLineDt=[];
				foreach ($request['LineId'] as $key => $val)
				{
					if($request['StWeight'][$key]!="" && $request['ObsMass'][$key]!="")
					{
						$LineData['RefRecId']=$CalId;
						$LineData['LineId']=$request['LineId'][$key];
						$LineData['StWeight']=$request['StWeight'][$key];
						$LineData['ObsMass']=$request['ObsMass'][$key];
						$LineData['Tfile']=$request['Tfile'][$key];
						$LineData['Ifile']=$request['Ifile'][$key];
						$LineData['Type']=0;
						$LineData['CreatedBy']=Session::get('LoginData')['UserId'];

						$CalLineDt[$key]=$LineData;
					}
				}
				if($CalibrationLine->SaveCalibrationLineObsMass($CalLineDt))
				{
					$calDetails['RefRecId']=$CalId;
					$calDetails['SD1']=$request['StandardDeviation'];
					$calDetails['AcceptanceCriteria']=$request['AcceptanceCriteria'];
					$calDetails['CompliesAcceptanceCriteria']=0;
					if(isset($request['RdoComplies']))
					{
						$calDetails['CompliesAcceptanceCriteria']=$request['RdoComplies'];
					}
					$calDetails['AverageMass']=$request['AverageMass'];
					$calDetails['SD2']=$request['StandardMass'];
					$calDetails['CreatedBy']=Session::get('LoginData')['UserId'];

					$calmonthdata=GetMonthlyCalibrationDetails::where("RefRecId",$CalId);
					$editmaintable=0;
					if($calmonthdata->count()>0)
					{
						$editmaintable=$CalibrationDetails->UpdCalibrationDetails($calDetails);
					}
					else
					{
						$editmaintable=$CalibrationDetails->SaveCalibrationDetails($calDetails);
					}

					if($editmaintable)
					{
						if(Session::get('CommentsData'))
						{
							if(count(Session::get('CommentsData'))>0)
							{
								$CalibrationComment = new GetCalibrationComment();
								$CommentsData=Session::get('CommentsData');
								$CalCommentDt=[];
								for($i=0; $i<count($CommentsData); $i++)
								{
									if($CommentsData[$i]['FormId']==$request['FormId'])
									{
										$CalLineData=GetCalibrationLineObsMass::where('RefRecId',$CalId)->where('LineId', $CommentsData[$i]['LineId'])->get();
										$Jdata['LineRecId']=$CalLineData[0]['RecId'];
										$Jdata['RefRecId']=$CalId;
										$Jdata['Type']=4;
										$Jdata['CalibrationStatus']=10;
										$Jdata['Comments']=$CommentsData[$i]['Comments'];
										$Jdata['CreatedBy']=Session::get('LoginData')['UserId'];
										$Jdata['CreatedDate']=$CommentsData[$i]['CreatedDate'];
										$CalCommentDt[$i]=$Jdata;
									}
								}
								$CalibrationComment->InsertCalibrationComment($CalCommentDt);
							}
							Session::put('CommentsData', "");
						}
						return redirect("/AddMGMonthlyCalibration")->with('success', 'Calibration Details has been added successfully');
					}
					else
					{
						return redirect("/MGCalibrationDetails/$CalId")->with('failed', 'Calibration Details added failed...');
					}
				}
				else
				{
					return redirect("/MGCalibrationDetails/$CalId")->with('failed', 'Calibration Details added failed...');
				}
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SaveMonthlyCalibrationP3(Request $request)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$CalId=$request['cid'];
				$CalibrationLine = new GetCalibrationPositionLine();
				$CalibrationDetails = new GetMonthlyCalibrationDetails();
				$CalLineDt=[];
				foreach ($request['LineId'] as $key => $val)
				{
					if($request['PositionWeight'][$key]!="" && $request['StandardWeight'][$key]!="" && $request['ActualMass'][$key]!="" && $request['ObserverMass'][$key]!="")
					{
						$LineData['RefRecId']=$CalId;
						$LineData['LineId']=$request['LineId'][$key];
						$LineData['PositionWeight']=$request['PositionWeight'][$key];
						$LineData['StWeight']=$request['StandardWeight'][$key];
						$LineData['ActualMass']=$request['ActualMass'][$key];
						$LineData['ObsMass']=$request['ObserverMass'][$key];
						$LineData['Tfile']=$request['Tfile'][$key];
						$LineData['Ifile']=$request['Ifile'][$key];
						$LineData['Type']=0;
						$LineData['CreatedBy']=Session::get('LoginData')['UserId'];

						$CalLineDt[$key]=$LineData;
					}
				}
				if($CalibrationLine->SaveCalibrationPositionLine($CalLineDt))
				{
					$calDetails['RefRecId']=$CalId;
					$calDetails['DiffAcceptanceCriteria']=$request['DiffAcceptanceCriteria'];
					$calDetails['CompliesAcceptanceCriteria2']=0;
					if(isset($request['CompliesAcceptanceCriteria2']))
					{
						$calDetails['CompliesAcceptanceCriteria2']=$request['CompliesAcceptanceCriteria2'];
					}
					$calDetails['CompliesAcceptanceCriteria3']=0;
					if(isset($request['CompliesAcceptanceCriteria3']))
					{
						$calDetails['CompliesAcceptanceCriteria3']=$request['CompliesAcceptanceCriteria3'];
					}
					$calDetails['CreatedBy']=Session::get('LoginData')['UserId'];

					if($CalibrationDetails->SaveCalibrationDetails1($calDetails))
					{
						if(Session::get('CommentsData'))
						{
							if(count(Session::get('CommentsData'))>0)
							{
								$CalibrationComment = new GetCalibrationComment();
								$CommentsData=Session::get('CommentsData');
								$CalCommentDt=[];
								for($i=0; $i<count($CommentsData); $i++)
								{
									if($CommentsData[$i]['FormId']==$request['FormId'])
									{
										$CalLineData=GetCalibrationPositionLine::where('RefRecId',$CalId)->where('LineId', $CommentsData[$i]['LineId'])->get();
										$Jdata['LineRecId']=$CalLineData[0]['RecId'];
										$Jdata['RefRecId']=$CalId;
										$Jdata['Type']=5;
										$Jdata['CalibrationStatus']=10;
										$Jdata['Comments']=$CommentsData[$i]['Comments'];
										$Jdata['CreatedBy']=Session::get('LoginData')['UserId'];
										$Jdata['CreatedDate']=$CommentsData[$i]['CreatedDate'];
										$CalCommentDt[$i]=$Jdata;
									}
								}
								$CalibrationComment->InsertCalibrationComment($CalCommentDt);
							}
							Session::put('CommentsData', "");
						}

						return redirect("/CalibrationDetails2/$CalId")->with('success', 'Calibration Details has been added continue fill data');
					}
					else
					{
						return redirect("/CalibrationDetails1/$CalId")->with('failed', 'Calibration Details added failed...');
					}
				}
				else
				{
					return redirect("/CalibrationDetails1/$CalId")->with('failed', 'Calibration Details added failed...');
				}
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function CalibrationDetails1($cid)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$MainData=[];
				$CalData=GetCalibration::where('RecId',$cid)->get();
				$MainData['CalData']=$CalData;
				$MainData['DeviceWeightPosition']=GetDevicePositionWeight::join('calibrationformtype as cft', 'devicepositionweight.CalibrationTypeId', '=', 'cft.RecId')->join('calibrationform as cf', 'cft.RecId', '=', 'cf.CType')->where('devicepositionweight.DeviceId',$CalData[0]->DeviceId)->where('devicepositionweight.InstrumentId',$CalData[0]->InstrumentId)->where('cf.RecId',$CalData[0]->CalibrationId)->get();
				$MainData['Decimal'] = DB::table('decimal_settings')->get();
				return view('CalibrationDetails1',['MainData'=>$MainData]);
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function UpdCalibration(Request $request)
	{
		if(Session::get('LoginData'))
		{
			//echo"<pre>"; print_r($request->all()); exit;
			$Calibration = new GetCalibration();
			$CalId=$Calibration->UpdCalibration($request);
			if($CalId>0)
			{
				$BalanceCheckedoldval="";
				if($request['OldBalanceChecked']==1)
				{
					$BalanceCheckedoldval="Yes";
				}
				if($request['OldBalanceChecked']==2)
				{
					$BalanceCheckedoldval="No";
				}
				$BalanceCheckednewval="";
				if($request['BalanceChecked']==1)
				{
					$BalanceCheckednewval="Yes";
				}
				if($request['BalanceChecked']==2)
				{
					$BalanceCheckednewval="No";
				}

				$InternalCalibrationoldval="";
				if($request['OldInternalCalibration']==1)
				{
					$InternalCalibrationoldval="Passes";
				}
				if($request['OldInternalCalibration']==2)
				{
					$InternalCalibrationoldval="Fails";
				}
				$InternalCalibrationnewval="";
				if($request['InternalCalibration']==1)
				{
					$InternalCalibrationnewval="Passes";
				}
				if($request['InternalCalibration']==2)
				{
					$InternalCalibrationnewval="Fails";
				}

				$Jdata['CalibrationLineRecId']=0;
				$Jdata['RefRecId']=$request['RecId'];
				$Jdata['CalibrationStatus']=$request['Status'];
				$Jdata['CreatedBy']=Session::get('LoginData')['UserId'];
				$Jdata['Type']=1;
				$Jdata['Comments']="Form : ".$request['FormId']." Edit By : ".$Jdata['CreatedBy']." at ".date("d/m/Y h:i A")." and edit Spirit level of Balance Checked: ".$BalanceCheckedoldval." to ".$BalanceCheckednewval.", Internal Calibration: ".$InternalCalibrationoldval." to ".$InternalCalibrationnewval."";
				//echo $Jdata['Comments']; exit;
				$CalibrationComment = new GetCalibrationComment();
				$CalibrationComment->SaveCalibrationComment($Jdata);

				return redirect("/EditCalibration/".$request['RecId'])->with('success', 'Data has been updated');
			}
			else
			{
				return redirect("/EditCalibration/".$request['RecId'])->with('failed', 'Unable to update...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function UpdMonthlyCalibration(Request $request)
	{
		if(Session::get('LoginData'))
		{
			$Calibration = new GetCalibration();
			$Jdata['CalibrationLineRecId']=0;
			$Jdata['RefRecId']=$request['RecId'];
			$Jdata['CalibrationStatus']=$request['Status'];
			$Jdata['CreatedBy']=Session::get('LoginData')['UserId'];
			$Jdata['Type']=2;
			$Jdata['Comments']="Form : ".$request['FormId']." Edit By : ".$Jdata['CreatedBy']." at ".date("d/m/Y h:i A");
			$CalibrationComment = new GetCalibrationComment();
			if($CalibrationComment->SaveCalibrationComment($Jdata))
			{
				return redirect("/EditCalibrationDetails/".$request['RecId'])->with('success', 'Data has been updated');
			}
			else
			{
				return redirect("/EditMonthlyCalibration/".$request['RecId'])->with('failed', 'Unable to update...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function UpdMonthlyCalibrationP2(Request $request)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$CalId=$request['cid'];
				$CalibrationDetails = new GetMonthlyCalibrationDetails();
				$calmonthdata=GetMonthlyCalibrationDetails::where("RefRecId",$CalId);
				$editmaintable=0;
				$calDetails['RefRecId']=$CalId;
				$calDetails['SD1']=$request['StandardDeviation'];
				$calDetails['AcceptanceCriteria']=$request['AcceptanceCriteria'];
				$calDetails['CompliesAcceptanceCriteria']=0;
				if(isset($request['RdoComplies']))
				{
					$calDetails['CompliesAcceptanceCriteria']=$request['RdoComplies'];
				}
				$calDetails['AverageMass']=$request['AverageMass'];
				$calDetails['SD2']=$request['StandardMass'];
				$calDetails['CreatedBy']=Session::get('LoginData')['UserId'];
				if($calmonthdata->count()>0)
				{
					$editmaintable=$CalibrationDetails->UpdCalibrationDetails($calDetails);
				}
				else
				{
					$editmaintable=$CalibrationDetails->SaveCalibrationDetails($calDetails);
				}

				if($editmaintable)
				{
					return redirect("/EditCalibrationDetails1/".$request['RecId'])->with('success', 'Data has been updated');
				}
				else
				{
					return redirect("/CalibrationDetails/$CalId")->with('failed', 'Unable to update');
				}
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function UpdMonthlyCalibrationP2MG(Request $request)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$CalId=$request['cid'];
				$CalibrationDetails = new GetMonthlyCalibrationDetails();
				$calmonthdata=GetMonthlyCalibrationDetails::where("RefRecId",$CalId);
				$editmaintable=0;
				$calDetails['RefRecId']=$CalId;
				$calDetails['SD1']=$request['StandardDeviation'];
				$calDetails['AcceptanceCriteria']=$request['AcceptanceCriteria'];
				$calDetails['CompliesAcceptanceCriteria']=0;
				if(isset($request['RdoComplies']))
				{
					$calDetails['CompliesAcceptanceCriteria']=$request['RdoComplies'];
				}
				$calDetails['AverageMass']=$request['AverageMass'];
				$calDetails['SD2']=$request['StandardMass'];
				$calDetails['CreatedBy']=Session::get('LoginData')['UserId'];
				if($calmonthdata->count()>0)
				{
					$editmaintable=$CalibrationDetails->UpdCalibrationDetails($calDetails);
				}
				else
				{
					$editmaintable=$CalibrationDetails->SaveCalibrationDetails($calDetails);
				}

				if($editmaintable)
				{
					return redirect("/CalibrationAnalysis")->with('success', 'Data has been updated');
				}
				else
				{
					return redirect("/CalibrationAnalysis")->with('failed', 'Unable to update');
				}
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function UpdMonthlyCalibrationP3(Request $request)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$CalId=$request['cid'];
				$CalibrationDetails = new GetMonthlyCalibrationDetails();
				$calDetails['RefRecId']=$CalId;
				$calDetails['DiffAcceptanceCriteria']=$request['DiffAcceptanceCriteria'];
				$calDetails['CompliesAcceptanceCriteria2']=0;
				if(isset($request['CompliesAcceptanceCriteria2']))
				{
					$calDetails['CompliesAcceptanceCriteria2']=$request['CompliesAcceptanceCriteria2'];
				}
				$calDetails['CompliesAcceptanceCriteria3']=0;
				if(isset($request['CompliesAcceptanceCriteria3']))
				{
					$calDetails['CompliesAcceptanceCriteria3']=$request['CompliesAcceptanceCriteria3'];
				}
				$calDetails['CreatedBy']=Session::get('LoginData')['UserId'];

				if($CalibrationDetails->SaveCalibrationDetails1($calDetails))
				{
					return redirect("/EditCalibrationDetails2/".$request['RecId'])->with('success', 'Data has been updated');
				}
				else
				{
					return redirect("/CalibrationDetails1/$CalId")->with('failed', 'Unable to update');
				}
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function UpdMonthlyCalibrationP4(Request $request)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$CalId=$request['cid'];
				$CalibrationDetails = new GetMonthlyCalibrationDetails();
				$calDetails['RefRecId']=$CalId;
				$calDetails['DisplayWeightA']=$request['DisplayWeightA'];
				$calDetails['DisplayWeightB']=$request['DisplayWeightB'];
				$calDetails['Sensitivity']=$request['Sensitivity'];
				$calDetails['TfileA']=$request['TfileA'];
				$calDetails['IfileA']=$request['IfileA'];
				$calDetails['TfileB']=$request['TfileB'];
				$calDetails['IfileB']=$request['IfileB'];
				$calDetails['AcceptanceCriteriaDetail']=$request['AcceptanceCriteriaDetail'];
				$calDetails['CreatedBy']=Session::get('LoginData')['UserId'];
				if($CalibrationDetails->SaveCalibrationDetails2($calDetails))
				{
					return redirect("/EditCalibrationDetails3/$CalId")->with('success', 'Data has been updated');
					//return redirect("/CalibrationAnalysis");
				}
				else
				{
					return redirect("/CalibrationDetails2/$CalId")->with('failed', 'Unable to update');
				}
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function UpdMonthlyCalibrationP5(Request $request)
	{
		if(Session::get('LoginData'))
		{
			return redirect("/CalibrationAnalysis");
			//return redirect("/CalibrationAnalysis")->with('success', 'Data has been updated');
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function CalibrationDetails2($cid)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$MainData=[];
				$CalData=GetCalibration::where('RecId',$cid)->get();
				$MainData['CalData']=$CalData;
				$MainData['Decimal'] = DB::table('decimal_settings')->get();
				return view('CalibrationDetails2',['MainData'=>$MainData]);
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SaveMonthlyCalibrationP4(Request $request)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$CalId=$request['cid'];
				$CalibrationDetails = new GetMonthlyCalibrationDetails();
				$calDetails['RefRecId']=$CalId;
				$calDetails['DisplayWeightA']=$request['DisplayWeightA'];
				$calDetails['DisplayWeightB']=$request['DisplayWeightB'];

				$calDetails['TfileA']=$request['TfileA'];
				$calDetails['IfileA']=$request['IfileA'];
				$calDetails['TfileB']=$request['TfileB'];
				$calDetails['IfileB']=$request['IfileB'];

				$calDetails['Sensitivity']=$request['Sensitivity'];
				$calDetails['AcceptanceCriteriaDetail']=$request['AcceptanceCriteriaDetail'];
				$calDetails['CreatedBy']=Session::get('LoginData')['UserId'];
				if($CalibrationDetails->SaveCalibrationDetails2($calDetails))
				{
					//Calibration Comment
					if(Session::get('CommentsData'))
					{
						if(count(Session::get('CommentsData'))>0)
						{
							$CalibrationComment = new GetCalibrationComment();
							$CommentsData=Session::get('CommentsData');
							$CalCommentDt=[];
							for($i=0; $i<count($CommentsData); $i++)
							{
								if($CommentsData[$i]['FormId']==$request['FormId'])
								{
									$Jdata['LineRecId']=0;
									$Jdata['RefRecId']=$CalId;
									$Jdata['Type']=6;
									$Jdata['CalibrationStatus']=10;
									$Jdata['Comments']=$CommentsData[$i]['Comments'];
									$Jdata['CreatedBy']=Session::get('LoginData')['UserId'];
									$Jdata['CreatedDate']=$CommentsData[$i]['CreatedDate'];
									$CalCommentDt[$i]=$Jdata;
								}
							}
							$CalibrationComment->InsertCalibrationComment($CalCommentDt);
						}
						Session::put('CommentsData', "");
					}
					return redirect("/CalibrationDetails3/$CalId")->with('success', 'Calibration Details has been added continue fill data');
					//return redirect("/AddMonthlyCalibration")->with('success', 'Data has been saved successfully');
				}
				else
				{
					return redirect("/CalibrationDetails2/$CalId")->with('failed', 'Calibration Details added failed...');
				}
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function CalibrationDetails3($cid)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$MainData=[];
				$CalData=GetCalibration::where('RecId',$cid)->get();
				$MainData['CalData']=$CalData;
				$MainData['DeviceWeightLine']=GetDeviceWeight::join('calibrationformtype as cft', 'deviceweight.CalibrationTypeId', '=', 'cft.RecId')->join('calibrationform as cf', 'cft.RecId', '=', 'cf.CType')->where('deviceweight.DeviceId',$CalData[0]->DeviceId)->where('deviceweight.InstrumentId',$CalData[0]->InstrumentId)->where('cf.RecId',$CalData[0]->CalibrationId)->get();
				//echo"<pre>"; print_r($MainData['DeviceWeightLine']); exit;
				$MainData['Decimal'] = DB::table('decimal_settings')->get();
				return view('CalibrationDetails3',['MainData'=>$MainData]);
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SaveMonthlyCalibrationP5(Request $request)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{
				$CalibrationLine = new GetCalibrationLine();
				$CalId=$request['cid'];
				$CalLineDt=[];
				foreach ($request['LineId'] as $key => $val) {
					if($request['DispWeight'][$key]!="" && $request['DifferentAB'][$key]!="" && $request['Result'][$key]!="")
					{
						$LineData['RefRecId']=$CalId;
						$LineData['LineId']=$request['LineId'][$key];
						$LineData['Type']=3;
						$LineData['StWeight']=$request['StWeight'][$key];
						$LineData['CertWeight']=$request['CertWeight'][$key];
						$LineData['DispWeight']=$request['DispWeight'][$key];
						$LineData['DiffWeight']=$request['DifferentAB'][$key];
						$LineData['AccpWeight']=$request['AccpWeight'][$key];
						if($request['Result'][$key]=="Fails")
						{
							$LineData['Result']=2;
						}
						else if($request['Result'][$key]=="Passes")
						{
							$LineData['Result']=1;
						}
						else
						{
							$LineData['Result']=0;
						}
						$LineData['Tfile']=$request['Tfile'][$key];
						$LineData['Ifile']=$request['Ifile'][$key];
						$LineData['CreatedBy']=Session::get('LoginData')['UserId'];
						$CalLineDt[$key]=$LineData;
					}
				}
				if($CalibrationLine->SaveCalibrationlLine($CalLineDt))
				{
					if(Session::get('CommentsData'))
					{
						if(count(Session::get('CommentsData'))>0)
						{
							$CalibrationComment = new GetCalibrationComment();
							$CommentsData=Session::get('CommentsData');
							$CalCommentDt=[];
							for($i=0; $i<count($CommentsData); $i++)
							{
								if($CommentsData[$i]['FormId']==$request['FormId'])
								{
									$CalLineData=GetCalibrationLine::where('RefRecId',$CalId)->where('LineId', $CommentsData[$i]['LineId'])->get();
									$Jdata['LineRecId']=$CalLineData[0]['RecId'];
									$Jdata['RefRecId']=$CalId;
									$Jdata['Type']=3;
									$Jdata['CalibrationStatus']=10;
									$Jdata['Comments']=$CommentsData[$i]['Comments'];
									$Jdata['CreatedBy']=Session::get('LoginData')['UserId'];
									$Jdata['CreatedDate']=$CommentsData[$i]['CreatedDate'];
									$CalCommentDt[$i]=$Jdata;
								}
							}
							$CalibrationComment->InsertCalibrationComment($CalCommentDt);
						}
						Session::put('CommentsData', "");
					}
					return redirect("/AddMonthlyCalibration")->with('success', 'Data has been saved successfully');
				}
				else
				{
					return redirect("/CalibrationDetails3/$CalId")->with('failed', 'Calibration Details added failed...');
				}
			}
			else
			{
				return redirect("/")->with('failed', 'New Calibration add only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function logout()
	{
		session()->flush();
		return redirect('/');
	}
	function EditCalibration($cid)
	{
		if(Session::get('LoginData'))
		{
			$CalData=GetCalibration::where('RecId',$cid)->get();
			if($CalData[0]->CalibrationId!=2)
			{
			//if(($CalData[0]->Status==10 && $CalData[0]->PerformedBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==2) || ($CalData[0]->Status==20 && $CalData[0]->VerifiedBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==3) || (($CalData[0]->Status==30 || $CalData[0]->Status==40) && $CalData[0]->AproovelBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==4))
				if(($CalData[0]->Status==10 && $CalData[0]->PerformedBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==2))
				{
					$MainData['CalData']=$CalData;
					$CalLineData=GetCalibrationLine::where('RefRecId',$cid)->orderBy('LineId', 'asc')->get();
					$MainData['CalLineData']=$CalLineData;
					$CalCommentData=GetCalibrationComment::where('RefRecId',$cid)->orderBy('CreatedDate', 'desc')->get();
					$MainData['CalCommentData']=$CalCommentData;
					$MainData['Decimal'] = DB::table('decimal_settings')->get();
					return view('EditCalibration',['MainData'=>$MainData]);
				}
				else
				{
					return redirect("/home")->with('failed', 'Unable to access page or Unable to edit record...');
				}
			}
			else
			{
				return redirect("/home")->with('failed', 'Unable to get record something wrong...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function EditMonthlyCalibration($cid)
	{
		if(Session::get('LoginData'))
		{
			$CalData=GetCalibration::join('calibrationform as cf', 'cf.RecId', '=', 'calibration.CalibrationId')->where('calibration.RecId',$cid)->select("calibration.*","cf.CType")->get();
			if($CalData[0]->CType==2)
			{
				if(($CalData[0]->Status==10 && $CalData[0]->PerformedBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==2))
				{
					$MainData['CalData']=$CalData;
					$CalData1=GetMonthlyCalibrationDetails::where('RefRecId',$cid)->get();
					$MainData['CalData1']=$CalData1;
					$PLineData=GetCalibrationLine::where('RefRecId',$cid)->where('Type',0)->orderBy('LineId', 'asc')->get();
					$MainData['PLineData']=$PLineData;
					$NLineData=GetCalibrationLine::where('RefRecId',$cid)->where('Type',1)->orderBy('LineId', 'asc')->get();
					$MainData['NLineData']=$NLineData;
					$CalCommentData=GetCalibrationComment::where('RefRecId',$cid)->where('Type',2)->orderBy('CreatedDate', 'desc')->get();
					$MainData['CalCommentData']=$CalCommentData;
					$MainData['Decimal'] = DB::table('decimal_settings')->get();
					return view('EditMonthlyCalibration',['MainData'=>$MainData]);
				}
				else
				{
					return redirect("/home")->with('failed', 'Unable to access page or Unable to edit record...');
				}
			}
			else
			{
				return redirect("/home")->with('failed', 'Unable to get record something wrong...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function EditMonthlyCalibrationMG($cid)
	{
		if(Session::get('LoginData'))
		{
			$CalData=GetCalibration::join('calibrationform as cf', 'cf.RecId', '=', 'calibration.CalibrationId')->where('calibration.RecId',$cid)->select("calibration.*","cf.CType")->get();
			if($CalData[0]->CType==2)
			{
				if(($CalData[0]->Status==10 && $CalData[0]->PerformedBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==2))
				{
					$MainData['CalData']=$CalData;
					$CalData1=GetMonthlyCalibrationDetails::where('RefRecId',$cid)->get();
					$MainData['CalData1']=$CalData1;
					$DeviceWeightObsMass=GetCalibrationLineObsMass::where('RefRecId',$cid)->where('Type',0)->orderBy('LineId', 'asc')->get();
					$MainData['DeviceWeightObsMass']=$DeviceWeightObsMass;
					$CalCommentData=GetCalibrationComment::where('RefRecId',$cid)->where('Type',4)->orderBy('CreatedDate', 'desc')->get();
					$MainData['CalCommentData']=$CalCommentData;
					$MainData['Decimal'] = DB::table('decimal_settings')->get();
					return view('EditMonthlyCalibrationMG',['MainData'=>$MainData]);
				}
				else
				{
					return redirect("/home")->with('failed', 'Unable to access page or Unable to edit record...');
				}
			}
			else
			{
				return redirect("/home")->with('failed', 'Unable to get record something wrong...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function EditCalibrationDetails($cid)
	{
		if(Session::get('LoginData'))
		{
			$CalData=GetCalibration::join('calibrationform as cf', 'cf.RecId', '=', 'calibration.CalibrationId')->where('calibration.RecId',$cid)->select("calibration.*","cf.CType")->get();
			if($CalData[0]->CType==2)
			{
				if(($CalData[0]->Status==10 && $CalData[0]->PerformedBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==2))
				{
					$MainData['CalData']=$CalData;
					$CalData1=GetMonthlyCalibrationDetails::where('RefRecId',$cid)->get();
					$MainData['CalData1']=$CalData1;
					$DeviceWeightObsMass=GetCalibrationLineObsMass::where('RefRecId',$cid)->where('Type',0)->orderBy('LineId', 'asc')->get();
					$MainData['DeviceWeightObsMass']=$DeviceWeightObsMass;
					$CalCommentData=GetCalibrationComment::where('RefRecId',$cid)->where('Type',4)->orderBy('CreatedDate', 'desc')->get();
					$MainData['CalCommentData']=$CalCommentData;
					$MainData['Decimal'] = DB::table('decimal_settings')->get();
					return view('EditCalibrationDetails',['MainData'=>$MainData]);
				}
				else
				{
					return redirect("/home")->with('failed', 'Unable to access page or Unable to edit record...');
				}
			}
			else
			{
				return redirect("/home")->with('failed', 'Unable to get record something wrong...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function EditCalibrationDetails1($cid)
	{
		if(Session::get('LoginData'))
		{
			$CalData=GetCalibration::join('calibrationform as cf', 'cf.RecId', '=', 'calibration.CalibrationId')->where('calibration.RecId',$cid)->select("calibration.*","cf.CType")->get();
			if($CalData[0]->CType==2)
			{
				if(($CalData[0]->Status==10 && $CalData[0]->PerformedBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==2))
				{
					$MainData['CalData']=$CalData;
					$CalData1=GetMonthlyCalibrationDetails::where('RefRecId',$cid)->get();
					$MainData['CalData1']=$CalData1;
					$DeviceWeightPosition=GetCalibrationPositionLine::where('RefRecId',$cid)->where('Type',0)->orderBy('LineId', 'asc')->get();
					$MainData['DeviceWeightPosition']=$DeviceWeightPosition;
					$CalCommentData=GetCalibrationComment::where('RefRecId',$cid)->where('Type',5)->orderBy('CreatedDate', 'desc')->get();
                    $MainData['CalCommentData']=$CalCommentData;
                    $MainData['SopFormat'] = DB::table('form_settings')->get();
			        $MainData['Decimal'] = DB::table('decimal_settings')->get();
					return view('EditCalibrationDetails1',['MainData'=>$MainData]);
				}
				else
				{
					return redirect("/home")->with('failed', 'Unable to access page or Unable to edit record...');
				}
			}
			else
			{
				return redirect("/home")->with('failed', 'Unable to get record something wrong...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function EditCalibrationDetails2($cid)
	{
		if(Session::get('LoginData'))
		{
			$CalData=GetCalibration::join('calibrationform as cf', 'cf.RecId', '=', 'calibration.CalibrationId')->where('calibration.RecId',$cid)->select("calibration.*","cf.CType")->get();
			if($CalData[0]->CType==2)
			{
				if(($CalData[0]->Status==10 && $CalData[0]->PerformedBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==2))
				{
					$MainData['CalData']=$CalData;
					$CalData1=GetMonthlyCalibrationDetails::where('RefRecId',$cid)->get();
					$MainData['CalData1']=$CalData1;
					$CalCommentData=GetCalibrationComment::where('RefRecId',$cid)->where('Type',6)->orderBy('CreatedDate', 'desc')->get();
                    $MainData['CalCommentData']=$CalCommentData;
                    $MainData['SopFormat'] = DB::table('form_settings')->get();
			        $MainData['Decimal'] = DB::table('decimal_settings')->get();
					return view('EditCalibrationDetails2',['MainData'=>$MainData]);
				}
				else
				{
					return redirect("/home")->with('failed', 'Unable to access page or Unable to edit record...');
				}
			}
			else
			{
				return redirect("/home")->with('failed', 'Unable to get record something wrong...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function EditCalibrationDetails3($cid)
	{
		if(Session::get('LoginData'))
		{
			$CalData=GetCalibration::join('calibrationform as cf', 'cf.RecId', '=', 'calibration.CalibrationId')->where('calibration.RecId',$cid)->select("calibration.*","cf.CType")->get();
			if($CalData[0]->CType==2)
			{
				if(($CalData[0]->Status==10 && $CalData[0]->PerformedBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==2))
				{
					$MainData['CalData']=$CalData;
					$CalData1=GetMonthlyCalibrationDetails::where('RefRecId',$cid)->get();
					$MainData['CalData1']=$CalData1;
					$LineData=GetCalibrationLine::where('RefRecId',$cid)->where('Type',3)->orderBy('LineId', 'asc')->get();
					$MainData['LineData']=$LineData;
					$CalCommentData=GetCalibrationComment::where('RefRecId',$cid)->where('Type',3)->orderBy('CreatedDate', 'desc')->get();
                    $MainData['CalCommentData']=$CalCommentData;
                    $MainData['SopFormat'] = DB::table('form_settings')->get();
			        $MainData['Decimal'] = DB::table('decimal_settings')->get();
					return view('EditCalibrationDetails3',['MainData'=>$MainData]);
				}
				else
				{
					return redirect("/home")->with('failed', 'Unable to access page or Unable to edit record...');
				}
			}
			else
			{
				return redirect("/home")->with('failed', 'Unable to get record something wrong...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function ViewCalibration($cid)
	{
		if(Session::get('LoginData'))
		{
			$CalData=GetCalibration::where('RecId',$cid)->get();
			if($CalData[0]->CalibrationId!=2)
			{
				$MainData['CalData']=$CalData;
				$CalLineData=GetCalibrationLine::where('RefRecId',$cid)->orderBy('LineId', 'asc')->get();
				$MainData['CalLineData']=$CalLineData;
				$CalCommentData=GetCalibrationComment::where('RefRecId',$cid)->orderBy('CreatedDate', 'desc')->get();
				$MainData['CalCommentData']=$CalCommentData;
				$MainData['CID']=$cid;
				$MainData['Decimal'] = DB::table('decimal_settings')->get();
				return view('ViewCalibration',['MainData'=>$MainData]);
			}
			else
			{
				return redirect("/home")->with('failed', 'Unable to get record something wrong...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function ViewMonthlyCalibration($cid)
	{
		if(Session::get('LoginData'))
		{
			$CalData=GetCalibration::join('calibrationform as cf', 'cf.RecId', '=', 'calibration.CalibrationId')->where('calibration.RecId',$cid)->select("calibration.*","cf.CType")->get();
			if($CalData[0]->CType==2)
			{
				$MainData['CID']=$cid;
				$MainData['CalData']=$CalData;
				$CalData1=GetMonthlyCalibrationDetails::where('RefRecId',$cid)->get();
				$MainData['CalData1']=$CalData1;
				$PLineData=GetCalibrationLine::where('RefRecId',$cid)->where('Type',0)->orderBy('LineId', 'asc')->get();
				$MainData['PLineData']=$PLineData;
				$NLineData=GetCalibrationLine::where('RefRecId',$cid)->where('Type',1)->orderBy('LineId', 'asc')->get();
				$MainData['NLineData']=$NLineData;
				$CalCommentData=GetCalibrationComment::where('RefRecId',$cid)->where('Type',2)->orderBy('CreatedDate', 'desc')->get();
				$MainData['CalCommentData']=$CalCommentData;
				$DeviceWeightObsMass=GetCalibrationLineObsMass::where('RefRecId',$cid)->where('Type',0)->orderBy('LineId', 'asc')->get();
				$MainData['DeviceWeightObsMass']=$DeviceWeightObsMass;
				$CalCommentData1=GetCalibrationComment::where('RefRecId',$cid)->where('Type',4)->orderBy('CreatedDate', 'desc')->get();
				$MainData['CalCommentData1']=$CalCommentData1;
				$DeviceWeightPosition=GetCalibrationPositionLine::where('RefRecId',$cid)->where('Type',0)->orderBy('LineId', 'asc')->get();
				$MainData['DeviceWeightPosition']=$DeviceWeightPosition;
				$CalCommentData2=GetCalibrationComment::where('RefRecId',$cid)->where('Type',5)->orderBy('CreatedDate', 'desc')->get();
				$MainData['CalCommentData2']=$CalCommentData2;
				$LineData=GetCalibrationLine::where('RefRecId',$cid)->where('Type',3)->orderBy('LineId', 'asc')->get();
				$MainData['LineData']=$LineData;
				$CalCommentData3=GetCalibrationComment::where('RefRecId',$cid)->where('Type',3)->orderBy('CreatedDate', 'desc')->get();
				$MainData['CalCommentData3']=$CalCommentData3;
				$CalCommentData4=GetCalibrationComment::where('RefRecId',$cid)->where('Type',6)->orderBy('CreatedDate', 'desc')->get();
				$MainData['CalCommentData4']=$CalCommentData4;
				$MainData['Decimal'] = DB::table('decimal_settings')->get();
				return view('ViewMonthlyCalibration',['MainData'=>$MainData]);
			}
			else
			{
				return redirect("/home")->with('failed', 'Unable to get record something wrong...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function ViewMonthlyCalibrationMG($cid)
	{
		if(Session::get('LoginData'))
		{
			$CalData=GetCalibration::join('calibrationform as cf', 'cf.RecId', '=', 'calibration.CalibrationId')->where('calibration.RecId',$cid)->select("calibration.*","cf.CType")->get();
			if($CalData[0]->CType==2)
			{
				$MainData['CID']=$cid;
				$MainData['CalData']=$CalData;
				$CalData1=GetMonthlyCalibrationDetails::where('RefRecId',$cid)->get();
				$MainData['CalData1']=$CalData1;
				$DeviceWeightObsMass=GetCalibrationLineObsMass::where('RefRecId',$cid)->where('Type',0)->orderBy('LineId', 'asc')->get();
				$MainData['DeviceWeightObsMass']=$DeviceWeightObsMass;
				$CalCommentData1=GetCalibrationComment::where('RefRecId',$cid)->where('Type',4)->orderBy('CreatedDate', 'desc')->get();
				$MainData['CalCommentData1']=$CalCommentData1;
                $MainData['Decimal'] = DB::table('decimal_settings')->get();

				return view('ViewMonthlyCalibrationMG',['MainData'=>$MainData]);
			}
			else
			{
				return redirect("/home")->with('failed', 'Unable to get record something wrong...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SaveCommentWithUpdateLine($json)
	{
		$Jdata=json_decode($json,true);
		$Jdata['CreatedBy']=Session::get('LoginData')['UserId'];
		if(Session::get('LoginData'))
		{
			if($Jdata['Result']=="Fails")
			{
				$Jdata['Result']=2;
			}
			else if($Jdata['Result']=="Passes")
			{
				$Jdata['Result']=1;
			}
			else
			{
				$Jdata['Result']=0;
			}

			$CalibrationLine = new GetCalibrationLine();
			if($CalibrationLine->UpdCalibrationlLine($Jdata))
			{
				$CalibrationComment = new GetCalibrationComment();
				$CalibrationComment->SaveCalibrationComment($Jdata);
				return 100;
			}
			else
			{
				return -100;
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SaveCommentWithUpdateLine1($json)
	{
		$Jdata=json_decode($json,true);
		$Jdata['CreatedBy']=Session::get('LoginData')['UserId'];
		if(Session::get('LoginData'))
		{
			$CalibrationLine = new GetCalibrationLineObsMass();
			if($CalibrationLine->UpdCalibrationlLine($Jdata))
			{
				$CalibrationComment = new GetCalibrationComment();
				$CalibrationComment->SaveCalibrationComment($Jdata);
				return 100;
			}
			else
			{
				return -100;
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SaveCommentWithUpdateLine2($json)
	{
		$Jdata=json_decode($json,true);
		$Jdata['CreatedBy']=Session::get('LoginData')['UserId'];
		if(Session::get('LoginData'))
		{
			$CalibrationLine = new GetCalibrationPositionLine();
			if($CalibrationLine->UpdCalibrationlLine($Jdata))
			{
				$CalibrationComment = new GetCalibrationComment();
				$CalibrationComment->SaveCalibrationComment($Jdata);
				return 100;
			}
			else
			{
				return -100;
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SaveCommentWithCalData($json)
	{
		$Jdata=json_decode($json,true);
		$Jdata['CreatedBy']=Session::get('LoginData')['UserId'];
		if(Session::get('LoginData'))
		{
			$CalibrationMonth = new GetMonthlyCalibrationDetails();
			if($CalibrationMonth->SaveCalibrationDetails2($Jdata))
			{
				$CalibrationComment = new GetCalibrationComment();
				$CalibrationComment->SaveCalibrationComment($Jdata);
				return 100;
			}
			else
			{
				return -100;
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function AjaxGetComment($json)
	{
		if(Session::get('LoginData'))
		{
			$Jdata=json_decode($json,true);
			$CommentData=GetCalibrationComment::where('RefRecId',$Jdata['FormRecId'])->where("Type",$Jdata['Type'])->orderBy('CreatedDate', 'desc')->select("RecId","LineRecId","RefRecId","CalibrationStatus","Comments","CreatedBy","CreatedDate")->get();
			foreach ($CommentData as $key => $val) {
				//echo $CommentData[$key]->CreatedDate; exit;
				$CommentData[$key]->CreatedDate=date("d/m/Y h:i A",strtotime($CommentData[$key]->CreatedDate));
				$StatusMaster=GetStatusMaster::where('RecId',$CommentData[$key]->CalibrationStatus)->get();
				if(isset($StatusMaster[0]['Name']))
				{
					$CommentData[$key]->CalibrationStatus=$StatusMaster[0]['Name'];
				}
				else
				{
					$CommentData[$key]->CalibrationStatus="New";
				}
			}
			return response()->json($CommentData);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SaveComment($json)
	{
		$Jdata=json_decode($json,true);
		$Jdata['CreatedBy']=Session::get('LoginData')['UserId'];
		if(Session::get('LoginData'))
		{
			$CalibrationComment = new GetCalibrationComment();
			if($CalibrationComment->SaveCalibrationComment($Jdata))
			{
				return 100;
			}
			else
			{
				return -100;
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function VerifyCalibration(Request $request)
	{
		if(Session::get('LoginData'))
		{
			//echo"<pre>"; print_r($request->all()); exit;
			$Calibration = new GetCalibration();
			$UpdData=[];
			$UpdData['RecId']=$request['RecId'];
			$UpdData['Status']=$request['Status'];
			$UpdData['VerifiedBy']=Session::get('LoginData')['UserId'];
			$UpdData['VerifiedDate']=now();
			if($Calibration->UpdCalibrationStatus($UpdData))
			{
				$MailData=[];
				$CalibrationDt=GetCalibration::where('RecId',$request['RecId'])->select("RecId","FormId","Make","Model","CalibrationId","InstrumentId","DeviceId","SpiritLevel","Internal","CalibrationDate","CalibrationNextDate")->get();

				//Add Auto Comment
				$CalibrationComment = new GetCalibrationComment();
				$StatusMaster=GetStatusMaster::where('RecId',$request['Status'])->first();
				$UserMaster=GetUserData::where('UserId',Session::get('LoginData')['UserId'])->first();
				$CalCommentDt=[];
				$CData['LineRecId']=0;
				$CData['RefRecId']=$request['RecId'];
				$CData['CalibrationStatus']=$request['Status'];
				$CData['Type']=1;
				$CData['Comments']="Form : ".$CalibrationDt[0]['FormId']." is ".$StatusMaster['Name']." by ".$UserMaster['UserName']." at ".date("d/m/Y h:i A").".";
				$CData['CreatedBy']=Session::get('LoginData')['UserId'];
				$CData['CreatedDate']=now();
				$CalCommentDt[0]=$CData;
				$CalibrationComment->InsertCalibrationComment($CalCommentDt);

				$MailData['FormId']=$CalibrationDt[0]['FormId'];
				$CalibrationName=GetCalibrationForm::where('RecId',$CalibrationDt[0]['CalibrationId'])->select("Name")->get();
				$MailData['CalibrationMethod']=$CalibrationName[0]['Name'];
				$InstrumentName=GetInstrumentMaster::where('RecId',$CalibrationDt[0]['InstrumentId'])->select("Name")->get();
				$MailData['InstrumentID']=$InstrumentName[0]['Name'];
				$DeviceName=GetDeviceMaster::where('RecId',$CalibrationDt[0]['DeviceId'])->select("Name")->get();
				$MailData['DeviceType']=$DeviceName[0]['Name'];
				$MailData['Make']=$CalibrationDt[0]['Make'];
				$MailData['Model']=$CalibrationDt[0]['Model'];
				$MailData['CalibratedDate']=$CalibrationDt[0]['CalibrationDate'];
				$MailData['NextCalibratedDate']=$CalibrationDt[0]['CalibrationNextDate'];
				if($CalibrationDt[0]['SpiritLevel']==1)
				{
					$MailData['BalanceChecked']="Yes";
				}
				else if($CalibrationDt[0]['SpiritLevel']==2)
				{
					$MailData['BalanceChecked']="No";
				}
				else
				{
					$MailData['BalanceChecked']=" ";
				}

				if($CalibrationDt[0]['Internal']==1)
				{
					$MailData['InternalCalibration']="Passes";
				}
				else if($CalibrationDt[0]['Internal']==2)
				{
					$MailData['InternalCalibration']="Fails";
				}
				else
				{
					$MailData['InternalCalibration']=" ";
				}

				$ApprovelUsers=GetUserData::where('Role',4)->select("UserId","UserName","UserEmail","ContactNum","Role")->where("UserEmail","!=","")->get();
				foreach ($ApprovelUsers as $key => $val)
				{
					if($val->UserEmail!='' && strpos($val->UserEmail, '.') !== false && strpos($val->UserEmail, '@') !== false)
					{
						$MailData['Email']=$val->UserEmail;
						$MailData['UserName']=$val->UserName;

						$StatusText="";
						$StatusMaster=GetStatusMaster::where('RecId',$request['Status'])->get();
						if(isset($StatusMaster[0]['Name']))
						{
							$StatusText=$StatusMaster[0]['Name'];
						}
						$MailData['StatusText']=$StatusText;
						$MailData['RecId'] = $UpdData['RecId'];

						Mail::send([],[], function ($message)  use ($MailData) {
							$message->to($MailData['Email'], $MailData['UserName'])->subject('Form is '.$MailData['StatusText'].' on Calibration App');
							$message->setBody("<p><b>Form ID :</b> ".$MailData['FormId']."</p><p><b>Calibration Method :</b> ".$MailData['CalibrationMethod']."</p><p><b>Instrument :</b> ".$MailData['InstrumentID']."</p><p><b>Device :</b> ".$MailData['DeviceType']."</p><p><b>Make :</b> ".$MailData['Make']."</p><p><b>Model :</b> ".$MailData['Model']."</p><p><b>Calibrated on :</b> ".$MailData['CalibratedDate']."</p><p><b>Next Calibration on :</b> ".$MailData['NextCalibratedDate']."</p><p><b>Spirit level of Balance Checked :</b> ".$MailData['BalanceChecked']."</p><p><b>Internal Calibration :</b> ".$MailData['InternalCalibration']."</p><p><b>View Form :</b> <a href='".url('ViewCalibration/'.$MailData['RecId'])."' target='_blank'>Click Here</a></p>","text/html");
						});
					}
				}

				if (Mail::failures()) {
					return redirect("/ViewCalibration/".$UpdData['RecId'])->with('failed', 'Mail Server Bad Request Error');
				}
				else
				{
					return redirect("/ViewCalibration/".$UpdData['RecId'])->with('success', 'Calibration form successfully '.$StatusText.' ');
				}
			}
			else
			{
				return redirect("/ViewCalibration/".$UpdData['RecId'])->with('failed', 'Unable to '.$StatusText.' Calibration record');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function VerifyMonthlyCalibration(Request $request)
	{
		if(Session::get('LoginData'))
		{
			//echo"<pre>"; print_r($request->all()); exit;
			$Calibration = new GetCalibration();
			$UpdData=[];
			$UpdData['RecId']=$request['RecId'];
			$UpdData['Status']=$request['Status'];
			$UpdData['VerifiedBy']=Session::get('LoginData')['UserId'];
			$UpdData['VerifiedDate']=now();
			if($Calibration->UpdCalibrationStatus($UpdData))
			{
				$MailData=[];
				$CalibrationDt=GetCalibration::where('RecId',$request['RecId'])->select("RecId","FormId","Make","Model","CalibrationId","InstrumentId","DeviceId","SpiritLevel","Internal","CalibrationDate","CalibrationNextDate")->get();

				//Add Auto Comment
				$CalibrationComment = new GetCalibrationComment();
				$StatusMaster=GetStatusMaster::where('RecId',$request['Status'])->first();
				$UserMaster=GetUserData::where('UserId',Session::get('LoginData')['UserId'])->first();
				$CalCommentDt=[];
				$CData['LineRecId']=0;
				$CData['RefRecId']=$request['RecId'];
				$CData['CalibrationStatus']=$request['Status'];
				$CData['Type']=2;
				$CData['Comments']="Form : ".$CalibrationDt[0]['FormId']." is ".$StatusMaster['Name']." by ".$UserMaster['UserName']." at ".date("d/m/Y h:i A").".";
				$CData['CreatedBy']=Session::get('LoginData')['UserId'];
				$CData['CreatedDate']=now();
				$CalCommentDt[0]=$CData;
				$CalibrationComment->InsertCalibrationComment($CalCommentDt);

				$MailData['FormId']=$CalibrationDt[0]['FormId'];
				$CalibrationName=GetCalibrationForm::where('RecId',$CalibrationDt[0]['CalibrationId'])->select("Name")->get();
				$MailData['CalibrationMethod']=$CalibrationName[0]['Name'];
				$InstrumentName=GetInstrumentMaster::where('RecId',$CalibrationDt[0]['InstrumentId'])->select("Name")->get();
				$MailData['InstrumentID']=$InstrumentName[0]['Name'];
				$DeviceName=GetDeviceMaster::where('RecId',$CalibrationDt[0]['DeviceId'])->select("Name")->get();
				$MailData['DeviceType']=$DeviceName[0]['Name'];
				$MailData['Make']=$CalibrationDt[0]['Make'];
				$MailData['Model']=$CalibrationDt[0]['Model'];
				$MailData['CalibratedDate']=$CalibrationDt[0]['CalibrationDate'];
				$MailData['NextCalibratedDate']=$CalibrationDt[0]['CalibrationNextDate'];

				$ApprovelUsers=GetUserData::where('Role',4)->select("UserId","UserName","UserEmail","ContactNum","Role")->where("UserEmail","!=","")->get();
				foreach ($ApprovelUsers as $key => $val)
				{
					if($val->UserEmail!='' && strpos($val->UserEmail, '.') !== false && strpos($val->UserEmail, '@') !== false)
					{
						$MailData['Email']=$val->UserEmail;
						$MailData['UserName']=$val->UserName;

						$StatusText="";
						$StatusMaster=GetStatusMaster::where('RecId',$request['Status'])->get();
						if(isset($StatusMaster[0]['Name']))
						{
							$StatusText=$StatusMaster[0]['Name'];
						}
						$MailData['StatusText']=$StatusText;

						$MailData['url'] = "<p><b>View Form :</b> <a href='".url('ViewMonthlyCalibration/'.$UpdData['RecId'])."' target='_blank'>Click Here</a></p>";

						if($request['CalibrationType']==2)
						{
							$MailData['url'] = "<p><b>View Form :</b> <a href='".url('ViewMonthlyCalibrationMG/'.$UpdData['RecId'])."' target='_blank'>Click Here</a></p>";
						}
						Mail::send([],[], function ($message)  use ($MailData) {
							$message->to($MailData['Email'], $MailData['UserName'])->subject('Form is '.$MailData['StatusText'].' on Calibration App');
							$message->setBody("<p><b>Form ID :</b> ".$MailData['FormId']."</p><p><b>Calibration Method :</b> ".$MailData['CalibrationMethod']."</p><p><b>Instrument :</b> ".$MailData['InstrumentID']."</p><p><b>Device :</b> ".$MailData['DeviceType']."</p><p><b>Make :</b> ".$MailData['Make']."</p><p><b>Model :</b> ".$MailData['Model']."</p><p><b>Calibrated on :</b> ".$MailData['CalibratedDate']."</p><p><b>Next Calibration on :</b> ".$MailData['NextCalibratedDate']."</p>".$MailData['url'],"text/html");
						});
					}
				}

				if (Mail::failures()) {
					if($request['CalibrationType']==2)
					{
						return redirect("/ViewMonthlyCalibrationMG/".$UpdData['RecId'])->with('failed', 'Mail Server Bad Request Error');
					}
					else
					{
						return redirect("/ViewMonthlyCalibration/".$UpdData['RecId'])->with('failed', 'Mail Server Bad Request Error');
					}
				}
				else
				{
					if($request['CalibrationType']==2)
					{
						return redirect("/ViewMonthlyCalibrationMG/".$UpdData['RecId'])->with('success', 'Calibration form successfully '.$StatusText.' ');
					}
					else
					{
						return redirect("/ViewMonthlyCalibration/".$UpdData['RecId'])->with('success', 'Calibration form successfully '.$StatusText.' ');
					}
				}
			}
			else
			{
				return redirect("/ViewMonthlyCalibration/".$UpdData['RecId'])->with('failed', 'Unable to '.$StatusText.' Calibration record');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function ApproveCalibration(Request $request)
	{
		if(Session::get('LoginData'))
		{
			//echo"<pre>"; print_r($request->all()); exit;
			$Calibration = new GetCalibration();
			$UpdData=[];
			$UpdData['RecId']=$request['RecId'];
			$UpdData['Status']=$request['Status'];
			$UpdData['AproovelBy']=Session::get('LoginData')['UserId'];
			$UpdData['AproovelDate']=now();
			if($Calibration->UpdCalibrationStatus1($UpdData))
			{


				$MailData=[];
				$CalibrationDt=GetCalibration::where('RecId',$request['RecId'])->select("RecId","FormId","Make","Model","CalibrationId","InstrumentId","DeviceId","SpiritLevel","Internal","CalibrationDate","CalibrationNextDate")->get();

				//Add Auto Comment
				$CalibrationComment = new GetCalibrationComment();
				$StatusMaster=GetStatusMaster::where('RecId',$request['Status'])->first();
				$UserMaster=GetUserData::where('UserId',Session::get('LoginData')['UserId'])->first();
				$CalCommentDt=[];
				$CData['LineRecId']=0;
				$CData['RefRecId']=$request['RecId'];
				$CData['CalibrationStatus']=$request['Status'];
				$CData['Type']=1;
				$CData['Comments']="Form : ".$CalibrationDt[0]['FormId']." is ".$StatusMaster['Name']." by ".$UserMaster['UserName']." at ".date("d/m/Y h:i A").".";
				$CData['CreatedBy']=Session::get('LoginData')['UserId'];
				$CData['CreatedDate']=now();
				$CalCommentDt[0]=$CData;
				$CalibrationComment->InsertCalibrationComment($CalCommentDt);

				$MailData['FormId']=$CalibrationDt[0]['FormId'];
				$CalibrationName=GetCalibrationForm::where('RecId',$CalibrationDt[0]['CalibrationId'])->select("Name")->get();
				$MailData['CalibrationMethod']=$CalibrationName[0]['Name'];
				$InstrumentName=GetInstrumentMaster::where('RecId',$CalibrationDt[0]['InstrumentId'])->select("Name")->get();
				$MailData['InstrumentID']=$InstrumentName[0]['Name'];
				$DeviceName=GetDeviceMaster::where('RecId',$CalibrationDt[0]['DeviceId'])->select("Name")->get();
				$MailData['DeviceType']=$DeviceName[0]['Name'];
				$MailData['Make']=$CalibrationDt[0]['Make'];
				$MailData['Model']=$CalibrationDt[0]['Model'];
				$MailData['CalibratedDate']=$CalibrationDt[0]['CalibrationDate'];
				$MailData['NextCalibratedDate']=$CalibrationDt[0]['CalibrationNextDate'];
				if($CalibrationDt[0]['SpiritLevel']==1)
				{
					$MailData['BalanceChecked']="Yes";
				}
				else if($CalibrationDt[0]['SpiritLevel']==2)
				{
					$MailData['BalanceChecked']="No";
				}
				else
				{
					$MailData['BalanceChecked']=" ";
				}

				if($CalibrationDt[0]['Internal']==1)
				{
					$MailData['InternalCalibration']="Passes";
				}
				else if($CalibrationDt[0]['Internal']==2)
				{
					$MailData['InternalCalibration']="Fails";
				}
				else
				{
					$MailData['InternalCalibration']=" ";
				}

				$ApprovelUsers=GetUserData::whereIn('Role',[2,3])->select("UserId","UserName","UserEmail","ContactNum","Role")->where("UserEmail","!=","")->get();
				foreach ($ApprovelUsers as $key => $val)
				{
					if($val->UserEmail!='' && strpos($val->UserEmail, '.') !== false && strpos($val->UserEmail, '@') !== false)
					{
						$MailData['Email']=$val->UserEmail;
						$MailData['UserName']=$val->UserName;
						$StatusText="";
						$StatusMaster=GetStatusMaster::where('RecId',$request['Status'])->get();
						if(isset($StatusMaster[0]['Name']))
						{
							$StatusText=$StatusMaster[0]['Name'];
						}
						$MailData['StatusText']=$StatusText;
						$MailData['RecId'] = $UpdData['RecId'];

						Mail::send([],[], function ($message)  use ($MailData) {
							$message->to($MailData['Email'], $MailData['UserName'])->subject('Form is '.$MailData['StatusText'].' on Calibration App');
							$message->setBody("<p><b>Form ID :</b> ".$MailData['FormId']."</p><p><b>Calibration Method :</b> ".$MailData['CalibrationMethod']."</p><p><b>Instrument :</b> ".$MailData['InstrumentID']."</p><p><b>Device :</b> ".$MailData['DeviceType']."</p><p><b>Make :</b> ".$MailData['Make']."</p><p><b>Model :</b> ".$MailData['Model']."</p><p><b>Calibrated on :</b> ".$MailData['CalibratedDate']."</p><p><b>Next Calibration on :</b> ".$MailData['NextCalibratedDate']."</p><p><b>Spirit level of Balance Checked :</b> ".$MailData['BalanceChecked']."</p><p><b>Internal Calibration :</b> ".$MailData['InternalCalibration']."</p><p><b>View Form :</b> <a href='".url('ViewCalibration/'.$MailData['RecId'])."' target='_blank'>Click Here</a></p>","text/html");
						});
					}
				}

				if (Mail::failures()) {
					return redirect("/ViewCalibration/".$UpdData['RecId'])->with('failed', 'Mail Server Bad Request Error');
				}
				else
				{
					return redirect("/ViewCalibration/".$UpdData['RecId'])->with('success', 'Calibration form successfully '.$StatusText.' ');
				}
			}
			else
			{
				return redirect("/ViewCalibration/".$UpdData['RecId'])->with('failed', 'Unable to '.$StatusText.' Calibration record');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function ApproveMonthlyCalibration(Request $request)
	{
		if(Session::get('LoginData'))
		{
			//echo"<pre>"; print_r($request->all()); exit;
			$Calibration = new GetCalibration();
			$UpdData=[];
			$UpdData['RecId']=$request['RecId'];
			$UpdData['Status']=$request['Status'];
			$UpdData['AproovelBy']=Session::get('LoginData')['UserId'];
			$UpdData['AproovelDate']=now();
			if($Calibration->UpdCalibrationStatus1($UpdData))
			{


				$MailData=[];
				$CalibrationDt=GetCalibration::where('RecId',$request['RecId'])->select("RecId","FormId","Make","Model","CalibrationId","InstrumentId","DeviceId","SpiritLevel","Internal","CalibrationDate","CalibrationNextDate")->get();

				//Add Auto Comment
				$CalibrationComment = new GetCalibrationComment();
				$StatusMaster=GetStatusMaster::where('RecId',$request['Status'])->first();
				$UserMaster=GetUserData::where('UserId',Session::get('LoginData')['UserId'])->first();
				$CalCommentDt=[];
				$CData['LineRecId']=0;
				$CData['RefRecId']=$request['RecId'];
				$CData['CalibrationStatus']=$request['Status'];
				$CData['Type']=2;
				$CData['Comments']="Form : ".$CalibrationDt[0]['FormId']." is ".$StatusMaster['Name']." by ".$UserMaster['UserName']." at ".date("d/m/Y h:i A").".";
				$CData['CreatedBy']=Session::get('LoginData')['UserId'];
				$CData['CreatedDate']=now();
				$CalCommentDt[0]=$CData;
				$CalibrationComment->InsertCalibrationComment($CalCommentDt);

				$MailData['FormId']=$CalibrationDt[0]['FormId'];
				$CalibrationName=GetCalibrationForm::where('RecId',$CalibrationDt[0]['CalibrationId'])->select("Name")->get();
				$MailData['CalibrationMethod']=$CalibrationName[0]['Name'];
				$InstrumentName=GetInstrumentMaster::where('RecId',$CalibrationDt[0]['InstrumentId'])->select("Name")->get();
				$MailData['InstrumentID']=$InstrumentName[0]['Name'];
				$DeviceName=GetDeviceMaster::where('RecId',$CalibrationDt[0]['DeviceId'])->select("Name")->get();
				$MailData['DeviceType']=$DeviceName[0]['Name'];
				$MailData['Make']=$CalibrationDt[0]['Make'];
				$MailData['Model']=$CalibrationDt[0]['Model'];
				$MailData['CalibratedDate']=$CalibrationDt[0]['CalibrationDate'];
				$MailData['NextCalibratedDate']=$CalibrationDt[0]['CalibrationNextDate'];


				$ApprovelUsers=GetUserData::whereIn('Role',[2,3])->select("UserId","UserName","UserEmail","ContactNum","Role")->where("UserEmail","!=","")->get();
				foreach ($ApprovelUsers as $key => $val)
				{
					if($val->UserEmail!='' && strpos($val->UserEmail, '.') !== false && strpos($val->UserEmail, '@') !== false)
					{
						$MailData['Email']=$val->UserEmail;
						$MailData['UserName']=$val->UserName;
						$StatusText="";
						$StatusMaster=GetStatusMaster::where('RecId',$request['Status'])->get();
						if(isset($StatusMaster[0]['Name']))
						{
							$StatusText=$StatusMaster[0]['Name'];
						}
						$MailData['StatusText']=$StatusText;

						$MailData['url'] = "<p><b>View Form :</b> <a href='".url('ViewMonthlyCalibration/'.$UpdData['RecId'])."' target='_blank'>Click Here</a></p>";

						if($request['CalibrationType']==2)
						{
							$MailData['url'] = "<p><b>View Form :</b> <a href='".url('ViewMonthlyCalibrationMG/'.$UpdData['RecId'])."' target='_blank'>Click Here</a></p>";
						}

						Mail::send([],[], function ($message)  use ($MailData) {
							$message->to($MailData['Email'], $MailData['UserName'])->subject('Form is '.$MailData['StatusText'].' on Calibration App');
							$message->setBody("<p><b>Form ID :</b> ".$MailData['FormId']."</p><p><b>Calibration Method :</b> ".$MailData['CalibrationMethod']."</p><p><b>Instrument :</b> ".$MailData['InstrumentID']."</p><p><b>Device :</b> ".$MailData['DeviceType']."</p><p><b>Make :</b> ".$MailData['Make']."</p><p><b>Model :</b> ".$MailData['Model']."</p><p><b>Calibrated on :</b> ".$MailData['CalibratedDate']."</p><p><b>Next Calibration on :</b> ".$MailData['NextCalibratedDate']."</p>".$MailData['url'],"text/html");
						});
					}
				}

				if (Mail::failures()) {
					if($request['CalibrationType']==2)
					{
						return redirect("/ViewMonthlyCalibrationMG/".$UpdData['RecId'])->with('failed', 'Mail Server Bad Request Error');
					}
					else
					{
						return redirect("/ViewMonthlyCalibration/".$UpdData['RecId'])->with('failed', 'Mail Server Bad Request Error');
					}
				}
				else
				{
					if($request['CalibrationType']==2)
					{
						return redirect("/ViewMonthlyCalibrationMG/".$UpdData['RecId'])->with('success', 'Calibration form successfully '.$StatusText.' ');
					}
					else
					{
						return redirect("/ViewMonthlyCalibration/".$UpdData['RecId'])->with('success', 'Calibration form successfully '.$StatusText.' ');
					}
				}
			}
			else
			{
				return redirect("/ViewMonthlyCalibration/".$UpdData['RecId'])->with('failed', 'Unable to '.$StatusText.' Calibration record');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function PrintCalibration($cid)
	{
		if(Session::get('LoginData'))
		{
			$CalData=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","dm.RecId as DeviceId","dm.DeviceType as DeviceTypeM","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.VerifiedDate","calibration.AproovelBy","calibration.AproovelDate","calibration.CalibrationDate","calibration.CalibrationNextDate","calibration.SpiritLevel","calibration.Internal","calibration.WeightBoxId")->where('calibration.RecId',$cid)->get();
			$MainData['CalData']=$CalData;
			$CalLineData=GetCalibrationLine::where('RefRecId',$cid)->orderBy('LineId', 'asc')->get();
			$MainData['CalLineData']=$CalLineData;
			$CalCommentData=GetCalibrationComment::where('RefRecId',$cid)->orderBy('CreatedDate', 'desc')->get();
			$MainData['CalCommentData']=$CalCommentData;
			// start rhl 08-12-2020 //
			$MainData['SopFormat'] = DB::table('form_settings')->get();
			$MainData['Decimal'] = DB::table('decimal_settings')->get();
			// end rhl 08-12-2020 //
			return view('PrintCalibration',['MainData'=>$MainData]);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function PrintMonthlyCalibration($cid)
	{
		if(Session::get('LoginData'))
		{
			$CalData=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","dm.RecId as DeviceId","dm.DeviceType as DeviceTypeM","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.VerifiedDate","calibration.AproovelBy","calibration.AproovelDate","calibration.CalibrationDate","calibration.CalibrationNextDate","calibration.CalibrationNextDate1","calibration.SpiritLevel","calibration.Internal","calibration.WeightBoxId")->where('calibration.RecId',$cid)->get();
			$MainData['CalData']=$CalData;
			$CalData1=GetMonthlyCalibrationDetails::where('RefRecId',$cid)->get();
			$MainData['CalData1']=$CalData1;

			//Line Data
			$PLineData=GetCalibrationLine::where('RefRecId',$cid)->where('Type',0)->orderBy('LineId', 'asc')->get();
			$MainData['PLineData']=$PLineData;
			$NLineData=GetCalibrationLine::where('RefRecId',$cid)->where('Type',1)->orderBy('LineId', 'asc')->get();
			$MainData['NLineData']=$NLineData;

			$CalCommentData=GetCalibrationComment::where('RefRecId',$cid)->where('Type',2)->orderBy('CreatedDate', 'desc')->get();
			$MainData['CalCommentData']=$CalCommentData;

			$DeviceWeightObsMass=GetCalibrationLineObsMass::where('RefRecId',$cid)->where('Type',0)->orderBy('LineId', 'asc')->get();
			$MainData['DeviceWeightObsMass']=$DeviceWeightObsMass;

			$CalCommentData1=GetCalibrationComment::where('RefRecId',$cid)->where('Type',4)->orderBy('CreatedDate', 'desc')->get();
			$MainData['CalCommentData1']=$CalCommentData1;

			$DeviceWeightPosition=GetCalibrationPositionLine::where('RefRecId',$cid)->where('Type',0)->orderBy('LineId', 'asc')->get();
			$MainData['DeviceWeightPosition']=$DeviceWeightPosition;

			$CalCommentData2=GetCalibrationComment::where('RefRecId',$cid)->where('Type',5)->orderBy('CreatedDate', 'desc')->get();
			$MainData['CalCommentData2']=$CalCommentData2;

			$LineData=GetCalibrationLine::where('RefRecId',$cid)->where('Type',3)->orderBy('LineId', 'asc')->get();
			$MainData['LineData']=$LineData;

			$CalCommentData3=GetCalibrationComment::where('RefRecId',$cid)->where('Type',3)->orderBy('CreatedDate', 'desc')->get();
			$MainData['CalCommentData4']=$CalCommentData3;

			$CalCommentData4=GetCalibrationComment::where('RefRecId',$cid)->where('Type',6)->orderBy('CreatedDate', 'desc')->get();
			$MainData['CalCommentData3']=$CalCommentData4;

			// start rhl 08-12-2020 //
			$MainData['SopFormat'] = DB::table('form_settings')->get();
			$MainData['Decimal'] = DB::table('decimal_settings')->get();
			// end rhl 08-12-2020 //
			return view('PrintMonthlyCalibration',['MainData'=>$MainData]);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function PrintMonthlyCalibrationMG($cid)
	{
		if(Session::get('LoginData'))
		{
			$CalData=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","dm.RecId as DeviceId","dm.DeviceType as DeviceTypeM","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.VerifiedDate","calibration.AproovelBy","calibration.AproovelDate","calibration.CalibrationDate","calibration.CalibrationNextDate","calibration.CalibrationNextDate1","calibration.SpiritLevel","calibration.Internal","calibration.WeightBoxId")->where('calibration.RecId',$cid)->get();
			$MainData['CalData']=$CalData;
			$CalData1=GetMonthlyCalibrationDetails::where('RefRecId',$cid)->get();
			$MainData['CalData1']=$CalData1;

			//Line Data
			$DeviceWeightObsMass=GetCalibrationLineObsMass::where('RefRecId',$cid)->where('Type',0)->orderBy('LineId', 'asc')->get();
			$MainData['DeviceWeightObsMass']=$DeviceWeightObsMass;
			$DeviceWeightPosition=GetCalibrationPositionLine::where('RefRecId',$cid)->where('Type',0)->orderBy('LineId', 'asc')->get();
			$MainData['DeviceWeightPosition']=$DeviceWeightPosition;
			$LineData=GetCalibrationLine::where('RefRecId',$cid)->where('Type',3)->orderBy('LineId', 'asc')->get();
			$MainData['LineData']=$LineData;

			$CalCommentData=GetCalibrationComment::where('RefRecId',$cid)->where('Type',4)->orderBy('CreatedDate', 'desc')->get();
			$MainData['CalCommentData']=$CalCommentData;
			//echo '<pre>';print_r($MainData['LineData']);exit;
			// start rhl 08-12-2020 //
			$MainData['SopFormat'] = DB::table('form_settings')->get();
			$MainData['Decimal'] = DB::table('decimal_settings')->get();
			// end rhl 08-12-2020 //
			return view('PrintMonthlyCalibrationMG',['MainData'=>$MainData]);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SaveCommentTemp($json)
	{
		if(Session::get('LoginData'))
		{
			$json=str_replace('***',"/",$json);
			$Jdata=json_decode($json,true);
			if(Session::get('CommentsData'))
			{
				if(count(Session::get('CommentsData'))>0)
				{
					$CommentsData=Session::get('CommentsData');
					for($i=0; $i<count($CommentsData); $i++)
					{

					}
					$CommentsData[$i]=$Jdata;
				}
			}
			else
			{
				$CommentsData[]=$Jdata;
			}
			Session::put('CommentsData', $CommentsData);
			//echo"<pre>"; print_r(Session::get('CommentsData'));
			return response()->json(Session::get('CommentsData'));
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SummaryReport()
	{
		if(Session::get('LoginData'))
		{
			return view('SummaryReport');
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function SummaryReportData(request $request)
	{
		if(Session::get('LoginData'))
		{
			//echo"<pre>"; print_r($request->all()); exit;
			$CalibrationId=$request['CalibrationId'];
			$CreatedBy=$request['CreatedBy'];
			$ApprovedBy=$request['ApprovedBy'];
			$DeclinedBy=$request['DeclinedBy'];
			$FromCreatedDate=$request['FromCreatedDate'];
			$ToCreatedDate=$request['ToCreatedDate'];
			$Status=$request['Status'];
			$SubmittedBy=$request['SubmittedBy'];
			//$FinalizedBy=$request['FinalizedBy'];
			$FromfinalizationDate=$request['FromfinalizationDate'];
			$TofinalizationDate=$request['TofinalizationDate'];
			$FromCalibrationDate=$request['FromCalibrationDate'];
			$ToCalibrationDate=$request['ToCalibrationDate'];

			$CalData=DB::select("select cal.WeightBoxId,cal.FormId,mcal.Name as CalibrationName,im.Name as InstrumentName,dm.Name as DeviceName,cal.Make,cal.Model,cal.PerformedBy,cal.PerformDate,cal.Status,cal.RecId,cal.VerifiedBy,cal.VerifiedDate,cal.AproovelBy,cal.AproovelDate,cal.CalibrationDate,cal.CalibrationNextDate,cal.SpiritLevel,cal.Internal from calibration as cal inner join calibrationform as mcal on cal.CalibrationId=mcal.RecId inner join instrumentmaster as im on cal.InstrumentId=im.RecId inner join devicemaster as dm on cal.DeviceId=dm.RecId where (CalibrationId='$CalibrationId' OR '$CalibrationId'=0) AND (PerformedBy='$CreatedBy' OR '$CreatedBy'='0') AND ((AproovelBy='$ApprovedBy' and Status=30) OR '$ApprovedBy'='0') AND ((VerifiedBy='$DeclinedBy' and Status=25) OR (AproovelBy='$DeclinedBy' and Status=40) OR '$DeclinedBy'='0') AND (cal.CreatedDate BETWEEN '$FromCreatedDate' AND '$ToCreatedDate' OR '$FromCreatedDate'='' OR '$ToCreatedDate'='') AND (Status='$Status' OR '$Status'=0) AND ((VerifiedBy='$SubmittedBy' and Status=20) OR '$SubmittedBy'='0') AND ((AproovelDate BETWEEN '$FromfinalizationDate' AND '$TofinalizationDate'  AND Status=30 ) OR '$FromfinalizationDate'='' OR '$TofinalizationDate'='') AND (CalibrationDate BETWEEN '$FromCalibrationDate' AND '$ToCalibrationDate' OR '$FromCalibrationDate'='' OR '$ToCalibrationDate'='')");

			$MainData['CalData']=$CalData;

			return view('SummaryReportData',['MainData'=>$MainData]);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}

	function DetailsReport()
	{
		if(Session::get('LoginData'))
		{
			return view('DetailsReport');
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function DetailsReportData(request $request)
	{
		if(Session::get('LoginData'))
		{
			//echo"<pre>"; print_r($request->all()); exit;
			$CalibrationId=$request['CalibrationId'];
			$CreatedBy=$request['CreatedBy'];
			$ApprovedBy=$request['ApprovedBy'];
			$DeclinedBy=$request['DeclinedBy'];
			$FromCreatedDate=$request['FromCreatedDate'];
			$ToCreatedDate=$request['ToCreatedDate'];
			$Status=$request['Status'];
			$SubmittedBy=$request['SubmittedBy'];
			//$FinalizedBy=$request['FinalizedBy'];
			$FromfinalizationDate=$request['FromfinalizationDate'];
			$TofinalizationDate=$request['TofinalizationDate'];
			$FromCalibrationDate=$request['FromCalibrationDate'];
			$ToCalibrationDate=$request['ToCalibrationDate'];

			$CalData=DB::select("select cal.WeightBoxId,cal.FormId,mcal.Name as CalibrationName,im.Name as InstrumentName,dm.Name as DeviceName,dm.DeviceType as DeviceTypeM,cal.Make,cal.Model,cal.PerformedBy,cal.PerformDate,cal.Status,cal.RecId,cal.VerifiedBy,cal.VerifiedDate,cal.AproovelBy,cal.AproovelDate,cal.CalibrationDate,cal.CalibrationNextDate,cal.SpiritLevel,cal.Internal from calibration as cal inner join calibrationform as mcal on cal.CalibrationId=mcal.RecId inner join instrumentmaster as im on cal.InstrumentId=im.RecId inner join devicemaster as dm on cal.DeviceId=dm.RecId where (CalibrationId='$CalibrationId' OR '$CalibrationId'=0) AND (PerformedBy='$CreatedBy' OR '$CreatedBy'='0') AND ((AproovelBy='$ApprovedBy' and Status=30) OR '$ApprovedBy'='0') AND ((VerifiedBy='$DeclinedBy' and Status=25) OR (AproovelBy='$DeclinedBy' and Status=40) OR '$DeclinedBy'='0') AND (cal.CreatedDate BETWEEN '$FromCreatedDate' AND '$ToCreatedDate' OR '$FromCreatedDate'='' OR '$ToCreatedDate'='') AND (Status='$Status' OR '$Status'=0) AND ((VerifiedBy='$SubmittedBy' and Status=20) OR '$SubmittedBy'='0') AND ((AproovelDate BETWEEN '$FromfinalizationDate' AND '$TofinalizationDate'  AND Status=30 ) OR '$FromfinalizationDate'='' OR '$TofinalizationDate'='') AND (CalibrationDate BETWEEN '$FromCalibrationDate' AND '$ToCalibrationDate' OR '$FromCalibrationDate'='' OR '$ToCalibrationDate'='')");

			$MainData['CalData']=$CalData;
			$MainData['Decimal'] = DB::table('decimal_settings')->get(); 
			return view('DetailsReportData',['MainData'=>$MainData]); 
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}

	function RePerformReq(request $request)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==2)
			{

				$CalReqData=GetCalibrationReq::where("CalibrationId",$request['RCalibrationId'])->where("InstrumentId",$request['RInstrumentId'])->where("DeviceId",$request['RDeviceId'])->where("CalibrationDate",date("Y-m-d",strtotime(Now())))->where("ReqStatus",10);
				if($CalReqData->count()>0)
				{
					return redirect("/AddCalibration")->with('failed', 'Re-Perform request already sent waiting for response...');
				}
				else
				{
					$Calibrationreq = new GetCalibrationReq();
					$request['CreatedBy']=Session::get('LoginData')['UserId'];
					$data=$request;
					if($Calibrationreq->SaveCalibrationreq($data))
					{
						return redirect("/AddCalibration")->with('success', 'Request has been sent...');
					}
					else
					{
						return redirect("/AddCalibration")->with('failed', 'Unable to accept request...');
					}
				}
			}
			else
			{
				return redirect("/")->with('failed', 'Re-Perform request only Analysis user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function RePerformRequestList(Request $request)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==3 || Session::get('LoginData')['Role']==4)
			{
				$MainData['ReqList']=DB::select("SELECT calreq.RecId as ReqRecId,cal.FormId,mcal.Name as 'CalibrationName',im.Name as 'InstrumentName',dm.Name as 'DeviceName',cal.Status,cal.RecId,calreq.ReqStatus,calreq.CreatedDate FROM calibrationreq as calreq  inner JOIN calibration as cal on cal.CalibrationId=calreq.CalibrationId and cal.InstrumentId=calreq.InstrumentId and cal.DeviceId=calreq.DeviceId and DATE_FORMAT(cal.PerformDate, '%Y%m%d')=calreq.CalibrationDate inner join calibrationform as mcal on Cal.CalibrationId = mcal.RecId inner join instrumentmaster as im on Cal.InstrumentId = im.RecId inner join devicemaster as dm on Cal.DeviceId = dm.RecId order BY calreq.CreatedDate desc");

				return view('RePerform',['MainData'=>$MainData]);
			}
			else
			{
				return redirect("/")->with('failed', 'Unable to access this page...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function UpdReqStatus(request $request)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==3 || Session::get('LoginData')['Role']==4)
			{
				$Calibration = new GetCalibration();
				$CalibrationReq = new GetCalibrationReq();
				$request['ResponseBy']=Session::get('LoginData')['UserId'];
				$data=$request;
				if($CalibrationReq->UpdReqStatus($data))
				{
					if($request['ReqStatus']==20)
					{
						if($Calibration->Request_RePerform($data))
						{
							return redirect("/RePerformRequestList")->with('success', 'Request Status has been updated ...');
						}
						else
						{
							return redirect("/RePerformRequestList")->with('failed', 'Unable to accept request...');
						}
					}
					else
					{
						return redirect("/RePerformRequestList")->with('success', 'Request Status has been updated ...');
					}
				}
				else
				{
					return redirect("/RePerformRequestList")->with('failed', 'Unable to accept request...');
				}
			}
			else
			{
				return redirect("/")->with('failed', 'Unable to access this Request');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function sendmail()
	{
		Mail::send([],[], function ($message) {
			//$message->to("dk@omtechsoft.com", 'Dk')->subject('Test Mail');
			$message->to("dinesh@inboxtechs.com", 'Dk')->subject('Test Mail');
			$message->setBody("<p>testing mail</p>","text/html");
		});
		if (Mail::failures()) {
			return 'Mail Server Bad Request Error';
		}
		else
		{
			return 'Data has been saved successfully';
		}
	}

	function standard_deviation($aValues, $bSample = true)
	{
		$fMean = array_sum($aValues) / count($aValues);
		$fVariance = 0.0;
		foreach ($aValues as $i)
		{
			$fVariance += pow($i - $fMean, 2);
		}
		$fVariance /= ( $bSample ? count($aValues) - 1 : count($aValues) );
		return (float) sqrt($fVariance);
	}
	// rhl 17-12-2020 //

	function AjaxGetDeviceTypeFormId($data)
	{
		if(Session::get('LoginData'))
		{
			$request=json_decode($data,true);
			$FormId = '';
			$caldata=GetDeviceMaster::where('RecId',$request['did'])->select("Instrument_No","DeviceType")->first();
			if($caldata->DeviceType==1 && $request['calibration_type'] == 'Daily')
			{
				$form_settings = DB::table('form_settings')->where('calibration_type',1)->first();

				$CalReqData=GetCalibrationReq::where("CalibrationId",$request['CalibrationMethod'])->where("InstrumentId",$request['InstrumentID'])->where("DeviceId",$request['DeviceType'])->where("CalibrationDate",date("Y-m-d",strtotime(Now())))->where("ReqStatus","!=",10);
				$count = $CalReqData->count();
				if($count < 10){
					$count = "0".$count;
				}

				$FormId=$form_settings->form_id1."/".$caldata->Instrument_No."/".date('y')."/".date('m')."/".date('d')."/D/".$count;
			}
			elseif($caldata->DeviceType==2 && $request['calibration_type'] == 'Daily')
			{
				$form_settings = DB::table('form_settings')->where('calibration_type',2)->first();
				$CalReqData=GetCalibrationReq::where("CalibrationId",$request['CalibrationMethod'])->where("InstrumentId",$request['InstrumentID'])->where("DeviceId",$request['DeviceType'])->where("CalibrationDate",date("Y-m-d",strtotime(Now())))->where("ReqStatus","!=",10);
				$count = $CalReqData->count();
				if($count < 10){
					$count = "0".$count;
				}

				$FormId=$form_settings->form_id4."/".$caldata->Instrument_No."/".date('y')."/".date('m')."/".date('d')."/D/".$count;
			}
			elseif($request['calibration_type'] == 'Monthly')
			{
				$form_settings = DB::table('form_settings')->where('calibration_type',3)->first();
				$CalReqData=GetCalibrationReq::where("CalibrationId",$request['CalibrationMethod'])->where("InstrumentId",$request['InstrumentID'])->where("DeviceId",$request['DeviceType'])->where("CalibrationDate",date("Y-m-d",strtotime(Now())))->where("ReqStatus","!=",10);
				$count = $CalReqData->count();
				if($count < 10){
					$count = "0".$count;
				}

				$FormId=$form_settings->form_id2."/".$caldata->Instrument_No."/".date('y')."/".date('m')."/".date('d')."/M/".$count;
			}
			elseif($request['calibration_type'] == 'MonthlyMicro')
			{
				$form_settings = DB::table('form_settings')->where('calibration_type',4)->first();
				$CalReqData=GetCalibrationReq::where("CalibrationId",$request['CalibrationMethod'])->where("InstrumentId",$request['InstrumentID'])->where("DeviceId",$request['DeviceType'])->where("CalibrationDate",date("Y-m-d",strtotime(Now())))->where("ReqStatus","!=",10);
				$count = $CalReqData->count();
				if($count < 10){
					$count = "0".$count;
				}

				$FormId=$form_settings->form_id3."/".$caldata->Instrument_No."/".date('y')."/".date('m')."/".date('d')."/M/".$count;
			}
			return $FormId;
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}

	function SendMailBeforeFourDays()
	{
		$MonthlyCalibration=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("mcal.CType","calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.AproovelBy","dm.DeviceType","calibration.CalibrationNextDate1","calibration.CalibrationId","calibration.InstrumentId")->whereIn('Status',[10,20,30])->where('mcal.CType',2)->where('calibration.CalibrationNextDate1', '>', date('Y-m-d H:i:s'))->get();

		if($MonthlyCalibration->count() > 0){
			foreach ($MonthlyCalibration as $request) {
				//echo '<pre>';print_r($request);
				//echo '<br/>'.$request->CalibrationNextDate1." = ".date('Y-m-d H:i:s', strtotime('-4 days', strtotime($request->CalibrationNextDate1)));
				//$previousdate = date('Y-m-d', strtotime('-4 days', strtotime($request->CalibrationNextDate1)));

				$date1=date_create(date('Y-m-d',strtotime($request->CalibrationNextDate1)));
				$date2=date_create(date('Y-m-d'));
				$diff=date_diff($date1,$date2);
				//echo '<br/>'.$diff->format("%a");
				if($diff->format("%a") == 4){

				//Mail Sent code
					$MailData=[];
					$MailData['FormId']=$request->FormId;
					$CalibrationName=GetCalibrationForm::where('RecId',$request->CalibrationId)->select("Name")->get();
					$MailData['CalibrationMethod']=$CalibrationName[0]['Name'];
					$InstrumentName=GetInstrumentMaster::where('RecId',$request->InstrumentId)->select("Name")->get();
					$MailData['InstrumentID']=$InstrumentName[0]['Name'];
					$DeviceName=GetDeviceMaster::where('RecId',$request->DeviceType)->select("Name")->get();
					$MailData['DeviceType']=$DeviceName[0]['Name'];
					$MailData['Make']=$request->Make;
					$MailData['Model']=$request->Model;
					$MailData['CalibratedDate']=$request->CalibratedDate;
					$MailData['NextCalibratedDate']=$request->CalibrationNextDate1;

					$MailData['url'] = "<p><b>View Form :</b> <a href='".url('ViewMonthlyCalibration/'.$request->RecId)."' target='_blank'>Click Here</a></p>";

					if($request->DeviceType == 2){
						$MailData['url'] = "<p><b>View Form :</b> <a href='".url('ViewMonthlyCalibrationMG/'.$request->RecId)."' target='_blank'>Click Here</a></p>";
					}

					$VerifyUsers=GetUserData::where('Role',3)->select("UserId","UserName","UserEmail","ContactNum","Role")->where("UserEmail","!=","")->get();
					foreach ($VerifyUsers as $key => $val)
					{
						if($val->UserEmail!='' && strpos($val->UserEmail, '.') !== false && strpos($val->UserEmail, '@') !== false)
						{
							$MailData['Email']= $val->UserEmail;
							$MailData['UserName']=$val->UserName;

							Mail::send([],[], function ($message)  use ($MailData) {
								$message->to($MailData['Email'], $MailData['UserName'])->subject('Reminder of Monthly Calibration Form');
							
								$message->setBody("<p><b>Monthly Calibration :</b> </p><p><b>Form ID :</b> ".$MailData['FormId']."</p><p><b>Calibration Method :</b> ".$MailData['CalibrationMethod']."</p><p><b>Instrument :</b> ".$MailData['InstrumentID']."</p><p><b>Device :</b> ".$MailData['DeviceType']."</p><p><b>Make :</b> ".$MailData['Make']."</p><p><b>Model :</b> ".$MailData['Model']."</p><p><b>Calibrated on :</b> ".$MailData['CalibratedDate']."</p><p><b>Next Calibration on :</b> ".$MailData['NextCalibratedDate']."</p>".$MailData['url'],"text/html");
							});
						}
					}

					if (Mail::failures()) {
						
					}
					else
					{
						
					}
				// end Main Send Code //
				}
			}
		}
	}
	// end rhl 17-12-2020 //
}

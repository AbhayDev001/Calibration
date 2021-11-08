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
use App\Models\GetDevicePositionWeight;
use App\Models\GetWeightBox;

class AdminController extends BaseController
{
	function AddUser()
	{
		if(Session::get('LoginData')['Role']==1)
		{
			return view('AddUser');
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function ManageUser($IsActive)
	{
		if(Session::get('LoginData')['Role']==1)
		{
			$MainData=[];
			$MainData['Users']=[];
			if($IsActive=="ActiveUser")
			{
				$MainData['Users']=GetUserData::where('userid','!=',Session::get('LoginData')['UserId'])->where('IsActive','1')->orderBy('CreatedDate', 'desc')->get();
			}
			if($IsActive=="DeactiveUser")
			{
				$MainData['Users']=GetUserData::where('userid','!=',Session::get('LoginData')['UserId'])->where('IsActive','0')->orderBy('CreatedDate', 'desc')->get();
			}

			return view('ManageUser',['MainData'=>$MainData]);
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function AjaxGetUserData($userid)
	{
		if(Session::get('LoginData')['Role']==1)
		{
			$UserData=GetUserData::where('UserId',$userid)->select("UserId","UserName","UserEmail","ContactNum","Role","LdapUser","Password")->first();
			return response()->json($UserData);
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function UpdUser(Request $request)
	{
		if(Session::get('LoginData')['Role']==1)
		{
		//echo"<pre>"; print_r($request->all()); exit;
			$UserId=$request['UserId'];
			$UserName=$request['UserName'];
			$UserEmail=$request['UserEmail'];
			$ContactNum=$request['ContactNum'];
			$UserType=$request['UserType'];
			$Password=$request['Password'];

			$data=[];
			$data['UserId']=$UserId;
			$data['UserName']=$UserName;
			$data['UserEmail']=$UserEmail;
			$data['ContactNum']=$ContactNum;
			$data['Role']=$UserType;
			$data['Password']=$Password;

			$UserData=GetUserData::where('UserId',$UserId)->first();

			if($UserData['IsActive']>0)
			{
				$Goto="ActiveUser";
			}
			else
			{
				$Goto="DeactiveUser";
			}

			$GetUserData = new GetUserData();
			if($GetUserData->UpdUser1($data))
			{
				return redirect("/ManageUser/$Goto")->with('success', 'User data has been update successfully.');
			}
			else
			{
				return redirect("/ManageUser/$Goto")->with('failed', 'Unable to update data user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function ActiveDeactiveUser(Request $request)
	{
		if(Session::get('LoginData')['Role']==1)
		{
			$UserId=$request['UserId'];
			$IsActive=$request['IsActive'];
			$ActiveStatus="update successfully";
			if($IsActive==1)
			{
				$Goto="ActiveUser";
				$IsActive=0;
				$ActiveStatus="Deactivated";
			}
			else if($IsActive==0)
			{
				$Goto="DeactiveUser";
				$IsActive=1;
			}
			else
			{
				$Goto="ActiveUser";
				$IsActive=$IsActive;
				$ActiveStatus="Activated";
			}

			$data=[];
			$data['UserId']=$UserId;
			$data['IsActive']=$IsActive;

			$GetUserData = new GetUserData();
			if($GetUserData->ActiveDeactiveUser($data))
			{
				return redirect("/ManageUser/$Goto")->with('success', 'User has been '.$ActiveStatus.' ');
			}
			else
			{
				return redirect("/ManageUser/$Goto")->with('failed', 'Unable to '.$ActiveStatus.' user...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function ManageLog()
	{
		if(Session::get('LoginData')['Role']==1)
		{
			return view('ManageLog');
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function LogFilterData(request $request)
	{
		//echo"<pre>"; print_r($request->all()); exit;
		if(Session::get('LoginData'))
		{
			$FROMDATE=$request['FROMDATE'];
			$TODATE=$request['TODATE'];
			$FillterLogType=$request['FillterLogType'];
			$MainData=[];
			$MainData["FillterLogType"]=$FillterLogType;
			$MainData["LogData"]=[];
			if($FillterLogType==1)
			{
				$LogData=GetLoginLog::join('usermaster as um', 'um.UserId', '=', 'userloginlog.UserId')->whereBetween('userloginlog.LoginDate', [$FROMDATE, $TODATE])->select("um.UserId","um.UserName","LoginDate","Status")->get();

			}
			if($FillterLogType==2)
			{
				$LogData=GetCalibrationComment::join('calibration as cal', 'cal.RecId', '=', 'calibrationcomment.RefRecId')->join('usermaster as um', 'um.UserId', '=', 'calibrationcomment.CreatedBy')->join('statusmaster as sm', 'sm.RecId', '=', 'calibrationcomment.CalibrationStatus')->whereBetween('calibrationcomment.CreatedDate', [$FROMDATE, $TODATE])->select("FormId","calibrationcomment.CalibrationStatus","calibrationcomment.Comments","um.UserName","calibrationcomment.CreatedDate","sm.Name")->get();
			}

			$MainData['LogData']=$LogData;

			return view('ManageLog',['MainData'=>$MainData]);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function PrintLogFilterData(request $request)
	{
		//echo"<pre>"; print_r($request->all()); exit;
		if(Session::get('LoginData'))
		{
			$FROMDATE=$request['FROMDATE'];
			$TODATE=$request['TODATE'];
			$FillterLogType=$request['FillterLogType'];
			$MainData=[];
			$MainData["FillterLogType"]=$FillterLogType;
			$MainData["LogData"]=[];
			if($FillterLogType==1)
			{
				$LogData=GetLoginLog::join('usermaster as um', 'um.UserId', '=', 'userloginlog.UserId')->whereBetween('userloginlog.LoginDate', [$FROMDATE, $TODATE])->select("um.UserId","um.UserName","LoginDate","Status")->get();

			}
			if($FillterLogType==2)
			{
				$LogData=GetCalibrationComment::join('calibration as cal', 'cal.RecId', '=', 'calibrationcomment.RefRecId')->join('usermaster as um', 'um.UserId', '=', 'calibrationcomment.CreatedBy')->join('statusmaster as sm', 'sm.RecId', '=', 'calibrationcomment.CalibrationStatus')->whereBetween('calibrationcomment.CreatedDate', [$FROMDATE, $TODATE])->select("FormId","calibrationcomment.CalibrationStatus","calibrationcomment.Comments","um.UserName","calibrationcomment.CreatedDate","sm.Name")->get();
			}

			$MainData['LogData']=$LogData;
			if(isset($request['BtnPrint']))
			{
				return view('LogFilterData',['MainData'=>$MainData]);
			}
			else
			{
				return view('LogFilterDataExport',['MainData'=>$MainData]);
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function ManageCalibrationFormType()
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			return view('ManageCalibrationFormType');
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function SaveFormType(Request $request)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$FormTypeName=$request['FormTypeName'];
			$FormDays=$request['FormDays'];
			$data=[];
			$data['Name']=$FormTypeName;
			$data['DayAdd']=$FormDays;
			$data['IsActive']=1;
			$data['CreatedBy']=Session::get('LoginData')['UserId'];
			$data['CreatedDate']=now();
			$GetCalibrationFormType = new GetCalibrationFormType();
			if($GetCalibrationFormType->SaveCalFormType($data))
			{
				return redirect("/ManageCalibrationFormType")->with('success', 'Calibration form type has been added successfully.');
			}
			else
			{
				return redirect("/ManageCalibrationFormType")->with('failed', 'Unable to add Calibration form type...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function AjaxGetCaliFormType($RecId)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$FormTypeData=GetCalibrationFormType::where('RecId',$RecId)->first();
			return response()->json($FormTypeData);
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function UpdCaliFormType(Request $request)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$RecId=$request['RecId'];
			$Name=$request['FormTypeName'];
			$DayAdd=$request['FormDays'];

			$data=[];
			$data['RecId']=$RecId;
			$data['Name']=$Name;
			$data['DayAdd']=$DayAdd;

			$GetCalibrationFormType = new GetCalibrationFormType();
			if($GetCalibrationFormType->UpdCalFormType($data))
			{
				return redirect("/ManageCalibrationFormType")->with('success', 'Calibration form type has been updated successfully.');
			}
			else
			{
				return redirect("/ManageCalibrationFormType")->with('failed', 'Unable to update Calibration form type...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function ActiveDeactiveCalFormType(Request $request)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$RecId=$request['RecId'];
			$IsActive=$request['IsActive'];
			$ActiveStatus="update successfully";
			if($IsActive==1)
			{
				$ActiveStatus="Deactivated";
				$IsActive=0;
			}
			else if($IsActive==0)
			{
				$ActiveStatus="Activated";
				$IsActive=1;
			}
			else
			{
				$IsActive=$IsActive;
			}

			$data=[];
			$data['RecId']=$RecId;
			$data['IsActive']=$IsActive;

			$GetCalibrationFormType = new GetCalibrationFormType();
			if($GetCalibrationFormType->ActiveDeactiveCalFormType($data))
			{
				return redirect("/ManageCalibrationFormType")->with('success', 'Calibration form type has been '.$ActiveStatus.'.');
			}
			else
			{
				return redirect("/ManageCalibrationFormType")->with('failed', 'Unable to '.$ActiveStatus.' Calibration form type...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}

	function ManageCalibrationForm()
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			return view('ManageCalibrationForm');
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function SaveCaliForm(Request $request)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$FormTypeName=$request['FormTypeName'];
			$CType=$request['CType'];
			$data=[];
			$data['Name']=$FormTypeName;
			$data['CType']=$CType;
			$data['IsActive']=1;
			$data['CreatedBy']=Session::get('LoginData')['UserId'];
			$data['CreatedDate']=now();
			$GetCalibrationForm = new GetCalibrationForm();
			if($GetCalibrationForm->SaveCaliForm($data))
			{
				return redirect("/ManageCalibrationFormData")->with('success', 'Calibration form has been added successfully.');
			}
			else
			{
				return redirect("/ManageCalibrationFormData")->with('failed', 'Unable to add Calibration form...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function AjaxGetCaliForm($RecId)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$FormTypeData=GetCalibrationForm::where('RecId',$RecId)->first();
			return response()->json($FormTypeData);
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function UpdCaliForm(Request $request)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$RecId=$request['RecId'];
			$Name=$request['FormTypeName'];
			$CType=$request['CType'];

			$data=[];
			$data['RecId']=$RecId;
			$data['Name']=$Name;
			$data['CType']=$CType;

			$GetCalibrationForm = new GetCalibrationForm();
			if($GetCalibrationForm->UpdCaliForm($data))
			{
				return redirect("/ManageCalibrationFormData")->with('success', 'Calibration form has been updated successfully.');
			}
			else
			{
				return redirect("/ManageCalibrationFormData")->with('failed', 'Unable to update Calibration form...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function ActiveDeactiveCalForm(Request $request)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$RecId=$request['RecId'];
			$IsActive=$request['IsActive'];
			$ActiveStatus="update successfully";
			if($IsActive==1)
			{
				$IsActive=0;
				$ActiveStatus="Deactivated";
			}
			else if($IsActive==0)
			{
				$IsActive=1;
				$ActiveStatus="Activated";
			}
			else
			{
				$IsActive=$IsActive;
			}

			$data=[];
			$data['RecId']=$RecId;
			$data['IsActive']=$IsActive;

			$GetCalibrationForm = new GetCalibrationForm();
			if($GetCalibrationForm->ActiveDeactiveCaliForm($data))
			{
				return redirect("/ManageCalibrationFormData")->with('success', 'Calibration form has been '.$ActiveStatus.'.');
			}
			else
			{
				return redirect("/ManageCalibrationFormData")->with('failed', 'Unable to '.$ActiveStatus.' Calibration form...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}

	function ManageInstrument()
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			return view('ManageInstrument');
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function SaveInstrument(Request $request)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$Name=$request['InstrumentName'];
			$data=[];
			$data['Name']=$Name;
			$data['IsActive']=1;
			$data['CreatedBy']=Session::get('LoginData')['UserId'];
			$data['CreatedDate']=now();
			$GetInstrumentMaster = new GetInstrumentMaster();
			if($GetInstrumentMaster->SaveInstrument($data))
			{
				return redirect("/ManageInstrument")->with('success', 'Instrument has been added successfully.');
			}
			else
			{
				return redirect("/ManageInstrument")->with('failed', 'Unable to add Instrument...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function AjaxGetInstrument1($RecId)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$InstrumentMaster=GetInstrumentMaster::where('RecId',$RecId)->first();
			return response()->json($InstrumentMaster);
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function UpdInstrument(Request $request)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$RecId=$request['RecId'];
			$Name=$request['InstrumentName'];

			$data=[];
			$data['RecId']=$RecId;
			$data['Name']=$Name;

			$GetInstrumentMaster = new GetInstrumentMaster();
			if($GetInstrumentMaster->UpdInstrument($data))
			{
				return redirect("/ManageInstrument")->with('success', 'Instrument has been updated successfully.');
			}
			else
			{
				return redirect("/ManageInstrument")->with('failed', 'Unable to update Instrument...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function ActiveDeactiveInstrument(Request $request)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$RecId=$request['RecId'];
			$IsActive=$request['IsActive'];
			$ActiveStatus="update successfully";
			if($IsActive==1)
			{
				$IsActive=0;
				$ActiveStatus="Deactivated";
			}
			else if($IsActive==0)
			{
				$IsActive=1;
				$ActiveStatus="Activated";
			}
			else
			{
				$IsActive=$IsActive;
			}

			$data=[];
			$data['RecId']=$RecId;
			$data['IsActive']=$IsActive;

			$GetInstrumentMaster = new GetInstrumentMaster();
			if($GetInstrumentMaster->ActiveDeactiveInstrument($data))
			{
				return redirect("/ManageInstrument")->with('success', 'Instrument has been '.$ActiveStatus.'.');
			}
			else
			{
				return redirect("/ManageInstrument")->with('failed', 'Unable to '.$ActiveStatus.' Instrument...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}

	function AddDevices()
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			return view('AddDevices');
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function ManageDevice($IsActive)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$MainData=[];
			$MainData['Device']=[];
			if($IsActive=="ActiveDevices")
			{
				$MainData['Device']=GetDeviceMaster::where('IsActive','1')->orderBy('CreatedDate', 'desc')->get();
			}
			if($IsActive=="DeactiveDevices")
			{
				$MainData['Device']=GetDeviceMaster::where('IsActive','0')->orderBy('CreatedDate', 'desc')->get();
			}
			return view('ManageDevice',['MainData'=>$MainData]);
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function SaveDevice(Request $request)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$DeviceName=$request['DeviceName'];
			$InstrumentId=$request['InstrumentId'];
			$Make=$request['Make'];
			$Model=$request['Model'];
			$SearialNo=$request['SearialNo'];
			$DirPath=$request['DirPath'];
			$DeviceType=$request['DeviceType'];
			$Instrument_No=$request['Instrument_No'];

			$data=[];
			$data['Instrument_No']=$Instrument_No;
			$data['Name']=$DeviceName;
			$data['InstrumentId']=$InstrumentId;
			$data['Make']=$Make;
			$data['Model']=$Model;
			$data['SearialNo']=$SearialNo;
			$data['DirPath']=$DirPath;
			$data['DeviceType']=$DeviceType;
			$data['IsActive']=1;
			$data['CreatedBy']=Session::get('LoginData')['UserId'];
			$data['CreatedDate']=now();
			$GetDeviceMaster = new GetDeviceMaster();
			if($GetDeviceMaster->SaveDevice($data))
			{
				return redirect("/AddDevices")->with('success', 'Device has been added successfully.');
			}
			else
			{
				return redirect("/AddDevices")->with('failed', 'Unable to add Device...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function AjaxGetDevice1($RecId)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$DeviceMaster=GetDeviceMaster::where('RecId',$RecId)->first();
			return response()->json($DeviceMaster);
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function UpdDevice(Request $request)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$RecId=$request['RecId'];
			$DeviceName=$request['DeviceName'];
			$InstrumentId=$request['InstrumentId'];
			$Make=$request['Make'];
			$Model=$request['Model'];
			$SearialNo=$request['SearialNo'];
			$DirPath=$request['DirPath'];
			$DeviceType=$request['DeviceType'];
			$Instrument_No=$request['Instrument_No'];

			$data=[];
			$data['Instrument_No']=$Instrument_No;
			$data['RecId']=$RecId;
			$data['Name']=$DeviceName;
			$data['InstrumentId']=$InstrumentId;
			$data['Make']=$Make;
			$data['Model']=$Model;
			$data['SearialNo']=$SearialNo;
			$data['DirPath']=$DirPath;
			$data['DeviceType']=$DeviceType;

			$DeviceData=GetDeviceMaster::where('RecId',$RecId)->first();

			if($DeviceData['IsActive']>0)
			{
				$Goto="ActiveDevices";
			}
			else
			{
				$Goto="DeactiveDevices";
			}

			$GetDeviceMaster = new GetDeviceMaster();
			if($GetDeviceMaster->UpdDevice($data))
			{
				return redirect("/ManageDevice/$Goto")->with('success', 'Device has been updated successfully.');
			}
			else
			{
				return redirect("/ManageDevice/$Goto")->with('failed', 'Unable to update Device...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function ActiveDeactiveDevice(Request $request)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$RecId=$request['RecId'];
			$IsActive=$request['IsActive'];
			$ActiveStatus="update successfully";
			if($IsActive==1)
			{
				$Goto="ActiveDevices";
				$IsActive=0;
				$ActiveStatus="Deactivated";
			}
			else if($IsActive==0)
			{
				$Goto="DeactiveDevices";
				$IsActive=1;
				$ActiveStatus="Activated";
			}
			else
			{
				$Goto="ActiveDevices";
				$IsActive=$IsActive;
			}

			$data=[];
			$data['RecId']=$RecId;
			$data['IsActive']=$IsActive;

			$GetDeviceMaster = new GetDeviceMaster();
			if($GetDeviceMaster->ActiveDeactiveDevice($data))
			{
				return redirect("/ManageDevice/$Goto")->with('success', 'Device has been '.$ActiveStatus.'.');
			}
			else
			{
				return redirect("/ManageDevice/$Goto")->with('failed', 'Unable to '.$ActiveStatus.' Device...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}

	function ManageDeviceWeight()
	{
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			return view('ManageDeviceWeight');
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function SaveDeviceWeight(Request $request)
	{
		//echo"<pre>"; print_r($request->all()); exit;
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$InstrumentID=$request['InstrumentID'];
			$DeviceId=$request['DeviceId'];
			$CalibrationFormType=$request['CalibrationFormType'];

			$GetDeviceWeight = new GetDeviceWeight();

			$DeviceWeightLine=[];
			foreach ($request['LineId'] as $key => $val)
			{
				if($request['StWeight'][$key]!="" && $request['CertWeight'][$key]!="" && $request['AccpWeight'][$key]!="")
				{
					$LineData['InstrumentId']=$InstrumentID;
					$LineData['DeviceId']=$DeviceId;
					$LineData['CalibrationTypeId']=$CalibrationFormType;
					$LineData['Type']=0;
					$LineData['LineId']=$request['LineId'][$key];
					$LineData['StWeight']=$request['StWeight'][$key];
					$LineData['CertWeight']=$request['CertWeight'][$key];
					$LineData['AccpWeight']=$request['AccpWeight'][$key];
					$LineData['CreatedBy']=Session::get('LoginData')['UserId'];

					$DeviceWeightLine[$key]=$LineData;
				}
			}
			$saveddata=$GetDeviceWeight->SaveDeviceWeight($DeviceWeightLine);

			if(isset($request['DStWeight']) && isset($request['DLineId']))
			{
				$GetDeviceWeight1 = new GetDeviceWeightObsMass();
				$DeviceWeightLine1=[];
				foreach ($request['DLineId'] as $key => $val)
				{
					if($request['DStWeight'][$key]!="")
					{
						$LineData1['DeviceId']=$DeviceId;
						$LineData1['InstrumentId']=$InstrumentID;
						$LineData1['CalibrationTypeId']=$CalibrationFormType;
						$LineData1['LineId']=$request['DLineId'][$key];
						$LineData1['StWeight']=$request['DStWeight'][$key];
						$LineData1['Type']=0;
						$LineData1['CreatedBy']=Session::get('LoginData')['UserId'];

						$DeviceWeightLine1[$key]=$LineData1;
					}
				}
				$saveddata2=$GetDeviceWeight1->SaveDeviceWeightObsMass($DeviceWeightLine1);
			}
			else
			{
				$saveddata2=1;
			}

			if(isset($request['DPWeight']) && isset($request['DLineId1']))
			{
				$GetDeviceWeight2 = new GetDevicePositionWeight();
				$DeviceWeightLine2=[];
				foreach ($request['DLineId1'] as $key => $val)
				{
					if($request['DPWeight'][$key]!="")
					{
						$LineData3['DeviceId']=$DeviceId;
						$LineData3['InstrumentId']=$InstrumentID;
						$LineData3['CalibrationTypeId']=$CalibrationFormType;
						$LineData3['LineId']=$request['DLineId1'][$key];
						$LineData3['PositionWeight']=$request['DPWeight'][$key];
						$LineData3['StWeight']=$request['DStWeight1'][$key];
						$LineData3['Type']=0;
						$LineData3['CreatedBy']=Session::get('LoginData')['UserId'];

						$DeviceWeightLine2[$key]=$LineData3;
					}
				}
				$saveddata3=$GetDeviceWeight2->SaveDevicePositionWeight($DeviceWeightLine2);
			}
			else
			{
				$saveddata3=1;
			}

			if($saveddata && $saveddata2 && $saveddata3)
			{
				return redirect("/AddDeviceWeight")->with('success', 'Device Weight has been added successfully.');
			}
			else
			{
				return redirect("/AddDeviceWeight")->with('failed', 'Unable to add Device Weight...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function DeviceWeightList()
	{
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			return view('DeviceWeightList');
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function EditDeviceWeight(Request $request)
	{
		$MainData=[];
		$MainData['DeviceWeight']=GetDeviceWeight::where('InstrumentId',$request['InstrumentId'])->where('DeviceId',$request['DeviceId'])->where('CalibrationTypeId',$request['CalibrationTypeId'])->orderBy('LineId', 'asc')->get();
		if($MainData['DeviceWeight'][0]->CalibrationTypeId==2)
		{
			$MainData['ObsMass']=GetDeviceWeightObsMass::where('InstrumentId',$request['InstrumentId'])->where('DeviceId',$request['DeviceId'])->where('CalibrationTypeId',$request['CalibrationTypeId'])->orderBy('LineId', 'asc')->get();
			$MainData['DevicePositionWeight']=GetDevicePositionWeight::where('InstrumentId',$request['InstrumentId'])->where('DeviceId',$request['DeviceId'])->where('CalibrationTypeId',$request['CalibrationTypeId'])->orderBy('LineId', 'asc')->get();
		}
		return view('EditDeviceWeight',['MainData'=>$MainData]);
	}

	function UpdDeviceWeight(Request $request)
	{
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$InstrumentID=$request['InstrumentID'];
			$DeviceId=$request['DeviceId'];
			$CalibrationFormType=$request['CalibrationFormType'];

			$GetDeviceWeight = new GetDeviceWeight();
			$GetDeviceWeight1 = new GetDeviceWeightObsMass();
			$GetDeviceWeight2 = new GetDevicePositionWeight();

			$DeviceWeightLine=[];
			foreach ($request['LineId'] as $key => $val)
			{
				if($request['StWeight'][$key]!="" && $request['CertWeight'][$key]!="" && $request['AccpWeight'][$key]!="")
				{
					$LineData['InstrumentId']=$InstrumentID;
					$LineData['DeviceId']=$DeviceId;
					$LineData['CalibrationTypeId']=$CalibrationFormType;
					$LineData['Type']=0;
					$LineData['LineId']=$request['LineId'][$key];
					$LineData['StWeight']=$request['StWeight'][$key];
					$LineData['CertWeight']=$request['CertWeight'][$key];
					$LineData['AccpWeight']=$request['AccpWeight'][$key];
					$LineData['CreatedBy']=Session::get('LoginData')['UserId'];

					$DeviceWeightLine[$key]=$LineData;
				}
			}
			$DeleteDeviceData=[];
			$DeleteDeviceData['InstrumentId']=$InstrumentID;
			$DeleteDeviceData['DeviceId']=$DeviceId;
			$DeleteDeviceData['CalibrationTypeId']=$CalibrationFormType;
			$GetDeviceWeight->DeleteDeviceWeight($DeleteDeviceData);
			$GetDeviceWeight1->DeleteDeviceWeightObsMass($DeleteDeviceData);
			$GetDeviceWeight2->DeleteDevicePositionWeight($DeleteDeviceData);

			$saveddata=$GetDeviceWeight->SaveDeviceWeight($DeviceWeightLine);

			if(isset($request['DStWeight']) && isset($request['DLineId']))
			{
				$GetDeviceWeight1 = new GetDeviceWeightObsMass();
				$DeviceWeightLine1=[];
				foreach ($request['DLineId'] as $key => $val)
				{
					if($request['DStWeight'][$key]!="")
					{
						$LineData1['DeviceId']=$DeviceId;
						$LineData1['InstrumentId']=$InstrumentID;
						$LineData1['CalibrationTypeId']=$CalibrationFormType;
						$LineData1['LineId']=$request['DLineId'][$key];
						$LineData1['StWeight']=$request['DStWeight'][$key];
						$LineData1['Type']=0;
						$LineData1['CreatedBy']=Session::get('LoginData')['UserId'];

						$DeviceWeightLine1[$key]=$LineData1;
					}
				}
				$saveddata2=$GetDeviceWeight1->SaveDeviceWeightObsMass($DeviceWeightLine1);
			}
			else
			{
				$saveddata2=1;
			}

			if(isset($request['DPWeight']) && isset($request['DLineId1']))
			{
				$GetDeviceWeight2 = new GetDevicePositionWeight();
				$DeviceWeightLine2=[];
				foreach ($request['DLineId1'] as $key => $val)
				{
					if($request['DPWeight'][$key]!="")
					{
						$LineData3['DeviceId']=$DeviceId;
						$LineData3['InstrumentId']=$InstrumentID;
						$LineData3['CalibrationTypeId']=$CalibrationFormType;
						$LineData3['LineId']=$request['DLineId1'][$key];
						$LineData3['PositionWeight']=$request['DPWeight'][$key];
						$LineData3['StWeight']=$request['DStWeight1'][$key];
						$LineData3['Type']=0;
						$LineData3['CreatedBy']=Session::get('LoginData')['UserId'];

						$DeviceWeightLine2[$key]=$LineData3;
					}
				}
				$saveddata3=$GetDeviceWeight2->SaveDevicePositionWeight($DeviceWeightLine2);
			}
			else
			{
				$saveddata3=1;
			}

			if($saveddata && $saveddata2 && $saveddata3)
			{
				return redirect("/DeviceWeightList")->with('success', 'Device Weight has been update successfully.');
			}
			else
			{
				return redirect("/DeviceWeightList")->with('failed', 'Unable to update Device Weight...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function DeleteDeviceWeight(Request $request)
	{
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$InstrumentID=$request['InstrumentId'];
			$DeviceId=$request['DeviceId'];
			$CalibrationFormType=$request['CalibrationTypeId'];

			$GetDeviceWeight = new GetDeviceWeight();
			$GetDeviceWeight1 = new GetDeviceWeightObsMass();
			$GetDeviceWeight2 = new GetDevicePositionWeight();

			$DeleteDeviceData=[];
			$DeleteDeviceData['InstrumentId']=$InstrumentID;
			$DeleteDeviceData['DeviceId']=$DeviceId;
			$DeleteDeviceData['CalibrationTypeId']=$CalibrationFormType;


			if($GetDeviceWeight->DeleteDeviceWeight($DeleteDeviceData) && $GetDeviceWeight1->DeleteDeviceWeightObsMass($DeleteDeviceData) && $GetDeviceWeight2->DeleteDevicePositionWeight($DeleteDeviceData))
			{
				return redirect("/DeviceWeightList")->with('success', 'Device Weight has been delete successfully.');
			}
			else
			{
				return redirect("/DeviceWeightList")->with('failed', 'Unable to delete Device Weight...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function PasswordConverter()
	{
		return view('PasswordConverter');
	}
	function ConvertSecureKey(Request $request)
	{
		$base1=base64_encode($request['Password']);
		$base2=base64_encode($base1);
		$base3=base64_encode($base2);
		return redirect("/PasswordConverter")->with('success', $base3);
	}
	function SecureKeyToPassword($key)
	{
		$base1=base64_decode($key);
		$base2=base64_decode($base1);
		$base3=base64_decode($base2);
		return $base3;
	}

	function ClearCache()
	{
		if(Session::get('LoginData')['Role']==1)
		{
			$DeviceMaster=GetDeviceMaster::get();
			//$DeviceMaster=GetDeviceMaster::where('RecId',4)->get();
			foreach ($DeviceMaster as $device)
			{
				$DeviceDirPath=$device->DirPath;
				if(!is_dir($DeviceDirPath."/Backup"))
				{
					mkdir($DeviceDirPath."/Backup");
				}


				$files = array_merge(glob("$DeviceDirPath/*.*"));
				$files = array_combine($files, array_map("filemtime", $files));
				//echo"<pre>"; print_r($files);
				foreach ($files as $key => $value) {
					if(strtotime("-1 week")>$value)
					{
						$NewFileName=$DeviceDirPath."/Backup/".basename($key);
						rename($key,$NewFileName);
					}
				}

			}
			return redirect("/home")->with('success', 'cache has been successfully clear.');
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function SetLdapConfiguration()
	{
		if(Session::get('LoginData')['Role']==1)
		{
			return view('SetLdapConfiguration');
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function SaveLdapConfiguration(Request $request)
	{
		//echo"<pre>"; print_r($request->all()); exit;
		if(Session::get('LoginData')['Role']==1)
		{
			$chkLDAP_HOSTNAME=0;
			$path = base_path('.env');
			if(isset($request['chkLDAP_HOSTNAME']))
			{
				$chkLDAP_HOSTNAME=$request['chkLDAP_HOSTNAME'];
				$LDAP_HOSTNAME=$request['LDAP_HOSTNAME'];
				file_put_contents($path, str_replace('LDAP_HOSTNAME='.env("LDAP_HOSTNAME"), 'LDAP_HOSTNAME='.$LDAP_HOSTNAME, file_get_contents($path) ));
			}
			if(isset($request['chkLDAP_ADMIN']))
			{
				$chkLDAP_ADMIN=$request['chkLDAP_ADMIN'];
				$LDAP_ADMIN=$request['LDAP_ADMIN'];
				$base1=base64_encode($LDAP_ADMIN);
				$base2=base64_encode($base1);
				$base3=base64_encode($base2);
				file_put_contents($path, str_replace('LDAP_ADMIN='.env("LDAP_ADMIN"), 'LDAP_ADMIN='.$base3, file_get_contents($path) ));
			}
			if(isset($request['chkLDAP_PASSWORD']))
			{
				$chkLDAP_PASSWORD=$request['chkLDAP_PASSWORD'];
				$LDAP_PASSWORD=$request['LDAP_PASSWORD'];
				$base1=base64_encode($LDAP_PASSWORD);
				$base2=base64_encode($base1);
				$base3=base64_encode($base2);
				file_put_contents($path, str_replace('LDAP_PASSWORD='.env("LDAP_PASSWORD"), 'LDAP_PASSWORD='.$base3, file_get_contents($path) ));
			}
			if(isset($request['chkLDAP_DC1']))
			{
				$chkLDAP_DC1=$request['chkLDAP_DC1'];
				$LDAP_DC1=$request['LDAP_DC1'];
				file_put_contents($path, str_replace('LDAP_DC1='.env("LDAP_DC1"), 'LDAP_DC1='.$LDAP_DC1, file_get_contents($path) ));
			}
			if(isset($request['chkLDAP_DC2']))
			{
				$chkLDAP_DC2=$request['chkLDAP_DC2'];
				$LDAP_DC2=$request['LDAP_DC2'];
				file_put_contents($path, str_replace('LDAP_DC2='.env("LDAP_DC2"), 'LDAP_DC2='.$LDAP_DC2, file_get_contents($path) ));
			}
			return redirect("/home")->with('success', 'Ldap Settings has been successfully save.');
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function CheckAvailableCalibrationLine($data)
	{
		if(Session::get('LoginData'))
		{
			$Jdata=json_decode($data,true);

			$CalData=GetDeviceWeight::select("RecId ")->where('DeviceId',$Jdata['DeviceId'])->where('InstrumentId',$Jdata['InstrumentID'])->where('CalibrationTypeId',$Jdata['CalibrationFormType']);
			if($CalData->count()>0)
			{
				return "Device Weight Already added go to list then edit...";
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

	// start rhl 02-12-2020 //

	function WeightBoxList()
	{
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			return view('WeightBoxList');
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function ManageWeightBox()
	{
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			return view('ManageWeightBox');
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function SaveWeightBox(Request $request)
	{
		//echo"<pre>"; print_r($request->all()); exit;
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$WeightBoxId=$request['WeightBoxId'];
			$WeightBox_calibration_on=$request['WeightBox_calibration_on'];
			$WeightBox_next_calibration=$request['WeightBox_next_calibration'];

			$GetWeightBox = new GetWeightBox();

			$data['WeightBoxId'] = $WeightBoxId;
			$data['WeightBox_calibration_on'] = $WeightBox_calibration_on;
			$data['WeightBox_next_calibration'] = $WeightBox_next_calibration;
			$data['CreatedBy']=Session::get('LoginData')['UserId'];
			$data['CreatedDate']=now();

			$saveddata=$GetWeightBox->SaveWeightBox($data);

			if($saveddata)
			{
				return redirect("/AddWeightBox")->with('success', 'Weight Box has been added successfully.');
			}
			else
			{
				return redirect("/AddWeightBox")->with('failed', 'Unable to add Weight Box...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function EditWeightBox(Request $request)
	{
		$MainData=[];
		$MainData['WeightBox']=GetWeightBox::where('RecId',$request['RecId'])->where('IsActive',1)->get();
		return view('EditWeightBox',['MainData'=>$MainData]);
	}

	function UpdateWeightBox(Request $request)
	{
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$RecId=$request['RecId'];
			$WeightBoxId=$request['WeightBoxId'];
			$WeightBox_calibration_on=$request['WeightBox_calibration_on'];
			$WeightBox_next_calibration=$request['WeightBox_next_calibration'];

			$GetWeightBox = new GetWeightBox();

			$data['RecId'] = $RecId;
			$data['WeightBoxId'] = $WeightBoxId;
			$data['WeightBox_calibration_on'] = $WeightBox_calibration_on;
			$data['WeightBox_next_calibration'] = $WeightBox_next_calibration;
			$data['CreatedBy']=Session::get('LoginData')['UserId'];
			$data['CreatedDate']=now();

			$saveddata=$GetWeightBox->UpdateWeightBox($data);

			if($saveddata)
			{
				return redirect("/WeightBoxList")->with('success', 'Weight Box has been update successfully.');
			}
			else
			{
				return redirect("/WeightBoxList")->with('failed', 'Unable to update Weight Box...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function DeleteWeightBox(Request $request)
	{
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$RecId=$request['RecId'];
			$GetWeightBox = new GetWeightBox();

			$data['RecId'] = $RecId;
			if($GetWeightBox->DeleteWeightBox($data))
			{
				return redirect("/WeightBoxList")->with('success', 'Weight Box has been delete successfully.');
			}
			else
			{
				return redirect("/WeightBoxList")->with('failed', 'Unable to delete Weight Box...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function AjaxGetWeightBoxValue($jsondata)
	{
		if(Session::get('LoginData'))
		{
			$Jdata=json_decode($jsondata,true);
			$data=GetWeightBox::where('RecId',$Jdata["RecId"])->get();
			$MainData['WeightBox_calibration_on'] = date('d-m-Y H:i',strtotime($data[0]->WeightBox_calibration_on));
			$MainData['WeightBox_next_calibration'] = date('d-m-Y H:i',strtotime($data[0]->WeightBox_next_calibration));
			//{{ date('d/m/Y h:i A',strtotime($caldata->CalibrationNextDate1)) }}
			//print_r($MainData);
			return response()->json($MainData);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function ManageCalibrationSettings()
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			return view('ManageCalibrationSettings');
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function SaveFormSettings(Request $request)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{

			$data['calibration_type']=$request['calibration_type'];
			$data['form_id1']=$request['form_id1'];
			$data['form_id2']=$request['form_id2'];
			$data['form_id3']=$request['form_id3'];
			$data['form_id4']=$request['form_id4'];
			$data['sop1']=$request['sop1'];
			$data['format_no1']=$request['format_no1'];
			$data['sop2']=$request['sop2'];
			$data['format_no2']=$request['format_no2'];
			$data['sop3']=$request['sop3'];
			$data['format_no3']=$request['format_no3'];
			$data['sop4']=$request['sop4'];
			$data['format_no4']=$request['format_no4'];
			$data['sop5']=$request['sop5'];
			$data['format_no5']=$request['format_no5'];
			$data['sop6']=$request['sop6'];
			$data['format_no6']=$request['format_no6'];

			$saveddata = '';
			$record = DB::table('form_settings')->where('calibration_type',$request['calibration_type'])->get();
			//echo '<pre>';print_r($record);exit;
			//echo $record[0]->id;exit;
			if(isset($record[0]->id)){
			 	$saveddata = DB::table('form_settings')->where('id', $record[0]->id)->update($data);  
			 	//print_r($saveddata);exit;
			}else{
			 	$saveddata=DB::table('form_settings')->insert($data);
			}

			if($saveddata)
			{
				return redirect("/ManageCalibrationSettings")->with('success', 'Form Settings has been updated successfully.');
			}
			else
			{
				return redirect("/ManageCalibrationSettings")->with('failed', 'Unable to update form settings...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function AjaxGetFormSettings($jsondata)
	{
		if(Session::get('LoginData'))
		{
			$Jdata=json_decode($jsondata,true);

			$data = DB::select('SELECT * FROM form_settings WHERE calibration_type = "'.$Jdata["RecId"].'"');
			$MainData = array();
			if($data){
				$MainData = $data[0];
			}
			return response()->json($MainData);
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please logoin again...');
		}
	}
	function ManageDecimalSettings()
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{
			$MainData = DB::table('decimal_settings')->get();
			return view('ManageDecimalSettings',['MainData'=>$MainData[0]]);
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	function SaveDecimalSettings(Request $request)
	{
		//if(Session::get('LoginData')['Role']==1)
		if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
		{

			$data['standard_weight']=$request['standard_weight'];
			$data['certified_weight']=$request['certified_weight'];
			$data['displayed_weight']=$request['displayed_weight'];
			$data['difference_between_A_B']=$request['difference_between_A_B'];
			$data['acceptance_weight']=$request['acceptance_weight'];
			$data['observed_mass'] = $request['observed_mass'];
			$data['actual_mass'] = $request['actual_mass'];

			$saveddata = '';
			$record = DB::table('decimal_settings')->get();
		
			if(isset($record[0]->id)){
			 	$saveddata = DB::table('decimal_settings')->where('id', $record[0]->id)->update($data);
			}else{
			 	$saveddata=DB::table('decimal_settings')->insert($data);
			}

			if($saveddata)
			{
				return redirect("/ManageDecimalSettings")->with('success', 'Decimal Settings has been updated successfully.');
			}
			else
			{
				return redirect("/ManageDecimalSettings")->with('failed', 'Unable to update Decimal settings...');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Unable to access this page...');
		}
	}
	// end rhl 02-12-2020 //
}

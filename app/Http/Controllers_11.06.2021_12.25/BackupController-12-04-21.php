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
use URL;
use File;
use ZipArchive;
class BackupController extends BaseController
{
	function Index()
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
			{
				return view('Backup');
			}
			else
			{
				return redirect("/")->with('failed', 'Unable to access this Request');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please login again...');
		}
	}

	function BackupData(request $request)
	{
		if(Session::get('LoginData'))
		{
			if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
			{

				$FROMDATE = $MainData['FromCreatedDate'] = $request['FromCreatedDate'];
				$TODATE = $MainData['ToCreatedDate'] = $request['ToCreatedDate'];
				$TODATE = date('Y-m-d',strtotime($TODATE . "+1 days"));
				if(isset($request['BtnSearch'])){

					

					$MainData["Calibration"]=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("mcal.CType","calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.AproovelBy","dm.DeviceType","calibration.CalibrationNextDate1")->whereBetween('PerformDate', [$FROMDATE, $TODATE])->orderBy("PerformDate","desc")->get();
				//->where('mcal.CType',2)
				//->where('calibration.CalibrationNextDate1', '>', date('Y-m-d H:i:s'))
				//->whereIn('Status',[10,20,30])

					return view('Backup',['MainData'=>$MainData]);

				}elseif (isset($request['BtnBackup'])) {
					


					$dbhost = '127.0.0.1';
					$dbuser = 'root';
					$dbpass = '';
					$date_string   = date("d-m-Y_his");

					$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

					if(! $conn ) {
						die('Could not connect: ' . mysql_error());
					}

					$table_name = "calibration";

					if(!is_dir("C:/xampp/htdocs/calibration1/BackupDB/".date("d-m-Y")))
					{
						mkdir("C:/xampp/htdocs/calibration1/BackupDB/".date("d-m-Y"));
					}

					$backup_file  = 'C:/xampp/htdocs/calibration1/BackupDB/'.date("d-m-Y").'/bk_calibration'.$date_string.'.sql';

					$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

					mysqli_select_db($conn,'calibration');
					$retval = mysqli_query($conn, $sql);

					DB::insert('insert into backup_history (file_name, folder_name, full_path, dir_path) values (?, ?, ?,?)', array('bk_calibration'.$date_string.'.sql', date("d-m-Y"), $backup_file,'C:/xampp/htdocs/calibration1/BackupDB/'));

					$table_name = "calibrationcomment";

					if(!is_dir("C:/xampp/htdocs/calibration1/BackupDB/".date("d-m-Y")))
					{
						mkdir("C:/xampp/htdocs/calibration1/BackupDB/".date("d-m-Y"));
					}

					$backup_file  = 'C:/xampp/htdocs/calibration1/BackupDB/'.date("d-m-Y").'/bk_calibrationcomment'.$date_string.'.sql';
					
					$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

					mysqli_select_db($conn,'calibration');
					$retval = mysqli_query($conn, $sql);

					DB::insert('insert into backup_history (file_name, folder_name, full_path, dir_path) values (?, ?, ?,?)', array('bk_calibrationcomment'.$date_string.'.sql', date("d-m-Y"), $backup_file,'C:/xampp/htdocs/calibration1/BackupDB/'));

					$table_name = "calibrationline";

					if(!is_dir("C:/xampp/htdocs/calibration1/BackupDB/".date("d-m-Y")))
					{
						mkdir("C:/xampp/htdocs/calibration1/BackupDB/".date("d-m-Y"));
					}

					$backup_file  = 'C:/xampp/htdocs/calibration1/BackupDB/'.date("d-m-Y").'/bk_calibrationline'.$date_string.'.sql';
					
					$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

					mysqli_select_db($conn,'calibration');
					$retval = mysqli_query($conn, $sql);

					DB::insert('insert into backup_history (file_name, folder_name, full_path, dir_path) values (?, ?, ?,?)', array('bk_calibrationline'.$date_string.'.sql', date("d-m-Y"), $backup_file,'C:/xampp/htdocs/calibration1/BackupDB/'));

					$table_name = "calibrationlineobsmass";

					if(!is_dir("C:/xampp/htdocs/calibration1/BackupDB/".date("d-m-Y")))
					{
						mkdir("C:/xampp/htdocs/calibration1/BackupDB/".date("d-m-Y"));
					}

					$backup_file  = 'C:/xampp/htdocs/calibration1/BackupDB/'.date("d-m-Y").'/bk_calibrationlineobsmass'.$date_string.'.sql';
					
					$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

					mysqli_select_db($conn,'calibration');
					$retval = mysqli_query($conn, $sql);

					DB::insert('insert into backup_history (file_name, folder_name, full_path, dir_path) values (?, ?, ?,?)', array('bk_calibrationlineobsmass'.$date_string.'.sql', date("d-m-Y"), $backup_file,'C:/xampp/htdocs/calibration1/BackupDB/'));

					$table_name = "calibrationposition";

					if(!is_dir("C:/xampp/htdocs/calibration1/BackupDB/".date("d-m-Y")))
					{
						mkdir("C:/xampp/htdocs/calibration1/BackupDB/".date("d-m-Y"));
					}

					$backup_file  = 'C:/xampp/htdocs/calibration1/BackupDB/'.date("d-m-Y").'/bk_calibrationposition'.$date_string.'.sql';
					
					$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

					mysqli_select_db($conn,'calibration');
					$retval = mysqli_query($conn, $sql);

					DB::insert('insert into backup_history (file_name, folder_name, full_path, dir_path) values (?, ?, ?,?)', array('bk_calibrationposition'.$date_string.'.sql', date("d-m-Y"), $backup_file,'C:/xampp/htdocs/calibration1/BackupDB/'));

					$table_name = "monthlycalibrationdetails";

					if(!is_dir("C:/xampp/htdocs/calibration1/BackupDB/".date("d-m-Y")))
					{
						mkdir("C:/xampp/htdocs/calibration1/BackupDB/".date("d-m-Y"));
					}

					$backup_file  = 'C:/xampp/htdocs/calibration1/BackupDB/'.date("d-m-Y").'/bk_monthlycalibrationdetails'.$date_string.'.sql';
					
					$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

					mysqli_select_db($conn,'calibration');
					$retval = mysqli_query($conn, $sql);

					DB::insert('insert into backup_history (file_name, folder_name, full_path, dir_path) values (?, ?, ?,?)', array('bk_monthlycalibrationdetails'.$date_string.'.sql', date("d-m-Y"), $backup_file,'C:/xampp/htdocs/calibration1/BackupDB/'));

					if(! $retval ) {
						die('Could not take data backup: ' . mysqli_error($conn));
					}

   // echo "Backedup  data successfully\n";


					mysqli_close($conn);



					$Data=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("mcal.CType","calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.AproovelBy","dm.DeviceType","calibration.CalibrationNextDate1")->whereBetween('PerformDate', [$FROMDATE, $TODATE])->orderBy("PerformDate","desc")->get();


					foreach($Data as $caldata){

						
						DB::table('calibration')->where('RecId', $caldata->RecId)->delete();
						DB::table('calibrationcomment')->where('RefRecId', $caldata->RecId)->delete();
						DB::table('calibrationline')->where('RefRecId', $caldata->RecId)->delete();
						DB::table('calibrationlineobsmass')->where('RefRecId', $caldata->RecId)->delete();
						DB::table('calibrationposition')->where('RefRecId', $caldata->RecId)->delete();
						DB::table('monthlycalibrationdetails')->where('RefRecId', $caldata->RecId)->delete();

					}

					return redirect("/BackupRestore")->with('success', 'Backedup  data successfully.');
				}elseif ((isset($request['BtnRestore']))) {

					$backup_history = DB::table('backup_history')->get();

					return view('Restore', ['backup_history' => $backup_history]);
					//return view('Restore',[ "UserMaster" => $UserMaster ]);
				}
				elseif ((isset($request['BtnTicketZip']))) {

					$TicketData = DB::table('calibration')
            ->join('calibrationline', 'calibration.RecId', '=', 'calibrationline.RefRecId')
            ->select('calibration.*', 'calibrationline.*')
            ->whereBetween('PerformDate', [$FROMDATE, $TODATE])
            ->get();


// and then you can get query log


					$zip = new ZipArchive;

					$fileName =	'Ticket_Backup'.date("d-m-Y_his").'.zip';

					if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
					{
						$files = File::files(public_path('Doc'));

						// foreach ($files as $key => $value) {
							// echo $value;die;
							foreach ($TicketData as $t1) {

								foreach ($files as $key => $value) {
									if($t1->Ifile==basename($value)){
				$relativeNameInZipFile = basename($value);
				$zip->addFile($value, $relativeNameInZipFile);
			}
			}
								
							}
							
						$zip->close();
					}

		//return response()->download(public_path($fileName));

					return redirect("/BackupRestore")->with('success', 'Ticket zip successfully.');
				}
			}
			else
			{
				return redirect("/")->with('failed', 'Unable to access this Request');
			}
		}
		else
		{
			return redirect("/")->with('failed', 'Your Login Session Expired please login again...');
		}
	}

	function BackupDatabase($FROMDATE,$TODATE)
	{
		
		$dbhost = '127.0.0.1';
		$dbuser = 'root';
		$dbpass = '';
		$date_string   = date("d-m-Y_his");

		$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

		if(! $conn ) {
			die('Could not connect: ' . mysql_error());
		}

		$table_name = "calibration";

		if(!is_dir("C:/xampp/htdocs/calibration1/BackupDB/".date("d-m-Y")))
		{
			mkdir("C:/xampp/htdocs/calibration1/BackupDB/".date("d-m-Y"));
		}

		$backup_file  = 'C:/xampp/htdocs/calibration1/BackupDB/'.date("d-m-Y").'/bk_calibration'.$date_string.'.sql';
		
		$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

		mysqli_select_db($conn,'calibration');
		$retval = mysqli_query($conn, $sql);

		if(! $retval ) {
			die('Could not take data backup: ' . mysqli_error($conn));
		}

   // echo "Backedup  data successfully\n";


		mysqli_close($conn);



		// $FROMDATE = $MainData['FromCreatedDate'] = $request['FromCreatedDate'];
		// $TODATE = $MainData['ToCreatedDate'] = $request['ToCreatedDate'];
		// $TODATE = date('Y-m-d',strtotime($TODATE . "+1 days"));

		$Data=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("mcal.CType","calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.AproovelBy","dm.DeviceType","calibration.CalibrationNextDate1")->whereBetween('PerformDate', [$FROMDATE, $TODATE])->orderBy("PerformDate","desc")->get();


		foreach($Data as $caldata){

			DB::table('calibration')->where('RecId', $caldata->RecId)->delete();
			DB::table('calibrationcomment')->where('RefRecId', $caldata->RecId)->delete();
			DB::table('calibrationline')->where('RefRecId', $caldata->RecId)->delete();
			DB::table('calibrationlineobsmass')->where('RefRecId', $caldata->RecId)->delete();
			DB::table('calibrationposition')->where('RefRecId', $caldata->RecId)->delete();
			DB::table('monthlycalibrationdetails')->where('RefRecId', $caldata->RecId)->delete();

		}
		
		return redirect('/BackupRestore');
		
	}

	function RestoreDatabase($file_name)
	{
		//echo $file_name;die;
		$dbhost = '127.0.0.1';
		$dbuser = 'root';
		$dbpass = '';

		$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

		if(! $conn ) {
			die('Could not connect: ' . mysqli_error());
		}

		$table_name = "calibration";
		// $backup_file  = "/tmp/employee.sql";
		$backup_file  = 'C:/xampp/htdocs/calibration1/BackupDB/'.date("d-m-Y").'/'.$file_name;
		// echo $backup_file;die;
		$sql = "LOAD DATA INFILE '$backup_file' INTO TABLE $table_name";

		mysqli_select_db($conn,'calibration');
		$retval = mysqli_query( $conn, $sql );

		if(! $retval ) {
			die('Could not load data : ' . mysqli_error($conn));
		}
		echo "Loaded  data successfully\n";

		mysqli_close($conn);

		return view('Backup');
	}

	function TicketZip()
	{
		$zip = new ZipArchive;

		$fileName =	'Ticket_Backup'.date("d-m-Y_his").'.zip';

		if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
		{
			$files = File::files(public_path('Doc'));

			foreach ($files as $key => $value) {
				$relativeNameInZipFile = basename($value);
				$zip->addFile($value, $relativeNameInZipFile);
			}

			$zip->close();
		}

		//return response()->download(public_path($fileName));
		
		return view('Backup');
		
	}
}

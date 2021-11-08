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

					$txtRecId = rtrim($request['txtRecId'], ',');



					$mysqlHostName      = '127.0.0.1';
					$mysqlUserName      = 'root';
					$mysqlPassword      = '';
					$DbName             = 'calibration';
					$backup_name        = "mybackup.sql";
        $tables             = array("calibration","calibrationcomment","calibrationline","calibrationlineobsmass","calibrationposition","monthlycalibrationdetails"); //here your tables...

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword",array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();


        $output = '';
        foreach($tables as $table)
        {
        	$show_table_query = "SHOW CREATE TABLE " . $table . "";
        	$statement = $connect->prepare($show_table_query);
        	$statement->execute();
        	$show_table_result = $statement->fetchAll();

        	foreach($show_table_result as $show_table_row)
        	{
        		$output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
        	}
        	if($table=='calibration'){
        		$select_query = "SELECT * FROM $table where RecId IN ($txtRecId)";
        	}else{
        		$select_query = "SELECT * FROM $table where RefRecId IN ($txtRecId)";
        	}
         //echo $select_query;die;
        	$statement = $connect->prepare($select_query);
        	$statement->execute();
        	$total_row = $statement->rowCount();

        	for($count=0; $count<$total_row; $count++)
        	{
        		$single_result = $statement->fetch(\PDO::FETCH_ASSOC);
        		$table_column_array = array_keys($single_result);
        		$table_value_array = array_values($single_result);
        		$output .= "\nINSERT INTO $table (";
        		$output .= "" . implode(", ", $table_column_array) . ") VALUES (";
        		$output .= "'" . implode("','", $table_value_array) . "');\n";
        	}
        }
        $file_name = 'database_backup_on_' . date('d-m-Y_his') . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        //unlink($file_name);

        DB::insert('insert into backup_history (file_name, folder_name, full_path, dir_path,backup_type,table_name) values (?, ?, ?,?,?,?)', array($file_name, '', '','','Backup',''));
        

        $TicketData = DB::table('calibration')
        ->join('calibrationline', 'calibration.RecId', '=', 'calibrationline.RefRecId')
        ->join('devicemaster', 'calibration.DeviceId', '=', 'devicemaster.RecId')
        ->select('calibration.*', 'calibrationline.*', 'devicemaster.DirPath')
					//->whereBetween('PerformDate', [$FROMDATE, $TODATE])
        ->whereIn('calibration.RecId',[$txtRecId])
        ->get();





// print_r(DB::getQueryLog());die;



        $zip = new ZipArchive;

        $fileName =	'Ticket_Backup'.date("d-m-Y_his").'.zip';

        if ($zip->open(base_path().'/TicketBackup/'.($fileName), ZipArchive::CREATE) === TRUE)
        {
						// echo 

        	foreach ($TicketData as $t1) {

        		$files = File::files($t1->DirPath);
// print_r($files);die;
        		foreach ($files as $key => $value) {
        			if($t1->Ifile==basename($value)){
        				$relativeNameInZipFile = basename($value);
        				$zip->addFile($value, $relativeNameInZipFile);
        			}
        		}

        	}

        	$zip->close();
        }

        return redirect("/BackupRestore")->with('success', 'Backedup  data successfully.');
    }elseif ((isset($request['BtnRestore']))) {

    	$backup_history = DB::table('backup_history')->orderBy('RecId', 'desc')->get();

    	return view('Restore', ['backup_history' => $backup_history]);
					//return view('Restore',[ "UserMaster" => $UserMaster ]);
    }
    elseif ((isset($request['BtnBackupArchive']))) {

    	$txtRecId = rtrim($request['txtRecId'], ',');

    	$mysqlHostName      = '127.0.0.1';
					$mysqlUserName      = 'root';
					$mysqlPassword      = '';
					$DbName             = 'calibration';
					$backup_name        = "mybackup.sql";
        $tables             = array("calibration","calibrationcomment","calibrationline","calibrationlineobsmass","calibrationposition","monthlycalibrationdetails"); //here your tables...

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword",array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();


        $output = '';
        foreach($tables as $table)
        {
        	$show_table_query = "SHOW CREATE TABLE " . $table . "";
        	$statement = $connect->prepare($show_table_query);
        	$statement->execute();
        	$show_table_result = $statement->fetchAll();

        	foreach($show_table_result as $show_table_row)
        	{
        		$output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
        	}
        	if($table=='calibration'){
        		$select_query = "SELECT * FROM $table where RecId IN ($txtRecId)";
        	}else{
        		$select_query = "SELECT * FROM $table where RefRecId IN ($txtRecId)";
        	}
         //echo $select_query;die;
        	$statement = $connect->prepare($select_query);
        	$statement->execute();
        	$total_row = $statement->rowCount();

        	for($count=0; $count<$total_row; $count++)
        	{
        		$single_result = $statement->fetch(\PDO::FETCH_ASSOC);
        		$table_column_array = array_keys($single_result);
        		$table_value_array = array_values($single_result);
        		$output .= "\nINSERT INTO $table (";
        		$output .= "" . implode(", ", $table_column_array) . ") VALUES (";
        		$output .= "'" . implode("','", $table_value_array) . "');\n";
        	}
        }
        $file_name = 'database_backup_on_' . date('d-m-Y_his') . '.sql';
        // echo realpath($file_name);die;
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        //unlink($file_name);
        //echo realpath($file_name);die;
        DB::insert('insert into backup_history (file_name, folder_name, full_path, dir_path,backup_type,table_name) values (?, ?, ?,?,?,?)', array($file_name, '', '','','Backup & Archive',''));

    	$TicketData = DB::table('calibration')
    	->join('calibrationline', 'calibration.RecId', '=', 'calibrationline.RefRecId')
    	->join('devicemaster', 'calibration.DeviceId', '=', 'devicemaster.RecId')
    	->select('calibration.*', 'calibrationline.*', 'devicemaster.DirPath')
					//->whereBetween('PerformDate', [$FROMDATE, $TODATE])
    	->whereIn('calibration.RecId',[$txtRecId])
    	->get();



    	$zip = new ZipArchive;

    	$fileName =	'Ticket_Backup'.date("d-m-Y_his").'.zip';

    	if ($zip->open(base_path().'/TicketBackup/'.($fileName), ZipArchive::CREATE) === TRUE)
    	{


    		foreach ($TicketData as $t1) {

    			$files = File::files($t1->DirPath);

    			foreach ($files as $key => $value) {
    				if($t1->Ifile==basename($value)){
    					$relativeNameInZipFile = basename($value);
    					$zip->addFile($value, $relativeNameInZipFile);
    				}
    			}

    		}

    		$zip->close();
    	}


    	$Data=GetCalibration::join('calibrationform as mcal', 'calibration.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'calibration.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'calibration.DeviceId', '=', 'dm.RecId')->select("mcal.CType","calibration.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","calibration.Make","calibration.Model","calibration.PerformedBy","calibration.PerformDate","calibration.Status","calibration.RecId","calibration.VerifiedBy","calibration.AproovelBy","dm.DeviceType","calibration.CalibrationNextDate1")->whereBetween('PerformDate', [$FROMDATE, $TODATE])->orderBy("PerformDate","desc")->get();

    	$array_rec_id = explode(',',$request['txtRecId']);


    	foreach($array_rec_id as $caldata){

    		DB::table('calibration')->where('RecId', $caldata)->delete();
    		DB::table('calibrationcomment')->where('RefRecId', $caldata)->delete();
    		DB::table('calibrationline')->where('RefRecId', $caldata)->delete();
    		DB::table('calibrationlineobsmass')->where('RefRecId', $caldata)->delete();
    		DB::table('calibrationposition')->where('RefRecId', $caldata)->delete();
    		DB::table('monthlycalibrationdetails')->where('RefRecId', $caldata)->delete();

    	}





    	return redirect("/BackupRestore")->with('success', 'Backedup  data and archive successfully.');
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

	if(!is_dir("C:/xampp/htdocs/Calibration/BackupDB/".date("d-m-Y")))
	{
		mkdir("C:/xampp/htdocs/Calibration/BackupDB/".date("d-m-Y"));
	}

	$backup_file  = 'C:/xampp/htdocs/Calibration/BackupDB/'.date("d-m-Y").'/bk_calibration'.$date_string.'.sql';

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

//echo realpath($file_name);die;
$host = "localhost";
$uname = "root";
$pass = "";
$database = "calibration"; //Change Your Database Name
$conn = new \mysqli($host, $uname, $pass, $database);
$filename = $file_name; //How to Create SQL File Step : url:http://localhost/phpmyadmin->detabase select->table select->Export(In Upper Toolbar)->Go:DOWNLOAD .SQL FILE
$op_data = '';
$lines = file($filename);
foreach ($lines as $line)
{
    if (substr($line, 0, 2) == '--' || $line == '')//This IF Remove Comment Inside SQL FILE
    {
        continue;
    }
    $op_data .= $line;
    if (substr(trim($line), -1, 1) == ';')//Breack Line Upto ';' NEW QUERY
    {
        $conn->query($op_data);
        $op_data = '';
    }
}
//echo "Table Created Inside " . $database . " Database.......";die;



// DB::unprepared(File::get('database_backup_on_01-04-2021_042901.sql'));die;

// 	$sql = file_get_contents('database_backup_on_01-04-2021_042901.sql');
// echo $sql;die;
// $mysqli = new mysqli("localhost", "root", "", "calibration");

// /* execute multi query */
// $mysqli->multi_query($sql);die;
		//echo $folder_name;die;


	// $dbhost = '127.0.0.1';
	// $dbuser = 'root';
	// $dbpass = '';

	// $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

	// if(! $conn ) {
	// 	die('Could not connect: ' . mysqli_error());
	// }

	// 	//$table_name = $table_name;

	// $backup_file  = 'C:/xampp/htdocs/calibration/BackupDB/'.$folder_name.'/'.$file_name;

	// $sql = "LOAD DATA INFILE '$backup_file' INTO TABLE $table_name";

	// mysqli_select_db($conn,'calibration');
	// $retval = mysqli_query( $conn, $sql );

	// if(! $retval ) {
	// 	die('Could not load data : ' . mysqli_error($conn));
	// }
	// 	//echo "Loaded  data successfully\n";

	// mysqli_close($conn);

	Session::flash('success', "Backup restore successfully");
// return Redirect::back();
	$backup_history = DB::table('backup_history')->orderBy('RecId', 'desc')->get();

	return view('Restore', ['backup_history' => $backup_history]);
}

function RestoreData(request $request)
{
	echo'TT';die;

	$dbhost = '127.0.0.1';
	$dbuser = 'root';
	$dbpass = '';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

	if(! $conn ) {
		die('Could not connect: ' . mysqli_error());
	}

	$table_name = "calibration";

	$backup_file  = 'C:/xampp/htdocs/Calibration/BackupDB/'.$folder_name.'/'.$file_name;

	$sql = "LOAD DATA INFILE '$backup_file' INTO TABLE $table_name";

	mysqli_select_db($conn,'calibration');
	$retval = mysqli_query( $conn, $sql );

	if(! $retval ) {
		die('Could not load data : ' . mysqli_error($conn));
	}
		//echo "Loaded  data successfully\n";

	mysqli_close($conn);

	Session::flash('success', "Backup restore successfully");
// return Redirect::back();
	$backup_history = DB::table('backup_history')->get();

	return view('Restore', ['backup_history' => $backup_history]);
}


}

<?php
if($MainData['FillterLogType']==1)
{
	$filename="Login Log-".date("d-M-Y");
	header("Content-type: application/octet-stream");  
	header("Content-Disposition: attachment; filename=".$filename.".xls");  
	header("Pragma: no-cache");  
	header("Expires: 0"); 

	$columnHeader = "User Id" . "\t" . "User Name" . "\t" . "Login Date". "\t" . "Login Status" . "\t";

	$setData = '';
	foreach($MainData['LogData'] as $Log)
	{
		$rowData = '';
		$UserId = '"' . $Log['UserId'] . '"' . "\t";  
		$UserName = '"' . $Log['UserName'] . '"' . "\t";  
		$LoginDate = '"' . date("d/m/Y h:i A",strtotime($Log['LoginDate'])) . '"' . "\t";  
		if($Log['Status']==1) 
		{ 
			$myStatus="Login Successfully"; 
		} 
		elseif($Log['Status']==0) 
		{
			$myStatus="Login Failed"; 
		}
		else
		{
			$myStatus="";
		}
		$Status = '"' . $myStatus . '"' . "\t";  
		$rowData .= $UserId.$UserName.$LoginDate.$Status;

		$setData .= trim($rowData) . "\n";
	}

	echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
}
if($MainData['FillterLogType']==2)
{
	$filename="Event Log-".date("d-M-Y");
	header("Content-type: application/octet-stream");  
	header("Content-Disposition: attachment; filename=".$filename.".xls");
	header("Pragma: no-cache");  
	header("Expires: 0"); 

	$columnHeader = "Calibration Form Id" . "\t" . "Calibration Status" . "\t" . "Comments". "\t" . "Created By" . "\t" . "Created Date" . "\t";

	$setData = '';
	foreach($MainData['LogData'] as $Log)
	{
		$rowData = '';
		$FormId = '"' . $Log['FormId'] . '"' . "\t";  
		$Name = '"' . $Log['Name'] . '"' . "\t";  
		$Comments = '"' . $Log['Comments'] . '"' . "\t";  
		$UserName = '"' . $Log['UserName'] . '"' . "\t";  
		$CreatedDate = '"' . date("d/m/Y h:i A",strtotime($Log['CreatedDate'])) . '"' . "\t";  

		$rowData .= $FormId.$Name.$Comments.$UserName.$CreatedDate;

		$setData .= trim($rowData) . "\n";
	}

	echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
}
?>
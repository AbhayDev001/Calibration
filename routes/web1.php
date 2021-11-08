<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
date_default_timezone_set('Asia/Kolkata');

Route::get('/', 'UserController@Index');
Route::get('/home', 'UserController@Home');
Route::get('/home/{Calibration}', 'UserController@CalibrationHome')->name('Calibration');
Route::get('/AdminHome', 'UserController@AdminHome');
Route::get('/UserProfile', 'UserController@UserProfile');

Route::post('/UserLogin', 'LdapController@UserLogin');
Route::get('/UserLogin', function () {
	return redirect('/');
});

Route::post('/UpdProfile', 'UserController@UpdProfile');
Route::get('/UpdProfile', function () {
	return redirect('/');
});

Route::get('/CalibrationAnalysis', 'UserController@CalibrationAnalysis');
Route::post('/CalibrationAnalysisFilter', 'UserController@CalibrationAnalysisFilter');
Route::get('/CalibrationAnalysisFilter', function () {
	return redirect('/');
});
Route::get('/CalibrationVerify', 'UserController@CalibrationVerify');
Route::post('/CalibrationVerifyFilter', 'UserController@CalibrationVerifyFilter');
Route::get('/CalibrationVerifyFilter', function () {
	return redirect('/');
});
Route::get('/CalibrationApprovel', 'UserController@CalibrationApprovel');
Route::post('/CalibrationApprovelFilter', 'UserController@CalibrationApprovelFilter');
Route::get('/CalibrationApprovelFilter', function () {
	return redirect('/');
});
Route::get('/AddCalibration', 'UserController@AddCalibration');
Route::get('/AddMonthlyCalibration', 'UserController@AddMonthlyCalibration');
Route::get('/AddMGMonthlyCalibration', 'UserController@AddMGMonthlyCalibration');
Route::get('/CalibrationDetails/{cid}', 'UserController@CalibrationDetails')->name('cid');
Route::get('/MGCalibrationDetails/{cid}', 'UserController@MGCalibrationDetails')->name('cid');
Route::get('/CalibrationDetails1/{cid}', 'UserController@CalibrationDetails1')->name('cid');
Route::get('/CalibrationDetails2/{cid}', 'UserController@CalibrationDetails2')->name('cid');
Route::get('/CalibrationDetails3/{cid}', 'UserController@CalibrationDetails3')->name('cid');
Route::get('/Logout', 'UserController@logout');

Route::get('/AjaxGetInstrument/{cid}', 'UserController@AjaxGetInstrument')->name('cid');
Route::get('/AjaxGetDeviceTypeAdmin/{cid}', 'UserController@AjaxGetDeviceTypeAdmin')->name('cid');
Route::get('/AjaxGetDeviceType/{cid}', 'UserController@AjaxGetDeviceType')->name('cid');
Route::get('/AjaxGetDeviceType1/{cid}', 'UserController@AjaxGetDeviceType1')->name('cid');
Route::get('/AjaxGetDeviceTypeText/{did}', 'UserController@AjaxGetDeviceTypeText')->name('did');
Route::get('/AjaxGetDeviceValue/{cid}', 'UserController@AjaxGetDeviceValue')->name('data');
Route::get('/AjaxGetFileData/{cid}', 'UserController@AjaxGetFileData')->name('data');
Route::get('/CheckAvailableCalibration/{data}', 'UserController@CheckAvailableCalibration')->name('data');

Route::post('/SaveCalibration', 'UserController@SaveCalibration');
Route::get('/SaveCalibration', function () {
	return redirect('/');
});
Route::post('/SaveMonthlyCalibration', 'UserController@SaveMonthlyCalibration');
Route::get('/SaveMonthlyCalibration', function () {
	return redirect('/');
});
Route::post('/SaveMGMonthlyCalibration', 'UserController@SaveMGMonthlyCalibration');
Route::get('/SaveMGMonthlyCalibration', function () {
	return redirect('/');
});
Route::post('/SaveMonthlyCalibrationP2', 'UserController@SaveMonthlyCalibrationP2');
Route::get('/SaveMonthlyCalibrationP2', function () {
	return redirect('/');
});
Route::post('/SaveMonthlyCalibrationP2MG', 'UserController@SaveMonthlyCalibrationP2MG');
Route::get('/SaveMonthlyCalibrationP2MG', function () {
	return redirect('/');
});
Route::post('/SaveMonthlyCalibrationP3', 'UserController@SaveMonthlyCalibrationP3');
Route::get('/SaveMonthlyCalibrationP3', function () {
	return redirect('/');
});
Route::post('/SaveMonthlyCalibrationP4', 'UserController@SaveMonthlyCalibrationP4');
Route::get('/SaveMonthlyCalibrationP4', function () {
	return redirect('/');
});
Route::post('/SaveMonthlyCalibrationP5', 'UserController@SaveMonthlyCalibrationP5');
Route::get('/SaveMonthlyCalibrationP5', function () {
	return redirect('/');
});
Route::post('/UpdCalibration', 'UserController@UpdCalibration');
Route::get('/UpdCalibration', function () {
	return redirect('/');
});
Route::post('/UpdMonthlyCalibration', 'UserController@UpdMonthlyCalibration');
Route::get('/UpdMonthlyCalibration', function () {
	return redirect('/');
});
Route::post('/UpdMonthlyCalibrationP2', 'UserController@UpdMonthlyCalibrationP2');
Route::get('/UpdMonthlyCalibrationP2', function () {
	return redirect('/');
});
Route::post('/UpdMonthlyCalibrationP2MG', 'UserController@UpdMonthlyCalibrationP2MG');
Route::get('/UpdMonthlyCalibrationP2MG', function () {
	return redirect('/');
});
Route::post('/UpdMonthlyCalibrationP3', 'UserController@UpdMonthlyCalibrationP3');
Route::get('/UpdMonthlyCalibrationP3', function () {
	return redirect('/');
});
Route::post('/UpdMonthlyCalibrationP4', 'UserController@UpdMonthlyCalibrationP4');
Route::get('/UpdMonthlyCalibrationP4', function () {
	return redirect('/');
});
Route::post('/UpdMonthlyCalibrationP5', 'UserController@UpdMonthlyCalibrationP5');
Route::get('/UpdMonthlyCalibrationP5', function () {
	return redirect('/');
});
Route::post('/VerifyCalibration', 'UserController@VerifyCalibration');
Route::get('/VerifyCalibration', function () {
	return redirect('/');
});
Route::post('/VerifyMonthlyCalibration', 'UserController@VerifyMonthlyCalibration');
Route::get('/VerifyMonthlyCalibration', function () {
	return redirect('/');
});
Route::post('/ApproveCalibration', 'UserController@ApproveCalibration');
Route::get('/ApproveCalibration', function () {
	return redirect('/');
});
Route::post('/ApproveMonthlyCalibration', 'UserController@ApproveMonthlyCalibration');
Route::get('/ApproveMonthlyCalibration', function () {
	return redirect('/');
});

Route::get('/EditCalibration/{cid}', 'UserController@EditCalibration')->name('cid');
Route::get('/EditMonthlyCalibration/{cid}', 'UserController@EditMonthlyCalibration')->name('cid');
Route::get('/EditMonthlyCalibrationMG/{cid}', 'UserController@EditMonthlyCalibrationMG')->name('cid');
Route::get('/EditCalibrationDetails/{cid}', 'UserController@EditCalibrationDetails')->name('cid');
Route::get('/EditCalibrationDetails1/{cid}', 'UserController@EditCalibrationDetails1')->name('cid');
Route::get('/EditCalibrationDetails2/{cid}', 'UserController@EditCalibrationDetails2')->name('cid');
Route::get('/EditCalibrationDetails3/{cid}', 'UserController@EditCalibrationDetails3')->name('cid');
Route::get('/ViewCalibration/{cid}', 'UserController@ViewCalibration')->name('cid');
Route::get('/ViewMonthlyCalibration/{cid}', 'UserController@ViewMonthlyCalibration')->name('cid');
Route::get('/ViewMonthlyCalibrationMG/{cid}', 'UserController@ViewMonthlyCalibrationMG')->name('cid');
Route::get('/PrintCalibration/{cid}', 'UserController@PrintCalibration')->name('cid');
Route::get('/PrintMonthlyCalibration/{cid}', 'UserController@PrintMonthlyCalibration')->name('cid');
Route::get('/PrintMonthlyCalibrationMG/{cid}', 'UserController@PrintMonthlyCalibrationMG')->name('cid');
Route::get('/AjaxSaveCommentWithUpdateLine/{json}', 'UserController@SaveCommentWithUpdateLine')->name('json');
Route::get('/AjaxSaveCommentWithUpdateLine1/{json}', 'UserController@SaveCommentWithUpdateLine1')->name('json');
Route::get('/AjaxSaveCommentWithUpdateLine2/{json}', 'UserController@SaveCommentWithUpdateLine2')->name('json');
Route::get('/AjaxSaveCommentWithCalData/{json}', 'UserController@SaveCommentWithCalData')->name('json');
Route::get('/AjaxSaveComment/{json}', 'UserController@SaveComment')->name('json');
Route::get('/AjaxGetComment/{cid}', 'UserController@AjaxGetComment')->name('cid');
Route::get('/AjaxSaveCommentTemp/{json}', 'UserController@SaveCommentTemp')->name('json');

//Admin
Route::get('/AddUser', 'AdminController@AddUser');
Route::get('/ManageUser/{IsActive}', 'AdminController@ManageUser')->name('IsActive');
Route::post('/SaveUser', 'LdapController@SaveUser');
Route::get('/SaveUser', function () {
	return redirect('/');
});
Route::get('/AjaxGetUserData/{userid}', 'AdminController@AjaxGetUserData')->name('userid');
Route::post('/UpdUser', 'AdminController@UpdUser');
Route::get('/UpdUser', function () {
	return redirect('/');
});
Route::post('/ActiveDeactiveUser', 'AdminController@ActiveDeactiveUser');
Route::get('/ActiveDeactiveUser', function () {
	return redirect('/');
});

Route::get('/ManageLog', 'AdminController@ManageLog');
Route::post('/LogFilterData', 'AdminController@LogFilterData');
Route::get('/LogFilterData', function () {
	return redirect('/');
});
Route::post('/PrintLogFilterData', 'AdminController@PrintLogFilterData');
Route::get('/PrintLogFilterData', function () {
	return redirect('/');
});

Route::get('/ManageCalibrationFormType', 'AdminController@ManageCalibrationFormType');
Route::post('/SaveFormType', 'AdminController@SaveFormType');
Route::get('/SaveFormType', function () {
	return redirect('/');
});
Route::get('/AjaxGetCaliFormType/{RecId}', 'AdminController@AjaxGetCaliFormType')->name('RecId');
Route::post('/UpdCaliFormType', 'AdminController@UpdCaliFormType');
Route::get('/UpdCaliFormType', function () {
	return redirect('/');
});
Route::post('/ActiveDeactiveCalFormType', 'AdminController@ActiveDeactiveCalFormType');
Route::get('/ActiveDeactiveCalFormType', function () {
	return redirect('/');
});

Route::get('/ManageCalibrationFormData', 'AdminController@ManageCalibrationForm');
Route::post('/SaveCaliForm', 'AdminController@SaveCaliForm');
Route::get('/SaveCaliForm', function () {
	return redirect('/');
});
Route::get('/AjaxGetCaliForm/{RecId}', 'AdminController@AjaxGetCaliForm')->name('RecId');
Route::post('/UpdCaliForm', 'AdminController@UpdCaliForm');
Route::get('/UpdCaliForm', function () {
	return redirect('/');
});
Route::post('/ActiveDeactiveCalForm', 'AdminController@ActiveDeactiveCalForm');
Route::get('/ActiveDeactiveCalForm', function () {
	return redirect('/');
});

Route::get('/ManageInstrument', 'AdminController@ManageInstrument');
Route::post('/SaveInstrument', 'AdminController@SaveInstrument');
Route::get('/SaveInstrument', function () {
	return redirect('/');
});
Route::get('/AjaxGetInstrument1/{RecId}', 'AdminController@AjaxGetInstrument1')->name('RecId');
Route::post('/UpdInstrument', 'AdminController@UpdInstrument');
Route::get('/UpdInstrument', function () {
	return redirect('/');
});
Route::post('/ActiveDeactiveInstrument', 'AdminController@ActiveDeactiveInstrument');
Route::get('/ActiveDeactiveInstrument', function () {
	return redirect('/');
});


Route::get('/AddDevices', 'AdminController@AddDevices');
Route::get('/ManageDevice/{IsActive}', 'AdminController@ManageDevice')->name('IsActive');
Route::post('/SaveDevice', 'AdminController@SaveDevice');
Route::get('/SaveDevice', function () {
	return redirect('/');
});
Route::get('/AjaxGetDevice1/{RecId}', 'AdminController@AjaxGetDevice1')->name('RecId');
Route::post('/UpdDevice', 'AdminController@UpdDevice');
Route::get('/UpdDevice', function () {
	return redirect('/');
});
Route::post('/ActiveDeactiveDevice', 'AdminController@ActiveDeactiveDevice');
Route::get('/ActiveDeactiveDevice', function () {
	return redirect('/');
});

Route::get('/AddDeviceWeight', 'AdminController@ManageDeviceWeight');
Route::get('/DeviceWeightList', 'AdminController@DeviceWeightList');
Route::post('/SaveDeviceWeight', 'AdminController@SaveDeviceWeight');
Route::get('/SaveDeviceWeight', function () {
	return redirect('/');
});
Route::post('/EditDeviceWeight', 'AdminController@EditDeviceWeight');
Route::get('/EditDeviceWeight', function () {
	return redirect('/');
});
Route::post('/UpdDeviceWeight', 'AdminController@UpdDeviceWeight');
Route::get('/UpdDeviceWeight', function () {
	return redirect('/');
});
Route::post('/DeleteDeviceWeight', 'AdminController@DeleteDeviceWeight');
Route::get('/DeleteDeviceWeight', function () {
	return redirect('/');
});

Route::get('/PasswordConverter', 'AdminController@PasswordConverter');
Route::post('/ConvertSecureKey', 'AdminController@ConvertSecureKey');
Route::get('/ConvertSecureKey', function () {
	return redirect('/');
});

Route::get('/ClearCache', 'AdminController@ClearCache');

//Report
Route::get('/SummaryReport', 'UserController@SummaryReport');
Route::post('/SummaryReportData', 'UserController@SummaryReportData');
Route::get('/SummaryReportData', function () {
	return redirect('/');
});
Route::get('/DetailsReport', 'UserController@DetailsReport');
Route::post('/DetailsReportData', 'UserController@DetailsReportData');
Route::get('/DetailsReportData', function () {
	return redirect('/');
});

Route::get('/SetLdapConfiguration', 'AdminController@SetLdapConfiguration');
Route::post('/SaveLdapConfiguration', 'AdminController@SaveLdapConfiguration');
Route::get('/SaveLdapConfiguration', function () {
	return redirect('/');
});

Route::get('/SearchLdapUser/{SearchText}', 'LdapController@SearchLdapUser')->name('SearchText');

Route::get('/CheckAvailableCalibrationLine/{data}', 'AdminController@CheckAvailableCalibrationLine')->name('data');

Route::post('/RePerformReq', 'UserController@RePerformReq');
Route::get('/RePerformReq', function () {
	return redirect('/');
});
Route::get('/RePerformRequestList', 'UserController@RePerformRequestList');
Route::post('/UpdReqStatus', 'UserController@UpdReqStatus');
Route::get('/UpdReqStatus', function () {
	return redirect('/');
});
Route::get('/sendmail', 'UserController@sendmail');

// start rhl 02-12-2020 //

Route::get('/AddWeightBox', 'AdminController@ManageWeightBox');
Route::get('/WeightBoxList', 'AdminController@WeightBoxList');
Route::post('/SaveWeightBox', 'AdminController@SaveWeightBox');
Route::get('/SaveWeightBox', function () {
	return redirect('/');
});
Route::post('/EditWeightBox', 'AdminController@EditWeightBox');
Route::get('/EditWeightBox', function () {
	return redirect('/');
});
Route::post('/UpdateWeightBox', 'AdminController@UpdateWeightBox');
Route::get('/UpdateWeightBox', function () {
	return redirect('/');
});
Route::post('/DeleteWeightBox', 'AdminController@DeleteWeightBox');
Route::get('/DeleteWeightBox', function () {
	return redirect('/');
});
Route::get('/AjaxGetWeightBoxValue/{cid}', 'AdminController@AjaxGetWeightBoxValue')->name('data');

Route::get('/ManageCalibrationSettings', 'AdminController@ManageCalibrationSettings');
Route::post('/SaveFormSettings', 'AdminController@SaveFormSettings');
Route::get('/SaveFormSettings', function () {
	return redirect('/');
});
Route::get('/AjaxGetFormSettings/{cid}', 'AdminController@AjaxGetFormSettings')->name('data');

Route::get('/ManageDecimalSettings', 'AdminController@ManageDecimalSettings');
Route::post('/SaveDecimalSettings', 'AdminController@SaveDecimalSettings');
Route::get('/SaveDecimalSettings', function () {
	return redirect('/');
});
Route::get('/AjaxGetDeviceTypeFormId/{data}', 'UserController@AjaxGetDeviceTypeFormId')->name('data');

Route::get('/SendMailBeforeFourDays', 'UserController@SendMailBeforeFourDays');
Route::get('/BackupRestore', 'BackupController@Index');
Route::post('/BackupData', 'BackupController@BackupData');
Route::get('/BackupDatabase/', 'BackupController@BackupDatabase');
//Route::get('/RestoreDatabase/{folder_name}/{file_name}/{table_name}', 'BackupController@RestoreDatabase');
Route::get('/RestoreDatabase/{file_name}', 'BackupController@RestoreDatabase');
//Route::get('/Restore', 'BackupController@Restore');
Route::get('/TicketZip', 'BackupController@TicketZip');
Route::post('/RestoreData', 'BackupController@RestoreData');
// end rhl 02-12-2020 //
<?php
include_once 'includes/config.php';
include 'includes/sendsms.php';

class User
{
	//Database connect
	public function __construct()
	{
		$db = new DB_Class();
	}

	// Inserting in to register
	public function register($name, $gender, $fhname, $dob, $age, $education, $religion, $caste, $hno, $street, $constituency, $mandal, $village, $mobile, $phone, $email, $generalcurrentpositionlevel, $generalcurrentpositionname, $partycurrentpositionlevel, $partycurrentpositionname, $pastpositions, $otherdetails, $userimage)
	{
		if ($dob != '')
		{
			$dob1 = explode('/', $dob);
			$year = $dob1[2];
		} else
		{
			date_default_timezone_set('Asia/Kolkata');
			$ageyear = date("Y");
			$year = $ageyear - $age;
		}
		date_default_timezone_set('Asia/Kolkata');
		$registerdate = date("d/m/Y");

		$result = mysql_query("INSERT INTO register (name, gender, fhname, dob,birthyear, education, religion, caste, hno,street,constituency, mandal, village, mobile, phone, email, generalcurrentpositionlevel, generalcurrentpositionname, partycurrentpositionlevel, partycurrentpositionname, pastpositions, otherdetails,image,registerdate) VALUES ('" . $name . "', '" . $gender . "', '" . $fhname . "', '" . $dob . "','" . $year . "', '" . $education . "', '" . $religion . "', '" . $caste . "', '" . $hno . "','" . $street . "','" . $constituency . "', '" . $mandal . "', '" . $village . "', '" . $mobile . "', '" . $phone . "', '" . $email . "', '" . $generalcurrentpositionlevel . "', '" . $generalcurrentpositionname . "', '" . $partycurrentpositionlevel . "', '" . $partycurrentpositionname . "', '" . $pastpositions . "', '" . $otherdetails . "','" . $userimage . "','" . $registerdate . "')") or die(mysql_error());
		return $result;
	}

	public function letter($receivedfrom, $sendername, $senderaddress, $receiveddate, $receivedthrough, $lrno, $lrdate, $description, $enclosures, $mpcomments, $actiontaken, $status)
	{

		date_default_timezone_set('Asia/Kolkata');
		$registerdate = date("d/m/Y");
		$time = time();

		$result = mysql_query("INSERT INTO letters(receivedfrom, sendername, senderaddress, receiveddate, receivedthrough, lrno, lrdate, description, enclosures, mpcomments, actiontaken, status, letterdate,timestamp)VALUES ('" . $receivedfrom . "', '" . $sendername . "', '" . $senderaddress . "', '" . $receiveddate . "','" . $receivedthrough . "', '" . $lrno . "', '" . $lrdate . "', '" . $description . "', '" . $enclosures . "','" . $mpcomments . "','" . $actiontaken . "', '" . $status . "', '" . $registerdate . "','" . $time . "')") or die(mysql_error());
		return $result;
	}

	//Inserting Values to Religion master
	public function religionmaster($religionname)
	{
		$result = mysql_query("INSERT INTO religionmaster(religionname) VALUES ('" . $religionname . "')") or die(mysql_error());
		return $result;
	}

	// Getting Values From  Religion Master
	public function selectreligionmaster()
	{
		$result = mysql_query("SELECT * FROM religionmaster") or die(mysql_error());
		return $result;
	}

	// Updating Values For Religion Master
	public function updatereligionmaster($religionid, $religionname)
	{
		$result = mysql_query("UPDATE religionmaster SET religionname = '" . $religionname . "' WHERE religionid = '" . $religionid . "'");
		return $result;
	}

	//Inserting Values to Caste master
	public function castemaster($castename, $castecategory)
	{
		$result = mysql_query("INSERT INTO castemaster(castename,castecategory) VALUES ('" . $castename . "','" . $castecategory . "')") or die(mysql_error());
		return $result;
	}

	// Getting Values From  Caste Master
	public function selectcastemaster()
	{
		$result = mysql_query("SELECT * FROM castemaster") or die(mysql_error());
		return $result;
	}

	// Updating Values For Caste Master
	public function updatecastemaster($casteid, $castename, $castecategory)
	{
		$result = mysql_query("UPDATE castemaster SET castename = '" . $castename . "', castecategory='" . $castecategory . "' WHERE casteid = '" . $casteid . "'");
		return $result;
	}

	//Inserting Values to Mandal master
	public function mandalmaster($mandalname, $type, $constituency)
	{
		$result = mysql_query("INSERT INTO mandalmaster(mandalname,type,constituency) VALUES ('" . $mandalname . "','" . $type . "','" . $constituency . "')") or die(mysql_error());
		return $result;
	}

	// Getting Values From  Mandal Master
	public function selectmandalmaster()
	{
		$result = mysql_query("SELECT * FROM mandalmaster") or die(mysql_error());
		return $result;
	}

	// Updating Values For Mandal Master
	public function updatemandalmaster($mandalid, $mandalname, $type, $constituency)
	{
		$result = mysql_query("UPDATE mandalmaster SET mandalname = '" . $mandalname . "', type ='" . $type . "', constituency = '" . $constituency . "' WHERE mandalid = '" . $mandalid . "'");
		return $result;
	}

	// Getting Values From  Divison Master
	public function selectdivisonmaster()
	{
		$result = mysql_query("SELECT * FROM divisionmaster") or die(mysql_error());
		return $result;
	}

	//Inserting Values to Divison master
	public function divisonmaster($village, $divisonname)
	{
		$result = mysql_query("INSERT INTO divisionmaster(villagename,divisonname) VALUES ('" . $village . "','" . $divisonname . "')") or die(mysql_error());
		return $result;
	}

	// Updating Values For Divison Master
	public function updatedivisonmaster($divisonid, $village, $divisonname)
	{
		$result = mysql_query("UPDATE divisionmaster SET villagename = '" . $village . "', divisonname ='" . $divisonname . "'WHERE id='" . $divisonid . "'");
		return $result;
	}

	//Inserting Values to Village master
	public function villagemaster($mandal, $villagename)
	{
		$result = mysql_query("INSERT INTO villagemaster(mandalid,villagename) VALUES ('" . $mandal . "','" . $villagename . "')") or die(mysql_error());
		return $result;
	}

	// Getting Values From  Village Master
	public function selectvillagemaster()
	{
		$result = mysql_query("SELECT * FROM villagemaster LEFT JOIN mandalmaster ON villagemaster.mandalid=mandalmaster.mandalid") or die(mysql_error());
		return $result;
	}

	// Updating Values For Village Master
	public function updatevillagemaster($mandalid, $villageid, $villagename)
	{
		$result = mysql_query("UPDATE villagemaster SET villagename = '" . $villagename . "', mandalid ='" . $mandalid . "' WHERE villageid = '" . $villageid . "'");
		return $result;
	}

	//Inserting Values to Position master
	public function positionmaster($positiontype, $positionlevel, $positionname)
	{
		$result = mysql_query("INSERT INTO positionmaster(positiontype,positionlevel,positionname) VALUES ('" . $positiontype . "','" . $positionlevel . "','" . $positionname . "')") or die(mysql_error());
		return $result;
	}

	// Getting Values From  Position Master
	public function selectpositionmaster()
	{
		$result = mysql_query("SELECT * FROM positionmaster") or die(mysql_error());
		return $result;
	}

	// Updating Values For Position Master
	public function updatepositionmaster($positiontype, $positionlevel, $positionname, $positionid)
	{
		$result = mysql_query("UPDATE positionmaster SET positiontype = '" . $positiontype . "', positionlevel ='" . $positionlevel . "' ,positionname='" . $positionname . "' WHERE positionid = '" . $positionid . "'");
		return $result;
	}

	//Inserting Values to reciever master
	public function recievermaster($recievername)
	{
		$result = mysql_query("INSERT INTO letterrecievermaster(recievername) VALUES ('" . $recievername . "')") or die(mysql_error());
		return $result;
	}

	// Getting Values From  reciever Master
	public function selectrecievermaster()
	{
		$result = mysql_query("SELECT * FROM letterrecievermaster") or die(mysql_error());
		return $result;
	}

	// Updating Values For reciever Master
	public function updaterecievermaster($recieverid, $recievername)
	{
		$result = mysql_query("UPDATE letterrecievermaster SET recievername = '" . $recievername . "' WHERE recieverid = '" . $recieverid . "'");
		return $result;
	}

	//Inserting Values to petition master
	public function petitionmaster($petitionname)
	{
		$result = mysql_query("INSERT INTO petitionmaster(petitionname) VALUES ('" . $petitionname . "')") or die(mysql_error());
		return $result;
	}

	// Getting Values From  petition Master
	public function selectpetitionmaster()
	{
		$result = mysql_query("SELECT * FROM petitionmaster") or die(mysql_error());
		return $result;
	}

	// Updating Values For petition Master
	public function updatepetitionmaster($petitionid, $petitionname)
	{
		$result = mysql_query("UPDATE petitionmaster SET petitionname = '" . $petitionname . "' WHERE petitionid = '" . $petitionid . "'");
		return $result;
	}

	//Inserting Values to worktype master
	public function worktypemaster($worktypename)
	{
		$result = mysql_query("INSERT INTO worktypemaster(worktypename) VALUES ('" . $worktypename . "')") or die(mysql_error());
		return $result;
	}

	// Getting Values From  worktype Master
	public function selectworktypemaster()
	{
		$result = mysql_query("SELECT * FROM worktypemaster") or die(mysql_error());
		return $result;
	}

	// Updating Values For worktype Master
	public function updateworktypemaster($worktypeid, $worktypename)
	{
		$result = mysql_query("UPDATE worktypemaster SET worktypename = '" . $worktypename . "' WHERE worktypeid = '" . $worktypeid . "'");
		return $result;
	}

	// Login process
	public function check_login($username, $password, $role)
	{
		$password = $password;
		$result = mysql_query("SELECT * from users WHERE username ='" . $username . "' AND password = '" . $password . "'");
		$user_data = mysql_fetch_array($result);
		$no_rows = mysql_num_rows($result);
		if ($no_rows == 1)
		{

			$_SESSION['login'] = true;
			$_SESSION['userid'] = $user_data['userid'];

			header("location:dashboard.php");
			exit ;

			return TRUE;
		} else
		{
			return FALSE;
		}
	}

	// Getting name
	public function get_fullname($userid)
	{
		$result = mysql_query("SELECT * from users WHERE userid = $userid");
		$user_data = mysql_fetch_array($result);
		echo $user_data['username'];
	}

	// Getting session
	public function get_session()
	{
		return $_SESSION['login'];
	}

	// Logout
	public function user_logout()
	{
		$_SESSION['login'] = FALSE;
		session_destroy();
	}

	// >7 days
	public function lessthanweek()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date1 = time();
		$format = 'Y-m-j G:i:s';
		$date = date($format);
		// - 7 days from today
		$date = date($format, strtotime('-7 day' . $date));
		$date2 = strtotime($date);
		$result = mysql_query("SELECT * FROM letters WHERE timestamp BETWEEN '" . $date2 . "' AND '" . $date1 . "'");
		return $result;

	}

	public function twoweek()
	{

		date_default_timezone_set('Asia/Kolkata');
		$date1 = date("d/m/Y");
		$format = 'Y-m-j G:i:s';
		$date = date($format);
		// - 8 to 15 days from today
		$date3 = date($format, strtotime('-8 day' . $date));
		$date4 = date($format, strtotime('-15 day' . $date));
		$date8 = strtotime($date3);
		$date15 = strtotime($date4);

		$result = mysql_query("SELECT * FROM letters WHERE timestamp BETWEEN '" . $date15 . "' AND '" . $date8 . "'");
		return $result;

	}

	public function lessthanmonth()
	{

		date_default_timezone_set('Asia/Kolkata');
		$date1 = date("d/m/Y");
		$format = 'Y-m-j G:i:s';
		$date = date($format);
		// - 16 to 30 days from today
		$date3 = date($format, strtotime('-16 day' . $date));
		$date4 = date($format, strtotime('-30 day' . $date));
		$date16 = strtotime($date3);
		$date30 = strtotime($date4);

		$result = mysql_query("SELECT * FROM letters WHERE timestamp BETWEEN '" . $date30 . "' AND '" . $date16 . "'");
		return $result;

	}

	public function morethanmonth()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date1 = date("d/m/Y");
		$format = 'Y-m-j G:i:s';
		$date = date($format);
		$date4 = date($format, strtotime('-30 day' . $date));
		$date30 = strtotime($date4);
		$result = mysql_query("SELECT * FROM letters WHERE timestamp < '" . $date30 . "'");
		return $result;

	}

	public function totalletters()
	{
		$result = mysql_query("SELECT * FROM letters");
		return $result;
	}

	public function noactiontaken()
	{
		$result = mysql_query("SELECT * FROM letters WHERE status='No Action Taken'");
		return $result;
	}

	public function actionunderprogress()
	{
		$result = mysql_query("SELECT * FROM letters WHERE status='Action Under Progress'");
		return $result;
	}

	public function completed()
	{
		$result = mysql_query("SELECT * FROM letters WHERE status='Completed'");
		return $result;
	}

	public function actionnotrequired()
	{
		$result = mysql_query("SELECT * FROM letters WHERE status='Action not Required'");
		return $result;
	}

	public function update($id, $name, $gender, $fhname, $dob, $age, $education, $religion, $caste, $hno, $street, $constituency, $mandal, $village, $mobile, $phone, $email, $generalcurrentpositionlevel, $generalcurrentpositionname, $partycurrentpositionlevel, $partycurrentpositionname, $pastpositions, $otherdetails, $userimage)
	{
		if ($dob != '')
		{
			$dob1 = explode('/', $dob);
			$year = $dob1[2];
		} else
		{
			date_default_timezone_set('Asia/Kolkata');
			$ageyear = date("Y");
			$year = $ageyear - $age;
		}
		date_default_timezone_set('Asia/Kolkata');
		$registerdate = date("d/m/Y");

		$result = mysql_query("UPDATE register SET  name='" . $name . "', gender='" . $gender . "',fhname='" . $fhname . "',dob ='" . $dob . "',birthyear='" . $year . "',education='" . $education . "', religion='" . $religion . "', caste='" . $caste . "', hno='" . $hno . "',street='" . $street . "',constituency='" . $constituency . "', mandal='" . $mandal . "', village='" . $village . "', mobile='" . $mobile . "', phone='" . $phone . "', email='" . $email . "', generalcurrentpositionlevel='" . $generalcurrentpositionlevel . "', generalcurrentpositionname= '" . $generalcurrentpositionname . "', partycurrentpositionlevel='" . $partycurrentpositionlevel . "', partycurrentpositionname= '" . $partycurrentpositionname . "', pastpositions='" . $pastpositions . "', otherdetails='" . $otherdetails . "',image='" . $userimage . "' WHERE  registerid = '" . $id . "'") or die(mysql_error());
		return $result;
	}

	//Inserting Values to Scheme master
	public function schememaster($schemename, $funds, $fundtype)
	{
		$result = mysql_query("INSERT INTO schememaster(schemename,funds,fundtype) VALUES ('" . $schemename . "','" . $funds . "','" . $fundtype . "')") or die(mysql_error());
		return $result;
	}

	// Getting Values From  scheme Master
	public function selectschememaster()
	{
		$result = mysql_query("SELECT * FROM schememaster") or die(mysql_error());
		return $result;
	}

	// Updating Values For scheme Master
	public function updateschememaster($schemeid, $schemename, $funds, $fundtype)
	{
		$result = mysql_query("UPDATE schememaster SET schemename = '" . $schemename . "',funds = '" . $funds . "', fundtype = '" . $fundtype . "' WHERE schemeid = '" . $schemeid . "'");
		return $result;
	}

	//Inserting Values to Contractor master
	public function contractormaster($name, $concernedperson, $mobile, $email, $adress)
	{
		$result = mysql_query("INSERT INTO contractormaster(name,concernedperson,mobile,email,adress) VALUES ('" . $name . "','" . $concernedperson . "','" . $mobile . "','" . $email . "','" . $adress . "')") or die(mysql_error());
		return $result;
	}

	// Getting Values From  Contractor Master
	public function selectcontractormaster()
	{
		$result = mysql_query("SELECT * FROM contractormaster") or die(mysql_error());
		return $result;
	}

	// Updating Values For Contractor Master
	public function updatecontractormaster($contractorid, $name, $concernedperson, $mobile, $email, $adress)
	{
		$result = mysql_query("UPDATE contractormaster SET name = '" . $name . "',concernedperson = '" . $concernedperson . "', mobile = '" . $mobile . "', email = '" . $email . "' ,adress = '" . $adress . "'  WHERE contractorid = '" . $contractorid . "'");
		return $result;
	}

	//Inserting Values to locality master
	public function localitymaster($localityname)
	{
		$result = mysql_query("INSERT INTO localitymaster(localityname) VALUES ('" . $localityname . "')") or die(mysql_error());
		return $result;
	}

	// Getting Values From  locality Master
	public function selectlocalitymaster()
	{
		$result = mysql_query("SELECT * FROM localitymaster") or die(mysql_error());
		return $result;
	}

	// Updating Values For locality Master
	public function updatelocalitymaster($localityid, $localityname)
	{
		$result = mysql_query("UPDATE localitymaster SET localityname = '" . $localityname . "' WHERE localityid = '" . $localityid . "'");
		return $result;
	}

	//Inserting Values to event master
	public function eventmaster($event_type)
	{
		$result = mysql_query("INSERT INTO eventmaster(event_type) VALUES ('" . $event_type . "')") or die(mysql_error());
		return $result;
	}

	// Getting Values From  event Master
	public function selecteventmaster()
	{
		$result = mysql_query("SELECT * FROM eventmaster") or die(mysql_error());
		return $result;
	}

	// Updating Values For event Master
	public function updateeventmaster($eventid, $event_type)
	{
		$result = mysql_query("UPDATE eventmaster SET event_type = '" . $event_type . "' WHERE eventid = '" . $eventid . "'");
		return $result;
	}

	//Inserting Values to status master
	public function statusmaster($statusname)
	{
		$result = mysql_query("INSERT INTO statusmaster(statusname) VALUES ('" . $statusname . "')") or die(mysql_error());
		return $result;
	}

	// Getting Values From  status Master
	public function selectstatusmaster()
	{
		$result = mysql_query("SELECT * FROM statusmaster") or die(mysql_error());
		return $result;
	}

	// Updating Values For status Master
	public function updatestatusmaster($statusid, $statusname)
	{
		$result = mysql_query("UPDATE statusmaster SET statusname = '" . $statusname . "' WHERE statusid = '" . $statusid . "'");
		return $result;
	}

	// Work management
	public function workmanagement($scheme, $constituency, $mandal, $village, $nameofthework, $locality, $typeofwork, $estimatecost, $adminsancationdate, $adminsanctionno, $uploadcopyoftheletter, $contractor, $dateoffoundationstonelayed, $sitephotosbeforeworkstarted, $currentstatus, $dateofcompletion, $photosoncompletion, $remarks)
	{
		$result = mysql_query("INSERT INTO workmanagement(scheme,constituency,mandal,village,nameofthework,locality,typeofwork,estimatecost,adminsancationdate,adminsanctionno,uploadcopyoftheletter,contractor,dateoffoundationstonelayed,sitephotosbeforeworkstarted,currentstatus,dateofcompletion,photosoncompletion,remarks) VALUES('" . $scheme . "','" . $constituency . "','" . $mandal . "','" . $village . "','" . $nameofthework . "','" . $locality . "','" . $typeofwork . "','" . $estimatecost . "','" . $adminsancationdate . "','" . $adminsanctionno . "','" . $uploadcopyoftheletter . "','" . $contractor . "','" . $dateoffoundationstonelayed . "','" . $sitephotosbeforeworkstarted . "','" . $currentstatus . "','" . $dateofcompletion . "','" . $photosoncompletion . "','" . $remarks . "')") or die(mysql_error());
		return $result;
	}

	public function workmanagementupdate($id, $scheme, $constituency, $mandal, $village, $nameofthework, $locality, $typeofwork, $estimatecost, $adminsancationdate, $adminsanctionno, $uploadcopyoftheletter, $contractor, $dateoffoundationstonelayed, $sitephotosbeforeworkstarted, $currentstatus, $dateofcompletion, $photosoncompletion, $remarks)
	{
		$result = mysql_query("UPDATE workmanagement SET scheme='" . $scheme . "',constituency='" . $constituency . "',mandal='" . $mandal . "',village='" . $village . "',nameofthework='" . $nameofthework . "',locality='" . $locality . "',typeofwork='" . $typeofwork . "', estimatecost='" . $estimatecost . "', adminsancationdate ='" . $adminsancationdate . "' ,adminsanctionno='" . $adminsanctionno . "' ,uploadcopyoftheletter='" . $uploadcopyoftheletter . "' ,contractor='" . $contractor . "',dateoffoundationstonelayed='" . $dateoffoundationstonelayed . "',sitephotosbeforeworkstarted='" . $sitephotosbeforeworkstarted . "',currentstatus='" . $currentstatus . "',dateofcompletion='" . $dateofcompletion . "',photosoncompletion='" . $photosoncompletion . "', remarks='" . $remarks . "' WHERE workid='" . $id . "' ") or die(mysql_error());
		return $result;
	}

	//Inserting Values to petitionforward master
	public function petitionforwardmaster($petitionforwardname)
	{
		$result = mysql_query("INSERT INTO petitionforwardmaster(petitionforwardname) VALUES ('" . $petitionforwardname . "')") or die(mysql_error());
		return $result;
	}

	// Getting Values From  petitionforward Master
	public function selectpetitionforwardmaster()
	{
		$result = mysql_query("SELECT * FROM petitionforwardmaster") or die(mysql_error());
		return $result;
	}

	// Updating Values For petitionforward Master
	public function updatepetitionforwardmaster($petitionforwardid, $petitionforwardname)
	{
		$result = mysql_query("UPDATE petitionforwardmaster SET petitionforwardname = '" . $petitionforwardname . "' WHERE petitionforwardid = '" . $petitionforwardid . "'");
		return $result;
	}

	public function petition($name, $gender, $fhname, $hno, $street, $mandal, $village, $mobile, $subjectrequest, $content, $file, $forwarded, $remarks, $referencenumber)
	{

		date_default_timezone_set('Asia/Kolkata');
		$registerdate = date("d/m/Y");
		if ($forwarded == '')
		{
			$status = 'Action Pending';
		} else
		{
			$status = 'Action Under Progress';
		}

		$result = mysql_query("INSERT INTO petition (name,gender,fhname,hno,street,mandal,village,mobile,subjectrequest,content,file,forwarded,remarks,referencenumber,registerdate,status) VALUES ('" . $name . "', '" . $gender . "', '" . $fhname . "', '" . $hno . "','" . $street . "', '" . $mandal . "', '" . $village . "', '" . $mobile . "', '" . $subjectrequest . "', '" . $content . "', '" . $file . "', '" . $forwarded . "', '" . $remarks . "','" . $referencenumber . "','" . $registerdate . "','" . $status . "')") or die(mysql_error());
		$id = mysql_insert_id();
		if ($forwarded != '')
		{
			$result2 = mysql_query("INSERT INTO petitioncycle(petition_id, forwarded, remarks, dateoffollowup, relateddocument) VALUES ('" . $id . "','" . $forwarded . "','" . $remarks . "','" . $registerdate . "','" . $file . "')") or die(mysql_error());
		}
		return $result;
	}

	//Update petition Details
	public function petitionupdate($id, $name, $gender, $fhname, $hno, $street, $mandal, $village, $mobile, $subjectrequest, $content, $file, $forwarded, $remarks, $referencenumber)
	{
		date_default_timezone_set('Asia/Kolkata');
		$registerdate = date("d/m/Y");

		if ($forwarded == '')
		{
			$status = 'Action Pending';
		} else
		{
			$status = 'Action Under Progress';
		}

		$result = mysql_query("UPDATE petition SET name = '" . $name . "', gender = '" . $gender . "', fhname= '" . $fhname . "', hno='" . $hno . "', street = '" . $street . "', mandal = '" . $mandal . "', village =  '" . $village . "', mobile = '" . $mobile . "', subjectrequest = '" . $subjectrequest . "', content = '" . $content . "',file = '" . $file . "',forwarded = '" . $forwarded . "',remarks = '" . $remarks . "',status = '" . $status . "' WHERE petitionid = '" . $id . "'") or die(mysql_error());
		//$id = mysql_insert_id();

		if ($forwarded != '')
		{
			$result2 = mysql_query("INSERT INTO petitioncycle(petition_id, forwarded, remarks, dateoffollowup, relateddocument) VALUES ('" . $id . "','" . $forwarded . "','" . $remarks . "','" . $registerdate . "','" . $file . "')") or die(mysql_error());
		}

		return $result;
	}

	// INSERT INTO Event Master
	public function event($event_type, $name, $description, $date, $time, $mandal, $village, $mobile, $mobile2, $content, $status)
	{

		$queryGetMandal = mysql_fetch_assoc(mysql_query("select *from mandalmaster where mandalid='$mandal'"));
		$queryGetVillage = mysql_fetch_assoc(mysql_query("select *from villagemaster where mandalid='$mandal'"));

		$mandalName = $queryGetMandal['mandalname'];
		$villageName = $queryGetVillage['villagename'];
		if ($status == 'yes')
		{
			$query = "INSERT INTO events(event_type, event_name, event_description, constituency, mandal, village, phone, phone2, sms_content, date, time, status, doc) VALUES ('" . $event_type . "','" . $name . "','" . $description . "', '" . $constituency . "', '" . $mandalName . "','" . $villageName . "','" . $mobile . "','" . $mobile2 . "','" . $content . "','" . $date . "','" . $time . "','" . $status . "', NOW())";
			$result2 = mysql_query($query) or die(mysql_error());
		} else
		{
			$query = "INSERT INTO events(event_type, event_name, event_description, constituency, mandal, village, phone, phone2, sms_content, date, time, status, doc) VALUES ('" . $event_type . "','" . $name . "','" . $description . "','" . $constituency . "','" . $mandalName . "','" . $villageName . "','" . $mobile . "','" . $mobile2 . "','" . $content . "','" . $date . "','" . $time . "','" . $status . "', NOW())";
			$result2 = mysql_query($query) or die(mysql_error());

			$smsUrl = "http://alerts.smssolutions.in/api/web2sms.php";
			$apiKey = "4143fcjtx1o4400a9476";
			$senderId = "VMNRES";
			$mobileNumber = $mobile;
			$message = $content;
			$dlr_url = "";
			$type = "xml";

			$sendsms = new sendsms($smsUrl, $apiKey, $senderId);
			$timeZone = explode($time);
			$hours = $timeZone[0];
			$minutes = $timeZone[1];

			if ($minutes <= 15)
			{
				$min = 15;
			} elseif ($minutes >= 15 and $minutes <= 30)
			{
				$min = 30;
			} elseif ($minutes >= 30 and $minutes <= 45)
			{
				$min = 45;
			} elseif ($minutes >= 30 and $minutes <= 59)
			{
				$min = 00;
			}
			$time = "$hours$min";
			$smsDate = str_replace("-", "", date("d-m-Y", strtotime($date)));
			$smsDateTime = "$smsDate$time";
			//$sms=$sendsms->send_sms($mobileNumber, $message, $dlr_url, $type);
			$sendsms -> schedule_sms($mobileNumber, $message, $dlr_url, $type, $smsDateTime);
		}
		return $result2;
	}

}
?>
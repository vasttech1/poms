<?php 
	include('includes/session.php');
	$sql="SELECT * FROM contractormaster WHERE contractorid=".$_GET['contractorid'];
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==1)
	{
		$row = mysql_fetch_assoc($rs);
		$data[]=array('field' => 'querytype','value' => 'U');
		$data[]=array('field' => 'contractorid','value' => $row['contractorid']);
		$data[]=array('field' => 'name','value' => $row['name']);
		$data[]=array('field' => 'concernedperson','value' => $row['concernedperson']);
		$data[]=array('field' => 'mobile','value' => $row['mobile']);
		$data[]=array('field' => 'email','value' => $row['email']);
		$data[]=array('field' => 'adress','value' => $row['adress']);
	}
	echo json_encode($data);
?> 
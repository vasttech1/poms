<?php 
	include('includes/session.php');
	$sql="SELECT * FROM letterrecievermaster WHERE recieverid=".$_GET['recieverid'];
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==1)
	{
		$row = mysql_fetch_assoc($rs);
		$data[]=array('field' => 'querytype','value' => 'U');
		$data[]=array('field' => 'recieverid','value' => $row['recieverid']);
		$data[]=array('field' => 'recievername','value' => $row['recievername']);
	}
	echo json_encode($data);
?> 
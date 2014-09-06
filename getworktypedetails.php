<?php 
	include('includes/session.php');
	$sql="SELECT * FROM worktypemaster WHERE worktypeid=".$_GET['worktypeid'];
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==1)
	{
		$row = mysql_fetch_assoc($rs);
		$data[]=array('field' => 'querytype','value' => 'U');
		$data[]=array('field' => 'worktypeid','value' => $row['worktypeid']);
		$data[]=array('field' => 'worktypename','value' => $row['worktypename']);
	}
	echo json_encode($data);
?> 
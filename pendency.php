<?php 
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
include('includes/session.php');
$user = new User();
// Checking for user logged in or not
if ($user->get_session())
{

}

include('includes/header.php');
include('includes/menu.php');
?>
<script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>


<div style="clear:both"></div>
<div class="mastertitle">Pendency</div>
<div style="clear:both"></div>

<div style="max-height:auto; min-height:500px;">
  <div style="height:auto; width:auto;">
    <br />
<br />
<br />

    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="font-family:'Trebuchet MS'; font-size:13px; width:650px;">
  <tr style="background-color:#ffe77a;">
    <th height="29" align="center" valign="middle" ><div>Letters</div></th>
    <th align="center" valign="middle" ><div><= 7 days</div></th>
    <th align="center" valign="middle" ><div style="width:180px; word-wrap:break-word;">8 - 15 days</div></th>
    <th align="center" valign="middle" ><div>16 - 30 days</div></th>
    <th align="center" valign="middle" ><div>> 30 days</div></th>
    <th align="center" valign="middle" ><div>Total</div></th>
  </tr>
       <?php 

$lessthanweek = $user->lessthanweek();
$rows = mysql_num_rows($lessthanweek);

$twoweek = $user->twoweek();
$rows1 = mysql_num_rows($twoweek);

$lessthanmonth = $user->lessthanmonth();
$rows2 = mysql_num_rows($lessthanmonth);

$morethanmonth = $user->morethanmonth();
$rows3= mysql_num_rows($morethanmonth);

$totalletters = $user->totalletters();
$rowsall = mysql_num_rows($totalletters);

 ?>
 
  <tr>
    <td height="25" align="center" valign="middle">Letters</td>
    <td align="center" valign="middle">
    <div><a <?php if($rows >0){?> href="lessthanweek.php" onclick="window.open(this.href, 'child', 'scrollbars,width=1400,height=800'); return false"  <?php } ?>><?php echo $rows; ?> </a></div></td>
    <td align="center" valign="middle"><div><a <?php if($rows1 >0){?> href="twoweek.php " onclick="window.open(this.href, 'child', 'scrollbars,width=1400,height=800'); return false" <?php } ?>><?php echo $rows1; ?> </a></div> </td>
    <td align="center" valign="middle"><div><a <?php if($rows2 >0){?>href="lessthanmonth.php "  onclick="window.open(this.href, 'child', 'scrollbars,width=1400,height=800'); return false"  <?php } ?> ><?php echo $rows2; ?> </a></div> </td>
    <td align="center" valign="middle"><div><a <?php if($rows3 >0){?> href="morethanmonth.php"  onclick="window.open(this.href, 'child', 'scrollbars,width=1400,height=800'); return false" <?php } ?>> <?php echo $rows3; ?> </a></div></td>
    <td align="center" valign="middle"><div><a <?php if($rowsall >0){?> href="totalletters.php"  onclick="window.open(this.href, 'child', 'scrollbars,width=1400,height=800'); return false" <?php } ?>><?php echo $rowsall; ?> </a>  </div></td>
  </tr>
</table>
    
 
    
   
  </div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>

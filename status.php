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
<div class="mastertitle">Status</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <div style="height:auto; width:auto;"> <br />
    <br />
    <br />
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="font-family:'Trebuchet MS'; font-size:13px; width:650px;">
      <tr style="background-color:#ffe77a;">
        <th height="29" align="center" valign="middle" ><div>Letters</div></th>
        <th align="center" valign="middle" ><div>No Action Taken</div></th>
        <th align="center" valign="middle" ><div style="width:180px; word-wrap:break-word;">Action Under Progress</div></th>
        <th align="center" valign="middle" ><div>Completed</div></th>
        <th align="center" valign="middle" ><div>Action Not Required</div></th>
        <th align="center" valign="middle" ><div>Total</div></th>
      </tr>
      <?php 

$noactiontaken = $user->noactiontaken();
$rows = mysql_num_rows($noactiontaken);

$actionunderprogress = $user->actionunderprogress();
$rows1 = mysql_num_rows($actionunderprogress);

$completed = $user->completed();
$rows2 = mysql_num_rows($completed);

$actionnotrequired = $user->actionnotrequired();
$rows3= mysql_num_rows($actionnotrequired);

$totalletters = $user->totalletters();
$rowsall = mysql_num_rows($totalletters);

 ?>
      <tr>
        <td height="25" align="center" valign="middle">Letters</td>
        <td align="center" valign="middle"><div><a <?php if($rows >0){?> href="noactiontaken.php" onClick="window.open(this.href, 'child', 'scrollbars,width=1400,height=800'); return false"  <?php } ?>><?php echo $rows; ?> </a></div></td>
        <td align="center" valign="middle"><div><a <?php if($rows1 >0){?> href="actionunderprogress.php " onClick="window.open(this.href, 'child', 'scrollbars,width=1400,height=800'); return false" <?php } ?>><?php echo $rows1; ?> </a></div></td>
        <td align="center" valign="middle"><div><a <?php if($rows2 >0){?>href="completed.php "  onclick="window.open(this.href, 'child', 'scrollbars,width=1400,height=800'); return false"  <?php } ?> ><?php echo $rows2; ?> </a></div></td>
        <td align="center" valign="middle"><div><a <?php if($rows3 >0){?> href="actionnotrequired.php"  onclick="window.open(this.href, 'child', 'scrollbars,width=1400,height=800'); return false" <?php } ?>> <?php echo $rows3; ?> </a></div></td>
        <td align="center" valign="middle"><div><a <?php if($rowsall >0){?> href="totalletters.php"  onclick="window.open(this.href, 'child', 'scrollbars,width=1400,height=800'); return false" <?php } ?>><?php echo $rowsall; ?> </a> </div></td>
      </tr>
    </table>
  </div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>

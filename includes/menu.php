<div class="container">
<div style="height:auto;">
<div id='cssmenu'>
  <ul>
    <li><a href='dashboard.php'><span>Home</span></a></li>
    <li class='has-sub'><a href='#'><span>Master</span></a>
      <ul>
        <li class='has-sub'><a href="castemaster.php">Caste Master</a></li>
        <li class='has-sub'><a href="religionmaster.php">Religion Master</a></li>
        <li class='has-sub'><a href="mandalmaster.php">Mandal Master</a></li>
        <li class='has-sub'><a href="villagemaster.php">Village/Ward Master</a></li>
        <li class='has-sub'><a href="divisionmaster.php">Division Master</a></li>
        <li class='has-sub'><a href="areamaster.php">Area Master</a></li>
        <li class='has-sub'><a href="positionmaster.php">Positions Master</a></li>
        <li class='has-sub'><a href="petitionmaster.php">Petition Request type</a></li>
        <li class='has-sub'><a href="petitionforwardmaster.php">Petition Forwarded to</a></li>
        <li class='has-sub'><a href="recievermaster.php">Letter Received from Master</a></li>
        <li class='has-sub'><a href="schememaster.php">Schemes Master</a></li>
        <li class='has-sub'><a href="worktypemaster.php">Work Type Master</a></li>
        <li class='has-sub'><a href="contractmaster.php">Contractor Master</a></li>
        <li class='has-sub'><a href="localitymaster.php">Locality Master</a></li>
        <li class='has-sub'><a href="statusmaster.php">Status Master</a></li>
        <li class='has-sub'><a href="eventmaster.php">Event Master</a></li>

      </ul>
    </li>
    <li class='has-sub'><a href='#'><span>Create New</span></a>
      <ul>
        <li class='has-sub'><a href="registration.php">Member</a></li>
        <li class='has-sub'><a href="petition.php">Petition</a></li>
        <li class='has-sub'><a href="letter.php">Letter</a></li>
        <li class='has-sub'><a href="workmgmt.php">Work</a></li>
        <li class='has-sub'><a href="eventmanager.php">Event Manager</a></li>
      </ul>
    </li>
    <li class='has-sub'><a href='#'><span>Reports</span></a>
      <ul>
        <li class='has-sub'><a href="reports.php">Members</a></li>
        <li class='has-sub'><a href="petitionreports.php">Petitions</a></li>
        <li class='has-sub active'><span><a href="#">Letter</a></span>
          <ul>
            <li class='has-sub'><a href="pendency.php">Pendency</a></li>
            <li class='has-sub'><a href="status.php">Status</a></li>
            <li class='has-sub'><a href="letterreport.php">Period Report</a></li>
          </ul>
        </li>
        <li class='has-sub'><a href="searchwork.php">Works</a></li>
        <li class='has-sub'><a href="eventreports.php">Events</a></li>
      </ul>
    </li>
<li class='has-sub'><a href="?q=logout">Sign out</a></li>
  </ul>
</div>
<div class="container">
<div style="float:right; margin-top:10px;">
  <div style="width:200px;" align="left">
    <h3 style="font-family:'Trebuchet MS'; margin:0px; padding:0px; color:#194081; font-size:14px;">Welcome:
      <?php
                $user->get_fullname($userid);
                ?>
    </h3>
  </div>
  
</div>

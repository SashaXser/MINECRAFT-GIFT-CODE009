<?php
require("header.php");

if(!checkAdmin()) {
die("<div class=\"box\">
    <h2>Administration Panel &bull; Access Denied</h2>
<div class=\"box-content\">
<p>You are not an administrator.</p>
</div></div>");
exit();
}

$query="SELECT * FROM logs ORDER BY DATE DESC";
$result=mysql_query($query);
$num=mysql_numrows($result);
?>

<div class="box">
    <h2>Attack Information</h2>
    <div class="box-content">
        <strong><center><img src="images/info.png"> <font color="white">Information:</font></strong> Newest attacks are shown at the top, most recent format.</center>
    </div>
</div>


<div class="box">
    <h2>Recent Attacks</h2>
    <div class="box-content">

<?php
$i=0;
while ($i < $num) {
?>


<center>
<table border="0" style="background-color:#000000" width="100%" cellpadding="1" cellspacing="2">
<tr>
<center>
<td><center><font color="#00CCFF"><b>Username</b></font></center></td>
<td><center><font color="#00CCFF"><b>DNS / IP</b></font></center></td>
<td><center><font color="#00CCFF"><b>Duration</b></font></center></td>
<td><center><font color="#00CCFF"><b>Port</b></font></center></td>
<td><center><font color="#00CCFF"><b>Date</b></font></center></td>
</center>
</tr>
<tr>

    <?php

$f1=mysql_result($result,$i,"username");
$f2=mysql_result($result,$i,"ip");
$f3=mysql_result($result,$i,"time");
$f4=mysql_result($result,$i,"port");
$f5=mysql_result($result,$i,"date");

?>

<?php echo "<tr><td><center>$f1</td><td><center>$f2</td><td><center>$f3</td><td><center>$f4</td><td><center>$f5</td><tr/>"; ?>

<?php
$i++;
}
?>
        
</div>
</tr>
</table>
    <?php
if($i == 0) {
   ?>
<div class="box">
<h2>No Logs Available</h2>
<div class="box-content">
<p>The logs are currently empty!</p>
</div>
</div>
   <?php
}

?>
</div>

</table>
<br>
</DIV>


<br>

<?php 
include 'footer.php';
?>
<?php
//$cnt=$_GET['cnt'];
//$nam=$_POST['nam'];
//if(!isset($cnt)){
if(empty($_GET['cnt'])){
$cnt=0;
$page=1;
}else{
$cnt=$_GET['cnt'];
$page=$_GET['page'];
$tmpCnt=$_GET['cnt']-5;
}
##$db = mysqli_connect("localhost","root","garuje");
$db = mysqli_connect("127.0.0.1","root","garuje","msdb2");

##$dbcnt = "msdb1";
##$dbcnt = "msdb1";
$sql0="SELECT * from mstb1";
$rs0=mysqli_query($db, $sql0);
##mysqli_set_charset("utf8");
##mysqli_set_charset("ujis");
mysqli_set_charset($db, "utf8");
$sql="SELECT * from mstb1 order by mstbc4 desc limit ".$cnt.",5";

$rs=mysqli_query($db,$sql);
?>
<html>
<head>
<<<<<<< Updated upstream
<title>一覧22</title>
=======
<title>一覧44</title>
>>>>>>> Stashed changes
</head>
<body bgcolor="#FFFFFF" text="#000000">
<table border="1" width="800">
<TR>
 <TD height="35" colspan="3" align="middle" bgcolor="#FFFFFF">
  <center/><B><FONT color="#000099">一覧2</FONT></B><br>
<a href='itiran.php'>TOP</a>|<a href='touroku.php'>新規</a>|<a href='kensaku.php'>検索2</a>
</TD>
</TR>
<tr bgcolor="#CCCCCC">
 <td width="20">ID</td><td width="400">タイトル</td><td>登録日時2</td>
</tr>
<?php
while($row=mysqli_fetch_array($rs)){
print("<tr><td>");
//print($row["mstbc1"]);
print("<a href='kousin.php?cnt=".$row["mstbc1"]."'>");
print($row["mstbc1"]);
print("</a></td>");
print("<td>");
print($row["mstbc2"]);
print("</td><td>");
print($row["mstbc4"]);
print("</td>");
//print($row["mstbc5"]);
//print("</td><td>");
//print($row["mstbc6"]);
print("</tr>");
print("<TR><TD colspan='5' align='left' bgcolor='#CCFFFF'>");
print(nl2br($row["mstbc3"]));
print("</td></tr>");
}
if(mysqli_num_rows($rs0)>5){
print("<tr><td colspan='5' align='middle'>");
$cnt=$cnt+5;
if($page>1){
$tmpPage=$page-1;
print("<a href='itiran.php?cnt=".$tmpCnt."&page=".$tmpPage."'>前へ</a>");
}
if(mysqli_num_Rows($rs0)>=5){
$tmpPage=$page+1;
print("<a href='itiran.php?cnt=".$cnt."&page=".$tmpPage."'>次へ</a>");
}
//print(mysqli_num_Rows($rs));
print("</td></tr>");
}
mysqli_close($db);
?>
</table>
</body>
</html>

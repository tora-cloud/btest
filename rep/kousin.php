<?php
//if(!isset($cnt)){
//header("Location: itiran.php");
//}
$db = mysqli_connect("localhost","root","garuje","msdb2");
mysqli_set_charset($db, "utf8");
//if (!isset($sbm) && !isset($sbn)){
if (empty($_POST['sbm']) && empty($_POST['sbn'])){
//$sql="SELECT * from mstb1 where mstbc1=".$cnt;
$sql="SELECT * from mstb1 where mstbc1=".$_GET['cnt'];
$rs=mysqli_Query($db,$sql);
$row = mysqli_fetch_assoc($rs);
//$sql1="SELECT * from msmt1";
//$rs1=mysql_db_Query('msdb1',$sql1);
//$row1 = mysql_fetch_assoc($rs1);
$bun=$row["mstbc6"]
?>
<html>
<head>
<title>更新・削除処理</title>
</head>
<body>
<form method="POST" action="kousin.php">
<table border="1">
<TR>
 <TD height="35" colspan="2" align="middle" bgcolor="#FFFFFF">
  <center/><B><FONT color="#000099">更新・削除</FONT></B><br>
<a href='itiran.php'>一覧画面へ</a>
 </TD>
</TR>
<tr>
<th align="right">ＩＤ：</th>
<td><input type="text" name="id" size="10" value="<?php print($row["mstbc1"])?>" readonly="readonly" style="background-color:#CFCFCF"></td>
</tr><tr>
<th align="right">名称：</th>
<td><input type="text" name="nam" size="20" value="<?php print($row["mstbc2"])?>"></td>
</tr>
<tr>
<th align="right">メモ：</th>
<td><textarea name="mem" cols="80" rows="20" value="<?php print($row["mstbc3"])?>"><?php print($row["mstbc3"])?></textarea></td>
</tr>
<tr>
<th align="right">分類：</th>
<td><select name="bun">
<?php
$sql1="SELECT * from msmt1";
$rs1=mysqli_Query($db,$sql1);

while($row1=mysqli_fetch_array($rs1)){
print("<option value=");
print($row1["msmtc1"]);
if($row1["msmtc1"] == $bun){
print(" selected");
}
print(">");
print($row1["msmtc1"]);
print(":");
print($row1["msmtc2"]);
print("</<option>");
}
?>
</select></td>
</tr>
<tr>
<th align="right">日時：</th>
<td><input type="text" name="dat" size="20" value="<?=$row["mstbc4"]?>" readonly="readonly" style="background-color:#CFCFCF">※新規登録日時</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="sbm" value="更新">
<input type="submit" name="sbn" value="削除">
</td>
</tr>
</table>
</form>
</body>
</html>
<?php
}else{
$id=$_POST['id'];
$nam=$_POST['nam'];
$mem=$_POST['mem'];
$dat=$_POST['dat'];
$bun=$_POST['bun'];
if(empty($_POST['sbn'])){
$dat2=Date("Y/m/d H:i:s");
$sql2="update mstb1 set mstbc2='".$nam."',mstbc3='".$mem."',mstbc5='".$dat2."',mstbc6=".$bun." where mstbc1=".$id;
$rs2=mysqli_Query($db,$sql2);
}else{
$sql3="delete from mstb1 where mstbc1=".$id;
$rs3=mysqli_Query($db,$sql3);
}
header("Location: itiran.php");
}
//page_close();
?>

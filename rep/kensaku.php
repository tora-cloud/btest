<html>
<head>
<title>検索テスト</title>
</head>
<body>
<form method="POST" action="kensaku.php">
<?php
$db = mysqli_connect("localhost","root","garuje","msdb2");
//$db=mysql_connect("localhost","root","garuje");

mysqli_set_charset($db, "utf8");
//mysqli_set_charset('ujis');
//if(!isset($sbm)){
if(empty($_POST['sbm'])){
?>
<table border="1" width="600">
        <tr>
           <TD height="35" colspan="2" align="middle" bgcolor="#FFFFFF">
           <center/><B><FONT color="#000099">検索</FONT></B><br><a href='itiran.php'>一覧画面へ</a></TD>
        </tr><tr>
                <th align="right">キーワード：</th>
                <td><input type="text" name="nam" size="10">※何も指定しない場合、全件検索となります。</td>
       </tr>
<tr>
                <th align="right">分類コード：</th>
                <td>
<select name="bun">
<option value="0" selected>0：分類なし</option>
<?php
//$db = mysqli_connect("localhost","root","garuje","msdb2");
$sql1="SELECT * from msmt1 order by msmtc1";
$rs1=mysqli_Query($db,$sql1);

while($row=mysqli_fetch_array($rs1)){
print("<option value=");
print($row["msmtc1"]);
print(">");
print($row["msmtc1"]);
print(":");
print($row["msmtc2"]);
print("</<option>");
}
?>
</select>
</td>
       </tr>

<tr>
                <td colspan="2" align="center">
                        <input type="submit" name="sbm" value="検索">
                        
                </td>
        </tr>
<?php
}else{
$nam=$_POST['nam'];
$bun=$_POST['bun'];

$db = mysqli_connect("localhost","root","garuje","msdb2");
//$db=mysql_connect("localhost","root","garuje");
        $sql="SELECT * FROM mstb1 WHERE (mstbc2 like '%".$nam."%' or mstbc3 like '%".$nam."%')";
if($bun!=0){
$sql.=" and mstbc6=".$bun."";
}
        mysqli_set_charset($db, "utf8");
        $rs=mysqli_Query($db,$sql);
?>
<table border="1" width="600">
 <tr>
           <TD height="35" colspan="2" align="middle" bgcolor="#FFFFFF">
           <center/><B><FONT color="#000099">検索</FONT></B><br><a href='itiran.php'>一覧画面へ</a></TD>
        </tr><tr>
                <th align="right">キーワード：</th>
                <td><input type="text" name="nam" size="10" value="<?php print $_POST["nam"]?>">
<input type="submit" name="sbm" value="検索">※何も指定しない場合、全件検索となります。</td>
        </tr>
<tr>
<th align="right">分類：</th>
<td>
<select name="bun">
<option value="0" selected>0：分類なし</option>
<?php
$sql1="SELECT * from msmt1 order by msmtc1";
$rs1=mysqli_Query($db,$sql1);

while($row1=mysqli_fetch_array($rs1)){
print("<option value=");
print($row1["msmtc1"]);
if($row1["msmtc1"] == $_POST["bun"]){
print(" selected");
}
print(">");
print($row1["msmtc1"]);
print(":");
print($row1["msmtc2"]);
print("</<option>");
}
?>
</select></td></tr>
<TR>
 <TD height="35" colspan="2" align="middle" bgcolor="#FFFFFF">
  <center/><B><FONT color="#000099">検索結果</FONT></B>
※タイトル若しくはメモ欄の文字列で検索します。
 </TD>
</TR>
<tr bgcolor="#CCCCCC">
 <td width="100">ID</td><td>タイトル</td>
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
print("</td>");
print("</tr><tr><td colspan='2' align='left' bgcolor='#CCFFFF'>");
print(nl2br($row["mstbc3"]));
print("</td></tr>");
}
}
?>
</table>
</form>
</body>
</html>

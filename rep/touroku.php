
<?php
 $db=mysqli_connect("localhost","root","garuje","msdb2");
mysqli_set_charset($db,'utf8');
$sql0="SELECT max(mstbc1) as aa from mstb1";
$rs0=mysqli_Query($db,$sql0);
$row0=mysqli_fetch_array($rs0);
$num=$row0["aa"]+1;
if(empty($_POST)){
?>
<html>
<head>
<title>新規登録</title>
</head>
<body>
<form method="POST" action="touroku.php">
<table border="1">
<TR>
 <TD height="35" colspan="2" align="middle" bgcolor="#FFFFFF">
  <center/><B><FONT color="#000099">新規登録</FONT></B><br>
<a href='itiran.php'>一覧画面へ</a>
 </TD>
</TR>
        <tr>
                <th align="right">ＩＤ：</th>
                <td><input type="text" name="id" size="10" value="<?php print($num)?>" readonly="readonly" style="background-color:#CFCFCF">※自動で採番します（主キー）</td>
        </tr><tr>
                <th align="right">名称：</th>
                <td><input type="text" name="nam" size="30">※タイトル</td>
        </tr>
<tr>
                <th align="right">メモ：</th>
                <td><textarea name="mem" cols="70" rows="20"></textarea></td>
        </tr>
<tr>
                <th align="right">分類：</th>
                <td><select name="bun">
<?php
$sql1="SELECT * from msmt1";
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
</select></td>
        </tr>
<tr>
                <th align="right">日付：</th>
                <td><input type="text" name="dat" size="20" value="<?=Date("Y/m/d H:i:s")?>">※新規登録日時</td>
        </tr>
<tr>
                <td colspan="2" align="center">
                        <input type="submit" name="sbm" value="登録">
                        <input type="reset" value="取消">
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
        $db=mysqli_connect("localhost","root","garuje","msdb2");
        $sql="SELECT * FROM mstb1 WHERE mstbc1=".$id;
        mysqli_set_charset($db, "utf8");
        $rs=mysqli_Query($db,$sql);
        if(mysqli_num_rows($rs)==0){
$sql2="INSERT INTO mstb1(mstbc1,mstbc2,mstbc3,mstbc4,mstbc6) VALUES(".$id.",'".$nam."','".$mem."','".$dat."',".$bun.")";
              $rs2=mysqli_Query($db,$sql2);
                header("Location: itiran.php");
        }else{
                print("すでに登録されています。登録処理に失敗しました");
        }
}
//page_close();
?>

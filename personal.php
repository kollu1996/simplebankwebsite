<?php
session_start();
?>
<!DOCTYPE html>
<html>
<style>
#sty4
{
 font-size:50px;
 text-align:center;
 padding:40px;
 background-color:maroon;
}
#sty3
{
 font-size:35px;
 text-align:center;
 background-color:maroon;
 padding:40px;
 margin:25%;
}
#sty7
{
 font-size:35px;
 text-align:center;
 background-color:maroon;
 padding:40px;
 margin:25%;
}
#sty5
{
background-color:maroon;
padding:40px;
margin:25%;
font-size:40px;
}
#btnHome
{
background-color:maroon;
padding:40px;
text-align:center;
font-size:50px;
}
</style>
<body>
<div id="sty4">
<?php
echo "HI \r" . $_SESSION["greeting"] . ".<br>";
$name = $_SESSION["greeting"];
$_SESSION["sessvar"]=$name;
?>
</div>
<div  id="sty5" >
<?php
$servername="localhost";
 $username="root";
 $password="12345";
 $dbname="bank";
 $conn=mysqli_connect($servername, $username, $password, $dbname); 
 if(!$conn)
 {
   die ("error in creating database".mysqli_connect_error( ));
 }
$nam = $_SESSION["sessvar"];
$sql = "select * from secrete where username = '$nam'";

echo "Your balance in rupees:\r"; 
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
       $res = $row["balance"];
         echo $res;
    }

mysqli_close($conn);
?>
</div>
<div id="sty3">
<h1> Want to deposit money </h1>
<form method="post" action="personal1.php">
 DEPOSIT: <br> <br><input type="text" name="deposit">
 <br><br>
 <input type="submit" value="Submit">
</form>
</div>

<div id="sty7">
<h1> Want to withdraw money </h1>
<form method="post" action="personal2.php">
  WITHDRAW : <br> <br><input type="text" name="withdraw">
 <br><br>
 <input type="submit" value="Submit">
</form>
</div>
</div>
<input type="button" value="LOGOUT" id="btnHome" 
onClick="document.location.href='second.html'" />
</body>
</html>

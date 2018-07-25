<?php
session_start();
$servername="localhost";
 $username="root";
 $password="12345";
 $dbname="bank";
 $conn=mysqli_connect($servername, $username, $password, $dbname); 
 if(!$conn)
 {
   die ("error in creating database".mysqli_connect_error( ));
 }
 if(isset($_POST["withdraw"]))
 $withdraw=$_POST["withdraw"];
 $uname = $_SESSION["greeting"];
$sql = "select * from secrete where username = '$uname'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
       $res = $row["balance"];
        if($res>$withdraw)
         $res1 = $res-$withdraw;
        echo $res1;
      }
$sql1 = "update secrete set balance = $res1 where username = '$uname'";
if ($conn->query($sql1) === TRUE) {
   Header("Location: personal.php");
} else {
    echo "Error updating record: " . $conn->error;
}

mysqli_close($conn);
?>

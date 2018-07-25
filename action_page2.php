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
 echo "database connected sucessfully";

$uname = $_POST['username']; 
$pass = $_POST['password'];
 $_SESSION["greeting"] = "$uname";

$sql = "SELECT * FROM secrete
            WHERE username = '$uname'
            AND password = $pass"; 

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of user
    $row = mysqli_fetch_assoc($result);
    $dbusername = $row['username'];
    $dbpassword = $row['password'];
    //check to see if the match
    if($uname == $dbusername && $pass == $dbpassword ) { 
        Header("Location: personal.php");
    } if($uname != $dbusername || $pass != $dbpassword) {
        echo "Incorrect password or username!";
    }

} 

else {
        die("That user doesn't exist!");
}
mysqli_close($conn);
?>

 <?php
 $servername="localhost";
 $username="root";
 $password="12345"; //this is your server password whch u created when installing
 $dbname="bank";
 $conn=mysqli_connect($servername, $username, $password, $dbname); 
 if(!$conn)
 {
   die ("error in creating database".mysqli_connect_error( ));
 }
 echo "database connected sucessfully";

if(isset($_POST["firstname"]))
 $firstname=$_POST["firstname"];
 if(isset($_POST["secondname"]))
 $secondname=$_POST["secondname"];
 if(isset($_POST["gender"]))
 $gender=$_POST["gender"];
if(isset($_POST["mobile"]))
 $mobile=$_POST["mobile"];
if(isset($_POST["username"]))
 $username=$_POST["username"];
if(isset($_POST["password"]))
 $password=$_POST["password"];
 $balance = 0;

$sql = "INSERT INTO MyGuests
VALUES ('$firstname', ' $secondname', ' $gender', '$mobile')";
$sql1= "INSERT INTO secrete
VALUES ('$username', ' $password', '$balance')";

if (mysqli_query($conn, $sql)) {
   
if (mysqli_query($conn, $sql1)) {
    echo "login successful". "<br>";
    }
  }
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
  mysqli_close($conn);
 ?>
 

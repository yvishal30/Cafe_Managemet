<?php
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$c_password=$_POST['confirm-password'];


$conn=mysqli_connect("localhost","root","","restaurant") or die("Connection error");
$sql= "INSERT INTO register(username,email,password,confirm_password) values('{$username}','{$email}','{$password}','{$c_password}')";
$result=mysqli_query($conn,$sql) or die("query unsuccessful.");

header("Location: http://localhost:800/Cafe_Management/login.php");

mysqli_close($conn);
 ?>

<?php
session_start();
include "config.php";

if(isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
$result=$conn->query($sql);

if($result->num_rows>0){
$row=$result->fetch_assoc();
$_SESSION['user_id']=$row['id'];
header("Location: dashboard.php");
}else{
echo "Invalid Login";
}
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Expense Tracker Login</h2>

<form method="POST">

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>

<p>New user? <a href="register.php">Register</a></p>

</form>
</div>
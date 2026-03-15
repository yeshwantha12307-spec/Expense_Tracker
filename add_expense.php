<?php
session_start();
include "config.php";

$user_id=$_SESSION['user_id'];

if(isset($_POST['add'])){
$amount=$_POST['amount'];
$category=$_POST['category'];
$date=$_POST['date'];
$description=$_POST['description'];

$sql="INSERT INTO expenses(user_id,amount,category,date,description)
VALUES('$user_id','$amount','$category','$date','$description')";

$conn->query($sql);

echo "Expense Added";
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Add Expense</h2>

<form method="POST">

<input type="number" name="amount" placeholder="Amount" required>

<select name="category">
<option>Food</option>
<option>Travel</option>
<option>Shopping</option>
<option>Bills</option>
<option>Other</option>
</select>

<input type="date" name="date" required>

<input type="text" name="description" placeholder="Description">

<button name="add">Add Expense</button>

</form>

<br>
<a href="dashboard.php">Back</a>

</div>
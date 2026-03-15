<?php
session_start();
include "config.php";

$user_id=$_SESSION['user_id'];

$result=$conn->query("SELECT * FROM expenses WHERE user_id='$user_id'");
?>

<link rel="stylesheet" href="style.css">

<div class="container">

<h2>Expense List</h2>

<table border="1" width="100%">
<tr>
<th>Amount</th>
<th>Category</th>
<th>Date</th>
<th>Description</th>
<th>Action</th>
</tr>

<?php while($row=$result->fetch_assoc()){ ?>

<tr>
<td><?php echo $row['amount']; ?></td>
<td><?php echo $row['category']; ?></td>
<td><?php echo $row['date']; ?></td>
<td><?php echo $row['description']; ?></td>

<td>
<a style="background:red;color:white;padding:5px;border-radius:4px;" 
href="delete_expense.php?id=<?php echo $row['id']; ?>">Delete</a>

</tr>

<?php } ?>

</table>

<br>
<a href="dashboard.php">Back</a>

</div>
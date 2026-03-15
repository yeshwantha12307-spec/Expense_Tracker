<?php
session_start();
include "config.php";

if(!isset($_SESSION['user_id'])){
header("Location: index.php");
}

$user_id=$_SESSION['user_id'];

/* Total Expense */
$result=$conn->query("SELECT SUM(amount) as total FROM expenses WHERE user_id='$user_id'");
$row=$result->fetch_assoc();
$total=$row['total'];

/* Chart Data */
$data = $conn->query("SELECT category, SUM(amount) as total FROM expenses WHERE user_id='$user_id' GROUP BY category");

$categories=[];
$amounts=[];

while($row = $data->fetch_assoc()){
$categories[] = $row['category'];
$amounts[] = $row['total'];
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link rel="stylesheet" href="style.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

.dashboard-box{
background:#007bff;
color:white;
padding:15px;
border-radius:8px;
margin-bottom:20px;
}

.chart-box{
margin-top:20px;
}

</style>

</head>

<body>

<div class="container">

<h2>Expense Tracker Dashboard</h2>

<div class="dashboard-box">
<h3>Total Expense: ₹ <?php echo $total ? $total : 0; ?></h3>
</div style="margin:15px 0;">>

<a href="add_expense.php">Add Expense</a>

<a href="view_expense.php">View Expenses</a>

<a style="background:red;" href="logout.php">Logout</a>

<div class="chart-box">

<h3>Expense Chart</h3>

<canvas id="expenseChart"></canvas>

</div>

</div>

<script>

const ctx = document.getElementById('expenseChart');

new Chart(ctx, {
type: 'pie',
data: {
labels: <?php echo json_encode($categories); ?>,
datasets: [{
label: 'Expenses',
data: <?php echo json_encode($amounts); ?>,
backgroundColor: [
'#ff6384',
'#36a2eb',
'#ffcd56',
'#4bc0c0',
'#9966ff'
]
}]
}
});

</script>

</body>
</html>
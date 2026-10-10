<?php
$error_message = '';
include 'process.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate House Electricity Bill</title>
</head>
<h1>Calculate House Electricity Bill</h1>

<style>
    label {
        width: 100px;
    }
</style>

<table border="1" style="margin-bottom: 30-px;">
    <tr>
        <th>Block Tariff (per month)</th>
        <th>Unit</th>
        <th>Rate</th>
    </tr>
<tr>
    <td>For the first 200 kWh (1-200 kWh) per month</td>
    <td>sen/kWh</td>
    <td>0.218</td>
</tr>

<tr>
    <td>For the next 100 kWh (201 - 300 kWh) per month</td>
    <td>sen/kWh</td>
    <td>0.344</td>
</tr>

<tr>
    <td>For the next 300 kWh (301 - 600 kWh) per month</td>
    <td>sen/kWh</td>
    <td>0.516</td>
</tr>

<tr>
    <td>For the next 300 kWh (601 - 900 kWh) per month</td>
    <td>sen/kWh</td>
    <td>0.546</td>
</tr>

<tr>
    <td>For the next kWh (901 kWh onwards) per month</td>
    <td>sen/kWh</td>
    <td>0.571</td>
</tr>

<tr>
    <td colspan="3">The minimum monthly chafe is RM300</td>
</tr>
</table>

<?php
if ($error_message !== '') {
    echo "<p style='color: red;'>" . htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8') . "</p>";
}
?>

<form method="post">
    <label for="">Enter your first 200 kWh (1-200 kWh) per month :</label>
    <input type="number" name="first" value="200" placeholder="200kWh"><br>
       
    <label for="">Enter next 100 kWh (201 - 300 kWh) per month :</label>
    <input type="number" name="second" value="100" placeholder="100kWh"><br>
      
    <label for="">Enter next 300 kWh (301 – 600 kWh) per month :</label>
    <input type="number" name="third" value="300" placeholder="300kWh"><br>
      
    <label for="">Enter next 300 kWh (601 - 900 kWh) per month :</label>
    <input type="number" name="fourth" value="180" placeholder="180kWh"><br>

    <label for="">Enter remaining kWh (901 kWh onwards) per month :</label>
    <input type="number" name="fifth" value="0" placeholder="0kWh"><br>
    
    <label for="">Estimated Bill : </label>
    <input type="submit" name="calculate" value="Calculate">
    
    <input type="submit" name="reset" value="Reset">
</form>

<body>
    
</body>
</html>

<?php
if ($showBill) {
    echo "<h2>Estimated Bill</h2>";

    echo "<p>First 200 kWh: RM" .$charge1 . "</p>";
    echo "<p>Next 100 kWh: RM" . $charge2 . "</p>";
    echo "<p>Next 300 kWh: RM" . $charge3 . "</p>";
    echo "<p>Next 300 kWh: RM" . $charge4 . "</p>";
    echo "<p>Remaining kWh: RM" .$charge5 . "</p>";

    echo "<p>Total kWh used: " . number_format($totalkwh, 2) . "</p>";
    echo "<h3>Total Charge: RM" . number_format($totalCharge, 2) . "</h3>";
}
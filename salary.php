<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Salary Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #e9ffe9;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Employee Salary Calculator</h1>

    <form method="post">
        <label for="employeeName">Employee Name:</label>
        <input type="text" id="employeeName" name="employeeName" required>

        <label for="dailyRate">Daily Rate (₱):</label>
        <input type="number" id="dailyRate" name="dailyRate" required>

        <label for="daysPresent">Days Present:</label>
        <input type="number" id="daysPresent" name="daysPresent" required>

        <label for="daysAbsent">Days Absent:</label>
        <input type="number" id="daysAbsent" name="daysAbsent" required>

        <button type="submit">Calculate Salary</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $employeeName = htmlspecialchars($_POST['employeeName']);
        $dailyRate = floatval($_POST['dailyRate']);
        $daysPresent = intval($_POST['daysPresent']);
        $daysAbsent = intval($_POST['daysAbsent']);

        // Calculate salary
        $totalDays = $daysPresent + $daysAbsent;
        if ($totalDays == 30) {
            $salary = $daysPresent * $dailyRate;
        } else {
            $salary = ($daysPresent - $daysAbsent) * $dailyRate;
        }

        // Display result
        echo "<div class='result'>";
        echo "<h2>Salary Details for {$employeeName}</h2>";
        echo "Total Days Rendered: {$totalDays}<br>";
        echo "Days Present: {$daysPresent}<br>";
        echo "Days Absent: {$daysAbsent}<br>";
        echo "Calculated Monthly Salary: ₱" . number_format($salary, 2) . "<br>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>

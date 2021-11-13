<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/utils.css">
    <link rel="icon" href="./images/Bank.png">
</head>
<body>
    <header>
        <!-- Nav Bar -->
        <nav>
            <div class="logo">
                <img src="./images/Bank.png" alt="">
            </div>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./customers.php">Customers</a></li>
                <li><a href="./transfer.php">Transfer</a></li>
            </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <?php
            include "./connection.php";
            // creating connection with database
            $sql = "SELECT * FROM `transactionhistory`";
            $result = mysqli_query($conn, $sql);
            echo "<table class='table table-hover table-dark'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>S.No.</th>";
            echo "<th scope='col'>Sender</th>";
            echo "<th scope='col'>Receiver</th>";
            echo "<th scope='col'>Amount</th>";
            echo "<th scope='col'>Date & Time</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<th scope='row'>" . $i . "</th>";
                echo "<td>" . $row['sender'] . "</td>";
                echo "<td>" . $row['receiver'] . "</td>";
                echo "<td>" ."&#8377;". $row['amount'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "</tr>";
                $i += 1;
            }
            echo "</table>";
            ?>
        </div>
    </main>
    <!-- Footer -->
    <footer class="flex-all-center">
        <p>Copyright &copy; 2021 All rights reserved | Banking System</p>
    </footer>
</body>

</html>
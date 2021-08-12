<?php
include "connection.php";
if (isset($_GET['id'])) {
    echo $_GET['id'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sendername = $_POST['sendername'];
    $receivername = $_POST['receivername'];
    $amount = $_POST['amount'];
    $sql = "SELECT * FROM `customers` WHERE `name`='$sendername'";
    $result = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($result);

    $sql = "SELECT * FROM `customers` WHERE `name`='$receivername'";
    $result1 = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($result1);

    //check for the negative value of the amount
    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Negative values are not allowed")';
        echo '</script>';
    }
    //check for whether the user has sufficient balance or not
    else if ($amount > $sql1['balance']) {
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")';
        echo '</script>';
    }

    //check for the amount should be non-zero
    else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Zero value cannot be transferred')";
        echo "</script>";
    } 
    // Updating the balance for both sender and receiver
    else {

        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE `customers` SET balance=$newbalance WHERE `name`='$sendername'";
        mysqli_query($conn, $sql);


        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE `customers` SET balance=$newbalance WHERE `name`='$receivername'";
        mysqli_query($conn, $sql);


        $sql = "INSERT INTO transactionhistory(`sender`, `receiver`, `amount`) VALUES ('$sendername','$receivername','$amount')";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Transaction Successful');
                             window.location='transactionHistory.php';
                   </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utils.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="images/Bank.png" alt="logo" style="box-sizing: content-box;">
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="customers.php">Customers</a></li>
                <li><a href="transfer.php">Transfer</a></li>
            </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <h1 align="center">Transfer Money</h1>
            <form action="transfer.php" method="post">To
                <select name="receivername" id="receievername" class="form-select" aria-label="Default select example">
                    <option disabled selected>Select Name</option>
                    <?php
                    include "connection.php";
                    $records = mysqli_query($conn, "SELECT * From customers");
                    while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['name'] . "'>" . $data['name'] . " (Balance:" . $data['balance'] . ")" . "</option>";
                    }
                    ?>
                </select>
                From
                <select name="sendername" id="sendername" class="form-select" aria-label="Default select example">
                    <option disabled selected>Select Name</option>
                    <?php
                    include "connection.php";
                    $records = mysqli_query($conn, "SELECT * From customers");
                    while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['name'] . "'>" . $data['name'] . " (Balance:" . $data['balance'] . ")" . "</option>";
                    }
                    ?>
                </select>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="amount" placeholder="Enter the Amount" name="amount">
                </div>
                <div class="text-center"><button type="submit" class="btn btn-primary">Submit</button></div>
        </div>
        </form>
        </div>
    </main>
    <footer class="flex-all-center">
        <p>Copyright &copy; 2021 All rights reserved | Banking System</p>
    </footer>
</body>

</html>
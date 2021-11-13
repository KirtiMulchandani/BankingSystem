<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>
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
                <a href="./transfer.php"><img src="./images/Bank.png" alt="logo"></a>
            </div>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./customers.php">Customers</a></li>
                <li><a href="./transfer.php">Transfer</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <!-- Cards -->
            <div class="card-group">
                <!-- View all coustomers -->
                <div class="card">
                    <img class="card-img-top" src="./images/2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <div class="card-body text-center">
                            <a href="./customers.php" class="btn btn-primary ">View All customers</a>
                        </div>
                    </div>
                </div>
                <div class="card ">
                    <!-- Make transaction -->
                    <img class="card-img-top" src="./images/1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <div class="card-body text-center">
                            <a href="./transfer.php" class="btn btn-primary ">Transfer Money</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <!-- Transaction History -->
                    <img class="card-img-top" src="./images/3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <div class="card-body text-center">
                            <a href="./transactionHistory.php" class="btn btn-primary ">Transaction History</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer class="flex-all-center">
        <p>Copyright &copy; 2021 All rights reserved | Banking System</p>
    </footer>
</body>
</html>
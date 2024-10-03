<?php
$prices = [
    "jati" => 15100200,
    "merbau" => 7510500,
    "bengkirai" => 4515300,
    "kamper" => 3419100,
    "mahoni" => 6122900,
    "ulin" => 10000100,
];

$product = isset($_GET['product']) ? $_GET['product'] : '';
$quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 0;
$totalPrice = isset($prices[$product]) ? $prices[$product] * $quantity : 0;
$payment = isset($_GET['payment']) ? (int)$_GET['payment'] : 0;

if ($payment < $totalPrice) {
    header("Location: invalid.html");
    exit;
}

$change = $payment - $totalPrice;

$nominal = [100000, 50000, 20000, 10000, 5000, 2000, 1000, 500, 200, 100];

// Calculate the number of each moneyChangeYesYesYes
$changeBreakdown = [];
$remainingChange = $change;

foreach ($nominal as $moneyChangeYesYesYes) {
    $changeBreakdown[$moneyChangeYesYesYes] = intdiv($remainingChange, $moneyChangeYesYesYes);
    $remainingChange %= $moneyChangeYesYesYes;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
          <a class="navbar-brand text-hover-scale tuwingtuwing" href="index.html">123230230</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link text-hover-scale" aria-current="page" href="index.html">Catalogue</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-hover-scale" href="order.html">Order</a>
                </li>
                  <li class="nav-item">
                      <a class="nav-link active text-hover-scale" href="payment.html">Payment</a>
                  </li>
              </ul>
          </div>
      </div>
    </nav>

    <div class="container mt-3 shadow border bg-secondary-subtle">
        <h1 class="text-center">Payment Successful!</h1>
        <p class="text-center">Please return to the order form and check your order.</p>

        <table class="table table-bordered shadow tuwingtuwing">
            <tbody>
                <tr>
                    <td><strong>Total Price</strong></td>
                    <td>Rp. <?php echo number_format($totalPrice, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td><strong>Paid</strong></td>
                    <td>Rp. <?php echo number_format($payment, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td><strong>Change</strong></td>
                    <td>Rp. <?php echo number_format($change, 0, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>

        <h3>Change Breakdown</h3>
        <table class="table table-bordered shadow tuwingtuwing">
            <thead>
                <tr>
                    <th>Nominal</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nominal as $moneyChangeYesYesYes): ?>
                <tr>
                    <td>Rp. <?php echo number_format($moneyChangeYesYesYes, 0, ',', '.'); ?></td>
                    <td><?php echo $changeBreakdown[$moneyChangeYesYesYes]; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-center">
            <a href="order.html" class="btn btn-primary tuwingtuwing">Return to Order</a>
        </div>
    </div>

    <footer class="footer bg-dark text-center fixed-bottom py-2 text-light">
      <div class="container">
          <span>&copy;2024</span>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>

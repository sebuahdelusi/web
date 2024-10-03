<?php
$name = isset($_GET['name']) ? $_GET['name'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$address = isset($_GET['address']) ? $_GET['address'] : '';
$product = isset($_GET['product']) ? $_GET['product'] : '';
$quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 0;

$prices = [
    "jati" => 15100200,
    "merbau" => 7510500,
    "bengkirai" => 4515300,
    "kamper" => 3419100,
    "mahoni" => 6122900,
    "ulin" => 10000100,
];

$totalPrice = isset($prices[$product]) ? $prices[$product] * $quantity : 0;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Joy Industry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
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

        <h2 class="text-center">Confirm Payment</h2>
        <div class="container mt-3 border shadow w-50">
            <div class="row mt-4">
                <div class="col-md-6">
                    <h5 class="border bg-secondary-subtle py-2">Recipient Information</h5>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
                    <p><strong>Email address:</strong> <?php echo htmlspecialchars($email); ?></p>
                    <p><strong>Address:</strong> <?php echo htmlspecialchars($address); ?></p>
                </div>
                <div class="col-md-6">
                    <h5 class="border bg-secondary-subtle py-2">Order Details</h5>
                    <p><strong>Product:</strong> <?php echo ucfirst(htmlspecialchars($product)); ?></p>
                    <p><strong>Price:</strong> Rp. <?php echo number_format($prices[$product]); ?> IDR</p>
                    <p><strong>Quantity:</strong> <?php echo htmlspecialchars($quantity); ?></p>
                </div>
            </div>

            <div class="bg-dark text-light py-2">
                <h4>Total Price</h4>
                <h2>Rp. <?php echo number_format($totalPrice); ?></h2>
            </div>

            <h5 class="mt-4">Pay Amount</h5>
            <form method="GET" action="change.php">
                <div class="mb-3">
                    <input type="number" id="payment" name="payment" class="form-control" required placeholder="Rp. <?php echo number_format($totalPrice); ?> recommended" min="<?php echo $totalPrice; ?>">
                    <input type="hidden" name="product" value="<?php echo htmlspecialchars($product); ?>">
                    <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
                    <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
                </div>
                <div class="d-flex justify-content-between pb-2">
                    <button type="submit" class="btn btn-primary w-50">Confirm</button>
                    <button type="button" class="btn btn-danger w-50" onclick="window.location.href='order.html'">Cancel</button>
                </div>
            </form>
        </div>

        <footer class="footer bg-dark text-center fixed-bottom py-2 text-light">
            <div class="container">
                <span>&copy;2024</span>
            </div>
        </footer>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>

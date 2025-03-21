<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SmartNet</title>
    <!--Render all elements normally-->
    <link rel="stylesheet" href="css/normalize.css" />
    <!--Font Awseome-->
    <link rel="stylesheet" href="css/all.min.css" />
    <!--Main template css file-->
    <link rel="stylesheet" href="css/dashboard.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+IN:wght@100..400&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dut839epn/image/upload/f_auto,q_auto/mwlldu11prcamv90qmul" />
    <script src="adminPanel.js"></script>
</head>

<body>
    <?php
    $donations = $conn->prepare("SELECT SUM(dt_amount) as totalDonations FROM donations");
    $donations->execute();
    $totalAmount = (($donations->get_result())->fetch_assoc())["totalDonations"];
    $donations_today = $conn->prepare("SELECT SUM(dt_amount) as totalDonations_today FROM donations WHERE DAY(dt_date)=DAY(NOW())");
    $donations_today->execute();
    $totalDonations_today = (($donations_today->get_result())->fetch_assoc())["totalDonations_today"];
    $totalDonors = $conn->prepare("SELECT COUNT(DISTINCT dt_email) as totalDonors FROM donations");
    $totalDonors->execute();
    $totalDonors_count = (($totalDonors->get_result())->fetch_assoc())["totalDonors"];
    ?>
    <div id="donations" class="donations">
        <h1>Donations</h1>
        <div class="card-section">
            <div class="card">
                <h3>Total donation</h3>
                <p><?= $totalAmount ?? 0 ?>$</p>
                <i class="fa-solid fa-hand-holding-dollar"></i>
            </div>
            <div class="card">
                <h3>Donations Today</h3>
                <p><?= $totalDonations_today ?? 0 ?>$</p>
                <i class="fa-solid fa-money-bill-trend-up"></i>
            </div>
            <div class="card">
                <h3>Total Donors</h3>
                <p><?= $totalDonors_count ?? 0 ?></p>
                <i class="fa-solid fa-users"></i>
            </div>
        </div>
        <div class="dt-details">
            <div class="recent-dt">
                <h2>Recent Donations</h2>
                <table border="3">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Payment Methode</th>
                        </tr>
                    </thead>
                    <?php
                    $dt_qeury = $conn->prepare("SELECT * FROM donations ORDER BY dt_id DESC");
                    $dt_qeury->execute();
                    $res = $dt_qeury->get_result();
                    while ($dt = $res->fetch_assoc()) {
                    ?>
                        <tr>
                            <td title="Full Name :"><?php echo ($dt["dt_fullname"]) ?></td>
                            <td title="Email :"><?php echo ($dt["dt_email"]) ?></td>
                            <td title="Date :"><?php echo ($dt["dt_date"]) ?></td>
                            <td title="Amount :"><?php echo ($dt["dt_amount"] . "$") ?></td>
                            <td title="Payment Method :"><?php echo ($dt["dt_paymethode"]) ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="top-dt">
            </div>
        </div>
    </div>
</body>

</html>
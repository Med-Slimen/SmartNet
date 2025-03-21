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
    $events_c = $conn->prepare("SELECT COUNT(id_events) as totalEvents FROM events");
    $events_c->execute();
    $totalEvents = (($events_c->get_result())->fetch_assoc())["totalEvents"];
    $reports_c = $conn->prepare("SELECT COUNT(id_report) as totalreports FROM reports");
    $reports_c->execute();
    $totalreports = (($reports_c->get_result())->fetch_assoc())["totalreports"];
    ?>
    <div id="dashboard" class="dashboard">
        <h2>Dashboard</h2>
        <div class="card-section">
            <div class="card">
                <p><?= $totalAmount ?? 0 ?>$</p>
                <h3>Total donation</h3>
                <i class="fa-solid fa-hand-holding-dollar"></i>
            </div>
            <div class="card">
                <p>360kg</p>
                <h3>Total garbage collected</h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" style="fill: black">
                    <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
                </svg>
            </div>
            <div class="card">
                <p><?= $totalEvents ?></p>
                <h3>Active events</h3>
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div class="card">
                <p><?= $totalreports ?></p>
                <h3>Valleys Reports</h3>
                <i class="fa-solid fa-file-circle-exclamation"></i>
            </div>
        </div>
        <div class="activity-section">
            <div class="recent-activity">
                <h3>Recent Activiy</h3>
                <div class="activity">
                    <table border="3" style="width: 100%; text-align: left">
                        <thead>
                            <tr>
                                <th style="width: 65px;">Id</th>
                                <th>Activiy type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <?php
                        $query = $conn->prepare("SELECT* FROM recent_activity ORDER BY activity_id DESC");
                        $query->execute();
                        $res = $query->get_result();
                        $i = 0;
                        while ($act = $res->fetch_assoc()) {
                            $i++;
                        ?>
                            <tr>
                                <td title="Id :"><?php echo $i ?></td>
                                <td title="Activiy type :"><i style="font-size: 25px;margin-right:20px;" class="<?php echo ($act["activity_icon"]) ?>"></i><?php echo ($act["activity_type"]) ?></td>
                                <td title="Description :"><?php echo ($act["activity_description"]) ?></td>
                            </tr>
                        <?php
                            if ($i == 10) {
                                break;
                            }
                        }
                        ?>

                    </table>
                </div>
            </div>
            <!-- <div class="map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7638.011914274737!2d10.608915358465138!3d36.399796709139025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2stn!4v1739750161883!5m2!1sen!2stn"
              width="600"
              height="380"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div> -->
        </div>
    </div>
</body>

</html>
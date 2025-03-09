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
    <div id="reports" class="reports">
        <h1>Reports</h1>
        <div class="reports-list">
            <table border="3">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Issue Type</th>
                        <th>Description</th>
                        <th>Attached Photo</th>
                    </tr>
                </thead>
                <?php
                $rp_qeury = $conn->prepare("SELECT * FROM reports");
                $rp_qeury->execute();
                $res = $rp_qeury->get_result();
                while ($rp = $res->fetch_assoc()) {
                ?>
                    <tr>
                        <td title="Full Name :">
                            <?php echo ($rp["report_fullname"]) ?>
                        </td>
                        <td title="Email :">
                            <?php echo ($rp["report_email"]) ?>
                        </td>
                        <td title="Location :"><?php echo ($rp["report_location"]) ?></td>
                        <td title="Issue Type :"><?php echo ($rp["report_issue_type"]) ?></td>
                        <td title="Description :"><?php echo ($rp["report_description"]) ?></td>
                        <td title="Attached Photo :"><button id="showimg" onclick="showImg('<?php echo ($rp['report_img']) ?>')">Show Image</button></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <div class="imgShow">
                <i class="fa-solid fa-xmark xmark" onclick="hideImg()"></i>
                <p id="noimg"></p>
                <img id="attachedPhoto" src="">
            </div>
        </div>
    </div>
</body>

</html>
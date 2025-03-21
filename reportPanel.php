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
            <?php
            $rp_qeury = $conn->prepare("SELECT * FROM reports ORDER BY id_report DESC");
            $rp_qeury->execute();
            $res = $rp_qeury->get_result();
            while ($rp = $res->fetch_assoc()) {
            ?>
                <div class="box">
                    <div class="text">
                        <i class="fa-solid fa-envelope"></i>
                        <span>Report From <?php echo ($rp["report_fullname"]) ?> </span>
                    </div>
                    <div class="button">
                        <button onclick="showReport('<?php echo ($rp['report_fullname']) ?>','<?php echo ($rp['report_email']) ?>','<?php echo ($rp['report_location']) ?>','<?php echo ($rp['report_issue_type']) ?>','<?php echo ($rp['report_description']) ?>','<?php echo ($rp['report_img']) ?>')">More Details</button>
                        <button id="delbtn" onclick="showConf('<?php echo ($rp['id_report']) ?>','idReport')" class="delbt">
                            Delete
                        </button>

                    </div>
                </div>
            <?php
            }
            ?>
            <div class="imgShow">
                <i class="fa-solid fa-xmark xmark" onclick="hideImg()"></i>
                <p id="noimg"></p>
                <img id="attachedPhoto" src="">
            </div>
            <div class="box-details">
                <i class="fa-solid fa-xmark xmark" onclick="hideReport()"></i>
                <h1>Feedback</h1>
                <div class="text">
                    <p>Full Name :</p>
                    <span id="report_fullname"></span>
                    <p>Email :</p>
                    <span id="report_email"></span>
                    <p>Location :</p>
                    <span id="report_location"></span>
                    <p>Issue Type :</p>
                    <span id="report_issue_type"></span>
                    <p>Description :</p>
                    <span id="report_description"></span><br>
                </div>
                <div class="button">
                    <button id="showimg" img_src="" onclick="showImg()">Show Image</button>
                    <button id="reply" onclick="showReply()">Reply</button>
                </div>
            </div>
            <div id="delete-conf" class="delete-conf">
                <h2>Are you sure ?</h2>
                <div class="choice">
                    <a id="no" href="#">
                        <h3>No</h3>
                    </a>
                    <form action="deleteReport.php" method="post">
                        <input type="hidden" id="idReport" name="id_report" />
                        <input type="submit" id="yes" value="Yes" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
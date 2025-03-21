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
    <div id="contact" class="contact">
        <h1>Contact List</h1>
        <div class="contact-list">
            <?php
            $ct_qeury = $conn->prepare("SELECT * FROM contact ORDER BY id_contact DESC");
            $ct_qeury->execute();
            $res = $ct_qeury->get_result();
            if ($res->num_rows > 0) {
                while ($ct = $res->fetch_assoc()) {
            ?>
                    <div class="box">
                        <div class="text">
                            <i class="fa-solid fa-envelope"></i>
                            <span>Feedback From <?php echo ($ct["contact_fullname"]) ?> </span>
                        </div>
                        <div class="button">
                            <button onclick="showFeedback('<?php echo ($ct['contact_fullname']) ?>','<?php echo ($ct['contact_email']) ?>','<?php echo ($ct['contact_description']) ?>')">More Details</button>
                            <button id="delbtn" onclick="showConf('<?php echo ($ct['id_contact']) ?>','idContact')" class="delbt">
                                Delete
                            </button>

                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="noContact">
                    <h2 style="text-align: center; margin-top:50px;">There is no Feedback at the moment</h2>
                </div>
            <?php
            }
            ?>
            <div class="box-details">
                <i class="fa-solid fa-xmark xmark" onclick="hideFeedback()"></i>
                <h1>Feedback</h1>
                <div class="text">
                    <p>Full Name :</p>
                    <span id="contact_fullname"></span>
                    <p>Email :</p>
                    <span id="contact_email"></span>
                    <p>Message :</p>
                    <span id="contact_description"></span>
                </div>
            </div>
            <div id="delete-conf" class="delete-conf">
                <h2>Are you sure ?</h2>
                <div class="choice">
                    <a id="no" href="#">
                        <h3>No</h3>
                    </a>
                    <form action="deleteContact.php" method="post">
                        <input type="hidden" id="idContact" name="id_contact" />
                        <input type="submit" id="yes" value="Yes" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
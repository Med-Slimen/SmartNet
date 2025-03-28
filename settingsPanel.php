<?php $language = $_COOKIE["language"] ?? "en";
include $language . '.php';
include 'connect.php';
$settings = $conn->prepare("SELECT* FROM settings");
$settings->execute();
$res = $settings->get_result();
$settingsArray = array();
while ($res2 = $res->fetch_assoc()) {
  $settingsArray[$res2["setting_name"]] = $res2["setting_value"];
}
$from = substr($settingsArray["buisness_hours"], 0, 5);
$to = substr($settingsArray["buisness_hours"], 6, 6);
session_start();
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
  <div class="settings">
    <h1>Settings</h1>
    <div class="settings-list">
      <div class="mini-setting">
        <p>Languages :</p>
        <form id="selectLang" action="updateLang.php" method="post">
          <select name="lang" onchange="this.form.submit()">
            <option value="<?= $language ?>"><?= $language == "en" ? "English 🇺🇸" : "Arabic 🇸🇦" ?></option>
            <option value="<?= $language == "en" ? "ar" : "en" ?>"><?= $language == "en" ? "Arabic 🇸🇦" : "English 🇺🇸" ?></option>
          </select>
        </form>
      </div>
      <form action="changeSettings.php" method="post" enctype="multipart/form-data">
        <div class="mini-setting">
          <p>Change Website Logo :</p>
          <input type="file" name="logo" id="" />
        </div>
        <div class="mini-setting">
          <p>Contact Informations :</p>
          <label for="">Email :</label>
          <input type="text" name="email" value="<?= $settingsArray["email"] ?>" id="" required /><br />
          <label for="">Phone Number :</label>
          <input type="text" name="number" value="<?= $settingsArray["Pnumber"] ?>" id="" required /><br />
          <label for="">Buisness Hours :</label><br>
          <div style="padding-left: 10px;">
            <label for="">From :</label>
            <input type="time" name="from" value="<?= $from ?>" id="" required />
            <label for="">To :</label>
            <input type="time" name="to" value="<?= $to ?>" id="" required /><br />
          </div>
        </div>
        <div class="mini-setting">
          <p>Social Media Links :</p>
          <label for="">Facebook :</label>
          <input type="text" name="fac" value="<?= $settingsArray["facebook"] ?>" required id="" />
          <label for="">Instagram :</label>
          <input type="text" name="insta" value="<?= $settingsArray["instagram"] ?>" required id="" />
          <label for="">Linkedin</label>
          <input type="text" name="link" id="" value="<?= $settingsArray["linkedin"] ?>" required />
        </div>
        <input type="submit" value="Update Settings">
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
    let messageText = "<?= $_SESSION['updated'] ?? '' ?>";
    if (messageText == 'updated') {
      Swal.fire({
        title: "Done",
        text: "Settings Updated Successfully !",
        icon: "success"
      });
    } else if (messageText == 'error') {
      Swal.fire({
        title: "Oops...",
        text: "Settings Are Not Updated !",
        icon: "error"
      });
    }
    <?php unset($_SESSION['updated']); ?>
  </script>
</body>

</html>
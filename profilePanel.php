<?php
session_start();
include 'connect.php';
$query = $conn->prepare("SELECT* FROM admins WHERE admin_id = ?");
$query->bind_param("i", $_SESSION["admin_id"]);
$query->execute();
$profile_detials = $query->get_result();
$profile = $profile_detials->fetch_assoc();
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
   <div class="profile">
      <h1>Profile</h1>
      <div class="profile-list">
         <div class="mini-profile">
            <form action="changeProfile.php" method="post" enctype="multipart/form-data">
               <h3>Personal Information</h3>
               <div style="padding: 10px;">
                  <label>Change Profile Picture :</label>
                  <input type="file" name="pf" id="" /><br />
                  <label for="">First Name :</label>
                  <input type="text" name="firstName" value="<?= $profile["firstName"] ?>" id="firstName" required /><br />
                  <label for="">Last Name :</label>
                  <input type="text" name="lastName" id="lastName" value="<?= $profile["lastName"] ?>" required /><br />
                  <label for="">Email :</label>
                  <input type="text" name="email" id="email" value="<?= $profile["email"] ?>" required /><br />
                  <input type="submit" value="Update Profile">
               </div>
            </form>
            <h3>Security Settings :</h3>
            <form action="updatePassword.php" onsubmit="return checkPass()" method="post">
               <div style="padding: 10px;">
                  <label for="">Change Passwoard :</label><br>
                  <div style="max-width: 100%;position: relative;display: inline-block;">
                     <input type="password" onpaste="return false;" name="newPass" placeholder="New Passwoard" onkeyup="verifPass()" required id="newPass" />
                     <span onclick="showPass('eyeOpenNewPass','eyeCloseNewPass','newPass')" class="eye" id="eyeOpenNewPass"><i class="fa-solid fa-eye"></i></span>
                     <span onclick="unshowShowPass('eyeCloseNewPass','eyeOpenNewPass','newPass')" class="eye" style="display: none;" id="eyeCloseNewPass"><i class="fa-solid fa-eye-slash"></i></span>
                  </div>
                  <div style="max-width: 100%;position: relative;display: inline-block;">
                     <input type="password" name="confNewPass" onpaste="return false;" onkeyup="match()" placeholder="Confirm New Passwoard" required id="confNewPass" />
                     <span onclick="showPass('eyeOpenConfNewPass','eyeCloseConfNewPass','confNewPass')" class="eye" id="eyeOpenConfNewPass"><i class="fa-solid fa-eye"></i></span>
                     <span onclick="unshowShowPass('eyeCloseConfNewPass','eyeOpenConfNewPass','confNewPass')" class="eye" style="display: none;" id="eyeCloseConfNewPass"><i class="fa-solid fa-eye-slash"></i></span>
                  </div><br>
                  <div>
                     <p style="font-size: 20px;font-weight: bold;">You need to meet these requirements :</p>
                     <p class="req" id="eight">New password length must be > 8 caracteres</p>
                     <p class="req" id="oneN">Contains at least one number</p>
                     <p class="req" id="oneC">Contains at least one maj caractere</p>
                     <p class="req" id="match">The password must match</p>
                  </div>
                  <input type="submit" value="Change Password">
               </div>
            </form>
            <h3>Trusted devices :</h3>
            <?php
            $trust = $conn->prepare("SELECT* FROM trusted_devices WHERE admin_id=?");
            $trust->bind_param("i", $_SESSION["admin_id"]);
            $trust->execute();
            $res_trust = $trust->get_result();
            if ($res_trust->num_rows > 0) {
               while ($device = $res_trust->fetch_assoc()) {
            ?>
                  <div class="device">
                     <div class="details">
                        <i class="fa-solid fa-desktop"></i>
                        <span id=""><?= $device["device_name"] ?></span>
                     </div>
                     <div class="button">
                        <button onclick="showConf(<?php echo ($device['id']) ?>,'idDevice')">Delete Device</button>
                     </div>
                  </div>
               <?php
               }
            } else {
               ?>
               <div class="noEvent">
                  <h2 style=" margin:10px 0px 0 20px;font-weight: normal;font-size: 22px;">There is no Device</h2>
               </div>
            <?php
            }
            ?>
         </div>
         <div id="delete-conf" class="delete-conf">
            <h2>Are you sure ?</h2>
            <div class="choice">
               <a id="no" href="#">
                  <h3>No</h3>
               </a>
               <form action="delete-device.php" method="post">
                  <input type="hidden" id="idDevice" name="id_device" />
                  <input type="submit" id="yes" value="Yes" />
               </form>
            </div>
         </div>

      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   <script>
      let updated_profile = "<?= $_SESSION['updated_profile'] ?? '' ?>";
      let updated_pass = "<?= $_SESSION['pass_changed'] ?? '' ?>";
      let messageText = "<?= $_SESSION['device_del'] ?? '' ?>";
      if (updated_profile == 'updated') {
         Swal.fire({
            title: "Done",
            text: "Profile Updated successfully !",
            icon: "success"
         });
      } else if (updated_profile == 'error') {
         Swal.fire({
            title: "Oops...",
            text: "Something went wrong !",
            icon: "error"
         });
      }
      if (updated_pass == 'updated') {
         Swal.fire({
            title: "Done",
            text: "Password Updated successfully !",
            icon: "success"
         });
      } else if (updated_pass == 'error') {
         Swal.fire({
            title: "Oops...",
            text: "Something went wrong !",
            icon: "error"
         });
      }
      if (messageText == 'deleted') {
         Swal.fire({
            title: "Done",
            text: "Device Deleted successfully !",
            icon: "success"
         });
      } else if (messageText == 'error') {
         Swal.fire({
            title: "Oops...",
            text: "Something went wrong !",
            icon: "error"
         });
      }
      <?php
      unset($_SESSION['updated_profile']);
      unset($_SESSION['device_del']);
      unset($_SESSION['pass_changed']); ?>
   </script>
</body>

</html>
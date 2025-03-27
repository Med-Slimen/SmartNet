<?php
if (isset($_POST["lang"])) {
   $language = $_POST["lang"];
   setcookie("language", $language, strtotime("+5 Years"));
   header("Location: {$_SERVER['HTTP_REFERER']}");
}

<?php
session_start();
if (session_destroy()) {
  session_unset();
  // echo "session destroyed...........";
  header("Location: login_form.php");
}

?>
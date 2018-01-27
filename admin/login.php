<?php
if($_POST['email'] == "info@lealisla.com.mx" and $_POST['password'] == "lealisla")
{
  session_start();
  $_SESSION["logged"] = true;
  header('Location: home.php');
}
else
{
  header('Location: index.php?error=1');
}
?>

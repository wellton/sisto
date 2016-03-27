<?php

  session_start();

  if(empty($_SESSION["id"])){
    header("location:login.php");
  }else{
    header("location:index.php");
  }

?>

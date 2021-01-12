<?php
if (!isset($_SERVER['HTTP_REFERER'])){
    header("Location: /misc/404");
    exit();
  }
?>
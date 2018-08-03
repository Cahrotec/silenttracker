<?php
include_once "./config/config.php";

  $cid = $_GET["cid"];
  $nmid = $_GET["nmid"];
  // $ireturn = $_GET["nmid"];
  // echo $cid;
  // echo $nmid;

  // $sql = "INSERT INTO lost (cid, nmid) VALUES ('{$cid}','{$nmid}')";
  // $result = $conn->query($sql);
  // if($ireturn == 0) {
    $sql2 = "UPDATE child SET nmid='$nmid' WHERE id='$cid'";
    $result2 = $conn->query($sql2);
  // }
 ?>

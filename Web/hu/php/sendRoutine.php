<?php
include 'connection.php';
session_start();

$notMatched = true;

if(isset($_POST['routine']) && isset($_POST['cellName'])){
  $sql = "SELECT exerciseCell FROM exercises WHERE userID =".$_SESSION["userIdSession"];
  $result = $connection->query($sql);
  while($row = $result->fetch_assoc()){
    if($row['exerciseCell'] == $_POST['cellName']){
      $sql3 = "UPDATE exercises SET exerciseName ='".$_POST["routine"]."' WHERE userID =".$_SESSION["userIdSession"]." AND exerciseCell ='".$_POST["cellName"]."'";
      $result3 = $connection->query($sql3);
      $notMatched = false;
    }
  }
  if($notMatched){
    $sql2 = "INSERT INTO exercises (userID,	exerciseName,	exerciseCell)
    VALUES ('".$_SESSION["userIdSession"]."', '".$_POST["routine"]."', '".$_POST["cellName"]."')";
    $result2 = $connection->query($sql2);
  }
}else{
  header('location:../routine.php');
}

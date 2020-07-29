<?php
  include 'config.php';
  session_start();
  $id = $_POST['id'];
  $password = $_POST['password'];

  $query = mysqli_query($con, "select * from user where id='$id' and password='$password'");
  if(mysqli_num_rows($query) > 0){
      $_SESSION['id'] = $id;
      $_SESSION['status_login'] = '1';
      header("location:beranda.php");
  }
  else{
    header("location:beranda.php");
      $_SESSION['status_login'] = '0';
      header("location:index.php");
  }
?>

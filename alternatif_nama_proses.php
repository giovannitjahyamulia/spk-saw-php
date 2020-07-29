<?php
  include 'config.php';
  session_start();
  $id = $_SESSION['id'];
  $id_keputusan = $_SESSION['$id_keputusan'];
  $alternatif = $_POST['alternatif'];

  $query = mysqli_query($con, "insert into alternatif(id_transaksi, id_user, alternatif) values($id_keputusan, $id_user, $alternatif)");
  if(mysqli_num_rows($query) != null){
      header("location:beranda.php");
  }
  else{
      header("location:alternatif_nama.php");
  }
?>

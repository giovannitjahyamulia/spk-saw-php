<!DOCTYPE html>
<html lang="en" class="h-100" id ="html">

<head>
	<meta charset="utf-8" />

	<title>
	  Aosyst - SPK using SAW
	</title>

	<!--Fonts and icons-->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<!-- CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<style>
	.footer {
	  position: fixed;
	  left: 0;
	  bottom: 0;
	  width: 100%;
	  text-align: center;
	}
	</style>
</head>

<body class="h-100 w-100 bg-light">
	<nav class="navbar navbar-expand-lg navbar-dark bg-info">
	  <a class="navbar-brand font-weight-bold" href="#">Aosyst</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item visited">
	        <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item visited">
	        <a class="nav-link" href="#">Alternatif</a>
	      </li>
				<li class="nav-item visited">
	        <a class="nav-link" href="#">Kriteria</a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="#">Ranking</a>
	      </li>
				<li class="nav-item">
					<a class="nav-link" href="#">Logout</a>
				</li>
	    </ul>
	  </div>
	</nav>

	<div class="container">
		<div class="d-flex justify-content-center">
			<!-- Perhitungan -->
			<?php
				$alternatif = $_POST['alternatif'];
				$kriteria = $_POST['kriteria'];
				$nilai_kriteria = $_POST['nilai_kriteria'];
				$bobot = $_POST['bobot'];
				$keuntungan = $_POST['keuntungan'];

				for ($row = 1; $row <= count($alternatif); $row++){
					$bobot[$row] = doubleval($bobot[$row]);
					for ($col = 1; $col <= count($kriteria); $col++){
						$nilai_kriteria[$row][$col] = doubleval($nilai_kriteria[$row][$col]);
					}
				}

				$penilaiacn = array();
				for ($row = 1; $row <= count($alternatif); $row++){
					for ($col = 1; $col <= count($kriteria); $col++){
						if ($keuntungan[$col] == 'true') {
							$temp = array();
							for($i = 1; $i <= count($alternatif); $i++){
								$temp[$i] = doubleval($nilai_kriteria[$i][$col]);
							}
							$penilaian[$row][$col] = doubleval(doubleval($nilai_kriteria[$row][$col])/doubleval(max($temp)));
						}
						else {
							$temp = array();
							for($i = 1; $i <= count($alternatif); $i++){
								$temp[$i] = doubleval($nilai_kriteria[$i][$col]);
							}
							$penilaian[$row][$col] = doubleval(doubleval(min($temp))/doubleval($nilai_kriteria[$row][$col]));
						}
					}
				}

				$keputusan = array();
				for ($row = 1; $row <= count($alternatif); $row++){
					$keputusan[$row] = 0;
					for ($col = 1; $col <= count($kriteria); $col++){
						$keputusan[$row] = doubleval($keputusan[$row]) + doubleval(doubleval($penilaian[$row][$col]) * doubleval($bobot[$col]));
					}
				}
				$ranking = $keputusan;
				rsort($ranking);

				$ranking_index = array();
				$pembanding = $keputusan;
				for ($row = 0; $row < count($alternatif); $row++){
					for ($col = 1; $col <= count($alternatif); $col++){
						$temp1 = doubleval($ranking[$row]);
						$temp2 = doubleval($keputusan[$col]);
						if($temp1 == $temp2){
							echo ($row + 1).". $alternatif[$col] - $keputusan[$col]<br>";
							array_push($ranking_index, $row);;

							$pembanding[$col] = '';
							break;
						}
					}
				}

				// simpan ke database
				include 'config.php';
				$id_keputusan = '';
				$id_user = $_SESSION['id'];

				$query = mysqli_query($con, "select MAX(id_keputusan) from keputusan");
				$data = array();
				if(mysqli_num_rows($query) != null){
					$data = mysqli_fetch_array($query);
					$id_keputusan = max($data) + 1;
					$_SESSION['id_keputusan'] = $id_keputusan;
					$query = mysqli_query($con, "Insert into keputusan(id_keputusan, id_user) VALUES($id_keputusan, $id_user)");
				}
				else{
					$id_keputusan = = 1;
					$_SESSION['id_keputusan'] = $id_keputusan;
					$query = mysqli_query($con, "Insert into keputusan(id_keputusan, id_user) VALUES($id_keputusan, $id_user)");
				}

				for ($row = 1; $row <= count($alternatif); $row++){
					$query = mysqli_query($con, "Insert into keputusan(id_alternatif, id_keputusan, nama_alternatif) VALUES($row, $id_keputusan, $alternatif[$row])");
					for ($col = 1; $col <= count($kriteria); $col++){
						if($row == $col){
							if($keuntungan[$row] == TRUE){
								$query = mysqli_query($con, "Insert into kriteria(id_kriteria, id_keputusan, nama_kriteria, bobot, keuntungan) VALUES($col, $id_keputusan, $kriteria[$col], $bobot[$col], 1)");
							}
							else{
								$query = mysqli_query($con, "Insert into kriteria(id_kriteria, id_keputusan, nama_kriteria, bobot, keuntungan) VALUES($col, $id_keputusan, $kriteria[$col], $bobot[$col], 0)");
							}
						}
						$query = mysqli_query($con, "Insert into penilaian(id_alternatif, id_kriteria, id_keputusan, penilaian) VALUES($row, $col, $id_keputusan, $penilaian[$row][$col])");
					}
					$query = mysqli_query($con, "Insert into ranking(id_alternatif, id_keputusan, nilai_ranking) VALUES($row, $id_keputusan, $keputusan[$row])");
				}
			?>
		</div>
	</div>

	<footer class="footer bg-info p-3">
		<div class="container-fluid">
			<center>
			<div class="copyright float text-light">
				&copy; 2020 Aosyst
			</div>
		</center>
		</div>
	</footer>
</body>
</html>

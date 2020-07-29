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
	.centerinparent{
		text-align: center;
    display: table-cell;
    vertical-align: middle;
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
				<li class="nav-item active">
	        <a class="nav-link" href="#">Kriteria</a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="#" disabled>Ranking</a>
	      </li>
				<li class="nav-item">
					<a class="nav-link" href="#">Logout</a>
        </li>
	    </ul>
	  </div>
	</nav>

	<div class="p-5">
		<form action="perhitungan.php" method="post">
      <div class="form-group">
        <p class="text-center p-3">Masukan kriteria yang akan digunakan, bobot, dan tentukan apakah itu keuntungan atau bukan.</p>


        <table width="100%" id="kriteria">
					<?php
						$kriteria = $_POST['kriteria'];
						for ($i = 1; $i <= count($kriteria); $i++){
							echo "<input type='text' value='$kriteria[$i]' name='kriteria[$i]' hidden>";
						}

						echo "<tr class='pb-2'><td class='p-1'>Alternatif\Kriteria</td>";
						for ($i = 1; $i <= count($kriteria); $i++){
							echo "<td class='p-1'>$kriteria[$i]</td>";
						}
						echo "</tr>";

						$bobot = $_POST['bobot'];
						for ($i = 1; $i <= count($bobot); $i++){
							echo "<input type='text' value='$bobot[$i]' name='bobot[$i]' hidden>";
						}

						$keuntungan = $_POST['keuntungan'];
						for ($i = 1; $i <= count($kriteria); $i++){
							if(isset($keuntungan[$i])){
								echo "<input type='text' value='true' name='keuntungan[$i]' hidden>";
							}
							else{
								echo "<input type='text' value='false' name='keuntungan[$i]' hidden>";
							}
						}

						$alternatif = $_POST['alternatif'];
						for ($i = 1; $i <= count($alternatif); $i++){
							echo "<input type='text' value='$alternatif[$i]' name='alternatif[$i]' hidden>";
						}
						for ($i = 1; $i <= count($alternatif); $i++){
               echo "<tr class='pb-2'><td class='p-1'>$alternatif[$i]</td>";
							 for ($j = 1; $j <= count($kriteria); $j++){
		 							echo "<td class='p-1'><input type='number' class='form-control text-center' name='nilai_kriteria[$i][$j]'></td>";
		 						}
							 echo "</tr>";
            }
          ?>
        </table>
        <div class="d-flex justify-content-center">
          <input type="submit" class="btn btn-info mt-2" value="Lanjutkan"/>
        </div>
      </div>
    </form>
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

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
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#" disabled>Alternatif</a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="#" disabled>Kriteria</a>
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
		<p class="text-center p-3">Masukan jumlah alternatif yang akan digunakan</p>

    <div class="d-flex justify-content-center align-item-center">
			<form action="alternatif_nama.php" method="post">
				<div class="form-group">
					<input type="number" class="form-control mb-2 text-center" name="jumlah"/>
					<div class="d-flex justify-content-center">
						<input type="submit" class="btn btn-info mt-2" value="Lanjutkan"/>
					</div>
				</div>
			</form>
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

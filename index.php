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
<body class="h-100 w-100 bg-info d-flex justify-content-center align-item-center">

    <div class="col-lg-4 col-sm-6 p-5">
      <h1 class="text-white text-center">Selamat Datang!</h1>
      <h5 class="text-white text-center mb-5">Silakan masuk untuk melanjutkan</h5>

			<?php
				error_reporting(0);
				if(array_key_exists('status_login',$_SESSION)){
					echo "hahahah";
					if($_SESSION['status_login'] == '0'){
						echo '<div class="alert alert-danger">
										<h6>Gagal Login</h6>
										<p></p>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>';
					}
					else{
			      header("location:beranda.php");
					}
				}

			?>

      <div class="card">
        <div class="card-body">
          <form method="post" action="login_proses.php">
            <h6>ID</h6>
            <input type="text" class="form-control mb-2" placeholder="ID" name="id" required>
            <h6>Password</h6>
            <input type="password" class="form-control mb-2" placeholder="Password" name="password" required>
            <div class="d-flex justify-content-center">
              <input type="submit" class="btn btn-info" name="signin" value="Sign In">
            </div>
          </form>
        </div>
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

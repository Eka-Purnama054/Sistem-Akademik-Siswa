<?php 
session_start();

if (isset($_SESSION['user'])) {
	header('Location: index.php');
	exit;
}

require 'config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SIA | Login</title>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="Phoenixcoded">
	<meta name="keywords"
	content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="Phoenixcoded">

	<!-- Favicon icon -->
	<link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!--ico Fonts-->
	<link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">

	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

	<!-- Responsive.css-->
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

	<!--color css-->
	<link rel="stylesheet" type="text/css" href="assets/css/color/color-1.min.css" id="color"/>

</head>
<body>
	<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
		<!-- Container-fluid starts -->
		<div class="container-fluid">
			<div class="row">

				<div class="col-sm-12">
					<div class="login-card card-block">
						<form class="md-float-material" method="POST">
							<div class="text-dark text-center">
								<img src="assets/images/logo.png" alt="logo">
								<!-- SISTEM AKADEMIK -->
							</div>
						<!-- <h3 class="text-center txt-primary">
							SIAKAD SMK
						</h3> -->
						<h3 class="text-center txt-primary">
							Sistem Akademik Sekolah Kejuruan
						</h3>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon" ><i class="icofont icofont-ui-user"></i></span>
								<input type="email" name="email" class="form-control" id="iconaddon1" placeholder="Email" >
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<span  class="input-group-addon"><i class="icofont icofont-ui-user"></i></span>
								<input type="password" name="password" id="iconaddon12" class="form-control" placeholder="Password">
							</div>
						</div>


					<!-- 	<div class="form-group">
							<label for="email">Email</label>
							<input id="email" type="email" class="form-control" name="email" />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control col-sm-6" name="password" />
						</div> -->
						<div class="row">
							<div class="col-sm-6 col-xs-12">
								<div class="rkmd-checkbox checkbox-rotate checkbox-ripple m-b-25">
									<label class="input-checkbox checkbox-primary">
										<input type="checkbox" id="checkbox">
										<span class="checkbox"></span>
									</label>
									<div class="captions">Remember Me</div>

								</div>
							</div>
							<div class="col-sm-6 col-xs-12 forgot-phone text-right">
								<a href="forgot-password.html" class="text-right f-w-600"> Forget Password?</a>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-10 offset-xs-1">
								<button name="login" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
							</div>
						</div>
						<!-- <div class="card-footer"> -->


							<!-- </div> -->
						</form>
						<!-- end of form -->
						<?php 
						if (isset($_POST['login'])) {
							$mail = $_POST['email'];
							$pass = md5($_POST['password']);

						//cek data tabel user
							$data = $koneksi->query("SELECT * FROM user WHERE ussername = '$mail' AND password = '$pass'");
							$cek = $data->num_rows;

						//cek data tabel guru
							$data2 = $koneksi->query("SELECT * FROM guru WHERE ussername = '$mail' AND password = '$pass'");
							$cek2 = $data2->num_rows;

						//cek data tabel siswa
							$data3 = $koneksi->query("SELECT * FROM siswa WHERE ussername = '$mail' AND password = '$pass'");
							$cek3 = $data3->num_rows;

							if ($cek == 1 ) {
								$_SESSION['user']=$data->fetch_assoc();
								$_SESSION['login']="Admin";
								echo "<script>alert('BERHASIL ADMIN')</script>";
								echo "<meta http-equiv='refresh' content='1;url=index.php'>";
							}
							elseif ($cek2 == 1 ) {
								$_SESSION['user']=$data2->fetch_assoc();
								$_SESSION['login']="Guru";
								echo "<script>alert('BERHASIL GURU')</script>";
								echo "<meta http-equiv='refresh' content='1;url=index.php'>";
							}
							elseif ($cek3 == 1 ) {
								$_SESSION['user']=$data3->fetch_assoc();
								$_SESSION['login']="Siswa";
								echo "<script>alert('BERHASIL SISWA')</script>";
								echo "<meta http-equiv='refresh' content='1;url=index.php'>";
							}

							else {
								echo "<script>alert('Username atau password salah!')</script>";
								echo "<meta http-equiv='refresh' content='1;url=login.php'>";
							}


						}
						?>
					</div>
					<!-- end of login-card -->
				</div>
				<!-- end of col-sm-12 -->
			</div>
			<!-- end of row -->
		</div>
		<!-- end of container-fluid -->
	</section>

	<!-- Warning Section Starts -->
	<!-- Older IE warning message -->
<!--[if lt IE 9]>
<div class="ie-warning">
	<h1>Warning!!</h1>
	<p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
	<div class="iew-container">
		<ul class="iew-download">
			<li>
				<a href="http://www.google.com/chrome/">
					<img src="assets/images/browser/chrome.png" alt="Chrome">
					<div>Chrome</div>
				</a>
			</li>
			<li>
				<a href="https://www.mozilla.org/en-US/firefox/new/">
					<img src="assets/images/browser/firefox.png" alt="Firefox">
					<div>Firefox</div>
				</a>
			</li>
			<li>
				<a href="http://www.opera.com">
					<img src="assets/images/browser/opera.png" alt="Opera">
					<div>Opera</div>
				</a>
			</li>
			<li>
				<a href="https://www.apple.com/safari/">
					<img src="assets/images/browser/safari.png" alt="Safari">
					<div>Safari</div>
				</a>
			</li>
			<li>
				<a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
					<img src="assets/images/browser/ie.png" alt="">
					<div>IE (9 & above)</div>
				</a>
			</li>
		</ul>
	</div>
	<p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jqurey -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/plugins/tether/dist/js/tether.min.js"></script>
<!-- Required Fremwork -->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- waves effects.js -->
<script src="assets/plugins/Waves/waves.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/elements.js"></script>
</body>
</html>
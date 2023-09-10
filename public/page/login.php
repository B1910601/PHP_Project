<?php
session_start();
if (isset($_SESSION['user'])) {
	header('location:index.php');
}
include('../../db/conf.php');
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (empty($username) or empty($password)) {
		$error = 'Vui lòng đầy đủ thông tin!';
	}
	if (!isset($error)) {
		//check user
		$query = $conn->prepare('SELECT username,password,role FROM user WHERE username=:username');
		$query->bindValue(':username', $username);
		$query->execute();
		$user = $query->fetch(PDO::FETCH_ASSOC);
		if (!$user) {
			$error = 'Tài khoản không tồn tại!';
		} else {
			//check pass
			if (password_verify($password, $user['password'])) {
				$_SESSION['user']['name'] = $user['username'];
				$_SESSION['user']['role'] = $user['role'];
				if ($_SESSION['user']['role'] == 1) {
					header('location:../admin/dashboard.php');
				} else {
					header('location: ../index.php');
				}
			} else {
				$error = 'Sai mật khẩu!';
			}
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shop</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/style1.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://code.jquery.com/jquery-3.6.3.js">
</head>

<body>
	<?php include '../../inc/header.php' ?>

	<h1 class="text-center" style="font-weight:bold ; margin-top: 50px;">LOGIN</h1>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 offset-sm-2">


				<div class="">
					<div class="card-header">
						<?php if (isset($error)) :  ?>
							<div class="alert alert-danger">
								<strong>Lỗi!</strong> <?php echo $error ?>
							</div>
						<?php endif ?>
					</div>
					<div class="card-body">
						<form method="post" class="form-horizontal" action="#">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="username">Tên đăng nhập</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="password">Mật khẩu</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" name="password" placeholder="Mật khẩu" />
								</div>
							</div>



							<div class="row">
								<div class="col-sm-5 offset-sm-4">
									<button type="submit" class="btn btn-primary" name="login">Đăng Nhập</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div> <!-- Cột nội dung -->
		</div> <!-- Dòng nội dung -->
	</div>


	<!-- Footer -->
	<?php include '../../inc/footer.php' ?>
	<!-- Footer -->
	<!-- Footer -->
	</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="./js/jquery.validate.js"></script>

	</script>

</body>

</html>
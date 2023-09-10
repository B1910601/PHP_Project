<?php 
include('../../db/conf.php');
if (isset($_POST['register'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (empty($username) or empty($password) or empty($email)){
		$error = 'Vui lòng đầy đủ thông tin!';
	}
	if (!isset($error)) {
		$query = "SELECT username FROM user WHERE username=:username";
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':username', $username);
		$stmt->execute();

		$user = $stmt->fetchAll();
		if ($user) {
			$error = 'Tài khoản này đã tồn tài!';
		}else {
			$password = password_hash($password, PASSWORD_DEFAULT);
			$query = $conn->prepare('
					INSERT INTO user (username, email, password) VALUES (:username, :email, :password);
			');
			$query->bindParam(':username', $username);
			$query->bindParam(':email', $email);
			$query->bindParam(':password', $password);
			$query->execute();

			$_SESSION['user']['name'] = $username;
			$_SESSION['user']['role'] = 2;

			echo"<script>alert('Tạo tài khoản thành công')</script>
       		 <script>window.location = 'login.php'</script>";
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"/>	
<link rel="stylesheet" href="https://code.jquery.com/jquery-3.6.3.js">
</head>
<body>
<?php include '../../inc/header.php' ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"/>	

          <h1 class="text-center" style="font-weight:bold ; margin-top: 50px;">Resgister</h1>
          <div class="container">
		<div class="row">
			<div class="col-sm-8 offset-sm-2">
				<div class="">
					<div class="card-header">
					<?php   if (isset($error)) :  ?>
					<div class="alert alert-danger">
						<strong>Lỗi!</strong> <?php echo $error ?>
					</div>
				<?php endif ?>
					</div>
					<div class="card-body">
						<form id="signupForm" method="post" class="form-horizontal" action="#">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="username">Tên đăng nhập</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="email">Email</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="email" name="email" placeholder="Email" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="password">Mật khẩu</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="confirm_password">Nhập lại mật khẩu</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu" />
								</div>
							</div>

							<div class="row">
								<div class="col-sm-5 offset-sm-4">
									<button type="submit" class="btn btn-primary" name="register" value="Sign up">Đăng ký</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div> <!-- Cột nội dung -->
		</div> <!-- Dòng nội dung -->
	</div> <!-- Container -->

       
          <?php include '../../inc/footer.php' ?>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="./js/jquery.validate.js">
		$.validator.setDefaults({
					submitHandler: function () {alert("submitted!");}
				});
				$(document).ready(function (){
					$("#signupForm").validate({
						rules : {
							firstname : "required",
							lastname : "required",
							username : {required: true, minlenght: 2},
							password : {required: true, minlenght: 5},
							confirm_password : {required: true, minlenght: 5, equalTo: "#password"},
							email : {required: true, email: true},
							agree: "required"
						},
						messages : {
							firstname : "Bạn chưa nhập vào họ của bạn",
							lastname : "Bạn chưa nhập vào tên của bạn",
							username : {
								required : "Bạn chưa nhập vào tên đăng nhập",
								minlenght : "Tên đăng nhập phải có ít nhất 2 ký tự",
							},
							password : {
								required : "Bạn chưa nhập mật khẩu",
								minlenght : "Mật khẩu phải có ít nhất 5 ký tự",
							},
							confirm_password : {
								required : "Bạn chưa nhập mật khẩu",
								minlenght : "Mật khẩu phải có ít nhất 5 ký tự",
								equalTo : "Mât khẩu không trùng khớp với mật khẩu đã nhập",
							},
							email : "Email không hợp lệ",
							agree : "Bạn phải đồng ý với các quy định của chúng tôi",
						},
						errorElement : "div",
						errorPlacement : function (error, element) {
							error.addClass("invalid-feedback");
							if(element.prop("type")==="checkbox"){
								error.insertAfter(element.siblings("label"));
							}else{
								error.insertAfter(element);
							}
						},
						highlight: function (element,errorClass, validClass){
							$(element).addClass("is-invalid").removeClass("is-valid");
						},
						unhightlight: function (element, errorClass, validClass) {
							$(element).addClass("is-valid").removeClass("is-invalid");
						}
					});
				});
	</script>

				
	</script>

</body>
</html>
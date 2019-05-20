<?php
require_once "../config.php";
require_once MODELS_PATH . "/database.php";
require_once MODELS_PATH . "/user.php";
require_once INCLUDES_PATH . '/header-login.php';
$test ="";
if(isset($_POST['submit'])){

    //get data from the form
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
	$password = md5($_POST['password']);

    $db = Database::getDb();
	$userObj = new User();
	$add = $userObj->addUser($fname, $lname, $email, $password, $db);
  var_dump($_POST['submit']);
	echo $test= "hello";
}
	
?>
<header id="header" class="login-container bg-primary text-white text-center">
	<div class="container">
		<div class="d-flex justify-content-center login-form-container">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../images/logo-karaoke-nav.png" class="brand_logo" alt="Logo" width="100px">
					</div>
				</div>
				<br>
				<br>
				<br>
				<div class="d-flex justify-content-center form_container">
					<form method="post" action="login.php">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" id="fname" name="fname" class="form-control input_user" value="" placeholder="first name">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" id="lname" name="lname" class="form-control input_user" value="" placeholder="last name">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="email" id="email" name="email" class="form-control input_user" value="" placeholder="email address">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" id="password" name="password" class="form-control input_pass" value="" placeholder="password">
						</div>
						<div class="d-flex justify-content-center mt-3 input-group mb-2">
							<button type="submit" name="submit" class="btn login_btn btn-block ">Signup</button>
						</div>
					</form>
					<span><?php echo $test; ?></span>
				</div>
			</div>
		</div>
	</div>
</header>
</main>
<?php require_once INCLUDES_PATH . '/footer.php'; 
  ?>

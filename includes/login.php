<?php
require_once "../config.php";
require_once MODELS_PATH . "/database.php";
require_once MODELS_PATH . "/user.php";
require_once INCLUDES_PATH . '/header-login.php';

	$loginurl = $g_client->createAuthUrl();
	$email = "";
	$password = "";

if(isset($_POST['submit'])){
   
   $user = $_POST['email'];
   $pass = md5($_POST['password']);
   
   
    if(empty($_POST["email"]) || empty($_POST["password"]))  
    {  
        header("location:login.php");
    }  
	else {
		$sql= "SELECT id, email, password, fname, lname FROM users WHERE email =? AND  password=? ";
		
		$dbcon = Database::getDb();
		$query = $dbcon->prepare($sql);
        $query->execute(array($user,$pass));
		$euser = $query->fetch(PDO::FETCH_OBJ);

    if($query->rowCount() >= 1) {
        $_SESSION['email'] = $user;
		$_SESSION['uid'] = $euser->id;
		$_SESSION['givenname'] = $euser->fname;
		$_SESSION['familyname'] = $euser->lname ;
		
        header("Location:homepage.php"); 
		
    }else{
		header("location:login.php"); 
		
    }
  }
}
	
?>
<header id="header" class="login-container bg-primary text-white text-center h-100">
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
					<div class="login_container">
						<button name="googleSubmit" class="btn login_btn" type="button" onclick="window.location = '<?php echo $loginurl; ?>'"><i class="fab fa-google"></i>&nbsp;&nbsp; Login with Google</button>
					</div>
					<br>
					<h3 class="text-dark">or</h3>
					<br>
					<div class="d-flex justify-content-center form_container">
						<form method="post" action="login.php">
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
								<button type="submit" name="submit" class="btn login_btn btn-block ">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
	</div>
</header>
</main>
<?php require_once INCLUDES_PATH . '/footer.php'; 
  ?>

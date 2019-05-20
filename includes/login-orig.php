<?php
require_once "../config.php";
require_once MODELS_PATH . "/database.php";
require_once MODELS_PATH . "/user.php";
require_once INCLUDES_PATH . '/header.php';

	$loginurl = $g_client->createAuthUrl();
	$email = "";
	$password = "";

//if ($g_client->isAccessTokenExpired()) {
//   session_destroy();
//header("Location:../includes/homepage.php");
//}

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

<script src="https://apis.google.com/js/platform.js"></script>
<header id="header" class="home-container bg-primary text-white text-center">
	<div class="container form-center col-md-4">
		<img class="img-fluid mb-5 d-block mx-auto" src="../images/logo-karaoke.png" alt="" width="150px;">
		<!--		<span class="home-heading">Don’t Just Sing, Sing It All Out!</span>-->
		<div class="">
			<div>
				<form class="form-login" method="post" action="login.php">
					<h1 class="h3 mb-3 font-weight-normal">Welcome to KaraOk! Please Login</h1>
					<label for="userName" class="sr-only">Username</label>
					<input type="text" name="email" id="email" class="form-control" placeholder="Enter your email address..." required autofocus>
					<br />
					<label for="inputPassword" class="sr-only">Password</label>
					<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
					<br />
					<button name="submit" class="btn btn-outline-light btn-block" type="submit">Login</button>
				</form>
				<!-- GOOGLE SIGNIN BUTTON-->
				<br />
				<button name="googleSubmit" class="btn btn-outline-light btn-block" type="button" onclick="window.location = '<?php echo $loginurl; ?>'"><i class="fab fa-google"></i>&nbsp;&nbsp; Sign in with Google</button>

				<script>
					window.fbAsyncInit = function() {
						FB.init({
							appId: '{415837849200154}',
							cookie: true,
							xfbml: true,
							version: '{v3.2}'
						});

						FB.AppEvents.logPageView();

					};

					(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) {
							return;
						}
						js = d.createElement(s);
						js.id = id;
						js.src = "https://connect.facebook.net/en_US/sdk.js";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));

				</script>
			</div>
		</div>
	</div>

</header>
<div class="row"></div>

</main>
<?php require_once INCLUDES_PATH . '/footer.php'; 
  ?>

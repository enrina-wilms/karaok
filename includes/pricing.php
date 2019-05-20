<?php
require_once "../config.php";
require_once MODELS_PATH . "/database.php";
require_once MODELS_PATH . "/user.php";
require_once INCLUDES_PATH . '/header.php';

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
		<section class="playlist" id="pricing">
			<div class="container">
				<h2 class="text-center text-uppercase text-secondary mb-0  text-light">KaraOK Pricing Plans</h2>
				<br>
				<br>
				<!--		<p style="text-align:center;">Enjoy singing and create your customized playlist!</p>-->
				<div class="card-deck mb-3 text-center text-dark">
					<div class="card mb-4 shadow-sm">
						<div class="card-header pricing-header-value">
							<h4 class="my-0 font-weight-normal">KaraOK Basic</h4>
						</div>
						<div class="card-body pricing-body-value">
							<h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
							<ul class="list-unstyled mt-3 mb-4">
								<li>Free Access to our existing playlist</li>
								<li>Customized Playlist</li>
								<li>Access to 100 songs</li>
							</ul>
							<a href="../includes/signup.php" class="btn btn-lg btn-block btn-dark" tabindex="-1" role="button" aria-disabled="true">Sign in for free</a>
							<!--					<button type="button" class="btn btn-lg btn-block btn-dark">Sign in for free</button>-->
						</div>
					</div>
					<div class="card mb-4 shadow-sm">
						<div class="card-header pricing-header">
							<h4 class="my-0 font-weight-normal"><span class="badge badge-primary">Best Value!</span>&nbsp;VIP KaraOK</h4>
						</div>
						<div class="card-body pricing-body">
							<h1 class="card-title pricing-card-title">$20 <small class="text-muted">/ mo</small></h1>
							<ul class="list-unstyled mt-3 mb-4">
								<li>Access to Top Charts Songs</li>
								<li>Unlimited Customized Playlists</li>
								<li>Unlimited Songs</li>
							</ul>
							<a href="../includes/coming-soon.php" class="btn btn-lg btn-block btn-outline-light" tabindex="-1" role="button" aria-disabled="true">Upgrade Now</a>
							<!--					<button type="button" class="btn btn-lg btn-block btn-outline-light">Upgrade Now</button>-->
						</div>
					</div>
					<div class="card mb-4 shadow-sm">
						<div class="card-header pricing-header-value">
							<h4 class="my-0 font-weight-normal">KaraOK Pro</h4>
						</div>
						<div class="card-body pricing-body-value">
							<h1 class="card-title pricing-card-title">$10 <small class="text-muted">/ mo</small></h1>
							<ul class="list-unstyled mt-3 mb-4">
								<li>Access to Top Charts Songs</li>
								<li>Unlimited Customized Playlists</li>
								<li>Access to 200 Songs</li>
							</ul>
							<a href="../includes/coming-soon.php" class="btn btn-lg btn-block btn-dark" tabindex="-1" role="button" aria-disabled="true">Upgrade Now</a>
							<!--					<button type="button" class="btn btn-lg btn-block btn-dark">Upgrade Now</button>-->
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</header>
</main>
<?php require_once INCLUDES_PATH . '/footer.php'; 
  ?>

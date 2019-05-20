<?php 
//session_start();

require_once "../config.php";
require_once INCLUDES_PATH . '/header-public.php';
require_once MODELS_PATH . '/search.php';

//if ($_SESSION['email'] == ''){
//    header("location:../includes/login.php");   
//}
      define("MAX_RESULTS", 15);
    
     if (isset($_POST['submit']) )
     {
        $keyword = $_POST['search'];
               
        if (empty($keyword))
        {
            $response = array(
                  "type" => "error",
                  "message" => "Please enter the keyword."
                );
        } 
    }     
?>

<header id="header" class="home-container bg-primary text-white text-center">
	<div class="container">
		<img class="img-fluid mb-5 d-block mx-auto" src="../images/logo-karaoke.png" alt="">
		<span class="home-heading">Don’t Just Sing, Sing It All Out!</span>
	</div>

</header>

<section class="playlist-page" id="playlist">
	<div class="container">
	<div class="row">
	<?php 
	if(isset($_POST['submit'])){
	$keyword = $_POST['search'];
	$myApiKey="AIzaSyCXDWTfRJVUaKHLhQCDaN2I5rBmUh4SSdM";
    $channelID = "UCwTRjvjVge51X-ILJ4i22ew";
    $maxResults="25";
	$search =" ";
	$finalTile = str_replace($search, '%20' , $keyword);

	
$myQuery = "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UCwTRjvjVge51X-ILJ4i22ew&maxResults=$maxResults&q=$finalTile&type=video&key=$myApiKey";	

$videoList = file_get_contents($myQuery);

$arrVideoList = json_decode($videoList, true);
		
echo '<nav aria-label="breadcrumb">'
.'<ol class="breadcrumb">'
.'<li class="breadcrumb-item"><a href="../includes/homepage.php">Home</a></li>'
.'<li class="breadcrumb-item active" aria-current="page">Coachella 2019</li>'
.'</ol>'
.'</nav>';	
		
	
	foreach ($arrVideoList['items'] as $items)
	{
//	$id = $items['id'];
	$title= $items['snippet']['title'];
	$videoID= $items['id']['videoId'];
//	$channel= $items['snippet']['channelTitle'];
	
	//$finalTile = strstr($title, '(Karaoke Version)' , true);
	
	$search = '(Karaoke Version)';
	$search1 = '-';
	$finalTile = str_replace($search, '' , $title);
	$finalTile2 = str_replace($search1, '<br/>----<br/>' , $finalTile);
	$plalistImage = 'search-bg';
		
	echo '<div class="col-md-6 col-lg-4" id="'. $videoID . '">'
	. '<div class="playlist-item-container">'
	. '<div class="card-body playlist-card-body">'
	. '<a class="playlist-item d-block mx-auto playlist-item-margin" href="https://www.youtube.com/watch?v=' . $videoID . '" target="_blank">'
	. '<div class="container-title">'
	. '<img src="../images/playlist/' . $plalistImage . '.png" class="card-img-top" alt="...">'
	. '<div class="centered">' . $finalTile2 . '</div>'
	. '</div>'
	. '</a>'
//	. '<small class="playlist-small">by ' . $channel .  '</small>'
	. '<div class="playlist-btn-align">'
	. '<a href="https://www.youtube.com/watch?v=' .$videoID. '" class="btn playlist-btn btn btn-info btn-sm" target="_blank" title="Add to your Library"><i class="fas fa-plus"></i>&nbsp;&nbsp;' . 'Add Song' . '</a>'
	. '<a href="" id="shareBtn" class="btn btn-fbShare playlist-btn btn-sm" video-id="' . $videoID . '"><i class="fab fa-facebook-f"></i>&nbsp;&nbsp;' . 'Share' . '</a>'
	. '<a href="https://www.youtube.com/watch?v=' .$videoID. '" class="btn playlist-btn btn-danger btn-sm" target="_blank"><i class="fab fa-youtube"></i>&nbsp;&nbsp;' . 'Play Song' . '</a>'
	. '</div>'
//	. '<h5 class="card-title playlistItem-title">' . $finalTile2 . '</h5>'
	. '</div>'
	. '</div>'
	. '</div>';
		
	}
		
	
	}
	?>
	</div>
	</div>
</section>


<!-- PLAYLIST SECTION -->
<section class="playlist" id="playlist">
	<div class="container">
		<h2 class="text-center text-uppercase text-secondary mb-0">PLAYLISTS</h2>
		<br>
		<br>
		<div class="row">
			<div class="col-md-6 col-lg-4">
				<a class="playlist-item d-block mx-auto" href="ballad.php">
					<div class="playlist-item-caption d-flex position-absolute h-100 w-100">
						<div class="playlist-item-caption-content my-auto w-100 text-center text-white">
							<span class="playlist-title">Ballads and Love Songs</span>
						</div>
					</div>
					<img class="img-fluid" src="../images/playlist/ballad.png" alt="">
				</a>
			</div>
			<div class="col-md-6 col-lg-4">
				<a class="playlist-item d-block mx-auto" href="coachella.php">
					<div class="playlist-item-caption d-flex position-absolute h-100 w-100">
						<div class="playlist-item-caption-content my-auto w-100 text-center text-white">
							<span class="playlist-title">Coachella 2019</span>
						</div>
					</div>
					<img class="img-fluid" src="../images/playlist/coachella.png" alt="">
				</a>
			</div>
			<div class="col-md-6 col-lg-4">
				<a class="playlist-item d-block mx-auto" href="hiphop.php">
					<div class="playlist-item-caption d-flex position-absolute h-100 w-100">
						<div class="playlist-item-caption-content my-auto w-100 text-center text-white">
							<span class="playlist-title">Hip-Hop &amp; Rap</span>
						</div>
					</div>
					<img class="img-fluid" src="../images/playlist/hiphop.png" alt="">
				</a>
			</div>
			<div class="col-md-6 col-lg-4">
				<a class="playlist-item d-block mx-auto" href="partystarter.php">
					<div class="playlist-item-caption d-flex position-absolute h-100 w-100">
						<div class="playlist-item-caption-content my-auto w-100 text-center text-white">
							<span class="playlist-title">Party Starters</span>
						</div>
					</div>
					<img class="img-fluid" src="../images/playlist/partystarters.png" alt="">
				</a>
			</div>
			<div class="col-md-6 col-lg-4">
				<a class="playlist-item d-block mx-auto" href="poprock.php">
					<div class="playlist-item-caption d-flex position-absolute h-100 w-100">
						<div class="playlist-item-caption-content my-auto w-100 text-center text-white">
							<span class="playlist-title">Pop Rock</span>
						</div>
					</div>
					<img class="img-fluid" src="../images/playlist/poprock.png" alt="">
				</a>
			</div>
			<div class="col-md-6 col-lg-4">
				<a class="playlist-item d-block mx-auto" href="randb.php">
					<div class="playlist-item-caption d-flex position-absolute h-100 w-100">
						<div class="playlist-item-caption-content my-auto w-100 text-center text-white">
							<span class="playlist-title">R&amp;B</span>
						</div>
					</div>
					<img class="img-fluid" src="../images/playlist/randb.png" alt="">
				</a>
			</div>
		</div>
	</div>
</section>
<!--SECTION FOR PRICING-->

<section class="playlist" id="pricing">
	<div class="container">
		<h2 class="text-center text-uppercase text-secondary mb-0">KaraOK Pricing Plans</h2>
		<br>
		<br>
		<!--		<p style="text-align:center;">Enjoy singing and create your customized playlist!</p>-->
		<div class="card-deck mb-3 text-center">
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

<div class="row"></div>

</main>

<?php require_once INCLUDES_PATH . '/footer.php'; 
  ?>

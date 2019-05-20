<?php 
//session_start();
require_once "../config.php";
require_once INCLUDES_PATH . '/header.php';
require_once MODELS_PATH . '/playlist-apicall.php';

$userid = $_SESSION['uid'];

if ($_SESSION['email'] == ''){
    header("location:../includes/login.php");   
}
//PLAYLIST ID FROM SINGKING YOUTUBE CHANNELS
$playlistID = "PL8D4Iby0Bmm8QUI5h6VTEZwv0DgcQmsDx";
//CATEGORY OF PLAYLIST NAME AND IMAGE NAME
$playlistImage = "poprock-bg";//CLASS TO CALL THE  FUNCTION TO FETCH DATA FROM API
$playlistObj = new Playlist();
?>

<!-- PLAYLIST SECTION -->

<section class="playlist-page" id="playlist">
	<div class="container">
		<h2 class="text-center text-uppercase text-secondary mb-0 playlist-item-h2">Pop Rock Playlist</h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="../includes/homepage.php">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Pop Rock</li>
			</ol>
		</nav>
		<div class="row">
			<?php 
			//THIS IS WHERE THE LIST OF YOUTUBE VIDEOS UNDER THAT SPEFICIFC PLAYLIST WILL BE DISPLAYED USING PLAYLISTITEM METHOD IN YOUTUBE API
			//getAllPlaylistItems IS A FUNCTION TO CALL A YOUTUBE API TO LIST THE VIDEO AND GET ALL THE NECESSARY DATA TO DISPLAY VIDEOS
			$playlistObj->getAllPlaylistItems($playlistID, $playlistImage); 
			?>
		</div>
	</div>
</section>

<!--SECTION FOR PRICING-->

<div class="row"></div>

</main>
<?php require_once INCLUDES_PATH . '/footer.php'; 
  ?>

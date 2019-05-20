<?php 

//session_start();
require_once "../config.php";
require_once INCLUDES_PATH . '/header.php';

if ($_SESSION['email'] == ''){
    header("location:../includes/login.php");   
}
$keyword ="";
if(isset($_POST['submit'])){
	
$keyword = $_POST['search'];
}
 
?>

<!-- PLAYLIST SECTION -->

<section class="playlist-page" id="playlist">
	<div class="container">
		<h2 class="text-center text-uppercase text-secondary mb-0 playlist-item-h2">Ballads and Love Songs Playlist</h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="../includes/homepage.php">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Search Results for "<?php echo $keyword; ?>"</li>
			</ol>
		</nav>
		<div class="row">
			<?php 
			require_once MODELS_PATH . '/search.php';
			?>

		</div>
	</div>
</section>

<!--SECTION FOR PRICING-->

<div class="row"></div>

<?php require_once INCLUDES_PATH . '/footer.php'; 
  ?>

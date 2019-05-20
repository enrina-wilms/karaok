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

	
foreach ($arrVideoList['items'] as $items)
{

	$title= $items['snippet']['title'];
	$videoID= $items['id']['videoId'];

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
	. '<div class="playlist-btn-align">'
	. '<a href="https://www.youtube.com/watch?v=' .$videoID. '" class="btn playlist-btn btn btn-info btn-sm" target="_blank" title="Add to your Library"><i class="fas fa-plus"></i>&nbsp;&nbsp;' . 'Add Song' . '</a>'
	. '<a href="" id="shareBtn" class="btn btn-fbShare playlist-btn btn-sm" video-id="' . $videoID . '"><i class="fab fa-facebook-f"></i>&nbsp;&nbsp;' . 'Share' . '</a>'
	. '<a href="https://www.youtube.com/watch?v=' .$videoID. '" class="btn playlist-btn btn-danger btn-sm" target="_blank"><i class="fab fa-youtube"></i>&nbsp;&nbsp;' . 'Play Song' . '</a>'
	. '</div>'
	. '</div>'
	. '</div>'
	. '</div>';

}
}

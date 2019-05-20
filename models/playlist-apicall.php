<?php
class Playlist{
	
public function getAllPlaylistItems($playlisID, $plalistImage){
	

$myApiKey="AIzaSyCXDWTfRJVUaKHLhQCDaN2I5rBmUh4SSdM";

$maxResults="24";

$myQuery = "https://www.googleapis.com/youtube/v3/playlistItems?part=id%2Csnippet&maxResults=$maxResults&playlistId=$playlisID&key=$myApiKey";

$videoList = file_get_contents($myQuery);

$arrVideoList = json_decode($videoList, true);
	
	foreach ($arrVideoList['items'] as $items)
	{
	$id = $items['id'];
	$title= $items['snippet']['title'];
	$videoID= $items['snippet']['resourceId']['videoId'];
	$channel= $items['snippet']['channelTitle'];
	
	//$finalTile = strstr($title, '(Karaoke Version)' , true);
	
	$search = '(Karaoke Version)';
	$search1 = '-';
	$finalTile = str_replace($search, '' , $title);
	$finalTile2 = str_replace($search1, '<br/>----<br/>' , $finalTile);
				
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
	. '<a href="../includes/coming-soon.php" class="btn playlist-btn btn btn-info btn-sm" target="_blank" title="Add to your Library"><i class="fas fa-plus"></i>&nbsp;&nbsp;' . 'Add Song' . '</a>'
	. '<a href="" id="shareBtn" class="btn btn-fbShare playlist-btn btn-sm" video-id="' . $videoID . '"><i class="fab fa-facebook-f"></i>&nbsp;&nbsp;' . 'Share' . '</a>'
	. '<a href="https://www.youtube.com/watch?v=' .$videoID. '" class="btn playlist-btn btn-danger btn-sm" target="_blank"><i class="fab fa-youtube"></i>&nbsp;&nbsp;' . 'Play Song' . '</a>'
	. '</div>'
//	. '<h5 class="card-title playlistItem-title">' . $finalTile2 . '</h5>'
	. '</div>'
	. '</div>'
	. '</div>';
		
	}
	
	}//END OF PUBLIC FUNCTION
}//END OF THE CLASS
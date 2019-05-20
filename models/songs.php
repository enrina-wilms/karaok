<?php

//create class for user song

class Song
{
	//getting a specific song post
	public function getsongById($id, $db){
		
		$query = "SELECT * FROM songs WHERE id = :id";
		$pdost = $db->prepare($query);
		
		//bindParam = Binds a parameter to the specified variable name
		$pdost->bindParam(':id', $id);
		$pdost->execute();
		
		$song = $pdost->fetch(PDO::FETCH_OBJ);
		
		return $song;
		
	}

	//getting all the song created and save on the database
	public function getAllsong($db){
		
		$query = "SELECT * FROM songs ORDER BY video_id Desc";
		$pdost = $db->prepare($query);
		$pdost->execute();
		
		$song = $pdost->fetchAll(PDO::FETCH_OBJ);
		
		return $song;
	}
	
	//adding song
	public function addSong($title, $video_id, $user_id, $db){
			
		$query = "INSERT INTO songs(title, video_id, user_id)
				  VALUES (:title, :video_id , :user_id)";
		$pdost = $db->prepare($query);
		$pdost->bindParam(':title', $title);
		$pdost->bindParam(':video_id', $video_id);
		$pdost->bindParam(':user_id', $user_id);
	
		$song = $pdost->execute();
		
		return $song;
	}
	

	//deleting a song
	public function deletesong($id, $db){
		
		$query = "DELETE FROM songs WHERE id = :id";
		$pdost = $db->prepare($query);
		$pdost->bindParam(':id', $id);
		
		$song = $pdost->execute();
		
		return $song;
		
	}
}
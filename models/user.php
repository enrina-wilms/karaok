<?php
 require_once "database.php";
 //require_once "session.php";
 
  
 class User {
	 
	 public function getUserById($id, $db){
        $sql = "SELECT * FROM users WHERE id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        $user =  $pst->fetch(PDO::FETCH_OBJ);
        return $user;
	}
	//WHEN A USER USE GOOGLE SIGN IN IT WILL GET THE EMAIL ADDRESS AND FULL NAME OF THE USER SO THEY USE THE REGUALR FORM LOGIN LATER
	// I ALSO SET SET A DEFAULT PASSWORD FOR ALL THE USER AND LATER ON WILLIMPEMENT A CHANGE PASSWORD FEATURE FOR MY APPLICATION
	// LOGIN SYSTEM IS STILL NOT FULLY WORKING AND NEEDS A REGISTRATION FORM FOR A REGULAR LOGIN ASIDE FROM GOOGLE SIGN IN
    public function addUser($fname, $lname, $email, $password,$db)
    {
        $sql = "INSERT INTO users (fname,lname, email, password) 
              VALUES (:fname, :lname, :email, :password)";
        $pst = $db->prepare($sql);
        $pst->bindParam(':fname', $fname);
		$pst->bindParam(':lname', $lname);
        $pst->bindParam(':email', $email);
		$pst->bindParam(':password', $password);
	
        $user = $pst->execute();
        return $user;
    }
		public  function userLogin ($email, $password, $db){
				
		$sql = "SELECT COUNT(email) AS num FROM users WHERE email = :email";	
		$psd = $db->prepare($sql);
		$pst->bindParam(':email', $email);
		$user = $pst->execute();
        return $user;
		}

 }
	
?>
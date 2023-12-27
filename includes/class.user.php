<?php

class user {
	
	public $errorMessage;
	
	public function __construct($pdo){
		$this->conn = $pdo;
	}
	
	private function cleanInput($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	


public function login(){
	$usernameEmail = $this->cleanInput($_POST['username']);
	//Bygg query som hämtar ut en rad ur databasen ifall användarnamnet finns
	$stmt_checkIfUserExists = $this->conn->prepare("SELECT * FROM table_admin WHERE Admin_username = :uname");
	$stmt_checkIfUserExists->bindValue(":uname", $usernameEmail, PDO::PARAM_STR);
	$stmt_checkIfUserExists->execute();
	//Skapa array av infon som hämtats
	$userNameMatch = $stmt_checkIfUserExists->fetch();
	
	if(!$userNameMatch){
		$this->errorMessage = "No such user or email in database.";
		return $this->errorMessage;
	}
	
	   $checkPasswordMatch = password_verify($_POST['password'], $userNameMatch['Admin_password']);

	   if($checkPasswordMatch == true) {
		  $_SESSION['uname'] = $userNameMatch['Admin_username'];
		  $_SESSION['urole'] = $userNameMatch['Admin_role_fk'];
		  $_SESSION['uid'] = $userNameMatch['Admin_id'];
		  return "success";
	   } 
	   else {
		  $this->errorMessage = "INVALID password";     
		  return $this->errorMessage;
	   }

	}

	    public function checkLoginStatus(){
		if(isset($_SESSION['uid'])){
			return true;
		}
		else {
			return false;
		}
	}
	


	public function register(){
		$cleanName = $this->cleanInput($_POST['username']);
		//Encrypt password with the password_hash-function
		$encryptedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
		
		$stmt_registerUser = $this->conn->prepare("INSERT INTO table_admin 
		(Admin_username,  Admin_password, Admin_role_fk) 
		VALUES (:uname, :upass, 1)");
		$stmt_registerUser->bindValue(":uname", $cleanName, PDO::PARAM_STR);
		$stmt_registerUser->bindValue(":upass", $encryptedPassword, PDO::PARAM_STR);
		$check = $stmt_registerUser->execute();
		
		if($check){
			return "User created successfully!";
		}
		else{
			return "Something went wrong, try again later!";
		}	
	}

	public function redirect($url){
		header("Location: ".$url);
		exit();
	}

}

?>

	
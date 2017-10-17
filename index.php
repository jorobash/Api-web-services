<?php

require_once "db.php";

$db = new DB("127.0.0.1","restfullapi","root","");

if($_SERVER['REQUEST_METHOD'] == "GET"){

		if($_GET['url'] == "auth") {

		} else if ($_GET['url'] == "visits"){
			 echo json_encode(($db->query('SELECT * FROM restfullapi.visitrors')));
			 http_response_code(200);
		}
	//authenticate the user 
}else if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	if($_GET['url'] == "auth") {
			$postBody = file_get_contents("php://input");
			$postBody = json_decode($postBody);
			$username = $postBody->username;
			$password = $postBody->password;
			 
			//check for current user
			if($db->query('SELECT username FROM restfullapi.users WHERE username=:username',array(':username' =>$username))){
				if($password == $db->query('SELECT password FROM restfullapi.users WHERE username = :username',array(':username' => $username))[0]['password']){
					$cstrong = true;
					//make random token for the user 
					$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
					//insert the token of the user in the database and return it in the body
					$user_id = $db->query('SELECT id FROM users WHERE username=:username',array(':username'=>$username))[0]['id'];
					$db->query('INSERT INTO login_tokens VALUES ( :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
						echo '{"Token": "'.$token.'"}';
		
				}else{http_response_code(401);}
			}else{
				http_response_code(401);
			}
		} 

}else {
	http_response_code(405);
}
?>


<?php
require_once("db.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Visitors{
	private $visitors = array();

	public function getAllVisitors(){

try{
	//Get DB Object
	$db = new db();

	//Connect 
	$db = $db->connect();

	if(isset($_GET['name'])){
			$name = $_GET['name'];
			$stmt = $db->prepare('SELECT * FROM user WHERE :name = :name');
		    $stmt->bindParam(":name",$name);
		    $stmt->execute();
			echo json_encode($stmt);
			http_response_code(200);
		} else {
			$stmt=fetchAll();
			echo json_encode($stmt);
			http_response_code(200);
		}
	}catch(PDOExeption $e){
			echo '{"error": {"text": '.$e->http_response_code(404);.'}';
	}
		
	}
	//add new visitors
	public function addVisitors(){
		try{
			if(isset($_POST['name'])){
			$name = $_POST['name'];
				if(isset($_POST['lasname'])){
					$lastname = $_POST['lastname'];
				}
					if(isset($_POST['age'])){
						$age = $_POST['age'];
					}	

				$stmt = $db->prepare("
					INSERT INTO user(name, lastname, age)
					VALUES(:fname, :sname, :age)");
				$stmt->execute(array(
				    "fname" => "Joro",
				    "sname" => "Georgiev",
				    "age" => "18"
				));
			   }
			}catch(PDOExeption $e){
			echo '{"error": {"text": '.$e->getMessage().'}';
		}
		
	}
	//delete visitors
	public function deleteVisitors(){
		try {
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$stmt = $db->prepare(' DELETE * FROM visitors WHERE :id = :id');
			    $stmt->bindParam(":id",$id);
			    $stmt->execute();
				echo json_encode($stmt);
				echo 'success deleted';

			}
		}
		} catch (Exception $e) {
			echo '{"error": {"text": '.$e->getMessage().'}';
		}
	}	
}
?>


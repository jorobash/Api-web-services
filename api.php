
PhpPot Home
Demo & Download Contact
Tutorial Menu
REST API CRUD using PHP

    [Share on Facebook]
    [Share on Twitter]
    [Share on Linkedin]
    [Share on Email]

In this tutorial, we are going to create a RESTful web service in PHP for performing the CRUD operations. In previous tutorials, we have seen examples for MySQL CRUD and for creating a RESTful web service using PHP. In this tutorial which is part of the REST API series, let us learn about how to provide a simple REST API for CRUD (Create, Read, Update and Delete) operations. We will not be using any framework as dependencies, the complete implementation will be using plain core PHP.

Let us see about the conventions I have used in this example. The READ and DELETE actions are executed by sending the action keyword in the URL and is parsed by the GET method. In the REST Search tutorial,  we have used this method to send the search keyword as a query parameter in the URL to be searched. The ADD and UPDATE actions are called by sending the request data using POST method.

remote-controller-access
REST API Create and Update Implementation

CREATE and UPDATE requests are sent with the posted values. The UPDATE  request URL will contain the id of a particular row to be updated.

After receiving this request, the REST CRUD service will call the domain class to perform the database insert. The domain class will generate insert query using the posted values. The following figure shows how to POST data for the CREATE or UPDATE request. 

I am using the “Advanced REST Client” Google Chrome plugin to test the REST APIs.

rest-create-new
Delete using REST API

The DELETE request URL will be same as the EDIT URL. The record ID to be deleted should be passed in the URL After delete, the API response will be like as shown below.

rest-delete-mysql-data
Domain Class used for this CRUD Example

The following code shows the Mobile domain class that contains the function for performing the database CRUD operations. These functions are called by the REST handler class based on the request sent from the client. The domain class CRUD functions will return array response to the REST handler which is encoded as JSON format.

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
			$stmt = $db->prepare('SELECT * FROM visitors WHERE :name = :name');
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
					INSERT INTO visitors(name, lastname, age)
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
			
		}
	}
	
	public function editMobile(){
		if(isset($_POST['name']) && isset($_GET['id'])){
			$name = $_POST['name'];
			$model = $_POST['model'];
			$color = $_POST['color'];
			$query = "UPDATE tbl_mobile SET name = '".$name."', model ='". $model ."', color = '". $color ."' WHERE id = ".$_GET['id'];
		}
		$dbcontroller = new DBController();
		$result= $dbcontroller->executeQuery($query);
		if($result != 0){
			$result = array('success'=>1);
			return $result;
		}
	}
	
}
?>

Download

This PHP code tutorial was published on April 4, 2017.

    [Share on Facebook]
    [Share on Twitter]
    [Share on Linkedin]
    [Share on Email]

Previous:
jQuery AJAX Image Upload
Next:
CRUD with MySQLi Prepared Statement using PHP

↑ Back to Top

    PHP
        PHP Introduction
        PHP Basics
        PHP Shopping Cart
        Types, Variables & Operators
        PHP Strings
        PHP Arrays
        PHP Functions
        PHP OOPS
        PHP Forms
        Advanced
        PHP AJAX
        RESTful API
            PHP RESTful Web Service
            PHP MySQL REST API for Android
            REST API CRUD using PHP
            REST API Search Implementation in PHP
        PHP Databases
        PHP Sessions and Cookies
        Error and Exception Handling
        Files and Directories
        PHP Date Time
        PHP Graphics
        PHP XML
        PHP Code Samples
        PHP Freelancer
    jQuery
    Wordpress
    MySQL
    CSS

Vincy

Hello! I am Vincy, a PHP Developer and PHP Pot is my programming blog. I'm fond of developing modern web applications.

I accept paid work. Let's start working on your dream project.
vincy@phppot.com
Free Email Updates

Recommended Code

    PHP RESTful Web Service
    under RESTful API
    Highcharts - Compare Data using Column Chart
    under jQuery Tutorials
    AJAX Pagination with PHP
    under PHP AJAX
    Simple PHP Shopping Cart
    under PHP Shopping Cart
    jQuery AJAX Inline CRUD with PHP
    under jQuery AJAX CRUD

Let's get to work.
Vincy
I love the web and passionate in software development. I have been programming non-stop for a decade. I provide application development, enhancement, and problem-solving services.
Contact Me

    PHP
    jQuery
    MySQL
    Wordpress
    CSS

LinkedInGoogle PlusFacebookTwitterFeed

© 2017 phppot.com. The design and content are copyrighted to Vincy and may not be reproduced in any form.

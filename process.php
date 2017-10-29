<?php
	session_start();
	 require_once("connection.php");
	//  include('header.php');  
	// <div> <p> some content here </p> </div> 
 // 	 include('footer.php'); 

	if(isset($_POST['facebook'])  =='facebook'){
		$_SESSION['errors']=array();
		if(strlen($_POST['password'])<7) {
			array_push($_SESSION['errors'], "Your password should be longer than 7 letters");
		}

			
		if (count($_SESSION['errors']) == 0) {
			$query = "INSERT INTO users (email,password,created_at,updated_at) VALUES ('{$_POST['email']}','{$_POST['password']}',NOW(),NOW()) ";
			// var_dump($query);die();
			run_mysql_query($query);
			header('Location:main.php');
			die();
		} else {
			header('Location:index.php');
			die();
		}
	}

	if(isset($_POST['facebook1']) == 'facebook') {
    	$query = "SELECT * FROM users WHERE email = '{$_POST['email1']}'";
		$result = fetch_record($query);

		if($result === NULL){
			array_push($_SESSION['errors'], "EMAIL NOT HERE");
    	} else {
    		if( $result['password'] === $_POST['password1']){
    			$_SESSION['id'] = $result['id'];
    			header('Location: main.php');
    		} else {
    			array_push($_SESSION['errors'], "PASSWORD NOT KLOPT");
    			echo $result['errors'];
				header('Location:index.php');
    		}
		}
		die();
	}

	//Add posts...
	if (isset($_POST['submit']) >0) {
		// $query = "INSERT INTO posts (content,user_id,created_at,updated_at) VALUES('{$message}', {$id}, NOW(), NOW())";
			

		$message=$_POST['message'];
		$id = $_SESSION['id'];
			
		if (!(strlen($message) > 0)) {
			echo "pleas insert your post";
		}
		else {
			$query = "INSERT INTO posts (content,user_id,created_at,updated_at) VALUES('{$message}', {$id}, NOW(), NOW())";
			 // var_dump($query);die();
			run_mysql_query($query);
			//echo $_POST['message'];
			echo $row['content'];
			echo $row['user_id'];
			header('Location:main.php');
			}
	}

		//add comment..
	if (isset($_POST['comments'])>0) {
		
			$message1 = $_POST['comment'];
			$id=$_SESSION['comen'];
		
		if (!strlen($message1) > 0) {
			echo "Pleas full the text area";
		}
		else{
			
			$query = "INSERT INTO comments (comment,user_id,created_at,updated_at) VALUES('{$message1}', {$comen}, NOW(), NOW())";
			//$result = mysqli_query($query);
			run_mysql_query($query);
			//echo $_POST['message'];
			echo $row['comment'];
			echo $row['user_id'];
			header('Location:main.php');
			
			// 		if(!$result){
			// 			echo $row['comment'];
			// 	echo $row['user_id'];
			// 	header('Location:main.php');
			// }
			// else{
			// 	echo $comment;
			// }
		}
	}
	// $id = $_SESSION['id'];
	// $query = "SELECT * FROM comments order by user_id,created_at desc";
	// $result = fetch_all($query);
	// foreach ($result as $key => $row) {
	// 	echo "<div> ".$row['user']."<br>". $row['content']."<br>" . $row['created_at']."</div>";
	// }

?>
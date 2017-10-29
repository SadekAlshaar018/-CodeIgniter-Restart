<?php

	session_start();
	require_once("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>main page</title>
</head>
<body>
<div style="width: 900px;height: 70px;background-color: silver;">
	<h2 style="text-align: center;">Your page</h2>
	<p style="text-align: center;">
		<?php 
		echo "<h1 style='text-align:center;'>"."welcome "."</h1>" . $_POST['email'];
		?>
	</p>
	<button style="float: right;">
	<a href="index.php">logout</a>	
	</button>
</div>
<form method="POST" action="process.php" style="text-align: center;">
	<input type="hidden" name="post">
	<h1> Post </h1> <input type="text" name="message" placeholder="what do you think?" style="width: 500px; height: 100px;"><hr>
	<input type="submit" name="submit" value="Post" style="border: outset;
    border-bottom-right-radius: 22px;
    border-bottom-left-radius: 22px;"><br>

	<!-- comment form  -->
	<form action='process.php' method='post'>
	<input type='hidden' name='comment_id' value='$id'>
	<input type="hidden" name="comment_id" value="">
	
	
	
  	</form>
</form>
	
	

</body>
</html>
<?php

	

	if (isset($_POST['submite'])) {
		
			$message1 = $_POST['message'];
			$text=$_SESSION['text'];
		
		if (!strlen($message1)>0) {
			echo "Pleas full the text area";
		}
		else{
			
			$query = "insert into content (message) value ('$message')";
			$result = mysqli_query($query);
			
			
					if(!$result){
						die("query faileded");
			}
			else{
				echo $content;
			}
		}
	}
	$id = $_SESSION['id'];
	$query = "SELECT users.first_name, posts.content, posts.id, posts.created_at FROM users left join posts on users.id = posts.user_id ORDER BY created_at desc";
	
	$result = fetch_all($query);
	foreach ($result as $key ) {
		// echo "<div> ".$row['first_name']."<br>". $row['content']."<br>" . $row['created_at']."</div>";
		echo $key['first_name'];?><br><?php
		echo $key['content'];?><br><?php
		echo "<input type='text' style= 'border-style:solid;'/>";?><br><?php
		echo "<button style='border: outset;
    						 border-bottom-right-radius: 22px;
    						 border-bottom-left-radius: 22px; ' >comments</button>";?><br><hr><?php
		
		//echo $key['']
	}

	// $query = " SELECT * FROM users ";
	// $result = fetch_all($query);
	// foreach ($result as $key => $row) {
	// 	//echo $row['email'];  //if i want to print email users..
	// 	echo $row['user_id'];
	// }
// 	$query "select * from users right join posts on posts.users_id=users.id";
// 		$result = mysql_query($query) or die ();
// 		while ($row = mysqli_fetch_aaray($result)) {
// 				echo $row['content'];
// 		}
	// $query = "select * from posts on content";
	//add comment...

	if (isset($_POST['post_comment'])) {
		
			$message1 = $_POST['comment'];
			$text=$_SESSION['comen'];
		
		if (!strlen($message1)>0) {
			echo "Pleas full the text area";
		}
		else{
			
			$query = "insert into comments (comment) value ('$message1')";
			$result = mysqli_query($query);
			
			
					if(!$result){
						die("query faileded");
			}
			else{
				echo $comment;
			}
		}
	}		
	$id = $_SESSION['id'];
	$id = $_SESSION['id'];
	$query = "SELECT users.first_name, comments.comment, comments.id, comment.created_at FROM users left join comments on users.id = comments.user_id ORDER BY created_at desc";
	// $query = "SELECT * FROM comments order by user_id,created_at desc";
	$result = fetch_all($query);
	foreach ($result as $key => $row) {
		echo "<div> ".$row['user_id']."<br>". $row['comment']."<br>" . $row['created_at']."</div>";
	}
	
?>
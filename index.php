<!DOCTYPE html>
<html>
<head>
	<title>CS101 Homework Submission</title>

	<style type="text/css">
		html, body {
			margin:0;
			padding:0;
			font-family: "Helvetica Neue", sans-serif;
		}
		#container {
			width:600px;
			margin:0 auto;
		}
		h2 {
			text-align: center;
		}
		select {

		}
		input[type=submit] {
			padding:10px;
			border:1pt solid #aaa;
			border-radius: 4px;
			background:white;
			cursor: pointer;
		}
		input[type=submit]:hover {
			background:#eee;
		}
		input[type=text] {
			padding:10px;
			border:1pt solid #aaa;
			border-radius: 4px;
		}
		footer {
			padding:20px;
			text-align: center;
			font-size: 11px;
		}
	</style>
</head>
<body>
<div id="container">
	<h2>CS101 Homework Submission</h2>
<?php
if ( isset( $_FILES["file"] ) ) {
	if ( $_FILES["file"]["error"] > 0 ) {
		echo "<p>Sorry we had a problem uploading your homework.</p><p>Error: " . $_FILES["file"]["error"] . "</p>";
	}
	else {
		$num = "hw" . $_POST["hw_num"];
		$user = $_POST["user"];
		$dir = getcwd();
		if ( !is_dir( $dir . "/" . $num ) ) {
			mkdir( $dir . "/" . $num );
		}

		move_uploaded_file( $_FILES["file"]["tmp_name"],
			$dir . "/" . $num ."/" . $user . ".zip" );

		echo "<p>Thank you for your HW".$_POST["hw_num"]. " submission.</p>";
	}
} else { ?>
	<form action="index.php" method="post" enctype="multipart/form-data">
		<label for="hw_num">Assignment Number:</label>
		<select name="hw_num">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
		</select>
		<br>
		<label for="user">Middlebury Username:</label>
		<input type="text" name="user" placeholder="ex. jdoe ">
		<br>
		<label for="file">Filename:</label>
		<input type="file" name="file" id="file">
		<br>
		<input type="submit" name="submit" value="Submit">
	</form>
<?php } ?>

<footer>Thanks for using this <a href="https://github.com/willpots/submithw">open source</a> submit script!</footer>
</div>
</body>
</html>

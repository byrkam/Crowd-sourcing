<?php
session_start();

?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>History</title>
		<link rel="stylesheet" href="home-style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			.contain{
				height:678px;
				padding-top:30px;
				margin-left: 30%;
			}
			select {
  			width: 100%;
  			padding: 12px 20px;
  			margin: 8px 0;
  			display: inline-block;
  			border: 1px solid #ccc;
  			border-radius: 4px;
  			box-sizing: border-box;
			}

			input[type=submit] {
  			width: 100%;
  			background-color: #4CAF50;
  			color: white;
		  	padding: 14px 20px;
  			margin: 8px 0;
  			border: none;
  			border-radius: 4px;
	  		cursor: pointer;
			}

			input[type=submit]:hover {
  			background-color: #45a049;
			}

			form {
  			border-radius: 5px;
  			width: 50%;
				margin-left: 0%;
			}
		</style>
	</head>
	<body>
		<nav>
	 		<ul>
				<li><a href="loggedin.php">Home<i class="fa fa-home"></i></a></li>
 				<li><a href="history.php">History<i class="fa fa-history"></i></a></li>
				<li><a href="profile.php">Profile<i class="fa fa-user"></i></a></li>
	 		</ul>
	 		<form class="form-inline" action="includes/logout.php" method="post">
	 			<button class="topright" type="submit" name="logoutbtn">Logout</button>
				<script src="js/prevent_back_arrow.js"></script>
			</form>
		</nav>

		<main>
			<h2 style="text-align:center;">Select time to period to see your locations!</h2>

			<div class="contain">
				<form action='history-results.php' method=post role=search>
			<div>
				From month:
				<select class="select"id='fromMonth' title='Month' name='srchm' value='' required>
					<option disabled selected>Select</option>
					<option value='1'>January</option>
					<option value='2'>February</option>
					<option value='3'>March</option>
					<option value='4'>April</option>
					<option value='5'>May</option>
					<option value='6'>June</option>
					<option value='7'>July</option>
					<option value='8'>August</option>
					<option value='9'>September</option>
					<option value='10'>Octomber</option>
					<option value='11'>November</option>
					<option value='12'>December</option>
				</select>

				To month:
				<select class="select"id='toMonth'   title='Month' name='srchmonth' value='' required>
					<option disabled selected>Select</option>
					<option value='1'>January</option>
					<option value='2'>February</option>
					<option value='3'>March</option>
					<option value='4'>April</option>
					<option value='5'>May</option>
					<option value='6'>June</option>
					<option value='7'>July</option>
					<option value='8'>August</option>
					<option value='9'>September</option>
					<option value='10'>Octomber</option>
					<option value='11'>November</option>
					<option value='12'>December</option>
				</select>

				From year:
				<select class="select"id='fromYear' title='Year' name='srchy' value='' required>
					<option disabled selected>Select</option>
					<option value='2015'>2015</option>
					<option value='2016'>2016</option>
					<option value='2017'>2017</option>
					<option value='2018'>2018</option>
					<option value='2019'>2019</option>
					<option value='2020'>2020</option>
				</select>

				To year:
				<select class="select"id='toYear' title='Year' name='srchyear' value='' required>
					<option disabled selected>Select</option>
					<option value='2015'>2015</option>
					<option value='2016'>2016</option>
					<option value='2017'>2017</option>
					<option value='2018'>2018</option>
					<option value='2019'>2019</option>
					<option value='2020'>2020</option>
				</select>

				</div>

				<div>
					<input type='submit' value='Search'>
				</div>
			</form>
			</div></center>
		</main>
		<footer></footer>
	</body>
</html>

<?php
session_start();
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Admin Map</title>
		<link rel="stylesheet" href="home-style.css">
	  <link rel="stylesheet" href="admin-style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>


	<body>

	<header>
		<nav>
			<ul>
				<li><a href="admin_stats.php">Database view<i class="fa fa-database"></i></a></li>
				<li><a href="admin_map.php">Search<i class="fa fa-map"></i></a></li>
 				<li><a href="admin_delete.php">Delete<i class="fa fa-trash"></i></a></li>
				<li><a href="admin_export.php">Export<i class="fa fa-download"></i></a></li>
			</ul>
	        <form class="button" action="includes/logout.php" method="post">
						<button type="submit" name="logoutbtn">Logout
						<script src="js/prevent_back_arrow.js"></script>
						</button>
					</form>
		</nav>

	</header>





	<h2 style="text-align:center";>Select time to period to see your locations!</h2>

<div class="contain">
	<form action='admin_map_results.php'  method=post role=search>
		<div class="one">
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
			<br>
			To month:
			<select class="select"id='toMonth' style="margin-left: 18px;"  title='Month' name='srchmonth' value='' required>
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
		   </div>
		   <div class="one">
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
			<br>
			To year:
			<select class="select"id='toYear' style="margin-left: 18px;" title='Year' name='srchyear' value='' required>
				<option disabled selected>Select</option>
				<option value='2015'>2015</option>
				<option value='2016'>2016</option>
				<option value='2017'>2017</option>
				<option value='2018'>2018</option>
				<option value='2019'>2019</option>
				<option value='2020'>2020</option>
			</select>
			<br>
			</div>
			<div class="one">
			From day:

			<select class="select"id='fromDay'   title='Day' name='srchd' value='' required>
				<option disabled selected>Select</option>
				<option value='1'>01</option>
				<option value='2'>02</option>
				<option value='3'>03</option>
				<option value='4'>04</option>
				<option value='5'>05</option>
				<option value='6'>06</option>
				<option value='7'>07</option>
				<option value='8'>08</option>
				<option value='9'>09</option>
				<option value='10'>10</option>
				<option value='11'>11</option>
				<option value='12'>12</option>
				<option value='13'>13</option>
				<option value='14'>14</option>
				<option value='15'>15</option>
				<option value='16'>16</option>
				<option value='17'>17</option>
				<option value='18'>18</option>
				<option value='19'>19</option>
				<option value='20'>20</option>
				<option value='21'>21</option>
				<option value='22'>22</option>
				<option value='23'>23</option>
				<option value='24'>24</option>
				<option value='25'>25</option>
				<option value='26'>26</option>
				<option value='27'>27</option>
				<option value='28'>28</option>
				<option value='29'>29</option>
				<option value='30'>30</option>

			</select>
			<br>
			To day:

			<select class="select"id='toDay'  style="margin-left: 18px;" title='Day' name='srchday' value='' required>
				<option disabled selected>Select</option>
				<option value='1'>01</option>
				<option value='2'>02</option>
				<option value='3'>03</option>
				<option value='4'>04</option>
				<option value='5'>05</option>
				<option value='6'>06</option>
				<option value='7'>07</option>
				<option value='8'>08</option>
				<option value='9'>09</option>
				<option value='10'>10</option>
				<option value='11'>11</option>
				<option value='12'>12</option>
				<option value='13'>13</option>
				<option value='14'>14</option>
				<option value='15'>15</option>
				<option value='16'>16</option>
				<option value='17'>17</option>
				<option value='18'>18</option>
				<option value='19'>19</option>
				<option value='20'>20</option>
				<option value='21'>21</option>
				<option value='22'>22</option>
				<option value='23'>23</option>
				<option value='24'>24</option>
				<option value='25'>25</option>
				<option value='26'>26</option>
				<option value='27'>27</option>
				<option value='28'>28</option>
				<option value='29'>29</option>
				<option value='30'>30</option>
			</select>
			</div>
			<div class="one">
			From hour:
			<select class="select"id='fromHour' title='Time' name='srchh' value='' required>
				<option disabled selected>Select</option>
				<option value='0'>00</option>
				<option value='1'>01</option>
				<option value='2'>02</option>
				<option value='3'>03</option>
				<option value='4'>04</option>
				<option value='5'>05</option>
				<option value='6'>06</option>
				<option value='7'>07</option>
				<option value='8'>08</option>
				<option value='9'>09</option>
				<option value='10'>10</option>
				<option value='11'>11</option>
				<option value='12'>12</option>
				<option value='13'>13</option>
				<option value='14'>14</option>
				<option value='15'>15</option>
				<option value='16'>16</option>
				<option value='17'>17</option>
				<option value='18'>18</option>
				<option value='19'>19</option>
				<option value='20'>20</option>
				<option value='21'>21</option>
				<option value='22'>22</option>
				<option value='23'>23</option>
			</select>
			<br>
			To hour:
			<select class="select"id='toHour' style="margin-left: 18px;" title='Time' name='srchhour' value='' required>
				<option disabled selected>Select</option>
				<option value='0'>00</option>
				<option value='1'>01</option>
				<option value='2'>02</option>
				<option value='3'>03</option>
				<option value='4'>04</option>
				<option value='5'>05</option>
				<option value='6'>06</option>
				<option value='7'>07</option>
				<option value='8'>08</option>
				<option value='9'>09</option>
				<option value='10'>10</option>
				<option value='11'>11</option>
				<option value='12'>12</option>
				<option value='13'>13</option>
				<option value='14'>14</option>
				<option value='15'>15</option>
				<option value='16'>16</option>
				<option value='17'>17</option>
				<option value='18'>18</option>
				<option value='19'>19</option>
				<option value='20'>20</option>
				<option value='21'>21</option>
				<option value='22'>22</option>
				<option value='23'>23</option>
			</select>


		</div>

	</div>
	<div class="wrapper">
		<div class="ckeckboxes">

				<input type="checkbox" onclick="checkAll()" name='ALL_ACTIVITIES'id="select-all" /><label for="select-all"><b>Select All</b></label>


				<input type="checkbox" id ="child_chkbx1" name='foot'                value='ON_FOOT'/>     <label for="child_chkbx1">ON_FOOT</label>
				<input type="checkbox" id ="child_chkbx2" name='walk'                 value='WALKING' />    <label for="child_chkbx2">WALKING</label>
				<input type="checkbox" id ="child_chkbx3" name='unk'                 value='UNKNOWN' />     <label for="child_chkbx3">UNKNOWN</label>
				<input type="checkbox" id ="child_chkbx4" name='stil'                   value='STILL' />    <label for="child_chkbx4">STILL</label>
				<input type="checkbox" id ="child_chkbx5" name='tilt'                 value='TILTING' />    <label for="child_chkbx5">TILTING</label>
				<input type="checkbox" id ="child_chkbx6" name='runn'                 value='RUNNING'/>     <label for="child_chkbx6">RUNNING</label>
				<input type="checkbox" id ="child_chkbx7" name='in_v'              value='IN_VEHICLE' />    <label for="child_chkbx7">IN_VEHICLE</label>
				<input type="checkbox" id ="child_chkbx8" name='on_b'              value='ON_BICYCLE' />    <label for="child_chkbx8">ON_BICYCLE</label>
		</div>
		<div class="ckeckboxes1">

				<input type="checkbox" id ="child_chkbx9" name='road_v'         value='IN_ROAD_VEHICLE' />  <label for="child_chkbx9">IN_ROAD_VEHICLE</label>
				<input type="checkbox" id ="child_chkbx10" name='rail_v'         value='IN_RAIL_VEHICLE' /> <label for="child_chkbx10">IN_RAIL_VEHICLE</label>
				<input type="checkbox" id ="child_chkbx11" name='four_v' value='IN_FOUR_WHEELER_VEHICLE' /> <label for="child_chkbx11">IN_FOUR_WHEELER_VEHICLE</label>
				<input type="checkbox" id ="child_chkbx12" name='car'  			    value='IN_CAR' />       <label for="child_chkbx12">IN_CAR</label>
				<input type="checkbox" id ="child_chkbx13" name='two_v'  value='IN_TWO_WHEELER_VEHICLE' />  <label for="child_chkbx13">IN_TWO_WHEELER_VEHICLE</label>
				<input type="checkbox" id ="child_chkbx14" name='bus'  			    value='IN_BUS' />       <label for="child_chkbx14">IN_BUS</label>
				<input type="checkbox" id ="child_chkbx15" name='exit'         value='EXITING_VEHICLE' />   <label for="child_chkbx15">EXITING_VEHICLE</label>
		</div>

		 <div class="date_btn"><input type='submit' value='Search' class="d_btn" ></div>
		</div>

		</form>
</div></center>

	<script>
		document.getElementById('select-all').onclick = function() {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  for (var checkbox of checkboxes) {
    checkbox.checked = this.checked;
  }
}
	</script>

	</body>

</html>

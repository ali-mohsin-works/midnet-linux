<html>
<head>
<title>Grade Response API</title>
</head>
<body>
<div style="width:700px; margin:0 auto;">
<h2>Student Details</h2>
  
<form action="" method="POST">
	<label>Enter Temperature :</label><br />
		<input type="text" name="temperature" required/>
		<select name="temperature_unit" id="temperature_unit" >
		<option value="Kelvin">Kelvin</option>
		<option value="Celsius">Celsius</option>
		<option value="Fahrenheit">Fahrenheit</option>
		<option value="Rankine">Rankine</option>
		</select>
	<br /><br />
	<label>Target Units :</label><br />
		<select name="target_unit" id="target_unit" >
		<option value="Kelvin">Kelvin</option>
		<option value="Celsius">Celsius</option>
		<option value="Fahrenheit">Fahrenheit</option>
		<option value="Rankine">Rankine</option>
		</select>
	<br /><br />
	<label>Student Response :</label><br />
		<input type="text" name="student_responce" required/>
	<br /><br />
		<button type="submit" name="submit">Submit</button>
</form>    

<?php
if (isset($_POST['submit'])) {
	$temperature = str_replace(' ', '', $_POST['temperature']); 
	$temperature_unit = str_replace(' ', '',  $_POST['temperature_unit']);
	$target_unit = str_replace(' ', '', $_POST['target_unit']) ;
	$student_responce = str_replace(' ', '', $_POST['student_responce']) ;

	$url = "http://localhost/midnet/api/api/".$temperature."/".$temperature_unit."/".$target_unit."/".$student_responce;
	 
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	$result = json_decode($response); 
	//print_r($response);
			
	echo "<table>";
	echo "<tr><td>Input Temperature:</td><td>$temperature $temperature_unit</td></tr>";
	echo "<tr><td>Target Units:</td><td>$target_unit</td></tr>";
	echo "<tr><td>Student Response:</td><td>$student_responce</td></tr>";
	echo "<tr><td>Grade:</td><td>$result->grade</td></tr>";
	echo "</table>";
}
    ?>
</div>
</body>
</html>
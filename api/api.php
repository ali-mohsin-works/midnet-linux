<?php
header("Content-Type:application/json");
if (isset($_GET['temperature']) && isset($_GET['temperature_unit']) && isset($_GET['target_unit']) && isset($_GET['student_responce'])) {
	$temperature = $_GET['temperature'];
	$temperature_unit = $_GET['temperature_unit'];
	$target_unit = $_GET['target_unit'];
	$student_responce = $_GET['student_responce'];
	//$grade = "";

	$calculate_grade = calculate($temperature,$temperature_unit,$target_unit,$student_responce);

	if (is_numeric($calculate_grade)) {
		if(round($calculate_grade) == round($student_responce)){
			$grade = "correct";
		}
		else if(round($calculate_grade) != round($student_responce)){
			$grade = "incorrect";
		}else{
			$grade = "invalid";
		}	
	}
	else{
		$grade = "invalid";
	}

	
	response($grade,200,"success");
}else{
	response(NULL, 400,"Invalid Request");
	}


//Kelviv Celsius	Fahrenheit	Rankine

function calculate($temperature,$temperature_unit,$target_unit,$student_responce){
	if (is_numeric($temperature) && is_numeric($student_responce)) {
		if($temperature_unit == "Fahrenheit" && $target_unit == "Kelvin"){
			return ($temperature - 32) * 5/9 + 273.15;
		}
		else if($temperature_unit == "Fahrenheit" && $target_unit == "Celsius"){
			return ($temperature - 32) * 5/9 ;
		}
		else if($temperature_unit == "Fahrenheit" && $target_unit == "Rankine"){
			return $temperature + 459.67;
		}
		else if($temperature_unit == "Kelvin" && $target_unit == "Celsius"){
			return $temperature - 273.15 ;
		}
		else if($temperature_unit == "Kelvin" && $target_unit == "Fahrenheit"){
			return ($temperature- 273.15) * 9/5 + 32 ;
		}
		else if($temperature_unit == "Kelvin" && $target_unit == "Rankine"){
			return $temperature * 1.8;
		}
		else if($temperature_unit == "Celsius" && $target_unit == "Kelvin"){
			return $temperature + 273.15 ;
		}
		else if($temperature_unit == "Celsius" && $target_unit == "Fahrenheit"){
			return ($temperature * 9/5) + 32 ;
		}
		else if($temperature_unit == "Celsius" && $target_unit == "Rankine"){
			return $temperature * 9/5 + 491.67;
		}
		else if($temperature_unit == "Rankine" && $target_unit == "Kelvin"){
			return $temperature * 5/9;
		}
		else if($temperature_unit == "Rankine" && $target_unit == "Fahrenheit"){
			return $temperature - 459.67;
		}
		else if($temperature_unit == "Rankine" && $target_unit == "Celsius"){
			return ($temperature - 491.67) * 5/9;
		}
		else{
			return 0;
		}
	}else{
		return "invalid";
	}

}	

function response($grade,$response_code,$response_desc){
	$response['grade'] = $grade;
	$response['response_code'] = $response_code;
	$response['response_desc'] = $response_desc;
	
	$json_response = json_encode($response);
	echo $json_response;
}

?>
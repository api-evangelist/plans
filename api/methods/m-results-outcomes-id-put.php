<?php$route = '/results_outcomes/:id/';$app->put($route, function ($id)  use ($app){	$request = $app->request();	$_GET = $request->params();	if(isset($_GET['outcome_id'])){ $outcome_id = $_GET['outcome_id']; } else { $outcome_id = '';}	if(isset($_GET['nct_id'])){ $nct_id = $_GET['nct_id']; } else { $nct_id = '';}	if(isset($_GET['outcome_type'])){ $outcome_type = $_GET['outcome_type']; } else { $outcome_type = '';}	if(isset($_GET['outcome_title'])){ $outcome_title = $_GET['outcome_title']; } else { $outcome_title = '';}	if(isset($_GET['time_frame'])){ $time_frame = $_GET['time_frame']; } else { $time_frame = '';}	if(isset($_GET['safety_issue'])){ $safety_issue = $_GET['safety_issue']; } else { $safety_issue = '';}	if(isset($_GET['outcome_description'])){ $outcome_description = $_GET['outcome_description']; } else { $outcome_description = '';}	if(isset($_GET['population'])){ $population = $_GET['population']; } else { $population = '';}	if(isset($_GET['posting_date'])){ $posting_date = $_GET['posting_date']; } else { $posting_date = '';}	$Query = "SELECT * FROM results_outcomes WHERE id = '" . $id . "'";	$Database = mysql_query($Query) or die('Query failed: ' . mysql_error());	if($Database && mysql_num_rows($Database))		{		$query = "UPDATE results_outcomes SET";		if(isset($id))			{			$query .= "id='" . mysql_real_escape_string($id) . "'";			}		if(isset($outcome_id))			{			$query .= "outcome_id='" . mysql_real_escape_string($outcome_id) . "'";			}		if(isset($nct_id))			{			$query .= "nct_id='" . mysql_real_escape_string($nct_id) . "'";			}		if(isset($outcome_type))			{			$query .= "outcome_type='" . mysql_real_escape_string($outcome_type) . "'";			}		if(isset($outcome_title))			{			$query .= "outcome_title='" . mysql_real_escape_string($outcome_title) . "'";			}		if(isset($time_frame))			{			$query .= "time_frame='" . mysql_real_escape_string($time_frame) . "'";			}		if(isset($safety_issue))			{			$query .= "safety_issue='" . mysql_real_escape_string($safety_issue) . "'";			}		if(isset($outcome_description))			{			$query .= "outcome_description='" . mysql_real_escape_string($outcome_description) . "'";			}		if(isset($population))			{			$query .= "population='" . mysql_real_escape_string($population) . "'";			}		if(isset($posting_date))			{			$query .= "posting_date='" . mysql_real_escape_string($posting_date) . "'";			}		$query .= " WHERE id = '" . $id . "'";		mysql_query($query) or die('Query failed: ' . mysql_error());		$ReturnObject = array();		$ReturnObject['message'] = "Results_outcomes Updated!";		}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>
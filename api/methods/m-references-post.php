<?php$route = '/references/';$app->post($route, function ()  use ($app){	$request = $app->request();	$_GET = $request->params();	if(isset($_GET['reference_id'])){ $reference_id = $_GET['reference_id']; } else { $reference_id = '';}	if(isset($_GET['nct_id'])){ $nct_id = $_GET['nct_id']; } else { $nct_id = '';}	if(isset($_GET['reference_type'])){ $reference_type = $_GET['reference_type']; } else { $reference_type = '';}	if(isset($_GET['citation'])){ $citation = $_GET['citation']; } else { $citation = '';}	if(isset($_GET['pmid'])){ $pmid = $_GET['pmid']; } else { $pmid = '';}		$query = "INSERT INTO references(";		if(isset($reference_id)){ $query .= $reference_id . ","; }		if(isset($nct_id)){ $query .= $nct_id . ","; }		if(isset($reference_type)){ $query .= $reference_type . ","; }		if(isset($citation)){ $query .= $citation . ","; }		if(isset($pmid)){ $query .= $pmid . ","; }		$query .= ") VALUES(";		if(isset($reference_id)){ $query .= "'" . mysql_real_escape_string($reference_id) . "',"; }		if(isset($nct_id)){ $query .= "'" . mysql_real_escape_string($nct_id) . "',"; }		if(isset($reference_type)){ $query .= "'" . mysql_real_escape_string($reference_type) . "',"; }		if(isset($citation)){ $query .= "'" . mysql_real_escape_string($citation) . "',"; }		if(isset($pmid)){ $query .= "'" . mysql_real_escape_string($pmid) . "',"; }		$query .= ")";		mysql_query($query) or die('Query failed: ' . mysql_error());		$ReturnObject = array();		$ReturnObject['message'] = "References Added!";	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>